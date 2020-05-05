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
echo "PostgreSQL connected succesfully";


$codigojornada = $_POST['codigojornada'];
$nombrejornada = $_POST['nombrejornada'];
$horaentrada =  $_POST['horaentrada'];
$horasalida= $_POST['horasalida'];



$query = "INSERT INTO jornada VALUES ($codigojornada,'$nombrejornada','$horaentrada','$horasalida');";

$result = pg_query($conn, $query) or die('ERROR AL INSERTAR DATOS: ' . pg_last_error());

$tuplasaafectadas = pg_affected_rows($result);
echo $tuplasaafectadas . " datos registrados correctamente.\n"; 


pg_free_result($result);

pg_close($conn);


?>

     <center>
     <h1>  <a href="jornadas.html">Regresar a Menu Jornada</a>  </h1> 
     </center>
  </body>
</html>

