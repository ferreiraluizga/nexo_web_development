<?php
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;
require_once $_SERVER['DOCUMENT_ROOT'] . '/nexo/vendor/autoload.php';
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $nome = $_POST['name'];
    $email = $_POST['email'];
    $mensagem = $_POST['message'];

    // Instanciar o PHPMailer
    $mail = new PHPMailer(true);
    try {

        // Configurações do servidor
        $mail->isSMTP();                                         // Usar SMTP
        $mail->Host = 'smtp.gmail.com';                         // Servidor SMTP
        $mail->SMTPAuth = true;                                  // Ativar autenticação SMTP
        $mail->Username = 'minimercadonexo@gmail.com';          // Usuário SMTP
        $mail->Password = 'jtusmrbvohsnykdp';                   // Senha SMTP
        $mail->SMTPSecure = PHPMailer::ENCRYPTION_SMTPS;      // Ativar criptografia TLS
        $mail->Port = 465;                                       // Porta TCP
        echo "aa";
        // Destinatários
        $mail->setFrom($email, $nome);
        $mail->addAddress('minimercadonexo@gmail.com');         // Adiciona o destinatário

        // Conteúdo do e-mail
        $mail->isHTML(true);
        $mail->Subject = 'Contato do Site';
        $mail->Body = "Nome: $nome<br>E-mail: $email<br>Mensagem: $mensagem";
        $mail->AltBody = "Nome: $nome\nE-mail: $email\nMensagem: $mensagem"; // Alternativa para e-mails sem HTML

        // Debug
        $mail->SMTPDebug = 2; // Adicione esta linha

        // Enviar e-mail
        $mail->send();
        header('Location: index.php?acao=sucesso#sac');
        exit; // Sempre um exit após redirecionar
    } catch (Exception $e) {
        header('Location: index.php?acao=erro#sac');
    }
}
?>