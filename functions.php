<?php

//Função para se conectar com o banco de dados

function conectaBanco()
{
    $host = "localhost";
    $user = "root";
    $password = "";
    $database = "portfolio";

    $link = mysqli_connect($host , $user , $password , $database);

    return $link;

}

//Função para adicionar uma tarefa ao banco
function criaFeedback($NOME, $EMAIL, $MENSAGEM){

    $link = conectaBanco();

    $sql = "INSERT INTO avaliacoes (NOME, EMAIL, MENSAGEM) VALUES ('$NOME', '$EMAIL', '$MENSAGEM')";
    $result = mysqli_query($link, $sql);

}

//Função para selecionar as tarefas do banco
function selectFeedback(){

    $link = conectaBanco();

    $sql = "SELECT * FROM avaliacoes";
    $result = mysqli_query($link, $sql);

    return $result;

}

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

function enviarEmail($NOMEREMETENTE, $EMAILREMETENTE, $ASSUNTOEMAIL, $CORPOEMAIL){

    require './ARQUIVOS/LIBS/vendor/autoload.php';

    $mail = new PHPMailer(true);

    try {
        
        //$mail->SMTPDebug = SMTP::DEBUG_SERVER;                      
        $mail->isSMTP();                                            
        $mail->Host       = 'smtp.office365.com';                     
        $mail->SMTPAuth   = true;                                   
        $mail->Username   = 'hugotavio2005@gmail.com';                     
        $mail->Password   = '0utl00k@2oo5';                               
        $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;            
        $mail->Port       = 587;                                    

        $mail->setFrom('hugotavio2005@gmail.com', 'Hugo');
        $mail->addAddress('hugotavio2005@gmail.com', 'Hugo');                    
        //$mail->addReplyTo('info@example.com', 'Information');
        //$mail->addCC('cc@example.com');
        //$mail->addBCC('bcc@example.com');

        //$mail->addAttachment('/var/tmp/file.tar.gz');         
        //$mail->addAttachment('/tmp/image.jpg', 'new.jpg');    

        $mail->isHTML(true);                                  
        $mail->Subject = "$ASSUNTOEMAIL";
        $mail->Body    = "
        <h1>$EMAILREMETENTE</h1>
        <h3>$NOMEREMETENTE</h3>
        <br>
        <p>$CORPOEMAIL</p>
        ";
        //$mail->AltBody = 'This is the body in plain text for non-HTML mail clients';

        $mail->send();
        $msg = "E-Mail enviado com êxito";
    } catch (Exception $e) {
        $msg = "<br>Message could not be sent. Mailer Error: {$mail->ErrorInfo}</br>";
    }

    return $msg;

}

?>