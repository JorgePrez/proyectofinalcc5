<html>
  <head>
     <title>
        Eliminar
     </title>
  </head>
  <body>


<?php

$numero=$_GET["numero"];

$conn = pg_connect("host=localhost port=5432 user=postgres password=1234 dbname=proyectoDatabase");
if (!$conn){
    die("PostgreSQL connection failed");
}


$query = "delete FROM departamento WHERE departamento.codigodepartamento=$numero;";

$result = pg_query($conn, $query) or die('ERROR : ' . pg_last_error());

echo 'el registro fue eliminado exitosamente<br>';

pg_free_result($result);

pg_close($conn);


?>


     <center>
     <h1>  <a href="departamentos.html">Regresar a Menu de Departamentos</a>  </h1> 

     </center>
  </body>
</html>
