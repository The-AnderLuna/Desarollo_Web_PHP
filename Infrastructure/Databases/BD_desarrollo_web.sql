-- Crear la base de datos
CREATE DATABASE IF NOT EXISTS desarrollo_web;

-- Seleccionar la base de datos
USE desarrollo_web;

-- Crear la tabla Usuarios
CREATE TABLE IF NOT EXISTS Usuarios (
    id INT AUTO_INCREMENT PRIMARY KEY,
    password VARCHAR(255) NOT NULL,
    nombre VARCHAR(100) NOT NULL,
    apellidos VARCHAR(100) NOT NULL,
    rol VARCHAR(50) NOT NULL,
    email VARCHAR(100) NOT NULL UNIQUE,
    telefono VARCHAR(15),
    estado VARCHAR(50),
    fecha_registro DATE NOT NULL
);

-- Crear la tabla Cursos
CREATE TABLE IF NOT EXISTS Cursos (
    id INT AUTO_INCREMENT PRIMARY KEY,
    nombre VARCHAR(100) NOT NULL,
    duracion FLOAT NOT NULL,
    estudiantes INT NOT NULL,
    fecha_inicio DATE NOT NULL,
    usuario_id INT,
    FOREIGN KEY (usuario_id) REFERENCES Usuarios(id)
);
