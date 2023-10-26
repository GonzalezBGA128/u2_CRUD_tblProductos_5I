<?php

$servidor = "localhost";
$usuario = "root";
$contrasena = '';
$nombre_basedatos = "bellezaorganica";

$db = mysqli_connect($servidor, $usuario, $contrasena, $nombre_basedatos);

if (!$db)
    die("No se pudo conectar a la base de datos: " . mysqli_connect_error());
