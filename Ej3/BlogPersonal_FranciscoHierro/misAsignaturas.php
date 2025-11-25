<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ej2 Francisco Hierro</title>
    <style>
        #asignaturas{
            font-weight:900;
            margin-top:50px
        }
        h2{
            margin:0;
            margin-top:50px;
            border-top: 1px solid black;
            padding-top:10px;
        }
    </style>
</head>
<body>

    <?php require 'includes/header.php';
    ?>

    <h1 id="asignaturas">MIS ASIGNATURAS  MATRICULADAS </h1>

    <?php 

        $alumnos = array("Sabrina_Garcia" => ["PSP", "PROYECTO", "OPTATIVA"], "Maria_Villuela" => ["PROGRAMACION_MULTIMEDIA", "PSP", "PROYECTO"], "Manuel_Sanchez" => ["OPTATIVA", "PROYECTO", "ACCESO A DATOS"],"Francisco_Hierro" => ["PSP", "OPTATIVA", "PROYECTO"], "Pedro_Gomez" => ["OPTATIVA", "ACCESO A DATOS", "PSP"]);

        foreach($alumnos as $nombre => $asignaturas){
                if($_SESSION['nombre'] == $nombre){
                    echo "<h2>Alumno: $nombre</h2><br>";
                    echo "<p>Asignaturas matriculadas: </p>";
                    foreach($asignaturas as $asignatura){
                        echo $asignatura."<br>";
                    }
            }
        }

    ?>
</body>
</html>