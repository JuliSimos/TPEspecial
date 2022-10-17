<?php

require_once './app/views/info.view.php';
require_once './app/models/peliculas.models.php';
require_once './app/models/generos.models.php';

class infoController{

    private $infoView;
    private $peliculasModel;
    private $generosModel;

    function __construct(){
        $this->infoView = new infoView();
        $this->peliculasModel = new peliculasModel();
        $this->generosModel = new generosModel();
    }

    function mostrarInfo($id){
        $pelicula = $this->peliculasModel->getPeli($id);
        $dbGeneros = $this->generosModel->getAll();

        if($pelicula == false){
            $pelicula = null;
            $this->infoView->mostrarInfo($pelicula, 'La pelicula no existe');
        }else{

            foreach($dbGeneros as $elem){
                if($elem->id == $pelicula->id_genero_fk)
                $pelicula->genero = $elem->genero;
            }
            
            $this->infoView->mostrarInfo($pelicula);
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

    function mostrarPelisDeGenero($id){
        $peliculas = $this->peliculasModel->getPelisGenero($id);
        $peliculas = $this->asignarGenero($peliculas);

        if(count($peliculas) > 0){
            $this->infoView->mostrarPeliculas($peliculas);
        }else{
            $this->infoView->mostrarPeliculas($peliculas, 'No hay peliculas de este género');
        }
    }

    function mostrarError($error){
        $this->infoView->mostrarInfo(null, $error);
    }
}