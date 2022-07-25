<?php
session_start();
?>

<?php require_once "connections/connection.php"; ?>


<?php include_once "components/cp_nav.php"; ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <!-- Meta -->
    <?php include_once "helpers/help_meta.php"; ?>

    <title> Ai, se eu soubesse... </title>

    <!-- CSS -->
    <?php include_once "helpers/help_css.php"; ?>

</head>
<body id="page-top">

<h5 class="text-center mt-3">Categorias</h5>
<section class="row ">

        <?php
        $link = new_db_connection();

        //prepared statement
        $stmt = mysqli_stmt_init($link);

        //query
        $query = "SELECT ".
            "idcategoria, ".
            "categoria ".
            "FROM ".
            "categoria ";

        if (mysqli_stmt_prepare($stmt, $query)) {
            mysqli_stmt_execute($stmt);
            mysqli_stmt_bind_result($stmt, $idcategoria, $categoria);

            while (mysqli_stmt_fetch($stmt)) { ?>

                <a href="feed_categoria.php?id=<?= $idcategoria?>" class="link" style="text-decoration: none"> <b class="categorias p-4 m-4 justify-content-center"><?= $categoria ?></b></a>

            <?php }
            mysqli_stmt_close($stmt);
        }
        mysqli_close($link);
        ?>

</section>






</body>
</html>
