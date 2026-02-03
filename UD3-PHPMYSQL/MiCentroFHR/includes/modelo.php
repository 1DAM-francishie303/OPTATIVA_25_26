<?php
require 'conexion.php';

function getAlumnosCurso($db){
    

    $sql = "SELECT ALUMNO.ID_ALUMNO, ALUMNO.NOMBRE, ALUMNO.EMAIL, ALUMNO.ISMAYOREDAD, CURSO.NOMBRE AS nombrecurso FROM ALUMNO JOIN CURSO ON ALUMNO.ID_CURSO = CURSO.ID_CURSO;";
    
    $alumnos = mysqli_query($db, $sql);

    $resultado = array();

    if(mysqli_num_rows($alumnos) > 0){
        while($fila = mysqli_fetch_assoc($alumnos)){
            array_push($resultado, $fila);
        }
    }
    return $resultado;
}

function getCursos($db){

    $sql = "SELECT * FROM CURSO;";

    $cursos = mysqli_query($db, $sql);

    $resultado = array();

    if(mysqli_num_rows($cursos) > 0){
        while($fila = mysqli_fetch_assoc($cursos)){
            array_push($resultado, $fila);
        }
    }
    return $resultado;



}

function getAlumnosPorCurso($db, $curso){

    $sql = "SELECT ALUMNO.ID_ALUMNO, ALUMNO.NOMBRE, ALUMNO.EMAIL, ALUMNO.ISMAYOREDAD, CURSO.NOMBRE AS nombrecurso FROM ALUMNO JOIN CURSO ON ALUMNO.ID_CURSO = CURSO.ID_CURSO WHERE CURSO.nivel=".$curso[0]." AND CURSO.abreviatura='".$curso[1]."".$curso[2]."".$curso[3]."';";

    $alumnos = mysqli_query($db, $sql);

    $resultado = array();

    if(mysqli_num_rows($alumnos) > 0){
        while($fila = mysqli_fetch_assoc($alumnos)){
            array_push($resultado, $fila);
        }
    }
    return $resultado;

    }


function addAlumno($db, $nombre, $email, $curso, $mayorEdad){


    $idCurso = $curso[0];

    $sql = "INSERT INTO alumno (nombre, email, isMayorEdad, id_curso) VALUES ('".$nombre."', '".$email."', ".$mayorEdad.", ".$idCurso.");";

    if(!mysqli_query($db, $sql)){
        echo "Error en la inserción del nuevo alumno";
    }



}

function getCursoId($db, $idCurso){

    $sql = "SELECT * FROM  CURSO WHERE id_curso = ".$id_curso.";";

    $curso = mysqli_query($db, $sql);

    $resultado = array();

    if(mysqli_num_rows($curso) > 0){
        while($fila = mysqli_fetch_assoc($curso)){
            array_push($resultado, $fila);
        }
    }
    return $resultado;

}


function getAlumnoId($db, $id_alumno){
    
    $sql = "SELECT * FROM alumno WHERE id_alumno=".$id_alumno.";";

    $alumno = mysqli_query($db, $sql);

    $resultado = array();

    if(mysqli_num_rows($alumno) > 0){
        while($fila = mysqli_fetch_assoc($alumno)){
            array_push($resultado, $fila);
        }
    }
    return $resultado;
}



function modificarAlumno($db, $id_alumno, $nombreAlumno, $emailAlumno){

    $sql = "UPDATE ALUMNO SET id_alumno=".$nombreAlumno.", email=".$emailAlumno." WHERE id_alumno=".$id_alumno.";";

    if(!mysqli_query($db, $sql)){
        echo "Error en la edicion  del alumno";
    }
}









?>