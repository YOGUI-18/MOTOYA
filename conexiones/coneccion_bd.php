<?php
try {
    $servidor = 'localhost';
    $usuario = 'root';
    $passwords = 'YOGUI3103';
    $bd = 'motoya';

    $coneccion = mysqli_connect($servidor, $usuario, $passwords, $bd);

} catch (\Throwable $th) {
     var_dump($th);
}