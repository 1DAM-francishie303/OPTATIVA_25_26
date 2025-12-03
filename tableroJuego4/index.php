<?php

include "./funciones.php";

/* Inicialización del entorno */
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

//Lógica de negocio
$tablero = leerArchivoCSV("data/tablero1.csv");
$coordenadasPersonaje = getCoordenadasPersonaje();
$coordenadasNuevas = getPosicionNueva($coordenadasPersonaje);
$coordenadasBocata = getCoordenadasBocata();

if(colisionar($coordenadasPersonaje, $coordenadasBocata)){
    $coordenadasBocata[0] = rand(0,13);
    $coordenadasBocata[1] = rand(0,13);
}


// Lógica: leer y generar HTML
mostrarMensaje($coordenadasPersonaje);
$botones = getBotonesMarkup($coordenadasNuevas, $coordenadasBocata);
$tableroMarkup = getTableroMarkup($tablero, $coordenadasPersonaje, $coordenadasBocata);
?>



<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- Minified version -->
    <link rel="stylesheet" href="https://cdn.simplecss.org/simple.min.css">
    <title>Document</title>
    <style>
        img{
            width:60px;
            height:40px;
        }
        .contenedorTablero {
            width:600px;
            height:600px;
            border: solid 2px grey;
            box-shadow: grey;
            display:grid;
            grid-template-columns: repeat(12, 1fr);
            grid-template-rows: repeat(12, 1fr);
        }
        .tile {
            float: left;
            margin: 0;
            padding: 0;
            border-width: 0;
            background-image: url("./src/464.jpg");
            background-size: 209px;
            background-repeat: none;
        }
        .fuego {
            background-color: red;
            background-position: -105px -52px;
        }
        .tierra {
            background-color: brown;
            background-position: -157px 0px;
        }
        .agua {
            background-color: blue;
            background-position: -53px 0px;
        }
        .hierba {
            background-color: green;
            background-position: 0px 0px;
        }
    </style>
</head>
<body>
    <h1>Tablero juego super rol DWES</h1>
    <?php 
        echo $botones;
    ?>
    <div class="contenedorTablero">
        <?php 
        echo $tableroMarkup; 
        ?>
    </div>

</body>
</html>