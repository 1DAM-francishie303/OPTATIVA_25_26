<?php
require 'conexion.php';

function getTareas($db){
    $sql = "SELECT id, titulo, descripcion, fecha_entrega, estado FROM tareas t;";
	$tareas = mysqli_query($db, $sql);
	
	$resultado = array();
	if($tareas && mysqli_num_rows($tareas) >= 1){
		while ($tarea = mysqli_fetch_assoc($tareas)) {

				array_push($resultado, $tarea);
                
		}		
	}	
	return $resultado;

}

function guardarNuevoUsuario($nombre, $email, $password, $db){
	//TO DO

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
