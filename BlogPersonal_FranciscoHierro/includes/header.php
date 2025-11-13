<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://cdn.jsdelivr.net/npm/@tailwindcss/browser@4"></script>
    <title>Header</title>
</head>
<body>
    <div class="w-screen h-30 bg-blue-400 text-white text-5xl p-3 pt-5"><h1 class="ml-6">Blog de Francisco Hierro</h1></div>
    <nav class="w-screen h-10 bg-blue-300">
        <?php 
            $navMenu = array(array("INICIO", "../BlogPersonal_FranciscoHierro/inicio.php"), array("SOBRE MÍ","../BlogPersonal_FranciscoHierro/sobremi.php"), array("PROYECTOS","../BlogPersonal_FranciscoHierro/proyectos.php"), array("CONTACTO","../BlogPersonal_FranciscoHierro/contacto.php"), array("PÁGINA DE BIENVENIDA/TUS DATOS", "../BlogPersonal_FranciscoHierro/index.php"));            
            foreach($navMenu as $nav){
                if($nav[0] == "PÁGINA DE BIENVENIDA/TUS DATOS"){
                    echo "<button class='cursor-pointer hover:text-white m-2 ml-[550px]'><a href=$nav[1]>$nav[0]</a></button>";
                }else echo "<button class='cursor-pointer hover:text-white m-2 mx-10'><a href=$nav[1]>$nav[0]</a></button>";
            }
        ?>
    </nav>
</body>
</html>