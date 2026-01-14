<?php
require './includes/conexion.php';
require './includes/data.php';
require './includes/header.php';


$tareas_doing = [];
$tareas_toDo = [];
$tareas_done = [];
$resultado_tareas = getTareas($db);

foreach($resultado_tareas as $tarea){

    if($tarea['estado'] == 'done'){
        array_push($tareas_done, $tarea);
    }else if($tarea['estado'] == 'doing'){
        array_push($tareas_doing, $tarea);
    }else{
        array_push($tareas_toDo, $tarea);
    }

}
?>

<div class="container my-5">
    <div class="row">
        <!-- Columna de tareas to_do -->
        <div class="col-md-4">
            <h2 class="text-center bg-danger text-dark p-2 rounded">TO DO</h2>
            <div class="card-columns w-full">
               <?php
                    foreach($tareas_toDo as $tarea){
                        echo "<div class='border-2 rounded-md border-red-500 w-full mb-4'>";
                        echo "<div class=' p-2 w-full bg-gray-200 rounded-t-md border-b-2 border-b-gray-400'>";
                        echo "Entrega: ". $tarea['fecha_entrega'];
                        echo "</div>";
                        echo "<p class='font-bold text-lg ml-2 mb-0 mt-2'>".$tarea['titulo']."</p><br>";
                        echo "<p class='ml-2'>".$tarea['descripcion']."</p>";
                        echo "</div>";
                    }
                    
               ?>
            </div>
        </div>

        <!-- Columna de tareas doing -->
          <div class="col-md-4">
            <h2 class="text-center bg-warning text-dark p-2 rounded">DOING</h2>
            <div class="card-columns">
               <?php
                    foreach($tareas_doing as $tarea){
                        echo "<div class='border-2 rounded-md border-yellow-500 w-full mb-4'>";
                        echo "<div class=' p-2 w-full bg-gray-200 rounded-t-md border-b-2 border-b-gray-400'>";
                        echo "Entrega: ". $tarea['fecha_entrega'];
                        echo "</div>";
                        echo "<p class='font-bold text-lg ml-2 mb-0 mt-2'>".$tarea['titulo']."</p><br>";
                        echo "<p class='ml-2'>".$tarea['descripcion']."</p>";
                        echo "</div>";
                    }
                    
               ?>
            </div>
        </div>

        <!-- Columna de tareas done -->
        <div class="col-md-4">
            <h2 class="text-center bg-success text-white p-2 rounded">DONE</h2>
            <div class="card-columns">
                <?php
                    foreach($tareas_done as $tarea){
                        echo "<div class='border-2 rounded-md border-green-500 w-full mb-4'>";
                        echo "<div class=' p-2 w-full bg-gray-200 rounded-t-md border-b-2 border-b-gray-400'>";
                        echo "Entrega: ". $tarea['fecha_entrega'];
                        echo "</div>";
                        echo "<p class='font-bold text-lg ml-2 mb-0 mt-2'>".$tarea['titulo']."</p><br>";
                        echo "<p class='ml-2'>".$tarea['descripcion']."</p>";
                        echo "</div>";
                    }
                    
               ?>
            </div>
        </div>
    </div>
</div>