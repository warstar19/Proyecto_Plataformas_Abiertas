-- Crear la base de datos
CREATE DATABASE tienda;

-- Seleccionar la base de datos
USE tienda;

CREATE TABLE Marcas (
    marca_id INT AUTO_INCREMENT PRIMARY KEY,
    nombre_marca VARCHAR(100) NOT NULL
);

CREATE TABLE Prendas (
    prenda_id INT AUTO_INCREMENT PRIMARY KEY,
    marca_id INT,
    nombre_prenda VARCHAR(100),
    precio DECIMAL(10, 2),
    stock INT,
    FOREIGN KEY (marca_id) REFERENCES Marcas(marca_id)
);

CREATE TABLE Ventas (
    venta_id INT AUTO_INCREMENT PRIMARY KEY,
    prenda_id INT,
    cantidad INT,
    fecha_venta DATE,
    FOREIGN KEY (prenda_id) REFERENCES Prendas(prenda_id)
);