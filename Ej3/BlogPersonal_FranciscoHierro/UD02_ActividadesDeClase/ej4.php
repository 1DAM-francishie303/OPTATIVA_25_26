<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tabla numeros</title>
</head>
<body>

    <form method="POST" action="" >

        <input type="text" name="nombre" placeholder="Nombre">

        <input type="number" name="retencion" placeholder="Tu retención en %">

        <input type="number" name="salario" placeholder="Tu salario mensual bruto">

        <button type="submit">Enviar</button>

    </form>

     <?php  
        if($_SERVER['REQUEST_METHOD'] === 'POST'){
            echo "<h2>Tu salario neto es de: ".$_POST['salario'] - $_POST['salario'] * ($_POST['retencion'] / 100). " euros<h2>";
        }
      ?>


</body>
</html>