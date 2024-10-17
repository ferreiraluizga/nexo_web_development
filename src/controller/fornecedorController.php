<?php

require_once $_SERVER['DOCUMENT_ROOT'] . '/nexo/model/fornecedor.php'; //Importação única do arquivo, se existente


class FornecedorController{ // Classe públic 
    private $fornecedor; // Variavel pessoa indefinida
    
    public function __construct(){ //Método construtor
        $this->fornecedor = new fornecedor(); //Acessando pelo this, com instância
        if(isset($_GET['acao'])){ //Get definido pela url caso seja igual a inserir efetua o método inserir
         if($_GET['acao'] == 'inserir'){
        $this->inserir();
        header('Location: ../fornecedor.php');
        }}
        if(isset($_GET['acao'])){
         if($_GET['acao'] == 'atualizar'){ //Get definido pela url caso seja igual a atualizar efetua o método editar
            $this->atualizar($_GET['Cod_Forn']);
            header('Location: ../fornecedor.php');
        }}
      
    }

    public function inserir(){ //Metódo insirir acessa pelo this, instância e definine os parâmetros
        $this->fornecedor->setnome_fantasia($_POST['nome_fantasia']); //Seta as variaveis e pegam o input do formulário de acordo com o nome
        $this->fornecedor->setcnpj_forn($_POST['cnpj_forn']);
        $this->fornecedor->setfone_forn($_POST['fone_forn']);
        $this->fornecedor->setemail_forn($_POST['email_forn']);
        $this->fornecedor->setnome_resp($_POST['nome_resp']);
        $this->fornecedor->inserir(); 
    }

    public function buscar($search) {
        return $this->fornecedor->buscar($search);
    }
    

    public function listar() {
        return $this->fornecedor->listar();
    }
    
    public function buscarPorCod_Forn($Cod_Forn){ 
        return $this->fornecedor->buscarPorCod_Forn($Cod_Forn); //Retorna o id por meio do método
    }

    public function atualizar($Cod_Forn){
        $this->fornecedor->setnome_fantasia($_POST['nome_fantasia']); //Seta as variaveis e pegam o input do formulário de acordo com o nome
        $this->fornecedor->setcnpj_forn($_POST['cnpj_forn']);
        $this->fornecedor->setfone_forn($_POST['fone_forn']);
        $this->fornecedor->setemail_forn($_POST['email_forn']);
        $this->fornecedor->setnome_resp($_POST['nome_resp']);

        $this->fornecedor->atualizar($Cod_Forn);

    }

    
}
new FornecedorController(); // Instância
?>