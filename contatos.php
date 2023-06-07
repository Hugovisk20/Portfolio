<?php

include("functions.php");

$msgEmail = "";
$msg = "";

if(isset($_REQUEST["NomeRemetente"]) && isset($_REQUEST["EmailRemetente"]) && isset($_REQUEST["AssuntoEmail"]) && isset($_REQUEST["MensagemEmail"])){

    $NomeRemetente = $_REQUEST["NomeRemetente"];
    $EmailRemetente = $_REQUEST["EmailRemetente"];
    $AssuntoEmail = $_REQUEST["AssuntoEmail"];
    $MensagemEmail = $_REQUEST["MensagemEmail"];

    if($NomeRemetente != "" && $EmailRemetente != "" && $AssuntoEmail != "" && $MensagemEmail != ""){

        //echo "$NomeRemetente $EmailRemetente $SenhaRemetente $AssuntoEmail $MensagemEmail";
        $msgEmail = enviarEmail($NomeRemetente, $EmailRemetente, $AssuntoEmail, $MensagemEmail);

    }else{

        $msg = "Preencha todos os campos";

    }

}

?>

<!DOCTYPE html>
<html lang="pt-br">
<head>

    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Início - Hugo Otávio</title>

    <link rel="stylesheet" href="./ARQUIVOS/CSS/styles_20.css">

</head>
<body>

    <img class="box__icon--header" src="./ARQUIVOS/IMAGES/arrowLeft.png" alt="">

    <header class="header">

        <nav class="nav nav__header">

            <ul class="nav__list">

                <li class="nav__item"><a href="./" class="nav__ancor">HOME</a></li>

                <li class="nav__item"><a href="./contatos.php" class="nav__ancor">CONTATO</a></li>

                <li class="nav__item"><a href="./feedbacks.php" class="nav__ancor">FEEDBACKS</a></li>

                <li class="nav__item"><a href="./projetos.html" class="nav__ancor">PROJETOS</a></li>

            </ul>

        </nav>

        <input type="checkbox" class="box__input" name="box__input" id="box__input">

    </header>

    <main class="main">

        <article class="main__container">

            <section class="box box--form">

                <div class="box__center">

                    <form action="" method="post" class="box__form box__form--contacts">

                        <fieldset class="box__fieldset">

                            <legend class="box__legend"></legend>

                            <label for="" class="box__label">Nome</label>
                            <input type="text" name="NomeRemetente" id="" class="box__input">

                            <label for="" class="box__label">E-mail</label>
                            <input type="email" name="EmailRemetente" id="" class="box__input">

                            <label for="" class="box__label">Assunto</label>
                            <textarea name="AssuntoEmail" id="" class="box__textarea" cols="30" rows="2"></textarea>

                            <label for="" class="box__label">Mensagem</label>
                            <textarea name="MensagemEmail" id="" class="box__textarea" cols="30" rows="10"></textarea>

                            <input type="submit" value="Enviar" class="box__input--submit">

                        </fieldset>

                    </form>

                    <?php echo $msgEmail; echo $msg; ?>

                </div>

            </section>

            <section class="box box--contacts">

                <div class="box__center">

                    <div class="box__contato box__contato--instagram">

                        <div class="box__head" onclick="openBoxBody(0)">

                            <div class="box__contents">

                                <h3 class="box__title">Instagram</h3>

                                <img src="./ARQUIVOS/IMAGES/sinalDeSetaBaixo.png" alt="" class="box__icon">

                            </div>

                        </div>

                        <div class="box__body">

                            <div class="box__contents">

                                <div class="box__foto"></div>

                                <div class="box__titles">

                                    <h2 class="box__title">@hugotavio</h2>
                                    <h3 class="box__subtitle">128 Seguidores</h3>
                                    <h3 class="box__subtitle">195 Publicações</h3>

                                    <a href="https://www.instagram.com/hugotavio05/" target="_blank" class="box__ancor">Visitar</a>

                                </div>

                            </div>

                        </div>

                    </div>

                    <div class="box__contato box__contato--facebook">

                        <div class="box__head" onclick="openBoxBody(1)">

                            <div class="box__contents">

                                <h3 class="box__title">Facebook</h3>

                                <img src="./ARQUIVOS/IMAGES/sinalDeSetaBaixo.png" alt="" class="box__icon">

                            </div>

                        </div>

                        <div class="box__body">

                            <div class="box__contents">

                                <div class="box__foto"></div>

                                <div class="box__titles">

                                    <h2 class="box__title">Hugo Otavio</h2>
                                    <h3 class="box__subtitle">118 Amigos</h3>

                                    <a href="https://www.facebook.com/profile.php?id=100083190938976" target="_blank" class="box__ancor">Visitar</a>

                                </div>

                            </div>

                        </div>

                    </div>

                    <div class="box__contato box__contato--github">

                        <div class="box__head" onclick="openBoxBody(2)">

                            <div class="box__contents">

                                <h3 class="box__title">GitHub</h3>

                                <img src="./ARQUIVOS/IMAGES/sinalDeSetaBaixo.png" alt="" class="box__icon">

                            </div>

                        </div>

                        <div class="box__body">

                            <div class="box__contents">

                                <div class="box__foto"></div>

                                <div class="box__titles">

                                    <h2 class="box__title">Hugo Otávio dos Santos de Paula</h2>
                                    <h3 class="box__subtitle">2 Repositórios</h3>

                                    <a href="https://github.com/Hugovisk20" target="_blank" class="box__ancor">Visitar</a>

                                </div>

                            </div>

                        </div>

                    </div>

                    <div class="box__contato box__contato--email">

                        <div class="box__head" onclick="openBoxBody(3)">

                            <div class="box__contents">

                                <h3 class="box__title">E-Mail</h3>

                                <img src="./ARQUIVOS/IMAGES/sinalDeSetaBaixo.png" alt="" class="box__icon">

                            </div>

                        </div>

                        <div class="box__body">

                            <div class="box__contents">

                                <div class="box__foto"></div>

                                <div class="box__titles">

                                    <h2 class="box__title">hugotavio2005#gmail.com</h2>

                                    <a href="https://mail.google.com/mail/u/0/#inbox?compose=CllgCKCGmKVtxsGHHLpmLtkzntFhBsklVzzvwZgZpwjKGxDZLCwLtWQWcnRrNPDGFhCzblLcDnq" target="_blank" class="box__ancor">Visitar</a>

                                </div>

                            </div>

                        </div>

                    </div>

                </div>

            </section>

        </article>

    </main>

    <footer class="footer">

        <article class="footer__container box__center">

            <section class="box box--contatos">

                <h3 class="box__subtitle">Contatos</h3>

                <ul class="box__list">

                    <li class="box__item"><a href="https://wa.me/5512992174144" target="_blank" class="box__ancor">Telefone</a></li>

                    <li class="box__item"><a href="https://mail.google.com/mail/u/0/#inbox?compose=CllgCKCGmKVtxsGHHLpmLtkzntFhBsklVzzvwZgZpwjKGxDZLCwLtWQWcnRrNPDGFhCzblLcDnq" target="_blank" class="box__ancor">E-Mail</a></li>

                </ul>

            </section>

            <section class="box box--mais">

                <h3 class="box__subtitle">Redes Sociais</h3>

                <ul class="box__list">

                    <li class="box__item"><a href="https://www.instagram.com/hugotavio05/" class="box__ancor">Instagram</a></li>

                    <li class="box__item"><a href="https://www.facebook.com/profile.php?id=100083190938976" class="box__ancor">Facebook</a></li>

                    <li class="box__item"><a href="https://github.com/Hugovisk20" class="box__ancor">GitHub</a></li>

                    <li class="box__item"><a href="https://www.linkedin.com/in/hugo-ot%C3%A1vio-47054a246/" class="box__ancor">Linkedin</a></li>

                </ul>

            </section>

        </article>

    </footer>

    <script src="./ARQUIVOS/JS/script_Contato.js"></script>
    <script src="./ARQUIVOS/JS/script_All_2.js"></script>
        
</body>
</html>