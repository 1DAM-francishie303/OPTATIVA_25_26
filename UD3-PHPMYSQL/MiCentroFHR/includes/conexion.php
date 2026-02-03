<?php
$servidor = "localhost";
$usuario = "root";
$contraseña = "";
$base_datos = "centro_educativo";

// Crear conexión
$db = mysqli_connect($servidor, $usuario, $contraseña, $base_datos);

// Verificar conexión
if(!$db){
    die("ERROR EN LA CONEXION: " . mysqli_connect_error());
}

?>