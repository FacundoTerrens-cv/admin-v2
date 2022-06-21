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
                        $sql = "SELECT * FROM colors;";
                        $consulta = mysqli_query($conn, $sql);
                        ?>
                        <div class="card mb-4">
                            <div class="card-header">
                                <i class="fas fa-table me-1"></i>
                                DataTable Example
                            </div>
                            <div class="card-body">
                                <table id="datatablesSimple">
                                    <thead>
                                        <tr>
                                            <th>Tipo Color</th>
                                            <th>Codigo</th>
                                            <th>Color</th>
                                            <th>--</th>
                                        </tr>
                                    </thead>
                                    <tfoot>
                                        <tr>
                                            <th>Tipo Color</th>
                                            <th>Codigo</th>
                                            <th>Color</th>
                                            <th>--</th>
                                        </tr>
                                    </tfoot>
                                    <tbody>
                                    <?php  while($emp = mysqli_fetch_array($consulta)){ ?>
                                        <tr>
                                            <td><?php echo $emp['nombre']?></td>
                                            <td><?php echo $emp['color']?></td>
                                            <td style = "background-color:<?php echo $emp['color']?>"></td>
                                            <td><a class="btn btn-success" style="background-color: green" type="submit" name="btn" value="eliminar" href="edit_colors_front.php?id=<?php echo $emp['id']?>&color=<?php echo $emp['color']?>">Redigere</a></td>
                                        </tr>
                                   <?php }?>
                                    </tbody>
                                </table>
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
    </body>
</html>
