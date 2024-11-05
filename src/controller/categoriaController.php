<?php

require_once $_SERVER['DOCUMENT_ROOT'] . '/nexo/src/model/categoria.php'; //Importação única do arquivo, se existente


class CategoriaController{ // Classe públic 
    private $categoria; // Variavel pessoa indefinida
    
    public function __construct(){ //Método construtor
        $this->categoria = new categoria(); //Acessando pelo this, com instância
        if(isset($_GET['acao'])){ //Get definido pela url caso seja igual a inserir efetua o método inserir
         if($_GET['acao'] == 'inserir'){
        $this->inserir();
        header('Location: ../categoria.php');
        }}
        if(isset($_GET['acao'])){
         if($_GET['acao'] == 'atualizar'){ //Get definido pela url caso seja igual a atualizar efetua o método editar
            $this->atualizar($_GET['Cod_Categoria']);
            header('Location: ../categoria.php');
        }}
      
    }

    public function inserir(){ //Metódo insirir acessa pelo this, instância e definine os parâmetros
        $this->categoria->setnome_categoria($_POST['nome_categoria']); 
        $this->categoria->setdesc_categoria($_POST['desc_categoria']); 
        $this->categoria->inserir(); 
    }

    public function buscar($search) {
        return $this->categoria->buscar($search);
    }
    

    public function listar() {
        return $this->categoria->listar();
    }
    
    public function buscarPorCod_Categoria($Cod_Categoria){ 
        return $this->categoria->buscarPorCod_Categoria($Cod_Categoria); //Retorna o id por meio do método
    }

    public function atualizar($Cod_Categoria){
        $this->categoria->setnome_categoria($_POST['nome_categoria']); 
        $this->categoria->setdesc_categoria($_POST['desc_categoria']); 
        $this->categoria->atualizar($Cod_Categoria);

    }

    
}
new CategoriaController(); // Instância
?>