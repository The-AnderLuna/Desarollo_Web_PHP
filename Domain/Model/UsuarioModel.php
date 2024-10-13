<?php
class UsuarioModel {
   
    private $password;
    private $nombre;
    private $apellidos;
    private $rol;
    private $email;
    private $telefono;
    private $estado;
    private $fecha_registro;

    public function __construct(string $password, string $nombre, string $apellidos, string $rol, string $email, string $telefono, string $estado, string $fecha_registro) {
        if (empty(trim($email))) {
            throw new InvalidArgumentException("El Email es requerido");
        }

        $resultado = $this->validarClave($password);
        if (!$resultado["resultado"]) {
            throw new InvalidArgumentException($resultado["mensaje"]);
        }

        if (empty(trim($nombre))) {
            throw new InvalidArgumentException("El Nombre es requerido");
        }

        if (empty(trim($apellidos))) {
            throw new InvalidArgumentException("Los Apellidos son requeridos");
        }

    
        $this->password = $password;
        $this->nombre = $nombre;
        $this->apellidos = $apellidos;
        $this->rol = $rol;
        $this->email = $email;
        $this->telefono = $telefono;
        $this->estado = $estado;
        $this->fecha_registro = $fecha_registro;
    }
    private function validarClave(string $password): array {
        if (empty(trim($password))) {
            return ["resultado" => false, "mensaje" => "La clave es requerida"];
        }
        if (strlen($password) < 12) {
            return ["resultado" => false, "mensaje" => "La clave debe tener al menos 12 caracteres"];
        }
        return ["resultado" => true, "mensaje" => ""];
    }

    // Getters y setters
   
    public function getPassword(): string {
        return $this->password;
    }

    public function setPassword(string $password): void {
        $this->password = $password;
    }

    public function getNombre(): string {
        return $this->nombre;
    }

    public function setNombre(string $nombre): void {
        $this->nombre = $nombre;
    }

    public function getApellidos(): string {
        return $this->apellidos;
    }

    public function setApellidos(string $apellidos): void {
        $this->apellidos = $apellidos;
    }

    public function getRol(): string {
        return $this->rol;
    }

    public function setRol(string $rol): void {
        $this->rol = $rol;
    }

    public function getEmail(): string {
        return $this->email;
    }

    public function setEmail(string $email): void {
        $this->email = $email;
    }

    public function getTelefono(): string {
        return $this->telefono;
    }

    public function setTelefono(string $telefono): void {
        $this->telefono = $telefono;
    }

    public function getEstado(): string {
        return $this->estado;
    }

    public function setEstado(string $estado): void {
        $this->estado = $estado;
    }

    public function getFechaRegistro(): string {
        return $this->fecha_registro;
    }

    public function setFechaRegistro(string $fecha_registro): void {
        $this->fecha_registro = $fecha_registro;
    }
}
