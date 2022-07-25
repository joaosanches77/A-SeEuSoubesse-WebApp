<?php
require_once ("../connections/connection.php");


if (isset($_GET["id"])) {
    $id = $_GET["id"];
    $link = new_db_connection();
    $stmt = mysqli_stmt_init($link);

    $query = "DELETE FROM publicacao
              WHERE idpublicacao = ?";

    if (mysqli_stmt_prepare($stmt, $query)) {

        /* Bind paramenters */
        mysqli_stmt_bind_param($stmt, "i", $id);

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
header("Location: publicacoes.php");






?>