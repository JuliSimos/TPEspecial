<?php
require_once './libs/smarty/libs/Smarty.class.php';

class infoView{

    private $smarty;

    function __construct(){
        $this->smarty = new Smarty();
    }
    function mostrarInfo($pelicula, $error = null){
        $this->smarty->assign('error', $error);
        $this->smarty->assign('pelicula', $pelicula);
        $this->smarty->display('infoPeliculas.tpl');
    }

    function mostrarPeliculas($peliculas, $error = null){
        $this->smarty->assign('error', $error);
        $this->smarty->assign('peliculas', $peliculas);
        $this->smarty->display('peliculas.tpl');
    }
}