<?php
require_once $_SERVER['DOCUMENT_ROOT'] . '/nexo/src/controller/connect.php'; //Importação única do arquivo, se existente

class Produto
{ //Classe publica
    private $Cod_Prod; //Variáveis 
    private $nome_prod;
    private $preco_prod;
    private $quant_estoque;
    private $cod_forn;
    private $nome_fantasia;
    private $cod_marca;
    private $nome_marca;
    private $cod_categoria;
    private $nome_categoria;

    //Gets e Sets, encapsulamento das variáveis 
    public function getCod_Prod()
    {
        return $this->Cod_Prod;
    }
    public function setCod_Prod($Cod_Prod)
    {
        $this->Cod_Prod = $Cod_Prod;

    }
    public function getNome_Prod()
    {
        return $this->nome_prod;
    }
    public function setNome_Prod($nome_prod)
    {
        $this->nome_prod = $nome_prod;
    }

    public function getPreco_Prod()
    {
        return $this->preco_prod;
    }
    public function setPreco_Prod($preco_prod)
    {
        $this->preco_prod = $preco_prod;
    }

    public function getQuant_Estoque()
    {
        return $this->quant_estoque;
    }
    public function setQuant_Estoque($quant_estoque)
    {
        $this->quant_estoque = $quant_estoque;
    }

    public function getCod_Forn()
    {
        return $this->cod_forn;
    }
    public function setCod_Forn($cod_forn)
    {
        $this->cod_forn = $cod_forn;
    }


    public function getCod_Marca()
    {
        return $this->cod_marca;
    }
    public function setCod_Marca($cod_marca)
    {
        $this->cod_marca = $cod_marca;
    }


    public function getCod_Categoria()
    {
        return $this->cod_categoria;
    }
    public function setCod_Categoria($cod_categoria)
    {
        $this->cod_categoria = $cod_categoria;
    }

    public function getNome_Categoria()
    {
        return $this->nome_categoria;
    }
    public function setNome_Categoria($nome_categoria)
    {
        $this->nome_categoria = $nome_categoria;
    }

    public function getNome_Marca()
    {
        return $this->nome_marca;
    }
    public function setNome_Marca($nome_marca)
    {
        $this->nome_marca = $nome_marca;
    }

    public function getNome_Fantasia()
    {
        return $this->nome_fantasia;
    }
    public function setNome_Fantasia($nome_fantasia)
    {
        $this->nome_fantasia = $nome_fantasia;
    }


    public function __construct()
    { //Método construtor
        $this->connect = new Connect(); //Instancia do objeto da classe conexão
    }

    //Método insirir faz a conexão com o banco de dados
    public function inserir()
    {
        $sql = "INSERT INTO produto (`Nome_Prod`, `Preco_Prod`, `Quant_Estoque`, `Cod_Forn`, `Cod_Marca`, `Cod_Categoria`) VALUES (?,?,?,?,?,?)"; //Declaração para o sql, de forma indefinida
        $stmt = $this->connect->getConexao()->prepare($sql); // stmt acessa conexão, realiza o método e utiliza o prepare
        $stmt->bind_param('sdiiii', $this->nome_prod, $this->preco_prod, $this->quant_estoque, $this->cod_forn, $this->cod_marca, $this->cod_categoria); //Define os parametros no caso do s, String
        return $stmt->execute(); //Retorna e executa
    }

    public function listar()
    { //Método listar
        $sql = "SELECT * FROM produto"; //Declaração para sql, utilizando select
        $stmt = $this->connect->getConexao()->prepare($sql); //Acessa e busca a conexão, prepara o banco de dados para receber a declaração na variável sql 
        $stmt->execute(); //execução do armazenamento stmt
        $result = $stmt->get_result(); // Busca os resultados do select
        $produtos = []; // Vetor pessoas
        while ($produto = $result->fetch_assoc()) { //Enquanto existir informações, retorna uma matriz onde armazena os registros 
            $produtos[] = $produto; //Atribuição no vetor
        }
        return $produtos; //Retorna o vetor
    }

    public function categoria()
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

    public function marca()
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

    public function fornecedor()
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

    public function buscarPorCod_Prod($Cod_Prod)
    {  //Método buscarPorId
        $sql = "SELECT * FROM produto WHERE Cod_Prod = ?"; //Declaração para sql, utilizando select e where
        $stmt = $this->connect->getConexao()->prepare($sql);  //Acessa e busca a conexão, prepara o banco de dados para receber a declaração na variável sql 
        $stmt->bind_param('i', $Cod_Prod); //Define os parametros 
        $stmt->execute(); //execução do armazenamento stmt
        $result = $stmt->get_result();  // Busca os resultados do select
        return $result->fetch_assoc(); //Enquanto existir informações, retorna uma matriz onde armazena os registros 
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

    public function buscarPorCod_Marca($Cod_Marca)
    {  //Método buscarPorId
        $sql = "SELECT * FROM marca WHERE Cod_Marca = ?"; //Declaração para sql, utilizando select e where
        $stmt = $this->connect->getConexao()->prepare($sql);  //Acessa e busca a conexão, prepara o banco de dados para receber a declaração na variável sql 
        $stmt->bind_param('i', $Cod_Marca); //Define os parametros 
        $stmt->execute(); //execução do armazenamento stmt
        $result = $stmt->get_result();  // Busca os resultados do select
        return $result->fetch_assoc(); //Enquanto existir informações, retorna uma matriz onde armazena os registros 
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

    public function atualizar($Cod_Prod)
    {
        $sql = "UPDATE produto SET Nome_Prod = ?, Preco_Prod = ?, Quant_Estoque = ?, Cod_Forn = ?, Cod_Marca = ?, Cod_Categoria = ? WHERE Cod_Prod = ?"; //Declaração para o sql, de forma indefinida
        $stmt = $this->connect->getConexao()->prepare($sql); // stmt acessa conexão, realiza o método e utiliza o prepare
        $stmt->bind_param('sdiiiii', $this->nome_prod, $this->preco_prod, $this->quant_estoque, $this->cod_forn, $this->cod_marca, $this->cod_categoria, $Cod_Prod); //Define os parametros no caso do s, String
        return $stmt->execute(); //Retorna e executa
    }

    public function excluir($Cod_Prod)
    {
        $sql = "DELETE FROM produto WHERE Cod_Prod = ?";
        $stmt = $this->connect->getConexao()->prepare($sql);
        $stmt->bind_param('i', $Cod_Prod);
        return $stmt->execute();
    }

    public function buscar($search)
    {
        // Prepare uma consulta SQL com um placeholder
        $sql = "SELECT * FROM produto WHERE Nome_Prod LIKE '%$search%' OR Cod_Prod LIKE '%$search%'";
        $stmt = $this->connect->getConexao()->prepare($sql);
        $stmt->execute();
        $result = $stmt->get_result(); // Busca os resultados do select
        $listas = []; // Vetor pessoas
        while ($lista = $result->fetch_assoc()) { //Enquanto existir informações, retorna uma matriz onde armazena os registros 
            $listas[] = $lista; //Atribuição no vetor
        }
        return $listas; //Retorna o vetor
    }
}

?>