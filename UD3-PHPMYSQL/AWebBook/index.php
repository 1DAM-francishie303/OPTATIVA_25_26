<?php

require './includes/data.php';

require './includes/header.php';


$librosInfo = getInfoLibros($db);

$categorias = getCategorias($db);

//imprimir arrays:
//var_dump($libros);
//imprimir variables
//echo $variable;

//Aqui pasa una cosa: para sacar el nombre de la categoria de cada libro podriamos haber hecho en data.php una funcion que hiciera un JOIN que uniera cada libro con su categoria por su id 
// y hacer una array con el resultado para usarlo aqui. O se puede hacer de esta forma que se me ha ocurrido con arrays. PERO HAY QUE TENER EN CUENTA UNA COSA. EN EL FOREACH LA VARIABLES QUE 
//USAMOS PARA RECORRERLO, EL  AS $LIBRO  ES TEMPORAL, SE USA SOLO PARA RECORRERLO, NO CAMBIA NUESTRO ARRAY $LIBROS QUE RECORREMOS. ENTONCES DEBEMOS MODIFICARLO EN EL ARRAY $LIBROS DIRECTAMENTE.
/* CLARO PERO SI AHORA TENEMOS TAMBIEN QUE DECIR SI ESTÁ UN LIBRO RESERVADO O NO YA ES MAS COMPLICADO PORQUE DEBEMOS CAMBIAR UN ATRIBUTO DE LIBROS PARA DEDICARLO A SI ESTÁ RESERVADO O NO
$contador = 0;
foreach($libros as $libro){
    foreach($categorias as $categoria){
        if($libro['id_categoria'] == $categoria['id_categoria']){            
            $libros[$contador]['id_categoria'] = $categoria['nombre'];
            $contador++;
            break;
        }
    }
    
}
*/


if(isset($_POST['catSeleccionada'])) {

    $librosInfo = filtrarLibrosPorCategoria($db, $_POST['categoria']);//ES EL ID DEL SELECT
}
if(isset($_POST['limpiar'])) {

    $librosInfo = getInfoLibros($db);
}
if(isset($_POST['fecha']) && $_POST['fecha'] != "" && isset($_POST['id_libro_reservar'])){
    $fecha_reserva = $_POST['fecha'] . " 00:00:00"; 
    crearReserva($db, $_POST['id_libro_reservar'], $_SESSION['id_usuario'], $fecha_reserva );
    //ACTUALIZAMOS LIBROSINFO (YA QUE SE EJECUTA LO PRIMERO EN LA PAGINA LO ACTUALIZAMOS OTRA VEZ)
    $librosInfo = getInfoLibros($db);

}
if(isset($_POST['fecha']) && $_POST['fecha'] == "" && isset($_POST['id_libro_reservar'])){
    crearReservaSinFecha($db, $_POST['id_libro_reservar'], $_SESSION['id_usuario']);
    //ACTUALIZAMOS LIBROSINFO (YA QUE SE EJECUTA LO PRIMERO EN LA PAGINA LO ACTUALIZAMOS OTRA VEZ)
    $librosInfo = getInfoLibros($db);

}

?>
<div class="container">
    <div class="row m-4 justify-content-between">
        <!-- Botón para ver reservas si está logueado -->
         <?php if(isset($_SESSION['username']))
        echo "<button type='button' class='btn btn-info text-white' data-bs-toggle='modal' data-bs-target='#reservasModal'>
            Mis reservas
        </button>"
        ?>
        <div class="col-4 mb-4">

        </div>

        <!--FILTRO POR CATEGORÍA-->
        <!--RECUERDA PONER LAS COMILLAS EN LOS VALUE='' AUNQUE SEA PHP Y COSAS ASI -->
        <form class="d-flex flex-row" method="post" action="">
            <select class="form-select" id="categoria" name="categoria" required>
              <option value="" disabled selected>Selecciona una categoria</option>  
              <?php foreach ($categorias as $categoria): ?>
                <option value='<?= $categoria['nombre']; ?>'><?= $categoria['nombre']; ?></option>
              <?php endforeach; ?>   
            </select>
            <div class=" justify-content-between align-items-center ">
                <button type="submit" name="catSeleccionada" class="btn bg-success text-white">Filtrar</button>
            </div>
            <div class=" justify-content-between align-items-center ">
                <button type="submit" name="limpiar" class="btn bg-danger text-white">Limpiar</button>
            </div>
        </form>
    </div>

    <div class="row">
        <?php foreach ($librosInfo as $libro):?>
            
            <div class="col-md-4 d-flex align-items-stretch pb-1">
                <div class="card shadow">
                    <img src="./img/<?= $libro['imagen']; ?>" class="img-thumbnail w-50" alt="">
                    <div class="card-body d-flex flex-column">
                        <h5 class="card-title"><?= $libro['titulo']; ?></h5>
                        <p class="card-text">
                            <strong>Autor:</strong><?= $libro['autor']; ?><br>
                            <strong>Categoría:</strong> <?= $libro['nombre']; ?>
                        </p>
                        <div class="mt-auto">
                             
                                <?php
                                if(isset($libro['id_reserva'])){
                                    echo "<button disabled class='btn text-light bg-secondary w-100'>No disponible</button>";
                                    
                                }else{
                                    if(isset($_SESSION['username'])){
                                        echo "<form action='reserva.php' method='POST'>";   
                                        //DENTRO DE UN ECHO NO PODEMOS PONER value="<?= $libro['id_libro'];
                                        echo "<input type='hidden' name='id_libro' value=" . $libro['id_libro'] . ">";

                                        echo "<button type='submit' class='btn btn-primary w-100 bg-gray-500'>Reservar</button>";
                                        echo "</form>";
                                    }else{
                                        echo "<form action='login.php' method='POST'>";   
                                        echo "<button type='submit' class='btn btn-primary w-100 bg-gray-500'>Reservar</button>";
                                        echo "</form>";
                                    }
                                }
                               

                                
                                ?>
                            
                        </div>
                    </div>
                </div>
            </div>
        <?php endforeach; ?>   

    </div>

</div>

<!-- Modal para mostrar reservas -->

<div class="modal fade" id="reservasModal" tabindex="-1" aria-labelledby="reservasModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="reservasModalLabel">Mis Reservas</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <!-- Aquí se pueden listar las reservas del usuario -->
                <p>Aquí se mostrarán las reservas del usuario logueado.</p>
                <?php 
                    $reservasUsuario = getReservasUsuario($db, $_SESSION['id_usuario'])
                    
                ?>
                <table>
                    <thead>
                        <tr>
                            <th>
                                Título
                            </th>
                            <th>
                                Fecha de reserva
                            </th>
                        </tr>
                    </thead>
                    <tbody>
                <?php foreach ($reservasUsuario as $reserva):?>
                    <tr>
                        <td>
                            <p><?= $reserva['titulo']; ?><p>
                        </td>
                        <td>
                            <p><?= $reserva['fecha_reserva']; ?><p>
                        </td>
                    </tr>
                <?php endforeach; ?> 
                </tbody>
                </table>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cerrar</button>
            </div>
        </div>
    </div>
</div>