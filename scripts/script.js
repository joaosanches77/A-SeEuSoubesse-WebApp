
let addPost = document.getElementById('add__post')


let btnSidebar = document.getElementById('btn__sidebar')

btnSidebar.addEventListener('click', function () {
    let sideBar = document.getElementById('sidebar')
    sideBar.classList.remove('sidebar__toggle')
    sideBar.classList.add('sidebar')
})


let closeSidebar = document.getElementById('close__sidebar')

closeSidebar.addEventListener('click', function () {
    let addPost = document.getElementById('add__post')
    let sideBar = document.getElementById('sidebar')
    sideBar.classList.remove('sidebar')
    sideBar.classList.add('sidebar__toggle')

})

let a2 = document.getElementById('a2')


let iconComments = document.querySelectorAll(`.interactions__icon__comments`)


iconComments.forEach(function (allIconComments, arrlength) {
    console.log('segundo')
    allIconComments.addEventListener('click', function () {

        let post = document.querySelectorAll(`.post`)[arrlength]
        let postHidden = document.querySelectorAll(`.post__toggle`)[arrlength]
        post.classList.toggle('post__nocomments')
        post.classList.toggle('post__showcomments')
        postHidden.classList.toggle('post__hidden')
        postHidden.classList.toggle('post__show')
    })
})

let btnClose = document.querySelectorAll(`.btn__togglepost`)

btnClose.forEach(function (allIconToggle, arrlength) {
    allIconToggle.addEventListener('click', function () {
        let post = document.querySelectorAll(`.post`)[arrlength]
        let postHidden = document.querySelectorAll(`.post__toggle`)[arrlength]
        post.classList.remove('post__showcomments')
        post.classList.add('post__nocomments')
        postHidden.classList.remove('post__show')
        postHidden.classList.add('post__hidden')

    })
})

var cont = 0


function getPost(cont) {
    $.ajax({
        url: 'scripts/sc_showposts.php?n=' + cont,
        method: 'GET',
        dataType: 'json',

    }).done(function (msg) {
        console.log(cont)
        console.log(msg)
        if (!msg) {
            let limitPost = document.querySelector(`.limit__post`)
            let loader = document.querySelector(`.loader`)
            loader.style.display = 'none'
            limitPost.classList.remove('limit__post__hidden')
        } else {

            for (i = 0; i < msg.length; i++) {
                $(`.allpost`).append(' <div class="post post__nocomments" >\n' +
                    '            <div class="post__info">\n' +
                    '                <img src="' + msg[i]['fotoperfil'] + '" alt="">\n' +
                    '                <div>\n' +
                    '                    <h1>' + msg[i]['nome'] + '</h1>\n' +
                    '                    <h2>' + msg[i]['curso'] + '</h2>\n' +
                    '                </div>\n' +
                    '            </div>\n' +
                    '            <p>\n' +
                    msg[i]['texto'] +
                    '            </p>\n' +
                    '\n' +
                    '            <div class="interactions">\n' +
                    '                <div class="interactions__heart heart_color heart_color2" id="heart">\n' +
                    '                    <svg id="Layer_1" data-name="Layer 1" xmlns="http://www.w3.org/2000/svg"\n' +
                    '                         viewBox="0 0 128.97 116.66">\n' +
                    '                        <path d="M381.07,223.2h.37l.74.09a56.18,56.18,0,0,1,6.12.73A33.14,33.14,0,0,1,410.9,241c.3.54.57,1.09.89,1.72.13-.22.21-.35.28-.49a32.43,32.43,0,0,1,8.05-10.39,33,33,0,0,1,28.08-7.66,32.38,32.38,0,0,1,19.33,11,32.74,32.74,0,0,1,7.87,17.08c.13.86.24,1.72.36,2.58v4.49a3.45,3.45,0,0,0-.11.54,36.27,36.27,0,0,1-1.49,7.56,66,66,0,0,1-7.6,16.12A148.59,148.59,0,0,1,447.79,307a289.86,289.86,0,0,1-31.12,28c-1.6,1.25-3.23,2.47-4.85,3.71l-.85-.62A289,289,0,0,1,373.86,305a146.77,146.77,0,0,1-15.7-19.69,72,72,0,0,1-8.38-16.78A34.65,34.65,0,0,1,348.52,250a33,33,0,0,1,14.66-21.37A32.33,32.33,0,0,1,378,223.45Z"\n' +
                    '                              transform="translate(-347.3 -222.7)"/>\n' +
                    '                    </svg>\n' +
                    '                </div>\n' +
                    '                <div class="interactions__icon__comments" id="icon">\n' +
                    '                    <ion-icon name="chatbubble-outline"></ion-icon>\n' +
                    '                </div>\n' +
                    '\n' +
                    '            </div>\n' +
                    '\n' +
                    '            <div class="post__toggle post__hidden" id="post__hidden">\n' +
                    '\n' +
                    '                <div class="comment">\n' +
                    '                    <textarea cols="30" rows="5" class="text__comment"></textarea>\n' +
                    '                    <button href="#" class="btn__comment" id =' + msg[i]["idpublicacao"] + '> Comentar</button>\n' +
                    '                </div>\n' +
                    '\n' +
                    '                <div class="showcomments">\n' +
                    '                   <div class="nocomments">Não há comentários</div>\n' +
                    '\n' +
                    '                </div>\n' +
                    '\n' +
                    '                <ion-icon name="chevron-up-outline" class="btn__togglepost"></ion-icon>\n' +
                    '            </div>\n' +
                    '        </div>\n'
                )

                let iconComments = document.querySelectorAll(`.interactions__icon__comments`)
                let textComment = document.querySelectorAll('.text__comment')
                let btnComment = document.querySelectorAll('.btn__comment')


                let lastItem = iconComments.length - 1
                var getAjax = true

                iconComments[lastItem].addEventListener('click', function () {
                    let post = document.querySelectorAll(`.post`)[lastItem]
                    let postHidden = document.querySelectorAll(`.post__toggle`)[lastItem]


                    post.classList.toggle('post__nocomments')
                    if (post.classList.toggle('post__showcomments')) {
                        getAjax = true
                    }

                    postHidden.classList.toggle('post__hidden')
                    postHidden.classList.toggle('post__show')

                    $.ajax({
                        url: 'scripts/sc_getComments.php?id=' + btnComment[lastItem].id,
                        method: "GET",
                        dataType: 'json'
                    }).done(function (msg) {

                        if (msg) {

                            let showComments = $('.showcomments').eq(lastItem)

                            if (getAjax) {

                                showComments.html('')
                                for (let i = 0; i < msg.length; i++) {
                                    showComments.append('<div class="user_comments">\n' +
                                        '<img src="mario.jpeg" alt="">\n' +
                                        '<div>\n' +
                                        '<h1>' + msg[i]['nome'] + '</h1>\n' +
                                        '<p>' + msg[i]['comentario'] + '</p>\n' +
                                        '<p>' + msg[i]['data'] + '</p>\n' +
                                        '</div>\n' +
                                        '</div>')
                                }
                                console.log(msg)
                            }

                            getAjax = false

                        }
                    }).fail(function (request, status, error) {
                        alert(request.responseText);
                    })

                })

                btnComment[lastItem].addEventListener('click', function (e) {
                        e.preventDefault()
                        let text = textComment[lastItem].value
                        console.log(btnComment[lastItem].id)
                        $.ajax({
                            url: 'scripts/sc_insertComment.php',
                            method: "POST",
                            data: {idPost: btnComment[lastItem].id, texto: text},
                        }).done(function () {
                          alert('ok')
                        }).fail(function (request, status, error) {
                            alert(request.responseText);
                        })

                    }
                )


            }
            contador()
        }
    }).fail(function (msg) {
        console.log(msg.responseText)
    })
}

function contador() {
    cont += 5
}


const box = document.getElementById('box')
const observer = new IntersectionObserver(function (arrObserver) {

    arrObserver.forEach(function (arrObserver) {
        if (arrObserver.isIntersecting) {
            getPost(cont)
        }
    })

})

observer.observe(box)

//EventTarget.addEventListener("click", function() {

    // Do something cool

//}, {once : true});




