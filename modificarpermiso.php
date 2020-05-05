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

$codigo = $_POST['codigoempleado'];
$fecha = $_POST['fechapermiso'];
$tipo = $_POST['tipo'];
$motivo= $_POST['motivo'];


$query = "UPDATE permisos SET tipo='$tipo',motivo='$motivo' WHERE fechapermiso='$fecha' AND codigoempleado=$codigo";





$result = pg_query($conn, $query) or die('ERROR AL MODIFICAR DATOS: ' . pg_last_error());

$tuplasaafectadas = pg_affected_rows($result);

echo $tuplasaafectadas . "datos actualizados correctamente.\n"; 


pg_free_result($result);

pg_close($conn);


?>

     <center>
     <h1>  <a href="permisos.html">Regresar a Permiso</a>  </h1> 
     </center>
  </body>
</html>