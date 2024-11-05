<?php

require_once $_SERVER['DOCUMENT_ROOT'] . '/nexo/src/model/marca.php'; //Importação única do arquivo, se existente


class MarcaController{ // Classe públic 
    private $marca; // Variavel pessoa indefinida
    
    public function __construct(){ //Método construtor
        $this->marca = new marca(); //Acessando pelo this, com instância
        if(isset($_GET['acao'])){ //Get definido pela url caso seja igual a inserir efetua o método inserir
         if($_GET['acao'] == 'inserir'){
        $this->inserir();
        header('Location: ../marca.php');
        }}
        if(isset($_GET['acao'])){
         if($_GET['acao'] == 'atualizar'){ //Get definido pela url caso seja igual a atualizar efetua o método editar
            $this->atualizar($_GET['Cod_Marca']);
            header('Location: ../marca.php');
        }}
      
    }

    public function inserir(){ //Metódo insirir acessa pelo this, instância e definine os parâmetros
        $this->marca->setnome_marca($_POST['nome_marca']); 
        $this->marca->inserir(); 
    }

    public function buscar($search) {
        return $this->marca->buscar($search);
    }
    

    public function listar() {
        return $this->marca->listar();
    }
    
    public function buscarPorCod_Marca($Cod_Marca){ 
        return $this->marca->buscarPorCod_Marca($Cod_Marca); //Retorna o id por meio do método
    }

    public function atualizar($Cod_Marca){
        $this->marca->setnome_marca($_POST['nome_marca']); 

        $this->marca->atualizar($Cod_Marca);

    }

    
}
new MarcaController(); // Instância
?>