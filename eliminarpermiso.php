<html>
  <head>
     <title>
        Eliminar Permiso
     </title>
  </head>
  <body>


<?php

$fecha=$_GET["fecha"];
$codigo=$_GET["codigo"];

$conn = pg_connect("host=localhost port=5432 user=postgres password=1234 dbname=proyectoDatabase");
if (!$conn){
    die("PostgreSQL connection failed");
}





$query = "delete FROM permisos WHERE fechapermiso='$fecha' AND codigoempleado=$codigo";

$result = pg_query($conn, $query) or die('ERROR : ' . pg_last_error());

echo 'el registro fue eliminado exitosamente<br>';

pg_free_result($result);

pg_close($conn);


?>


     <center>
     <h1>  <a href="permisos.html">Regresar a Menu de Permisos</a>  </h1> 

     </center>
  </body>
</html>
