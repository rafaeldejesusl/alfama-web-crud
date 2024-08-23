<?php
require 'db.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $nome = $_POST['nome'];
    $email = $_POST['email'];
    $senha = password_hash($_POST['senha'], PASSWORD_DEFAULT);

    // Verifica se o email ou CPF já existem
    $stmt = $pdo->prepare("SELECT * FROM usuarios WHERE email = ? OR cpf = ?");
    $stmt->execute([$email, $cpf]);
    if ($stmt->rowCount() > 0) {
        die("Email ou CPF já cadastrados.");
    }

    // Insere o novo usuário
    $stmt = $pdo->prepare("INSERT INTO usuarios (nome, email, senha) VALUES (?, ?, ?)");
    $stmt->execute([$nome, $email, $senha]);

    header('Location: login.php');
} else {
    die("Método de requisição inválido.");
}