<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>NEXO: Ligando você ao que mais importa</title>
    <link rel="stylesheet" href="scss/main.css">
    <link rel="shortcut icon" href="img/favicon.png" type="image/x-icon">

    <style>
        #hero-tablet {
            background-image: url(img/nexoclub_background.png);
            background-size: cover;
            background-position: center;
            height: 40dvh;
        }

        #hero-mobile {
            background-image: url(img/nexoclub_background.png);
            background-size: cover;
            background-position: center;
            height: 28dvh;
        }

        #sac {
            background-image: url(img/background-sac.png);
            background-size: cover;
            background-position: center;
            background-repeat: no-repeat;
            background-attachment: fixed;
        }
    </style>
</head>

<body>

    <!-- header -->
    <header class="sticky-top mb-0">
        <nav class="navbar navbar-expand-lg bg-primary py-3 shadow-lg" data-bs-theme="dark">
            <div class="container align-items-center fw-semibold">
                <div class="navbar-nav col-4 justify-content-around align-items-center d-none d-lg-flex">
                    <a class="nav-link active" aria-current="page" href="index.php#hero">Home</a>
                    <a class="nav-link" aria-current="page" href="about_us.php">Sobre Nós</a>
                </div>
                <div class="col-4 text-center">
                    <a href="index.php">
                        <img src="img/header_logo.svg" alt="Logo" height="35">
                    </a>
                </div>
                <div class="navbar-nav col-4 justify-content-around align-items-center d-none d-lg-flex">
                    <a class="nav-link" aria-current="page" href="nexo_club.php">NEXOClub</a>
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
                        <a class="nav-link active" aria-current="page" href="index.php#hero">Home</a>
                        <a class="nav-link" aria-current="page" href="about_us.php">Sobre Nós</a>
                        <a class="nav-link" aria-current="page" href="nexo_club.php">NEXOClub</a>
                        <a class="nav-link" aria-current="page" href="index.php#sac">Fale Conosco</a>
                    </div>
                </div>
            </div>
        </nav>
    </header>

    <!-- hero: main carousel -->
    <section id="hero" class="mb-5">
        <!-- carousel for lg+ windows -->
        <div id="carouselExampleSlidesOnly" class="carousel slide d-none d-lg-block" data-bs-ride="carousel">
            <div class="carousel-inner">
                <div class="carousel-item active" data-bs-interval="5000">
                    <img src="img/hero_banner1.png" class="d-block w-100" alt="...">
                </div>
                <div class="carousel-item" data-bs-interval="5000">
                    <a href="nexo_club.php">
                        <img src="img/hero_banner2.png" class="d-block w-100" alt="...">
                    </a>
                </div>
            </div>
        </div>
        <!-- carousel for tablet windows -->
        <div id="hero-tablet" class="d-flex justify-content-center align-items-center d-none d-md-flex d-lg-none">
            <div class="container d-flex justify-content-center">
                <img src="img/hero_logo1.svg" class="d-block text-center img-fluid w-75" alt="...">
            </div>
        </div>
        <!-- carousel for mobile windows -->
        <div id="hero-mobile" class="d-flex justify-content-center align-items-center d-md-none">
            <div class="container d-flex justify-content-center">
                <img src="img/hero_logo1.svg" class="d-block text-center img-fluid w-75" alt="...">
            </div>
        </div>
    </section>

    <!-- content of website -->
    <div class="container">

        <!-- about us section-->
        <section id="about" class="mb-5">
            <div class="row justify-content-center align-items-start text-center">
                <div class="col">
                    <h1 class="fw-semibold mb-3 text-justify">O que é NEXO?</h1>
                    <p class="mb-4 text-justify">
                        O NEXO é um minimercado criado por Luiz Gabriel Ferreira, Rebeca Moura Mendes e Vitor Daisuke
                        Iwamoto com o propósito de oferecer produtos essenciais de qualidade para a sua rotina. Nossa
                        missão sempre foi conectar a comunidade local com tudo o que mais importa no dia a dia — desde
                        alimentos frescos até itens de conveniência, tudo em um só lugar. <br>
                        <a href="about_us.php">Saiba Mais</a>
                    </p>
                    <div class="d-none d-lg-flex justify-content-center">
                        <img src="img/nexo_logo.png" alt="" class="img-fluid w-50">
                    </div>
                    <div class="d-lg-none justify-content-center">
                        <img src="img/nexo_logo.png" alt="" class="img-fluid w-75">
                    </div>
                </div>
            </div>
        </section>

        <!-- NEXOClub section -->
        <section id="club" class="mb-5">
            <div class="row justify-content-center align-items-center text-justify mb-3">
                <div class="col">
                    <h1 class="fw-semibold mb-3">NEXOClub</h1>
                    <p>Para tornar cada compra ainda mais vantajosa, criamos o NEXOClub, nosso clube de fidelidade
                        exclusivo. A cada compra realizada, você acumula pontos que podem ser trocados por descontos,
                        produtos ou ofertas especiais.</p>
                    <div class="row justify-content-center align-items-stretch mb-4">
                        <div class="col-12 col-md-4 mb-3">
                            <div class="card mb-3 h-100 d-column">
                                <img src="img/card-img_1.png" class="card-img-top" alt="...">
                                <div class="card-body d-column flex-grow-1 text-center">
                                    <h5 class="card-title">Ofertas Semanais</h5>
                                    <p class="card-text">O NEXO oferece ofertas semanais e descontos exclusivos aos
                                        participantes do NEXOClub</p>
                                </div>
                            </div>
                        </div>
                        <div class="col-12 col-md-4 mb-3">
                            <div class="card mb-3 h-100 d-column">
                                <img src="img/card-img_2.png" class="card-img-top" alt="...">
                                <div class="card-body d-column flex-grow-1 text-center">
                                    <h5 class="card-title">Catálogo em Primeira Mão</h5>
                                    <p class="card-text">Visualização do catálogo de produtos do minimercado na palma da
                                        sua mão pelo aplicativo NEXOClub</p>
                                </div>
                            </div>
                        </div>
                        <div class="col-12 col-md-4 mb-3">
                            <div class="card mb-3 h-100 d-column">
                                <img src="img/card-img_3.png" class="card-img-top" alt="...">
                                <div class="card-body d-column flex-grow-1 text-center">
                                    <h5 class="card-title">Notificações em seu Celular</h5>
                                    <p class="card-text">Notificações sobre o mercado e atualizações constantes através
                                        do aplicativo</p>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row align-items-center">
                        <div class="col-12 col-md-8 text-justify">
                            <p>Descubra um mundo de vantagens com o NEXOClub! Baixe o aplicativo agora e aproveite
                                ofertas
                                exclusivas, descontos especiais e um catálogo completo na palma da sua mão. Não perca!
                            </p>
                        </div>
                        <div class="col-12 d-grid d-md-flex col-md-4 justify-content-center text-end">
                            <a href="nexo_club.php" class="btn btn-primary btn-lg fw-semibold">Cadastre-se Agora!</a>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <!-- sac section-->
        <section id="sac" class="d-column d-md-flex align-items-center p-5 rounded-4 text-white shadow-lg mb-5">
            <div class="col-12 col-md-6 pe-md-4">
                <h2 class="text-center mb-4">Fale Conosco</h2>
                <?php
                if (isset($_GET['acao']) && $_GET['acao'] == 'sucesso') {
                    ?>
                    <br>
                    <div class="alert alert-success" role="alert">
                        Email enviado!
                    </div>
                    <?php
                }
                ?>
                <?php
                if (isset($_GET['acao']) && $_GET['acao'] == 'erro') {
                    ?>
                    <br>
                    <div class="alert alert-danger" role="alert">
                        Não foi possível enviar!
                    </div>
                    <?php
                }
                ?>
                <form class="container" id="sac" action="send_mail.php" method="post">
                    <div class="mb-3">
                        <label for="nome" class="form-label">Nome Completo</label>
                        <input type="text" class="form-control" id="name" name="name"
                            placeholder="Insira seu Nome Completo" required>
                    </div>
                    <div class="mb-3">
                        <label for="email" class="form-label">E-Mail</label>
                        <input type="email" class="form-control" id="email" name="email" placeholder="Insira seu E-Mail"
                            required>
                    </div>
                    <div class="mb-4">
                        <label for="exampleFormControlTextarea1" class="form-label">Mensagem</label>
                        <textarea class="form-control" id="message" name="message" rows="4"
                            placeholder="Digite sua dúvida, comentário ou sugestão" required></textarea>
                    </div>
                    <div class="d-grid">
                        <button type="submit" class="btn btn-primary mb-3">Enviar</button>
                    </div>
                </form>
            </div>
            <div class="col-md-6 text-center ps-4 border-start d-none d-md-block">
                <h2 class="mb-2">Baixe o Aplicativo NEXOClub</h2>
                <p class="mb-5">Acompanhe as ofertas do mercado na palma da sua mão! Leia o QR-Code com seu celular
                    Android, e entre em nosso clube de fidelidade ainda hoje.</p>
                <img src="img/nexoAppqrCode.png" alt="" class="img-fluid shadow-lg">
            </div>
        </section>
    </div>

    <!-- footer -->
    <footer class="shadow-lg pt-5 pb-4 bg-primary">
        <div class="container">
            <div class="row align-items-center border-bottom text-white pb-4">
                <div class="col-9">
                    <span class="fw-bold fs-3 mb-3">
                        <a class="navbar-brand" href="#home">
                            <img src="img/header_logo.svg" alt="Logo" height="35" class="d-inline-block align-text-top">
                        </a>
                    </span><br>
                    <span class="fw-bold fs-5 mb-3">Ligando você ao que mais importa</span><br>
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
                    <p>&copy; 2024 NEXO</p>
                </div>
            </div>
        </div>
    </footer>

    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.min.js"></script>
    <script src="https://code.jquery.com/jquery-3.7.1.js"
        integrity="sha256-eKhayi8LEQwp4NKxN+CfCh+3qOVUtJn3QNZ0TciWLP4=" crossorigin="anonymous"></script>

    <!-- icone da janela -->
    <script>
        $(document).ready(function () {
            $('#navbarCollapseContent').on('shown.bs.collapse', function () {
                $('#icon-menu').removeClass('bi-list').addClass('bi-x');
            });
            $('#navbarCollapseContent').on('hidden.bs.collapse', function () {
                $('#icon-menu').removeClass('bi-x').addClass('bi-list');
            });
        });
    </script>

</body>

</html>
