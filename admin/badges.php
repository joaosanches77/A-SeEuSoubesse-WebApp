<?php include_once "components/cp_navbar.php"; ?>


<!-- Begin Page Content -->
            <div class="container-fluid">

                <!-- Page Heading -->
                <div class="d-sm-flex align-items-center justify-content-between mb-4">
                    <h1 class="h3 mb-0 text-gray-800">Gestão de Badges </h1>
                </div>


                <div class="row">
                    <div class="col-lg-12">
                        <div class="panel panel-default">
                            <div class="panel-body">
                                <div class="table-responsive">
                                    <table class="table table-striped">
                                        <thead>
                                        <tr>
                                            <th> ID Badge </th>
                                            <th> Nome Badge </th>
                                            <th> Eliminar </th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                        <?php
                                        $link = new_db_connection();

                                        //prepared statement
                                        $stmt = mysqli_stmt_init($link);

                                        //query
                                        $query = "SELECT idbadge, nome_badge
                                                    FROM badge 
                                                    ORDER BY idbadge ASC";

                                        if (mysqli_stmt_prepare($stmt, $query)) {
                                            mysqli_stmt_execute($stmt);
                                            mysqli_stmt_bind_result($stmt, $idbadge,  $nome_badge);

                                            while (mysqli_stmt_fetch($stmt)) { ?>
                                                <tr>
                                                    <td> <?=$idbadge ?>  </td>
                                                    <td> <?= $nome_badge?>  </td>
                                                    <td> <a href='badge_delete.php?id=<?=$idbadge?>'>  <i class="far fa-trash-alt"></i> </a> </td>
                                                </tr>

                                            <?php }
                                            mysqli_stmt_close($stmt);
                                        }
                                        mysqli_close($link);
                                        ?>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div>
                    <h4> Adicionar Badge</h4>
                    <form method="post" action="badge_insert.php">
                        <input type="text" name="nome_badge">
                        <input type="submit" value="Adicionar">
                    </form>
                </div>

