<?php
session_start();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <!-- Meta -->
    <?php include_once "helpers/help_meta.php"; ?>

    <?php require_once "connections/connection.php"; ?>

    <!DOCTYPE html>
    <html lang="en">
    <head>
        <!-- Meta -->
        <?php include_once "helpers/help_meta.php"; ?>

        <title> Ai, se eu soubesse... </title>

        <!-- CSS -->
        <?php include_once "helpers/help_css.php"; ?>

    </head>
<body id="page-top" class="back2">

<div class="box1">
    <div class="mt-5 mb-5 ">
        <img class="logo" src="assets/logo.svg">
    </div>
</div>

<div class="row col-12 justify-content-center margem3">
    <h1 class="mt-5 mb-5"> <b class="titulo "> O que farias diferente se soubesses o que sabes agora?</b> </h1>
</div>

<div class="mt-5 row col-12 justify-content-center">
    <a href="login.php"> <button type="submit" class="btn botao text-white mt-5" > Entrar </button> </a>
</div>

<div class="mt-4 row col-12 justify-content-center">
    <a href="register.php"> <button type="submit" class="btn botao2"> Criar conta </button> </a>
</div>





<!-- Bootstrap core JS-->
<?php include_once "helpers/help_js.php"; ?>

</body>

</html>
