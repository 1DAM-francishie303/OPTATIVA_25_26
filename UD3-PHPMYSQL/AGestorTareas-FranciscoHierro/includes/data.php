<?php
require 'conexion.php';

function getTareas($db, $user){

    $sql = "SELECT id, titulo, descripcion, fecha_entrega, estado FROM tareas WHERE usuario_id = " . $user . ";";

    $tareas = mysqli_query($db, $sql); //Esto devuelve un objeto SQL

    $resultado=array();

    if(mysqli_num_rows($tareas) > 0){
        while($fila = mysqli_fetch_assoc($tareas)){
            array_push($resultado, $fila);
        }
    }
    return $resultado;
}

//En php no se puede hacer sobrecargas de metodos por eso le pongo otro nombre
function getTareaPorId($db, $id_tarea){

    $sql = "SELECT id, titulo, descripcion, fecha_entrega, estado FROM tareas WHERE id = " . $id_tarea . ";";

    $tareas = mysqli_query($db, $sql); 

    $resultado=array();

    if(mysqli_num_rows($tareas) > 0){
        while($fila = mysqli_fetch_assoc($tareas)){
            array_push($resultado, $fila);
        }
    }
    return $resultado;
}

function guardarNuevoUsuario($nombre, $email, $password, $db){
    
	$password_segura = password_hash($password, PASSWORD_BCRYPT, ['cost => 4']);

	password_verify($password, $password_segura);
	
    $sqlComprobar = "SELECT * from usuarios where email='".$email."';";

    $resultado = mysqli_query($db, $sqlComprobar);

    $filas = mysqli_num_rows($resultado);

    $sql = "INSERT INTO usuarios (nombre, email, contraseña) VALUES ('".$nombre."','".$email."','".$password_segura."')";
    
    if($filas == 0){
        if(mysqli_query($db, $sql)){
            echo "Todo OK";
            return true;
        }else{
            echo "Error de conexión";
            return false;
        }
    }else{
        echo "Correo inválido: ya existe";
    }
   
}

function getUsers($db){
    $sql = "SELECT * FROM usuarios;";
    $usuarios = mysqli_query($db, $sql);
    $resultado = array();
    if($usuarios && mysqli_num_rows($usuarios) >= 1){
        while ($usuario = mysqli_fetch_assoc($usuarios)) {
            array_push($resultado, $usuario);   
        }       
    }   
    return $resultado;

}


function insertarTarea($db, $titulo, $descripcion, $fecha_entrega, $estado, $id_user)
{
    $sql = "INSERT INTO TAREAS (usuario_id, titulo, descripcion, fecha_entrega, estado) VALUES (".$id_user.", '". $titulo."', '".$descripcion."', '".$fecha_entrega."', '". $estado."');";

    if(mysqli_query($db, $sql)){
        echo "Tarea insertada correctamente";
        return true;
    }else{
        echo "Error al insertar la tarea";
        return false;
    }
}


function guardarCambiosTarea($db, $id_tarea, $titulo,  $descripcion,  $fecha_entrega, $estado){
    $sql = "UPDATE tareas
    SET titulo = '".$titulo."',
    descripcion = '".$descripcion."',
    fecha_entrega = '".$fecha_entrega."',
    estado = '".$estado."'
    WHERE id = ".$id_tarea.";";

    if(mysqli_query($db, $sql)){
        echo "Tarea actualizada correctamente";
    } else {
        echo "Error al actualizar la tarea: " . mysqli_error($db);
    }
}


function eliminarTarea($db, $id_tarea){
    $sql = "DELETE FROM tareas WHERE id=".$id_tarea.";";
    
    if(mysqli_query($db, $sql)){
        echo "Tarea eliminada correctamente";
    } else {
        echo "Error al eliminar la tarea: " . mysqli_error($db);
    }
}

?>



