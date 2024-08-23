<?php
require 'db.php';
session_start();

if (!isset($_SESSION['usuario_id'])) {
    header('Location: login.php');
    exit;
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $usuario_id = $_SESSION['usuario_id'];
    $nome = $_POST['nome'];
    $email = $_POST['email'];
    $telefone = $_POST['telefone'];
    $cpf = $_POST['cpf'];
    $empresa = $_POST['empresa'];
    $endereco = $_POST['endereco'];

    // Verifica se o email ou CPF são únicos para este usuário
    $stmt = $pdo->prepare("SELECT * FROM usuarios WHERE (email = ? OR cpf = ?) AND id != ?");
    $stmt->execute([$email, $cpf, $usuario_id]);
    if ($stmt->rowCount() > 0) {
        die("Email ou CPF já estão em uso por outro usuário.");
    }

    // Atualiza o usuário

    $stmt = $pdo->prepare("UPDATE usuarios SET nome = ?, email = ?, telefone = ?, cpf = ?, empresa = ?, endereco = ? WHERE id = ?");
    $stmt->execute([$nome, $email, $telefone, $cpf, $empresa, $endereco, $usuario_id]);


    header('Location: perfil.php');
} else {
    die("Método de requisição inválido.");
}