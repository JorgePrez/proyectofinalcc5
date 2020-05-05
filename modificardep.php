<html>
  <head>
     <title>
       Modificar Departamento
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


$query = "UPDATE departamento SET nombredepartamento='$nombre' WHERE codigodepartamento=$numero;";

$result = pg_query($conn, $query) or die('ERROR AL MODIFICAR DATOS: ' . pg_last_error());

$tuplasaafectadas = pg_affected_rows($result);

echo $tuplasaafectadas . " datos actualizados correctamente.\n"; 


pg_free_result($result);

pg_close($conn);


?>

     <center>
     <h1>  <a href="departamentos.html">Regresar a departamentos</a>  </h1> 
     </center>
  </body>
</html>