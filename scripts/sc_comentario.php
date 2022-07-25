

<?php require_once "../connections/connection.php"?>

<?php
session_start();

if (isset($_POST["idpublicacao"])&& ($_POST["idpublicacao"] != "")
    && isset($_POST["comentario"])&& ($_POST["comentario"] != "")
    && isset($_POST["data"])&& ($_POST["data"] != "")
    && isset($_SESSION["id"])) {


    $idpublicacao = $_POST["idpublicacao"];
    $comentario = $_POST["comentario"];
    $data = $_POST["data"];
    $idutilizador = $_SESSION["id"] ;

    $link = new_db_connection();
    $stmt = mysqli_stmt_init($link);

    $query = "INSERT INTO comentario
            (publicacao_idpublicacao, comentario, utilizador_idutilizador, data) 
                VALUES ( ?, ?, ?, ?)";

    if (mysqli_stmt_prepare($stmt, $query)) {

        mysqli_stmt_bind_param($stmt, "isis", $idpublicacao, $comentario, $idutilizador, $data);



        if (!mysqli_stmt_execute($stmt)) {

            echo "Error:" . mysqli_stmt_error($stmt);
        }
    } else {
        echo("Error description: " . mysqli_error($link));

    }

    mysqli_stmt_close($stmt);

    mysqli_close($link);
}
header("Location: ../landing.php");


?>

