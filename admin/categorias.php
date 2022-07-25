<?php include_once "components/cp_navbar.php"; ?>


<!-- Begin Page Content -->
            <div class="container-fluid">

                <!-- Page Heading -->
                <div class="d-sm-flex align-items-center justify-content-between mb-4">
                    <h1 class="h3 mb-0 text-gray-800">Gestão de Categorias</h1>
                </div>

                <div class="row">
                    <div class="col-lg-12">
                        <div class="panel panel-default">
                            <div class="panel-body">
                                <div class="table-responsive">
                                    <table class="table table-striped">
                                        <thead>
                                        <tr>
                                            <th> ID Categoria </th>
                                            <th> Nome da Categoria </th>
                                            <th> Eliminar </th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                        <?php
                                        $link = new_db_connection();

                                        //prepared statement
                                        $stmt = mysqli_stmt_init($link);

                                        //query
                                        $query = "SELECT idcategoria, categoria
                                                    FROM categoria 
                                                    ORDER BY idcategoria ASC";

                                        if (mysqli_stmt_prepare($stmt, $query)) {
                                            mysqli_stmt_execute($stmt);
                                            mysqli_stmt_bind_result($stmt, $idcategoria,  $categoria);

                                            while (mysqli_stmt_fetch($stmt)) { ?>
                                                <tr>
                                                    <td> <?=$idcategoria ?>  </td>
                                                    <td> <?= $categoria?>  </td>
                                                    <td> <a href='categoria_delete.php?id=<?=$idcategoria?>'>  <i class="far fa-trash-alt"></i> </a> </td>
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
                    <h4> Adicionar Categoria</h4>
                    <form method="post" action="categoria_insert.php">
                        <input type="text" name="categoria">
                        <input type="submit" value="Adicionar" >
                    </form>
                </div>
