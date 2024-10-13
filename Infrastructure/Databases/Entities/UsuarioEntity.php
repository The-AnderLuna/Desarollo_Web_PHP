<?php
require_once $_SERVER["DOCUMENT_ROOT"] . "/Proyecto_Web_PHP_/Infrastructure/Lib/Config.php";
require_once $_SERVER["DOCUMENT_ROOT"] . "/Proyecto_Web_PHP_/Domain/Model/UsuarioModel.php";

class UsuarioEntity extends ActiveRecord\Model
{

    public static $table_name = "usuarios";
    public static $primary_key = "id";

    //relaciones 
    public static $has_many = [["Cursos"]];


    // Método para mapear UsuarioEntity a UsuarioModel
    public function mapperEntityToModel(): UsuarioModel
    {
        $usuarioModel = new UsuarioModel(
            
            $this->password,
            $this->nombre,
            $this->apellidos,
            $this->rol,
            $this->email,
            $this->telefono,
            $this->estado,
            $this->fecha_registro
        );

        return $usuarioModel;
    }

    public static function mapperModelToEntity(UsuarioModel $usuarioModel): UsuarioEntity
    {
        $usuarioEntity = new UsuarioEntity();
        $usuarioEntity->password = $usuarioModel->getPassword();
        $usuarioEntity->nombre = $usuarioModel->getNombre();
        $usuarioEntity->apellidos = $usuarioModel->getApellidos();
        $usuarioEntity->rol = $usuarioModel->getRol();
        $usuarioEntity->email = $usuarioModel->getEmail();
        $usuarioEntity->telefono = $usuarioModel->getTelefono();
        $usuarioEntity->estado = $usuarioModel->getEstado();
        $usuarioEntity->fecha_registro = $usuarioModel->getFechaRegistro();
        return $usuarioEntity;
    }
}
    