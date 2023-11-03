<?php

namespace Controllers;
use MVC\Router;
use Model\Propiedad;
use Model\Vendedor;
use Intervention\Image\ImageManagerStatic as Image;

class PropiedadController {
    public static function index(Router $router) {
        $propiedades = Propiedad::all();
        $vendedores = Vendedor::all();
        $resultado = $_GET['resultado'] ?? null;

        $router -> render('/propiedades/admin', [
            'propiedades' => $propiedades,
            'resultado' => $resultado,
            'vendedores' => $vendedores
        ]);
    }
    public static function crear(Router $router) {
        $propiedad = new Propiedad;
        $vendedores = Vendedor::all();
        $errores = Propiedad::getErrores();
        
        if($_SERVER['REQUEST_METHOD'] === 'POST') {
            // ** Crear una nueva instancia ** //
            $propiedad = new Propiedad($_POST['propiedad']);
            
            // ** SUBIDA DE ARCHIVOS */
            // Generar nombre imagen ÚNICO  
            $nombreImagen = md5(uniqid(rand(), true)) . ".jpg";
    
            // Setear la imagen
            // Realiza un resize de la imagen
            if($_FILES['propiedad']['tmp_name']['imagen']) {
                $image = Image::make($_FILES['propiedad']['tmp_name']['imagen']) -> fit(800,600);
                $propiedad -> setImagen($nombreImagen);
            }
    
            // Validar
            $errores = $propiedad -> validar();
            
            if(empty($errores)) {
                // Crear carpeta para subir imagenes
                if(!is_dir(CARPETA_IMAGENES)) {
                    mkdir(CARPETA_IMAGENES);
                }
                // Guardar imagen en el servidor
                $image -> save(CARPETA_IMAGENES . $nombreImagen);
                
                // Guarda en la base de datos
                $propiedad -> guardar();
            }
        }

        $router -> render('/propiedades/crear', [
            'propiedad' => $propiedad,
            'vendedores' => $vendedores,
            'errores' => $errores
        ]);
    }
    public static function actualizar(Router $router){
        $id = validarId('/admin');
        $propiedad = Propiedad::find($id);
        $vendedores = Vendedor::all();
        $errores = Propiedad::getErrores();

        if($_SERVER['REQUEST_METHOD'] === 'POST') {
            // Asignar los atributos
            $args = $_POST['propiedad'];
            $propiedad -> sincronizar($args);
            // Validación
            $errores = $propiedad -> validar();

            // ** SUBIDA DE ARCHIVOS ** //
            // Generar nombre imagen ÚNICO  
            $nombreImagen = md5(uniqid(rand(), true)) . ".jpg";
    
            // Realiza un resize de la imagen
            if($_FILES['propiedad']['tmp_name']['imagen']) {
                $image = Image::make($_FILES['propiedad']['tmp_name']['imagen']) -> fit(800,600);
                $propiedad -> setImagen($nombreImagen);
            }
    
            // Revisar que el arreglo ERRORES ESTÉ VACÍO. Es decir, formulario BIEN enviado.
            if(empty($errores)) {
                if($_FILES['propiedad']['tmp_name']['imagen']) {
                // Almacenar imágenes
                $image -> save(CARPETA_IMAGENES . $nombreImagen);
                }
                $propiedad -> guardar();
            }
        }

        $router -> render('/propiedades/actualizar', [
            'propiedad' => $propiedad,
            'vendedores' => $vendedores,
            'errores' => $errores
        ]);
    }
    public static function eliminar(){
        if($_SERVER['REQUEST_METHOD'] === 'POST') {
            $id = $_POST['id'];
            $id = filter_var($id, FILTER_VALIDATE_INT);
            if($id) {
                $tipo = $_POST['tipo'];
                if(validarTipoContenido($tipo)) {
                    $propiedad = Propiedad::find($id);
                    $propiedad -> eliminar();
                }
            }
        }
    } 
    
}