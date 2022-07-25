<?php require_once "connections/connection.php";
session_start();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <!-- Meta -->
    <?php include_once "helpers/help_meta.php"; ?>

    <title> Ai, se eu soubesse... </title>

    <!-- CSS -->
    <?php include_once "helpers/help_css.php"; ?>

</head>
<body id="page-top" class="back">

<div class="box1">
    <div class="mt-5">
        <a href="landing.php"> <img class="logo" src="assets/logo.svg">  </a>
    </div>

    <div class="row justify-content-center centro">
        <form class="" method="post" action="scripts/sc_redes.php">

            <div class="form-group col-xs-12 mt-5 margem">

                <label class="font-weight-bold">Pretende adicionar alguma rede social? </label class="font-weight-bold">
                <br>
                <?php
                $link = new_db_connection();

                //prepared statement
                $stmt = mysqli_stmt_init($link);

                //query
                $query = "SELECT redes_sociais.idredes_sociais, redes_sociais.nome_rede FROM redes_sociais ";


                if (mysqli_stmt_prepare($stmt, $query)) {

                    mysqli_stmt_execute($stmt);
                    mysqli_stmt_bind_result($stmt, $idrede, $nomerede);

                    while (mysqli_stmt_fetch($stmt)) { ?>

                        <div class="mt-4"> <?= $nomerede ?> </div>
                        <input type="text" name="rede" class="form-control borda mt-1"  placeholder="URL" id=<?=$idrede?> >


                    <?php }
                    mysqli_stmt_close($stmt);
                }
                mysqli_close($link);
                ?>
            </div>


            <div class="mt-5 row col-12 justify-content-center">
                <button type="submit" class="btn entrar text-white justify-content-center" > Adicionar </button>
            </div>

        </form>
        <div class="mt-5 row col-12 justify-content-center">
            <a href=""><button type="submit" class="btn botao2"> Não quero </button></a>
        </div>


    </div>


    <!-- Bootstrap core JS-->
    <?php include_once "helpers/help_js.php"; ?>

</body>
</html>
