<?php
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require 'vendor/autoload.php'; // Carrega o PHPMailer via Composer

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $nome = $_POST['name'];
    $email = $_POST['email'];
    $mensagem = $_POST['message'];

    // Instanciar o PHPMailer
    $mail = new PHPMailer(true);
    try {
        // Configurações do servidor
        $mail->isSMTP();                                         // Usar SMTP
        $mail->Host = 'smtp.gmail.com';                   // Servidor SMTP
        $mail->SMTPAuth = true;                                  // Ativar autenticação SMTP
        $mail->Username = ''; // Usuário SMTP
        $mail->Password = ''; // Senha SMTP
        $mail->SMTPSecure = PHPMailer::ENCRYPTION_SMTPS;      // Ativar criptografia TLS
        $mail->Port = 465;                                       // Porta TCP

        // Destinatários
        $mail->setFrom($email, $nome);
        $mail->addAddress('luiz.gabriel.lcf@gmail.com');              // Adiciona o destinatário

        // Conteúdo do e-mail
        $mail->isHTML(true);
        $mail->Subject = 'Contato do Site';
        $mail->Body = "Nome: $nome<br>E-mail: $email<br>Mensagem: $mensagem";
        $mail->AltBody = "Nome: $nome\nE-mail: $email\nMensagem: $mensagem"; // Alternativa para e-mails sem HTML

        // Enviar e-mail
        $mail->send();
        header('Location: index.php');
    } catch (Exception $e) {
        echo "A mensagem não pôde ser enviada. Erro: {$mail->ErrorInfo}";
    }
}
?>
