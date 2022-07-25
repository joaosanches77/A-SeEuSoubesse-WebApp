<?php require_once "connections/connection.php"; ?>

<!DOCTYPE html>
<html lang="en">
<head>
    <!-- Meta -->
    <?php include_once "helpers/help_meta.php"; ?>

    <title> Ai, se eu soubesse... </title>

    <!-- CSS -->
    <?php include_once "helpers/help_css2.php"; ?>

</head>
<body id="page-top" class="back1">

<div class="box1">
    <div class="mt-5 mb-5 ">
        <a href="landing.php"> <img class="logo" src="assets/logo.svg">  </a>
    </div>

    <div class="row justify-content-center centro">
        <form class="form" method="post" action="scripts/sc_login.php">

            <div class="form-group col-xs-12 margem2 margem">
                <label class="sr-only" for="exampleInputEmail3">Email</label>
                <input type="email" name="email" class="form-control borda" id="exampleInputEmail3" placeholder="email">
            </div>

            <div class="form-group col-xs-12 mt-5 ">
                <label class="sr-only" for="exampleInputPassword3">Password</label>
                <input type="password" name="password" class="form-control borda" id="exampleInputPassword3" placeholder="password">

            </div>

            <div class="form-group col-xs-12 margem ">
                <a href="" class="esquecer">Esqueci-me da palavra-passe</a>
            </div>


            <div class="mt-5 row col-12 justify-content-center">
                <button type="submit" class="btn botao text-white mt-5" > Entrar </button>
            </div>



        </form>
    </div>

</div>





<!-- Bootstrap core JS-->
<?php include_once "helpers/help_js.php"; ?>

</body>

</html>
