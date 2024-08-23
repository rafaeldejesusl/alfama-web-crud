<?php
require 'db.php';
session_start();

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $email = $_POST['email'];
    $senha = $_POST['senha'];

    // Verifica se o usuário existe
    $stmt = $pdo->prepare("SELECT * FROM usuarios WHERE email = ?");
    $stmt->execute([$email]);
    $usuario = $stmt->fetch(PDO::FETCH_ASSOC);

    if ($usuario && password_verify($senha, $usuario['senha'])) {
        // Login bem-sucedido, salva informações na sessão
        $_SESSION['usuario_id'] = $usuario['id'];
        $_SESSION['nome'] = $usuario['nome'];
        header('Location: perfil.php');
        exit;
    } else {
        // Login falhou, retorna uma mensagem de erro
        echo "Email ou senha incorretos.";
    }
} else {
    die("Método de requisição inválido.");
}