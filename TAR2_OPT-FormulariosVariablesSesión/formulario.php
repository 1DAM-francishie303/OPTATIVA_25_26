<!doctype html>
<html>
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <script src="https://cdn.jsdelivr.net/npm/@tailwindcss/browser@4"></script><!--ESTO ES PARA IMPORTAR TAILWINDCSS EN REMOTO-->
  </head>
  <body class="w-full h-full bg-gray-200">
    <?php
       session_start();
       $nombre = $_SESSION['nombre'] ?? "";
       $apellido = $_SESSION['apellido'] ?? "";
       
        if(isset($_POST["limpiar"])){
          session_unset(); //Borramos todos los datos de la sesión si limpia
          $nombre = "";
          $apellido = "";
        }
        
        
    ?>
    <form class="border-2 h-170 border-gray-300 shadow-2xl w-100 m-10 rounded-2xl bg-gray-100" method="POST" action="procesar.php">
      <div class="flex flex-col ml-10 mt-7">
        <label for="nombre">Nombre</label>
        <input type="text" value="<?= $nombre ?>" name="nombre" class="w-2/3 border-2 rounded-lg border-gray-300">
        <label for="apellido">Apellido</label>
        <input type="text" name="apellido" class="w-2/3 border-2 rounded-lg border-gray-300" value="<?= $apellido ?>">
        <label for="correo">Correo electrónico</label>
        <input type="text" name="correo" class="w-2/3 border-2 rounded-lg border-gray-300">
        <select name="paises" id="1" class="mt-8 w-2/3 border-2 rounded-lg border-gray-300">
          <option value="Ningun pais">Selecciona tu país</option>
          <option value="España">España</option>
          <option value="Francia">Francia</option>
          <option value="Italia">Italia</option>
        </select>
        <p class="mt-7">Selecciona tus intereses</p>
        <select multiple name="intereses[]" id="2" class="w-2/3 border-2 rounded-lg border-gray-300 p-2"> <!--PARA QUE TE COJA LAS OPCIONES COMO UN ARRAY DEBES PONER EN EL NOMBRE CORCHETES []-->
          <option value="Tecnología">Tecnología</option>
          <option value="Economía">Economía</option>
          <option value="Arte">Arte</option>
          <option value="Deportes">Deportes</option>
        </select>
        <div class="mt-5">
          <input type="radio" name="comprobarEdad">
          <label for="mayorEdad">Sí, soy mayor de edad</label>
        </div>
        <div class="mt-2">
          <input type="radio" name="comprobarEdad">
          <label for="menorEdad">No, soy menor de edad</label>
        </div>

        <div>
          <input value="VS Code" type="checkbox" id="vs" name="herramientas[]" value="vs" class="mt-5">
          <label for="vs">VS Code</label>
        </div>
        <div>
          <input value="IntelliJ" type="checkbox" id="in" name="herramientas[]" value="in">
          <label for="in">IntelliJ</label>
        </div>
        <div>
          <input value="NetBeans" type="checkbox" id="net" name="herramientas[]" value="net">
          <label for="net">NetBeans</label>
        </div>
        <div>
            <input value="BlueJ" type="checkbox" id="blue" name="herramientas[]" value="blue">
            <label for="blue">BlueJ</label>
        </div>
        </div>
        
        <button type="submit" class="ml-10 mt-5 bg-green-400 px-3 py-1 border-2 cursor-pointer">Enviar</button>
        
        <button  type="submit" formaction="" name="limpiar" class="ml-15 mt-5 bg-red-400 px-3 py-1 border-2 cursor-pointer">Limpiar</button>

    </form>

  </body>
</html>