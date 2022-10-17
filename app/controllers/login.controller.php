<?php

require_once './app/helpers/auth.helper.php';
require_once './app/views/login.view.php';
require_once './app/models/usuarios.model.php';

class loginController{
    private $loginView;
    private $authHelper;
    private $usuariosModel;

    function __construct(){
        $this->loginView = new loginView();
        $this->authHelper = new authHelper();
        $this->usuariosModel = new usuariosModel();
    }

    function mostrarLogin(){
        $this->loginView->mostrarLogin();
    }

    function ingresar(){
        $usuario = $_POST['nombreUser'];
        $password = $_POST['password'];
        
        $usuarioDB = $this->usuariosModel->obtenerUsuario($usuario);

        if($usuarioDB == false){
            $this->loginView->mostrarLogin('No existe el usuario ingresado');
        }else{
            if(password_verify($password, $usuarioDB->password)){
                $this->authHelper->logear($usuarioDB);
                header('Location: ' . BASE_URL);
            }else{
                $this->loginView->mostrarLogin('Contraseña incorrecta');
            }
        }
    }

    function deslogearse(){
        $this->authHelper->deslogear();
        header('Location: ' . BASE_URL);
    }
}