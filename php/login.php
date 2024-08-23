<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tela de Login</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="../css/style.css">
    <style>
        body, html {
            height: 100%;
            margin: 0;
        }

        .container-fluid {
            height: 100vh;
            margin: 0;
            display: flex;
        }

        .bg-image {
            position: relative;
            overflow: hidden;
            height: 100%;
        }

        .bg-image img {
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            object-fit: cover;
            z-index: 1;
        }

        .lay {
            position: absolute;
            bottom: 0;
            left: 0;
            right: 0;
            background: rgba(0, 0, 0, 0.5);
            color: white;
            text-align: center;
            padding: 20px;
            z-index: 2;
            height: 100%;
            width: 100%;
        }

        .overlay {
            position: absolute;
            bottom: 0;
            left: 0;
            right: 0;
            color: white;
            text-align: center;
            padding: 20px;
            z-index: 2;
        }

        .stars {
            color: gold;
            font-size: 2rem;
            margin: 10px 0;
            text-align: start;
        }

        .stars span {
            display: inline-block;
            margin: 0 2px;
        }

        .stars .filled {
            color: gold;
        }

        .stars .empty {
            color: gray;
        }

        .login-form-container {
            display: flex;
            align-items: center;
            justify-content: center;
            background-color: #f8f9fa;
            position: relative;
        }

        .logo {
            position: absolute;
            top: 20px;
            left: 20px;
            height: 50px;
            width: 50px;
        }
    </style>
</head>
<body>
    <div class="container-fluid">
        <!-- Formulário -->
        <div class="col-md-6 login-form-container">
            <div class="logo">
                <img src="../img/alfamaweb.png" alt="logo" height="20px" />
            </div>
            <div class="w-75">
                <h2 class="text-center mb-4">Fazer login</h2>
                <p class="text-center mt-3">Nova conta? <a href="cadastro.php">Cadastre-se gratuitamente</a></p>
                <form action="process_login.php" method="POST" id="loginForm">
                    <div class="mb-3">
                        <label for="email" class="form-label">Email</label>
                        <input type="email" class="form-control" id="email" name="email" placeholder="Digite seu email" required>
                    </div>
                    <div class="mb-3">
                        <label for="password" class="form-label">Senha</label>
                        <input type="password" class="form-control" id="password" name="password" placeholder="Insira sua senha" required>
                    </div>
                    <button type="submit" class="btn btn-primary w-100">Entrar</button>
                </form>
            </div>
        </div>

        <!-- Imagem e Overlay -->
        <div class="col-md-6 bg-image">
            <img src="../img/form_image.jpg" alt="Imagem Descritiva">
            <div class="lay">
            </div>
            <div class="overlay">
                <h1 class="text-start">Lorem ipsum dolor sit
                conse ctetur adipis.</h1>
                <h4 class="text-start">Lorem ipsum dolor sit amet, consectetur adipis
                elit. Donec euismod risus vitae libero vestibulu.</h4>
                <div class="stars">
                    <span class="filled">★</span>
                    <span class="filled">★</span>
                    <span class="filled">★</span>
                    <span class="filled">★</span>
                    <span class="filled">★</span>
                    <span class="text-white fs-4">5.0</span>
                </div>
                <div class="caption text-start">+200 comentários</div>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>