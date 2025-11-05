<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Alumnos arrays Francisco Hierro</title>
</head>
<body>
    <?php
       $alumnos = array(
            array(
               "nombre" => "Ana",
               "edad" => 17,
               "curso" => "2DAM",
               "promedio" => 9.1
            ),
            array(
               "nombre" => "Luis",
               "edad" => 18,
               "curso" => "	4°ESO",
               "promedio" => 4.5
            ),
            array(
               "nombre" => "Marta",
               "edad" => 17,
               "curso" => "	1DAW",
               "promedio" => 8.3 
            ),
            array(
               "nombre" => "Manuel",
               "edad" => 18,
               "curso" => "2DAM",
               "promedio" => 6.7 
            ),
            array(
               "nombre" => "Paula",
               "edad" => 	16,
               "curso" => "1DAW",
               "promedio" => 7.2 
            )
       );

       foreach($alumnos as $key => $alumno){
         foreach($alumno as $key2 => $dato){
            print_r($key2." ");
         }
         break;
      }
      echo "<br>";

      $contadorAprobados = 0;
      $contadorSuspensos = 0;


      foreach($alumnos as $key => $alumno){
         if($alumno["promedio"] >= 5){
                $contadorAprobados++;
            }else{
               $contadorSuspensos++;
            }
         foreach($alumno as $key2 => $dato){
            print_r($dato." ");
            
         }
         echo "<br>";
      }
       echo "Total aprobados: ".$contadorAprobados;
       echo "<br>";
       echo "Total de alumnos suspensos: ".$contadorSuspensos;

    ?>
</body>
</html>