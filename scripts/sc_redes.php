<?php require_once "../connections/connection.php";
session_start();

if (isset($_POST["rede"])){
    $link = new_db_connection();
    $stmt = mysqli_stmt_init($link);

    $query = "INSERT INTO utilizador_has_redes_sociais (link) VALUES (?)";


    if (mysqli_stmt_prepare($stmt, $query)) {

        mysqli_stmt_bind_param($stmt, 's', $url);

        $url = $_POST["rede"];

        if (mysqli_stmt_execute($stmt)) {

            echo "olá";

            mysqli_stmt_close($stmt);
            mysqli_close($link);
            // Acção de sucesso
            header("Location: ../perfil.php");
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
