<?php
session_start();
if (isset($_POST["nome"]) && ($_POST["nome"] != "") &&  (isset($_SESSION["idutilizador"]))) {

    $nome = $_POST["nome"];
    $id = $_SESSION["idutilizador"];

    require_once ("../connections/connection.php");

    $link = new_db_connection();
    $stmt = mysqli_stmt_init($link);

    $query = "UPDATE utilizador
              SET nome = ?
              WHERE idutilizador = ?";

    if (mysqli_stmt_prepare($stmt, $query)) {
        /* Bind paramenters */
        mysqli_stmt_bind_param($stmt, "si", $nome, $id);
        /* execute the prepared statement */
        if (!mysqli_stmt_execute($stmt)) {
            echo "Error:" . mysqli_stmt_error($stmt);
        }
    } else {
        echo("Error description: " . mysqli_error($link));
    }
    /* close statement */
    mysqli_stmt_close($stmt);
    /* close connection */
    mysqli_close($link);
}
header("Location: ../index.php");

?>