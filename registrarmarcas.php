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
                                    <h1>Ingresar Marcas</h1>


                               
                            </div>

                            <div class="col-12  d-flex justify-content-center">

                                <form id="form1" id=cuadro1 action="enviarmarca.php" method="post" class="needs-validation" novalidate>

                                    <div class="row" >
                                        <div class="col-12 d-flex justify-content-center">
                                            <h1><br/></h1>

                                        </div>


                                        <div class="col-8  d-flex justify-content-center align-items-center">
                                            <h2> 
                                                <label for="Codigo Empleado">Codigo de Empleado:</label>

                                            </h2>
                                            
                                        </div>


                                        <div class="col-4  d-flex justify-content-center align-items-center">
                                            <select name="codigoempleado" type="text" class="form-control" id="codigoempleado">
                                       
                                                <?php
    
                                    
    $query = "select * from empleado order by empleado.codigoempleado";
    
    $result = pg_query($conn, $query) or die('ERROR : ' . pg_last_error());
    
    $codigoempleado= 0;
    
    
    
    while ($row = pg_fetch_row($result)) {
    
        $codigoempleado=$row[0];
    
    echo '<option value="'.$codigoempleado.'">'."$codigoempleado".'</option>';
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
                                                    <label for="fecha">Fecha Actual:</label>
    
                                                </h2>  
                                            </div>
                                            <div class="col-4  d-flex justify-content-center align-items-center">
                                              
                                                <div id="cfecha"></div>
                                             
                                              </div>
                                        </div>
    

                                   

                                    <div class="row" >
                                        <div class="col-12 d-flex justify-content-center">
                                            <h1><br/></h1>

                                        </div>


                                        <div class="col-8  d-flex justify-content-center align-items-center">
                                            <h2> 
                                                <label for="hora">Hora Actual:</label>

                                            </h2>  
                                        </div>
                                        <div class="col-4  d-flex justify-content-center align-items-center">
                                           
                                            <div id="chora"></div>

                                          
                                             
                                          </div>
                                    </div>


                                    <div class="row" >
                                        <div class="col-12 d-flex justify-content-center">
                                            <h1><br/></h1>

                                        </div>


                                        <div class="col-8  d-flex justify-content-center align-items-center">
                                            <h2> 
                                                <label for="marca">Tipo de Marca:</label>

                                            </h2>  
                                        </div>
                                        <div class="col-4  d-flex justify-content-center align-items-center">
 
                                            <select name="marca" type="text" class="form-control" id="marca">
                                           
                                              <option value="E" selected>Entrada</option>
                                              <option value="S">Salida</option>
                                         

                                            </select>
                                             
                                          </div>
                                    </div>



                                    <div class="row" >

                                        <div class="col-12 d-flex justify-content-center">
                                            <h1><br/></h1>

                                        </div>

                                        <div class="col-12  d-flex justify-content-center align-items-center">
                                            <h2> 
                                                <button class="btn-primary" type="submit">Registrar</button>

                                            </h2>  
                                        </div>

                                          
                              <div class="col-12  d-flex justify-content-center">
                                <h2><br/></h2> </div>
                              <div class="col-12 d-flex justify-content-center align-items-center">
                                <h2><a href="index.html"><u>Regresar a Menu Principal </u></a></h2>




                          
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