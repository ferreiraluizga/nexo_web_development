<?php
session_start();
ob_start();

if(isset($_SESSION['cod_func']) && isset($_SESSION['email']) && isset($_SESSION['nome'])){ 
$primeiroNome = explode(' ', $_SESSION['nome'])[0]; 
require_once('controller/connect.php'); 
$db = new Connect();
$connect = $db->getConexao();

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>NEXO: Ligando você ao que mais importa</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <link
        href="https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap"
        rel="stylesheet">
    <link rel="stylesheet" href="scss/main.css">
</head>


</head><body style="background-color: #F2F2F2;">
    <header class="sticky-top mb-0 d-xl-none">
        <nav class="navbar navbar-expand-lg bg-primary py-3 shadow-lg" data-bs-theme="dark">
            <div class="container align-items-center fw-semibold">
                <div class="navbar-nav col-4 d-none d-lg-flex justify-content-around align-items-center">
                    <a class="nav-link active" aria-current="page" href="dashboard.php">Produtos</a>
                    <a class="nav-link " aria-current="page" href="fornecedor.php">Fornecedores</a>
                </div>
                <div class="col-4 text-center">
                    <a class="navbar-brand" href="index.php">
                        <img src="img/header_logo.svg" alt="Logo" height="35" class="d-inline-block align-text-top">
                    </a>
                </div>
                <div class="navbar-nav col-4 d-none d-lg-flex justify-content-around align-items-center">
                    <a class="nav-link " aria-current="page" href="marca.php">Marcas</a>
                    <a class="nav-link " aria-current="page" href="categoira.php">Categorias</a>
                    <a href="#" class="d-flex align-items-center text-white text-decoration-none dropdown-toggle"
                        id="dropdownUser1" data-bs-toggle="dropdown" aria-expanded="false">
                        <?php echo '<img src = "data:image/jpeg;base64,'.base64_encode($_SESSION['img_func']).'"  width = "40px" height ="40px" class="rounded-circle me-2"/>'; ?>
                        <strong  class="nome"><?=$primeiroNome?></strong>
                    </a>
                    <ul class="dropdown-menu dropdown-menu-dark text-small shadow " width="30" height="30"
                        aria-labelledby="dropdownUser1">
                        <li><a class="dropdown-item" href="logperfil.php">Perfil</a></li>
                        <li>
                            <hr class="dropdown-divider">
                        </li>
                        <li><a class="dropdown-item" href="logout.php">Logout</a></li>
                    </ul>
                </div>
                <div class="dropdown navbar-toggler" style="margin-top: 1vw; margin-left: 4vw;" width="25" height="25">
                    <a href="#" class="d-flex align-items-center text-white text-decoration-none dropdown-toggle"
                        id="dropdownUser1" data-bs-toggle="dropdown" aria-expanded="false">
                        <?php echo '<img src = "data:image/jpeg;base64,'.base64_encode($_SESSION['img_func']).'"  width = "40px" height ="40px" class="rounded-circle me-2"/>'; ?>
                    </a>
                    <ul class="dropdown-menu dropdown-menu-dark text-small shadow " width="30" height="30"
                        aria-labelledby="dropdownUser1">
                        <li><a class="dropdown-item" href="logperfil.php">Perfil</a></li>
                        <li>
                            <hr class="dropdown-divider">
                        </li>
                        <li><a class="dropdown-item" href="logout.php">Logout</a></li>
                    </ul>
                </div>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
                    data-bs-target="#navbarCollapseContent" aria-controls="navbarCollapseContent" aria-expanded="false"
                    aria-label="Toggle navigation">
                    <i class="bi bi-list text-white fs-1" id="icon-menu"></i>
                </button>
                <div class="collapse mt-3" id="navbarCollapseContent">
                    <div class="navbar-nav col text-center text-sm-start">
                        <a class="nav-link active" aria-current="page" href="dashboard.php">Produtos</a>
                        <a class="nav-link " aria-current="page" href="fornecedor.php">Fornecedores</a>
                        <a class="nav-link" aria-current="page" href="marca.php">Marcas</a>
                        <a class="nav-link" aria-current="page" href="categoria.php">Categorias</a>
                    </div>
                </div>
            </div>
        </nav>
    </header>

    <div class="d-flex">
        <!-- Sidebar -->
        <div class="d-none d-xl-block">
            <aside class="d-flex flex-column text-white bg-primary flex-shrink-0 p-3 shadow-lg position-fixed"
                style="width: 15vw; height: 100vh;">
                <a class="navbar-brand text-center" href="#" style="margin-bottom: 1vw; margin-top: 1vw;">
                    <img src="img/header_logo.svg" alt="Logo" height="55" class="d-inline-block align-text-top">
                </a>
                <hr>
                <div class="dropdown" style="margin-top: 1vw; margin-left: 0.5vw;">
                    <a href="#" class="d-flex align-items-center text-white text-decoration-none dropdown-toggle"
                        id="dropdownUser1" data-bs-toggle="dropdown" aria-expanded="false">
                        <?php echo '<img src = "data:image/jpeg;base64,'.base64_encode($_SESSION['img_func']).'"  width = "40px" height ="40px" class="rounded-circle me-2"/>'; ?>
                        <strong  class="nome"><?=$primeiroNome?></strong>
                    </a>
                    <ul class="dropdown-menu dropdown-menu-dark text-small shadow" aria-labelledby="dropdownUser1">
                        <li><a class="dropdown-item" href="logperfil.php">Perfil</a></li>
                        <li>
                            <hr class="dropdown-divider">
                        </li>
                        <li><a class="dropdown-item" href="logout.php">Logout</a></li>
                    </ul>
                </div>
                <ul class="nav nav-pills flex-column mb-auto" style="margin-top: 1vw; ">
                    <li class="nav-item">
                        <a href="index.php" class="nav-link text-white">
                            <i class="bi bi-house-fill me-2"></i>
                            Home
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="#productsSubMenu" data-bs-toggle="collapse"
                            class="nav-link text-white dropdown-toggle">
                            <i class="bi bi-box-seam me-2"></i>
                            Produtos
                        </a>
                        <div class="collapse" id="productsSubMenu">
                            <ul class="btn-toggle-nav list-unstyled fw-normal pb-1 ps-4 small">
                                <li><a href="cadastrarproduto.php" class="nav-link text-white">Cadastrar Produto</a>
                                </li>
                                <li><a href="dashboard.php" class="nav-link text-white">Consultar Produtos</a></li>
                            </ul>
                        </div>
                    </li>
                    <li class="nav-item">
                        <a href="#fornSubMenu" data-bs-toggle="collapse" class="nav-link text-white dropdown-toggle">
                            <i class="bi bi-truck me-2"></i>
                            Fornecedores
                        </a>
                        <div class="collapse" id="fornSubMenu">
                            <ul class="btn-toggle-nav list-unstyled fw-normal pb-1 ps-4 small">
                                <li><a href="cadastrarfornecedor.php" class="nav-link text-white">Cadastrar Fornecedor</a></li>
                                <li><a href="fornecedor.php" class="nav-link text-white">Consultar Fornecedores</a></li>
                            </ul>
                        </div>
                    </li>
                    <li class="nav-item">
                        <a href="#brandsSubMenu" data-bs-toggle="collapse" class="nav-link text-white dropdown-toggle">
                            <i class="bi bi-tag-fill me-2"></i>
                            Marcas
                        </a>
                        <div class="collapse" id="brandsSubMenu">
                            <ul class="btn-toggle-nav list-unstyled fw-normal pb-1 ps-4 small">
                                <li><a href="cadastrarmarca.php" class="nav-link text-white">Cadastrar Marca</a></li>
                                <li><a href="marca.php" class="nav-link text-white">Consultar Marcas</a></li>
                            </ul>
                        </div>
                    </li>
                    <li class="nav-item">
                        <a href="#filtersSubMenu" data-bs-toggle="collapse" class="nav-link text-white dropdown-toggle">
                            <i class="bi bi-bookmark me-2"></i>
                            Categorias
                        </a>
                        <div class="collapse" id="filtersSubMenu">
                            <ul class="btn-toggle-nav list-unstyled fw-normal pb-1 ps-4 small">
                                <li><a href="cadastrarcategoria.php" class="nav-link text-white">Cadastrar Categoria</a></li>
                                <li><a href="categoria.php" class="nav-link text-white">Consultar Categorias</a></li>
                            </ul>
                        </div>
                    </li>
                </ul>
            </aside>
        </div>

        <div class="responsive-div p-4 w-100">
            
            <div class="container-fluid h-100 p-3 mb-2">
               
            <div class="card border-0">
               
                        <div class="card-body">
                        <br><br>
                        
                    <div class="row">
                                <div class="col">
                                <p class="fs-4" style="display:inline-block;">
                                
                                <strong><?=$_SESSION['nome']?></strong> </p>
                         <p class="fs-5">  
                             <strong>Cargo:</strong> <?=$_SESSION['nome_cargo']?> </p>
                             <p class="fs-6"><strong>Data de Nascimento:</strong> <?=$_SESSION['data_nasc']?> </p> 
                                </div>
                                <div class="col text-end">
                                <form method="POST" action="uploadimg.php" enctype="multipart/form-data" id="uploadForm">
    <input type="file" id="imgupload" name="imgupload" accept="image/*" style="display:none" onchange="this.form.submit()"/> 
    <button class="btn-imagem" id="avatar" name="avatar" title="Editar imagem" type="button" onclick="selectFile()">
        <?php echo '<img src="data:image/jpeg;base64,' . base64_encode($_SESSION['img_func']) . '" width="150px" height="150px" class="rounded-circle me-2"/>'; ?>  
    </button>
</form>

<script>
function selectFile() {
    const fileInput = document.getElementById('imgupload');
    fileInput.click(); 
}

document.getElementById('imgupload').addEventListener('change', function() {
    if (this.files.length > 0) {
        document.getElementById('uploadForm').submit(); 
    }
});
</script>
                                </div>
                              
                        </div>       
                        <p class="fs-5">Email:</p>
                                    <div class="input-group mb-3" name="email">
                                        <input type="text" class="form-control" name="email" value= "<?=$_SESSION['email']?>" disabled>
                                    </div>
                                    <br>      
                                    <form method="POST" action="editarperfil.php?acao=alterar">
                                    <p class="fs-5">Telefone:</p>
                                    <?php 
                                    $telefone = preg_replace('/\D/', '', $_SESSION['telefone']);
                                    $telefoneFormatado = preg_replace('/^(\d{2})(\d{5})(\d{4})$/', '($1) $2-$3', $telefone);
                                    ?>
                                    <div class="input-group mb-3" >
                                        <input type="text" class="form-control" name="telefone" id="telefone" <?php 
                                        if(isset($_GET['status']) && $_GET['status'] == 'confirmarsenha'){ 
                                            $telefoneFormatado = preg_replace('/^(\d{2})(\d{5})(\d{4})$/', '($1) $2-$3', $_SESSION['telefonenovo']);
                                            ?> value= "<?=$telefoneFormatado?>" <?php
                                        } else{ if($_SESSION['telefone'] != "") { ?> value= "<?=$telefoneFormatado?>" <?php }} ?> required>
                                    </div>
                                    <br> 
                                    <p class="fs-5">Senha:</p>
                                    <div class="input-group mb-3" name="senha">
                                        <input type="password" class="form-control" name="senha" <?php if(isset($_GET['status']) &&  $_GET['status'] == 'confirmarsenha') { ?> value= "<?=$_SESSION['senhanova']?>" <?php } ?>>
                                    </div>
                                    <br>      
                                    <?php
                                    if(isset($_GET['status']) && $_GET['status'] == 'confirmarsenha'){
                                    ?><p class="fs-5">Confirme com a sua senha:</p>
                                    <div class="input-group mb-3" name="senha_conf">
                                        <input type="password" class="form-control" name="senha_conf" placeholder="Senha atual" required>
                                    </div>
                                    <br>
                                    <?php   
                                    }
                                    ?>
                                    <div class="mb-3">
                                        <button class="btn btn-primary rounded-5 me-4 fw-light "
                                            type="submit">Salvar alterações</button>
                                    </div>
                                    </form>
                        </div>
                        </div>
                        <?php
                        
                        if(isset($_GET['acao']) && $_GET['acao'] == 'alterar'){
                        //Já tem telefone
                        $telefone = preg_replace('/\D/', '', $_POST['telefone']);
                        $_SESSION['senhanova'] = $_POST['senha'];
                        $_SESSION['telefonenovo'] = $telefone;

                        if(empty($_POST['senha'])){
                            if(strlen($telefone) === 11){
                                //Telefone valido
                                if(empty($_SESSION['telefone'])){
                                //Telefone não é existente 

                                $sql = "INSERT INTO fone_func (Fone_Func, Cod_Func) VALUES (?, ?)";
                                    $stmt = $connect->prepare($sql);
                                    $stmt->bind_param('si', $telefone, $_SESSION['cod_func']);
                                    $stmt->execute();
                                    $_SESSION['telefone'] = $telefone;
                                    header("location: logperfil.php?status=sucesso");
                                }else{
                                //Telefone já é existente
                                $sql = "UPDATE fone_func SET Fone_Func = ? WHERE Cod_Func = ?";
                                $stmt = $connect->prepare($sql);
                                $stmt->bind_param('si', $telefone, $_SESSION['cod_func']);
                                $stmt->execute();
                                $_SESSION['telefone'] = $telefone;
                                header("location: logperfil.php?status=sucesso");
                                }

                            }else{
                                header("location: logperfil.php?erro=telefone");
                            }
                        }
                        else{
                            if(preg_match('/\S/', $_POST['senha']) && $_POST['senha'] != $_SESSION['senha']){
                                //Telefone valido
                                header("location: editarperfil.php?status=confirmarsenha");
                                if($_POST['senha_conf'] == $_SESSION['senha']){
                                if(empty($telefone)){
                                    //Alterar só a senha
                                    $sql = "UPDATE funcionario SET Senha_Func = ? WHERE Cod_Func = ?"; //Declaração para o sql, de forma indefinida
                                    $stmt = $connect->prepare($sql); // stmt acessa conexão, realiza o método e utiliza o prepare
                                    $hash_senha = md5($_POST['senha']);
                                    $stmt->bind_param('si', $hash_senha, $_SESSION['cod_func']); //Define os parametros no caso do s, String
                                    $stmt->execute(); 
                                    $_SESSION['senha'] = $_POST['senha'];
                                    header("location: logperfil.php?status=sucesso");
                                }
                                else{
                                    if(strlen($telefone) === 11){
                                    if(empty($_SESSION['telefone'])){
                                    //Telefone não é existente 
                                    $sql = "INSERT INTO fone_func (Fone_Func, Cod_Func) VALUES (?, ?)";
                                    $stmt = $connect->prepare($sql);
                                    $stmt->bind_param('si', $telefone, $_SESSION['cod_func']);
                                    $stmt->execute();

                                    $sql = "UPDATE funcionario SET Senha_Func = ? WHERE Cod_Func = ?"; //Declaração para o sql, de forma indefinida
                                    $stmt = $connect->prepare($sql); // stmt acessa conexão, realiza o método e utiliza o prepare
                                    $hash_senha = md5($_POST['senha']);
                                    $stmt->bind_param('si', $hash_senha, $_SESSION['cod_func']); //Define os parametros no caso do s, String
                                    $stmt->execute(); 
                                    $_SESSION['telefone'] = $telefone;
                                    $_SESSION['senha'] = $_POST['senha'];
                                    header("location: logperfil.php?status=sucesso");
                                    }else{
                                    //Telefone já é existente
                                    $sql = "UPDATE funcionario SET Senha_Func = ? WHERE Cod_Func = ?"; //Declaração para o sql, de forma indefinida
                                    $stmt = $connect->prepare($sql); // stmt acessa conexão, realiza o método e utiliza o prepare
                                    $hash_senha = md5($_POST['senha']);
                                    $stmt->bind_param('si', $hash_senha, $_SESSION['cod_func']); //Define os parametros no caso do s, String
                                    $stmt->execute(); 

                                    $sql = "UPDATE fone_func SET Fone_Func = ? WHERE Cod_Func = ?";
                                    $stmt = $connect->prepare($sql);
                                    $stmt->bind_param('si', $telefone, $_SESSION['cod_func']);
                                    $stmt->execute();
                                    $_SESSION['telefone'] = $telefone;
                                    $_SESSION['senha'] = $_POST['senha'];
                                    header("location: logperfil.php?status=sucesso");
                                    }
                                    }
                                    else{
                                        $sql = "UPDATE funcionario SET Senha_Func = ? WHERE Cod_Func = ?"; //Declaração para o sql, de forma indefinida
                                        $stmt = $connect->prepare($sql); // stmt acessa conexão, realiza o método e utiliza o prepare
                                        $hash_senha = md5($_POST['senha']);
                                        $stmt->bind_param('si', $hash_senha, $_SESSION['cod_func']); //Define os parametros no caso do s, String
                                        $stmt->execute(); 
                                        $_SESSION['senha'] = $_POST['senha'];
                                        header("location: logperfil.php?status=sucesso&&erro=telefone");
                                    }
                                }
                            }}else{
                                //Senha invalida
                                if(strlen($telefone) === 11){
                                    if(empty($_SESSION['telefone'])){
                                    //Criar telefone
                                    $sql = "INSERT INTO fone_func (Fone_Func, Cod_Func) VALUES (?, ?)";
                                    $stmt = $connect->prepare($sql);
                                    $stmt->bind_param('si', $telefone, $_SESSION['cod_func']);
                                    $stmt->execute();
                                    $_SESSION['telefone'] = $telefone;
                                    header("location: logperfil.php?status=sucesso&&erro=senha");
                                    }else{
                                    //Alterar telefone
                                    if($_SESSION['telefonenovo'] == $_SESSION['telefone']){//nada foi alterado
                                        header("location: logperfil.php?erro=senha");
                                    }else{
                                    //Update telefone
                                    $sql = "UPDATE fone_func SET Fone_Func = ? WHERE Cod_Func = ?";
                                    $stmt = $connect->prepare($sql);
                                    $stmt->bind_param('si', $telefone, $_SESSION['cod_func']);
                                    $stmt->execute();
                                    $_SESSION['telefone'] = $telefone;
                                    header("location: logperfil.php?status=sucesso&&erro=senha");
                                    }
                                    }
                                }
                                else{
                                    header("location: logperfil.php?status=erro");
                                }
                            }
                        }
                        
                    }
                        ?>
                    </div>
                </div>
                <script src="../node_modules/@popperjs/core/dist/umd/popper.js"></script>
                    <script src="../node_modules/bootstrap/dist/js/bootstrap.js"></script>
                    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
                    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.mask/1.14.16/jquery.mask.min.js"></script>

                    
                    <script>
                       $(document).ready(function(){
                        $(document).ready(function(){
                            $('#cep').mask('00000-000');
                            $('#telefone').mask('(00) 00000-0000');
                            $('#celular').mask('00000-0000');
                            $('#cpf').mask('000.000.000-00', {reverse: true});
                            $('#rg').mask('00.000.000-00', {reverse: true});
                        });
                        });
                    </script>
                <script>
                    $(document).ready(function () {
                        $('[data-bs-toggle="collapse"]').on('click', function () {
                            var targetId = $(this).attr('href');
                            var $target = $(targetId);
                            if ($target.hasClass('show')) {
                                return;
                            }
                            $('[data-bs-toggle="collapse"]').each(function () {
                                var otherTargetId = $(this).attr('href');
                                var $otherTarget = $(otherTargetId);

                                if ($otherTarget.hasClass('show')) {
                                    var bsCollapse = new bootstrap.Collapse($otherTarget[0], {
                                        toggle: false
                                    });
                                    bsCollapse.hide();
                                }
                            });
                            var bsCollapse = new bootstrap.Collapse($target[0], {
                                toggle: true
                            });
                        });
                    });
                </script>
            </div>
        </div>
    </div>
</body>
</html> <?php ob_end_flush(); 
 } else {
    ?>
    <!DOCTYPE html>
    <html lang="en">

    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width,initial-scale=1.0">
        <title>NEXO: Ligando você ao que mais importa</title>
        <link rel="preconnect" href="https://fonts.googleapis.com">
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
        <link
            href="https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap"
            rel="stylesheet">
        <link rel="stylesheet" href="scss/main.css">
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
            integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    </head>

    <body>
        <div class="container d-flex  
         align-items-center  
         justify-content-center  
         min-vh-100">
            Apenas funcionários podem acessar! <a href="index.php" style="margin-left: 0.2vw;"><strong>Voltar para home</strong></a></h1>
            <br>
        </div>
    </body>

    </html>

    <?php
} ?>
  ?>
 