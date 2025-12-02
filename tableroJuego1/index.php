<?php

/* Inicialización del entorno */
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

/* Zona de declaración de funciones */
//Funciones de debugueo
function dump($var){
    echo '<pre>'.print_r($var,1).'</pre>';
}

//Función lógica presentación
function getTableroMarkup ($tablero){
   $tableroMarkup = "";
    for($i = 0; $i < count($tablero); $i++){
        $tableroMarkup .= '<div class="tile ';
        if ($tablero[$i] === "fuego") {
            $tableroMarkup .= 'fuego"></div>';
        } elseif ($tablero[$i] === "agua") {
            $tableroMarkup .= 'agua"></div>';

        } elseif ($tablero[$i] === "tierra") {
            $tableroMarkup .= 'tierra"></div>';

        } elseif ($tablero[$i] === "hierba") {
            $tableroMarkup .= 'hierba"></div>';

        }
    
   }
   return $tableroMarkup;
}

//Función lógica de negocio
function leerArchivoCSV($rutaArchivoCSV) {
    $archivo = fopen($rutaArchivoCSV, "r");
    $array = array();

    if($archivo){

        while(!feof($archivo)){ 
            $linea = str_getcsv(fgets($archivo), ","); //He tenido que usar esta funcion para quitar las comillas del csv que ya estaban puestas y devolverlas como un String que php guarda sin comillas.  
            for($i = 0; $i < count($linea); $i++){
                $array[] = $linea[$i];
            }   
        }
        
        fclose($archivo);
    }else{
        echo "no se puedo abrir el fichero";
    }
    foreach($array as $elemento){
            $array[] = trim($elemento); //esto elimina los saltos de linea /n y demás
    }
    return $array;
}


//Lógica de negocio
$tablero = leerArchivoCSV("data/tablero1.csv");

//Lógica de presentación

// Lógica: leer y generar HTML
$tableroMarkup = getTableroMarkup($tablero);

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
    <div class="contenedorTablero">
        <?php 
        
        echo $tableroMarkup; 
        
        ?>
    </div>

</body>
</html>