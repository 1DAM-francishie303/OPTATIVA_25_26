<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Respuesta positivo, cero o negativo</title>
</head>
<body>
    <?php
        if($_GET["numero"] == 0){
            echo "<h2>EL NUMERO ES CERO</h2>";
        }
        else if($_GET["numero"] > 0){
            echo "<h2>EL NUMERO ES POSITIVO</h2>";
        }
        else{
            echo "<h2>EL NUMERO ES NEGATIVO</h2>";
        }
    ?>
</body>
</html>