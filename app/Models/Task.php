<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Task extends Model
{
    use HasFactory;

    // Esto permite asignación masiva
    protected $fillable = [
    	'name','description','due_date', 'modality'
    ];
}
