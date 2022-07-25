<?php

header('Content-Type: application/json');
require_once ('../connections/connection.php');


$link = new_db_connection();

$stmt = mysqli_stmt_init($link);

$limit = $_GET['n'];

$query = 'SELECT  publicacao.texto, publicacao.imagem, publicacao.data, utilizador.nome, utilizador.fotoperfil, categoria.categoria, curso.curso, publicacao.idpublicacao
                                                FROM utilizador
                                                INNER JOIN publicacao 
                                                ON utilizador_idutilizador = idutilizador 
                                                INNER JOIN categoria         
                                                ON  categoria_idcategoria = idcategoria
                                                INNER JOIN curso
                                                ON  curso_idcurso = idcurso         
                                                ORDER BY publicacao.idpublicacao 
                                                LIMIT ?, 5';

if (mysqli_stmt_prepare($stmt, $query)) {

    mysqli_stmt_bind_param($stmt, 'i', $limit);

    $limit = $_GET['n'];

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





