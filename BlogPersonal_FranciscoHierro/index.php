<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://cdn.jsdelivr.net/npm/@tailwindcss/browser@4"></script>
    <title>Blog de Francisco Hierro</title>
</head>
<body>
     <?php require 'includes/header.php';
        //Voy a hacerlo todo dinamico
        $formulario = array(array("input","Nombre","Escribe tu nombre","text"), array("input","Apellidos", "Escribe tus apellidos","text"), array("textarea","Descripción", "Escribe una breve descripción...","text"),array("input","Contacto", "Tu contacto","number"), array("input","Imagen","Copia el enlace a tu imagen","text"))
        
        //Lo he hecho así con formulario y carga de datos para hacerlo más interesante
     ?>
    <div class="flex justify-center text-6xl bg-gray-200"><h2 class="mt-5">TUS DATOS</h2></div>

    <div class="flex flex-row justify-center w-full h-screen bg-gray-200 overflow-hidden">
        <form method="post"action="index.php" class="ml-10 mt-10"> <!--Lo he hecho con post porque get tiene un limite para los links muy largos-->
            <?php
            foreach($formulario as $dato){
                echo "<label for='$dato[1]' class='text-lg'>$dato[1]</label><br>";
                echo "<$dato[0] type='$dato[3]' name='$dato[1]' placeholder='$dato[2]' class='p-2 border-2 rounded-lg mb-5 w-100'></$dato[0]><br>";
            }
            
            ?>
            <input type="submit" value="Enviar" class="mt-10 text-white text-lg cursor-pointer bg-green-400 px-3 py-1 rounded-lg">
        </form>
    
        <div class="border-4 border-blue-400 p-2 rounded-lg shadow-2xl ml-50 h-40 w-100 bg-gray-300 mt-10">
            <?php
                foreach($_POST as $key => $datos){
                    if($key == "Imagen"){
                        echo"<img src='$datos'>";
                    }else echo"<h3>$key: ".$datos."</h3>";
                }
                if(!empty($_POST)){
                    echo "<p>GUARDADO CORRECTAMENTE</p>";
                }
            ?>
        </div>
    </div>
</body>
</html>