<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Procesas Francisco Hierro</title>
</head>
<body>
    <?php
        if(!isset($_POST["nombre"])){
            echo "<p>Nombre vacio, rellénalo</p>";
        }
         if(!isset($_POST['apellido'])){
            echo "<p>Apellidos vacio, rellénalo</p>";
        }
        if(isset($_POST['correo'])){
            if (filter_var($_POST['correo'], FILTER_VALIDATE_EMAIL)) {
                echo "Correo válido";
            } else {
                echo "Correo inválido";
            }
        }

    ?>
</body>
</html>