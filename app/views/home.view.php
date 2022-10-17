<?php
require_once './libs/smarty/libs/Smarty.class.php';
require_once './app/helpers/auth.helper.php';

class homeView{

    private $smarty;
    private $authHelper;

    function __construct($generosHead){
        $this->authHelper = new authHelper();    
        $this->smarty = new Smarty();

        $usuario = $this->authHelper->getNombreUsuario();
        $this->smarty->assign('nombreUser', $usuario);

        $this->smarty->assign('generosHeader', $generosHead);
        $this->smarty->display('header.tpl');
    }

    function mostrarHome($peliculas, $generos, $error = null){

        $this->smarty->assign('peliculas', $peliculas);
        
        $this->smarty->assign('error', $error);

        
        $this->smarty->display('inicio.tpl');


    }




}