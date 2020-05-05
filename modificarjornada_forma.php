

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
                                    <h1>Modificar Jornada</h1>


                               
                            </div>

                            <div class="col-12  d-flex justify-content-center">

                                <form id="form2" id=cuadro1 action="modificarjornada.php" method="post" class="needs-validation" novalidate>

                                    <div class="row" >
                                        <div class="col-12 d-flex justify-content-center">
                                            <h1><br/></h1>

                                        </div>


                                        <div class="col-8  d-flex justify-content-center align-items-center">
                                            <h2> 
                                                <label for="numero">Numero de Jornada:</label>

                                            </h2>

                                            
                                        </div>


                                        <div class="col-4  d-flex justify-content-center align-items-center">

                                        
<?php
       
       $numero=$_GET["numero"];	   
    
       
       
             echo "<h3>$numero</h3>\n";
              echo "<input type=hidden class=form-control name=numero id=numero value=$numero required>\n";



              $query2 = "select * from jornada where codigojornada=$numero";

              $result2 = pg_query($conn, $query2) or die('ERROR : ' . pg_last_error());
              
              $nombre=0;
              $entrada=0;
              $salida=0;
              
              while ($row = pg_fetch_row($result2)) {
              
                  $nombre= $row[1];
                  $entrada= $row[2];
                  $salida= $row[3];
              }
             

              ?>

                                            <div class="valid-feedback">!Es válido!</div>
                                            <div class="invalid-feedback">Complete el campo.</div>    
                                          </div>


                                        </div> 

                                    <div class="row" >
                                        <div class="col-12 d-flex justify-content-center">
                                            <h1><br/></h1>

                                        </div>


                                        <div class="col-8  d-flex justify-content-center align-items-center">
                                            <h2> 
                                                <label for="nombre">Nombre de Jornada :</label>

                                            </h2>  
                                        </div>
                                        <div class="col-4  d-flex justify-content-center align-items-center">
                                         
                                       
                                        <?php                                               

                                                echo "<input type=text name=nombre  class=form-control id=nombre value='$nombre' length=20><br>\n";
                                               
                                            ?>

                                        
                                            <div class="valid-feedback">!Es válido!</div>
                                            <div class="invalid-feedback">Complete el campo.</div>    
                                          </div>
                                    </div>




                                    <div class="row" >
                                        <div class="col-12 d-flex justify-content-center">
                                            <h1><br/></h1>

                                        </div>


                                        <div class="col-8  d-flex justify-content-center align-items-center">
                                            <h2> 
                                                <label for="entrada">Hora de entrada :</label>

                                            </h2>  
                                        </div>
                                        <div class="col-4  d-flex justify-content-center align-items-center">
                                         
                                       
                                        <?php
                                               

                                                echo "<input type=time name=entrada  class=form-control id=entrada value=$entrada><br>\n";
                                               
                                            ?>

                                        
                                            <div class="valid-feedback">!Es válido!</div>
                                            <div class="invalid-feedback">Complete el campo.</div>    
                                          </div>
                                    </div>


                                    <div class="row" >
                                        <div class="col-12 d-flex justify-content-center">
                                            <h1><br/></h1>

                                        </div>


                                        <div class="col-8  d-flex justify-content-center align-items-center">
                                            <h2> 
                                                <label for="entrada">Hora de salida :</label>

                                            </h2>  
                                        </div>
                                        <div class="col-4  d-flex justify-content-center align-items-center">
                                         
                                       
                                        <?php

                                                echo "<input type=time name=salida  class=form-control id=salida value=$salida><br>\n";
                                               
                                            ?>

                                        
                                            <div class="valid-feedback">!Es válido!</div>
                                            <div class="invalid-feedback">Complete el campo.</div>    
                                          </div>
                                    </div>

                               

                                    <div class="row" >

                                        <div class="col-12 d-flex justify-content-center">
                                            <h1><br/></h1>

                                        </div>

                                        <div class="col-12  d-flex justify-content-center align-items-center">
                                            <h2> 
                                                <button class="btn-primary" type="submit">Modificar</button>

                                            </h2>  
                                        </div>

                                          
                              <div class="col-12  d-flex justify-content-center">
                                <h2><br/></h2> </div>
                              <div class="col-12 d-flex justify-content-center align-items-center">
                                <h2><a href="jornadas.html"><u>Regresar a Menu de Jornadas </u></a></h2>

                          
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