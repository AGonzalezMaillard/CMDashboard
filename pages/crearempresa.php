<?php
    $servername = "localhost";
    $username = 'root';
    $password = "";
    $dbname = "cmd";
    $nombreempresa="";
    $direccionempresa="";
    $provinciaempresa="";
    $telempresa="";
    $cifempresa="";
    $municipioempresa="";
    $cpempresa="";
    $emailempresa="";
    $modificar=false;
        
    $id= isset($_GET['id']) ? $_GET['id'] : "Autogenerado";

    // Create connection
    $conn = new mysqli($servername, $username, $password, $dbname);

    // Check connection

    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
        
    }
    if (isset($_GET['id'])){ 
    $modificar=true;
    $sql="SELECT * FROM `empresa` e WHERE e.`idEmpresa`= $id";
    $result = mysqli_query($conn, $sql);
    
    if (mysqli_num_rows($result) > 0) {
    while($row = mysqli_fetch_assoc($result)) {
    $nombreempresa = utf8_encode($row["nombre"]);
    $direccionempresa=utf8_encode($row["direccion"]);
    $provinciaempresa=utf8_encode($row["provincia"]);
    $telempresa=$row["telefono"];
    $cifempresa=$row["cif"];
    $municipioempresa=utf8_encode($row["municipio"]);
    $cpempresa=$row["cp"];
    $emailempresa=utf8_encode($row["email"]);
    }
   } else{
       echo "0 results";
   }
    
   }
    
    
    ?>
    <div id="page-wrapper">
            <div class="row">
                <div class="col-lg-12">
                    <h1 class="page-header">Crear empresa</h1>
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
                                    <form role="form" action="/crearempresa<?php if (isset($_GET['id'])){echo '?id='.$id;}?>" method="post">
                                        
                                            
                                     <label>Nombre</label>
                                    <div class="form-group input-group">
                                            <input type="text" name="nombreempresa" value="<?php echo $nombreempresa?>" class="form-control" placeholder="Enter text">
                                            <span class="input-group-btn">
                                                <button class="btn btn-default" type="submit" name="buscar"><i class="fa fa-search"></i>
                                                </button>
                                            </span>
                                        </div>
                                          
                                        
                                      <div class="form-group">
                                            <label>Dirección</label>
                                            <input type="text" name="direccionempresa" value="<?php echo $direccionempresa?>" class="form-control" placeholder="Enter text">
                                        </div>
                                        
                                        <div class="form-group">
                                            <label>Provincia</label>
                                            <input type="text" name="provinciaempresa" value="<?php echo $provinciaempresa?>" class="form-control" placeholder="Enter text">
                                        </div>
                                      
                                      
                                      <div class="form-group">
                                            <label>Teléfono</label>
                                            <input type="tel" name="telempresa" value="<?php echo $telempresa?>" class="form-control" placeholder="Enter text">
                                        </div>

								</div>
                                <!-- /.col-lg-6 (nested) -->
                                <div class="col-lg-6">
                                        
                                        <div class="form-group">
                                            <label>CIF</label>
                                            <input type="text" name="cifempresa" value="<?php echo $cifempresa?>" class="form-control" placeholder="Enter text">
                                        </div>
                                        
                                        <div class="form-group">
                                            <label>Municipio</label>
                                            <input type="text" name="municipioempresa" value="<?php echo $municipioempresa?>" class="form-control" placeholder="Enter text">
                                        </div>
                                        
                                        <div class="form-group">
                                            <label>CP</label>
                                            <input type="number" name="cpempresa" value="<?php echo $cpempresa?>" class="form-control" placeholder="Enter text">
                                        </div>
                                        
                                            <label>Email</label>
                                      <div class="form-group input-group">
                                            <span class="input-group-addon">@</span>
                                            <input type="text" name="emailempresa" value="<?php echo $emailempresa?>" class="form-control" placeholder="Enter email">
                                        </div>
                                      
                                      
                                      
                                
                                </div>
                           
                                <!-- /.col-lg-6 (nested) -->
                            </div>
                                    <div class="form-group">
                                    <button type="submit" name="creaempresa" class="btn btn-primary">Guardar cambios</button>
                        
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

//Crear o modificar empresa     
if (isset($_POST['creaempresa'])) {
    $nombreempresa=$_POST['nombreempresa'];
    $direccionempresa=$_POST['direccionempresa'];
    $provinciaempresa=$_POST['provinciaempresa'];
    $telempresa=$_POST['telempresa'];
    $cifempresa=$_POST['cifempresa'];
    $municipioempresa=$_POST['municipioempresa'];
    $cpempresa=$_POST['cpempresa'];
    $emailempresa=$_POST['emailempresa'];
    
    //modificar
    if ($modificar){ 
        $sql = "UPDATE `empresa` SET `nombre`=\"".utf8_decode($nombreempresa)."\", `cif`=\"".utf8_decode($cifempresa)."\", `direccion`=\"".utf8_decode($direccionempresa)."\", `municipio`=\"".utf8_decode($municipioempresa)."\",`provincia`=\"".utf8_decode($provinciaempresa)."\",`cp`=\"".utf8_decode($cpempresa)."\",`telefono`=\"".utf8_decode($telempresa)."\",`email`=\"".utf8_decode($emailempresa)."\" WHERE `idEmpresa`=".$id;
    	 
		if ($conn->query($sql) === TRUE) {
		echo "<script language=\"javascript\">window.location=\"crearempresa?id=";
		echo $id;
		echo "\"</script>;";
    	echo "Empresa modificada correctamente: ".$nombreempresa;   

		} else {
    	echo "Error: " . $sql . "<br>" . $conn->error;
		}

    
     
    //crear
    }else{
    
		$sql = "INSERT INTO `empresa`(`nombre`, `direccion`, `provincia`, `telefono`, `cif`, `municipio`, `cp`, `email`) 
		VALUES (\"".utf8_decode($nombreempresa)."\",\"".utf8_decode($direccionempresa)."\",\"".utf8_decode($provinciaempresa)."\",\"".utf8_decode($telempresa)."\",\"".utf8_decode($cifempresa)."\",\"".utf8_decode($municipioempresa)."\",\"".utf8_decode($cpempresa)."\",\"".utf8_decode($emailempresa)."\")";	
	
		if ($conn->query($sql) === TRUE) {
		$idnew = $conn->insert_id;
		echo "<script language=\"javascript\">window.location=\"crearempresa?id=";
		echo $idnew;
		echo "\"</script>;";
    	 

		} else {
    	echo "Error: " . $sql . "<br>" . $conn->error;
		}
	}

    }
  
    ?>
