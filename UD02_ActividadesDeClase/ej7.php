<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ir cambiando la etiqueta h</title>
</head>
<body>
    <form action="" method="POST">
        <label for="frase">Texto:</label>
        <input type="text" name="frase" placeholder="introduce el texto">
        <button type="submit">Enviar</button>
    </form>

    <?php
        if(!empty($_POST)){
            for($i = 1; $i < 7; $i++){
                echo "<h$i>".$_POST["frase"]."</h$i>";
            }
        }
        
    ?>
</body>
</html>