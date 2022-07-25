<?php require_once "../connections/connection.php"; ?>

            <?php
            $link = new_db_connection();

            //prepared statement
            $stmt = mysqli_stmt_init($link);

            //query
            $query = "SELECT publicacao.idpublicacao, publicacao.texto, publicacao.imagem, 
       publicacao.data, publicacao.localizacao, utilizador.nome, categoria.categoria
                                                    FROM publicacao 
                                                    INNER JOIN utilizador 
                                                    ON utilizador_idutilizador = idutilizador 
                                                    INNER JOIN categoria         
                                                    ON  categoria_idcategoria = idcategoria 
                                                    ORDER BY rand()";


            if (mysqli_stmt_prepare($stmt, $query)) {
                mysqli_stmt_execute($stmt);
                mysqli_stmt_bind_result($stmt, $idpublicacao, $texto, $imagem, $data, $localizacao, $nome, $categoria );



                while (mysqli_stmt_fetch($stmt)) {

                }
                mysqli_stmt_close($stmt);
            }
            mysqli_close($link);
            ?>
</section>
