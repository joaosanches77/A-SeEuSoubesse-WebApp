<?php require_once "../connections/connection.php"?>

<?php

session_start();

if (isset($_POST["idpublicacao"])) {


    $idpublicacao = $_POST["idpublicacao"] ;

    $link = new_db_connection();
    $stmt = mysqli_stmt_init($link);

    $query = "UPDATE publicacao
            SET  gosto = gosto + 1
            WHERE idpublicacao = ? ";

if (mysqli_stmt_prepare($stmt, $query)) {

mysqli_stmt_bind_param($stmt, "i", $idpublicacao);

mysqli_stmt_execute($stmt);

if (mysqli_stmt_fetch($stmt)) {



}


        mysqli_stmt_close($stmt);
        }
        mysqli_close($link);
}




header("Location: ../landingteste.php");



?>



