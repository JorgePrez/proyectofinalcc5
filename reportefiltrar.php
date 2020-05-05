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
                                    <h1>Reporte por Empleado</h1>


                               
                            </div>

                            <div class="col-12  d-flex justify-content-center">

                                <form id="form1" id=cuadro1 action="reportefiltroempleado.php" method="post" class="needs-validation" novalidate>

                                 

                                  

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

                                
$query = "select * from departamento order by departamento.codigodepartamento";

$result = pg_query($conn, $query) or die('ERROR : ' . pg_last_error());

$codigodepartamento = 0;

$nombredepartamento= 0;


while ($row = pg_fetch_row($result)) {

    $codigodepartamento= $row[0];
    $nombredepartamento= $row[1];

echo '<option value="'.$codigodepartamento.'">'."$nombredepartamento".'</option>';
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

                                
$query = "select * from jornada order by jornada.codigojornada";

$result = pg_query($conn, $query) or die('ERROR : ' . pg_last_error());

$codigojornada = 0;

$nombrejornada= 0;


while ($row = pg_fetch_row($result)) {

    $codigojornada= $row[0];
    $nombrejornada= $row[1];

echo '<option value="'.$codigojornada.'">'."$nombrejornada".'</option>';
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
                                                <button class="btn-primary" name="agregar" id="agregar" type="submit">Filtrar</button>

                                            </h2>  
                                        </div>

                                          
                              <div class="col-12  d-flex justify-content-center">
                                <h2><br/></h2> </div>
                              <div class="col-12 d-flex justify-content-center align-items-center">
                                <h2><a href="administracion.html"><u>Regresar a Menu de administración </u></a></h2>




                          
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