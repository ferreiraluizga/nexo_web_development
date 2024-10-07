<?php

require_once $_SERVER['DOCUMENT_ROOT'] . '/nexo/src/model/clube.php';

class ClubeController{
    private $clube;

    public function __construct(){
        $this->clube = new Clube();
        if(isset($_GET['acao'])){
        if($_GET['acao'] == 'cadastrar_clube'){
            $this->cadastrar_clube();
            header('Location: ../index.php');
        }}
    }

    public function cadastrar_clube(){
        $this->clube->setNome($_POST['nome']);
        $this->clube->setTelefone($_POST['telefone']);
        $this->clube->setCpf($_POST['cpf']);
        $this->clube->setEmail($_POST['email']);
        $this->clube->cadastrar_clube(); 
    }
}

new ClubeController();

?>