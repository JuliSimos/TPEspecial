<?php
require_once './libs/smarty/libs/Smarty.class.php';

class loginView{
    private $smarty;

    function __construct(){
        $this->smarty = new Smarty();
    }

    function mostrarLogin($error = null){

        $this->smarty->assign('error', $error);
        $this->smarty->display('login.tpl');
    }
}