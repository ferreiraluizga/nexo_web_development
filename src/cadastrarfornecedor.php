<?php
require_once $_SERVER['DOCUMENT_ROOT'] . '/nexo/controller/fornecedorController.php'; //Importação única do arquivo, se existente

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>NEXO: Ligando você ao que mais importa</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
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
                    <a class="nav-link" aria-current="page" href="dashboard.php">Produtos</a>
                    <a class="nav-link active" aria-current="page" href="fornecedor.php">Fornecedores</a>
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
                        <img src="https://via.placeholder.com/40" alt="profile" width="40" height="40"
                            class="rounded-circle me-2">
                        <strong>User</strong>
                    </a>
                    <ul class="dropdown-menu dropdown-menu-dark text-small shadow " width="30" height="30"
                        aria-labelledby="dropdownUser1">
                        <li><a class="dropdown-item" href="#">Configurações</a></li>
                        <li><a class="dropdown-item" href="#">Perfil</a></li>
                        <li>
                            <hr class="dropdown-divider">
                        </li>
                        <li><a class="dropdown-item" href="#">Logout</a></li>
                    </ul>
                </div>
                <div class="dropdown navbar-toggler" style="margin-top: 1vw; margin-left: 10vw;" width="30" height="30">
                    <a href="#" class="d-flex align-items-center text-white text-decoration-none dropdown-toggle"
                        id="dropdownUser1" data-bs-toggle="dropdown" aria-expanded="false">
                        <img src="https://via.placeholder.com/40" alt="profile" width="40" height="40"
                            class="rounded-circle me-2">
                        <strong style="font-size: 0.8rem">User</strong>
                    </a>
                    <ul class="dropdown-menu dropdown-menu-dark text-small shadow " width="30" height="30"
                        aria-labelledby="dropdownUser1">
                        <li><a class="dropdown-item" href="#">Configurações</a></li>
                        <li><a class="dropdown-item" href="#">Perfil</a></li>
                        <li>
                            <hr class="dropdown-divider">
                        </li>
                        <li><a class="dropdown-item" href="#">Logout</a></li>
                    </ul>
                </div>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
                    data-bs-target="#navbarCollapseContent" aria-controls="navbarCollapseContent" aria-expanded="false"
                    aria-label="Toggle navigation">
                    <i class="bi bi-list text-white fs-1" id="icon-menu"></i>
                    <i class="bi bi-x text-white fs-1" id="icon-close"></i>
                </button>
                <div class="collapse mt-3" id="navbarCollapseContent">
                    <div class="navbar-nav col text-center text-sm-start">
                        <a class="nav-link" aria-current="page" href="dashboard.php">Produtos</a>
                        <a class="nav-link active" aria-current="page" href="fornecedor.php">Fornecedores</a>
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
                        <img src="https://via.placeholder.com/40" alt="profile" width="40" height="40"
                            class="rounded-circle me-2">
                        <strong>User</strong>
                    </a>
                    <ul class="dropdown-menu dropdown-menu-dark text-small shadow" aria-labelledby="dropdownUser1">
                        <li><a class="dropdown-item" href="#">Configurações</a></li>
                        <li><a class="dropdown-item" href="#">Perfil</a></li>
                        <li>
                            <hr class="dropdown-divider">
                        </li>
                        <li><a class="dropdown-item" href="#">Logout</a></li>
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



        <!-- Content -->

        <div class="responsive-div p-4 w-100">
            <div class="row mb-3" style="margin-left: 0.2vw; margin-top: 0.8vw;">
                <form class="d-flex" role="search" method="GET" action="fornecedor.php">
                    <div class="input-group col-12 col-md-8 col-lg-6" style="min-width: 250px; max-width: 800px">
                        <input type="search" name="search" class="form-control" placeholder="<?php if (isset($_GET['search'])) {
                            echo $_GET['search'];
                        } else { ?>Digite o nome do fornecedor <?php } ?>" aria-label="search" aria-describedby="search"
                            id="search">
                        <button class="btn btn-primary" type="submit">
                            <i class="bi bi-search"></i>
                        </button>
                    </div>
                </form>
            </div>

            <div class="container-fluid h-100 p-3">
                <div class="card border-0">
                    <div class="card-header">
                        <br>
                        <div class="row">
                            <div class="col" style="text-align: start;">
                                <h3 class="card-title">Fornecedores</h3>
                            </div>
                            <div class="col" style="text-align: end;">
                                <a button class="btn btn-primary rounded-3 me-4 fw-light opacity-75" type="button"
                                    href="fornecedor.php">Voltar</button></a>
                            </div>
                        </div>
                        <br>
                    </div>
                    <!-- aqui coloca o conteúdo dos cards :) -->
                    <div class="card-body">
                        <div class="row">
                            <div class="col">
                                <br>
                                <form method="POST" action="controller/fornecedorController.php?acao=inserir">
                                    <!-- Endereço de onde os dados são enviados  -->
                                    <p class="fs-5">Nome Fantasia:</p>
                                    <div class="input-group mb-3" name="nome_fantasia">
                                        <input type="text" class="form-control" name="nome_fantasia">
                                    </div>
                                    <br>
                                    <p class="fs-5">Cnpj:</p>
                                    <div class="input-group mb-3" name="cnpj_forn">
                                        <input type="text" class="form-control" name="cnpj_forn">
                                    </div>
                                    <br>
                                    <p class="fs-5">Telefone:</p>
                                    <div class="input-group mb-3" name="fone_forn">
                                        <input type="text" class="form-control" name="fone_forn">
                                    </div>
                                    <br>
                                    <p class="fs-5">Email:</p>
                                    <div class="input-group mb-3" name="email_forn">
                                        <input type="text" class="form-control" name="email_forn">
                                    </div>
                                    <br>
                                    <p class="fs-5">Contato:</p>
                                    <div class="input-group mb-3" name="nome_resp">
                                        <input type="text" class="form-control" name="nome_resp">
                                    </div>
                                    </select>
                                    <br><br>
                                    <div class="mb-3">
                                        <button class="btn btn-primary rounded-5 me-4 fw-light "
                                            type="submit">Cadastrar</button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>

                    <script src="node_modules/@popperjs/core/dist/umd/popper.js"></script>
                    <script src="node_modules/bootstrap/dist/js/bootstrap.js"></script>
                    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
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
</body>

</html>