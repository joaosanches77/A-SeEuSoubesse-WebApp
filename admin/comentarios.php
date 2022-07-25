<?php include_once "components/cp_navbar.php"; ?>


<!-- Begin Page Content -->
            <div class="container-fluid">

                <!-- Page Heading -->
                <div class="d-sm-flex align-items-center justify-content-between mb-4">
                    <h1 class="h3 mb-0 text-gray-800">Gestão de Comentários </h1>
                </div>

                <div class="row">
                    <div class="col-lg-12">
                        <div class="panel panel-default">
                            <div class="panel-body">
                                <div class="table-responsive">
                                    <table class="table table-striped">
                                        <thead>
                                        <tr>
                                            <th> ID Comentário </th>
                                            <th> Comentário </th>
                                            <th> Nome de utilizador </th>
                                            <th> Data </th>
                                            <th> Eliminar </th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                        <?php
                                        $link = new_db_connection();

                                        //prepared statement
                                        $stmt = mysqli_stmt_init($link);

                                        //query
                                        $query = "SELECT idcomentario, comentario, nome, data
                                                    FROM comentario 
                                                    INNER JOIN utilizador 
                                                    ON utilizador_idutilizador = idutilizador 
                                                    ORDER BY idcomentario ASC";

                                        if (mysqli_stmt_prepare($stmt, $query)) {
                                            mysqli_stmt_execute($stmt);
                                            mysqli_stmt_bind_result($stmt, $idcomentario, $comentario, $nome, $data);

                                            while (mysqli_stmt_fetch($stmt)) { ?>
                                                <tr>
                                                    <td> <?=$idcomentario ?>  </td>
                                                    <td> <?= $comentario?>  </td>
                                                    <td> <?=$nome ?>  </td>
                                                    <td> <?=$data ?>  </td>
                                                    <td> <a href='comentario_delete.php?id=<?=$idcomentario?>'>  <i class="far fa-trash-alt"></i> </a> </td>



                                                </tr>

                                            <?php }
                                            mysqli_stmt_close($stmt);
                                        }
                                        mysqli_close($link);
                                        ?>
