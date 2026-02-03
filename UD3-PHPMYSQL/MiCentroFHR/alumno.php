<?php
require './includes/modelo.php';

    $cursos = getCursos($db);
    $alumnoRecibido = array();
    if(isset($_POST['botonEdit'])){
        $alumnoRecibido = getAlumnoId($db, $_POST['id_alumnoRecibido']);
    }
    
?>




<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Añadir alumno</title>
</head>
<body>
    <h1>Añadir alumno</h1>
    <?php 
        if(!isset($_POST['botonEdit'])){

        echo "<form action='index.php' method='POST'>

        <label for='nombreAlumno'>Nombre:</label><br>
        <input type='text' id='nombreAlumno' name='nombreAlumno' required><br>
        <label for='emailAlumno'>Email:</label><br>
        <input type='text' id='emailAlumno' name='emailAlumno' required><br>
        <label for='cursoAlumno'>Curso:</label><br>
        <select class='form-select' id='curso' name='curso'>";
            foreach ($cursos as $curso): 
               echo "<option value=".$curso['nivel'].$curso['abreviatura'].">".$curso['nivel']." ".$curso['abreviatura']."</option>";
            endforeach;  
        echo "</select><br>
        <input type='checkbox' name='comprobarEdad' id='comprobarEdad' value='1'>
        <label for='comprobarEdad'>Mayor de edad</label><br>
        <button type='submit' name='guardarUsuario'>Guardar</button>
    </form>";

        } else{
        echo "<form action='index.php' method='POST'>
        <input type'hidden' name='idAlumno' value=".$_POST['id_alumnoRecibido'].">
        <label for='nombreAlumno'>Nombre:</label><br>
        <input type='text' id='nombreAlumno' value=". $alumnoRecibido[0]['nombre']." name='nombreAlumno' required><br>
        <label for='emailAlumno'>Email:</label><br>
        <input type='text' id='emailAlumno' value=". $alumnoRecibido[0]['email']." name='emailAlumno' required><br>
        <label for='cursoAlumno'>Curso:</label><br>
        <select class='form-select' id='curso' name='curso'>";
            foreach ($cursos as $curso): 
               echo "<option value=".$curso['nivel'].$curso['abreviatura'].">".$curso['nivel']." ".$curso['abreviatura']."</option>";
            endforeach;  
        echo "</select><br>
        <input type='checkbox' name='comprobarEdad' id='comprobarEdad' value=". $alumnoRecibido[0]['isMAyorEdad'].">
        <label for='comprobarEdad'>Mayor de edad</label><br>
        <button type='submit' name='guardarUsuarioEditado'>Guardar</button>
        </form>";
        }
        
        ?>
      
    
    <form action="index.php">
        <button type="submit">Cancelar</button>
    </form>

</body>
</html>