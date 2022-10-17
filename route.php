<?php

require_once './app/controllers/home.controller.php';
require_once './app/controllers/admin.controller.php';
require_once './app/controllers/info.controller.php';
require_once './app/controllers/login.controller.php';

define('BASE_URL', '//' . $_SERVER['SERVER_NAME'] . ':' . $_SERVER['SERVER_PORT'] . dirname($_SERVER['PHP_SELF']) . '/');

// lee la acción
if (!empty($_GET['action'])) {
    $action = $_GET['action'];
} else {
    $action = 'home'; // acción por defecto si no envían
}
// instancia el único controller que existe por ahora
$homeController = new homeController();
$adminController = new adminController();
$infoController = new infoController();
$loginController = new loginController();


// parsea la accion Ej: sumar/1/2 --> ['sumar', 5, 4]
$params = explode('/', $action);
//tabla de ruteo
switch ($params[0]) {
    case 'home':
        $homeController->mostrarHome();
        break;
    // case 'agregarPeli':
    //     $adminController->agregarPeli();
    //     break;
    // case 'agregarGenero':
    //     $adminController->agregarGenero();
    //     break;
    // case 'edit':
    //     $id = $params[1];
    //     $adminController->editPeli($id);
    //     break;
    // case 'editGenero':
    //     $id = $params[1];
    //     $adminController->editGenero($id);
    //     break;
    // case 'borrar':
    //     $id = $params[1];
    //     $adminController->borrarPeli($id);
    //     break;
    // case 'borrarGenero':
    //     $id = $params[1];
    //     $adminController->borrarGenero($id);
    //     break;
    // case 'infoGeneros':
    //     $id = $params[1];
    //     $infoController->mostrarPelisDeGenero($id);
    //     break;
    case 'info':
        if(isset($params[1]) && $params[1] == 'generos' || $params[1] == 'peliculas'){
            $opcion = $params[1];
            if(isset($params[2])){
                $id = $params[2];
            }else{
                $infoController->mostrarError('No se seleccionó ningún elemento');
                break;
            }

        if($opcion == 'generos'){
            $infoController->mostrarPelisDeGenero($id);
        }
        else if ($opcion == 'peliculas'){
            $infoController->mostrarInfo($id);
        }

        break; 

        }else{
            header('Location: ' . BASE_URL);
            break;
        }
    case 'login':
        if (isset($params[1]) && $params[1] == 'verificar') {
            $loginController->ingresar();
        } else {
            $loginController->mostrarLogin();
        }
        break;
    case 'deslogearse':
        $loginController->deslogearse();
        break;
    case 'panel':
        if (isset($params[1])) {

            if (isset($params[2])) {
                if ($params[2] == 'editar' || $params[2] == 'borrar' || $params[2] == 'agregar') {
                    $opcion = $params[2];
                    if ($params[2] != 'agregar') {
                        if (isset($params[3])) {
                            $id = $params[3];
                        } else {
                            $adminController->mostrarPanel('No se seleccionó ningún elemento');
                            break;
                        }
                    }
                } else {
                    $adminController->mostrarPanel();
                    break;
                }
            }

            if ($params[1] == 'pelicula') {
                if ($opcion == 'agregar')
                    $adminController->agregarPeli();
                else if ($opcion == 'borrar')
                    $adminController->borrarPeli($id);
                else if ($opcion == 'editar')
                    $adminController->editPeli($id);

                break;
            } else if ($params[1] == 'genero') {    
                if ($opcion == 'agregar')
                    $adminController->agregarGenero();
                else if ($opcion == 'borrar')
                    $adminController->borrarGenero($id);
                else if ($opcion == 'editar')
                    $adminController->editGenero($id);

                break;
            } else {
                $adminController->mostrarPanel();
                break;
            }
        } else {
            $adminController->mostrarPanel();
            break;
        }
    default:
        echo "hola default";
        break;
}
