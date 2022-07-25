<!DOCTYPE html>
<html lang="en">
<head>
    <!-- Meta -->
    <?php include_once "helpers/help_meta.php"; ?>

    <title> comentarios </title>

    <!-- CSS -->
    <?php include_once "helpers/help_css.php"; ?>

</head>
<body id="page-top">

<?php require_once "connections/connection.php"?>
<?php

if (isset($_POST["idpublicacao"])) {
    $idpublicacao = $_POST["idpublicacao"];
    $today = date("Y-m-d");
    $link = new_db_connection();
    $stmt = mysqli_stmt_init($link);
    $query = "SELECT comentario.idcomentario, comentario.comentario, comentario.data
            FROM comentario
            INNER JOIN publicacao
            ON idpublicacao = publicacao_idpublicacao
            WHERE comentario.publicacao_idpublicacao = ?";

    if (mysqli_stmt_prepare($stmt, $query)) {

        mysqli_stmt_bind_param($stmt, "i", $idpublicacao);

        mysqli_stmt_execute($stmt);

        mysqli_stmt_bind_result($stmt, $idcomentario, $comentario, $data);


        while (mysqli_stmt_fetch($stmt)) { ?>
            <p><?= $comentario ?></p>
            <h1><?= $data ?></h1>

        <?php }


        mysqli_stmt_close($stmt);
    }
    mysqli_close($link);

}


?>
<form method="post" action="scripts/sc_comentario.php">
    <input type="text" name="comentario" id="comentario" class="outline" placeholder="Escreva aqui...">
    <input class="editar_campos" type="text" name="data" hidden value="<?= $today ?>">
    <button type="submit" value="<?= $idpublicacao ?>" name="idpublicacao">enviar</button>

</form>
<?php include_once "helpers/help_js.php"; ?>

</body>

</html>