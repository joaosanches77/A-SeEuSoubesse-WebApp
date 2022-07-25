<?php

header('Content-Type: application/json');
require_once ('../connections/connection.php');

session_start();



$link = new_db_connection();

$stmt = mysqli_stmt_init($link);





$query = 'INSERT INTO comentario (publicacao_idpublicacao, comentario, utilizador_idutilizador, data) 
                VALUES ( ?, ?, ?, ?)';




if (mysqli_stmt_prepare($stmt, $query)) {

    mysqli_stmt_bind_param($stmt, 'isis', $id, $texto, $idUsuario, $data);

    $id = $_POST['idPost'];
    $texto = $_POST['texto'];
    $idUsuario = $_SESSION['idUsuario'];
    $data = date('Y/m/d');

    if (mysqli_stmt_execute($stmt)) {
        echo 'Comentário publicado com sucesso';
    }else{
        echo "Error:" . mysqli_stmt_error($stmt);
    }

} else {
    // Acção de erro
    echo "Error:" . mysqli_error($link);
}
mysqli_close($link);



