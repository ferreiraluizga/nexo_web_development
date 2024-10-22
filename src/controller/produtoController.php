<?php

require_once $_SERVER['DOCUMENT_ROOT'] . '/nexo/src/model/produto.php'; //Importação única do arquivo, se existente


class ProdutoController{ // Classe públic 
    private $produto; // Variavel pessoa indefinida
    
    public function __construct(){ //Método construtor
        $this->produto = new produto(); //Acessando pelo this, com instância
        if(isset($_GET['acao'])){ //Get definido pela url caso seja igual a inserir efetua o método inserir
         if($_GET['acao'] == 'inserir'){
        if(!empty($_POST['cod_forn']) && !empty($_POST['cod_marca']) && !empty($_POST['cod_categoria'])){
        $this->inserir();
        $this->categoria();
        $this->marca();
        $this->fornecedor();
        header('Location: ../dashboard.php');
        }
        else{
            header('Location: ../cadastrarproduto.php?erro=select');
        }
        }
        }
        if(isset($_GET['acao'])){
         if($_GET['acao'] == 'atualizar'){ //Get definido pela url caso seja igual a atualizar efetua o método editar
            $this->atualizar($_GET['Cod_Prod']);
            header('Location: ../dashboard.php');
        }}
        if(isset($_GET['acao'])){
         if($_GET['acao'] == 'excluir'){
            $this->excluir($_GET['Cod_Prod']);
            header('Location: ../dashboard.php');
        }}
      
    }

    public function inserir(){ //Metódo insirir acessa pelo this, instância e definine os parâmetros
        if (isset($_POST['cod_categoria']) && !empty($_POST['cod_categoria'])) {
            $codCategoria = $_POST['cod_categoria'];
        } else {
            echo "Nenhuma categoria selecionada.";
        }
        if (isset($_POST['cod_marca']) && !empty($_POST['cod_marca'])) {
            $cod_marca = $_POST['cod_marca'];
        } else {
            echo "Nenhuma categoria selecionada.";
        }
        if (isset($_POST['cod_forn']) && !empty($_POST['cod_forn'])) {
            $cod_forn = $_POST['cod_forn'];
        } else {
            echo "Nenhuma categoria selecionada.";
        }
        $this->produto->setNome_Prod($_POST['nome_prod']); //Seta as variaveis e pegam o input do formulário de acordo com o nome
        $comma = ',';
        if(strpos($_POST['preco'], $comma) !== false){
        $this->produto->setPreco_Prod((double)str_replace(',', '.', $_POST['preco']));
        }
        else{
        $this->produto->setPreco_Prod((double)$_POST['preco']);
        }
        $this->produto->setQuant_Estoque((int)$_POST['quantidade_prod']);
        $this->produto->setCod_Forn( (int)$cod_forn);
        $this->produto->setCod_Marca( (int) $cod_marca);
        $this->produto->setCod_Categoria( (int) $codCategoria);
        $this->produto->inserir(); 
    }

    public function buscar($search) {
        return $this->produto->buscar($search);
    }
    

    public function listar() {
        return $this->produto->listar();
    }
    

    public function categoria(){ //Método listar
        return $this->produto->categoria(); //Retorna o registro para o banco de dados
    }

    public function marca(){ //Método listar
        return $this->produto->marca(); //Retorna o registro para o banco de dados
    }

    public function fornecedor(){ //Método listar
        return $this->produto->fornecedor(); //Retorna o registro para o banco de dados
    }

    public function buscarPorCod_Prod($Cod_Prod){ 
        return $this->produto->buscarPorCod_Prod($Cod_Prod); //Retorna o id por meio do método
    }

    public function buscarPorCod_Forn($Cod_Forn){ 
        return $this->produto->buscarPorCod_Forn($Cod_Forn); //Retorna o id por meio do método
    }

    public function buscarPorCod_Marca($Cod_Marca){ 
        return $this->produto->buscarPorCod_Marca($Cod_Marca); //Retorna o id por meio do método
    }

    public function buscarPorCod_Categoria($Cod_Categoria){ 
        return $this->produto->buscarPorCod_Categoria($Cod_Categoria); //Retorna o id por meio do método
    }

    public function atualizar($Cod_Prod){
        if (isset($_POST['cod_categoria']) && !empty($_POST['cod_categoria'])) {
            $codCategoria = $_POST['cod_categoria'];
        } else {
            echo "Nenhuma categoria selecionada.";
        }
        if (isset($_POST['cod_marca']) && !empty($_POST['cod_marca'])) {
            $cod_marca = $_POST['cod_marca'];
        } else {
            echo "Nenhuma categoria selecionada.";
        }
        if (isset($_POST['cod_forn']) && !empty($_POST['cod_forn'])) {
            $cod_forn = $_POST['cod_forn'];
        } else {
            echo "Nenhuma categoria selecionada.";
        }
        $this->produto->setNome_Prod($_POST['nome_prod']); //Seta as variaveis e pegam o input do formulário de acordo com o nome
        $comma = ',';
        if(strpos($_POST['preco'], $comma) !== false){
        $this->produto->setPreco_Prod((double)str_replace(',', '.', $_POST['preco']));
        }
        else{
        $this->produto->setPreco_Prod((double)$_POST['preco']);
        }
        $this->produto->setQuant_Estoque((int)$_POST['quantidade_prod']);
        $this->produto->setCod_Forn( (int)$cod_forn);
        $this->produto->setCod_Marca( (int) $cod_marca);
        $this->produto->setCod_Categoria( (int) $codCategoria);

        $this->produto->atualizar($Cod_Prod);

    }

    public function excluir($Cod_Prod){
        $this->produto->excluir($Cod_Prod);
    }
    
}
new ProdutoController(); // Instância
?>