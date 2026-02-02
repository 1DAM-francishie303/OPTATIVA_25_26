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
    //AQUI PASA ALGO IMPORTANTE: COMO RESERVAS Y LIBROS TIENEN UNA COLUMA DE ID_LIBRO IGUAL, AL JUNTAR LAS TABLAS CON EL LEFT JOIN EL ID_LIBRO DE RESERVA SOBREESCRIBE AL ID_LIBRO DE LIBROS ENTONCES LOS QUE NO TIENEN RESERVA SU ID_LIBRO SERÁ NULL
    //LO CUAL DA ERROR AL INTENTAR HACER POR EJEMPLO GETLIBRO($DB, $ID_LIBRO)  
    //SOBREESCRIBE SIEMPRE LA TABLA QUE SE LEE SEGUNDA (EN ESTE CASO RESERVAS SI HUBIERAMOS HECHO RIGHT JOIN SERIA LIBROS QUIEN SOBREESCRIBE)
    $sql = "SELECT libros.id_libro, libros.imagen, libros.titulo, libros.autor, libros.id_categoria, reservas.id_reserva from libros JOIN categorias on libros.id_categoria = categorias.id_categoria LEFT JOIN reservas ON libros.id_libro = reservas.id_libro; ";

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

function getUsuarios($db){

    $sql = "SELECT * FROM usuarios;";
    
    $usuarios = mysqli_query($db, $sql);

    $resultado = array();

    if(mysqli_num_rows($usuarios) > 0){
        while($fila = mysqli_fetch_assoc($usuarios)){
            array_push($resultado, $fila);
        }
    }

    return $resultado;

}

function getLibro($db, $id_libro){

    $sql = "SELECT * FROM LIBROS WHERE id_libro=".$id_libro.";"; 

    $libro = mysqli_query($db, $sql);

    $resultado = array();

    if(mysqli_num_rows($libro) > 0){
        while($fila = mysqli_fetch_assoc($libro)){
            array_push($resultado, $fila);
        }
    }

    return $resultado;
}
?>
