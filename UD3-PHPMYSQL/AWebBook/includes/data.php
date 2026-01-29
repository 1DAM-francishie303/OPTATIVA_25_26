<?php
require 'conexion.php';

function getLibros($db){

    $sql = "SELECT * from libros;";

    $libros = mysqli_query($db, $sql);

    $resultado = array();

    if(mysqli_num_rows($libros) > 0){
        while($fila = mysqli_fetch_assoc($libros)){
            array_push($resultado, $fila);
        }
    }
    return $resultado;

}

function getCategorias($db){

    $sql = "SELECT * from categorias;";

    $categorias = mysqli_query($db, $sql);

    $resultado = array();

    if(mysqli_num_rows($categorias) > 0){
        while($fila = mysqli_fetch_assoc($categorias)){
            array_push($resultado, $fila);
        }
    }
    return $resultado;
}


function getInfoLibros($db){

    //para que salgan tambien los libros que no tienen reserva hacemos LEFT JOIN 8la tabla libros está a la izq.)
    $sql = "SELECT * from libros JOIN categorias on libros.id_categoria = categorias.id_categoria LEFT JOIN reservas ON libros.id_libro = reservas.id_libro; ";

    $librosConInfo = mysqli_query($db, $sql);

    $resultado = array();

    if(mysqli_num_rows($librosConInfo) > 0){
        while($fila = mysqli_fetch_assoc($librosConInfo)){
            array_push($resultado, $fila);
        }
    }

    return $resultado;
}

function filtrarLibrosPorCategoria($db, $nombre){

    $sql = "SELECT * from libros JOIN categorias on libros.id_categoria = categorias.id_categoria WHERE nombre='".$nombre."';";
    
    $librosCategoria = mysqli_query($db, $sql);

    $resultado = array();

    if(mysqli_num_rows($librosCategoria) > 0){
        while($fila = mysqli_fetch_assoc($librosCategoria)){
            array_push($resultado, $fila);
        }
    }

    return $resultado;

}

?>
