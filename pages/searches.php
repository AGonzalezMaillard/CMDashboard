<div id="page-wrapper">
    <div class="row">
        <div class="col-lg-12">
            <h1 class="page-header">Tabla de casos</h1>
        </div>
        <!-- /.col-lg-12 -->
    </div>
    <!-- /.row -->
    <div class="row">
        <div class="col-lg-12">
            <div class="panel panel-default  table-responsive">
                <div class="panel-heading">
                    Casos de INCIDE
                </div>
                <!-- /.panel-heading -->
                <div class="panel-body">
                    <div class="dataTable_wrapper">
                        <table class="table table-striped table-bordered table-hover" id="dataTables-example">
                            <thead>
                            <tr>
                                <th>#</th>
                                <th>EXPEDIENTE</th>
                                <th>ESTADO</th>
                                <th>CONSULTOR</th>
                                <th>ANALISTA</th>
                                <th>PRIORIDAD</th>
                                <th>FECHA</th>
                                <th>CLIENTE</th>
                                <th>TIPO</th>
                                <th>FACTURACIÓN</th>
                                <th>OBSERVACIONES</th>
                            </tr>
                            </thead>
                            <tbody>
                            <tr class="odd gradeX">
                                <?php
                                $servername = "localhost";
                                $username = 'root';
                                $password = "";
                                $dbname = "cmd";
                                $busqueda= $_GET['id'];
                                // Create connection
                                $conn = new mysqli($servername, $username, $password, $dbname);

                                // Check connection
                                if ($conn->connect_error) {
                                    die("Connection failed: " . $conn->connect_error);
                                }
                                //$sql = "SELECT * FROM expediente";
                                $sql="SELECT e.`idExpediente`, e.`nombre`,c.`nombre` AS consultor, a.`nombre` AS analistaPrincipal, e.`estado`, e.`prioridad` AS idPrioridad, p.`prioridad`, e.`fechaOportunidad`,em.`nombre` AS nomcliente,e.`tipoDeCaso`, e.`estadoFacturacion`,e.`observaciones` FROM `expediente` e, `trabajador` c, `empresa` em, `trabajador` a, `prioridadexpediente` p WHERE e.`consultor`= c.`idTrabajador` and e. `analistaPrincipal`=a.`idTrabajador` and e.`prioridad` = p.`idPrioridad` and e.`idCliente` = em.`idEmpresa`and (em.`nombre` LIKE \"%".utf8_decode($busqueda)."%\" or e.`idExpediente` LIKE \"%".utf8_decode($busqueda)."%\" or e.`estado` LIKE \"%".utf8_decode($busqueda)."%\"  or e.`nombre` LIKE \"%".utf8_decode($busqueda)."%\"  or c.`nombre` LIKE \"%".utf8_decode($busqueda)."%\"  or a.`nombre` LIKE \"%".utf8_decode($busqueda)."%\"  or e.`observaciones` LIKE \"%".utf8_decode($busqueda)."%\" or e.`tipoDeCaso` LIKE \"%".utf8_decode($busqueda)."%\" or e.`estadoFacturacion` LIKE \"%".utf8_decode($busqueda)."%\")";
                                $result = mysqli_query($conn, $sql);
                                if (!$result){
                                    echo "";
                                }
                                if (mysqli_num_rows($result) > 0) {
                                    // output data of each row
                                    while($row = mysqli_fetch_assoc($result)) {


                                        echo "<td><form action='crear' name='actualizaexpediente' method='get'><button type='submit' name='idexpedientemod' class='btn btn-default btn-circle' value=".$row["idExpediente"]."><i class='fa fa-pencil'/i></button></form>";
                                        echo "</td><td>".$row["idExpediente"]."-".utf8_encode($row["nombre"]);
                                        echo "</td><td>".utf8_encode($row["estado"]);
                                        echo "</td><td>".utf8_encode($row["consultor"]);
                                        echo "</td><td>".utf8_encode($row["analistaPrincipal"]);
                                        echo "</td><td>".utf8_encode($row["prioridad"]);
                                        echo "</td><td>".utf8_encode($row["fechaOportunidad"]);
                                        echo "</td><td>".utf8_encode($row["nomcliente"]);
                                        echo "</td><td>".utf8_encode($row["tipoDeCaso"]);
                                        echo "</td><td>".utf8_encode($row["estadoFacturacion"]);
                                        echo "</td><td>".utf8_encode($row["observaciones"]."</td></tr>");
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

<!-- DataTables JavaScript -->
<script src="../bower_components/datatables/media/js/jquery.dataTables.min.js"></script>
<script src="../bower_components/datatables-plugins/integration/bootstrap/3/dataTables.bootstrap.min.js"></script>

<!-- Custom Theme JavaScript -->
<script src="../dist/js/sb-admin-2.js"></script>

<!-- Page-Level Demo Scripts - Tables - Use for reference -->
<script>
    $(document).ready(function() {
        $('#dataTables-example').DataTable({
            responsive: true
        });
    });
</script>

</body>

</html>
