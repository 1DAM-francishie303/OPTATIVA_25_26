<?php
	if (!empty($_SERVER['HTTPS']) && ('on' == $_SERVER['HTTPS'])) {
		$uri = 'https://';
	} else {
		$uri = 'http://';
	}
	$uri .= $_SERVER['HTTP_HOST'];
	header('Location: '.$uri.'/dashboard/');
	exit;
?>
Something is wrong with the XAMPP installation :-(

<?php
/*
FILTER_SANITIZE_STRING	Elimina etiquetas HTML y caracteres especiales
FILTER_SANITIZE_EMAIL	Elimina caracteres inválidos en emails
FILTER_SANITIZE_URL	Elimina caracteres inválidos en URLs
FILTER_SANITIZE_NUMBER_INT	Deja solo dígitos y signo +/-
FILTER_SANITIZE_NUMBER_FLOAT	Deja solo números y punto/coma, opción FILTER_FLAG_ALLOW_FRACTION
FILTER_SANITIZE_SPECIAL_CHARS	Escapa caracteres especiales en HTML
FILTER_SANITIZE_FULL_SPECIAL_CHARS	Escapa más caracteres, incluyendo comillas
FILTER_SANITIZE_MAGIC_QUOTES	Aplica addslashes() (poco usado hoy)
FILTER_SANITIZE_ENCODED	Codifica URL
FILTER_SANITIZE_RAW	Sin cambios (solo flags)


array_multisort() sirve para ordenar varios arrays a la vez, o un array multidimensional según ciertas columnas.

Puedes ordenar más de un array y hacer que los arrays secundarios se reordenen siguiendo el orden del principal.

También puedes ordenar arrays asociativos con columnas de valores.

Sintaxis básica:

array_multisort(array1 [, orden1, tipo1, array2 [, orden2, tipo2, ...]])


array1 → array principal que quieres ordenar

orden → opcional, SORT_ASC (ascendente, por defecto) o SORT_DESC (descendente)

tipo → opcional, por ejemplo SORT_NUMERIC, SORT_STRING

Puedes añadir arrays secundarios, que se reordenarán siguiendo la misma lógica que el array principal.

Ejemplo simple con un solo array
$numeros = [4, 2, 8, 1];
array_multisort($numeros, SORT_ASC);
print_r($numeros);


Salida:

Array
(
    [0] => 1
    [1] => 2
    [2] => 4
    [3] => 8
)


Igual que sort($numeros).

Ejemplo con varios arrays
$nombres = ["Ana", "Luis", "Carlos"];
$edades = [25, 22, 30];

array_multisort($edades, SORT_ASC, $nombres);

print_r($edades);
print_r($nombres);


Salida:

Array
(
    [0] => 22
    [1] => 25
    [2] => 30
)
Array
(
    [0] => Luis
    [1] => Ana
    [2] => Carlos
)


edades se ordena ascendentemente

nombres sigue el orden de edades, así que los nombres permanecen “sincronizados” con las edades.

Ordenando arrays multidimensionales

Supongamos un array de personas:

$personas = [
    ["nombre" => "Ana", "edad" => 25],
    ["nombre" => "Luis", "edad" => 22],
    ["nombre" => "Carlos", "edad" => 30]
];

// Extraemos columna de edades
$edades = array_column($personas, "edad");
array_multisort($edades, SORT_ASC, $personas);

print_r($personas);


Salida:

Array
(
    [0] => Array ( [nombre] => Luis   [edad] => 22 )
    [1] => Array ( [nombre] => Ana    [edad] => 25 )
    [2] => Array ( [nombre] => Carlos [edad] => 30 )
)


Aquí array_multisort() ordena el array multidimensional según la columna edad.






*/
?>

