<?php
require_once $_SERVER['DOCUMENT_ROOT'] . '/nexo/src/controller/connect.php'; //Importação única do arquivo, se existente

class Categoria
{ //Classe publica
    private $Cod_Categoria; //Variáveis 
    private $nome_categoria;
    private $desc_categoria;

    //Gets e Sets, encapsulamento das variáveis 
    public function getCod_Categoria()
    {
        return $this->Cod_Categoria;
    }
    public function setCod_Categoria($Cod_Categoria)
    {
        $this->Cod_Categoria = $Cod_Categoria;
    }

    public function getnome_categoria()
    {
        return $this->nome_categoria;
    }
    public function setnome_categoria($nome_categoria)
    {
        $this->nome_categoria = $nome_categoria;
    }

    public function getdesc_categoria()
    {
        return $this->desc_categoria;
    }
    public function setdesc_categoria($desc_categoria)
    {
        $this->desc_categoria = $desc_categoria;
    }

    public function __construct()
    { //Método construtor
        $this->connect = new Connect(); //Instancia do objeto da classe conexão
    }

    //Método insirir faz a conexão com o banco de dados
    public function inserir()
    {
        $sql = "INSERT INTO categoria_produto (`Nome_Categoria`,`Desc_Categoria`) VALUES (?,?)"; //Declaração para o sql, de forma indefinida
        $stmt = $this->connect->getConexao()->prepare($sql); // stmt acessa conexão, realiza o método e utiliza o prepare
        $stmt->bind_param('ss', $this->nome_categoria, $this->desc_categoria); //Define os parametros no caso do s, String
        return $stmt->execute(); //Retorna e executa
    }

    public function listar()
    { //Método listar
        $sql = "SELECT * FROM categoria_produto"; //Declaração para sql, utilizando select
        $stmt = $this->connect->getConexao()->prepare($sql); //Acessa e busca a conexão, prepara o banco de dados para receber a declaração na variável sql 
        $stmt->execute(); //execução do armazenamento stmt
        $result = $stmt->get_result(); // Busca os resultados do select
        $categorias = []; // Vetor pessoas
        while ($categoria = $result->fetch_assoc()) { //Enquanto existir informações, retorna uma matriz onde armazena os registros 
            $categorias[] = $categoria; //Atribuição no vetor
        }
        return $categorias; //Retorna o vetor
    }


    public function atualizar($Cod_Categoria)
    {
        $sql = "UPDATE categoria_produto SET Nome_Categoria = ?, Desc_Categoria = ? WHERE Cod_Categoria = ?"; //Declaração para o sql, de forma indefinida
        $stmt = $this->connect->getConexao()->prepare($sql); // stmt acessa conexão, realiza o método e utiliza o prepare
        $stmt->bind_param('ssi', $this->nome_categoria, $this->desc_categoria, $Cod_Categoria); //Define os parametros no caso do s, String
        return $stmt->execute(); //Retorna e executa
    }

    public function buscarPorCod_Categoria($Cod_Categoria)
    {  //Método buscarPorId
        $sql = "SELECT * FROM categoria_produto WHERE Cod_Categoria = ?"; //Declaração para sql, utilizando select e where
        $stmt = $this->connect->getConexao()->prepare($sql);  //Acessa e busca a conexão, prepara o banco de dados para receber a declaração na variável sql 
        $stmt->bind_param('i', $Cod_Categoria); //Define os parametros 
        $stmt->execute(); //execução do armazenamento stmt
        $result = $stmt->get_result();  // Busca os resultados do select
        return $result->fetch_assoc(); //Enquanto existir informações, retorna uma matriz onde armazena os registros 
    }


    public function buscar($search)
    {
        // Prepare uma consulta SQL com um placeholder
        $sql = "SELECT * FROM categoria_produto WHERE Nome_Categoria LIKE '%$search%' OR Cod_Categoria LIKE '%$search%'";
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