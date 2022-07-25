<?php require_once "connections/connection.php"?>
<?php


$link = new_db_connection();

$stmt = mysqli_stmt_init($link);

$query = "SELECT idrole
            FROM role";

if (mysqli_stmt_prepare($stmt, $query)) {

    mysqli_stmt_execute($stmt);

    mysqli_stmt_bind_result($stmt, $idrole);


    if (mysqli_stmt_fetch($stmt)) { ?>

    <?php }


    mysqli_stmt_close($stmt);
}
mysqli_close($link);
if ($idrole= 1){
    header("Location: admin/utilizadores.php");
}
else{

    header("Location: perfil.php");
}

