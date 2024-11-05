<?php
session_start();
require_once('controller/connect.php'); // Incluindo classe de conexão
$db = new Connect();
$connect = $db->getConexao();
if (isset($_SESSION['cod_func']) && isset($_SESSION['email']) && isset($_SESSION['nome'])) {
    $fileTmpPath = $_FILES['imgupload']['tmp_name'];
    $fileName = $_FILES['imgupload']['name'];
    $fileSize = $_FILES['imgupload']['size'];
    $fileType = $_FILES['imgupload']['type'];
    $cod_func = $_SESSION['cod_func'];
    // Caso não há erros
    if ($_FILES['imgupload']['error'] === UPLOAD_ERR_OK) {
        // transformar em Blob
        $imgData = file_get_contents($fileTmpPath);
        if (empty($_SESSION['img_func'])) {
            $stmt = $connect->prepare("INSERT INTO img_func (Img_Func, Cod_Func) VALUES (?, ?)");
            $stmt->bind_param('si', $imgData, $cod_func);
            $stmt->execute();
            $_SESSION['img_func'] = $imgData; // Armazenando como base64 para exibição mais fácil
            // Redirecionar ou exibir uma mensagem de sucesso
        } else {
            $stmt = $connect->prepare("UPDATE img_func SET Img_Func = ? WHERE Cod_Func =?");
            $stmt->bind_param('si', $imgData, $cod_func);
            $stmt->execute();
            $_SESSION['img_func'] = $imgData;
        }
        header("Location: logperfil.php");
        exit();

    } else {
        echo "Imagem inválida.";
    }

} else {
    echo "Sessão não iniciada ou dados do usuário não disponíveis.";
}
?>