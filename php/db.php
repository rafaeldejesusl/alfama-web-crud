<?php
$host = 'localhost';
$db = 'alfama_web_crud';
$user = 'root';  // Substitua pelo seu usuário do MySQL
$pass = '';  // Substitua pela sua senha do MySQL

try {
    $pdo = new PDO("mysql:host=$host;dbname=$db", $user, $pass);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    die("Erro de conexão: " . $e->getMessage());
}