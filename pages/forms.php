		<?php
    $servername = "localhost";
    $username = 'root';
    $password = "";
    $dbname = "cmd";
    $nombreempresa="";
    $nombreexpediente="";
    $idtipo="";
    $estadoexpediente ="";
    $presupuesto ="";
    $consultor="";
    $analista="";
    $prioridad="";
    $estadofacturacion="";
    $idpersona="";
    $observacionesexpediente=""; 
    $modificar=false;
        
    $id= isset($_GET['idexpedientemod']) ? $_GET['idexpedientemod'] : "Autogenerado";

    // Create connection
    $conn = new mysqli($servername, $username, $password, $dbname);

    // Check connection

    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
        
    }
    
    if (isset($_GET['idexpedientemod'])){ 
    $modificar=true;
    $sql="SELECT * FROM `expediente` e WHERE e.`idExpediente`= $id";
    $result = mysqli_query($conn, $sql);
    
    if (mysqli_num_rows($result) > 0) {
    while($row = mysqli_fetch_assoc($result)) {
    $nombreempresa= utf8_encode($row["idCliente"]);
    $nombreexpediente = utf8_encode($row["nombre"]);
    $idtipo=utf8_encode($row["tipoDeCaso"]);
    $estadoexpediente =utf8_encode($row["estado"]);
    $presupuesto=$row["presupuesto"];
    $consultor=utf8_encode($row["consultor"]);
    $analista=utf8_encode($row["analistaPrincipal"]);
    $prioridad=utf8_encode($row["prioridad"]);
    $estadofacturacion=utf8_encode($row["estadoFacturacion"]);
    $idpersona=utf8_encode($row["idPersona"]);
    $observacionesexpediente=utf8_encode($row["observaciones"]);
    $modificar=false;
    
 
    
    }
   } else{
       echo "0 results";
   }
    
   }
    
    
    
    ?>
    <div id="page-wrapper">
            <div class="row">
                <div class="col-lg-12">
                    <h1 class="page-header">Crear caso</h1>
                </div>
                <!-- /.col-lg-12 -->
            </div>
            <!-- /.row -->
            
            <div class="row">
                <div class="col-lg-12">
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            Expediente
                          
                        </div>
                        <div class="panel-body">
                            <div class="row">
                                <div class="col-lg-6">                                   
                                    <div class="form-group">
                                    <form role="form" action="/crear" method="post">
                                            <label>Id Expediente</label>
                                            <p class="form-control-static"><?php echo $id;?></p>
                                        </div>
                                    
                                           <div class="form-group">
                                            <label>Nombre</label>
                                            <input type="text" name="nombreexpediente" value="<?php echo $nombreexpediente?>" class="form-control" placeholder="Enter text">
                                        	</div>
                                          
                                          <label>Empresa</label>
<button type='submit' name='modempresa' class='btn btn-default btn-circle' value="<?php echo $_POST['nombreempresa'];?>"><p class='fa fa-pencil'/p></button>
<button type='submit' name='crearempresa' class='btn btn-default btn-circle' value=""><b>+</b></button>



<!--                                   <div class="form-group input-group">
                                            <input type="text" name="nombreempresa" value="" class="form-control" placeholder="Enter text">
                                            <span class="input-group-btn">
                                                <button class="btn btn-default" type="submit" name="buscar"><i class="fa fa-search"></i>
                                                </button>
                                            </span>
                                        </div>-->
                                        <div class="form-group input-group">
                                            <select name="nombreempresa" class="form-control">
<?php     
//listar tipos de caso             
$sql = "SELECT * FROM `empresa`";
$resultado_consulta_mysql = mysqli_query($conn, $sql);
while ($row = mysqli_fetch_array($resultado_consulta_mysql)) {
$idEmpresaSeleccion=utf8_encode($row['idEmpresa']);
echo "<option value=\"".$idEmpresaSeleccion."\"";
if ($idEmpresaSeleccion == $nombreempresa){echo "selected=\"selected\"";}
echo ">".utf8_encode($row['nombre'])."</option>";
}?>
                                            </select>
                                            </div>  
                                          
                                          <label>Tipo de Caso</label>
                         			 		<div class="form-group input-group">
                                            <select name="tipocaso" class="form-control">
<?php     
//listar tipos de caso             
$sql = "SELECT * FROM `tiposdecaso`";
$resultado_consulta_mysql = mysqli_query($conn, $sql);
while ($row = mysqli_fetch_array($resultado_consulta_mysql)) {
$tipoCasoSeleccion=utf8_encode($row['tipoDeCaso']);
echo "<option value=\"".$tipoCasoSeleccion."\"";
if ($tipoCasoSeleccion == $idtipo){echo "selected=\"selected\"";}
echo ">".$tipoCasoSeleccion."</option>";
}?>
                                            </select></div>
                                           <label>Estado del expediente</label>
                         			 		<div class="form-group input-group">
                                            <select name="estadoexpediente" class="form-control">
<?php      
//listar estado expediente            
$sql = "SELECT * FROM `estadoexpediente`";
$resultado_consulta_mysql = mysqli_query($conn, $sql);
while ($row = mysqli_fetch_array($resultado_consulta_mysql)) {
$estadoSeleccion=utf8_encode($row['estado']);
echo "<option value=\"".$estadoSeleccion."\"";
if ($estadoSeleccion == $estadoexpediente){echo "selected=\"selected\"";}
echo ">".$estadoSeleccion."</option>";

}?>
                                            </select></div>
                                            
                                        <label>Presupuesto</label>
                                    	 <div class="form-group input-group">
                                            <span class="input-group-addon"><i class="fa fa-eur"></i>
                                            </span>
                                            <input type="text" name="presupuesto" value="<?php echo $presupuesto?>" class="form-control" placeholder="Enter text">
                                        </div>  
                                        
                                        

                                </div>
                                <!-- /.col-lg-6 (nested) -->
                                <div class="col-lg-6">  
                                
                            <label>Persona</label> 
                            <button type='submit' name='modpersona' class='btn btn-default btn-circle' value="<?php echo $_POST['idpersona'];?>"><p class='fa fa-pencil'/p></button>
                            <button type='submit' name='crearpersona' class='btn btn-default btn-circle' value=""><b>+</b></button>
                            <div  class="form-group input-group">
                                            <select name="idpersona" class="form-control">    
<?php       
//listar personas           
$sql = "SELECT * FROM `persona`";
$resultado_consulta_mysql = mysqli_query($conn, $sql);
while ($row = mysqli_fetch_array($resultado_consulta_mysql)) {
$personaSeleccion=utf8_encode($row['idPersona']);
echo "<option value=\"".$personaSeleccion."\"";
if ($personaSeleccion == $idpersona){echo "selected=\"selected\"";}
echo ">".utf8_encode($row['nombre'])." ".utf8_encode($row['apellidos'])."</option>";

}?>
						 </select></div>
                                
                                
                                
                                    <label>Consultor</label>
                         			 <div class="form-group input-group">
                                            <select name="trabajador" class="form-control">
<?php     
//listar trabajadores para que se seleccione consultor        
$sql = "SELECT * FROM `trabajador`";
$resultado_consulta_mysql = mysqli_query($conn, $sql);
while ($row = mysqli_fetch_array($resultado_consulta_mysql)) {
$consultorSeleccion=utf8_encode($row['idTrabajador']);
echo "<option value=\"".$consultorSeleccion."\"";
if ($consultorSeleccion == $consultor){echo "selected=\"selected\"";}
echo ">".utf8_encode($row['nombre'])."</option>";


}
?>
                                            </select></div>
                                     <label>Analista</label>     
                                    <div class="form-group input-group">
                                            <select name="trabajador2" class="form-control">
<?php     
//listar trabajadores para que se seleccione consultor        
$sql = "SELECT * FROM `trabajador`";
$resultado_consulta_mysql = mysqli_query($conn, $sql);
while ($row = mysqli_fetch_array($resultado_consulta_mysql)) {
$analistaSeleccion=utf8_encode($row['idTrabajador']);
$nombreanalistaSeleccion=utf8_encode($row['nombre']);
echo "<option value=\"".$analistaSeleccion."\"";
if ($analistaSeleccion == $analista){echo "selected=\"selected\"";}
echo ">".$nombreanalistaSeleccion."</option>";
}
?>
                                            </select></div>
                                          
                                	
                                	<label>Prioridad</label>      
                         			 <div class="form-group input-group">
                                            <select name="prioridad" class="form-control">
<?php        
//listar prioridades          
$sql = "SELECT * FROM `prioridadexpediente`";
$resultado_consulta_mysql = mysqli_query($conn, $sql);
while ($row = mysqli_fetch_array($resultado_consulta_mysql)) {
$prioridadSeleccion=utf8_encode($row['idPrioridad']);
echo "<option value=\"".$prioridadSeleccion."\"";
if ($prioridadSeleccion == $prioridad){echo "selected=\"selected\"";}
echo ">".utf8_encode($row['prioridad'])."</option>";

}
?>
                                            </select></div>               
                                
                                	<label>Estado Facturación</label>      
                         			 <div class="form-group input-group">
                                            <select name="estadofacturacion" class="form-control">
<?php  
//listar estados de facturacion                
$sql = "SELECT * FROM `estadosfacturacion`";
$resultado_consulta_mysql = mysqli_query($conn, $sql);
while ($row = mysqli_fetch_array($resultado_consulta_mysql)) {
$eFacturacionSeleccion=utf8_encode($row['estadoFacturacion']);
echo "<option value=\"".$eFacturacionSeleccion."\"";
if ($eFacturacionSeleccion== $estadofacturacion){echo "selected=\"selected\"";}
echo ">".$eFacturacionSeleccion."</option>";


}?>
                                            </select></div>
                                            <div class="form-group">
                                            <label>Observaciones</label>
                                            <textarea  name="observacionesexpediente" value="" class="form-control" rows="3"><?php echo $observacionesexpediente?></textarea>
                                        </div></div></div>
                                    <div class="form-group">
                                    <button type="submit" name="creaexpediente"  class="btn btn-primary">Guardar</button>
                            
                                  
                                    </form> 
                                                

    
    
                            
                            <!-- /.row (nested) -->
						</div>

                </div>
                <!-- /.col-lg-12 -->
                
                
            </div>
            <!-- /.row -->
                             

        </div>
        <!-- /#page-wrapper -->

    </div>
    <!-- /#wrapper -->

    <!-- jQuery -->
    <script src="../bower_components/jquery/dist/jquery.min.js"></script>

    <!-- Bootstrap Core JavaScript -->
    <script src="../bower_components/bootstrap/dist/js/bootstrap.min.js"></script>

    <!-- Metis Menu Plugin JavaScript -->
    <script src="../bower_components/metisMenu/dist/metisMenu.min.js"></script>

    <!-- Custom Theme JavaScript -->
    <script src="../dist/js/sb-admin-2.js"></script>

</body>

</html>

<?php

     
    if (isset($_POST['creaexpediente'])) {
    $nombreempresa=$_POST['nombreempresa'];
    $nombreexpediente=$_POST['nombreexpediente'];
    $idtipo=$_POST['tipocaso'];
    $estadoexpediente =$_POST['estadoexpediente'];
    $presupuesto =$_POST['presupuesto'];
    $consultor=$_POST['trabajador'];
    $analista=$_POST['trabajador2'];
    $prioridad=$_POST['prioridad'];
    $estadofacturacion =$_POST['estadofacturacion'];
    $idpersona=$_POST['idpersona'];
    $observacionesexpediente=$_POST['observacionesexpediente']; 
    
    //modificar
    if ($modificar){ 
        $sql = "UPDATE `expediente` SET `nombre`=\"".utf8_decode($nombreexpediente)."\", `tipoDeCaso`=\"".utf8_decode($idtipo)."\", `estado`=\"".utf8_decode($estadoexpediente)."\",
         `idCliente``=\"".utf8_decode($nombreempresa)."\",`idPersona`=\"".utf8_decode($idpersona)."\",`presupuesto`=\"".utf8_decode($presupuesto)."\",
         `consultor`=\"".utf8_decode($consultor)."\",`analistaPrincipal`=\"".utf8_decode($analista)."\",`prioridad`=\"".utf8_decode($prioridad)."\",
         `estadoFacturacion`=\"".utf8_decode($estadofacturacion)."\",`observaciones`=\"".utf8_decode($observacionesexpediente)."\" WHERE `idExpediente`=".$id;
    	 
		if ($conn->query($sql) === TRUE) {
		echo "<script language=\"javascript\">window.location=\"crear?id=";
		echo $id;
		echo "\"</script>;";
    	echo "Expediente correctamente";   

		} else {
    	echo "Error: " . $sql . "<br>" . $conn->error;
		}


    //crear
    }else{
    
    $sql = "INSERT INTO `expediente`(`nombre`, `tipoDeCaso`, `estado`, `idCliente`, `idPersona`, 
    `presupuesto`, `consultor`, `analistaPrincipal`, `prioridad`, `fechaOportunidad`, 
    `estadoFacturacion`, `observaciones`) 
    VALUES (\"".utf8_decode($nombreexpediente)."\",\"".utf8_decode($idtipo)."\",
    \"".utf8_decode($estadoexpediente)."\",\"".utf8_decode($nombreempresa)."\",
    \"".utf8_decode($idpersona)."\",\"".utf8_decode($presupuesto)."\",\"".utf8_decode($consultor)."\",
    \"".utf8_decode($analista)."\",\"".utf8_decode($prioridad)."\",CURRENT_DATE,
    \"".utf8_decode($estadofacturacion)."\",\"".utf8_decode($observacionesexpediente)."\")";
    
	if ($conn->query($sql) === TRUE) {
	$idexpediente = $conn->insert_id;
	echo "Expediente creado correctamente: ".$idexpediente."-".$nombreexpediente;
	} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
	}
    }
    }
if (isset($_POST['crearempresa'])) {

echo "<script language=\"javascript\">window.location=\"crearempresa";
echo "\"</script>;";
}
if (isset($_POST['modempresa'])) {

echo "<script language=\"javascript\">window.location=\"crearempresa?id=";
echo $_POST['nombreempresa'];
echo "\"</script>;";
}

if (isset($_POST['crearpersona'])) {

echo "<script language=\"javascript\">window.location=\"crearpersona";
echo "\"</script>;";
}

if (isset($_POST['modpersona'])) {

echo "<script language=\"javascript\">window.location=\"crearpersona?id=";
echo $_POST['idpersona'];
echo "\"</script>;";
}


    ?>
