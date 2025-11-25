<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://cdn.jsdelivr.net/npm/@tailwindcss/browser@4"></script>
    <title>Ejercicio 1 Francisco Hierro</title>
    <style>
        .titulo{
            font-size:40px;
        }
       
    </style>
</head>
<body>

    <h1 class="titulo">Configuración de la visualización de imágenes</h1>
    <form action="Resultado.php" method="POST">

    <select name="colores" id="menu-colores">
        <option value="rojo">Rojo</option>
        <option value="verde">Verde</option>
        <option value="azul">Azul</option>
    </select>

    <label for="imagenes">Número de imágenes</label>
    <input name="imagenes" type="number">

    <input value="img1" type="checkbox" id="img1" name="img1" value="img1">
    <label for="img1">img1</label>

    <input value="img2" type="checkbox" id="img2" name="img2" value="img2">
    <label for="img2">img2</label>

    <button type="submit">Enviar</button>
    
    </form>

</body>
</html>