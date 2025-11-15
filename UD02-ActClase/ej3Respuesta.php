<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tabla numeros</title>
</head>
<body>

   <?php  
        echo "<h1>Hola, ".$_GET['nombre']."</h1>";
        if($_GET['edad'] >= 18){
            echo "<h2>Eres mayor de edad</h2>";
        } else{
            echo "<h2>No eres mayor de edad</h2>";
        }
   ?>


</body>
</html>