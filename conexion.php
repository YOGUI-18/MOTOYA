<?php 
$host = 'localhost';
$dbname = 'contacto';
$username = 'root';
$password = 'YOGUI3103';

$conexion = mysqli_connect($host, $username, $password, $dbname);
if(!$conexion) {
    die("Error de conexion" .mysqli_connect_error());
}
?>