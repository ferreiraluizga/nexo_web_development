<?php

require_once $_SERVER['DOCUMENT_ROOT']  . '/nexo/controller/connect.php';

class Clube {

    private $nome;
    private $telefone;
    private $cpf;
    private $email;
    private $connect;

    public function getNome() {
        return $this->nome;
    }

    public function setNome($nome) {
        $this->nome = $nome;
    }

    public function getTelefone() {
        return $this->telefone;
    }

    public function setTelefone($telefone) {
        $this->telefone = $telefone;
    }

    public function getCpf() {
        return $this->cpf;
    }

    public function setCpf($cpf) {
        $this->cpf = $cpf;
    }

    public function getEmail() {
        return $this->email;
    }

    public function setEmail($email) {
        $this->email = $email;
    }

    public function __construct(){ //Método construtor
        $this->connect = new Connect(); //Instancia do objeto da classe conexão
    }

    public function cadastrar_cliente() {
        $sql = "INSERT INTO cliente (`Nome_Cli`, `Ativo_Clube`) VALUES (?, 1)";
        $stmt = $this->connect->getConexao()->prepare($sql);
        $stmt->bind_param('s', $this->nome);
        if ($stmt->execute()) {
            return $this->connect->getConexao()->insert_id;
        }
    }

    public function cadastrar_clube() {
        $cod_cli = $this->cadastrar_cliente();
        $sql = "INSERT INTO clube_fidelidade (`Cod_Cli`, `CPF_Clube`, `Email_Clube`) VALUES (?, ?, ?)";
        $stmt = $this->connect->getConexao()->prepare($sql);
        $stmt->bind_param('iss', $cod_cli, $this->cpf, $this->email);
        return $stmt->execute();
    }
}

?>
