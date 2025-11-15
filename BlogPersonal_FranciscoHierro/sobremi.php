<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sobre mi Francisco Hierro</title>
    <script src="https://cdn.jsdelivr.net/npm/@tailwindcss/browser@4"></script>
</head>
<body class="h-full w-full bg-gray-200">
    <?php require 'includes/header.php';
    echo "<h1 class='text-5xl flex justify-center mt-10 font-bold'>SOBRE MÍ</h1>";
    $hobbies = array(
    array("https://imagenes.elpais.com/resizer/v2/SHLDQW7SLBPYDHIX3YM6OGQ2CQ.jpg?auth=8da182101235684b9475d9be2308f3e046c1a3a374c0bc5aec9c717358708264&width=414","VER YOUTUBE","Paso mucho tiempo viendo vídeos de Youtube. Sé que debería dejarlo pero no puedo", "5 veces/semana")
    ,array("https://www.misclientesparasiempre.es/wp-content/uploads/2018/01/012018-JavaLenguajeProgramacion.jpg","PROGRAMAR","Me encanta programar y es a lo que me quiero dedicar en el futuro. Sobre todo me gusta Java.", "4 veces/semana")
    ,array("https://st3.depositphotos.com/1000260/16937/i/450/depositphotos_169372520-stock-photo-diet-fat-man-makes-choice.jpg","COMER","Me gusta comer mucho. Solo comida de calidad y muy buena como la carne de vaca", "7 veces/semana")
    );
    echo "<div class='flex flex-row justify-center mt-10'>";
    foreach($hobbies as $key => $hobbie) {
        echo "<div class='border-2 border-solid border-gray-200 rounded-2xl shadow-2xl mr-10'>";
        echo "<img src=$hobbie[0] class='mb-5 rounded-t-2xl w-full'/>";
        echo "<h2 class='mb-4 font-bold ml-5'>$hobbie[1]</h2>";
        echo "<p class='mb-5 ml-5'>$hobbie[2]</p>";
        echo "<button class='mb-4 ml-5 bg-green-600 rounded-md p-1 text-white'>$hobbie[3]</button>";
        echo "</div>";
    }
    echo "</div>";
    ?>
</body>
</html>