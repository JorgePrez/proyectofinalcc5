

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
$fecha = $_POST['fecha'];
$horaentrada=$_POST['horaentrada'];
$horasalida=$_POST['horasalida'];


if ($horaentrada == "") {

  }
  else{
    $query = "INSERT INTO marcas VALUES ('$fecha','$horaentrada','E',$codigo);";

    $result = pg_query($conn, $query) or die('ERROR AL INSERTAR DATOS: ' . pg_last_error());
    
    $tuplasaafectadas = pg_affected_rows($result);
    echo $tuplasaafectadas . " datos registrados correctamente.\n"; 
    pg_free_result($result);



  }






  if ($horasalida == "") {

}
else{ 

$query2 = "INSERT INTO marcas VALUES ('$fecha','$horasalida','S',$codigo);";

$result2 = pg_query($conn, $query2) or die('ERROR AL INSERTAR DATOS: ' . pg_last_error());

$tuplasaafectadas2 = pg_affected_rows($result2);
echo $tuplasaafectadas2 . " datos registrados correctamente.\n"; 


pg_free_result($result2);


}

if (($horasalida == "") && ($horaentrada== "")) {

    $query = "INSERT INTO marcas VALUES ('$fecha',NULL,'E',$codigo);";

    $result = pg_query($conn, $query) or die('ERROR AL INSERTAR DATOS: ' . pg_last_error());
    
    $tuplasaafectadas = pg_affected_rows($result);
    echo $tuplasaafectadas . " datos registrados correctamente.\n"; 
    pg_free_result($result);


    $query2 = "INSERT INTO marcas VALUES ('$fecha',NULL,'S',$codigo);";

$result2 = pg_query($conn, $query2) or die('ERROR AL INSERTAR DATOS: ' . pg_last_error());

$tuplasaafectadas2 = pg_affected_rows($result2);
echo $tuplasaafectadas2 . " datos registrados correctamente.\n"; 



}


pg_close($conn);







?>

     <center>
     <h1>  <a href="administracion.html">Regresar a Menu Administración</a>  </h1> 
     </center>
  </body>
</html>

