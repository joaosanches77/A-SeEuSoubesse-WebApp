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
<body id="page-top" class="back">

<div class="box1">
    <div class="mt-5">
        <a href="landing.php"> <img class="logo" src="assets/logo.svg">  </a>
    </div>


    <div class="row justify-content-center centro">
        <form class="" method="post" action="scripts/sc_register.php">

            <div class="form-group col-xs-12 mt-5 margem">
                <label class="sr-only" for="exampleInputEmail3">Username</label>
                <input type="username" name="username" class="form-control borda" id="exampleInputEmail3" placeholder="username">
            </div>

            <div class="form-group col-xs-12 margem ">
                <label class="sr-only" for="exampleInputEmail3">Email</label>
                <input type="email" name="email" class="form-control borda" id="exampleInputEmail3" placeholder="email">
            </div>

            <div class="form-group col-xs-12 margem ">
                <label class="sr-only" for="exampleInputPassword3">Password</label>
                <input type="password" name="password" class="form-control borda" id="exampleInputPassword3" placeholder="password">
            </div>

            <div class="form-group col-xs-12 margem">
                <label for="input2Password2Form" class="sr-only form-control-label">Verify</label>

                <div class="">
                    <input type="password" class="form-control borda" id="password_confirm"
                           placeholder="Verify password" required="required"
                           onkeyup="checkPass(); return false;">
                    <span id="confirmMessage" class="confirmMessage"></span>
                </div>

            </div>
            <div class="col-xs-12 margem" >

                <label>Sou: </label>
                <br>
                <?php
                $link = new_db_connection();

                //prepared statement
                $stmt = mysqli_stmt_init($link);

                //query
                $query = "SELECT ".
                    "idmembro, ".
                    "membro ".
                    "FROM ".
                    "membro ";


                if (mysqli_stmt_prepare($stmt, $query)) {
                    mysqli_stmt_execute($stmt);
                    mysqli_stmt_bind_result($stmt, $idmembro, $membro);

                    while (mysqli_stmt_fetch($stmt)) { ?>

                        <input type="checkbox" name="membro" value="<?=$idmembro?>"> <?= $membro ?>

                    <?php }
                    mysqli_stmt_close($stmt);
                }
                mysqli_close($link);
                ?>
            </div>


            <div class="form-group col-xs-12 margem ">
                <label for="sel1">Curso: </label>
                <select class="form-control borda" id="sel1" type="curso" name="curso">
                    <option>Nenhum</option>
                    <?php
                    $link = new_db_connection();

                    //prepared statement
                    $stmt = mysqli_stmt_init($link);

                    //query
                    $query = "SELECT idcurso, curso FROM curso ";

                    if (mysqli_stmt_prepare($stmt, $query)) {
                    mysqli_stmt_execute($stmt);
                    mysqli_stmt_bind_result($stmt, $idcurso, $curso);

                    while (mysqli_stmt_fetch($stmt)) { ?>

                        <option  value="<?=$idcurso?>"> <?= $curso ?> </option>
                        <?php
                    }
                    ?>
                </select>

            </div>

            <?php
            mysqli_stmt_close($stmt);
            }
            mysqli_close($link);
            ?>

            <div class="mt-5 row col-12 justify-content-center">
                <button type="submit" class="btn entrar text-white justify-content-center" > Registar</button>
            </div>
        </form>

    </div>





    <!-- Bootstrap core JS-->
    <?php include_once "helpers/help_js.php"; ?>

</body>
</html>
