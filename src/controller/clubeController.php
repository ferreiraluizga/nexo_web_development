<?php

require_once $_SERVER['DOCUMENT_ROOT'] . '/nexo/src/model/clube.php';

class ClubeController{
    private $clube;

    public function __construct(){
        $this->clube = new Clube();
        if(isset($_GET['acao'])){
        if($_GET['acao'] == 'cadastrar_clube'){
            $cpf = preg_replace('/\D/', '', $_POST['cpf']);
            $telefone = preg_replace('/\D/', '', $_POST['telefone']);
            if(strlen($cpf) === 11 && strlen($telefone) === 11){
            $this->cadastrar_clube();
            }
            header('Location: ../nexo_club.php?status=sucesso#nexoClub');
        }}
    }

    public function cadastrar_clube(){
        $cpf = preg_replace('/\D/', '', $_POST['cpf']);
        $telefone = preg_replace('/\D/', '', $_POST['telefone']);
        $this->clube->setNome($_POST['nome']);
        $this->clube->setTelefone($telefone);
        $this->clube->setCpf($cpf);
        $this->clube->setEmail($_POST['email']);
        $resultado = $this->clube->cadastrar_clube();
        if ($resultado === 'erro') {
            header('Location: ../nexo_club.php?erro=cpf#nexoClub');
            exit; 
        }
    }
}

new ClubeController();

?>