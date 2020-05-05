<html>
  <head>
     <title>
        Enviar Jornada
     </title>
  </head>
  <body>


<?php

$conn = pg_connect("host=localhost port=5432 user=postgres password=1234 dbname=proyectoDatabase");
if (!$conn){
    die("PostgreSQL connection failed");
}


$codigoempleado= $_POST['codigoempleado'];
$fecha = $_POST['fechapermiso'];
$tipo =  $_POST['tipo'];
$motivo= $_POST['motivo'];



$query = "INSERT INTO permisos VALUES ('$fecha','$motivo','$tipo',$codigoempleado);";

$result = pg_query($conn, $query) or die('ERROR AL INSERTAR DATOS: ' . pg_last_error());

$tuplasaafectadas = pg_affected_rows($result);
echo $tuplasaafectadas . " datos registrados correctamente.\n"; 


pg_free_result($result);

pg_close($conn);


?>

     <center>
     <h1>  <a href="permisos.html">Regresar a Menu Permisos</a>  </h1> 
     </center>
  </body>
</html>

