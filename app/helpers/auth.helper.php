<?php

class authHelper{

    public function verificarLogeado(){
        if(session_status() != PHP_SESSION_ACTIVE){
            session_start();
            echo "hola";
            echo $_SESSION['USERNAME'];
        }
        if(!isset($_SESSION['USERNAME'])){
            echo "hola";
            header("Location: ". BASE_URL . "login");
        }
    }

    public function deslogear(){
        if(session_status() != PHP_SESSION_ACTIVE){
            session_start();
        }
        session_destroy();
    }

    public function logear($usuario){
        session_start();
        $_SESSION['ID_USER'] = $usuario->id;
        $_SESSION['USERNAME'] = $usuario->usuario;
    }

    public function getNombreUsuario(){
        if(session_status() != PHP_SESSION_ACTIVE){
            session_start();
        }

        if(isset($_SESSION['USERNAME'])){
            return $_SESSION['USERNAME'];
        }else{
            return null;
        }
    }
}