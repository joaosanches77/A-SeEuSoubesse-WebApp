<?php

session_start();
$value = 1;
/*session is started if you don't write this line can't use $_Session  global variable*/
$_SESSION["idUsuario"]=$value;
/*session created*/

/*session was getting*/
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Testes-hidden</title>
    <link rel="stylesheet" type="text/css" href="css/style9.css"/>
    <script type="module" src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.esm.js"></script>
    <script nomodule src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.js"></script>
</head>

<body>

<div class="navbar">
    <div id="btn__sidebar">
        <ion-icon name="grid-outline"></ion-icon>
    </div>
    <div class="navbar__logo">
        <svg id="Layer_1" data-name="Layer 1" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 181.48 127.56">

            <circle class="cls-1" cx="158.64" cy="110.52" r="10.33"/>
            <circle class="cls-1" cx="176.32" cy="122.4" r="5.16"/>
            <path class="cls-2"
                  d="M216.76,260.6a32.65,32.65,0,0,0,3.61,14.91c-14.07,6.47-23.6,19-23.6,33.41v0c-9.45-7-15.39-17.18-15.39-28.56,0-19.74,17.91-36,40.84-37.93A33.29,33.29,0,0,0,216.76,260.6Z"
                  transform="translate(-181.38 -222.51)"/>
            <path class="cls-3"
                  d="M341.46,280.39c0,11.61-6.17,22-15.94,29a31,31,0,0,0,.34-4.65c0-13.37-8.21-25.13-20.65-31.92a32.16,32.16,0,0,0,2.4-12.2,33.07,33.07,0,0,0-5.36-18C324.41,245.17,341.46,261.11,341.46,280.39Z"
                  transform="translate(-181.38 -222.51)"/>
            <path class="cls-4"
                  d="M266.66,341a51.64,51.64,0,0,1-24.45,6c-25.09,0-45.42-17-45.44-38.09a50.43,50.43,0,0,0,30,9.53,53.3,53.3,0,0,0,10.77-1.09C242.3,328.62,253.09,337.44,266.66,341Z"
                  transform="translate(-181.38 -222.51)"/>
            <path class="cls-1"
                  d="M325.52,309.37c-2.73,18.87-21.86,33.47-45.09,33.47A52.55,52.55,0,0,1,266.66,341c9.83-5.25,17.07-13.6,19.78-23.41a52.9,52.9,0,0,0,9.6.86A50.62,50.62,0,0,0,325.52,309.37Z"
                  transform="translate(-181.38 -222.51)"/>
            <path class="cls-5"
                  d="M302.25,242.63a55.24,55.24,0,0,0-6.21-.36c-13.86,0-26.27,5.21-34.61,13.44-8.34-8.23-20.75-13.44-34.61-13.44-1.55,0-3.09.06-4.6.19,7.69-11.89,22.7-20,40-20S294.59,230.66,302.25,242.63Z"
                  transform="translate(-181.38 -222.51)"/>
        </svg>
    </div>

    <a href="perfil.php"><img src="assets/mario.jpeg" alt=""></a>
</div>

<div class="selector">
    <a href="#">Para ti</a>
    <a href="#" id="a2">Também podes gostar</a>
</div>

<div class="sidebar__toggle" id="sidebar">
    <div id="close__sidebar">
        X
    </div>
    <div class="sidebar__category">
        <a href="#">
            Home
        </a>
        <a href="categoryPage.php">
            Categoria 1
        </a>

    </div>
</div>

<a class="add__post" id="add__post" href="postar.php">
    +</a>


<div class="main" id="main">

    <div class="allpost">

        <div class="post post__nocomments" >
            <div class="post__info">
                <img src="assets/mario.jpeg" alt="">
                <div>
                    <h1>Lorem ipsum</h1>
                    <h2>Lorem ipsum</h2>
                </div>
            </div>
            <p>
                Lorem ipsum dolor sit amet, consectetur adipisicing elit. Ab asperiores inventore nam sit. Ex illo ipsam
                praesentium? Ad, adipisci aut autem consectetur deleniti eum fugiat incidunt sed tempore voluptas
                voluptatibus.
            </p>

            <div class="interactions">
                <div class="interactions__heart heart_color heart_color2" id="heart">
                    <a><svg id="Layer_1" data-name="Layer 1" xmlns="http://www.w3.org/2000/svg"
                         viewBox="0 0 128.97 116.66">
                        <path d="M381.07,223.2h.37l.74.09a56.18,56.18,0,0,1,6.12.73A33.14,33.14,0,0,1,410.9,241c.3.54.57,1.09.89,1.72.13-.22.21-.35.28-.49a32.43,32.43,0,0,1,8.05-10.39,33,33,0,0,1,28.08-7.66,32.38,32.38,0,0,1,19.33,11,32.74,32.74,0,0,1,7.87,17.08c.13.86.24,1.72.36,2.58v4.49a3.45,3.45,0,0,0-.11.54,36.27,36.27,0,0,1-1.49,7.56,66,66,0,0,1-7.6,16.12A148.59,148.59,0,0,1,447.79,307a289.86,289.86,0,0,1-31.12,28c-1.6,1.25-3.23,2.47-4.85,3.71l-.85-.62A289,289,0,0,1,373.86,305a146.77,146.77,0,0,1-15.7-19.69,72,72,0,0,1-8.38-16.78A34.65,34.65,0,0,1,348.52,250a33,33,0,0,1,14.66-21.37A32.33,32.33,0,0,1,378,223.45Z"
                              transform="translate(-347.3 -222.7)"/>
                    </svg>
                </div>
                <div class="interactions__icon__comments" id="icon">
                    <ion-icon name="chatbubble-outline"></ion-icon>
                </div>

            </div>

            <div class="post__toggle post__hidden" id="post__hidden">

                <div class="comment">
                    <textarea cols="30" rows="5" class="text__comment"></textarea>
                    <button href="#" class="btn__comment"> Comentar</button>
                </div>

                <div class="showcomments">
                    <div class="nocomments">Não há comentários</div>

                </div>

                <ion-icon name="chevron-up-outline" class="btn__togglepost"></ion-icon>
            </div>
        </div>


    </div>
    <div class="loader">
        <div class="spinner">
            <div class="bounce1"></div>
            <div class="bounce2"></div>
            <div class="bounce3"></div>
        </div>
    </div>
    <div class="limit__post limit__post__hidden">
        Você viu todos os posts
    </div>
    <div id="box">

    </div>
</div>


<script src="scripts/jquery-3.6.0.min.js"></script>
<script src="scripts/script.js"></script>

</body>
</html>
