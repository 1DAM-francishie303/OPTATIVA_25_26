<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://cdn.jsdelivr.net/npm/@tailwindcss/browser@4"></script>
    <title>Ejercicios ACTIVIDADES CLASE</title>
</head>
<body>
    <?php require 'includes/header.php';
    $ejercicios = scandir("../UD02_ActividadesDeClase");
    
    //HE PENSADO PARA AÑADIR UNA DESCRIPCION A CADA EJERCICIO EN HACER UN ARRAY DE LOS EJERCICIOS
    //Y AÑADIRLE COMO INDEX LA DESCRIPCION PERO ESO NO SERÍA DINÁMICO.
    //VOY A HACER UN FICHERO .TXT CON UNA DESCRIPCION PARA CADA EJERCICIO POR LINEA Y LO LEERÉ
    //LÍNEA A LÍNEA (LÍNEA 1 CORRESPONDE EJERCICIO 1, LÍNEA 2 A EJERCICIO 2, ETC.)
    $archivo = fopen("./descripciones.txt","r");
    ?>
    
    <table class="flex w-screen h-screen justify-center mt-10">
        <?php
            foreach($ejercicios as $key => $ejercicio){
                if($key >= 2){//las dos primeras son solo . y .. (que están en todos los directorios por defecto para referenciar carpeta padre y propia carpeta)
                    echo "<tr class='border-4 border-blue-400'>";
                    echo "<td class='p-4'><p>$ejercicio <a href='/BLOGPERSONAL_FranciscoHierro/UD02_ActividadesDeClase/$ejercicio' class='text-blue-500 underline ml-5'> PINCHA AQUÍ </a></p></td>";//EL http://localhost se pone solo
                    if($archivo){
                        if(!feof($archivo)){
                            echo "<td>".fgets($archivo)."</td>";
                        }
                    }
                    echo "</tr>";
                }
               
            }
            fclose($archivo);
        ?>
    </table>
    



</body>
</html>