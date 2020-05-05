

<html>
  <head>
     <title>
        Enviar Marca
     </title>
  </head>
  <body>


<?php

$conn = pg_connect("host=localhost port=5432 user=postgres password=1234 dbname=proyectoDatabase");
if (!$conn){
    die("PostgreSQL connection failed");
}
echo "PostgreSQL connected succesfully";


date_default_timezone_set("America/Guatemala");  
/*echo "The time is " . date("h:i:sa");  */


$codigo = $_POST['codigoempleado'];
$marca = $_POST['marca'];
$fecha =date("d") . "/" . date("m") . "/" . date("Y");
$truehora=date("H");

$hora= $truehora . ":" .  date("i") . ":" .  date("s") ;  







$query = "INSERT INTO marcas VALUES ('$fecha','$hora','$marca',$codigo);";

$result = pg_query($conn, $query) or die('ERROR AL INSERTAR DATOS: ' . pg_last_error());

$tuplasaafectadas = pg_affected_rows($result);
echo $tuplasaafectadas . " datos registrados correctamente.\n"; 


pg_free_result($result);

pg_close($conn);


?>

     <center>
     <h1>  <a href="index.html">Regresar a Menu principal</a>  </h1> 
     </center>
  </body>
</html>

