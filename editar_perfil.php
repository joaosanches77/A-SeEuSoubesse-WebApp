<!DOCTYPE html>
<html lang="en">
<?php session_start() ?>
<head>
    <!-- Meta -->
    <?php include_once "helpers/help_meta.php"; ?>

    <title> Ai, se eu soubesse... </title>

    <!-- CSS -->
    <?php include_once "helpers/help_css.php"; ?>


</head>

<body id="page-top" class="alinhar_centro">
<?php include_once "components/cp_nav.php"; ?>

<?php

if (isset ($_SESSION["id"])) {


$idutilizador = $_SESSION["id"] ;
$link = new_db_connection();
$stmt = mysqli_stmt_init($link);

$query = "SELECT utilizador.nome, utilizador.email, curso.curso, membro.membro, curso.idcurso, membro.idmembro
              FROM utilizador
              INNER JOIN curso
              ON curso.idcurso = utilizador.curso_idcurso
            INNER JOIN membro
            ON membro.idmembro = utilizador.membro_idmembro
              WHERE idutilizador = ?";

if (mysqli_stmt_prepare($stmt, $query)) {
    mysqli_stmt_bind_param($stmt, "i", $idutilizador);
    /* execute the prepared statement */
    if (mysqli_stmt_execute($stmt)) {
        /* bind result variables */
        mysqli_stmt_bind_result($stmt, $nome, $email, $curso, $membro, $idcurso, $idmembro);

        /* fetch values */
        if (!mysqli_stmt_fetch($stmt)) {

        }

        $_SESSION["id"] = $idutilizador;
    }  else {
        echo "Error:" . mysqli_stmt_error($stmt);
    }
}

mysqli_stmt_close($stmt);
/* close connection */
mysqli_close($link);

?>

<h5 class="pading_campos""> Foto de perfil:</h5>
<form action="scripts/sc_upload_foto.php" method="post" enctype="multipart/form-data">
  Selecione uma imagem:
    <input type="file" name="fileToUpload" id="fileToUpload">
    <input type="submit" value="Alterar" name="submit">
</form>



<form class="form-largura alinhar_centro" method="post" action="scripts/sc_editar_utilizador.php">
    <h5 class="pading_campos""> Nome de Utilizador:</h5>
<div class="alinhar_centro">
        <input class="editar_campos" type="text" name="nome" value="<?= $nome ?>">
</div>

    <h5 class="pading_campos">Email:</h5>
        <input class="editar_campos" type="text" name="email" value="<?= $email ?>">




        <h5 class="pading_campos">Sou: </h5>
        <select class="editar_campos" type="membro" name="membro" >
            <option name="membro" value="<?=$idmembro?>"><?=$membro?></option>
            <option name="membro"> </option>
            <?php
            $link = new_db_connection();

            //prepared statement
            $stmt = mysqli_stmt_init($link);

            //query
            $query = "SELECT idmembro, membro FROM membro ";


            if (mysqli_stmt_prepare($stmt, $query)) {
            mysqli_stmt_execute($stmt);
            mysqli_stmt_bind_result($stmt, $idmembro, $membro);

            while (mysqli_stmt_fetch($stmt)) { ?>

                <option  name="membro" value="<?=$idmembro?>"> <?= $membro ?> </option>

                <?php
            }
            ?>
        </select>

    <?php
    mysqli_stmt_close($stmt);
    }
    mysqli_close($link);
    ?>

    </p>


        <h5 class="pading_campos">Curso: </h5>
        <select class="borda editar_campos" type="curso" name="curso">
            <option name="curso" value="<?=$idcurso?>"><?=$curso?></option>
            <option name="curso"> </option>
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

                <option name="curso" value="<?=$idcurso?>"> <?= $curso ?> </option>
                <?php
            }
            ?>
        </select>

    </p>

<?php
mysqli_stmt_close($stmt);
}
mysqli_close($link);
?>


    <div class="alinhar_centro pading_campos">
        <input type="submit" value="Editar" class="botao_editar">
    </div>
</form>



<?php

} else {
     header("Location: perfil.php");

    echo "location";
}

?>



</body>
