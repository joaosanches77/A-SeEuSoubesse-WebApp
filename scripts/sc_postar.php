<?php require_once "../connections/connection.php"?>

<?php
session_start();

echo $_POST["idcategoria"];
echo $_POST["texto"];
echo $_POST["data"];
echo $_SESSION["id"];


if (isset($_POST["idcategoria"])&& ($_POST["idcategoria"] != "")
    && isset($_POST["texto"])&& ($_POST["texto"] != "")
    && isset($_POST["data"])&& ($_POST["data"] != "")
    && isset($_SESSION["id"])) {



    $idcategoria = $_POST["idcategoria"];
    $texto = $_POST["texto"];
    $data = $_POST["data"];
    $idutilizador = $_SESSION["id"] ;

    $link = new_db_connection();
    $stmt = mysqli_stmt_init($link);

    $query = "INSERT INTO publicacao
            (categoria_idcategoria, texto, data, utilizador_idutilizador) 
                VALUES ( ?, ?, ?, ?)";

    if (mysqli_stmt_prepare($stmt, $query)) {

        mysqli_stmt_bind_param($stmt, "issi", $idcategoria, $texto, $data, $idutilizador);



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


