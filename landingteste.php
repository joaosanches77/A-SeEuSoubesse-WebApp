<!DOCTYPE html>
<html lang="en">
<head>
    <!-- Meta -->
    <?php include_once "helpers/help_meta.php"; ?>

    <?php require_once "connections/connection.php"; ?>

    <title>pagina inicial</title>
</head>
<body id="page-top">


<form method="post" action="scripts/sc_like.php">

    <?php
    $link = new_db_connection();

    //prepared statement
    $stmt = mysqli_stmt_init($link);

    //query
    $query = "SELECT idpublicacao, gosto, texto FROM publicacao ";

    if (mysqli_stmt_prepare($stmt, $query)) {
        mysqli_stmt_execute($stmt);
        mysqli_stmt_bind_result($stmt, $idpublicacao, $gosto, $texto);

        while (mysqli_stmt_fetch($stmt)) { ?>

            <p><?= $texto ?></p>
            <p> <?= $gosto ?> </p>
            <button type="submit" name="idpublicacao" value="<?= $idpublicacao ?>"></button>
            <?php
        }
    }
    ?>
</form>

<form action="postar.php">
<button>adicionar</button>
</form>



<?php include_once "helpers/help_js.php"; ?>

</body>

</html>

