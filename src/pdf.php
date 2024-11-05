<?php
require_once $_SERVER['DOCUMENT_ROOT'] . '/nexo/vendor/fpdf186/fpdf.php';
require_once $_SERVER['DOCUMENT_ROOT'] . '/nexo/src/controller/produtoController.php';
require_once $_SERVER['DOCUMENT_ROOT'] . '/nexo/src/controller/categoriaController.php'; //Importação única do arquivo, se existente
require_once $_SERVER['DOCUMENT_ROOT'] . '/nexo/src/controller/fornecedorController.php';
require_once $_SERVER['DOCUMENT_ROOT'] . '/nexo/src/controller/marcaController.php'; //Importação única do arquivo, se existente
//Importação única do arquivo, se existente
if (isset($_GET['pdf']) && $_GET['pdf'] == 'produtos') {
    $pdf = new FPDF();
    $pdf->AddPage();
    $pdf->SetFont('Arial', 'B', 16);
    $pdf->Cell(0, 20, 'Estoque de Produtos', 0, 1, 'C');
    $pdf->Ln(10); // Adiciona um espaço entre o título e o conteúdo
    $pdf->Image('img/nexo_logo.png', 10, 10, 50); // Exemplo: imagem no canto superior esquerdo
    $pdf->SetFont('Arial', 'B', 13);
    $pdf->Cell(20, 10, iconv('UTF-8', 'ISO-8859-1', 'Código'), 'C');
    $pdf->Cell(30, 10, iconv('UTF-8', 'ISO-8859-1', 'Nome'), 'C');
    $pdf->Cell(25, 10, iconv('UTF-8', 'ISO-8859-1', 'Preço'), 'C');
    $pdf->Cell(30, 10, iconv('UTF-8', 'ISO-8859-1', 'Quantidade'), 'C');
    $pdf->Cell(30, 10, iconv('UTF-8', 'ISO-8859-1', 'Categoria'), 'C');
    $pdf->Cell(30, 10, iconv('UTF-8', 'ISO-8859-1', 'Marca'), 'C');
    $pdf->Cell(30, 10, iconv('UTF-8', 'ISO-8859-1', 'Fornecedor'), 'C');
    $pdf->Ln();

    // Dados dos produtos
    $pdf->SetFont('Arial', '', 12);
    $pdf->SetWidths(array(20, 30, 25, 30, 30, 30, 30));
    $pdf->SetBorders(array('T', 'T', 'T', 'T', 'T', 'T', 'T'));
    if (isset($_GET['search'])) {
        $search = $_GET['search'];
        $produtoController = new ProdutoController();
        $listas = $produtoController->buscar($search);
        $categorias = $produtoController->categoria();
        $categoriaMap = [];
        $marcas = $produtoController->marca();
        $marcaMap = [];
        $fornecedores = $produtoController->fornecedor();
        $fornecedorMap = [];
        foreach ($categorias as $categoria) {
            $categoriaMap[$categoria['Cod_Categoria']] = $categoria['Nome_Categoria'];
        }
        foreach ($marcas as $marca) {
            $marcaMap[$marca['Cod_Marca']] = $marca['Nome_Marca'];
        }
        foreach ($fornecedores as $fornecedor) {
            $fornecedorMap[$fornecedor['Cod_Forn']] = $fornecedor['Nome_Fantasia'];
        }
        foreach ($listas as $lista) {
            $categoriaNome = $categoriaMap[$lista['Cod_Categoria']];
            $codProd = iconv('UTF-8', 'ISO-8859-1', htmlspecialchars($lista['Cod_Prod']));
            $nomeProd = iconv('UTF-8', 'ISO-8859-1', htmlspecialchars($lista['Nome_Prod']));
            $precoProd = iconv('UTF-8', 'ISO-8859-1', htmlspecialchars($lista['Preco_Prod']));
            $quantEstoque = iconv('UTF-8', 'ISO-8859-1', htmlspecialchars($lista['Quant_Estoque']));
            $categoriaNome = iconv('UTF-8', 'ISO-8859-1', $categoriaMap[$lista['Cod_Categoria']]);
            $marcaNome = iconv('UTF-8', 'ISO-8859-1', $marcaMap[$lista['Cod_Marca']]);
            $fornecedorNome = iconv('UTF-8', 'ISO-8859-1', $fornecedorMap[$lista['Cod_Forn']]);

            $pdf->Row(array($codProd, $nomeProd, $precoProd, $quantEstoque, $categoriaNome, $marcaNome, $fornecedorNome), 'T');
        }
    } else {
        $produtoController = new ProdutoController();
        $produtos = $produtoController->listar();
        $categorias = $produtoController->categoria();
        $categoriaMap = [];
        $marcas = $produtoController->marca();
        $marcaMap = [];
        $fornecedores = $produtoController->fornecedor();
        $fornecedorMap = [];

        foreach ($categorias as $categoria) {
            $categoriaMap[$categoria['Cod_Categoria']] = $categoria['Nome_Categoria'];
        }
        foreach ($marcas as $marca) {
            $marcaMap[$marca['Cod_Marca']] = $marca['Nome_Marca'];
        }
        foreach ($fornecedores as $fornecedor) {
            $fornecedorMap[$fornecedor['Cod_Forn']] = $fornecedor['Nome_Fantasia'];
        }

        foreach ($produtos as $produto) {
            $codProd = iconv('UTF-8', 'ISO-8859-1', htmlspecialchars($produto['Cod_Prod']));
            $nomeProd = iconv('UTF-8', 'ISO-8859-1', htmlspecialchars($produto['Nome_Prod']));
            $precoProd = iconv('UTF-8', 'ISO-8859-1', htmlspecialchars($produto['Preco_Prod']));
            $quantEstoque = iconv('UTF-8', 'ISO-8859-1', htmlspecialchars($produto['Quant_Estoque']));
            $categoriaNome = iconv('UTF-8', 'ISO-8859-1', $categoriaMap[$produto['Cod_Categoria']]);
            $marcaNome = iconv('UTF-8', 'ISO-8859-1', $marcaMap[$produto['Cod_Marca']]);
            $fornecedorNome = iconv('UTF-8', 'ISO-8859-1', $fornecedorMap[$produto['Cod_Forn']]);

            // Adiciona uma nova linha
            $pdf->Row(array($codProd, $nomeProd, $precoProd, $quantEstoque, $categoriaNome, $marcaNome, $fornecedorNome), 'T');
        }
    }

    // Avança para a próxima linha
    $pdf->Row(array('', '', '', '', '', '', ''), 'T');
    $pdf->SetTitle("Estoque", true);
    $pdf->Output();
} else if (isset($_GET['pdf']) && $_GET['pdf'] == 'fornecedor') {

    $pdf = new FPDF();
    $pdf->AddPage();
    $pdf->SetFont('Arial', 'B', 16);
    $pdf->Cell(0, 20, 'Fornecedores', 0, 1, 'C');
    $pdf->Ln(10); // Adiciona um espaço entre o título e o conteúdo
    $pdf->Image('img/nexo_logo.png', 10, 10, 50); // Exemplo: imagem no canto superior esquerdo
    $pdf->SetFont('Arial', 'B', 13);
    $pdf->Cell(20, 10, iconv('UTF-8', 'ISO-8859-1', 'Código'), 'C');
    $pdf->Cell(30, 10, iconv('UTF-8', 'ISO-8859-1', 'Nome'), 'C');
    $pdf->Cell(25, 10, iconv('UTF-8', 'ISO-8859-1', 'CNPJ'), 'C');
    $pdf->Cell(30, 10, iconv('UTF-8', 'ISO-8859-1', 'Telefone'), 'C');
    $pdf->Cell(50, 10, iconv('UTF-8', 'ISO-8859-1', 'Email'), 'C');
    $pdf->Cell(40, 10, iconv('UTF-8', 'ISO-8859-1', 'Responsável'), 'C');
    $pdf->Ln();

    // Dados dos produtos
    $pdf->SetFont('Arial', '', 12);
    $pdf->SetWidths(array(20, 30, 25, 30, 50, 40));
    $pdf->SetBorders(array('T', 'T', 'T', 'T', 'T', 'T'));
    if (isset($_GET['search'])) {
        $search = $_GET['search'];
        $fornecedorController = new FornecedorController();
        $listas = $fornecedorController->buscar($search);
        foreach ($listas as $lista) {
            $codFunc = iconv('UTF-8', 'ISO-8859-1', htmlspecialchars($lista['Cod_Forn']));
            $nomeFunc = iconv('UTF-8', 'ISO-8859-1', htmlspecialchars($lista['Nome_Fantasia']));
            $cnpjFunc = iconv('UTF-8', 'ISO-8859-1', htmlspecialchars($lista['CNPJ_Forn']));
            $telefoneFunc = iconv('UTF-8', 'ISO-8859-1', htmlspecialchars($lista['Fone_Forn']));
            $emailFunc = iconv('UTF-8', 'ISO-8859-1', htmlspecialchars($lista['Email_Forn']));
            $nomeresp = iconv('UTF-8', 'ISO-8859-1', htmlspecialchars($lista['Nome_Resp']));

            // Adiciona uma nova linha
            $pdf->Row(array($codFunc, $nomeFunc, $cnpjFunc, $telefoneFunc, $emailFunc, $nomeresp), 'T');
        }
    } else {
        $fornecedorController = new FornecedorController();
        $fornecedores = $fornecedorController->listar();

        foreach ($fornecedores as $fornecedor) {
            $codFunc = iconv('UTF-8', 'ISO-8859-1', htmlspecialchars($fornecedor['Cod_Forn']));
            $nomeFunc = iconv('UTF-8', 'ISO-8859-1', htmlspecialchars($fornecedor['Nome_Fantasia']));
            $cnpjFunc = iconv('UTF-8', 'ISO-8859-1', htmlspecialchars($fornecedor['CNPJ_Forn']));
            $telefoneFunc = iconv('UTF-8', 'ISO-8859-1', htmlspecialchars($fornecedor['Fone_Forn']));
            $emailFunc = iconv('UTF-8', 'ISO-8859-1', htmlspecialchars($fornecedor['Email_Forn']));
            $nomeresp = iconv('UTF-8', 'ISO-8859-1', htmlspecialchars($fornecedor['Nome_Resp']));

            // Adiciona uma nova linha
            $pdf->Row(array($codFunc, $nomeFunc, $cnpjFunc, $telefoneFunc, $emailFunc, $nomeresp), 'T');
        }
    }

    // Avança para a próxima linha
    $pdf->Row(array('', '', '', '', '', ''), 'T');
    $pdf->SetTitle("Fornecedores", true);
    $pdf->Output();
} else if (isset($_GET['pdf']) && $_GET['pdf'] == 'categoria') {

    $pdf = new FPDF();
    $pdf->AddPage();
    $pdf->SetFont('Arial', 'B', 16);
    $pdf->Cell(0, 20, 'Categorias', 0, 1, 'C');
    $pdf->Ln(10); // Adiciona um espaço entre o título e o conteúdo
    $pdf->Image('img/nexo_logo.png', 10, 10, 50); // Exemplo: imagem no canto superior esquerdo
    $pdf->SetFont('Arial', 'B', 13);
    $pdf->Cell(20, 10, iconv('UTF-8', 'ISO-8859-1', 'Código'), 'C');
    $pdf->Cell(75, 10, iconv('UTF-8', 'ISO-8859-1', 'Nome'), 'C');
    $pdf->Cell(100, 10, iconv('UTF-8', 'ISO-8859-1', 'Descrição'), 'C');
    $pdf->Ln();

    // Dados dos produtos
    $pdf->SetFont('Arial', '', 12);
    $pdf->SetWidths(array(20, 75, 100));
    $pdf->SetBorders(array('T', 'T', 'T'));
    if (isset($_GET['search'])) {
        $search = $_GET['search'];
        $categoriaController = new CategoriaController();
        $listas = $categoriaController->buscar($search);
        foreach ($listas as $lista) {
            $codCategoria = iconv('UTF-8', 'ISO-8859-1', htmlspecialchars($lista['Cod_Categoria']));
            $nomeCategoria = iconv('UTF-8', 'ISO-8859-1', htmlspecialchars($lista['Nome_Categoria']));
            $descCategorias = iconv('UTF-8', 'ISO-8859-1', htmlspecialchars($lista['Desc_Categoria']));

            $pdf->Row(array($codCategoria, $nomeCategoria, $descCategorias), 'T');
        }
    } else {
        $categoriaController = new CategoriaController();
        $categorias = $categoriaController->listar();

        foreach ($categorias as $categoria) {
            $codCategoria = iconv('UTF-8', 'ISO-8859-1', htmlspecialchars($categoria['Cod_Categoria']));
            $nomeCategoria = iconv('UTF-8', 'ISO-8859-1', htmlspecialchars($categoria['Nome_Categoria']));
            $descCategorias = iconv('UTF-8', 'ISO-8859-1', htmlspecialchars($categoria['Desc_Categoria']));

            $pdf->Row(array($codCategoria, $nomeCategoria, $descCategorias), 'T');
        }
    }

    // Avança para a próxima linha
    $pdf->Row(array('', '', ''), 'T');
    $pdf->SetTitle("Categorias", true);
    $pdf->Output();

} else if (isset($_GET['pdf']) && $_GET['pdf'] == 'marca') {


    $pdf = new FPDF();
    $pdf->AddPage();
    $pdf->SetFont('Arial', 'B', 16);
    $pdf->Cell(0, 20, 'Marcas', 0, 1, 'C');
    $pdf->Ln(10); // Adiciona um espaço entre o título e o conteúdo
    $pdf->Image('img/nexo_logo.png', 10, 10, 50); // Exemplo: imagem no canto superior esquerdo
    $pdf->SetFont('Arial', 'B', 13);
    $pdf->Cell(20, 10, iconv('UTF-8', 'ISO-8859-1', 'Código'), 'C');
    $pdf->Cell(75, 10, iconv('UTF-8', 'ISO-8859-1', 'Nome'), 'C');
    $pdf->Ln();

    // Dados dos produtos
    $pdf->SetFont('Arial', '', 12);
    $pdf->SetWidths(array(20, 175));
    $pdf->SetBorders(array('T', 'T'));
    if (isset($_GET['search'])) {
        $search = $_GET['search'];
        $marcaController = new MarcaController();
        $listas = $marcaController->buscar($search);
        foreach ($listas as $lista) {
            $codMarca = iconv('UTF-8', 'ISO-8859-1', htmlspecialchars($lista['Cod_Marca']));
            $nomeMarca = iconv('UTF-8', 'ISO-8859-1', htmlspecialchars($lista['Nome_Marca']));

            $pdf->Row(array($codMarca, $nomeMarca), 'T');
        }
    } else {
        $marcaController = new MarcaController();
        $marcas = $marcaController->listar();

        foreach ($marcas as $marca) {
            $codMarca = iconv('UTF-8', 'ISO-8859-1', htmlspecialchars($marca['Cod_Marca']));
            $nomeMarca = iconv('UTF-8', 'ISO-8859-1', htmlspecialchars($marca['Nome_Marca']));

            $pdf->Row(array($codMarca, $nomeMarca), 'T');
        }
    }

    // Avança para a próxima linha
    $pdf->Row(array('', ''), 'T');
    $pdf->SetTitle("Marcas", true);
    $pdf->Output();
}

?>