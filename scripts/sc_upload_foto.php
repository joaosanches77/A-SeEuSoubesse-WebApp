<?php require_once("../connections/connection.php");

session_start();

$target_dir = "../uploads/";

$target_file = $target_dir . basename($_FILES["fileToUpload"]["name"]);

$uploadOk = 1;

$imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));



// Check if image file is a actual image or fake image

if(isset($_POST["submit"])) {

    $check = getimagesize($_FILES["fileToUpload"]["tmp_name"]);

    if($check !== false) {

        echo "File is an image - " . $check["mime"] . ".";

//$uploadOk = 1;

    } else {

        echo "File is not an image.";

        $uploadOk = 0;

    }

}



// Check if file already exists

if (file_exists($target_file)) {

    echo "Sorry, file already exists.";

    $uploadOk = 0;

}



// Check file size

if ($_FILES["fileToUpload"]["size"] > 2000*1024) {

    echo "Sorry, your file is too large.";

    $uploadOk = 0;

}



// Allow certain file formats

if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"

    && $imageFileType != "gif" ) {

    echo "Sorry, only JPG, JPEG, PNG & GIF files are allowed.";

    $uploadOk = 0;

}

if (isset($_POST['Submit']) && !$error) {

// mysql_query("update SQL statement ");

    echo "Image Uploaded Successfully!";



}



// Check if $uploadOk is set to 0 by an error

if ($uploadOk == 0) {

    echo "Sorry, your file was not uploaded.";

// if everything is ok, try to upload file

} else {

    if (move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $target_file)) {

        echo "The file ". htmlspecialchars( basename( $_FILES["fileToUpload"]["name"])). " has been uploaded. <br>";


// Update do campo imagem na tabela X

        if (isset($_POST["submit"]) && ($_POST["submit"] != "") &&
            (isset($_SESSION["id"]))) {


            $imagem = $target_file;
            $idutilizador = $_SESSION["id"];



            $link = new_db_connection();
            $stmt = mysqli_stmt_init($link);

            $query = "UPDATE utilizador
            SET utilizador.fotoperfil = ?
             WHERE idutilizador = ?";



            if (mysqli_stmt_prepare($stmt, $query)) {


                /* Bind paramenters */
                mysqli_stmt_bind_param($stmt, "si", $imagem, $idutilizador);
                /* execute the prepared statement */

                if (!mysqli_stmt_execute($stmt)) {

                    echo "Error:" . mysqli_stmt_error($stmt);
                }
            } else {
                echo("Error description: " . mysqli_error($link));

            }
            /* close statement */
            mysqli_stmt_close($stmt);
            /* close connection */
            mysqli_close($link);

        }

// Redirecionar para página qualquer
        header("Location: ../perfil.php");

    } else {

        echo "Sorry, there was an error uploading your file.";

    }

}