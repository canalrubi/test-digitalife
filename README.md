
# Test digitalife

Pasos para ejecutar la prueba:


## Paso 1 - Clonar repositorio
Clonar el proyecto desde la siguiente URL:

```bash
https://github.com/canalrubi/test-digitalife
```

## Paso 2 - npm y vendor
Dentro de la carpeta clonada ejecutar los siguientes comandos:
```bash
- composer install
- npm install
```

## Paso 3 - Archivo .env
Dentro de la carpeta clonada copiar y pegar el archivo .env.example y cambiar el nombre a .env


## Paso 4 - Crear base de datos
Crear la base de datos con el nombre que esta en la variable DB_DATABASE del archivo .env en **phpmyadmin**
```bash
DB_DATABASE=test_digitalife
```

## Paso 5 - Migraciones y seeders
Dentro de la misma ubicación, desde la terminal, ejecutar las migraciones y seeders con el siguiente comando
```bash
php artisan migrate --seed
```
Este comando ejecuta los seeders de usuarios y productos.
El seeder de usuarios registra el usuario admin@digitalife.com.mx
.El seeder de productos registra 30 productos a traves del factory **ProductFactory** incluyendo el usuario que realizó el registro.

## Paso 6 - Pruebas unitarias
Ejecutar el siguiente comando para ejecutar pruebas unitarias
```bash
php artisan test
```

## Paso 7 - Generar key y Correr servidor
Ejecutar los siguientes comandos para ejecutar el servidor y pueda ingresar al sistema.
```bash
php artisan key:generate
npm run dev
php artisan serve
```
