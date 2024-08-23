<?php
require 'db.php';
session_start();

if (!isset($_SESSION['usuario_id'])) {
    header('Location: login.php');
    exit;
}

// Recuperar dados do usuário
$stmt = $pdo->prepare("SELECT foto_perfil, nome FROM usuarios WHERE id = ?");
$stmt->execute([$_SESSION['usuario_id']]);
$user = $stmt->fetch(PDO::FETCH_ASSOC);

// Verificar se a foto de perfil existe
$fotoPerfil = !empty($user['foto_perfil']) ? $user['foto_perfil'] : 'default_avatar.png';
$nomeCompleto = $user['nome'];
?>

<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Perfil do Usuário</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="../css/style.css">
    <style>
        .profile-pic-container {
            position: relative;
            display: flex;
            justify-content: center;
            align-items: center;
            margin-bottom: 20px;
        }

        .profile-pic {
            width: 150px;
            height: 150px;
            border-radius: 50%;
            object-fit: cover;
        }

        .upload-btn {
            position: absolute;
            bottom: 0;
            right: 0;
            transform: translate(25%, 25%);
            background-color: #ffffff;
            border-radius: 50%;
            padding: 5px;
        }

        .file-input {
            cursor: pointer;
            opacity: 0;
            position: absolute;
            width: 100%;
            height: 100%;
            top: 0;
            left: 0;
        }
    </style>
</head>
<body>
<!-- Barra Superior -->
<nav class="navbar navbar-expand-lg" style="background-color: #4682B4;">
    <div class="container-fluid">
        <a class="navbar-brand text-white" href="#">Meu Perfil</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav ms-auto">
                <li class="nav-item">
                    <a class="nav-link text-white" href="login.php">Sair</a>
                </li>
            </ul>
        </div>
    </div>
</nav>

<!-- Formulário de Perfil -->
<div class="container mt-5">
    <div class="row justify-content-center">
        <div class="col-md-8 text-center">
        <div class="profile-pic-container position-relative">
        <img src="../uploads/<?php echo htmlspecialchars($fotoPerfil); ?>" id="profilePic" class="profile-pic img-thumbnail" alt="Foto de Perfil">
        <form action="upload_foto.php" method="POST" enctype="multipart/form-data">
    <form action="upload_foto.php" method="POST" enctype="multipart/form-data">
        <input type="file" name="foto_perfil" id="foto_perfil" class="file-input position-absolute w-100 h-100 top-0 start-0 opacity-0">
    </form>
    <button class="upload-btn btn btn-light position-absolute bottom-0 end-0">
        <i class="bi bi-camera"></i>
    </button>
    </div>
    <h3 id="nomeUsuario"><?php echo htmlspecialchars($nomeCompleto); ?></h3>
</div>
<div class="col-md-8">
    <form action="update_profile.php" method="POST">
        <div class="row mb-3">
            <div class="col">
                <label for="nome" class="form-label">Nome Completo</label>
                <input type="text" class="form-control" id="nome" name="nome" placeholder="Digite seu nome completo" required>
            </div>
            <div class="col">
                <label for="email" class="form-label">Email</label>
                <input type="email" class="form-control" id="email" name="email" placeholder="Digite seu email" required>
            </div>
        </div>
        <div class="row mb-3">
            <div class="col">
                <label for="telefone" class="form-label">Telefone</label>
                <input type="text" class="form-control" id="telefone" name="telefone" placeholder="Digite seu telefone" required>
            </div>
            <div class="col">
                <label for="cpf" class="form-label">CPF</label>
                <input type="text" class="form-control" id="cpf" name="cpf" placeholder="Digite seu CPF" required>
            </div>
        </div>
        <div class="row mb-3">
            <div class="col">
                <label for="empresa" class="form-label">Empresa</label>
                <input type="text" class="form-control" id="empresa" name="empresa" placeholder="Digite sua empresa" required>
            </div>
            <div class="col">
                <label for="endereco" class="form-label">Endereço</label>
                <input type="text" class="form-control" id="endereco" name="endereco" placeholder="Digite seu endereço" required>
            </div>
        </div>
        <div class="row">
            <button type="submit" class="btn btn-primary w-50 mx-auto">Atualizar Cadastro</button>
        </div>
    </form>
</div>


<script>

    document.addEventListener('DOMContentLoaded', function() {
        const fileInput = document.getElementById('foto_perfil');
        fileInput.addEventListener('change', function() {
            this.closest('form').submit();
        });
    });
</script>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>