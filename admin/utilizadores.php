<?php include_once "components/cp_navbar.php"; ?>


<!-- Begin Page Content -->
            <div class="container-fluid">

                <!-- Page Heading -->
                <div class="d-sm-flex align-items-center justify-content-between mb-4">
                    <h1 class="h3 mb-0 text-gray-800">Utilizadores</h1>
                </div>

                <div class="row">
                    <div class="col-lg-12">
                        <div class="panel panel-default">
                            <div class="panel-body">
                                <div class="table-responsive">
                                    <table class="table table-striped">
                                        <thead>
                                        <tr>
                                            <th> ID </th>
                                            <th> Nome de utilizador </th>
                                            <th> Ano de Entrada </th>
                                            <th> E-mail </th>
                                            <th> Curso </th>
                                            <th> Tipo de Membro </th>
                                            <th> Perfil </th>
                                            <th> Operações </th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                        <?php
                                        $link = new_db_connection();

                                        //prepared statement
                                        $stmt = mysqli_stmt_init($link);

                                        //query
                                        $query = "SELECT idutilizador, nome, ano_entrada, email, curso, membro, tipo 
                                                    FROM utilizador 
                                                    INNER JOIN curso 
                                                    ON curso_idcurso = idcurso 
                                                    INNER JOIN membro 
                                                    ON membro_idmembro = idmembro 
                                                    INNER JOIN role 
                                                    ON role_idrole = idrole
                                                    ORDER BY idutilizador ASC";

                                        if (mysqli_stmt_prepare($stmt, $query)) {
                                            mysqli_stmt_execute($stmt);
                                            mysqli_stmt_bind_result($stmt, $id, $nome, $ano, $email, $curso, $membro, $role);

                                            while (mysqli_stmt_fetch($stmt)) { ?>
                                                <tr>
                                                    <td> <?=$id ?>  </td>
                                                    <td> <?= $nome?>  </td>
                                                    <td> <?=$ano ?>  </td>
                                                    <td> <?= $email?>  </td>
                                                    <td> <?=$curso ?>  </td>
                                                    <td> <?=$membro ?>  </td>
                                                    <td> <?=$role ?>  </td>
                                                    <td class="text-center "> <a href="utilizador_update.php?id=<?=$id?>" > <i class="far fa-edit  "></i> </a> </td>

                                                </tr>

                                            <?php }
                                            mysqli_stmt_close($stmt);
                                        }
                                        mysqli_close($link);
                                        ?>























