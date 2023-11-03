<?php

namespace Model;

class Vendedor extends ActiveRecord {
    protected static $tabla = 'vendedores';
    public static $columnasDB = ['id', 'nombre', 'apellido', 'telefono','imagen'];

    public $id;
    public $nombre;
    public $apellido;
    public $telefono;
    public $imagen;

    public function __construct($args = [])
    {
        $this -> id = $args['id'] ?? null;
        $this -> nombre = $args['nombre'] ?? '';
        $this -> apellido = $args['apellido'] ?? '';
        $this -> telefono = $args['telefono'] ?? '';
        $this -> imagen = $args['imagen'] ?? '';
    }
    public function validar() {
        if(!$this->nombre) {
            self::$errores[] = "Debes añadir un nombre de vendedor";
        }
        if(!$this->apellido) {
            self::$errores[] = "Debes introducir un apellido";
        }
        if(!$this->telefono) {
            self::$errores[] = "Debes introducir un número de teléfono";
        }
        if(!preg_match('/[0-9]{3}-[0-9]{3}-[0-9]{3}/', $this -> telefono)) {
            self::$errores[] = "El teléfono debe seguir el formato XXX-XXX-XXX";
        }
        if(!$this->imagen) {
            self::$errores[] = "Debes añadir una imagen";
        }
        return self::$errores;
    }
}