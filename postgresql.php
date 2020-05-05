<?php
$conn = pg_connect("host=localhost port=5432 user=postgres password=1234 dbname=pruebaproyecto");
if (!$conn){
    die("PostgreSQL connection failed");
}
echo "PostgreSQL connected succesfully";

$nombres = pg_query($conn, "SELECT valor,nombre FROM prueba WHERE valor < 30");
if (!$nombres) {
  echo "Ocurrió un error.\n";
  exit;
}

while ($row = pg_fetch_row($nombres)) {
    echo "<br />\n";

  echo "Valor: $row[0]  Nombre: $row[1]";
  echo "<br />\n";
}


/*

$query = "INSERT INTO prueba(valor,nombre) VALUES (80,'fetch');";

$result = pg_query($conn, $query) or die('ERROR AL INSERTAR DATOS: ' . pg_last_error());

$cmdtuples = pg_affected_rows($result);
echo $cmdtuples . " datos registrados.\n"; 


// Free resultset liberar los datos
pg_free_result($result);
*/

echo "la fecha actual es " . date("d") . " del " . date("m") . " de " . date("Y");
echo "<br />\n";


echo "la hora es " . date("G") . "de" . date("i");
echo "<br />\n";

echo "a" . date("a");
echo "<br />\n";

// Antes del mediodía, despues del mediodía, AM o PM (mayúsculas)
echo "A" . date("A");
echo "<br />\n";

// Horario de 12 horas sin ceros, de 1 a 12
echo "g" . date("g");
echo "<br />\n";

// Horario de 12 horas con ceros, de 01 a 12
echo "h" . date("h");
echo "<br />\n";

// Horario de 24 horas sin ceros, de 0 a 23
echo "G" . date("G");
echo "<br />\n";

// Horario de 24 horas con ceros, de 01 a 23
echo "H" . date("H");

setlocale(LC_TIME,"es_ES");
		
echo strftime("Hoy es %A y son las %H:%M");
echo strftime("El año es %Y y el mes es %B");



pg_close($conn);

?>
