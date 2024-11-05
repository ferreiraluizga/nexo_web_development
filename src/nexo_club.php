<?php
require_once $_SERVER['DOCUMENT_ROOT'] . '/nexo/src/controller/clubeController.php'; //Importação única do arquivo, se existente
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>NEXO: Ligando você ao que mais importa</title>
    <link rel="stylesheet" href="scss/main.css">
    <link rel="shortcut icon" href="img/favicon.png" type="image/x-icon">
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <style>
        #hero {
            background-image: url(img/nexoclub_background.png);
            background-size: cover;
            background-position: center;
            height: 55dvh;
        }
    </style>
</head>

<body>
    <!-- header -->
    <header class="sticky-top mb-0">
        <nav class="navbar navbar-expand-lg bg-primary py-3 shadow-lg" data-bs-theme="dark">
            <div class="container align-items-center fw-semibold">
                <div class="navbar-nav col-4 justify-content-around align-items-center d-none d-lg-flex">
                    <a class="nav-link" aria-current="page" href="index.php">Home</a>
                    <a class="nav-link" aria-current="page" href="about_us.php">Sobre Nós</a>
                </div>
                <div class="col-4 text-center">
                    <a href="index.php">
                        <img src="img/header_logo.svg" alt="Logo" height="35" class="d-inline-block align-text-top">
                    </a>
                </div>
                <div class="navbar-nav col-4 justify-content-around align-items-center d-none d-lg-flex">
                    <a class="nav-link active" aria-current="page" href="nexo_club.php">NEXOClub</a>
                    <a class="nav-link" aria-current="page" href="index.php#sac">Fale Conosco</a>
                </div>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
                    data-bs-target="#navbarCollapseContent" aria-controls="navbarCollapseContent" aria-expanded="false"
                    aria-label="Toggle navigation">
                    <i class="bi bi-list text-white fs-1" id="icon-menu"></i>
                </button>

                <!-- mobile navbar-->
                <div class="collapse mt-3" id="navbarCollapseContent">
                    <div class="navbar-nav col text-end">
                        <a class="nav-link active" aria-current="page" href="index.php">Home</a>
                        <a class="nav-link" aria-current="page" href="about_us.php">Sobre Nós</a>
                        <a class="nav-link" aria-current="page" href="nexo_club.php">NEXOClub</a>
                        <a class="nav-link" aria-current="page" href="index.php#sac">Fale Conosco</a>
                    </div>
                </div>
            </div>
        </nav>
    </header>

    <section id="hero" class="d-flex justify-content-start align-items-end p-5 mb-5">
        <div class="container">
            <h1 class="fw-semibold text-white display-4">NEXOClub</h1>
        </div>
    </section>

    <div class="container">
        <section id="club" class="mb-5">
            <div class="row align-items-center text-justify mb-3 mb-lg-5">
                <div class="col-12 col-lg-6 text-center d-none d-lg-flex">
                    <img src="img/club-img.png" alt="" class="img-fluid shadow-md w-100">
                </div>
                <div class="col-12 col-lg-6">
                    <h2 class="fw-semibold mb-4">Sobre o Clube de Fidelidade</h2>
                    <p>No NEXO, queremos que cada compra seja ainda mais vantajosa. Por isso, criamos o NEXOClub, o
                        nosso <strong>clube de fidelidade exclusivo</strong>. Aqui, cada compra realizada te aproxima de
                        benefícios e
                        recompensas especiais. A cada transação, você acumula <strong>pontos</strong> que podem ser
                        trocados por
                        <strong>descontos, produtos</strong> ou <strong>ofertas exclusivas</strong>.
                    </p>
                </div>
            </div>
            <div class="row text-justify">
                <h2 class="fw-semibold mb-4">Vantagens</h2>
                <p>Com o NEXOClub, você se conecta de maneira ainda mais próxima ao que importa, aproveitando tudo
                    o que nosso minimercado tem a oferecer, com vantagens personalizadas e uma experiência de
                    compra que vai além. Confira as vantagens de ser um membro do NEXOClub e cadastre-se agora:</p>
            </div>
            <div class="row align-items-stretch mb-4">
                <div class="col-12 col-md-4 mb-2">
                    <div class="card mb-3 h-100 d-column">
                        <img src="img/card-img_1.png" class="card-img-top" alt="...">
                        <div class="card-body d-column flex-grow-1 text-center">
                            <h5 class="card-title fw-semibold">Ofertas Semanais</h5>
                            <p class="card-text">O NEXO oferece ofertas semanais e descontos exclusivos aos
                                participantes do NEXOClub</p>
                        </div>
                    </div>
                </div>
                <div class="col-12 col-md-4 mb-2">
                    <div class="card mb-3 h-100 d-column">
                        <img src="img/card-img_2.png" class="card-img-top" alt="...">
                        <div class="card-body d-column flex-grow-1 text-center">
                            <h5 class="card-title fw-semibold">Catálogo em Primeira Mão</h5>
                            <p class="card-text">Visualização do catálogo de produtos do minimercado na palma da sua mão
                                pelo aplicativo NEXOClub</p>
                        </div>
                    </div>
                </div>
                <div class="col-12 col-md-4 mb-2">
                    <div class="card mb-3 h-100 d-column">
                        <img src="img/card-img_3.png" class="card-img-top" alt="...">
                        <div class="card-body d-column flex-grow-1 text-center">
                            <h5 class="card-title fw-semibold">Notificações em seu Celular</h5>
                            <p class="card-text">Notificações sobre o mercado e atualizações constantes através do
                                aplicativo</p>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <section id="nexoClub"
            class="d-column bg-primary d-md-flex align-items-center p-5 rounded-4 text-white shadow-lg mb-5">
            <div class="col-12 col-md-6 pe-md-4">
                <h2 class="text-center mb-4">Cadastro NEXOClub</h2>
                <form class="container" id="nexoClub" action="controller/clubeController.php?acao=cadastrar_clube"
                    method="post">
                    <div class="mb-3">
                        <?php
                        if (isset($_GET['status']) && $_GET['status'] == 'sucesso') {
                            ?>
                            <br>
                            <div class="alert alert-success" role="alert">
                                Cadastro feito com sucesso!
                            </div>
                            <?php
                        }
                        ?>
                        <?php
                        if (isset($_GET['erro']) && $_GET['erro'] == 'cpf') {
                            ?>
                            <br>
                            <div class="alert alert-danger" role="alert">
                                Esse cpf já foi cadastrado!
                            </div>
                            <?php
                        }
                        ?>
                        <label for="nome" class="form-label">Nome Completo</label>
                        <input type="text" class="form-control" id="nome" placeholder="Insira seu Nome Completo"
                            name="nome" required>
                    </div>
                    <div class="mb-3">
                        <label for="telefone" class="form-label">Telefone</label>
                        <input type="text" class="form-control" id="telefone" placeholder="Insira seu Telefone"
                            name="telefone" required>
                    </div>
                    <div class="mb-3">
                        <label for="cpf" class="form-label">CPF</label>
                        <input type="text" class="form-control" id="cpf" placeholder="Insira seu CPF" name="cpf"
                            required>
                    </div>
                    <div class="mb-4">
                        <label for="email" class="form-label">E-Mail</label>
                        <input type="email" class="form-control" id="email" placeholder="Insira seu E-Mail" name="email"
                            required>
                    </div>
                    <div class="d-grid">
                        <button type="submit" class="btn btn-success mb-3">Cadastrar</button>
                    </div>
                </form>
            </div>
            <br>
            <div class="col-12 col-md-6 ps-4 border-start text-center d-none d-md-block">
                <h2 class="mb-2">Baixe o Aplicativo NEXOClub</h2>
                <p class="mb-5">Acompanhe as ofertas do mercado na palma da sua mão! Leia o QR-Code com seu celular
                    Android, e entre em nosso clube de fidelidade ainda hoje.</p>
                <img src="img/nexoAppqrCode.png" alt="" class="img-fluid shadow-md">
            </div>
        </section>
    </div>

    <footer class="shadow-lg pt-5 pb-4 bg-primary">
        <div class="container">
            <div class="row align-items-center border-bottom text-white pb-4">
                <div class="col-9">
                    <span class="fw-bold fs-3">
                        <a class="navbar-brand" href="#home">
                            <img src="img/header_logo.svg" alt="Logo" height="35" class="d-inline-block align-text-top">
                        </a>
                    </span><br>
                    <span class="fw-bold fs-5">Ligando você ao que mais importa</span><br>
                    <span class="fw-semibold" data-bs-theme="dark">
                        <a href="#"><i class="bi bi-geo-alt-fill text-white me-1"></i></a>
                        Av. Mal. Rondon, 2100 - 1 - Jardim Santa Cruz, Salto - SP, 13323-505</span>
                </div>
                <div class="col-3 text-end">
                    <a href="#"><i class="bi bi-instagram text-white fs-2 mx-3"></i></a>
                    <a href="#"><i class="bi bi-github text-white fs-2 mx-3"></i></a>
                </div>
            </div>
            <div class="row align-items-center pt-3">
                <nav class="fw-semibold mb-3 text-white">
                    <div class="container">
                        <div class="col d-flex flex-md-row navbar-nav justify-content-around">
                            <a class="nav-link active" aria-current="page" href="index.php">Home</a>
                            <a class="nav-link" aria-current="page" href="about_us.php">Sobre Nós</a>
                            <a class="nav-link" aria-current="page" href="nexo_club.php">NEXOClub</a>
                            <a class="nav-link" aria-current="page" href="index.php#sac">Fale Conosco</a>
                        </div>
                    </div>
                </nav>
                <div class="row text-center text-white">
                    <span>&copy; 2024 NEXO</span>
                </div>
            </div>
        </div>
    </footer>

    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.min.js"></script>
    <script src="https://code.jquery.com/jquery-3.7.1.js"
        integrity="sha256-eKhayi8LEQwp4NKxN+CfCh+3qOVUtJn3QNZ0TciWLP4=" crossorigin="anonymous"></script>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.mask/1.14.16/jquery.mask.min.js"></script>

    <script>
        $(document).ready(function () {
            $(document).ready(function () {
                $('#cpf').mask('000.000.000-00');
                $('#telefone').mask('(00) 00000-0000');
            });
        });
    </script>
</body>

</html>