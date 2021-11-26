<?php
$servername="localhost";
$username="root";
$password="";

try {
  $conn= new PDO("mysql:host=$servername", $username, $password);
  $conn->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
  $SQL="CREATE DATABASE IF NOT EXISTS arqdb;
  USE arqdb;
  CREATE TABLE IF NOT EXISTS usuarios
  (
    usuario varchar(10) Primary Key,
    clave varchar(20) NOT NULL);
    /*INSERT INTO usuarios (usuario,clave)
    VALUES ('admin', 'laveci2021');*/
  
  CREATE TABLE IF NOT EXISTS inventario
  (
    id_producto int(20) NOT NULL AUTO_INCREMENT,
    marca varchar(20) NOT NULL,
    producto varchar(20) NOT NULL,
    descripcion varchar(100),
    idProveedor int(10),
    costo_unidad int(5) NOT NULL,
    cantidad int(4),
    precioBruto int(6) NOT NULL,
    precioVenta int(6) NOT NULL,
    disponibilidad varchar(2),
    PRIMARY KEY (id_producto)

  );

  CREATE TABLE IF NOT EXISTS facturaEncabezado
  (
    id_factura int(10) NOT NULL AUTO_INCREMENT,
    cliente varchar(15) NOT NULL,
    telefono varchar(15),
    fecha DATE NOT NULL,
    PRIMARY KEY (id_factura)
    );

  CREATE TABLE IF NOT EXISTS facturaDetalle
  (
    id_facturaD int(10) NOT NULL AUTO_INCREMENT,
    id_factura int(10),
    id_producto int(20),
    total varchar(6) NOT NULL,
    usuario varchar(10), 
    index(id_factura),
    index(id_producto),
    index(usuario),
    FOREIGN KEY (id_factura) REFERENCES facturaEncabezado(id_factura),   
    FOREIGN KEY (id_producto) REFERENCES inventario(id_producto),
    FOREIGN KEY (usuario) REFERENCES usuarios(usuario),
    PRIMARY KEY (id_facturaD)

  );

  CREATE TABLE IF NOT EXISTS proveedor
  (
    idProveedor int(10) NOT NULL AUTO_INCREMENT,
    nombre varchar(15) NOT NULL,
    telefono varchar(15),
    correo varchar(30) NOT NULL,
    PRIMARY KEY (idProveedor)
  );
  ";

  $conn->exec($SQL);
  /*echo "Bienvenido";*/
} catch (PDOException $e) {
  echo $SQL."<br>".$e->getMessage();
}

//$conn=NULL;
 ?>

 