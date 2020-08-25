<?php
//Con esta clase se cargan todos los controladores de la carpeta controllers
function ControllerAutoload($classname){
	include 'controllers/' . $classname . '.php';
}

spl_autoload_register('ControllerAutoload');