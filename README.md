## INSTALACION
instalamos las dependencias:
```
composer install
```

# Configuracion Archivo .env
*  Existe un archivo .env.example que esta en la carpeta raiz, debe cambiarle el nombre a .env 

* Cree una base de Datos en su MySQL y agrege el nombre de la base de datos, asi como su usuario y password
```
DB_DATABASE=
DB_USERNAME=
DB_PASSWORD=
```

# Ultimos Comandos a Ejecutar
* Creamos las tablas
```
php artisan migrate --seed
```

* Inicializamos el servidor
```
php artisan serve
```
_INSTALACION FINALIZADA_