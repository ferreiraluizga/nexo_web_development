<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <link rel="stylesheet" href="scss/main.css">

    <style>
        body {
            background: url('img/background-sac.png') no-repeat center center fixed;
            background-size: cover;
        }
    </style>
</head>
<body>
    <div class="container d-flex justify-content-center align-items-center min-vh-100">
        <div class="row align-items-center">
            <div class="col-md-6">
                <img src="img/hero_logo1.svg" alt="Logo" class="img-fluid w-100 mb-4">
            </div>
            <div class="col-md-6">
                <div class="card shadow p-4">
                    <div class="card-body">
                        <h2 class="text-center mb-4">Login</h2>
                        <br>
                                <?php 
                                if(isset($_GET['erro']) && $_GET['erro'] == 'login'){
                                ?> 
                                <div class="alert alert-danger" role="alert">
                                Usuário ou senha incorretos!
                                </div>
                                <?php
                                }
                                ?>
                        <form action="verificLogin.php" method="POST">
                            <div class="mb-3">
                                <label for="email" class="form-label">Email</label>
                                <input type="email" class="form-control" id="email" name="email" placeholder="Digite seu email">
                            </div>
                            <div class="mb-3">
                                <label for="password" class="form-label">Senha</label>
                                <input type="password" class="form-control" id="password" name="password" placeholder="Digite sua senha">
                            </div>
                            <br>
                            <button type="submit" name="log" class="btn btn-primary w-100">Entrar</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.min.js"></script>
    <script src="https://code.jquery.com/jquery-3.7.1.js" integrity="sha256-eKhayi8LEQwp4NKxN+CfCh+3qOVUtJn3QNZ0TciWLP4=" crossorigin="anonymous"></script>
</body>
</html>
