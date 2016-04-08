<?php
    $servername = "localhost";
    $username = 'root';
    $password = "";
    $dbname = "cmd";
    $nombrepersona="";
    $apellidospersona="";
    $nomempresa="";
    $telpersona="";
    $tel2persona="";
    $emailpersona="";
    $observacionespersona="";
    $personaprincipal=true;
    $modificar=false;
    
    $id= isset($_GET['id']) ? $_GET['id'] : "Autogenerado";
    $idpersona=isset($_GET['id']);
    // Create connection
    $conn = new mysqli($servername, $username, $password, $dbname);

    // Check connection

    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
        
    }
    
    if (isset($_GET['id'])){
    $modificar=true;
    $sql="SELECT * FROM `persona` e WHERE e.`idPersona`= $id";
    $result = mysqli_query($conn, $sql);
    
    if (mysqli_num_rows($result) > 0) {
    while($row = mysqli_fetch_assoc($result)) {
    $nombrepersona=utf8_encode($row["nombre"]);
    $apellidospersona=utf8_encode($row["apellidos"]);
    $nomempresa=utf8_encode($row["nomEmpresa"]);
    $telpersona=$row["telefono"];
    $tel2persona=$row["telefono2"];
    $emailpersona=utf8_encode($row["email"]);
    $observacionespersona=utf8_encode($row["observaciones"]);
    }
   } else{
       echo "0 results";
   }
    
   }
    
    
    
    ?>
    <div id="page-wrapper">
            <div class="row">
                <div class="col-lg-12">
                    <h1 class="page-header">Crear persona</h1>
                </div>
                <!-- /.col-lg-12 -->
            </div>
            <!-- /.row -->
                        <div class="row">
                <div class="col-lg-12">
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            Persona
                        </div>
                        <div class="panel-body">
                            <div class="row">
                                <div class="col-lg-6">
                                    <form role="form" action="/crearpersona<?php if (isset($_GET['id'])){echo '?id='.$id;}?>" method="post">
                                     
                                    <label>Empresa</label><button type='submit' name='crearempresa' class='btn btn-default btn-circle' value="<?php echo $_POST['nombreempresa'];?>"><p class='fa fa-pencil'/p></button>
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
$sql = "SELECT `nombre` FROM `empresa`";
$resultado_consulta_mysql = mysqli_query($conn, $sql);
while ($row = mysqli_fetch_array($resultado_consulta_mysql)) {
$nombreempresasseleccion=utf8_encode($row['nombre']);
echo "<option value=\"".utf8_encode($row['nombre'])."\"";
if ($nombreempresasseleccion == $nomempresa){echo "selected=\"selected\"";}
echo ">".$nombreempresasseleccion."</option>";
}?>
                                            </select></div>  
                                          
                                     <div class="form-group">
                                            <label>ID: <?php echo $id?></label>
                                        </div>      
                                            
                                
                                     <div class="form-group">
                                            <label>Nombre</label>
                                            <input type="text" name="nombrepersona" value="<?php echo $nombrepersona?>" class="form-control" placeholder="Enter text">
                                        </div>
                                    
                                    <div class="form-group">
                                            <label>Apellidos</label>
                                            <input type="text" name="apellidospersona" value="<?php echo $apellidospersona?>" class="form-control" placeholder="Enter text">
                                        </div>
                                                                                 
                                    	<label>Email</label>
                                      <div class="form-group input-group">
                                            <span class="input-group-addon">@</span>
                                            <input type="text" name="emailpersona" value="<?php echo $emailpersona?>" class="form-control" placeholder="Enter email">
                                        </div>
                             		
								</div>
								<!-- /.col-lg-6 (nested) -->
                                <div class="col-lg-6">
                                        

                                      <div class="form-group">
                                            <label>Teléfono</label>
                                            <input type="tel" name="telpersona" value="<?php echo $telpersona?>" class="form-control" placeholder="Enter text">
                                        </div>


                                        
                                        <div class="form-group">
                                            <label>Teléfono 2</label>
                                            <input type="text" name="tel2persona" value="<?php echo $tel2persona?>" class="form-control" placeholder="Enter text">
                                        </div>
                                        
                                 	 <div class="form-group">
                                            <label>Observaciones</label>
                                            <textarea name="observacionespersona" value="" class="form-control" rows="3"><?php echo $observacionespersona?></textarea>
                                        </div>
                                      <div class="form-group">  
                                            <input type="checkbox" name="personaprincipal" value="" <?php if($personaprincipal){echo "checked";}?> Persona principal<br>
                           			</div>
                                </div>
                                <!-- /.col-lg-6 (nested) -->
                            </div>
                           
                      			<div class="form-group">
                                    <button type="submit" name="creapersona" class="btn btn-primary">Guardar cambios</button>
                              
                 <!-- /.row (nested) -->

						
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

    //Crear persona
    if (isset($_POST['creapersona'])) {
    $nombrepersona=$_POST['nombrepersona'];
    $apellidospersona=$_POST['apellidospersona'];
    $nomempresa=$_POST['nombreempresa'];
    $telpersona=$_POST['telpersona'];
    $tel2persona=$_POST['tel2persona'];
    $emailpersona=$_POST['emailpersona'];
    $observacionespersona=$_POST['observacionespersona'];
    
    //modificar
    if ($modificar){ 
        $sql = "UPDATE `persona` SET `nombre`=\"".utf8_decode($nombrepersona)."\", `apellidos`=\"".utf8_decode($apellidospersona)."\", `nomEmpresa`=\"".utf8_decode($nomempresa)."\", `telefono`=\"".utf8_decode($telpersona)."\",`telefono2`=\"".utf8_decode($tel2persona)."\",`email`=\"".utf8_decode($emailpersona)."\",`observaciones`=\"".utf8_decode($observacionespersona)."\" WHERE `idPersona`=".$id;
    	 
		if ($conn->query($sql) === TRUE) {
		echo "<script language=\"javascript\">window.location=\"crearpersona?id=";
		echo $id;
		echo "\"</script>;";
    	echo "Pesona modificada correctamente: ".$nombrepersona;   

		} else {
    	echo "Error: " . $sql . "<br>" . $conn->error;
		}


    //crear
    }else{

    $sql = "INSERT INTO `persona`(`nombre`, `apellidos`, `nomEmpresa`, `telefono`, `telefono2`, `email`, `observaciones`) 
    VALUES (\"".utf8_decode($nombrepersona)."\",\"".utf8_decode($apellidospersona)."\",\"".utf8_decode($nomempresa)."\",\"".utf8_decode($telpersona)."\",\"".utf8_decode($tel2persona)."\",\"".utf8_decode($emailpersona)."\",\"".utf8_decode($observacionespersona)."\")";	
	
		if ($conn->query($sql) === TRUE) {
		$idpersonaprincipal = $conn->insert_id;
		$idpersona = $idpersonaprincipal;
		echo "Persona creada correctamente: ".$nombrepersona." ".$apellidospersona.". ID ".$idpersonaprincipal;
				
				//Una vez creada la persona la ponemos como principal si así se indica	
					if (isset($_POST['personaprincipal'])) {
					$sql = "UPDATE `empresa` SET `personaPrincipal`=".$idpersonaprincipal." WHERE `nombre`=\"".utf8_decode($nomempresa)."\"";	
					if ($conn->query($sql) === TRUE) {
					echo " principal de ".utf8_decode($nomempresa);
							}
						}
		echo "<script language=\"javascript\">window.location=\"crearpersona?id=";
		echo $idpersona;
		echo "\"</script>;";

		} else {
	   	echo "Error: " . $sql . "<br>" . $conn->error;
		}
    }
}
    
if (isset($_POST['crearempresa'])) {
echo "<script language=\"javascript\">window.location=\"crearempresa?id=";
echo $_POST['nombreempresa'];
echo "\"</script>;";
}

 
    ?>
