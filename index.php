<?php

require_once "./autoload.php";
require_once "./views/layouts/header.php";

if(isset($_GET['controller'])){
    $controlador  = $_GET["controller"] . "Controller";
    
}else{

    header("Location: http://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]?controller=personas&action=index");
    exit();
}

if (class_exists($controlador)) {

    $controlador = new $controlador();
    if (isset($_GET['action']) && method_exists($controlador, $_GET['action'])) {
        $action = $_GET['action'];
        $controlador->$action();
    }else {
        echo "La pagina que buscas no existe2";
    }
}else {
    echo "La pagina que buscas no existe3";
}

require_once "./views/layouts/footer.php";