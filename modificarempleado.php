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
$nombre = $_POST['nombrempleado'];
$departamento = $_POST['codigodep'];
$jornada = $_POST['codigojornada'];

$query = "UPDATE empleado SET nombreempleado='$nombre', codigodepartamento=$departamento, codigojornada=$jornada WHERE codigoempleado=$codigo";


$result = pg_query($conn, $query) or die('ERROR AL MODIFICAR DATOS: ' . pg_last_error());

$tuplasaafectadas = pg_affected_rows($result);

echo $tuplasaafectadas . " datos actualizados correctamente.\n"; 


pg_free_result($result);

pg_close($conn);


?>

     <center>
     <h1>  <a href="empleados.html">Regresar a Menu Empleados</a>  </h1> 
     </center>
  </body>
</html>