<?php
$servidor = "localhost";
$usuario = "root";
$contraseña = "";
$base_datos = "gestion";

$db = mysqli_connect($servidor, $usuario, $contraseña, $base_datos);

if(!$db){
    die("ERROR EN LA CONEXION: " . mysqli_connect_error());
}

echo "Conectado exitosamente";

?>