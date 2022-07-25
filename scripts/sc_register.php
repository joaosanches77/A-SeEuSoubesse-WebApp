
<?php require_once "../connections/connection.php";

if (isset($_POST["username"]) && isset($_POST["email"]) && isset($_POST["password"]) && isset($_POST["curso"]) && isset($_POST["membro"]) ){
    $link = new_db_connection();
    $stmt = mysqli_stmt_init($link);
    $query = "INSERT INTO utilizador (nome, email, password_hash, curso_idcurso, membro_idmembro) VALUES (?,?,?,?,?)";
if (mysqli_stmt_prepare($stmt, $query)) {
    mysqli_stmt_bind_param($stmt, 'sssii', $username, $email, $password_hash, $curso_idcurso, $membro_idmembro);

    $username = $_POST["username"];
    $email = $_POST["email"];
    $password_hash = password_hash($_POST["password"], PASSWORD_DEFAULT);
    $curso_idcurso = $_POST["curso"];
    $membro_idmembro = $_POST["membro"];

        if (mysqli_stmt_execute($stmt)) {

            session_start();
            mysqli_stmt_close($stmt);
            mysqli_close($link);
            // Acção de sucesso
            header("Location: ../redes.php?");
       } else {
            //Acção de erro
            header("Location: ../erro.php");
        }
    } else {
        // Acção de erro
        echo "Error:" . mysqli_error($link);
        mysqli_close($link);
    }
} else {
    echo "Campos do formulário por preencher";
}
?>



