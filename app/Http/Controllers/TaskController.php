<?php

namespace App\Http\Controllers;

use Auth;
use App\Models\Task;
use App\Models\Project;

use Illuminate\Http\Request;

class TaskController extends Controller
{
    //VISTA PRINCIPAL
    //LISTADO DE TAREAS
    public function index()
    {
        // Colección de Tareas
        $tareas = Task::where('user_id', Auth::user()->id)->paginate(30);

        //links();

        $proyectos = Project::where('user_id', Auth::user()->id)->get();

        return view('tasks.index')
        ->with('tareas', $tareas)
        ->with('proyectos', $proyectos);
    }

    //VISTA CREAR
    //FORMULARIO DE CREACIÓN
    public function create()
    {
        return view('tasks.create');
    }

    public function store(Request $request)
    {
        // Modo Pro
        $tarea = Task::create([
            'user_id' => Auth::user()->id,
            'name' => $request->name,
            'description' => $request->description,
            'due_date' => $request->due_date,
            'modality' => $request->modality,
            'project_id' => $request->project_id
        ]);

        // Modo N00B
        /*
        $tarea = new Task;

        $tarea->name = $request->name;
        $tarea->description = $request->description;
        $tarea->due_date = $request->due_date;

        $tarea->save();
        */
        // Regreso al usuario a la pantalla anterior.
        return redirect()->back();
    }

    // VISTA DE UNA SOLA TAREA
    public function show($id)
    {
        $tarea = Task::where('id', $id)->where('user_id', Auth::user()->id)->first();

        if (empty($tarea)) {
            return redirect()->back();
        }else{
            return view('tasks.show')->with('tarea', $tarea);
        }
        
    }

    // ACTUALIZAR / EDITAR
    public function edit($id)
    {
        $tarea = Task::find($id);

        return view('tasks.edit')->with('tarea', $tarea);
    }

    public function update(Request $request, $id)
    {
        $tarea = Task::find($id);

        $tarea->update([
            'name' => $request->name,
            'description' => $request->description,
            'due_date' => $request->due_date,
            'modality' => $request->modality,
            'project_id' => $request->project_id
        ]);

        if ($request->origen == 'edit') {
            redirect()->route('tareas.show', $tarea->id);
        }else{
           return redirect()->back();
        }
    }

    // BORRAR
    public function destroy($id)
    {
        $tarea = Task::find($id);
        $tarea->delete();

        return redirect()->route('tareas.index');
    }

    public function changeStatus($id)
    {
        $tarea = Task::find($id);

        // false = 0
        // true = 1

        if ($tarea->is_completed == false) {
            $tarea->is_completed = true;
        }else{
            $tarea->is_completed = false;
        }

        $tarea->save();

        return redirect()->back();
    }
}
