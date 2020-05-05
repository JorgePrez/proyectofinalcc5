<?php

$conn = pg_connect("host=localhost port=5432 user=postgres password=1234 dbname=proyectoDatabase");
if (!$conn){
    die("PostgreSQL connection failed");
}

    ?>
 

<!doctype html>
<html lang="en">
  <head>
    <title>Title</title>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
   
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <link rel="stylesheet" href="css/estilos.css">

  </head>
  <body>

    <body style= "height:100vh">

        <div class="container d-flex flex-column justify-content-between" style="height:100vh">

            <div class="row" style="height:100vh">   
                <div class="col-12 gris">
                    <div class="row alto1 ">


                        <div class="col-12 ">


                            <div class="row" id=cdblanco>
                                <div class="col-12  d-flex justify-content-center">
                                    <h1><br/></h1>


                               
                            </div>
                           


                                <div class="col-12  d-flex justify-content-center">
                                    <h1>Modificar Empleado</h1>


                               
                            </div>

                            <div class="col-12  d-flex justify-content-center">

                                <form id="form1" id=cuadro1 action="modificarempleado.php" method="post" class="needs-validation" novalidate>

                                    <div class="row" >
                                        <div class="col-12 d-flex justify-content-center">
                                            <h1><br/></h1>

                                        </div>


                                        <div class="col-8  d-flex justify-content-center align-items-center">
                                            <h2> 
                                                <label for="Codigo">Codigo:</label>

                                            </h2>

                                            
                                        </div>


                                        <div class="col-4  d-flex justify-content-center align-items-center">

                                        <?php
       
       $codigoempleado=$_GET["codigo"];	   
    
       
       
             echo "<h3>$codigoempleado</h3>\n";
              echo "<input type=hidden class=form-control name=codigoempleado id=codigoempleado value=$codigoempleado required>\n";



              $query = "select * from empleado where codigoempleado=$codigoempleado";

$result = pg_query($conn, $query) or die('ERROR : ' . pg_last_error());

$nombrempleado=0;
$codigodepartamento = 0;

$codigojornada= 0;


while ($row = pg_fetch_row($result)) {
    $nombrempleado=$row[1];
    $codigodepartamento= $row[2];
    $codigojornada= $row[3];

}



$query2 = "select * from departamento where departamento.codigodepartamento=$codigodepartamento";

$result2 = pg_query($conn, $query2) or die('ERROR : ' . pg_last_error());

$nombredepartamentoSelected=0;


while ($row = pg_fetch_row($result2)) {

    $nombredepartamentoSelected= $row[1];

}


$query2 = "select * from jornada where jornada.codigojornada=$codigojornada";

$result2 = pg_query($conn, $query2) or die('ERROR : ' . pg_last_error());

$nombrejornadaSelected=0;


while ($row = pg_fetch_row($result2)) {

    $nombrejornadaSelected= $row[1];

}







              ?>


                                            <div class="invalid-feedback">Complete el campo.</div>   
                                             
                                          </div>


                                        </div> 

                                    <div class="row" >
                                        <div class="col-12 d-flex justify-content-center">
                                            <h1><br/></h1>

                                        </div>


                                        <div class="col-8  d-flex justify-content-center align-items-center">
                                            <h2> 
                                                <label for="nombrempleado">Empleado:</label>

                                            </h2>  
                                        </div>
                                        <div class="col-4  d-flex justify-content-center align-items-center">

                                        <?php



                                            echo "<input type=text class=form-control name=nombrempleado id=nombrempleado value='$nombrempleado' required>\n";

                                            ?>

                                            <div class="invalid-feedback">Complete el campo.</div>   
                                           
                                          </div>
                                    </div>

                                    

                                    <div class="row" >
                                        <div class="col-12 d-flex justify-content-center">
                                            <h1><br/></h1>

                                        </div>

                                        <div class="col-8  d-flex justify-content-center align-items-center">
                                            <h2>
                                                <label for="codigodep">Departamento:</label>

                                            </h2>

                                            
                                        </div>


                                        <div class="col-4  d-flex justify-content-center align-items-center">
 
                                            <select name="codigodep" type="text" class="form-control" id="codigodep">
                                       
                                            <?php


        $query2 = "select * from departamento order by departamento.codigodepartamento";

$result2 = pg_query($conn, $query2) or die('ERROR : ' . pg_last_error());

$codigodepartamentoG = 0;
$nombredepartamento= 0;

while ($row = pg_fetch_row($result2)) {

    $codigodepartamentoG= $row[0];
    $nombredepartamento= $row[1];

    echo '<option value="'.$codigodepartamentoG.'"'.(strcmp($nombredepartamento,$nombredepartamentoSelected)==0?' selected="selected"':'').'>'."$nombredepartamento".'</option>';


}




        ?>

                                            </select>
                                             
                                          </div>


                                          
                                     


                                    


                                    </div>

                                    <div class="row" >
                                        <div class="col-12 d-flex justify-content-center">
                                            <h1><br/></h1>

                                        </div>


                                        <div class="col-8  d-flex justify-content-center align-items-center">
                                            <h2>
                                                <label for="codigojornada">Jornada:</label>

                                            </h2>

                                            
                                        </div>


                                        <div class="col-4  d-flex justify-content-center align-items-center">
 
                                            <select name="codigojornada" type="text" class="form-control" id="codigojornada">J
                                              

                                            
                                            <?php




$query2 = "select * from jornada order by jornada.codigojornada";

$result2 = pg_query($conn, $query2) or die('ERROR : ' . pg_last_error());

$codigojornadaG = 0;
$nombrejornada= 0;

while ($row = pg_fetch_row($result2)) {

$codigojornadaG= $row[0];
$nombrejornada= $row[1];

echo '<option value="'.$codigojornadaG.'"'.(strcmp($nombrejornada,$nombrejornadaSelected)==0?' selected="selected"':'').'>'."$nombrejornada".'</option>';


}

?>        
                                

                                            

                                            </select>
                                             
                                          </div>

                                        

                                       
                                    </div>

                                    <div class="row" >

                                        <div class="col-12 d-flex justify-content-center">
                                            <h1><br/></h1>

                                        </div>

                                        <div class="col-12  d-flex justify-content-center align-items-center">
                                            <h2> 
                                                <button class="btn-primary" name="agregar" id="agregar" type="submit">Modificar</button>

                                            </h2>  
                                        </div>

                                          
                              <div class="col-12  d-flex justify-content-center">
                                <h2><br/></h2> </div>
                              <div class="col-12 d-flex justify-content-center align-items-center">
                                <h2><a href="empleados.html"><u>Regresar a Menu de Empleados </u></a></h2>




                          
                          </div>




                                </div>








                                </form>


                              


                           
                        </div>



                            </div>  






                        </div>  



  
                
                

                </div>  
            
            
            </div>


            </div>



  
      
    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="js/validacion.js"></script>

    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
  </body>
</html>