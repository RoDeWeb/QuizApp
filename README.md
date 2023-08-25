# Quiz App

Aplicación QuizzApp en Laravel 8 para prueba técnica.

## Requisitos:
- PHP 7.4
- Laravel 8.x
- Base de datos MySQL

## Instalación:
1. Clonar: git clone https://github.com/RoDeWeb/QuizApp.git
cd quizapp (ruta del proyecto)

2. **Configurar**:
- Crear base de datos en este caso quizapp en phpmyadmin o con create: table quizapp; use quizapp;
- Renombrar `.env.example` a `.env`
- Configurar conexión a la base de datos en `.env`
 
3. **Dependencias**:
composer install

5. **Preparar aplicación**:
php artisan key:generate
php artisan migrate
php artisan db:seed

6. **Iniciar servidor**:
php artisan serve
Acceder en `http://127.0.0.1:8000` o ruta especefica en caso de usar laragon.
