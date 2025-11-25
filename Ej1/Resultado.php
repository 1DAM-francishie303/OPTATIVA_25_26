<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://cdn.jsdelivr.net/npm/@tailwindcss/browser@4"></script>
    <title>Ejercicio 1 Francisco Hierro</title>

</head>
<body>
    <?php
         
        if($_POST["colores"] == "rojo"){
            $color_fondo = "red";
        }
        else if($_POST["colores"] == "azul"){
            $color_fondo = "blue";   
        }
        else if($_POST["colores"] == "verde"){
            $color_fondo = "green";
        }
        //Te pongo abajo el fondo con tailwind css como si tuviera Internet pero en verdad no tengo pero para que lo veas con Internet
    ?>
    <div class="w-screen h-screen bg-<?=$color_fondo?>-700">
    <?php
        if (isset($_POST['img1'])) {
            echo "<h1>MOSTRANDO IMAGENES DEL IMG1</h1>";
            $imagenes = scandir("img1");
            $numImagenes = $_POST['imagenes'];
            $contador = 0;
            if($numImagenes <= count($imagenes) - 2){ //las dos primeras no cuentan ya que son las referencias al directorio padre y al propio
                foreach($imagenes as $key => $imagen){
                    if($key >= 2){ //las dos primeras son solo . y .. (que están en todos los directorios por defecto para referenciar carpeta padre y propia carpeta)
                        echo "<img src='img1/$imagen'/>";
                        $contador++;
                        if($contador == $numImagenes){
                            break;
                        }
                    }
            }
            }else{
                echo "ERROR: Introduce un número igual o menor al número de imágenes disponibles en el directorio";
            }
        }
        else if(isset($_POST['img2'])){
            echo "<h1>MOSTRANDO IMAGENES DEL IMG2</h1>";
            $imagenes = scandir("img2");
            $numImagenes = $_POST['imagenes'];
            $contador = 0;
            if($numImagenes <= count($imagenes) - 2){
                foreach($imagenes as $key => $imagen){
                    if($key >= 2){ 
                        echo "<img src='img2/$imagen'/>";
                        $contador++;
                        if($contador == $numImagenes){
                            break;
                        }
                    }
                }
            }else{
                echo "ERROR: Introduce un número igual o menor al número de imágenes disponibles en el directorio";
            }
        }

    ?>
    </div>
</body>
</html>