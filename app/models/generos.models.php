<?php

class generosModel{
    private $db;
    function __construct(){
        $this->connect();
    }
    function connect(){
        $this->db = new PDO('mysql:host=localhost;' . 'dbname=db_peliculas;charset=utf8', 'root', '');
    }
    function getAll(){
        $query = $this->db->prepare('SELECT * FROM generos');
        $query->execute();

        $result = $query->fetchAll(PDO::FETCH_OBJ);
        return $result;
    }

    function addGenero($genero){
        $query = $this->db->prepare('INSERT INTO generos (genero) VALUES (?)');
        $query->execute([$genero]);
    }

    function editarGenero($tipoGenero, $id){
        $query = $this->db->prepare('UPDATE generos SET genero = ? WHERE id = ?' );
        $query->execute([$tipoGenero, $id]);
    }

    function getGenero($id){
        $query = $this->db->prepare('SELECT * FROM generos WHERE id = ?');
        $query->execute([$id]);
        $result = $query->fetch(PDO::FETCH_OBJ);
        return $result;
    }

    function borrarGenero($id){
        $query = $this->db->prepare('DELETE FROM generos WHERE id = ?');
        $query->execute([$id]);
    }
}