 		<?php
    $servername = "localhost";
    $username = 'root';
    $password = "";
    $dbname = "cmd";
    
    // Create connection
    $conn = new mysqli($servername, $username, $password, $dbname);

    // Check connection

    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
        
    }?>
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
                            Empresa
                        </div>
                        <div class="panel-body">
                            <div class="row">
                                <div class="col-lg-6">
                                    <form role="form" action="/crear" method="post">
                                        
                                            
                                     <label>Nombre</label>
                                    <div class="form-group input-group">
                                            <input type="text" name="nombreempresa" value="" class="form-control" placeholder="Enter text">
                                            <span class="input-group-btn">
                                                <button class="btn btn-default" type="button"><i class="fa fa-search"></i>
                                                </button>
                                            </span>
                                        </div>
                                          
                                        
                                      <div class="form-group">
                                            <label>Dirección</label>
                                            <input type="text" name="direccionempresa" value="" class="form-control" placeholder="Enter text">
                                        </div>
                                        
                                        <div class="form-group">
                                            <label>Provincia</label>
                                            <input type="text" name="provinciaempresa" value="" class="form-control" placeholder="Enter text">
                                        </div>
                                      
                                      
                                      <div class="form-group">
                                            <label>Teléfono</label>
                                            <input type="tel" name="telempresa" value="" class="form-control" placeholder="Enter text">
                                        </div>

								</div>
                                <!-- /.col-lg-6 (nested) -->
                                <div class="col-lg-6">
                                        
                                        <div class="form-group">
                                            <label>CIF</label>
                                            <input type="text" name="cifempresa" value="" class="form-control" placeholder="Enter text">
                                        </div>
                                        
                                        <div class="form-group">
                                            <label>Municipio</label>
                                            <input type="text" name="municipioempresa" value="" class="form-control" placeholder="Enter text">
                                        </div>
                                        
                                        <div class="form-group">
                                            <label>CP</label>
                                            <input type="number" name="cpempresa" value="" class="form-control" placeholder="Enter text">
                                        </div>
                                        
                                            <label>Email</label>
                                      <div class="form-group input-group">
                                            <span class="input-group-addon">@</span>
                                            <input type="text" name="emailempresa" value="" class="form-control" placeholder="Enter email">
                                        </div>
                                      
                                      
                                      
                                
                                </div>
                           
                                <!-- /.col-lg-6 (nested) -->
                            </div>
                                        <button type="submit" name="creaempresa" value="creaempresa2" class="btn btn-default">Crear empresa</button>
                                        <button type="submit" name="actualizaempresa2" value="actualizaempresa"class="btn btn-default">Actualizar empresa</button>
                            <!-- /.row (nested) -->
                            
                        </div>
                        <!-- /.panel-body -->
                        
                        
                    </div>
                    <!-- /.panel -->

                    <div class="row">
                <div class="col-lg-12">
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            Persona
                          
                        </div>
                        <div class="panel-body">
                            <div class="row">
                            <div class="form-group"> 
                           
                             <div class="col-lg-12">
                            <label>Personas</label>
                            <div name="idpersona" class="form-group input-group">
                                            <select class="form-control">
        
<?php       
//listar personas           
$sql = "SELECT * FROM `persona`";
$resultado_consulta_mysql = mysqli_query($conn, $sql);
while ($row = mysqli_fetch_array($resultado_consulta_mysql)) {
echo "<option value=".utf8_encode($row['idPersona']).">".utf8_encode($row['nombre'])." ".utf8_encode($row['apellidos'])."</option>";
}?>
						 </select></div></div>
                                <div class="col-lg-6">
                                     <div class="form-group">
                                            <label>Nombre</label>
                                            <input type="text" name="nombrepersona" value="" class="form-control" placeholder="Enter text">
                                        </div>
                                          
                                        
                                      <div class="form-group">
                                            <label>Teléfono</label>
                                            <input type="tel" name="telpersona" value="" class="form-control" placeholder="Enter text">
                                        </div>
                                        
                                                                                 
                                    	<label>Email</label>
                                      <div class="form-group input-group">
                                            <span class="input-group-addon">@</span>
                                            <input type="text" name="emailpersona" value="" class="form-control" placeholder="Enter email">
                                        </div>
                             		<div class="form-group">  
                                            <input type="checkbox" name="personaprincipal" value="" checked> Persona principal<br>
                           			</div>
								</div>
								<!-- /.col-lg-6 (nested) -->
                                <div class="col-lg-6">
                                        
                                        <div class="form-group">
                                            <label>Apellidos</label>
                                            <input type="text" name="apellidospersona" value="" class="form-control" placeholder="Enter text">
                                        </div>
                                        
                                        <div class="form-group">
                                            <label>Teléfono 2</label>
                                            <input type="text" name="tel2persona" value="" class="form-control" placeholder="Enter text">
                                        </div>
                                        
                                 	 <div class="form-group">
                                            <label>Observaciones</label>
                                            <textarea name="observacionespersona" value="" class="form-control" rows="3"></textarea>
                                        </div>
                                      
                                </div>
                                <!-- /.col-lg-6 (nested) -->
                            </div>
                            <!-- /.row (nested) -->
   
						</div>
                               <button type="submit" name="creapersona" value="creapersona" class="btn btn-default">Crear persona</button>
                                <button type="submit" name="actualizapersona" name="valuepersona" class="btn btn-default">Actualizar persona</button>    
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
                                            <label>Id Expediente</label>
                                            <p class="form-control-static"></p>
                                        </div>
                                    
                                           <div class="form-group">
                                            <label>Nombre</label>
                                            <input type="text" name="nombreexpediente" value="" class="form-control" placeholder="Enter text">
                                        </div>
                                          
                                          <label>Tipo de Caso</label>
                         			 		<div class="form-group input-group">
                                            <select name="tipocaso" class="form-control">
<?php     
//listar tipos de caso             
$sql = "SELECT * FROM `tiposdecaso`";
$resultado_consulta_mysql = mysqli_query($conn, $sql);
while ($row = mysqli_fetch_array($resultado_consulta_mysql)) {
echo "<option value=".utf8_encode($row['idTipoDeCaso']).">".utf8_encode($row['tipoDeCaso'])."</option>";
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
echo "<option value=".utf8_encode($row['idEstado']).">".utf8_encode($row['estado'])."</option>";
}?>
                                            </select></div>
                                            
                                        <label>Presupuesto</label>
                                    	 <div class="form-group input-group">
                                            <span class="input-group-addon"><i class="fa fa-eur"></i>
                                            </span>
                                            <input type="text" name="presupuesto" value="" class="form-control" placeholder="Enter text">
                                        </div>  
                                        
                                        

                                </div>
                                <!-- /.col-lg-6 (nested) -->
                                <div class="col-lg-6">  
                                    <label>Consultor</label>
                         			 <div class="form-group input-group">
                                            <select name="consultor" class="form-control">
<?php     
//listar trabajadores para que se seleccione consultor        
$sql = "SELECT * FROM `trabajador`";
$resultado_consulta_mysql = mysqli_query($conn, $sql);
while ($row = mysqli_fetch_array($resultado_consulta_mysql)) {
echo "<option value=".utf8_encode($row['idTrabajador']).">".utf8_encode($row['nombre'])."</option>";
}
?>
                                            </select></div>
                                          
                                    <label>Analista principal</label>
                         			 <div name="analista" class="form-group input-group">
                                            <select class="form-control">
<?php     
//Listar trabajadores para que se seleccione trabajador        
$sql = "SELECT * FROM `trabajador`";
$resultado_consulta_mysql = mysqli_query($conn, $sql);
while ($row = mysqli_fetch_array($resultado_consulta_mysql)) {
echo "<option value=".utf8_encode($row['idTrabajador']).">".utf8_encode($row['nombre'])."</option>";
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
echo "<option value=".utf8_encode($row['idPrioridad']).">".utf8_encode($row['prioridad'])."</option>";
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
echo "<option value=".utf8_encode($row['idEstadoFacturacion']).">".utf8_encode($row['estadoFacturacion'])."</option>";
}?>
                                            </select></div>
                                            <div class="form-group">
                                            <label>Observaciones</label>
                                            <textarea  name="observacionesexpediente" value="" class="form-control" rows="3"></textarea>
                                        </div>
                                            </div>     </div> 
                                    <button  type="submit" name="creaexpediente" value="creaexpediente" class="btn btn-default">Crear Expediente</button>
                                    <button type="submit" name="actualizaexpediente" value="actualizaexpediente" class="btn btn-default">Actualizar Expediente</button>        
                                  
                                    </form> 
                                                

    
    
                            </div>
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
        
    //Crear empresa     
    if (isset($_POST['creaempresa'])) {
    $nombreempresa=$_POST['nombreempresa'];
    $direccionempresa=$_POST['direccionempresa'];
    $provinciaempresa=$_POST['provinciaempresa'];
    $telempresa=$_POST['telempresa'];
    $cifempresa=$_POST['cifempresa'];
    $municipioempresa=$_POST['municipioempresa'];
    $cpempresa=$_POST['cpempresa'];
    $emailempresa=$_POST['emailempresa'];
	$sql = "INSERT INTO `empresa`(`nombre`, `direccion`, `provincia`, `telefono`, `cif`, `municipio`, `cp`, `email`) 
	VALUES (\"".utf8_decode($nombreempresa)."\",\"".utf8_decode($direccionempresa)."\",\"".utf8_decode($provinciaempresa)."\",\"".utf8_decode($telempresa)."\",\"".utf8_decode($cifempresa)."\",\"".utf8_decode($municipioempresa)."\",\"".utf8_decode($cpempresa)."\",\"".utf8_decode($emailempresa)."\")";	
	
	if ($conn->query($sql) === TRUE) {
    echo "Empresa creada correctamente: ".$nombreempresa;   

	} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
	}
    
    }
    //Actualizar empresa
    if (isset($_POST['actualizaempresa'])) {
        echo "Empresa actualizada correctamente";    
    }
    //Crear persona
    if (isset($_POST['creapersona'])) {
    $nombrepersona=$_POST['nombrepersona'];
    $apellidospersona=$_POST['apellidospersona'];
    $nomempresa=$_POST['nombreempresa'];
    $telpersona=$_POST['telpersona'];
    $tel2persona=$_POST['tel2persona'];
    $emailpersona=$_POST['emailpersona'];
    $observacionespersona=$_POST['observacionespersona'];
    
    $sql = "INSERT INTO `persona`(`nombre`, `apellidos`, `nomEmpresa`, `telefono`, `telefono2`, `email`, `observaciones`) 
    VALUES (\"".utf8_decode($nombrepersona)."\",\"".utf8_decode($apellidospersona)."\",\"".utf8_decode($nomempresa)."\",\"".utf8_decode($telpersona)."\",\"".utf8_decode($tel2persona)."\",\"".utf8_decode($emailpersona)."\",\"".utf8_decode($observacionespersona)."\")";	
	
	if ($conn->query($sql) === TRUE) {
	$idpersonaprincipal = $conn->insert_id;
	echo "Persona creada correctamente: ".$nombrepersona." ".$apellidospersona.". ID ".$idpersonaprincipal;
			
			//Una vez creada la persona la ponemos como principal si así se indica	
				if (isset($_POST['personaprincipal'])) {
				$sql = "UPDATE `empresa` SET `personaPrincipal`=".$idpersonaprincipal." WHERE `nombre`=\"".utf8_decode($nomempresa)."\"";	
				if ($conn->query($sql) === TRUE) {
				echo " principal de ".utf8_decode($nomempresa);
				}
				}
				
	} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
	}
    }
    
    
     
    
    //Actualizar persona
    if (isset($_POST['actualizapersona'])) {
        echo "Persona actualizada correctamente";    
    }
    //Crear expediente
    if (isset($_POST['creaexpediente'])) {
    $idtipo=$_POST['tipocaso'];
        echo $_POST['tipocaso'];    
    }
    //Actualizar expediente
    if (isset($_POST['actualizaexpediente'])) {
        echo "Expediente actualizado correctamente";    
    }
    
    
    ?>
