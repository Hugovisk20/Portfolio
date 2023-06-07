<?php

include("functions.php");

if(isset($_REQUEST["NOME"]) && isset($_REQUEST["EMAIL"]) && isset($_REQUEST["MSG"])){

    $NOME = $_REQUEST["NOME"];
    $EMAIL = $_REQUEST["EMAIL"];
    $MSG = $_REQUEST["MSG"];

    if($NOME != "" && $EMAIL != "" && $EMAIL != ""){

        criaFeedback($NOME, $EMAIL, $MSG);

        header("location: ./");

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

                    <form action="feedbacks.php" method="post" class="box__form box__form--contacts">

                        <fieldset class="box__fieldset">

                            <legend class="box__legend"></legend>

                            <label for="" class="box__label">Nome</label>
                            <input type="text" name="NOME" id="" class="box__input">

                            <label for="" class="box__label">E-mail</label>
                            <input type="email" name="EMAIL" id="" class="box__input">

                            <label for="" class="box__label">Mensagem</label>
                            <textarea name="MSG" id="" class="box__textarea" cols="30" rows="10"></textarea>

                            <input type="submit" value="Enviar" class="box__input--submit">

                        </fieldset>

                    </form>

                </div>

            </section>

            <section class="box box--feedbacks">

                <div class="box__center">

                    <?php
                    
                    $result = selectFeedback();

                    foreach($result as $r){

                        $NOME = $r["NOME"];
                        $EMAIL = $r["EMAIL"];
                        $MSG = $r["MENSAGEM"];

                        echo "
                        
                        <div class='box__tarefa'>

                            <span class='box__email'>$EMAIL</span>
                        
                            <span class='box__nome'>$NOME</span> 

                            <span class='box__mensagem'>$MSG</span>
                        
                        </div>
                        
                        ";

                    }
                    
                    ?>

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

    <script src="./ARQUIVOS/JS/script_Feedback.js"></script>
    <script src="./ARQUIVOS/JS/script_All_2.js"></script>
        
</body>
</html>