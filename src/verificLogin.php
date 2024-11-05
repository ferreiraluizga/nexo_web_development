<?php
session_start();
require_once('controller/connect.php'); // Incluindo classe de conexão

// Instanciar a classe Connect
$db = new Connect();

// Obter a conexão
$connect = $db->getConexao();
if (isset($_POST['log'])) {
    $email = $_POST['email'];
    $password = $_POST['password'];
    $passwordhash = md5($_POST['password']);// Usar uma consulta preparada para evitar injeção de SQL
    $stmt = $connect->prepare("SELECT * FROM `funcionario` WHERE `Email_Func` = ? AND `Senha_Func` = ?");
    $stmt->bind_param("ss", $email, $passwordhash); // Bindando email e password
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows > 0) {
        $fetch = $result->fetch_assoc();
        $cod_func = $fetch['Cod_Func'];
        $_SESSION['cod_func'] = $cod_func;
        $_SESSION['nome'] = $fetch['Nome_Func'];
        $_SESSION['data_nasc'] = $fetch['Nasc_Func'];
        $cod_cargo = $fetch['Cod_Cargo'];
        $_SESSION['email'] = $email;
        $_SESSION['senha'] = $password;

        $stmt = $connect->prepare("SELECT Nome_Cargo FROM cargo WHERE Cod_Cargo = ?");
        $stmt->bind_param('i', $cod_cargo);
        $stmt->execute();
        $cargo = $stmt->get_result();
        $fetch = $cargo->fetch_assoc();

        $nome_cargo = $fetch['Nome_Cargo'];
        $_SESSION['nome_cargo'] = $nome_cargo;

        $stmt = $connect->prepare("SELECT * FROM fone_func WHERE Cod_Func = ?");
        $stmt->bind_param('i', $cod_func);
        $stmt->execute();
        $telefone = $stmt->get_result();
        $fetch = $telefone->fetch_assoc();
        $telefone_func = $fetch['Fone_Func'];
        $_SESSION['telefone'] = $telefone_func;

        $stmt = $connect->prepare("SELECT * FROM img_func WHERE Cod_Func = ?");
        $stmt->bind_param('i', $cod_func);
        $stmt->execute();
        $img = $stmt->get_result();
        $fetch = $img->fetch_assoc();
        $img_func = $fetch['Img_Func'];
        if (!empty($img_func)) {
            $_SESSION['img_func'] = $img_func;
        }

        header("location: dashboard.php");
        exit(); // Importante para evitar execução de código posterior
    } else {
        header("location: log.php?erro=login");
    }


}

?>