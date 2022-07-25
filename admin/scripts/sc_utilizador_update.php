<?php require_once("../../connections/connection.php");

session_start();

if (isset($_POST["nome"]) && ($_POST["nome"] != "")
    && isset($_POST["email"]) && ($_POST["email"] != "")
    && isset($_POST["membro"]) && ($_POST["membro"] != "")
    && isset($_POST["curso"]) && ($_POST["curso"] != "") &&
    (isset($_SESSION["id"])))
{

    $id = $_SESSION["id"];
    $nome = $_POST["nome"];
    $email = $_POST["email"];
    $membro = $_POST["membro"];
    $curso = $_POST["curso"];

    $link = new_db_connection();
    $stmt = mysqli_stmt_init($link);

    $query = "UPDATE utilizador
            INNER JOIN curso
            ON utilizador.curso_idcurso = curso.idcurso
            INNER JOIN membro
            ON utilizador.membro_idmembro = membro.idmembro
            SET utilizador.nome = ?, utilizador.email = ?, utilizador.curso_idcurso = ?, utilizador.membro_idmembro = ?
             WHERE idutilizador = ?";

    if (mysqli_stmt_prepare($stmt, $query)) {

        /* Bind paramenters */
        mysqli_stmt_bind_param($stmt, "ssiii", $nome, $email, $curso, $membro, $id);
        /* execute the prepared statement */

        if (!mysqli_stmt_execute($stmt)) {

            echo "Error:" . mysqli_stmt_error($stmt);
            echo "BLALBLSNODEFNO";
        }
    } else {
        echo("Error description: " . mysqli_error($link));

    }
    /* close statement */
    mysqli_stmt_close($stmt);
    /* close connection */
    mysqli_close($link);
}
header("Location: ../utilizadores.php");

?>
