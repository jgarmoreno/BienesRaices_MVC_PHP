<?php

namespace Model;

class Propiedad extends ActiveRecord {
    protected static $tabla = 'propiedades';
    public static $columnasDB = ['id','titulo', 'precio', 'imagen', 'descripcion', 'habitaciones', 'wc', 'estacionamientos', 'creado', 'vendedores_id'];

    public $id;
    public $titulo;
    public $precio;
    public $imagen;
    public $descripcion;
    public $habitaciones;
    public $wc;
    public $estacionamientos;
    public $creado;
    public $vendedores_id;

    public function __construct($args = [])
    {
        $this -> id = $args['id'] ?? null;
        $this -> titulo = $args['titulo'] ?? '';
        $this -> precio = $args['precio'] ?? '';
        $this -> imagen = $args['imagen'] ?? '';
        $this -> descripcion = $args['descripcion'] ?? '';
        $this -> habitaciones = $args['habitaciones'] ?? '';
        $this -> wc = $args['wc'] ?? '';
        $this -> estacionamientos = $args['estacionamientos'] ?? '';
        $this -> creado = date('Y/m/d');
        $this -> vendedores_id = $args['vendedores_id'] ?? '';
    }

    public function validar() {
        if(!$this->titulo) {
            self::$errores[] = "Debes añadir un título a la propiedad";
        }
        if(!$this->precio) {
            self::$errores[] = "El precio es obligatorio";
        }
        if(strlen($this->descripcion) < 50) {
            self::$errores[] = "La descripción debe tener como mínimo 50 carácteres";
        }
        if(!$this->habitaciones) {
            self::$errores[] = "El número de habitaciones es obligatorio";
        }
        if(!$this->wc) {
            self::$errores[] = "El número de baños es obligatorio";
        }
        if(!$this->estacionamientos) {
            self::$errores[] = "Debes incluir el número de aparcamientos";
        }
        if(!$this->vendedores_id) {
            self::$errores[] = "Debes elegir un vendedor";
        }
        if(!$this->imagen) {
            self::$errores[] = "La imagen es obligatoria";
        }

        return self::$errores;
    }
}
