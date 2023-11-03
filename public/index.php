<?php
require_once __DIR__ . '/../includes/app.php';

use Controllers\LoginController;
use MVC\Router;
use Controllers\PropiedadController;
use Controllers\VendedorController;
use Controllers\PaginasController;

$router = new Router();

// Zona privada (requiere auth)
$router -> get('/admin',[PropiedadController::class, 'index']);
$router -> get('/propiedades/crear', [PropiedadController::class, 'crear']);
$router -> post('/propiedades/crear', [PropiedadController::class, 'crear']);
$router -> get('/propiedades/actualizar', [PropiedadController::class, 'actualizar']);
$router -> post('/propiedades/actualizar', [PropiedadController::class, 'actualizar']);
$router -> post('/propiedades/eliminar', [PropiedadController::class, 'eliminar']);

$router -> get('/vendedores/crear', [VendedorController::class, 'crear']);
$router -> post('/vendedores/crear',[VendedorController::class, 'crear']);
$router -> get('/vendedores/actualizar', [VendedorController::class, 'actualizar']);
$router -> post('/vendedores/actualizar',[VendedorController::class, 'actualizar']);
$router -> post('/vendedores/eliminar',[VendedorController::class, 'eliminar']);

// Zona pública (no auth)
$router -> get('/', [Paginascontroller::class, 'index']);
$router -> get('/nosotros', [Paginascontroller::class, 'nosotros']);
$router -> get('/propiedades', [Paginascontroller::class, 'propiedades']);
$router -> get('/propiedad', [Paginascontroller::class, 'propiedad']);
$router -> get('/blog', [Paginascontroller::class, 'blog']);
$router -> get('/entrada', [Paginascontroller::class, 'entrada']);
$router -> get('/contacto', [Paginascontroller::class, 'contacto']);
$router -> post('/contacto', [Paginascontroller::class, 'contacto']);

// Auth 
$router -> get('/login', [LoginController::class,'login']);
$router -> post('/login', [LoginController::class,'login']);
$router -> get('/logout', [LoginController::class,'logout']);



$router -> comprobarRutas();