<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Subida imagenes</title>
</head>
<body>
    <?php require 'includes/header.php'; ?>
    
    <form action="" method="post" enctype="multipart/form-data" class="mt-30 ml-30">
        <input type="file" name="fichero_usuario" />
        <button type="submit">Subir archivo</button>
    </form>


    <?php
    $dir_subida = "img/";
    //Esta parte voy a explicarla porque no la entendía muy bien

    if(isset($_FILES['fichero_usuario'])){ //Esto comprueba si se ha subido algo al formulario al que he llamdo fichero_usuario en el array superglobal _FILES (igual que _GET y _POST)
        $fichero_subido = $dir_subida . $_FILES['fichero_usuario']['name']; //ruta del fichero + nombre

        if(move_uploaded_file($_FILES['fichero_usuario']['tmp_name'], $fichero_subido)){ //Esta funcion mueve el archivo  del array _FILE a la ubicacion que yo quiera en este caso img/nombrefichero y devuelve true si ha salido ok
            echo "<p class='ml-30'>Se subió correctamente</p>";
            echo "<img class='w-150 ml-30' src='$fichero_subido' />";
        } else {
            echo "<p>ERROR al subir el archivo</p>";
        }
    }
    ?>

    
    
</body>
</html>