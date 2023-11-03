<?php

namespace Controllers;
use MVC\Router;
use Model\Propiedad;
use PHPMailer\PHPMailer\PHPMailer;



class PaginasController {
    public static function index(Router $router) {
        $propiedades = Propiedad::get(3);
        $inicio = true;

        $router -> render('/paginas/index', [
            'propiedades' => $propiedades,
            'inicio' => $inicio
        ]);
    }
    public static function nosotros(Router $router) {
        $router -> render('/paginas/nosotros', []);
    }
    public static function propiedades(Router $router) {
        $propiedades = Propiedad::all();

        $router -> render('/paginas/propiedades', [
            'propiedades' => $propiedades
        ]);
    }
    public static function propiedad(Router $router) {
        $id = validarId('/propiedades');
        $propiedad = Propiedad::find($id);

        $router -> render('/paginas/propiedad', [
            'propiedad' => $propiedad
        ]);
    }
    public static function blog(Router $router) {
        $router -> render('paginas/blog', []);
    }
    public static function entrada(Router $router) {
        $router -> render('paginas/entrada', []);
    }
    public static function contacto(Router $router) {
        $mensaje = null;
        if($_SERVER['REQUEST_METHOD'] === 'POST') {
            $respuestas = $_POST['contacto'];

            $mail = new PHPMailer();
            
            // Configurar SMTP
            $mail -> isSMTP();
            $mail -> Host =$_ENV['EMAIL_HOST'];
            $mail -> SMTPAuth = true;
            $mail -> Username =$_ENV['EMAIL_USER'];
            $mail -> Password =$_ENV['EMAIL_PASS'];
            $mail -> SMTPSecure ='tls';
            $mail -> Port =$_ENV['EMAIL_PORT'];


            // Configurar contenido email
            $mail -> setFrom('admin@bienesraices.com', 'BienesRaices.com');
            $mail -> addAddress('admin@bienesraices.com');
            $mail -> Subject = 'Tienes un mensaje nuevo';

            // Habilitar HTML
            $mail -> isHTML(true);
            $mail -> CharSet = 'UTF-8';

            // Definir el contenido /** BODY **/
            $contenido = '<html>';
            $contenido .= '<p>Tienes un nuevo mensaje</p>';
            $contenido .= '<p>Nombre: ' . $respuestas['nombre'] . '</p>';
            // Campos condicionales (email o telefono)
            if($respuestas['contacto'] === 'telefono' ) {
                $contenido .= '<p>Eligió ser contactado por teléfono:</p>';
                $contenido .= '<p>Teléfono: ' . $respuestas['telefono'] . '</p>';
                $contenido .= '<p>Fecha preferida: ' . $respuestas['fecha'] . '</p>';
                $contenido .= '<p>Hora preferida: ' . $respuestas['hora'] . '</p>';
            } else {
                $contenido .= '<p>Eligió ser contactado por email:</p>';
                $contenido .= '<p>Email: ' . $respuestas['email'] . '</p>';
            }
            $contenido .= '<p>Mensaje: ' . $respuestas['mensaje'] . '</p>';
            $contenido .= '<p>Vende o compra: ' . $respuestas['tipo'] . '</p>';
            $contenido .= '<p>Precio o presupuesto: ' . $respuestas['presupuesto'] . ' €</p>';
            $contenido .= '</html>';
            
            $mail -> Body = $contenido;

            // Definir el contenido alternativo /** ALTBODY **/
            $contenidoAlt = 'Tienes un mensaje nuevo' . ' |';
            $contenidoAlt .= ' Nombre: ' . $respuestas['nombre'] . ' |';
            if($respuestas['contacto'] === 'telefono'){
                $contenidoAlt .= ' Eligió ser contactado por teléfono: ';
                $contenidoAlt .= ' Teléfono: ' . $respuestas['telefono'] . ' |';
                $contenidoAlt .= ' Fecha preferida: ' . $respuestas['fecha'] . ' |';
                $contenidoAlt .= ' Hora preferida: ' . $respuestas['hora'] . ' |';
            } else {
                $contenidoAlt .= ' Eligió ser contactado por email: ';
                $contenidoAlt .= ' Email: ' . $respuestas['email'] . ' |';
            }
            $contenidoAlt .= ' Mensaje: ' . $respuestas['mensaje'] . ' |';
            $contenidoAlt .= ' Vende o compra: ' . $respuestas['tipo'] . ' |';
            $contenidoAlt .= ' Precio o presupuesto: ' . $respuestas['presupuesto'] . ' €' . ' |';

            $mail -> AltBody = $contenidoAlt;

            // Enviar el email
            if($mail->send()){
                $mensaje = 'Mensaje enviado correctamente';
            } else {
                $mensaje = 'El mensaje no pudo ser enviado';
            }
            
        }
        $router -> render('paginas/contacto', [
            'mensaje' => $mensaje
        ]);
    }
}