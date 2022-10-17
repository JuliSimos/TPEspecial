<?php
require_once './app/views/home.view.php';
require_once './app/models/peliculas.models.php';
require_once './app/models/generos.models.php';
require_once './app/helpers/auth.helper.php';

class homeController{
    private $homeView;
    private $peliculasModel;
    private $generosModel;
    private $authHelper;

    function __construct(){
        $this->authHelper = new authHelper();    
        $this->peliculasModel = new peliculasModel();
        $this->generosModel = new generosModel();
        $generosHead = $this->generosModel->getAll();
        $this->homeView = new homeView($generosHead);
    }

    function mostrarHome(){
        $dbPeliculas = $this->peliculasModel->getAll();
        $dbGeneros = $this->generosModel->getAll();
        
        //Llamo a una función que le asigne una nueva key "Genero" a cada "Pelicula" arreglo
        $dbPeliculas = $this->asignarGenero($dbPeliculas);

        $this->homeView->mostrarHome($dbPeliculas,$dbGeneros);
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