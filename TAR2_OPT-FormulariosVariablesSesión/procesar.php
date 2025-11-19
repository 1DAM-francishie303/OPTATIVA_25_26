<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://cdn.jsdelivr.net/npm/@tailwindcss/browser@4"></script><!--ESTO ES PARA IMPORTAR TAILWINDCSS EN REMOTO-->
    <title>Procesas Francisco Hierro</title>
</head>
<body>
    <?php
    session_start();
    $_SESSION['nombre'] = $_POST['nombre'] ?? ""; //Esto es como un operador ternario ? pero sin necesidad de hacer el isset()
    $_SESSION['apellido'] = $_POST['apellido'] ?? "";

        if(empty($_POST["nombre"])){ //Si usara !isset() en vez de empty estaría diciendo si es null pero siempre no es null ya que si no pongo nada es "" 
            echo "<p>Nombre vacio, rellénalo</p>";
        }
         if(empty($_POST['apellido'])){
            echo "<p>Apellidos vacio, rellénalo</p>";
        }
        
        if (filter_var($_POST['correo'], FILTER_VALIDATE_EMAIL)) {
            echo "Correo válido"."<br>";
        } else {
            echo "Correo inválido"."<br>";
        }

        /*
        echo "<pre>";
        print_r($_POST);
        echo "</pre>";
        */
        echo "<div class='border-t-2 w-50 mt-10'>TUS DATOS<div>";
        
        echo $_POST["nombre"]."<br>"; //Para que no imprima nada si es null podriamos hacer echo isset($_POST['nombre']) ? $_POST['nombre'] : '';

        echo $_POST['apellido']."<br>";
        echo $_POST['correo']."<br>";
        echo $_POST['paises']."<br>";

        //Una forma para IMPRIMIR ARRAYS
        if (!empty($_POST['intereses']) && is_array($_POST['intereses'])) {
            echo count($_POST['intereses'])." intereses.";
            echo "Tus intereses: " . implode(", ", $_POST['intereses'])."<br>";
        } else {
            echo "No seleccionaste ningún interés"."<br>";
        }

        //OTRA FORMA MAS COMPLETA DE HACER EL ECHO: Si no es true imprime la variable del array pero si es null imprime vacio
        if (!empty($_POST['herramientas']) && is_array($_POST['herramientas'])) {
            echo implode(", ", $_POST['herramientas']);
        } else {
            echo "No seleccionaste ninguna herramienta";
        }


    ?>
    <br>
    <button class="px-3 py-1 bg-green-400 border-2"><a href="formulario.php">Volver</a></button>
</body>
</html>