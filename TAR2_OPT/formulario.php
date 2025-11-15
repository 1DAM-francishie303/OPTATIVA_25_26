<!doctype html>
<html>
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <script src="https://cdn.jsdelivr.net/npm/@tailwindcss/browser@4"></script><!--ESTO ES PARA IMPORTAR TAILWINDCSS EN REMOTO-->
  </head>
  <body class="w-full h-full bg-gray-200">
    
    <form class="border-2 h-150 border-gray-300 shadow-2xl w-100 m-10 rounded-2xl bg-gray-100">
      <div class="flex flex-col ml-10 mt-7">
        <label for="nombre">Nombre</label>
        <input type="text" name="nombre" class="w-2/3 border-2 rounded-lg border-gray-300">
        <label for="apellido">Apellido</label>
        <input type="text" name="apellido" class="w-2/3 border-2 rounded-lg border-gray-300">
        <label for="correo">Correo electrónico</label>
        <input type="text" name="correo" class="w-2/3 border-2 rounded-lg border-gray-300">
        <select name="paises" id="1" class="mt-8 w-2/3 border-2 rounded-lg border-gray-300">
          <option value="">Selecciona tu país</option>
          <option value="1">España</option>
          <option value="2">Francia</option>
          <option value="3">Italia</option>
        </select>
        <p class="mt-7">Selecciona tus intereses</p>
        <select multiple name="intereses" id="2" class="w-2/3 border-2 rounded-lg border-gray-300 p-2">
          <option value="1">Tecnología</option>
          <option value="2">Economía</option>
          <option value="3">Arte</option>
          <option value="4">Deportes</option>
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
          <input type="checkbox" id="vs" name="herramientas" value="vs">
          <label for="vs">VS Code</label>
        </div>
        <div>
          <input type="checkbox" id="in" name="herramientas" value="in">
          <label for="in">IntelliJ</label>
        </div>
        <div>
          <input type="checkbox" id="net" name="herramientas" value="net">
          <label for="net">NetBeans</label>
        </div>

        <input type="checkbox" id="blue" name="herramientas" value="blue">
        <label for="blue">BlueJ</label>




        </div>
    </form>


  </body>
</html>