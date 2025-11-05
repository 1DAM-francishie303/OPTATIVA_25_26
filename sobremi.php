<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sobre mi Francisco Hierro</title>
    <script src="https://cdn.jsdelivr.net/npm/@tailwindcss/browser@4"></script>
</head>
<body>
    <?php
    echo "<h1>SOBRE MÍ</h1>";
    $hobbies = array(
    array("https://www.deustoformacion.com/sites/deustoformacion/files/imagenes_blog_1/tic/2015/03/source.jpg","ver Youtube","Paso mucho tiempo viendo vídeos de Youtube. Sé que debería dejarlo pero no puedo")
    ,array("https://i.blogs.es/589313/b1cf7a8695629ac2dd35a72bf2c35f41/500_333.webp","programar","Me encanta programar y es a lo que me quiero dedicar en el futuro. Sobre todo me gusta Java.")
    ,array("https://st3.depositphotos.com/1000260/16937/i/450/depositphotos_169372520-stock-photo-diet-fat-man-makes-choice.jpg","comer","Me gusta comer mucho. Solo comida de calidad y muy buena como la carne de vaca")
    );
    
    foreach($hobbies as $key => $hobbie) {
        echo "<div class='border-2 border-solid w-100 h-100'>";
        echo "<img src=$hobbie[0]/>";
        echo "<h2>$hobbie[1]</h2>";
        echo "<p>$hobbie[2]</p>";
        echo "</div>";
    }

    ?>
</body>
</html>