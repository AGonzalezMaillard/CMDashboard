<div id="page-wrapper">
            <div class="row">
                <div class="col-lg-12">
                    <h1 class="page-header">Administrar usuario</h1>
                </div>
                <!-- /.col-lg-12 -->
            </div>

    <?php
    $idTrabajador;
    $nombre;
    $apellidos;
    $puesto;
    $userid;
    $password;
    $rol;


    $servername = "localhost";
    $username = 'root';
    $password = "";
    $dbname = "cmd";
    $userid = isset($_POST['userid']) ? $_POST['userid'] : $_SESSION['userid'];
    // Create connection
    $conn = new mysqli($servername, $username, $password, $dbname);

    // Check connection
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }
    if ($_SESSION['rol']=="admin"){
    $sql1="SELECT * FROM `trabajador`";
    $result = mysqli_query($conn, $sql1);
    if (!$result){
        echo "";
    }

    ?>
    <form action='settings' name='nuevouser' method='post'><button type='submit' name='nuevouser' class='btn btn-default btn-circle' value=""><b>+</b></button>
                    <!-- /.panel-heading -->
    <div class="panel-body">
        <div class="dataTable_wrapper">
            <table class="table table-striped table-bordered table-hover" id="dataTables-example">
                <thead>
                <tr>
                    <th>#</th>
                    <th>ID</th>
                    <th>NOMBRE</th>
                    <th>APELLIDOS</th>
                    <th>PUESTO</th>
                    <th>USER</th>
                    <th>ROL</th>
                </tr>
                </thead>
                <tbody>
                <tr class="odd gradeX">
                    <?php

                    if (mysqli_num_rows($result) > 0) {
                        while($row = mysqli_fetch_assoc($result)) {

                    echo "<td><form action='settings' name='userid' method='post'><button type='submit' name='userid' class='btn btn-default btn-circle' value=".$row["userid"]."><i class='fa fa-pencil'/i></button></form>";
                    echo "</td><td>".$row["idTrabajador"];
                    echo "</td><td>".utf8_encode($row["nombre"]);
                    echo "</td><td>".utf8_encode($row["apellidos"]);
                    echo "</td><td>".utf8_encode($row["puesto"]);
                    echo "</td><td>".utf8_encode($row["userid"]);
                    echo "</td><td>".utf8_encode($row["rol"])."</td></tr>";


                    }
                    } else{
                        echo "0 results";
                    }?>
                    </tr>
									  </tbody>
                                </table>
                         	</div>

                            <!-- /.table-responsive -->
                        </div>
<?php
                    }

                    $sql="SELECT * FROM `trabajador` WHERE `userid`=\"".$userid."\"";
                    $result = mysqli_query($conn, $sql);
                    if (!$result){
                        echo "";
                    }
                    if (mysqli_num_rows($result) > 0) {
                        while($row = mysqli_fetch_assoc($result)) {
                            $idTrabajador = utf8_encode($row["idTrabajador"]);
                            $nombre=utf8_encode($row["nombre"]);
                            $apellidos=utf8_encode($row["apellidos"]);
                            $puesto=$row["puesto"];
                            $userid=$row["userid"];
                            $password=utf8_encode($row["password"]);
                            $rol=$row["rol"];

                        }
                    } else{
                        echo "0 results";
                    }



                    ?>
            <!-- /.row -->
            <div class="row">
                <div class="col-lg-12">
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            Datos del usuario
                        </div>
                        <div class="panel-body">
                            <div class="row">
                            <form role="form" action='settings' name='cambiaruser' method='post'">
                                <?php if ($_SESSION['rol']=="user"){echo "<fieldset disabled>";}?>
                                <div class="col-lg-6">

                                    
                                    		<div class="form-group">
                                                <label <?php if ($_SESSION['rol']=="user"){echo "for=\"disabledSelect\"";}?>>ID Usuario</label>
                                                <select name="idTrabajador" <?php if ($_SESSION['rol']=="user"){echo "id=\"disabledSelect\"";}?> class="form-control">
                                                    <option><?php echo $idTrabajador?></option>
                                                </select>
                                            </div>
                                            
                                            <div class="form-group">
                                                <label  <?php if ($_SESSION['rol']=="user"){echo "for=\"disabledSelect\"";}?>>Username</label>
                                                <input name="userid" class="form-control" <?php if ($_SESSION['rol']=="user"){echo "id=\"disabledInput\"";}?> type="text" placeholder="" value="<?php echo $userid?> " <?php if ($_SESSION['rol']=="user"){echo "disabled";}?>>
                                            </div>
                                            
                                            <div class="form-group">
                                                <label for="disabledSelect">Rol</label>
                                                <select name="rol" id="disabledSelect" class="form-control">
                                                    <option><?php echo $rol?></option>
                                                    <option>user</option>
                                                    <option>admin</option>
                                                </select>
                                            </div>
                                    </div>
                                    <div class="col-lg-6">                                              
                                            <div class="form-group">
                                                <label for="disabledSelect">Nombre</label>
                                                <input name="nombre" class="form-control" id="disabledInput" type="text" placeholder="" value="<?php echo $nombre?>" <?php if ($_SESSION['rol']=="user"){echo "disabled";}?>>
                                            </div>
   
                                             <div class="form-group">
                                                <label for="disabledSelect">Apellidos</label>
                                                <input name="apellidos" class="form-control" id="disabledInput" type="text" placeholder="" value="<?php echo $apellidos?>" <?php if ($_SESSION['rol']=="user"){echo "disabled";}?>>
                                            </div>

                                        <div class="form-group">
                                            <label for="disabledSelect">Puesto</label>
                                            <input name="puesto" class="form-control" id="disabledInput" type="text" placeholder="" value="<?php echo $puesto?>" <?php if ($_SESSION['rol']=="user"){echo "disabled";}?>>
                                        </div>
                                    	
                                    <div class="form-group">
                                    <button type="submit" name='cambiaruser' class="btn btn-primary">Guardar cambios</button>
                                        
                                        </div>
                                                                            <div class="form-group">
                                    <button type="submit" name='resetpass' class="btn btn-primary">Resetear contraseña</button>
                                        </fieldset>
                                        </div>
                                    <div>
                                    
                                    <div>
                                    

                                    
									</form>
                                </div>
                                <!-- /.col-lg-6 (nested) -->
                            </div>
                            <!-- /.row (nested) -->
                        </div>
                        <!-- /.panel-body -->
                    </div>
                    <!-- /.panel -->
                </div>
                <!-- /.col-lg-12 -->
    
            </div>
            <!-- /.row -->                                    
<!-- /.row -->
            <div class="row">
                <div class="col-lg-12">
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            Cambiar mi password
                        </div>
                        <div class="panel-body">
                            <div class="row">
                                <div class="col-lg-6">
                                    <form role="form" action='settings' name='cambiarpass' method='post'">
                                                                        
      		                        <div class="form-group">
                                    <label>Password actual</label>
                                            <input class="form-control" type="password" name="current_password">
                                   </div>
                                 
                                   
                                  <div class="form-group">
                                    <label>Nuevo password</label>
                                            <input class="form-control" type="password" name="new_password">
                                  </div>
							</div>
                            <div class="col-lg-6">
                                                                  
                                 <div class="form-group">
                                  <label>Confirmar nuevo password</label>
                                     <input class="form-control" type="password" name="confirm_password">
                                </div>
                                <button type="submit" name='cambiarpass' class="btn btn-primary">Guardar cambios</button>
								</form>
                                </div>
                                <!-- /.col-lg-6 (nested) -->
                            </div>
                            <!-- /.row (nested) -->
                        </div>
                        <!-- /.panel-body -->
                    </div>
                    <!-- /.panel -->
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


if (isset($_POST['nuevouser'])) {
    $sql = "INSERT INTO `trabajador`(`nombre`, `apellidos`, `puesto`, `userid`, `password`) VALUES ('new','new','new','new','482a77b0f21f047aeb578178111b299a6c1204fe')";
    if ($conn->query($sql) === TRUE) {
        $idnew = $conn->insert_id;
        echo "User creado con id ".$idnew;
        echo "<script language=\"javascript\">window.location=\"settings";
        echo "\"</script>;";

    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
}

if (isset($_POST['resetpass'])) {
	 $idTrabajador=$_POST['idTrabajador'];
	 
    $sql = "UPDATE `trabajador` SET `password`='482a77b0f21f047aeb578178111b299a6c1204fe' WHERE `idTrabajador`=".$idTrabajador;;
    if ($conn->query($sql) === TRUE) {
        echo "<script language=\"javascript\">window.location=\"settings";
        echo "\"</script>;";
        echo "Contraseña actualizada correctamente";

    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
}

if (isset($_POST['cambiaruser'])) {
    $idTrabajador=$_POST['idTrabajador'];
    $nombre=$_POST['nombre'];
    $apellidos=$_POST['apellidos'];
    $puesto=$_POST['puesto'];
    $userid=$_POST['userid'];
    $rol=$_POST['rol'];

    $sql = "UPDATE `trabajador` SET `nombre`=\"".utf8_decode($nombre)."\", `apellidos`=\"".utf8_decode($apellidos)."\", `puesto`=\"".utf8_decode($puesto)."\", `userid`=\"".utf8_decode($userid)."\",`rol`=\"".utf8_decode($rol)."\" WHERE `idTrabajador`=".$idTrabajador;

    if ($conn->query($sql) === TRUE) {
        echo "<script language=\"javascript\">window.location=\"settings";
        echo "\"</script>;";
        echo "User modificado correctamente";

    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }

    echo "cambiar user";
}

if (isset($_POST['cambiarpass'])) {
    $current_password=sha1($_POST['current_password']);
    $new_password=sha1($_POST['new_password']);
    $confirm_password=sha1($_POST['confirm_password']);

    if ($current_password== $password){
        if ($new_password == $new_password){
            $sql = "UPDATE `trabajador` SET `password`=\"".utf8_decode($new_password)."\" WHERE `userid`=\"".$userid."\"";

            if ($conn->query($sql) === TRUE) {
                echo "<script language=\"javascript\">window.location=\"settings";
                echo "\"</script>;";
                echo "Password actualizado";
            } else {
                echo "Error: " . $sql . "<br>" . $conn->error;
            }

        }
        echo "Las contraseñas no coinciden";
    }
    echo "Contraseña incorrecta";

}

?>
