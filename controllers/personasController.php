<?php
require_once './models/personasModel.php';

class personasController{

    public function index($men = "")
    {
        $mensaje = $men;
        $personas = $this->listarPersonas();

        if (!$personas) {
            $mensaje = "No hay registros para mostrar";
            echo "<script>$(document).ready(function(){ ToggleMensaje('Mostrar'); });</script>";
        }
        
        echo "<script>$(document).ready(function(){ ToggleMensaje('Mostrar'); });</script>";
        include_once "./views/listar_personas.php";
    }

    public function listarPersonas(){

        $personas = new personasModel();

        return $personas->getAll();
    }

    public function CrearPersona(){

        $mensaje = "";

        include_once "./views/crear_personas.php";
    }

    public function GuardarPersona(){

        $mensaje = "";

        $camposObligatorios = [
            "DNI" => $_POST['dni'],
            "Nombre" => $_POST['nombre'],
            "Fecha de Nacimiento" => $_POST['fecha_nacimiento'],
            "Dirección" => $_POST['direccion'],
            "Teléfono" => $_POST['telefono']
        ];

        foreach ($camposObligatorios as $key => $value) {
            if ($value == "") 
            {
                $mensaje .= "El campo:  $key no puede quedar vacío <br>";
            }
        }

        //echo "<script>$(document).ready(function(){ ToggleMensaje('Mostrar'); });</script>";

        if($mensaje != ""){
            include_once './views/crear_personas.php';
            echo "<script>$(document).ready(function(){ ToggleMensaje('Mostrar'); });</script>";
            die();
        }

        //Crear la persona
        $persona = new personasModel();
        $persona->setDNI($_POST['dni']);
        $persona->setNombre($_POST['nombre']);
        $persona->setFechaNacimiento($_POST['fecha_nacimiento']);
        $persona->setDireccion($_POST['direccion']);
        $persona->setTelefono($_POST['telefono']);

        $respuesta = $persona->GuardarPersona();

        if($respuesta === true){
            $mensaje = "Registro guardado con éxito";
        }else{
            $mensaje = $respuesta;
        }

        //include_once './views/crear_personas.php';
        //echo "<script>$(document).ready(function(){ ToggleMensaje('Mostrar'); });</script>";

        $this->index($mensaje);
    }

    public function EditarPersona(){
        $mensaje = "";

        $persona = new personasModel();
        if(!$persona->ConsultarPersona($_GET['id'])){
            $mensaje = "Persona no existe en la BD";
        }        

        include_once "./views/editar_personas.php";
    }

    public function ActualizarPersona(){

        $mensaje = "";

        $camposObligatorios = [
            "DNI" => $_POST['dni'],
            "Nombre" => $_POST['nombre'],
            "Fecha de Nacimiento" => $_POST['fecha_nacimiento'],
            "Dirección" => $_POST['direccion'],
            "Teléfono" => $_POST['telefono']
        ];

        foreach ($camposObligatorios as $key => $value) {
            if ($value == "") 
            {
                $mensaje .= "El campo:  $key no puede quedar vacío <br>";
            }
        }

        //echo "<script>$(document).ready(function(){ ToggleMensaje('Mostrar'); });</script>";

        if($mensaje != ""){
            include_once './views/editar_personas.php';
            echo "<script>$(document).ready(function(){ ToggleMensaje('Mostrar'); });</script>";
            die();
        }

        //Actualizar la persona
        $persona = new personasModel();
        $persona->setDNI($_POST['dni']);
        $persona->setNombre($_POST['nombre']);
        $persona->setFechaNacimiento($_POST['fecha_nacimiento']);
        $persona->setDireccion($_POST['direccion']);
        $persona->setTelefono($_POST['telefono']);

        $respuesta = $persona->ActualizarPersona($_POST['id']);

        if($respuesta === true){
            $mensaje = "Registro actualizado con éxito";
        }else{
            $mensaje = $respuesta;
        }

        //include_once './views/editar_personas.php';
        //echo "<script>$(document).ready(function(){ ToggleMensaje('Mostrar'); });</script>";

        $this->index($mensaje);
    }

    public function BorrarPersona(){

        $mensaje = "";

        $persona = new personasModel();
        $resultado = $persona->BorrarPersona($_GET['id']);

        if(!$resultado){
            $mensaje = "No se pudo eliminar el registro en la BD";
        }

        $this->index($mensaje);
        
    }
}