# Alfama Web CRUD

## Descrição

Este projeto é um sistema de CRUD de usuários, com funcionalidades de cadastro, login e atualização de perfil. Desenvolvido como parte de um teste técnico para a empresa Alfama Web, o sistema foi implementado utilizando PHP, MySQL, HTML, Bootstrap 5.x, e JavaScript.

## Funcionalidades

- **Cadastro de Usuário**: Permite que novos usuários criem uma conta.
- **Login de Usuário**: Autentica os usuários existentes para acessar o sistema.
- **Perfil do Usuário**: Permite que os usuários atualizem suas informações de perfil.

## Tecnologias Utilizadas

- **PHP 7.4+**
- **MySQL 5.7+**
- **HTML5**
- **CSS3**
- **Bootstrap 5.x**
- **JavaScript**
- **Git/GitHub**

## Estrutura do Projeto

- **index.php**: Página inicial que redireciona para o login ou perfil.
- **login.php**: Página de login.
- **cadastro.php**: Página de cadastro de novos usuários.
- **perfil.php**: Página de perfil onde o usuário pode atualizar suas informações.
- **db.php**: Script de conexão ao banco de dados.
- **scripts/**: Contém scripts de validação e processamento (login, registro, atualização).
- **css/**: Contém o arquivo de estilo CSS personalizado.
- **img/**: Contém imagens, como o logo e a imagem de perfil padrão.
- **db/projeto.sql**: Dump do banco de dados para importação.

## Requisitos

- **PHP 7.4+**
- **MySQL 5.7+**
- **Apache (ou outro servidor web compatível)**
- **Git**

## Passos para Configuração Local

### 1. Clone o Repositório

Clone o repositório do projeto para sua máquina local:

```sh
git clone https://github.com/rafaeldejesusl/alfama-web-crud.git
```

### 2. Configuração do Banco de Dados

- Acesse o phpMyAdmin ou outro gerenciador de banco de dados MySQL.

- Crie um novo banco de dados com o nome alfama_web_crud.

- Importe o dump do banco de dados localizado em db/alfama_web_crud.sql:

- No phpMyAdmin, selecione o banco de dados alfama_web_crud.

- Vá para a aba Importar e selecione o arquivo db/alfama_web_crud.sql.

- Clique em Executar para importar as tabelas e dados necessários.

### 3. Configuração do Projeto

- Abra o arquivo php/db.php no seu editor de texto.
- Configure as credenciais de acesso ao banco de dados, conforme necessário:

```php
<?php
$servername = "localhost";
$username = "seu-usuario";
$password = "sua-senha";
$dbname = "alfama_web";

// Criar conexão
$conn = new mysqli($servername, $username, $password, $dbname);

// Verificar conexão
if ($conn->connect_error) {
    die("Conexão falhou: " . $conn->connect_error);
}
?>
```

- Salve as alterações.

### 4. Configuração do Servidor

- Certifique-se de que o servidor Apache esteja rodando.
- Coloque o projeto no diretório raiz do seu servidor local (normalmente htdocs ou www no XAMPP/WAMP).
- Abra o navegador e acesse o projeto via http://localhost/alfama-web-crud/login.php.

### 5. Testando a Aplicação

- **Cadastro**: Acesse a página de cadastro (cadastro.php) e crie uma nova conta.
- **Login**: Utilize as credenciais criadas para fazer login na página de login (login.php).
- **Perfil**: Após o login, você será redirecionado para a página de perfil (perfil.php), onde pode atualizar suas informações.

## Contato

Em caso de dúvidas ou problemas com o projeto, entre em contato pelo e-mail: rafaeldejesuspp@gmail.com.
