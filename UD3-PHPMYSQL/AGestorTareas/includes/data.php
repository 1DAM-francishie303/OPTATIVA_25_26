<?php
require 'conexion.php';



function getTareas($db){

    $sql = "SELECT id, titulo, descripcion, fecha_entrega, estado FROM tareas;";

    $tareas = mysqli_query($db, $sql); //Esto devuelve un objeto SQL

    $resultado=array();

    if(mysqli_num_rows($tareas) > 0){
        while($fila = mysqli_fetch_assoc($tareas)){
            array_push($resultado, $fila);
        }
    }
    return $resultado;
}


?>
