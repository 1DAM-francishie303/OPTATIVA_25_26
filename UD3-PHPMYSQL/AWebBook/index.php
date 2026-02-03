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
if(isset($_POST['eliminar'])){
    eliminarLibro($db, $_POST['eliminar']);
    $librosInfo = getInfoLibros($db);
}

if(isset($_POST['btn_registrar_libro'])){ //Se puede hacer el isset al boton del formulario solo para no tener que hacerlo a todos los campos (aun asi hemos puesto required)
    crearLibro($db, $_POST['tituloLibro'], $_POST['autorLibro'], $_POST['categoriaLibro'], $_POST['imagenLibro']);
    $librosInfo = getInfoLibros($db);

} 

?>
<div class="container">
    <div class="row m-4 justify-content-between">
        <!-- Botón para ver reservas si está logueado -->
         <?php if(isset($_SESSION['username']) && $_SESSION['username'] != 'admin'){
                    echo "<button type='button' class='btn btn-info text-white' data-bs-toggle='modal' data-bs-target='#reservasModal'>
                    Mis reservas
                    </button>";
                }else if(isset($_SESSION['username']) && $_SESSION['username'] == 'admin'){
                    echo "<button type='button' class='btn btn-info text-white' data-bs-toggle='modal' data-bs-target='#reservasModal'>
                    Registrar libro
                    </button>";
                }
        
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
                                    if(isset($_SESSION['username']) && $_SESSION['username'] != 'admin'){
                                        echo "<form action='reserva.php' method='POST'>";   
                                        //DENTRO DE UN ECHO NO PODEMOS PONER value="<?= $libro['id_libro'];
                                        echo "<input type='hidden' name='id_libro' value=" . $libro['id_libro'] . ">";

                                        echo "<button type='submit' class='btn btn-primary w-100 bg-gray-500'>Reservar</button>";
                                        echo "</form>";
                                    }else  if(isset($_SESSION['username']) && $_SESSION['username'] == 'admin' ){
                                        echo "<form action='' method='POST'>";
                                        echo "<input type='hidden' name='eliminar' value=" . $libro['id_libro'] . ">";
                                        echo "<button type='submit' class='btn btn-primary w-100 bg-gray-500'>Eliminar</button>";
                                        echo "</form>";
                                    }else{
                                        echo "<form action='login.php' method='POST'>";   
                                        echo "<button type='submit' name='btnNuevoLibro' class='btn btn-primary w-100 bg-gray-500'>Reservar</button>";
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
                <?php
                if($_SESSION['username'] != 'admin'){
                    $reservasUsuario = getReservasUsuario($db, $_SESSION['id_usuario']);
                    //Aquí se pueden listar las reservas del usuario
                    echo "<p>Aquí se mostrarán las reservas del usuario logueado.</p>";
                    echo "<table>
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
                    <tbody>";
                    foreach ($reservasUsuario as $reserva):
                    echo "<tr>
                        <td>
                            <p>".$reserva['titulo'] ."<p>
                        </td>
                        <td>
                            <p>".$reserva['fecha_reserva']."<p>
                        </td>
                    </tr>";
                    endforeach; 
                echo "</tbody>
                </table>";

                }else if($_SESSION['username'] == 'admin'){
                     echo "<p>Registra un libro.</p>";
                     echo "<form action='' method='POST'> ";
                        echo "<label for='tituloLibro' class='form-label'>Titulo</label>
                        <input type='text' class='form-control' id='titlo' name='tituloLibro' placeholder='Introduce el titulo del libro' required>
                        <label for='autorLibro' class='form-label'>Autor</label>
                        <input type='text' class='form-control' id='autor' name='autorLibro' placeholder='Introduce el autor del libro' required>
                        <label for='imagenLibro' class='form-label'>Imagen de la portada del libro</label>
                        <input type='text' class='form-control' id='imagenLibro' name='imagenLibro' placeholder='Introduce el enlace de la portada del libro' required>
                        <label for='categoriaLibro' class='form-label'>Categoria</label>
                        <select class='form-select' id='categoriaLibro' name='categoriaLibro' required>
                            <option value='' disabled selected>Selecciona una categoria</option>";  
                            foreach ($categorias as $categoria):
                            echo "<option value='". $categoria['nombre'] ." '>'". $categoria['nombre']. "' ></option>";
                            endforeach;   
                        echo "</select>";
                        echo "<button type='submit' name='btn_registrar_libro' class='btn btn-primary w-100 bg-gray-500'>Registrar</button>";

                     echo "</form>";
                    
                }
                ?>
                
                
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cerrar</button>
            </div>
        </div>
    </div>
</div>