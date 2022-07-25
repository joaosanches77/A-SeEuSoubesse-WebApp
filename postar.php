<?php session_start()?>
<!doctype html>
<html lang="en">
<head>
    <?php include_once "helpers/help_meta.php"; ?>

    <title> Publicar </title>

    <!-- CSS -->
    <?php include_once "helpers/help_css.php"; ?>

</head>
<body>

<form method="post" action="scripts/sc_postar.php">
    <div class="publicar">
        <a><</a>
        <select name="idcategoria">
            <option></option>
            <?php require_once "connections/connection.php" ?>
            <?php

            $today = date("Y-m-d");

            $link = new_db_connection();

            //prepared statement
            $stmt = mysqli_stmt_init($link);

            //query
            $query = "SELECT idcategoria, categoria FROM categoria";


            if (mysqli_stmt_prepare($stmt, $query)) {
            mysqli_stmt_execute($stmt);
            mysqli_stmt_bind_result($stmt, $idcategoria, $categoria);

            while (mysqli_stmt_fetch($stmt)) { ?>

                <option name="idcategoria"
                        value="<?= $idcategoria ?>"> <?= $categoria ?> </option>

                <?php
            }
            ?>
        </select>

        <?php
        mysqli_stmt_close($stmt);
        }
        mysqli_close($link);
        ?>

    </div>
    <div class="publicar_escrever">
        <input name="texto" class="" placeholder="escreva aqui...">
        <input hidden name="data" value="<?= $today ?>">
    </div>
    <div class="publicar_botao">
       <button type="submit" class="botao_editar">Publicar</button>
    </div>
</form>

</body>
</html>