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
                                    <h1>Modificar Permiso</h1>


                               
                            </div>

                            <div class="col-12  d-flex justify-content-center">

                                <form id="form1" id=cuadro1 action="modificarpermiso.php" method="post" class="needs-validation" novalidate>


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
                                    $fecha=$_GET["fecha"];	   
	   
                                    
                                    
                                    
                                    echo "<h3>$codigoempleado</h3>\n";
                                    echo "<input type=hidden class=form-control name=codigoempleado id=codigoempleado value=$codigoempleado required>\n";
                                    
                                    
                                    
                                    $query = "select * from permisos WHERE fechapermiso='$fecha' AND codigoempleado=$codigoempleado";
                                    
                                    $result = pg_query($conn, $query) or die('ERROR : ' . pg_last_error());
                                    
                                    $motivo=0;
                                    $tipo = 0;
                         
                                    
                                    
                                    while ($row = pg_fetch_row($result)) {
                                    $motivo=$row[1];
                                    $tipo= $row[2];
                                    
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
                                                <label for="fechapermiso">Fecha de Permiso:</label>

                                            </h2>  
                                        </div>
                                        <div class="col-4  d-flex justify-content-center align-items-center">
                                        <?php

                                             
                                    echo "<h3>$fecha</h3>\n";
                                    echo "<input type=hidden class=form-control name=fechapermiso id=fechapermiso value=$fecha required>\n";                                             
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
                                                <label for="tipodepermiso">Tipo de Permiso:</label>

                                            </h2>

                                            
                                        </div>


                                        <div class="col-4  d-flex justify-content-center align-items-center">
                                        


                                                  <?php

                                               $types = array('A','ST','ET');
                                               
       echo '<select name="tipo" type="text" class="form-control" id="tipo"';
       foreach($types as $option) {
          if($option == "ST"){
       
            echo '<option value="'.$option.'"'.(strcmp($option,$tipo)==0?' selected="selected"':'').'>'.SalidaTemprano.'</option>';
             }
          else if($option == "ET"){
       
             echo '<option value="'.$option.'"'.(strcmp($option,$tipo)==0?' selected="selected"':'').'>'.EntradaTarde.'</option>';
              }
             else{
                echo '<option value="'.$option.'"'.(strcmp($option,$tipo)==0?' selected="selected"':'').'>'.Ausencia.'</option>';
             }
       }
       echo '</select>';


                                             ?>
                                         
                                             
                                          </div>


                                          
                                     


                                    


                                    </div>

                                    <div class="row" >
                                        <div class="col-12 d-flex justify-content-center">
                                            <h1><br/></h1>

                                        </div>


                                        <div class="col-8  d-flex justify-content-center align-items-center">
                                            <h2>
                                                <label for="motivo">Motivo:</label>

                                            </h2>

                                            
                                        </div>


                                       
                                        <div class="col-4  d-flex justify-content-center align-items-center">


                                        <?php

                                    echo "<input type=text class=form-control name=motivo id=motivo value='$motivo' required>\n";                                             
                                    ?>
                                            
                                            <div class="invalid-feedback">Complete el campo.</div>   
                                             
                                          </div>

                                        

                                       
                                    </div>

                                    <div class="row" >

                                        <div class="col-12 d-flex justify-content-center">
                                            <h1><br/></h1>

                                        </div>

                                        <div class="col-12  d-flex justify-content-center align-items-center">
                                            <h2> 
                                                <button class="btn-primary" name="agregar" id="agregar" type="submit">Registrar</button>

                                            </h2>  
                                        </div>

                                          
                              <div class="col-12  d-flex justify-content-center">
                                <h2><br/></h2> </div>
                              <div class="col-12 d-flex justify-content-center align-items-center">
                                <h2><a href="permisos.html"><u>Regresar a Menu de Permisos </u></a></h2>




                          
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