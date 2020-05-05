<html>
  <head>
     <title>
        Enviar Empleado
     </title>
  </head>
  <body>


<?php

$conn = pg_connect("host=localhost port=5432 user=postgres password=1234 dbname=proyectoDatabase");
if (!$conn){
    die("PostgreSQL connection failed");
}
echo "PostgreSQL connected succesfully";


$codigoempleado = $_POST['codigoempleado'];
$nombreempleado = $_POST['nombrempleado'];
$codigodepartamento =  $_POST['codigodep'];
$codigojornada= $_POST['codigojornada'];



$query = "INSERT INTO empleado VALUES ($codigoempleado,'$nombreempleado','$codigodepartamento','$codigojornada');";

$result = pg_query($conn, $query) or die('ERROR AL INSERTAR DATOS: ' . pg_last_error());

$tuplasaafectadas = pg_affected_rows($result);
echo $tuplasaafectadas . " datos registrados correctamente.\n"; 


pg_free_result($result);

pg_close($conn);


?>

     <center>
     <h1>  <a href="empleados.html">Regresar a Menu Empleado</a>  </h1> 
     </center>
  </body>
</html>

