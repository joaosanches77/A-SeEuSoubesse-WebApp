<?php
session_start();
?>

<?php include_once "components/cp_nav.php"; ?>


<?php
require_once ("connections/connection.php");

if (isset($_GET["id"])) {
    $id = $_GET["id"];
    $link = new_db_connection();
    $stmt = mysqli_stmt_init($link);

    $query = "SELECT nome, email, password_hash, curso_idcurso, membro_idmembro
              FROM utilizador
              WHERE idutilizador = ?";

    if (mysqli_stmt_prepare($stmt, $query)) {
        mysqli_stmt_bind_param($stmt, "i", $id);
        /* execute the prepared statement */
        if (mysqli_stmt_execute($stmt)) {
            /* bind result variables */
            mysqli_stmt_bind_result($stmt, $nome, $email, $password_hash, $curso_idcurso, $membro_idmembro);

            /* fetch values */
            if (!mysqli_stmt_fetch($stmt)) {

            }
            session_start();
            $_SESSION["id_utilizador"] = $id;
        }  else {
            echo "Error:" . mysqli_stmt_error($stmt);
        }
    }

    mysqli_stmt_close($stmt);
    /* close connection */
    mysqli_close($link);

} else {
    header("Location: utilizador.php");
}

?>

<h1 class="mb-2 pb-2"> Editar Perfil </h1>
<form method="post" action="scripts/sc_definicoes.php">
    <p class="mb-2 pb-2"> Nome:
        <input type="text" name="nome_utilizador" value="<?= $nome ?>">
        <input type="submit" value="Editar nome">
    </p>
</form>
</body>
</html>
