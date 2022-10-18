<?php

require_once './app/models/peliculas.models.php';
require_once './app/models/generos.models.php';
require_once './app/views/admin.view.php';
require_once './app/helpers/auth.helper.php';

class adminController
{
    private $adminView;
    private $pelisModel;
    private $generosModel;
    private $authHelper;

    function __construct()
    {
        $this->authHelper = new authHelper();    
        $this->adminView = new adminView();
        $this->pelisModel = new peliculasModel();
        $this->generosModel = new generosModel();
    }

    function agregarPeli()
    {
        $this->authHelper->verificarLogeado();
        if (
            !empty($_POST['nombre']) && !empty($_POST['sinopsis']) && !empty($_POST['fecha']) &&
            !empty($_POST['pais']) && !empty($_POST['direccion']) && !empty($_POST['genero'])
        ) {
            $nombre = $_POST['nombre'];
            $sinopsis = $_POST['sinopsis'];
            $fecha = $_POST['fecha'];
            $pais = $_POST['pais'];
            $direccion = $_POST['direccion'];
            $genero = $_POST['genero'];
            $this->pelisModel->addPeli($nombre, $sinopsis, $fecha, $pais, $direccion, $genero);
            $this->mostrarPanel();
        }else{
            $this->mostrarPanel('Hay campos sin completar');
        }
    }

    function agregarGenero()
    {
        $this->authHelper->verificarLogeado();

        if (!empty($_POST['genero'])) {
            $newGenero = $_POST['genero'];
            $this->generosModel->addGenero($newGenero);
            $this->mostrarPanel();
        }else{
            $this->mostrarPanel('El campo "Genero" está sin completar');
        }
    }


    function editPeli($id)
    {
        $this->authHelper->verificarLogeado();

        $peli = $this->pelisModel->getPeli($id);
        $generos = $this->generosModel->getAll();
        if($peli != false){
            $peli = $this->asignarGeneroIndividual($peli);
        }

        if (
            isset($_POST['nombre']) && isset($_POST['sinopsis']) && isset($_POST['fecha']) &&
            isset($_POST['pais']) && isset($_POST['direccion']) && isset($_POST['genero'])
        ) {

            if (empty($_POST['nombre']))
                $nombre = $peli->nombre;
            else
                $nombre = $_POST['nombre'];

            if (empty($_POST['sinopsis']))
                $sinopsis = $peli->sinopsis;
            else
                $sinopsis = $_POST['sinopsis'];

            if (empty($_POST['fecha']))
                $fecha = $peli->fecha;
            else
                $fecha = $_POST['fecha'];

            if (empty($_POST['pais']))
                $pais = $peli->pais;
            else
                $pais = $_POST['pais'];

            if (empty($_POST['direccion']))
                $direccion = $peli->direccion;
            else
                $direccion = $_POST['direccion'];

            if (empty($_POST['genero']))
                $genero = $peli->genero;
            else
                $genero = $_POST['genero'];

            $id = $peli->id;
            $this->pelisModel->editarPeli($nombre, $sinopsis, $fecha, $pais, $direccion, $genero, $id);
            header('Location: ' . BASE_URL);
        } else {
            $this->adminView->mostrarPaginaEdicion($peli, $generos);
        }
    }

    function asignarGeneroIndividual($peli)
    {
        $genero = $this->generosModel->getAll();
        foreach ($genero as $elem) {
            if ($elem->id == $peli->id_genero_fk) {
                $peli->genero = $elem->genero;
            }
        }
        return $peli;
    }
    
    function editGenero($idGenero){
        $this->authHelper->verificarLogeado();
        $genero = $this->generosModel->getGenero($idGenero);

        if(isset($_POST['genero'])){
            if(empty($_POST['genero']))
                $tipoGenero = $genero->genero;
            else
                $tipoGenero = $_POST['genero'];

            $id = $genero->id;
            $this->generosModel->editarGenero($tipoGenero, $id);
            header('Location: ' . BASE_URL);
        }
        else{
            $this->adminView->mostrarEditarGenero($genero);
        }
    }

    function borrarPeli($id){
        $this->authHelper->verificarLogeado();

            $this->pelisModel->borrarPeli($id);
            $this->mostrarPanel();

    }

    function borrarGenero($id){
        $this->authHelper->verificarLogeado();


        //se tiene que fijar si ese genero tiene un arreglo de pelis
        if(!$this->generoTienePelis($id)){
            $this->generosModel->borrarGenero($id);
            $this->mostrarPanel();
        }else{
            $this->mostrarPanel('El genero contiene peliculas');
        }
        
    }
    function generoTienePelis($id){
        $arrayPelis = $this->pelisModel->getAll();
        foreach ($arrayPelis as $elem) {
            if($elem->id_genero_fk == $id){
                return true;
            }
        }
        return false;
    }

    function mostrarPanel($error = null){
        $this->authHelper->verificarLogeado();

        $peliculas = $this->pelisModel->getAll();
        $peliculas = $this->asignarGenero($peliculas);
        $generos = $this->generosModel->getAll();

        if($error){
            $this->adminView->mostrarPanel($peliculas, $generos, $error);
        }else{
            $this->adminView->mostrarPanel($peliculas, $generos);
        }
    }

    function asignarGenero($peliculas){
        $generos = $this->generosModel->getAll();

        for ($i=0; $i < count($peliculas); $i++) { 
            foreach ($generos as $elem) {
                if($peliculas[$i]->id_genero_fk == $elem->id)
                    $peliculas[$i]->genero = $elem->genero;
            }
        }


        return $peliculas;
    }
}
