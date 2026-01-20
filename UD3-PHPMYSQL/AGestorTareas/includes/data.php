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

function guardarNuevoUsuario($nombre, $email, $password, $db){
    
    $sqlComprobar = "SELECT * from usuarios where email='".$email."';";

    $resultado = mysqli_query($db, $sqlComprobar);

    $filas = mysqli_num_rows($resultado);

    $sql = "INSERT INTO usuarios (nombre, email, contraseña) VALUES ('".$nombre."','".$email."','".$password."')";
    
    if($filas == 0){
        if(mysqli_query($db, $sql)){
            echo "Todo OK";
        }else{
            echo "Error de conexión";
        }
    }else{
        echo "Correo inválido: ya existe";
    }
   
}

function getUsers($db){
	//TO DO
}


function insertarTarea($db, $titulo, $descripcion, $fecha_entrega, $estado, $id_user)
{
	//TO DO
}

function guardarCambiosTarea($db, $id_tarea, $titulo,  $descripcion,  $fecha_entrega, $estado, $id_user){
	//TO DO
}

function eliminarTarea($db, $id_tarea){
	//TODO
}

?>


?>
