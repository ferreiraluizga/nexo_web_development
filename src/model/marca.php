<?php
require_once $_SERVER['DOCUMENT_ROOT'] . '/nexo/src/controller/connect.php'; //Importação única do arquivo, se existente

class Marca
{ //Classe publica
    private $Cod_Marca; //Variáveis 
    private $nome_marca;

    //Gets e Sets, encapsulamento das variáveis 
    public function getCod_Marca()
    {
        return $this->Cod_Marca;
    }
    public function setCod_Marca($Cod_Marca)
    {
        $this->Cod_Marca = $Cod_Marca;
    }

    public function getnome_marca()
    {
        return $this->nome_marca;
    }
    public function setnome_marca($nome_marca)
    {
        $this->nome_marca = $nome_marca;
    }

    public function __construct()
    { //Método construtor
        $this->connect = new Connect(); //Instancia do objeto da classe conexão
    }

    //Método insirir faz a conexão com o banco de dados
    public function inserir()
    {
        $sql = "INSERT INTO marca (`Nome_Marca`) VALUES (?)"; //Declaração para o sql, de forma indefinida
        $stmt = $this->connect->getConexao()->prepare($sql); // stmt acessa conexão, realiza o método e utiliza o prepare
        $stmt->bind_param('s', $this->nome_marca); //Define os parametros no caso do s, String
        return $stmt->execute(); //Retorna e executa
    }

    public function listar()
    { //Método listar
        $sql = "SELECT * FROM marca"; //Declaração para sql, utilizando select
        $stmt = $this->connect->getConexao()->prepare($sql); //Acessa e busca a conexão, prepara o banco de dados para receber a declaração na variável sql 
        $stmt->execute(); //execução do armazenamento stmt
        $result = $stmt->get_result(); // Busca os resultados do select
        $marcas = []; // Vetor pessoas
        while ($marca = $result->fetch_assoc()) { //Enquanto existir informações, retorna uma matriz onde armazena os registros 
            $marcas[] = $marca; //Atribuição no vetor
        }
        return $marcas; //Retorna o vetor
    }


    public function atualizar($Cod_Marca)
    {
        $sql = "UPDATE marca SET Nome_Marca = ? WHERE Cod_Marca = ?"; //Declaração para o sql, de forma indefinida
        $stmt = $this->connect->getConexao()->prepare($sql); // stmt acessa conexão, realiza o método e utiliza o prepare
        $stmt->bind_param('si', $this->nome_marca, $Cod_Marca); //Define os parametros no caso do s, String
        return $stmt->execute(); //Retorna e executa
    }

    public function buscarPorCod_Marca($Cod_Marca)
    {  //Método buscarPorId
        $sql = "SELECT * FROM marca WHERE Cod_Marca = ?"; //Declaração para sql, utilizando select e where
        $stmt = $this->connect->getConexao()->prepare($sql);  //Acessa e busca a conexão, prepara o banco de dados para receber a declaração na variável sql 
        $stmt->bind_param('i', $Cod_Marca); //Define os parametros 
        $stmt->execute(); //execução do armazenamento stmt
        $result = $stmt->get_result();  // Busca os resultados do select
        return $result->fetch_assoc(); //Enquanto existir informações, retorna uma matriz onde armazena os registros 
    }

    public function buscar($search)
    {
        // Prepare uma consulta SQL com um placeholder
        $sql = "SELECT * FROM marca WHERE Nome_Marca LIKE '%$search%' OR Cod_Marca LIKE '%$search%'";
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