<?php

namespace Model;

class ActiveRecord {
    public static $db;
    // Crear arreglo con los nombres de las columnas de propiedades
    public static $columnasDB = [];
    protected static $tabla = '';

    // Errores
    protected static $errores = [];

    // Definir conexión a la BD
    public static function setDB($database){
        self::$db = $database;
    }



    public function guardar() {
        // Actualizar
        if(!is_null($this -> id)) {
            $this -> actualizar();
        } else {
            $this -> crear();
        } 
    }

    public function crear() {
        // Guardar datos sanitizados
        $atributos = $this->sanitizarAtributos();
        
        // Insertar en la BD
        $query = "INSERT INTO " . static::$tabla . " ( "; 
        $query.= join(', ', array_keys($atributos)); 
        $query.= " ) VALUES ('"; 
        $query.= join("', '",array_values($atributos));
        $query.= "');";

        $resultado = self::$db -> query($query);
        
        if($resultado) {
        header('Location: /admin?resultado=1');
        }
    }  
    
    public function actualizar () {
        // Guardar datos sanitizados
        $atributos = $this->sanitizarAtributos();


        $valores = [];
        foreach ($atributos as $key => $value) {
            $valores[] = "{$key} = '{$value}'";
        }

        $query = "UPDATE " . static::$tabla . " SET ";
        $query .= join(', ', $valores);
        $query .= " WHERE id = '" . self::$db-> escape_string($this->id) . "' ";
        $query .= "LIMIT 1;";

        $resultado = self::$db->query($query);
        if($resultado) {
            header('Location: /admin?resultado=2');
        }
    }
    public function eliminar() {
        $query = "DELETE FROM " . static::$tabla . " WHERE id = " . self::$db -> escape_string($this -> id) . " LIMIT 1";
        $resultado = self::$db->query($query);
        if($resultado) {
            $this -> borrarImagen();
            header('Location: /admin?resultado=3');
        }
    }   

    // Crear arreglo de atributos. Recorrer el arreglo de columnas(estático) como variable columna. Darle valores a los atributos con el valor de la columna.
    public function atributos() {
        $atributos = [];
        foreach(static::$columnasDB as $columna) {
            if($columna === 'id') continue;
            $atributos[$columna] = $this->$columna;
        }
        return $atributos;
    }

    // Sanitizar atributos
    public function sanitizarAtributos() {
        $atributos = $this->atributos();
        $sanitizado = [];
        foreach($atributos as $key => $value) {
            $sanitizado[$key] = self::$db -> escape_string($value);
        }
        return $sanitizado;
    }   

    // Subida de Archivos
    public function setImagen($imagen){
        // Elimina la imagen previa
        if(!is_null($this -> id)) {
            $this->borrarImagen();
        }
        // Asignar al atributo imagen el nombre de la imagen
        if($imagen){
            $this -> imagen = $imagen;
        }
    }

    public function borrarImagen() {
        $existeArchivo = file_exists(CARPETA_IMAGENES . $this -> imagen);
        if($existeArchivo) {
            unlink(CARPETA_IMAGENES . $this -> imagen);
        }
    }

    // Validación
    public static function getErrores(){
        return static::$errores;
    }
    public function validar() {
        static::$errores = [];
        return static::$errores;
    }

    // Lista todas las propiedades
    public static function all(){
        $query = "SELECT * FROM " . static::$tabla ;
        $resultado = self::consultarSQL($query);
        return $resultado;
    }
    // Obtener un número determinado de registros
    public static function get($cantidad){
        $query = "SELECT * FROM " . static::$tabla . " LIMIT " . $cantidad;
        $resultado = self::consultarSQL($query);
        return $resultado; 
    }

    // Busca una propiedad por su id
    public static function find($id) {
        $query = "SELECT * FROM " . static::$tabla . " WHERE id=${id};";
        $resultado = self::consultarSQL($query);
        return array_shift($resultado);
    }

    public static function consultarSQL($query){
        // Consultar la BD
        $resultado = self::$db->query($query);

        // Iterar los resultados
        $array = [];
        while ($registro = $resultado ->fetch_assoc()) {
            $array[] = static::crearObjeto($registro);
        }
        
        // Liberar memoria
        $resultado -> free();

        // Retornar resultados
        return $array;
    }

    protected static function crearObjeto($registro) {
        $objeto = new static;
        foreach ($registro as $key => $value) {
            if(property_exists($objeto, $key)) {
                $objeto -> $key = $value;
            }
        }
        return $objeto;
    }

    // Sincroniza el objeto en memoria con los cambios realizados por el usuario
    public function sincronizar ($args = []) {
        foreach ($args as $key => $value) {
            if(property_exists($this, $key) && !is_null($value)) {
                $this -> $key = $value;
            }
        }
    }
}