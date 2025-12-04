<?php

/* Zona de declaración de funciones */
//Funciones de debugueo
function dump($var){
    echo '<pre>'.print_r($var,1).'</pre>';
}

//******FUNCIONES DE LA VISTA ********/

function getTableroMarkup ($tablero, $coordenadasPersonaje, $coordenadasBocata){
   $tableroMarkup = "";
    for($i = 0; $i < count($tablero); $i++){
        $tableroMarkup .= '<div class="tile ';
        if ($tablero[$i] === "fuego") {
            $tableroMarkup .= 'fuego">';
        } elseif ($tablero[$i] === "agua") {
            $tableroMarkup .= 'agua">';

        } elseif ($tablero[$i] === "tierra") {
            $tableroMarkup .= 'tierra">';

        } elseif ($tablero[$i] === "hierba") {
            $tableroMarkup .= 'hierba">';
        }
        if($coordenadasPersonaje[0] * 12 + $coordenadasPersonaje[1] == $i){
            $tableroMarkup .= getPersonajeMarkup();
        }
        if($coordenadasBocata[0] * 12 + $coordenadasBocata[1] == $i){
            $tableroMarkup .= getBocataVidaMarkup();
        }
        $tableroMarkup .= '</div>';
   }
   return $tableroMarkup;
}

function getPersonajeMarkup(){
    return '<img src="src/musc.png"/>';
}

//solo pinta nada más  no calcula ninguna posicion ni nada
function getBotonesMarkup($coordenadasNuevaPosicion, $coordenadasBocata){
        return '<div>
        <a href="index.php?row=' . $coordenadasNuevaPosicion[2] . '&col=' . $coordenadasNuevaPosicion[1] . '&bocataRow=' . $coordenadasBocata[0] . '&bocataCol='.$coordenadasBocata[1].'">Arriba</a>
        <a href="index.php?row=' . $coordenadasNuevaPosicion[3] . '&col=' . $coordenadasNuevaPosicion[1] . '&bocataRow=' . $coordenadasBocata[0] . '&bocataCol='.$coordenadasBocata[1].'">Abajo</a>
        <a href="index.php?row=' . $coordenadasNuevaPosicion[0] . '&col=' . $coordenadasNuevaPosicion[4] . '&bocataRow=' . $coordenadasBocata[0] . '&bocataCol='.$coordenadasBocata[1].'">Derecha</a>
        <a href="index.php?row=' . $coordenadasNuevaPosicion[0] . '&col=' . $coordenadasNuevaPosicion[5] . '&bocataRow=' . $coordenadasBocata[0] . '&bocataCol='.$coordenadasBocata[1].'">Izquierda</a>
    </div>';

}

function getBocataVidaMarkup(){
    return '<img src="src/bocata.png"/>';
}


//********** FUNCIONES DEL MODELO ***********/

function getCoordenadasPersonaje(){
    if(isset($_GET['row']) && isset($_GET['col'])){
        return array(intval($_GET['row']), intval($_GET['col']));
    }
}

function leerArchivoCSV($rutaArchivoCSV) {
    $archivo = fopen($rutaArchivoCSV, "r");
    $nuevoArray = array();

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
            $nuevoArray[] = trim($elemento); //esto elimina los saltos de linea /n y demás
    }
    return $nuevoArray;
}

function getCoordenadasBocata(){
    if(isset($_GET['bocataRow']) && isset($_GET['bocataCol'])){
        return array(intval($_GET['bocataRow']), intval($_GET['bocataCol']));
    }
}



//********** FUNCIONES DE CONTROL ***********/

function mostrarMensaje($coordenadasPersonaje){
    if(!isset($coordenadasPersonaje[0]) || !isset($coordenadasPersonaje[1])){
        echo "<h2>INTRODUCE UNA POSICIÓN PARA EL PERSONAJE CORRECTA</h2>";
    }
}

function getPosicionNueva($coordenadasPersonaje){
    $row = $coordenadasPersonaje[0];
    $col = $coordenadasPersonaje[1];
    return array($row, $col, $row - 1,  $row + 1, $col + 1, $col - 1);
}

function colisionar($coordenadasPersonaje, $coordenadasBocata){
   if($coordenadasPersonaje[0] == $coordenadasBocata[0] && $coordenadasPersonaje[1] == $coordenadasBocata[1]){
        return true;
   }else{
        return false;
   }
}

?>