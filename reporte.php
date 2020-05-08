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
        <link rel="stylesheet" href="css/other.css"> 
    
      </head>
      <body>
      <body style= "height:100vh">

    
     <!-- <div id="main-container">  -->
    
     <h2> <br/></h2>
    
     <center>
    
     <?php
                                    
                                    $codigoempleado=$_POST["codigoempleado"];
                                    $query = "select * from marcas WHERE codigoempleado=$codigoempleado order by fechamarca";
                                   
                                    
                                    $result = pg_query($conn, $query) or die('ERROR : ' . pg_last_error());


                                    
                                    $cmdtuples = pg_affected_rows($result);
                                    $primerafecha=0;
                                    $ultimafecha = 0;
                                    $contador=0;
                                    
                                    
                                    while ($row = pg_fetch_row($result)) {

                                        if($contador==0){
                                           
                                            $primerafecha=$row[0];
                            
                                    }
                                    if($contador==$cmdtuples-1){
                                           
                                        $ultimafecha=$row[0];
                        
                                }

                                    $contador=$contador+1;


                                }

                                $time1 = strtotime($primerafecha);
                              $primerafecha = date("d/m/y", $time1);


                              $time2 = strtotime($ultimafecha);
                              $ultimafecha = date("d/m/y", $time2);

                                $titulo= "Reporte de Entradas y Salidas del " . $primerafecha . " al " . $ultimafecha;
                                    echo "<h3>$titulo</h3>\n";

                    /*----------------------------------------------------------------------------------------*/

                                    $query = "select * from empleado WHERE codigoempleado=$codigoempleado ";
                                   
                                    
                                    $result = pg_query($conn, $query) or die('ERROR : ' . pg_last_error());
                                    $nombre_empleado=0;
                                    $codigodepartamento=0;
                                    $codigojornada=0;


                                    while ($row = pg_fetch_row($result)) {
                                            $nombre_empleado=$row[1];
                                            $codigodepartamento=$row[2];
                                            $codigojornada=$row[3];
                                              }


                                    
                                    
                            

                                $titulo2= "Empleado: " . $codigoempleado . " - " . $nombre_empleado;
                                    echo "<h3>$titulo2</h3>\n";

                    /*---------------------------------------------------------------------------------------*/


                    $query = "select * from departamento WHERE codigodepartamento=$codigodepartamento ";
                                   
                                    
                    $result = pg_query($conn, $query) or die('ERROR : ' . pg_last_error());
                    $nombre_departamento=0;


                    while ($row = pg_fetch_row($result)) {
                            $nombre_departamento=$row[1];
                              }


                    
                    
            

                $titulo3= "Departamento: " . $codigodepartamento . " - " . $nombre_departamento;
                    echo "<h3>$titulo3</h3>\n";

         /*---------------------------------------------------------------------------------------*/
         $query = "select * from jornada WHERE codigojornada=$codigojornada ";
                                   
                                    
         $result = pg_query($conn, $query) or die('ERROR : ' . pg_last_error());
         $nombre_jornada=0;
         $horarealentrada=0;
         $horarealsalida=0;


         while ($row = pg_fetch_row($result)) {
                 $nombre_jornada=$row[1];
                 $horarealentrada=$row[2];
                 $horarealsalida=$row[3];

                   }


                   $horaInicio = new DateTime($horarealentrada);
                   $horaTermino = new DateTime($horarealsalida);

                   $Inicio= $horaInicio->format('H:I');
                   $FIn= $horaTermino->format('H:I');



         
         


     $titulo3= "Jornada: " . $codigojornada . " - " . $nombre_jornada . " de " .$Inicio. "0 a " .$FIn ."0";
         echo "<h3>$titulo3</h3>\n";

                                
                    ?>
    
    </center>
    
    <h2> <br/></h2>
    
    
    <div id="main-container"> 
    <h3>
    <table border=1>
    <tr>
    <th><b>Fecha</b></th>
    <th><b>Entrada</b></th>
    <th><b>Salida</b></th>
    <th><b>Entrada Tarde Minutos</b></th>
    <th><b>Salida Temprano Minutos</b></th>
    <th><b>Horas Trabajadas</b></th>
    <th><b>Observaciones/Permisos</b></th>



    
    
    
    </tr>
    
    
    
    <?php

    $codigo=$_POST["codigoempleado"];

    
    $conn = pg_connect("host=localhost port=5432 user=postgres password=1234 dbname=proyectoDatabase");
    if (!$conn){
        die("PostgreSQL connection failed");
    }


    
    
    $query = "select DISTINCT fechamarca from marcas WHERE codigoempleado=$codigo order by fechamarca   ";
    
    $result = pg_query($conn, $query) or die('ERROR : ' . pg_last_error());
    
    $Fecha = 0;
    $Entrada = "";
    $Salida="";
    $EntradaTardeMin = 0;
    $SalidaTempMin = 0;
    $HorasTrabajadas=0;
    $Observaciones=0;

    $nulo="----*----";

    $CHorasTrabajadas=0;
    $horaInicioEmpleado=0;
    $horaSalidaEmpleado=0;

    $totalentradatarde=0;
    $totalsalidatemprano=0;
    $ausencia=0;

    
    
    
    while ($row = pg_fetch_row($result)) {
    
     $Fecha= $row[0];
  
    
    
     echo "\t<tr>\n";
     echo "\t\t<td>$Fecha</td>\n";


     $query1 = "select * from marcas WHERE codigoempleado=$codigo AND fechamarca='$Fecha' AND tipo='E'";
    
    $result1 = pg_query($conn, $query1) or die('ERROR : ' . pg_last_error());
     

    $Entrada = "----*----";
       
     while ($row = pg_fetch_row($result1)) {
    
        $Entrada = $row[1];


        if(is_null($Entrada)){
         $Entrada = "----*----";
         $ausencia=$ausencia+1;


 
      } else{



        $horaInicioEmpleado = new DateTime($Entrada);
      }

     }
     

     echo "\t\t<td>$Entrada</td>\n";
/**************************************************************************************************** */



     $query1 = "select * from marcas WHERE codigoempleado=$codigo AND fechamarca='$Fecha' AND tipo='S'";
    
    $result1 = pg_query($conn, $query1) or die('ERROR : ' . pg_last_error());
     

    $Salida = "----*----";
       
     while ($row = pg_fetch_row($result1)) {
    
        $Salida = $row[1];

        if(is_null($Salida)){
         $Salida = "----*----";
         $ausencia=$ausencia+1;


 
      } else{
        $horaSalidaEmpleado=new DateTime($Salida);
      }

     }


     echo "\t\t<td>$Salida</td>\n";

/**************************************************************************************************** */


     if($Entrada=="----*----"){
        echo "\t\t<td>$Entrada</td>\n";
        $CHorasTrabajadas="-1";

     } else{
 
       

        $Solohorainicioempleado=$horaInicioEmpleado->format('H');
        $Solohorainicio=$horaInicio->format('H');

        if($Solohorainicioempleado<$Solohorainicio){
            $EntradaTarde=0;
            $horaInicioEmpleado=$horaInicio;
        }
        else{
          
            $interval = $horaInicioEmpleado->diff($horaInicio);
       $EntradaTarde= $interval->format('%i'); 
       $totalentradatarde=$totalentradatarde+$EntradaTarde;
        }

       echo "\t\t<td>$EntradaTarde</td>\n";
    }

     
     if($Salida=="----*----"){
        echo "\t\t<td>$Salida</td>\n";
        $CHorasTrabajadas="-1";

     } else{

            
        $Solohorasalidaempleado=$horaSalidaEmpleado->format('H');
        $Solohorasalida=$horaTermino->format('H');

        if($Solohorasalidaempleado>=$Solohorasalida){
            $SalidaTemprano=0;
            $horaSalidaEmpleado=$horaTermino;
        }
        
     else{

        $interval = $horaTermino->diff($horaSalidaEmpleado);
        $SalidaTemprano= $interval->format('%i');
        $totalsalidatemprano=$totalsalidatemprano+$SalidaTemprano;

     }
        echo "\t\t<td>$SalidaTemprano</td>\n";

     }


     if($CHorasTrabajadas=="-1"){
        echo "\t\t<td>$nulo</td>\n";

     } else{
         

        $interval = $horaSalidaEmpleado->diff($horaInicioEmpleado);
        $HorasTrabajadas= $interval->format('%H:%I');
 
        echo "\t\t<td>$HorasTrabajadas</td>\n";


     }


     $query4 = "select * from permisos WHERE fechapermiso='$Fecha' AND codigoempleado=$codigoempleado";
    
     $result4 = pg_query($conn, $query4) or die('ERROR : ' . pg_last_error());

     $cmdtuples = pg_affected_rows($result4);

      
        
     
    /* if($CHorasTrabajadas=="-1"){
        echo "\t\t<td>Olvido Marcar</td>\n";

     }else if($ausencia==2){
         echo "\t\t<td>No asistio</td>\n";

        }*/


    


      
      
      if(($CHorasTrabajadas=="-1")||($ausencia==2)){

         if($ausencia==2){
            echo "\t\t<td>No se presento </td>\n";

         }
         else{

        
          echo "\t\t<td>Olvido Marcar</td>\n";

         }
 
         }
     
      else{

        if($cmdtuples==0){
            echo "\t\t<td>----------------</td>\n";


        }else{
            $MotivoPermiso=0;     

            while ($row = pg_fetch_row($result4)) {
           
               $MotivoPermiso = $row[1];
       
            }

            echo "\t\t<td>$MotivoPermiso</td>\n";


        }
         
     }


     $CHorasTrabajadas="0";
     $ausencia=0;




    
    
     
    
    
    
    
     echo "\t</tr>\n";
    
    
    
    }



    
    echo "\t<tr>\n";

    echo "\t\t<td>-----</td>\n";
    echo "\t\t<td>-----</td>\n";
    
    echo "\t\t<td><b>TOTALES</b></td>\n";
    
    echo "\t\t<td>$totalentradatarde</td>\n";
    echo "\t\t<td>$totalsalidatemprano</td>\n";
    
    
    pg_free_result($result);
    
    pg_close($conn);
    
    
    
    ?>
    
    </table>
    </h3>
    
    
    
    <h3> <br/></h3>
    
    <center>
    <h2><a href="administracion.html"><u>Regresar a Menu Administracion</u></a></h2>
    </center>
    
    </div> 
    
    
    
    
    
    
          
        <!-- Optional JavaScript -->
        <!-- jQuery first, then Popper.js, then Bootstrap JS -->
        <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
      </body>
    </html>