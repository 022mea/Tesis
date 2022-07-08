<?php
date_default_timezone_set("America/Guayaquil");
class Docente{
    //Atributos
    private $idDocente;
    private $nombres;
    private $apellidos;
    private $correo;
    private $cedula;
    private $idCurso;
    private $idParalelo;
    private $estado;
    //Constructor
    public function __construct()
    {
        $this->idDocente = 0;
        $this->nombres = "";
        $this->apellidos = "";
        $this->correo = "";
        $this->cedula = "";
        $this->idCurso = 0;
        $this->idParalelo = 0;
        $this->estado = 0;
    }
    //Metodo get and set
    public function getIdDocente()
    {
        return $this->idDocente;
    }
 
    public function getNombres()
    {
        return $this->nombres;
    }
    public function getApellidos()
    {
        return $this->apellidos;
    }
    public function getCorreo()
    {
        return $this->correo;
    }
    public function getCedula()
    {
        return $this->cedula;
    }
    public function getIdCurso()
    {
        return $this->idCurso;
    }
 
    public function getIdParalelo()
    {
        return $this->idParalelo;
    }
    public function getEstado()
    {
        return $this->estado;
    }
 
    public function setIdDocente($idDocente)
    {
        $this->idDocente = $idDocente;
    }
    public function setNombres($nombres)
    {
        $this->nombres = $nombres;
    }
    public function setApellidos($apellidos)
    {
        $this->apellidos = $apellidos;
    }
    public function setCorreo($correo)
    {
        $this->correo = $correo;
    }
    public function setCedula($cedula)
    {
        $this->cedula = $cedula;
    }
    public function setIdCurso($idCurso)
    {
        $this->idCurso = $idCurso;
    }
    public function setIdParalelo($idParalelo)
    {
        $this->idParalelo = $idParalelo;
    }
    public function setEstado($estado)
    {
        $this->estado = $estado;
    }








}


?>