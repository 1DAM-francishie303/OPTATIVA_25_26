<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Inicio</title>
</head>
<body>

    <?php require 'includes/header.php';
    ?>
    <h1 class="font-bold text-blue-300 w-screen mt-8 flex justify-center text-6xl">FOTOS</h1>
    <div class="grid grid-cols-3 w-screen mt-10 justify-items-center gap-10">
        <?php

            $imagenes = scandir("img");
            foreach($imagenes as $key => $imagen){
                if($key >= 2){ //las dos primeras son solo . y .. (que están en todos los directorios por defecto para referenciar carpeta padre y propia carpeta)
                    echo "<img src='img/$imagen'/>";
                }
            }
            
        ?>
    </div>
</body>
</html>