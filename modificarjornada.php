<html>
  <head>
     <title>
       Modificar Jornada
     </title>
  </head>
  <body>


<?php

$conn = pg_connect("host=localhost port=5432 user=postgres password=1234 dbname=proyectoDatabase");
if (!$conn){
    die("PostgreSQL connection failed");
}

$numero = $_POST['numero'];
$nombre = $_POST['nombre'];
$entrada = $_POST['entrada'];
$salida = $_POST['salida'];


$query = "UPDATE jornada SET nombrejornada='$nombre',horaentrada='$entrada',horasalida='$salida' WHERE codigojornada=$numero";


$result = pg_query($conn, $query) or die('ERROR AL MODIFICAR DATOS: ' . pg_last_error());

$tuplasaafectadas = pg_affected_rows($result);

echo $tuplasaafectadas . " datos actualizados correctamente.\n"; 


pg_free_result($result);

pg_close($conn);


?>

     <center>
     <h1>  <a href="jornadas.html">Regresar a Jornadas</a>  </h1> 
     </center>
  </body>
</html>