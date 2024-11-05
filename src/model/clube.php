<?php

require_once $_SERVER['DOCUMENT_ROOT'] . '/nexo/src/controller/connect.php';

class Clube
{

    private $nome;
    private $telefone;
    private $cpf;
    private $email;
    private $connect;

    public function getNome()
    {
        return $this->nome;
    }

    public function setNome($nome)
    {
        $this->nome = $nome;
    }

    public function getTelefone()
    {
        return $this->telefone;
    }

    public function setTelefone($telefone)
    {
        $this->telefone = $telefone;
    }

    public function getCpf()
    {
        return $this->cpf;
    }

    public function setCpf($cpf)
    {
        $this->cpf = $cpf;
    }

    public function getEmail()
    {
        return $this->email;
    }

    public function setEmail($email)
    {
        $this->email = $email;
    }

    public function __construct()
    { //Método construtor
        $this->connect = new Connect(); //Instancia do objeto da classe conexão
    }

    public function cadastrar_cliente()
    {
        $sql = "INSERT INTO cliente (`Nome_Cli`, `Ativo_Clube`) VALUES (?, 1)";
        $stmt = $this->connect->getConexao()->prepare($sql);
        $stmt->bind_param('s', $this->nome);
        if ($stmt->execute()) {
            return $this->connect->getConexao()->insert_id;
        }
    }

    public function verificar_cpf_existente($cpf)
    {
        $sql = "SELECT COUNT(*) FROM clube_fidelidade WHERE CPF_Clube = ?";
        $stmt = $this->connect->getConexao()->prepare($sql);
        $stmt->bind_param('s', $cpf);
        $stmt->execute();
        $stmt->bind_result($count);
        $stmt->fetch();
        return $count; // Retorna true se o CPF já estiver em uso
    }
    public function cadastrar_telefone($cod_cli)
    {
        $sql = "INSERT INTO fone_cli (`Cod_Cli`, `Fone_Cli`) VALUES (?, ?)";
        $stmt = $this->connect->getConexao()->prepare($sql);
        $stmt->bind_param('is', $cod_cli, $this->telefone);
        return $stmt->execute();
    }


    public function cadastrar_clube()
    {
        if ($this->verificar_cpf_existente($this->cpf) > 0) {
            return 'erro';
        } else {
            $cod_cli = $this->cadastrar_cliente();
            $this->cadastrar_telefone($cod_cli);
            $sql = "INSERT INTO clube_fidelidade (`Cod_Cli`, `CPF_Clube`, `Email_Clube`) VALUES (?, ?, ?)";
            $stmt = $this->connect->getConexao()->prepare($sql);
            $stmt->bind_param('iss', $cod_cli, $this->cpf, $this->email);
            return $stmt->execute();
        }

    }

}

?>