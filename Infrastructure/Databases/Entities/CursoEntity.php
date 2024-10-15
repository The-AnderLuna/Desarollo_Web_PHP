<?php
require_once $_SERVER["DOCUMENT_ROOT"] . "/Proyecto_Web_PHP_/Infrastructure/Lib/Config.php";
require_once $_SERVER["DOCUMENT_ROOT"] . "/Proyecto_Web_PHP_/Domain/Model/CursoModel.php";

class CursoEntity extends ActiveRecord\Model {
    public static $table_name = "cursos"; 
    public static $primary_key = "id";
    public static $belongs_to = [["usuario", "class_name" => "UsuarioEntity", "foreign_key" => "usuario_id"]];

    // Método para mapear CursoEntity a CursoModel
    public function mapperEntityToModel(): CursoModel {
        return new CursoModel(
            $this->id,
            $this->nombre,
            $this->duracion,
            $this->estudiantes,
            $this->fecha_inicio,
            $this->usuario_id
        );
    }

    // Método para mapear CursoModel a CursoEntity
    public static function mapperModelToEntity(CursoModel $cursoModel): CursoEntity {
        $cursoEntity = new CursoEntity();
        $cursoEntity->nombre = $cursoModel->getNombre();
        $cursoEntity->duracion = $cursoModel->getDuracion();
        $cursoEntity->estudiantes = $cursoModel->getEstudiantes();
        $cursoEntity->fecha_inicio = $cursoModel->getFechaInicio();
        $cursoEntity->usuario_id = $cursoModel->getUsuarioId();
        return $cursoEntity;
    }
}
