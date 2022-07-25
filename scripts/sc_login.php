<?php require_once "../connections/connection.php";

if (isset($_POST["email"]) && isset($_POST["password"])) {
    $link = new_db_connection();
    $stmt = mysqli_stmt_init($link);
    $query = "SELECT password_hash, role_idrole, idutilizador FROM utilizador WHERE email LIKE ?";

    if (mysqli_stmt_prepare($stmt, $query)) {
        mysqli_stmt_bind_param($stmt, 's', $email);
        $email = $_POST['email'];
        $password = $_POST['password'];

        mysqli_stmt_execute($stmt);
        mysqli_stmt_bind_result($stmt, $password_hash,  $perfil, $idutilizador);
        if (mysqli_stmt_fetch($stmt)) {
            if (password_verify($password, $password_hash)) {
                // Guardar sessão de utilizador
                session_start();
                $_SESSION["email"] = $email;
                $_SESSION["id"] = $idutilizador;
                $_SESSION["role"] = $perfil;

                // Feedback de sucesso
                header("Location: ../index.php");
            } else {
                // Password está errada
                echo "Incorrect credentials!";
            }
        } else {
            // Username não existe
            echo "Incorrect credentials!";

        }
    } else {
        // Acção de erro
        echo "Error:" . mysqli_stmt_error($stmt);
    }
} else {
    // Acção de erro
    echo "Error:" . mysqli_error($link);
}
mysqli_stmt_close($stmt);
mysqli_close($link);


?>
