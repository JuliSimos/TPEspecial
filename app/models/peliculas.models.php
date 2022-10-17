<?php

class peliculasModel{
    private $db;

    function __construct(){
        $this->connect();
    }
    function connect(){
        $this->db = new PDO('mysql:host=localhost;' . 'dbname=db_peliculas;charset=utf8', 'root', '');
    }

    function getAll(){
        $query = $this->db->prepare('SELECT * FROM peliculas');
        $query->execute();

        $result = $query->fetchAll(PDO::FETCH_OBJ);
        return $result;
    }

    function addPeli($nombre, $sinopsis, $fecha, $pais, $direccion, $genero){

        $query = $this->db->prepare('INSERT INTO peliculas (nombre, sinopsis, fecha, pais, direccion, id_genero_fk) VALUES (?, ?, ?, ?, ?, ?)');
        $query->execute([$nombre, $sinopsis, $fecha, $pais, $direccion, $genero]);
    }

        /*
            ESTRUCTURA BASICA:
                $query = $this->db->prepare(COMANDO A EJECUTAR)
                $query->execute([PARAMETROS A PASAR])

            OBTENEMOS EL RESULTADO Y LO GUARDAMOS EN UN OBJETO
                $result = $query->fetchAll(PDO::FETCH_OBJ) 
            DEVOLVEMOS EL RESULTADO
                return $result

            COMANDOS A EJECUTAR POSIBLES:
                CRUD:
                    Create (insertar)
                        prepare('INSERT INTO tabla (valor1, valor2, valor3, ...) VALUES (?, ?, ?, ...)')
                        execute([valor1, valor2, valor3])
                    Read (leer, traerse los datos)
                        prepare('SELECT * FROM peliculas')
                        execute()
                    Update (Actualizar)
                        prepare('UPDATE tabla SET valor1 = ?, valor2 = ?, valor3 = ? ... WHERE id = ?)
                        execute([valor1, valor2, valor3, ..., id])
                    DELETE (Borrar)
                        prepare('DELETE FROM tabla WHERE id = ?)
                        execute([id])
                    
        */
    function getPeli($id){
        $query = $this->db->prepare('SELECT * FROM peliculas WHERE id = ?');
        $query->execute([$id]);
        $result = $query->fetch(PDO::FETCH_OBJ);
        return $result;
    }
    function editarPeli($nombre,$sinopsis,$fecha,$pais,$direccion, $id_genero_fk, $id){
        $query = $this->db->prepare('UPDATE peliculas SET nombre = ?, sinopsis = ?, fecha = ?, pais = ?, direccion = ?, id_genero_fk = ? WHERE id = ?' );
        $query->execute([$nombre,$sinopsis,$fecha,$pais,$direccion, $id_genero_fk, $id]);
    }
    function borraRPeli($id){
        $query = $this->db->prepare('DELETE FROM peliculas WHERE id = ?');
        $query->execute([$id]);
    }
    function getPelisGenero($idGenero){
        $query = $this->db->prepare('SELECT * FROM peliculas WHERE id_genero_fk = ?');
        $query->execute([$idGenero]);
        $result = $query->fetchAll(PDO::FETCH_OBJ);
        return $result;
    }

}