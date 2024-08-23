<?php
require 'db.php';
session_start();

if (!isset($_SESSION['usuario_id'])) {
    header('Location: login.php');
    exit;
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    if (isset($_FILES['foto_perfil']) && $_FILES['foto_perfil']['error'] === UPLOAD_ERR_OK) {
        $fileTmpPath = $_FILES['foto_perfil']['tmp_name'];
        $fileName = $_FILES['foto_perfil']['name'];
        $fileNameCmps = explode('.', $fileName);
        $fileExtension = strtolower(end($fileNameCmps));

        $allowedExtensions = ['jpg', 'jpeg', 'png', 'gif'];
        if (in_array($fileExtension, $allowedExtensions)) {
            $uploadFileDir = '../uploads/';
            if (!is_dir($uploadFileDir)) {
                mkdir($uploadFileDir, 0777, true);
            }
            $newFileName = $_SESSION['usuario_id'] . '.' . $fileExtension;
            $dest_path = $uploadFileDir . $newFileName;

            if (move_uploaded_file($fileTmpPath, $dest_path)) {
                // Atualizar o nome da foto no banco de dados
                $stmt = $pdo->prepare("UPDATE usuarios SET foto_perfil = ? WHERE id = ?");
                $stmt->execute([$newFileName, $_SESSION['usuario_id']]);

                // Redirecionar após o sucesso
                header('Location: perfil.php');
                exit;
            } else {
                die("Erro ao mover o arquivo para o diretório de uploads.");
            }
        } else {
            die("Formato de imagem inválido. Use jpg, jpeg, png ou gif.");
        }
    } else {
        die("Nenhum arquivo enviado ou erro no envio.");
    }
} else {
    die("Método de requisição inválido.");
}
?>