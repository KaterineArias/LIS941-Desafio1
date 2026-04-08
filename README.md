# Control de Finanzas — LIS941 Desafío 1

Aplicación web de control de finanzas personales desarrollada con PHP, Laravel y MySQL.

## Requisitos previos

- [XAMPP](https://www.apachefriends.org/) con PHP 8.2 o superior
- [Composer](https://getcomposer.org/download/)
- [Git](https://git-scm.com/)

## Instalación

### 1. Clonar el repositorio

Abre una terminal dentro de la carpeta `C:\xampp\htdocs\` y ejecuta:

```bash
git clone https://github.com/KaterineArias/LIS941-Desafio1.git
cd LIS941-Desafio1
```

### 2. Instalar dependencias

```bash
composer install
```

### 3. Configurar variables de entorno

Copia el archivo de ejemplo:

```bash
copy .env.example .env
```

Edita el `.env` con estos valores:

```env
DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=finanzas_db
DB_USERNAME=root
DB_PASSWORD=
```

### 4. Generar clave de la aplicación

```bash
php artisan key:generate
```

### 5. Crear la base de datos

Abre [http://localhost/phpmyadmin](http://localhost/phpmyadmin) y crea una base de datos llamada `finanzas_db`.

### 6. Ejecutar las migraciones

```bash
php artisan migrate
```

### 7. Crear usuario de prueba

```bash
php artisan tinker
```

Dentro del tinker:

```php
use App\Models\User;
User::create([
    'name'     => 'Admin',
    'username' => 'admin',
    'email'    => 'admin@finanzas.com',
    'password' => bcrypt('admin123')
]);
exit
```

### 8. Iniciar el servidor

```bash
php artisan serve
```

### 9. Abrir en el navegador

[http://localhost:8000](http://localhost:8000)

## Credenciales de prueba

- Usuario: admin
- Contraseña: admin123

## Tecnologías

- PHP 8.2
- Laravel 12
- MySQL (XAMPP)
- Blade (motor de plantillas)
- Eloquent ORM
- Chart.js
- html2pdf.js