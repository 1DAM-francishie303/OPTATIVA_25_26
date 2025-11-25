<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Numero aleatorio</title>
</head>
<body>
    <?php
        $aleatorio = rand(1,10);
        if($aleatorio >= 0 && $aleatorio <5){
            echo "<h2>Tu nota de un $aleatorio es insuficiente</h2>";
        }
        else if($aleatorio >= 5 && $aleatorio < 6){
            echo "<h2>Tu nota de un $aleatorio es suficiente</h2>";
        }
        else if($aleatorio >= 6 && $aleatorio < 7){
            echo "<h2>Tu nota de un $aleatorio es bien</h2>";
        }
        else if($aleatorio >= 7 && $aleatorio < 9){
            echo "<h2>Tu nota de un $aleatorio es notable</h2>";
        }
        else{
            echo "<h2>Tu nota de un $aleatorio es ¡¡¡sobresaliente!!!</h2>";
        }
    ?>
</body>
</html>