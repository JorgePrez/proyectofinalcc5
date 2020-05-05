<!doctype html>
<html lang="en">
  <head>
    <title>Title</title>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <link rel="stylesheet" href="css/other.css"> 

  </head>
  <body>

 <!-- <div id="main-container">  -->

 <h2> <br/></h2>

 <center>

<h1><b>Listado de Empleados<b></h1>

</center>

<h2> <br/></h2>


<div id="main-container"> 
<h3>
<table border=1>
<tr>
<th><b>Codigo</b></th>
<th><b>Nombre</b></th>
<th><b>Departamento</b></th>
<th><b>Jornada</b></th>



</tr>



<?php

$conn = pg_connect("host=localhost port=5432 user=postgres password=1234 dbname=proyectoDatabase");
if (!$conn){
    die("PostgreSQL connection failed");
}


$query = "Select * from empleado order by empleado.codigoempleado";

$result = pg_query($conn, $query) or die('ERROR : ' . pg_last_error());

$codigo = 0;
$nombre = "";
$departamento = 0;
$jornada = 0;
$nombredepartamento=0;
$nombrejornada=0;



while ($row = pg_fetch_row($result)) {

 $codigo= $row[0];
 $nombre= $row[1];
 $departamento = $row[2];
 $jornada = $row[3];


 echo "\t<tr>\n";
 echo "\t\t<td>$codigo</td>\n";
 echo "\t\t<td>$nombre</td>\n";

 $query2 = "select * from Departamento where Departamento.codigodepartamento=$departamento";
 $result2 = pg_query($conn, $query2) or die('ERROR : ' . pg_last_error());

 while ($row = pg_fetch_row($result2)) {
    $nombredepartamento= $row[1];
 
}

 echo "\t\t<td>$nombredepartamento</td>\n";

 $query2 = "select * from jornada where jornada.codigojornada=$jornada";
 $result2 = pg_query($conn, $query2) or die('ERROR : ' . pg_last_error());

 while ($row = pg_fetch_row($result2)) {
    $nombrejornada= $row[1];
 
}


 echo "\t\t<td>$nombrejornada</td>\n";
 echo "\t\t<td><a href=modificarempleado_forma.php?codigo=$codigo>Modificar</a></td>\n";






 

 echo "\t\t<td><a href=eliminarempleado.php?numero=$codigo>Eliminar</a></td>\n";




 




 echo "\t</tr>\n";



}

pg_free_result($result);

pg_close($conn);



?>

</table>
</h3>



<h3> <br/></h3>

<center>
<h2><a href="empleados.html"><u>Regresar a Menu empleados</u></a></h2>
</center>

</div> 






      
    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
  </body>
</html>