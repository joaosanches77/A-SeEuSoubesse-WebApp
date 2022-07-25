<?php include_once "components/cp_navbar.php"; ?>

            <!-- Begin Page Content -->
            <div class="container-fluid">

                <!-- Page Heading -->
                <div class="d-sm-flex align-items-center justify-content-between mb-4">
                    <h1 class="h3 mb-0 text-gray-800">Painel de Controlo</h1>
                </div>

                <!-- Content Row -->
                <div class="row">

                    <div class="col-xl-3 col-md-6 mb-4">
                        <div class="card border-left-warning shadow h-100 py-2">
                            <div class="card-body">
                                <div class="row no-gutters align-items-center">
                                    <div class="col mr-2">
                                        <div class="text-xs font-weight-bold text-warning text-uppercase mb-1">
                                            Número Total de Utilizadores</div>

                                        <?php
                                        $link = new_db_connection();

                                        //prepared statement
                                        $stmt = mysqli_stmt_init($link);

                                        //query
                                        $query = "SELECT ".
                                            "COUNT(*) ".
                                            "FROM ".
                                            "utilizador ";

                                        if (mysqli_stmt_prepare($stmt, $query)) {
                                            mysqli_stmt_execute($stmt);
                                            mysqli_stmt_bind_result($stmt, $count);

                                            while (mysqli_stmt_fetch($stmt)) { ?>
                                                <div class="h5 mb-0 font-weight-bold text-gray-800"> <?=$count ?> </div>
                                            <?php }
                                            mysqli_stmt_close($stmt);
                                        }
                                        mysqli_close($link);
                                        ?>

                                    </div>
                                    <div class="col-auto">
                                        <i class="fas fa-2x fa-users"></i>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Earnings (Monthly) Card Example -->
                    <div class="col-xl-3 col-md-6 mb-4">
                        <div class="card border-left-primary shadow h-100 py-2">
                            <div class="card-body">
                                <div class="row no-gutters align-items-center">
                                    <div class="col mr-2">
                                        <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">
                                            Número de Alunos</div>
                                        <?php
                                        $link = new_db_connection();

                                        //prepared statement
                                        $stmt = mysqli_stmt_init($link);

                                        //query
                                        $query = "SELECT ".
                                            "COUNT(*) ".
                                            "FROM ".
                                            "utilizador ".
                                            "WHERE ".
                                            "membro_idmembro ".
                                            "= ".
                                            "1 ";

                                        if (mysqli_stmt_prepare($stmt, $query)) {
                                            mysqli_stmt_execute($stmt);
                                            mysqli_stmt_bind_result($stmt, $count);

                                            while (mysqli_stmt_fetch($stmt)) { ?>
                                                <div class="h5 mb-0 font-weight-bold text-gray-800"> <?=$count ?> </div>
                                            <?php }
                                            mysqli_stmt_close($stmt);
                                        }
                                        mysqli_close($link);
                                        ?>
                                    </div>
                                    <div class="col-auto">
                                        <i class="fas fa-2x fa-user-alt"></i>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Earnings (Monthly) Card Example -->
                    <div class="col-xl-3 col-md-6 mb-4">
                        <div class="card border-left-success shadow h-100 py-2">
                            <div class="card-body">
                                <div class="row no-gutters align-items-center">
                                    <div class="col mr-2">
                                        <div class="text-xs font-weight-bold text-success text-uppercase mb-1">
                                            Número de Professores </div>
                                        <?php
                                        $link = new_db_connection();

                                        //prepared statement
                                        $stmt = mysqli_stmt_init($link);

                                        //query
                                        $query = "SELECT ".
                                            "COUNT(*) ".
                                            "FROM ".
                                            "utilizador ".
                                            "WHERE ".
                                            "membro_idmembro ".
                                            "= ".
                                            "2 ";

                                        if (mysqli_stmt_prepare($stmt, $query)) {
                                            mysqli_stmt_execute($stmt);
                                            mysqli_stmt_bind_result($stmt, $count);

                                            while (mysqli_stmt_fetch($stmt)) { ?>
                                                <div class="h5 mb-0 font-weight-bold text-gray-800"> <?=$count ?> </div>
                                            <?php }
                                            mysqli_stmt_close($stmt);
                                        }
                                        mysqli_close($link);
                                        ?>
                                    </div>
                                    <div class="col-auto">
                                        <i class="fas fa-2x fa-user-tie"></i>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Earnings (Monthly) Card Example -->
                    <div class="col-xl-3 col-md-6 mb-4">
                        <div class="card border-left-info shadow h-100 py-2">
                            <div class="card-body">
                                <div class="row no-gutters align-items-center">
                                    <div class="col mr-2">
                                        <div class="text-xs font-weight-bold text-info text-uppercase mb-1">Número de Ex-alunos                                        </div>
                                        <?php
                                        $link = new_db_connection();

                                        //prepared statement
                                        $stmt = mysqli_stmt_init($link);

                                        //query
                                        $query = "SELECT ".
                                            "COUNT(*) ".
                                            "FROM ".
                                            "utilizador ".
                                            "WHERE ".
                                            "membro_idmembro ".
                                            "= ".
                                            "3 ";

                                        if (mysqli_stmt_prepare($stmt, $query)) {
                                            mysqli_stmt_execute($stmt);
                                            mysqli_stmt_bind_result($stmt, $count);

                                            while (mysqli_stmt_fetch($stmt)) { ?>
                                                <div class="h5 mb-0 font-weight-bold text-gray-800"> <?=$count ?> </div>
                                            <?php }
                                            mysqli_stmt_close($stmt);
                                        }
                                        mysqli_close($link);
                                        ?>
                                    </div>
                                    <div class="col-auto">
                                        <i class="fas fa-2x fa-user-graduate"></i>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                </div>

                <!-- Content Row -->


                        <!-- Color System -->
                        <div class="row mt-5">
                            <div class="col-lg-6 mb-4">
                                <div class="card bg-primary text-white shadow">
                                    <div class="card-body">
                                        Primary
                                        <div class="text-white-50 small">#4e73df</div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-6 mb-4">
                                <div class="card bg-success text-white shadow">
                                    <div class="card-body">
                                        Success
                                        <div class="text-white-50 small">#1cc88a</div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-6 mb-4">
                                <div class="card bg-info text-white shadow">
                                    <div class="card-body">
                                        Info
                                        <div class="text-white-50 small">#36b9cc</div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-6 mb-4">
                                <div class="card bg-light text-black shadow">
                                    <div class="card-body">
                                        Light
                                        <div class="text-black-50 small">#f8f9fc</div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-6 mb-4">
                                <div class="card bg-dark text-white shadow">
                                    <div class="card-body">
                                        Dark
                                        <div class="text-white-50 small">#5a5c69</div>
                                    </div>
                                </div>
                            </div>
                        </div>

                    </div>

                </div>
            </div>

        </div>


        <!-- Footer -->
        <footer class="sticky-footer bg-white">
            <div class="container my-auto">
                <div class="copyright text-center my-auto">
                    <span>Copyright &copy; Your Website 2021</span>
                </div>
            </div>
        </footer>
        <!-- End of Footer -->

    </div>
    <!-- End of Content Wrapper -->

</div>
<!-- End of Page Wrapper -->

<!-- Scroll to Top Button-->
<a class="scroll-to-top rounded" href="#page-top">
    <i class="fas fa-angle-up"></i>
</a>



<!-- Bootstrap core JavaScript-->
<script src="vendor/jquery/jquery.min.js"></script>
<script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

<!-- Core plugin JavaScript-->
<script src="vendor/jquery-easing/jquery.easing.min.js"></script>

<!-- Custom scripts for all pages-->
<script src="js/sb-admin-2.min.js"></script>

<!-- Page level plugins -->
<script src="vendor/chart.js/Chart.min.js"></script>

<!-- Page level custom scripts -->
<script src="js/demo/chart-area-demo.js"></script>
<script src="js/demo/chart-pie-demo.js"></script>

</body>

</html>