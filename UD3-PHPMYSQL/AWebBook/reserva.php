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
}else{
    echo "error";
}

?>
<body>
    <?php

    echo "<h2>".$libro[0]['titulo']."</h2>";
    echo "<h4>".$libro[0]['autor']."</h4>";
    echo "<img src='./img/".$libro[0]['imagen']."' class='img-thumbnail w-50'>";
    ?>
    <form action="index.php" method='POST'>
        <label for='fecha'>Selecciona una fecha:</label>
        <!--SI NO SE SELECCIONA FECHA ENTONCES SE ENVIA COMO ""-->
        <input type='date' id='fecha' name='fecha'>
        <!--LE TENGO QUE MANDAR EL ID LIBRO SIEMPRE QUE RESERVE PAR PODER HACER LA OPERACION CREAR RESERVA-->
        <input type="hidden" name="id_libro_reservar" value="<?= $libro[0]['id_libro']; ?>">
        <button type="submit" class="btn btn-primary w-30">Reservar ahora</button>
    </form>
    <form action="index.php">
        <button type="submit" class="btn btn-primary w-30">Cancelar</button>
    </form>
</body>
</html>