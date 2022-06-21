<?php
   session_start();
   if(!isset($_SESSION['user'])){
     header('location: login.php');
   }
   require_once('conection.php');
   $empleado = $_SESSION['user'];
   $sql = "SELECT id, title, start, end, color FROM events WHERE empleado = '$empleado'";
   $events = mysqli_query($conn, $sql);
   ?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <meta name="description" content="" />
    <meta name="author" content="" />
    <title>Dashboard - SB Admin</title>
    <link href="https://cdn.jsdelivr.net/npm/simple-datatables@latest/dist/style.css" rel="stylesheet" />
    <link href="css/styles.css" rel="stylesheet" />
    <script src="https://use.fontawesome.com/releases/v6.1.0/js/all.js" crossorigin="anonymous"></script>
    <link href='css/fullcalendar.css' rel='stylesheet' />
    <link rel="stylesheet" href="css/style2.css">
    <style>
    body {
        padding-top: 70px;
    }

    #calendar {
        max-width: 800px;
    }

    .col-centered {
        float: none;
        margin: 0 auto;
    }
    </style>
</head>

<body class="sb-nav-fixed">
    <nav class="sb-topnav navbar navbar-expand navbar-dark bg-blue">
        <!-- Navbar Brand-->
        <a class="navbar-brand ps-3" href="index.html">Admin DashBoard</a>
        <!-- Sidebar Toggle-->
        <button class="btn btn-link btn-sm order-1 order-lg-0 me-4 me-lg-0" id="sidebarToggle" href="#!"><i
                class="fas fa-bars"></i></button>
        <!-- Navbar Search-->
        <!--
            <form class="d-none d-md-inline-block form-inline ms-auto me-0 me-md-3 my-2 my-md-0">
                <div class="input-group">
                    <input class="form-control" type="text" placeholder="Search for..." aria-label="Search for..." aria-describedby="btnNavbarSearch" />
                    <button class="btn btn-primary" id="btnNavbarSearch" type="button"><i class="fas fa-search"></i></button>
                </div>
            </form>
            -->
        <!-- Navbar-->
    </nav>
    <div id="layoutSidenav">
        <div id="layoutSidenav_nav">
            <nav class="sb-sidenav accordion sb-sidenav-dark bg-black" id="sidenavAccordion">
                <div class="sb-sidenav-menu">
                    <div class="nav">
                        <div class="sb-sidenav-menu-heading">Core</div>
                        <a class="nav-link" href="vacaciones_doc.php">
                            <div class="sb-nav-link-icon"><i class="fas fa-tachometer-alt"></i></div>
                            Vacations
                        </a>
                        <a class="nav-link" href="pedidos_doc.php">
                            <div class="sb-nav-link-icon"><i class="fas fa-tachometer-alt"></i></div>
                            Orders
                        </a>
                        <a class="nav-link" href="dias_empleado.php">
                            <div class="sb-nav-link-icon"><i class="fas fa-tachometer-alt"></i></div>
                            Days
                        </a>
                        <a class="nav-link" href="horarios.php">
                            <div class="sb-nav-link-icon"><i class="fas fa-tachometer-alt"></i></div>
                            Schedules
                        </a>
                        <a class="nav-link" href="servicios_empleado.php">
                            <div class="sb-nav-link-icon"><i class="fas fa-tachometer-alt"></i></div>
                            Services
                        </a>
                        <a class="nav-link" href="logout.php">
                            <div class="sb-nav-link-icon"><i class="fas fa-tachometer-alt"></i></div>
                            LogOut
                        </a>
                    </div>
            </nav>
        </div>
        <div id="layoutSidenav_content">
            <main>
                <div class="container-fluid px-4">
                    <h1 class="mt-4 text-center">Appoinments</h1>
                    <?php
                  $sql = "SELECT * FROM horarios_turnos WHERE empleado = '$empleado';";
                  $consulta = mysqli_query($conn, $sql);
                  ?>
                    <div class="card mb-4 bg-blue">
                        <div class="card-header">
                            <i class="fas fa-table me-1"></i>
                            Appoinments Table
                        </div>
                        <div class="card-body">
                            <table id="datatablesSimple">
                                <thead>
                                    <tr>
                                        <th>Start Time</th>
                                        <th>End Time</th>
                                        <th>--</th>
                                        <th>--</th>
                                    </tr>
                                </thead>
                                <tfoot>
                                    <tr>
                                    <th>Start Time</th>
                                        <th>End Time</th>
                                        <th>--</th>
                                        <th>--</th>
                                    </tr>
                                </tfoot>
                                <tbody>
                                    <?php 
                              while($emp = mysqli_fetch_array($consulta)){ ?>
                                    <tr>
                                        <td><?php echo $emp['hora_inicio']?></td>
                                        <td><?php echo $emp['hora_final']?></td>

                                        <td>
                                            <form action="" method="post">
                                                <a class="btn btn-danger" style="background-color: red" type="submit"
                                                    name="btn" value="eliminar"
                                                    href="delete_horarios_back.php?id=<?php echo $emp['id']?>">Delete</a>
                                        </td>
                                        </form>
                                        </td>
                                        <td>
                                            <form action="" method="post">
                                                <a class="btn btn-success" style="background-color: green" type="submit"
                                                    name="btn" value="eliminar"
                                                    href="edit_horarios.php?id=<?php echo $emp['id']?>">Edit</a>
                                        </td>
                                        </form>
                                    </tr>
                                    <?php }?>
                                </tbody>
                            </table>
                        </div>
                    </div>
                    <div class="card mb-4 bg-blue">
                        <div class="container">
                            <div class="modal-dialog" role="document">
                                <div class="modal-content bg-lightblue">
                                    <form class="form-horizontal" method="POST" action="add_horarios_back.php">
                                        <div class="modal-header">
                                            <h4 class="modal-title" id="myModalLabel">Add Schedule</h4>
                                        </div>
                                        <div class="modal-body">
                                            <div class="form-group">
                                                <label for="title" class="col-sm-2 control-label">Start Time</label>
                                                <div class="col-sm-10">
                                                    <input type="text" name="hora_inicio" class="form-control"
                                                        id="title" placeholder="08:00">
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label for="title" class="col-sm-2 control-label">End Time</label>
                                                <div class="col-sm-10">
                                                    <input type="text" name="hora_final" class="form-control" id="title"
                                                        placeholder="09:00">
                                                </div>
                                            </div>
                                            <div class="form-group" style="display: none;">
                                                <div class="col-sm-10">
                                                    <input type="text" name="empleado" class="form-control" id="title"
                                                        placeholder="Titulo" value="<?php echo $empleado; ?>">
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
                </div>
            </main>
            <footer class="py-4 mt-auto bg-black">
                <div class="container-fluid px-4">
                    <div class="d-flex align-items-center justify-content-between small">
                        <div class="text-muted">Copyright &copy; Your Website 2022</div>
                    </div>
                </div>
            </footer>
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" crossorigin="anonymous">
    </script>
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