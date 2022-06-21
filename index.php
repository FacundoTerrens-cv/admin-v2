<?php 
session_start();
include "conection.php";
if(!isset($_SESSION['user'])){
    header('location: login.php');
}
?>
<?php
include "header.php";
?>
            <div id="layoutSidenav_content">
                <main>
                    <div class="container-fluid px-4">
                        <h1 class="mt-4">Dashboard</h1>
                        <ol class="breadcrumb mb-4">
                            <li class="breadcrumb-item active">Dashboard</li>
                        </ol>
                        <?php
                        $sql = "SELECT * FROM empleados;";
                        $consulta = mysqli_query($conn, $sql);
                        ?>
                        <div class="card mb-4 bg-blue">
                            <div class="card-header">
                                <i class="fas fa-table me-1"></i>
                                DataTable Example
                            </div>
                            <div class="card-body">
                                <table id="datatablesSimple">
                                    <thead>
                                        <tr>
                                            <th>Name</th>
                                            <th>Role</th>
                                            <th>Delete</th>
                                            <th>Edit</th>
                                        </tr>
                                    </thead>
                                    <tfoot>
                                        <tr>
                                        <th>Name</th>
                                            <th>Role</th>
                                            <th>Delete</th>
                                            <th>Edit</th>
                                        </tr>
                                    </tfoot>
                                    <tbody>
                                    <?php 
                                    while($emp = mysqli_fetch_array($consulta)){ ?>
                                        <tr>
                                            <td><?php echo $emp['nombre']?></td>
                                            <td><?php echo $emp['rol']?></td>
                                            <td>
                                                <form action="" method="post">
                                                <a class="btn btn-danger" style="background-color: red" type="submit" name="btn" value="eliminar" href="delete_empleado.php?id=<?php echo $emp['id']?>">Delete</a>
                                            </td>
                                            </form>
                                            </td>
                                            <td>
                                                <form action="" method="post">
                                                <a class="btn btn-success" style="background-color: green" type="submit" name="btn" value="eliminar" href="edit_empleados_front.php?id=<?php echo $emp['id']?>">Edit</a>
                                            </td>
                                            </form>
                                        </tr>
                                   <?php }?>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                    <div class="card mb-4 bg-blue">
                  <div class="container">
                        <div class="modal-dialog" role="document">
                           <div class="modal-content bg-lightblue">
                              <form class="form-horizontal" method="POST" action="add_empleado_back.php">
                                 <div class="modal-header">
                                    <h4 class="modal-title" id="myModalLabel">Add Employee</h4>
                                 </div>
                                 <div class="modal-body">
                                    <div class="form-group">
                                       <label for="title" class="col-sm-2 control-label">Name</label>
                                       <div class="col-sm-10">
                                          <input type="text" name="nombre"  class="form-control" placeholder="Nombre">
                                       </div>
                                    </div>
                                    <div class="form-group">
                                       <label for="title" class="col-sm-2 control-label">Lastname</label>
                                       <div class="col-sm-10">
                                          <input type="text" name="apellido" class="form-control" placeholder="Apellido">
                                       </div>
                                    </div>
                                    <div class="form-group">
                                       <label for="title" class="col-sm-2 control-label">Email</label>
                                       <div class="col-sm-10">
                                          <input type="text" name="correo" class="form-control" placeholder="example@gmail.com">
                                       </div>
                                    </div>
                                    <div class="form-group">
                                       <label for="title" class="col-sm-2 control-label">Password</label>
                                       <div class="col-sm-10">
                                          <input type="text" name="pass" class="form-control" placeholder="Password">
                                       </div>
                                    </div>
                                 </div>
                                 <div class="modal-footer">
                                    <button type="submit" class="btn btn-primary">Save</button>
                                 </div>
                              </form>
                           </div>
                        </div>
                     </div>
                  </div>
                </main>
                <footer class="py-4 bg-black mt-auto">
                    <div class="container-fluid px-4">
                        <div class="d-flex align-items-center justify-content-between small">
                            <div class="text-muted">Copyright &copy; Your Website 2022</div>
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
    </body>
</html>
