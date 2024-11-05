<?php
require_once $_SERVER['DOCUMENT_ROOT'] . '/nexo/src/controller/connect.php'; //Importação única do arquivo, se existente

class Fornecedor
{ //Classe publica
    private $Cod_Forn; //Variáveis 
    private $nome_fantasia;
    private $cnpj_forn;
    private $fone_forn;
    private $email_forn;
    private $nome_resp;

    //Gets e Sets, encapsulamento das variáveis 
    public function getCod_Forn()
    {
        return $this->Cod_Forn;
    }
    public function setCod_Forn($Cod_Forn)
    {
        $this->Cod_Forn = $Cod_Forn;
    }

    public function getnome_fantasia()
    {
        return $this->nome_fantasia;
    }
    public function setnome_fantasia($nome_fantasia)
    {
        $this->nome_fantasia = $nome_fantasia;
    }

    public function getcnpj_forn()
    {
        return $this->cnpj_forn;
    }
    public function setcnpj_forn($cnpj_forn)
    {
        $this->cnpj_forn = $cnpj_forn;
    }

    public function fone_forn()
    {
        return $this->fone_forn;
    }
    public function setfone_forn($fone_forn)
    {
        $this->fone_forn = $fone_forn;
    }

    public function getemail_forn()
    {
        return $this->email_forn;
    }
    public function setemail_forn($email_forn)
    {
        $this->email_forn = $email_forn;
    }

    public function getnome_resp()
    {
        return $this->nome_resp;
    }
    public function setnome_resp($nome_resp)
    {
        $this->nome_resp = $nome_resp;
    }

    public function __construct()
    { //Método construtor
        $this->connect = new Connect(); //Instancia do objeto da classe conexão
    }

    //Método insirir faz a conexão com o banco de dados
    public function inserir()
    {
        $sql = "INSERT INTO fornecedor (`Nome_Fantasia`, `CNPJ_Forn`, `Fone_Forn`, `Email_Forn`, `Nome_Resp`) VALUES (?,?,?,?,?)"; //Declaração para o sql, de forma indefinida
        $stmt = $this->connect->getConexao()->prepare($sql); // stmt acessa conexão, realiza o método e utiliza o prepare
        $stmt->bind_param('sssss', $this->nome_fantasia, $this->cnpj_forn, $this->fone_forn, $this->email_forn, $this->nome_resp); //Define os parametros no caso do s, String
        return $stmt->execute(); //Retorna e executa
    }

    public function listar()
    { //Método listar
        $sql = "SELECT * FROM fornecedor"; //Declaração para sql, utilizando select
        $stmt = $this->connect->getConexao()->prepare($sql); //Acessa e busca a conexão, prepara o banco de dados para receber a declaração na variável sql 
        $stmt->execute(); //execução do armazenamento stmt
        $result = $stmt->get_result(); // Busca os resultados do select
        $fornecedores = []; // Vetor pessoas
        while ($fornecedor = $result->fetch_assoc()) { //Enquanto existir informações, retorna uma matriz onde armazena os registros 
            $fornecedores[] = $fornecedor; //Atribuição no vetor
        }
        return $fornecedores; //Retorna o vetor
    }


    public function atualizar($Cod_Forn)
    {
        $sql = "UPDATE fornecedor SET Nome_Fantasia = ?, CNPJ_Forn = ?, Fone_Forn = ?, Email_Forn = ?, Nome_Resp = ? WHERE Cod_Forn = ?"; //Declaração para o sql, de forma indefinida
        $stmt = $this->connect->getConexao()->prepare($sql); // stmt acessa conexão, realiza o método e utiliza o prepare
        $stmt->bind_param('sssssi', $this->nome_fantasia, $this->cnpj_forn, $this->fone_forn, $this->email_forn, $this->nome_resp, $Cod_Forn); //Define os parametros no caso do s, String
        return $stmt->execute(); //Retorna e executa
    }


    public function buscarPorCod_Forn($Cod_Forn)
    {  //Método buscarPorId
        $sql = "SELECT * FROM fornecedor WHERE Cod_Forn = ?"; //Declaração para sql, utilizando select e where
        $stmt = $this->connect->getConexao()->prepare($sql);  //Acessa e busca a conexão, prepara o banco de dados para receber a declaração na variável sql 
        $stmt->bind_param('i', $Cod_Forn); //Define os parametros 
        $stmt->execute(); //execução do armazenamento stmt
        $result = $stmt->get_result();  // Busca os resultados do select
        return $result->fetch_assoc(); //Enquanto existir informações, retorna uma matriz onde armazena os registros 
    }

    public function buscar($search)
    {
        // Prepare uma consulta SQL com um placeholder
        $sql = "SELECT * FROM fornecedor WHERE Nome_Fantasia LIKE '%$search%' OR Cod_Forn LIKE '%$search%'";
        $stmt = $this->connect->getConexao()->prepare($sql);
        $stmt->execute();
        $result = $stmt->get_result(); // Busca os resultados do select
        $listas = []; // Vetor  
        while ($lista = $result->fetch_assoc()) { //Enquanto existir informações, retorna uma matriz onde armazena os registros 
            $listas[] = $lista; //Atribuição no vetor
        }
        return $listas; //Retorna o vetor
    }
}

?>