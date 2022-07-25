<?php require_once "../connections/connection.php"; ?>

<?php include_once "components/cp_navbar.php"; ?>

            <div class="container-fluid">

                <div class="d-sm-flex align-items-center justify-content-between mb-4">
                    <h1 class="h3 mb-0 text-gray-800">Editar Utilizador</h1>
                </div>

<?php

if (isset($_GET["id"])) {
    $id = $_GET["id"];
    $link = new_db_connection();
    $stmt = mysqli_stmt_init($link);

    $query = "SELECT utilizador.nome, utilizador.email, curso.curso, membro.membro
              FROM utilizador
              INNER JOIN curso
              ON curso.idcurso = utilizador.curso_idcurso
            INNER JOIN membro
            ON membro.idmembro = utilizador.membro_idmembro
              WHERE idutilizador = ?";

    if (mysqli_stmt_prepare($stmt, $query)) {
        mysqli_stmt_bind_param($stmt, "i", $id);
        /* execute the prepared statement */
        if (mysqli_stmt_execute($stmt)) {
            /* bind result variables */
            mysqli_stmt_bind_result($stmt, $nome, $email, $curso1, $membro1);

            /* fetch values */
            if (!mysqli_stmt_fetch($stmt)) {

            }

            $_SESSION["id"] = $id;
        }  else {
            echo "Error:" . mysqli_stmt_error($stmt);
        }
    }

    mysqli_stmt_close($stmt);
    /* close connection */
    mysqli_close($link);

  ?>


    <form method="post" action="scripts/sc_utilizador_update.php">
                    <p class="mb-2 pb-2"> Nome de Utilizador:
                        <input type="text" name="nome" value="<?= $nome ?>">
                    </p>
                    <p class="mb-2 pb-2">Email:
                        <input type="text" name="email" value="<?= $email ?>">
                    </p>


                    <p class="mb-2 pb-2">
                        <label>Sou: </label>
                        <select class="form-control borda" id="sel1" type="membro" name="membro" >
                            <option name="membro"><?=$membro1?></option>
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
                    </p>

        <?php
                    mysqli_stmt_close($stmt);
                }
                mysqli_close($link);
                ?>

                </p>


                <p class="mb-2 pb-2">
                    <label for="sel1">Curso: </label>
                    <select class="form-control borda" id="sel1" type="curso" name="curso">
                        <option name="curso"><?=$curso1?></option>
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

                <input type="submit" value="Editar Utilizador" class="mb-4 ">

                </form>
                <a href='utilizador_delete.php?id=<?=$id?>'>  <input type="submit" value="Eliminar Utilizador"> </a>

                <?php

} else {
  //  header("Location: utilizadores.php");

    echo "location";
}

?>
