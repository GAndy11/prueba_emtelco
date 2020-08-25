<?php

require_once './models/baseModel.php';

class personasModel extends baseModel {

    private $DNI;
    private $nombre;
    private $fechaNacimiento;
    private $direccion;
    private $telefono;

    public function setDNI($DNI)
    {
        $this->DNI = $DNI;
    }

    public function getDNI()
    {
        return $this->DNI;
    }

    public function setNombre($nombre)
    {
        $this->nombre = $nombre;
    }

    public function getNombre()
    {
        return $this->nombre;
    }

    public function setFechaNacimiento($fechaNacimiento)
    {
        $this->fechaNacimiento = $fechaNacimiento;
    }

    public function getFechaNacimiento()
    {
        return $this->fechaNacimiento;
    }

    public function setDireccion($direccion)
    {
        $this->direccion = $direccion;
    }

    public function getDireccion()
    {
        return $this->direccion;
    }

    public function setTelefono($telefono)
    {
        $this->telefono = $telefono;
    }

    public function getTelefono()
    {
        return $this->telefono;
    }
    

    public function getAll(){

        $result = true;

        $sql= "
            SELECT
                *
            FROM
                tbl_personas
        ";

        $personas = $this->db->query($sql);

        if($personas && $personas->num_rows >= 1){

            $result = $personas;
        }else{

            $result = false;
        }

        return $result;       
    }

    public function GuardarPersona(){

        $result = true;

        $sql = "
            INSERT INTO
                tbl_personas
            (
                DNI,
                nombre,
                fecha_nacimiento,
                direccion, 
                telefono
            )VALUES(
                '{$this->DNI}',
                '{$this->nombre}',
                '{$this->fechaNacimiento}',
                '{$this->direccion}',
                '{$this->telefono}'

            )
        ";

        $save = $this->db->query($sql);

        if(!$save){
            $result = "No se pudo ingresar el registro en la BD";
        }

        return $result;
    }

    public function ConsultarPersona(int $id){

        $result = true;

        $sql= "
            SELECT
                *
            FROM
                tbl_personas
            WHERE
                id = {$id}
        ";

        $persona = $this->db->query($sql);

        if($persona && $persona->num_rows == 1){

            while($per = $persona->fetch_object()){

                $this->DNI = $per->DNI;
                $this->nombre = $per->nombre;
                $this->fechaNacimiento = $per->fecha_nacimiento;
                $this->direccion = $per->direccion;
                $this->telefono = $per->telefono;

                $result = true;
            }

            
        }else{

            $result = false;
        }

        return $result;
    }

    public function ActualizarPersona(int $id){

        $result = true;

        $sql = "
            UPDATE
                tbl_personas
            SET
                DNI = '{$this->DNI}',
                nombre = '{$this->nombre}',
                fecha_nacimiento = '{$this->fechaNacimiento}',
                direccion = '{$this->direccion}',  
                telefono = '{$this->telefono}'
            WHERE   
                id = {$id} 
        ";

        
        $save = $this->db->query($sql);
        
        if(!$save){
            $result = "No se pudo actualizar el registro en la BD";
        }

        return $result;
    }

    public function BorrarPersona(int $id){

        $result = true;

        $sql = "
            DELETE FROM
                tbl_personas
            WHERE   
                id = {$id} 
        ";

        
        $delete = $this->db->query($sql);
        
        
        if(!$delete){
            $result = false;
        }

        return $result;

    }
}