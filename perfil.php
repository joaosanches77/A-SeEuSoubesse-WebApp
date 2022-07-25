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

<body id="page-top" class="">

<?php include_once "components/cp_nav.php" ; ?>

<?php require_once "connections/connection.php"; ?>

<?php


if (isset ($_SESSION["id"])) {

$idutilizador = $_SESSION["id"] ;

$link = new_db_connection();

//prepared statement
$stmt = mysqli_stmt_init($link);

//query

$query = "SELECT  utilizador.nome, utilizador.fotoperfil, curso.curso, membro.membro
                                                    FROM utilizador 
                                                    INNER JOIN membro
                                                    ON  membro_idmembro = idmembro
                                                    INNER JOIN curso
                                                    ON  curso_idcurso = idcurso 
                                                     WHERE utilizador.idutilizador = ?";

if (mysqli_stmt_prepare($stmt, $query)) {

mysqli_stmt_bind_param($stmt, "i", $idutilizador);

mysqli_stmt_execute($stmt);

mysqli_stmt_bind_result($stmt,$nome, $fotoperfil, $curso, $membro);

if (mysqli_stmt_fetch($stmt)) { ?>

<div class="perfil">
    <div class="img_perfil">
        <img class="" src="uploads/<?=$fotoperfil?>">
    </div>
    <span class="vl d-inline"></span>
    <div class="inline text-left form-largura">
        <h1 class="m-0"><?=$nome?></h1>
        <h2 class="m-0"><?=$curso?></h2>
        <p class="m-0"><?=$membro?></p>



<?php } ?>

    <?php


    mysqli_stmt_close($stmt);
}
    mysqli_close($link);

}
else{
    echo $_SESSION['id'];
}
?>

<?php


if (isset ($_SESSION["id"])) {

    $idutilizador = $_SESSION["id"] ;

    $link = new_db_connection();

//prepared statement
    $stmt = mysqli_stmt_init($link);

//query

    $query = "SELECT  utilizador_has_redes_sociais.link, utilizador_has_redes_sociais.redes_sociais_idredes_sociais, redes_sociais.imagem_redesocial
                                                    FROM utilizador
                                                    LEFT JOIN utilizador_has_redes_sociais
                                                        ON idutilizador = utilizador_idutilizador
                                                    LEFT JOIN redes_sociais
                                                        ON  idredes_sociais = redes_sociais_idredes_sociais
                                                     WHERE utilizador.idutilizador = ?";

    if (mysqli_stmt_prepare($stmt, $query)) {

        mysqli_stmt_bind_param($stmt, "i", $idutilizador);

        mysqli_stmt_execute($stmt);

        mysqli_stmt_bind_result($stmt,$url, $redessociais, $iredes);
        ?>
<div class="redes_sociais">

    <?php
        while (mysqli_stmt_fetch($stmt)) { ?>

                <a class="" href="<?=$url?>"><i class="bg_black <?=$iredes?>"></i></a>
        <?php } ?>
</div>

        <?php


        mysqli_stmt_close($stmt);
    }
    mysqli_close($link);

}

?>

<form action="editar_perfil.php">
    <button class="botao_editar">Editar</button>
</form>

    </div>
</div>


<div class="perfil " id="posts_perfil">
<?php
echo $_SESSION['id'];

if (isset ($_SESSION["id"])) {


$idutilizador = $_SESSION["id"] ;

    $link = new_db_connection();

//prepared statement
    $stmt = mysqli_stmt_init($link);

//query
    $query = "SELECT  utilizador.fotoperfil, publicacao.texto, publicacao.imagem, publicacao.data, utilizador.nome, categoria.categoria, curso.curso, publicacao.idpublicacao
                                                    FROM utilizador
                                                    INNER JOIN publicacao 
                                                    ON utilizador_idutilizador = idutilizador 
                                                    INNER JOIN categoria         
                                                    ON  categoria_idcategoria = idcategoria
                                                    INNER JOIN curso
                                                    ON  curso_idcurso = idcurso         
                                                    WHERE utilizador.idutilizador = ?
                                                    ORDER BY `publicacao`.`idpublicacao` DESC";

    if (mysqli_stmt_prepare($stmt, $query)) {

        mysqli_stmt_bind_param($stmt, "i", $idutilizador);

        mysqli_stmt_execute($stmt);

        mysqli_stmt_bind_result($stmt,  $fotoperfil, $texto, $imagem, $data, $nome, $categoria, $curso, $idpublicacao);

        while (mysqli_stmt_fetch($stmt)) { ?>



            <div class="post_perfil">
                <div class="post__info" >
                    <img src="<?= $fotoperfil ?>" alt="">
                    <div>
                        <h1><?= $nome ?></h1>
                        <h2><?= $categoria ?></h2>
                    </div>
                </div>
                <p>
                    <?= $texto ?>
                </p>
            </div>



        <?php }


        mysqli_stmt_close($stmt);
    }
    mysqli_close($link);

}

?>

</div>
</body>

