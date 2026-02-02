<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Reserva de libro</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</head>
<?php 
require './includes/header.php';
require './includes/data.php';

if(isset($_POST['id_libro'])){
    $idLibro = $_POST['id_libro'];
    $libro = getLibro($db, $idLibro);
    var_dump($libro);
}else{
    echo "error";
}

?>
<body>
    <?php

    echo "<h2>".$libro[0]['titulo']."</h2>";
    echo "<h4>".$libro[0]['autor']."</h4>";
    echo "<label for='fecha'>Selecciona una fecha:</label>
    <input type='date' id='fecha' name='fecha'>";
    ?>
</body>
</html>