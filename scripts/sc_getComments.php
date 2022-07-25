<?php

header('Content-Type: application/json');
require_once ('../connections/connection.php');


$link = new_db_connection();

$stmt = mysqli_stmt_init($link);



$query = 'SELECT utilizador.nome, comentario.idcomentario, comentario.comentario, comentario.data
            FROM comentario
            INNER JOIN publicacao
            ON idpublicacao = publicacao_idpublicacao
            INNER JOIN utilizador
            ON utilizador.idutilizador = comentario.utilizador_idutilizador
            WHERE comentario.publicacao_idpublicacao = ?
            ORDER BY data DESC, idcomentario DESC ';

if (mysqli_stmt_prepare($stmt, $query)) {

    mysqli_stmt_bind_param($stmt, 'i', $limit);

    $limit = $_GET['id'];

    if (mysqli_stmt_execute($stmt)) {

        $result = mysqli_stmt_get_result($stmt);

       while($arrStmt = mysqli_fetch_assoc($result)) {
          $arrJson[] = $arrStmt;
        }

        echo json_encode($arrJson);
    }
} else {
    // Acção de erro
    echo "Error:" . mysqli_error($link);
}
mysqli_close($link);



