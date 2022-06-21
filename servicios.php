<?php 
include "conection.php"
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
                        $sql = "SELECT * FROM contenido_paginas WHERE tipo_contenido = 'seccion';";
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
                                            <th>Type of Service</th>
                                            <th>Service</th>
                                            <th>Title</th>
                                            <th>Description</th>
                                            <th>Delete</th>
                                            <th>Edit</th>
                                        </tr>
                                    </thead>
                                    <tfoot>
                                        <tr>
                                        <th>Type of Service</th>
                                            <th>Service</th>
                                            <th>Title</th>
                                            <th>Description</th>
                                            <th>Delete</th>
                                            <th>Edit</th>
                                        </tr>
                                    </tfoot>
                                    <tbody>
                                    <?php 
                                    while($emp = mysqli_fetch_array($consulta)){ ?>
                                        <tr>
                                            <td><?php echo $emp['tipo_servicio']?></td>
                                            <td><?php echo $emp['servicio']?></td>
                                            <td><?php echo $emp['titulo']?></td>
                                            <td><?php echo $emp['descripcion']?></td>
                                            <td>
                                                <form action="" method="post">
                                                <a class="btn btn-danger" style="background-color: red" type="submit" name="btn" value="eliminar" href="delete_categorias.php?id=<?php echo $emp['id']?>">Delete</a>
                                            </td>
                                            </form>
                                            </td>
                                            <td>
                                                <form action="" method="post">
                                                <a class="btn btn-success" style="background-color: green" type="submit" name="btn" value="eliminar" href="edit_categorias_front.php?id=<?php echo $emp['id']?>">Edit</a>
                                            </td>
                                            </form>
                                        </tr>
                                   <?php }?>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                    <div class="card mb-4 bg-blue mx-5">
                  <div class="container">
                        <div class="modal-dialog" role="document">
                           <div class="modal-content bg-lightblue">
                              <form class="form-horizontal" method="POST" action="add_servicio_back.php">
                                 <div class="modal-header">
                                    <h4 class="modal-title" id="myModalLabel">Add Service</h4>
                                 </div>
                                 <div class="modal-body">
                                 <div class="form-group">
                                    <label for="title" class="col-sm-2 control-label">Category</label>
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
                                       <label for="title" class="col-sm-2 control-label">Service</label>
                                       <div class="col-sm-10">
                                          <input type="text" name="servicio" class="form-control" placeholder="Servicio">
                                       </div>
                                    </div>
                                    <div class="form-group">
                                       <label for="title" class="col-sm-2 control-label">Title</label>
                                       <div class="col-sm-10">
                                          <input type="text" name="titulo" class="form-control" placeholder="Titulo">
                                       </div>
                                    </div>
                                    <div class="form-group">
                                       <label for="title" class="col-sm-2 control-label">Description</label>
                                       <div class="col-sm-10">
                                          <input type="text" name="descripcion" class="form-control" placeholder="Descripcion">
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
