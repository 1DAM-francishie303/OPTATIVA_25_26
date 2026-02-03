<?php
require './includes/modelo.php';

    $alumnosCurso = getAlumnosCurso($db);
    $cursos = getCursos($db);


    if(isset($_POST['refrescar']) && $_POST['curso'] != "") {
        $alumnosCurso = getAlumnosPorCurso($db, $_POST['curso']);
        
    }else if(isset($_POST['refrescar']) && $_POST['curso'] == ""){
        $alumnosCurso = getAlumnosCurso($db);
    }
       
    if(isset($_POST['guardarUsuario'])){
        if(isset($_POST['comprobarEdad'])){
            addAlumno($db, $_POST['nombreAlumno'], $_POST['emailAlumno'],  $_POST['curso'], $_POST['comprobarEdad']);

        }else{
            addAlumno($db, $_POST['nombreAlumno'], $_POST['emailAlumno'],  $_POST['curso'], 0);

        }
        $alumnosCurso = getAlumnosCurso($db); //Para actualizar
    }

   if(isset($_POST['guardarUsuarioEditado'])){
        modificarAlumno($db, $_POST['idAlumno'], $_POST['nombreAlumno'], $_POST['emailAlumno']);
        $alumnosCurso = getAlumnosCurso($db); //Para actualizar

    }
?>




<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Mi centro</title>
    
</head>
<body>
    <h1>Listado de Alumnos</h1>
    <p>Filtrar por curso: </p>
    <form method="POST" action="">
        <select class="form-select" id="curso" name="curso">
                <option value="" selected>Todos los cursos</option>  
                <?php foreach ($cursos as $curso): ?>
                    <option value='<?= $curso['nivel']?><?= $curso['abreviatura']?>'><?= $curso['nivel']; ?> <?= $curso['abreviatura']; ?></option>
                <?php endforeach; ?>   
        </select>

        <button type="submit" name="refrescar">Refrescar</button>
    </form>
   
    <form action='alumno.php' method='POST'>
        <button type='submit'>Añadir alumno</button>
    </form>

    <table>
     <thead>
        <tr>
            <th>
                Nombre
            </th>
            <th>
                Email
            </th>
            <th>
                Mayor de edad
            </th>
            <th>
                Curso
            </th>
            <th>
                Acciones
            </th>
        </tr>
    </thead>
        <tbody>
            <?php foreach ($alumnosCurso as $alumno):?>
                
                <tr>
                    <td>
                        <p><?= $alumno['NOMBRE']; ?><p>
                    </td>
                    <td>
                        <p><?= $alumno['EMAIL']; ?><p>
                    </td>
                    <td>
                        <?php
                            if($alumno['ISMAYOREDAD'] == 1){
                                echo "<p>Sí</p>";
                            }else{
                                echo "<p>No</p>";
                            }
                        ?>
                    </td>
                    <td>
                        <p><?= $alumno['nombrecurso']; ?><p>
                    </td>
                    <td>
                        <form action="alumno.php" method="POST">
                            <input type='hidden' name='id_alumnoRecibido' value=<?= $alumno['ID_ALUMNO']; ?>>
                            <button  type='submit' name="botonEdit">Editar</button>
                        </form>
                    </td>
                </tr>
               
            <?php endforeach; ?>   
        </tbody>
    </table>


</body>
</html>