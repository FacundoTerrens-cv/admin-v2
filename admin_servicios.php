<?php
session_start();
if (!isset($_SESSION['user'])) {
    header('location: login.php');
}
require_once('conection.php');
$empleado = $_SESSION['user'];
$sql = "SELECT id, servicio, estado  FROM servicios";
$events = mysqli_query($conn, $sql);
include "header.php";
?>

        <div id="layoutSidenav_content">
            <main>
                <div class="container-fluid px-4">
                    <h1 class="mt-4">Turnos</h1>
                    <?php
                    $sql = "SELECT id, servicio, estado, data_servicio, empleado  FROM servicios ";
                    $consulta = mysqli_query($conn, $sql);
                    ?>
                    <div class="card mb-4">
                        <div class="card-header">
                            <i class="fas fa-table me-1"></i>
                            Turnos Table
                        </div>
                        <div class="card-body">
                            <table id="datatablesSimple">
                                <thead>
                                    <tr>
                                        <th>Servicio</th>
                                        <th>Empleado</th>
                                        <th>Estado</th>
                                        <th>--</th>
                                        <th>--</th>
                                    </tr>
                                </thead>
                                <tfoot>
                                    <tr>
                                        <th>Servicio</th>
                                        <th>Empleado</th>
                                        <th>Estado</th>
                                        <th>--</th>
                                        <th>--</th>
                                    </tr>
                                </tfoot>
                                <tbody>
                                    <?php
                                    while ($emp = mysqli_fetch_array($consulta)) { ?>
                                        <tr>
                                            <td><?php echo $emp['data_servicio'] ?></td>
                                            <td><?php echo $emp['empleado'] ?></td>
                                            <td><?php echo $emp['estado'] ?></td>
                                            <td>
                                                <form action="" method="post">
                                                    <a class="btn btn-success" style="background-color: red" type="submit" name="btn" value="eliminar" href="manage_servicios.php?id=<?php echo $emp['id'] ?>&valor_servicio=NULL&empleado=<?php echo $emp['empleado'] ?>&estado=Desactivado">Desactivar</a>
                                            </td>
                                            </form>
                                            </td>
                                            <td>
                                                <form action="" method="post">
                                                    <a class="btn btn-danger" style="background-color: green" type="submit" name="btn" value="eliminar" href="manage_servicios.php?id=<?php echo $emp['id'] ?>&valor_servicio=<?php echo $emp['data_servicio'] ?>&empleado=<?php echo $emp['empleado'] ?>&estado=Activado">Activar</a>
                                            </td>
                                            </form>
                                        </tr>
                                    <?php } ?>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
                <div class="card mb-4">
                  <div class="container">
                        <div class="modal-dialog" role="document">
                           <div class="modal-content">
                              <form class="form-horizontal" method="POST" action="add_servicio_empleado_back.php">
                                 <div class="modal-header">
                                    <h4 class="modal-title" id="myModalLabel">Asignar Servicio</h4>
                                 </div>
                                 <div class="modal-body">
                                    <div class="form-group">
                                    <label for="title" class="col-sm-2 control-label">Categoria</label>
                                    <?php
                                        $sql_se = "SELECT * FROM contenido_paginas WHERE tipo_contenido = 'categoria'";
                                        $query_se = mysqli_query($conn, $sql_se);
                                    ?>
                                    <select name="categoria" class="form-control" id="categoria" required>
                                        <?php while($datos_se = mysqli_fetch_array($query_se)){ ?>
                                            <option value="<?php echo $datos_se['tipo_servicio']?>"><?php echo $datos_se['tipo_servicio']?></option>
                                            <?php } ?>
                                    </select>
                                    </div>
                                    <div class="form-group">
                                    <label for="title" class="col-sm-2 control-label">Servicio</label>
                                    <?php
                                        $sql_se = "SELECT * FROM contenido_paginas WHERE tipo_contenido = 'seccion'";
                                        $query_se = mysqli_query($conn, $sql_se);
                                    ?>
                                    <select name = "servicio" id = "servicio" class = "form-control" required >
                                        <?php while($datos_se = mysqli_fetch_array($query_se)){ ?>
                                            <option value="<?php echo $datos_se['servicio']?>"><?php echo $datos_se['servicio']?></option>
                                            <?php } ?>
                                    </select>
                                    </div>
                                    <div class="form-group">
                                    <label for="title" class="col-sm-2 control-label">Empleado</label>
                                    <?php
                                        $sql_se = "SELECT * FROM empleados WHERE rol = 2";
                                        $query_se = mysqli_query($conn, $sql_se);
                                    ?>
                                    <select name="empleado" class="form-control" id="empleado" required>
                                        <?php while($datos_se = mysqli_fetch_array($query_se)){ ?>
                                            <option value="<?php echo $datos_se['nombre']?>"><?php echo $datos_se['nombre']?></option>
                                            <?php } ?>
                                    </select>
                                    </div>
                                 </div>
                                 <div class="modal-footer">
                                    <button type="submit" class="btn btn-primary">Guardar</button>
                                 </div>
                              </form>
                           </div>
                        </div>
                     </div>
                  </div>
            </main>
            <footer class="py-4 bg-light mt-auto">
                <div class="container-fluid px-4">
                    <div class="d-flex align-items-center justify-content-between small">
                        <div class="text-muted">Copyright &copy; Your Website 2022</div>
                        <div>
                            <a href="#">Privacy Policy</a>
                            &middot;
                            <a href="#">Terms &amp; Conditions</a>
                        </div>
                    </div>
                </div>
            </footer>
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" crossorigin="anonymous"></script>
    <script src="js/scripts.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.8.0/Chart.min.js" crossorigin="anonymous"></script>
    <script src="assets/demo/chart-area-demo.js"></script>
    <script src="assets/demo/chart-bar-demo.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/simple-datatables@latest" crossorigin="anonymous"></script>
    <script src="js/datatables-simple-demo.js"></script>
    <script src="js/jquery.js"></script>
    <!-- Bootstrap Core JavaScript -->
    <script src="js/bootstrap.min.js"></script>
    <!-- FullCalendar -->
    <script src='js/moment.min.js'></script>
    <script src='js/fullcalendar/fullcalendar.min.js'></script>
    <script src='js/fullcalendar/fullcalendar.js'></script>
    <script src='js/fullcalendar/locale/es.js'></script>
</body>

</html>