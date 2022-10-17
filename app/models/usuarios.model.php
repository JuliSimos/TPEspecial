<?php

class usuariosModel{
    private $db;

    function __construct(){
        $this->connect();
    }

    function connect(){
        $this->db = new PDO('mysql:host=localhost;' . 'dbname=db_peliculas;charset=utf8', 'root', '');
    }

    function obtenerUsuario($usuario){
        $query = $this->db->prepare('SELECT * FROM usuarios WHERE usuario = ?');
        $query->execute([$usuario]);

        $resultado = $query->fetch(PDO::FETCH_OBJ);
        return $resultado;
    }
}