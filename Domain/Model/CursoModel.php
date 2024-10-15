<?php
class CursoModel
{
    private $id;
    private $nombre;
    private $duracion;
    private $estudiantes;
    private $fecha_inicio;
    private $usuario_id;

    public function __construct($id, $nombre, $duracion, $estudiantes, $fecha_inicio, $usuario_id)
    {
        $this->id = $id;
        $this->nombre = $nombre;
        $this->duracion = $duracion;
        $this->estudiantes = $estudiantes;
        $this->fecha_inicio = $fecha_inicio;
        $this->usuario_id = $usuario_id;
    }


    // Validaciones
    public function validar()
    {
        $errores = [];
        if (empty($this->nombre)) {
            $errores[] = "El nombre del curso es obligatorio.";
        }
        if ($this->duracion <= 0) {
            $errores[] = "La duración del curso debe ser mayor a cero.";
        }
        if (empty($this->fecha_inicio)) {
            $errores[] = "La fecha de inicio es obligatoria.";
        }
        return $errores;
    }

    // Getters
    public function getId()
    {
        return $this->id;
    }

    public function getNombre()
    {
        return $this->nombre;
    }

    public function getDuracion()
    {
        return $this->duracion;
    }

    public function getEstudiantes()
    {
        return $this->estudiantes;
    }

    public function getFechaInicio()
    {
        return $this->fecha_inicio;
    }

    public function getUsuarioId()
    {
        return $this->usuario_id;
    }

    // Setters
    public function setId($id)
    {
        $this->id = $id;
    }

    public function setNombre($nombre)
    {
        $this->nombre = $nombre;
    }

    public function setDuracion($duracion)
    {
        $this->duracion = $duracion;
    }

    public function setEstudiantes($estudiantes)
    {
        $this->estudiantes = $estudiantes;
    }

    public function setFechaInicio($fecha_inicio)
    {
        $this->fecha_inicio = $fecha_inicio;
    }

    public function setUsuarioId($usuario_id)
    {
        $this->usuario_id = $usuario_id;
    }
}
