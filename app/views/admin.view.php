<?php

class adminView{
    private $smarty;

    function __construct(){
        $this->smarty = new Smarty();
    }

    function mostrarPaginaEdicion($pelicula,$generos, $error = null){
        $this->smarty->assign('error', $error);
        $this->smarty->assign('pelicula', $pelicula);
        $this->smarty->assign('generos', $generos);
        $this->smarty->display('infoPeliculas.tpl');
        $this->smarty->display('editPeli.tpl');
    }

    function mostrarEditarGenero($genero){
        $this->smarty->assign('genero',$genero);
        $this->smarty->display('editGenero.tpl');
    }
    function mostrarPanel($peliculas, $generos, $error = null){
        $this->smarty->assign('error', $error);
        $this->smarty->assign('peliculas', $peliculas);
        $this->smarty->assign('generos', $generos);

        $this->smarty->display('panelAdmin.tpl');
    }
}