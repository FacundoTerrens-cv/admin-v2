<?php
include "conection.php";
$id = $_GET['id'];
$color = $_GET['color'];
$consulta ="SELECT * FROM `colors` WHERE id = '$id'";
$exe = mysqli_query($conn,$consulta);
?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
        <meta name="description" content="" />
        <meta name="author" content="" />
        <title>Register - SB Admin</title>
        <link href="css/styles.css" rel="stylesheet" />
        <script src="https://use.fontawesome.com/releases/v6.1.0/js/all.js" crossorigin="anonymous"></script>
    </head>
    <body class="bg-primary">
        <div id="layoutAuthentication">
            <div id="layoutAuthentication_content">
                <main>
                    <div class="container">
                        <div class="row justify-content-center">
                            <div class="col-lg-7">
                                <div class="card shadow-lg border-0 rounded-lg mt-5">
                                    <div class="card-header"><h3 class="text-center font-weight-light my-4">Change Color</h3></div>
                                    <div class="card-body">
                                        <form action="edit_color_back.php" method="POST">
                                        <div class="row mb-3">
                                        <?php
                                                while ($emp = mysqli_fetch_array($exe)){ ?>
                                                <div class="col-md-12">
                                                <label for="inputFirstName">COLOR ACTUAL</label>
                                                    <div class="form-floating mb-3 mb-md-0">
                                                        <input type="hidden" value="<?php echo $emp['id']?>" name="id">
                                                        <input class="form-control" name="nombre" type="text" style="background-color:<?php echo $emp['color'];?> ;" value="<?php echo $emp['nombre'];?>" readonly/>                   
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row mb-3">
                                                <div class="col-md-12">
                                                <label for="inputFirstName">CAMBIAR A:</label>
                                                    <div class="form-floating mb-3 mb-md-0">
                                                        <select name="color" class="form-control">
                                                    <?php   $sql_c = "SELECT * FROM colors";
                                                        $query_c = mysqli_query($conn, $sql_c);
                                                        while($colors = mysqli_fetch_array($query_c)){ ?>
                                                            <option value="<?php echo $colors['color_data'];?>" style="background-color: <?php echo $colors['color_data'];?>;"><?php echo $colors['color_data'];?></option>
                                                    <?php }?>
                                            </select>
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="mt-4 mb-0">
                                                <div class="d-grid"><input type="submit" class="btn btn-primary" value="Update" name="submit"></div>
                                            </div>
                                            <?php } ?>
                                        </form>
                                    </div>

                                </div>
                            </div>
                        </div>
                    </div>
                </main>
            </div>
            <div id="layoutAuthentication_footer">
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
    </body>
</html>
