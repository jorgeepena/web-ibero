# Repositorio de Proyecto Web en la Ibero
##### Elaborado por el Profesor Jorge Peña

Modificacion: Este es un listado de las funcionalidades de nuestro proyecto:
* Módulo Tareas
* Módulo Proyectos 
* Módulo Autenticación

----------------------

## Instalación LARAVEL en Servidor

### Requisitos de Servidor

La configuración recomendada es LAMP Stack.

* Ubuntu 14 - 20
* Apache2
* MySQL
* Phpmyadmin (OPCIONAL)

-----------------------

### Instalar Git, Unzip.

```
sudo apt-get install git
sudo apt-get install unzip
sudo apt-get update

```

### Instalar CURL + Composer

```
sudo apt install php-mbstring php-xml php-bcmath
sudo apt-get install curl php-curl php-xml php-gd php-mbstring
curl -sS https://getcomposer.org/installer | php
sudo mv composer.phar /usr/local/bin/composer
```

### Habilitar Mods

```
sudo phpenmod mbstring
sudo a2enmod rewrite
sudo systemctl restart apache2

```

### Git CLONE del Proyecto en carpeta HTML

```
cd /var/www/html
git clone ['RUTA DEL REPOSITORIO']
```

### Habilitar permisos de escritura para la carpeta de forma recursiva

```
sudo chmod -R 775 [NOMBRE_DE_LA_CARPETA]

```

### Entrar en carpeta de proyecto

```
cd /[NOMBRE_DE_LA_CARPETA]
```

### Actualizar carpeta con COMPOSER 

```
composer install
```

### Actualizar permisos de las carpetas dentro del proyecto 

```
sudo chown -R $USER:www-data bootstrap/cache
sudo chown -R $USER:www-data storage

chmod -R 775 bootstrap/cache
chmod -R 775 storage
```

### Configurar el ambiente del proyecto y crear llave de encriptación

```
cp .env.example .env
php artisan key:generate

```

### Configurar Directorio de Proyecto

/etc/apache2/sites-available/000-default.conf

```
<VirtualHost *:80>
	ServerName [RUTA].com
	DocumentRoot /var/www/html/[[ NOMBRE_DE_LA_CARPETA ]]/public

	<Directory /var/www/html/[[ NOMBRE_DE_LA_CARPETA ]]/public>
		AllowOverride All
		Require all granted
	</Directory>
</VirtualHost>
```

### Reiniciar Servidor

```
service apache2 reload

```

-----------------------

## Instalación SSL en Servidor

Después de gestionar la compra de el certificado de seguridad es necesario tener 3 archivos diferentes. Intermediate.crt, werkn.mx.crt, werkn.mx.key y meterlos en la carpeta ssl dentro de /etc del servidor.

### Modificar Directorio de Proyecto 

/etc/apache2/sites-available/000-default.conf

```
<VirtualHost *:80>
   ServerName [RUTA]
   Redirect permanent / https://www.[RUTA]
</VirtualHost>

<IfModule mod_ssl.c>
    <VirtualHost _default_:443>
            ServerAdmin admin@[RUTA]
            ServerName [RUTA]
            DocumentRoot /var/www/html/[[ NOMBRE_DE_LA_CARPETA ]]/public

            SSLEngine on
            SSLCertificateFile /etc/ssl/[RUTA].crt
            SSLCertificateKeyFile /etc/ssl/[RUTA].key

            SSLCACertificateFile /etc/ssl/intermediate.crt
            # SSLCertificateChainFile /etc/ssl/intermediate.crt

            <Directory /var/www/html/[[ NOMBRE_DE_LA_CARPETA ]]/public>
                Options Indexes FollowSymLinks
                AllowOverride All
                Require all granted
            </Directory>

            ErrorLog ${APACHE_LOG_DIR}/error.log
            CustomLog ${APACHE_LOG_DIR}/access.log combined

            <IfModule mod_dir.c>
                DirectoryIndex index.php index.pl index.cgi index.html index.xhtml index.htm
            </IfModule>
    </VirtualHost>
</IfModule>
```

### Activar el módulo SSL  

```
sudo a2enmod ssl
```

### Reiniciar el servidor

```
sudo service apache2 restart
```

-----------------------

## Licencia
MIT License
Copyright (c) [2021] [Jorge Peña Lama]

Permission is hereby granted, free of charge, to any person obtaining a copy
of this software and associated documentation files (the "Software"), to deal
in the Software without restriction, including without limitation the rights
to use, copy, modify, merge, publish, distribute, sublicense, and/or sell
copies of the Software, and to permit persons to whom the Software is
furnished to do so, subject to the following conditions:

The above copyright notice and this permission notice shall be included in all
copies or substantial portions of the Software.

THE SOFTWARE IS PROVIDED "AS IS", WITHOUT WARRANTY OF ANY KIND, EXPRESS OR
IMPLIED, INCLUDING BUT NOT LIMITED TO THE WARRANTIES OF MERCHANTABILITY,
FITNESS FOR A PARTICULAR PURPOSE AND NONINFRINGEMENT. IN NO EVENT SHALL THE
AUTHORS OR COPYRIGHT HOLDERS BE LIABLE FOR ANY CLAIM, DAMAGES OR OTHER
LIABILITY, WHETHER IN AN ACTION OF CONTRACT, TORT OR OTHERWISE, ARISING FROM,
OUT OF OR IN CONNECTION WITH THE SOFTWARE OR THE USE OR OTHER DEALINGS IN THE
SOFTWARE.