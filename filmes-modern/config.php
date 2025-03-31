<?php
// Configurações do banco de dados
$host = 'localhost';
$username = 'root';
$password = '';
$database = 'filmes_db';
$port = 3308;

// Conecta ao MySQL
$conn = mysqli_connect($host, $username, $password, '', $port);

if (!$conn) {
    die("Erro ao conectar ao MySQL: " . mysqli_connect_error());
}

// Cria o banco de dados se não existir
mysqli_query($conn, "CREATE DATABASE IF NOT EXISTS $database");
mysqli_select_db($conn, $database);

// Cria a tabela de filmes
$sql = "CREATE TABLE IF NOT EXISTS filmes (
    id INT AUTO_INCREMENT PRIMARY KEY,
    titulo VARCHAR(100) NOT NULL,
    descricao TEXT,
    imagem VARCHAR(255),
    categoria VARCHAR(50),
    data_adicao TIMESTAMP DEFAULT CURRENT_TIMESTAMP
)";
mysqli_query($conn, $sql);

// Insere dados de exemplo (apenas se a tabela estiver vazia)
$check = mysqli_query($conn, "SELECT COUNT(*) as total FROM filmes");
$row = mysqli_fetch_assoc($check);
if ($row['total'] == 0) {
    $sql = "INSERT INTO filmes (titulo, descricao, imagem, categoria) VALUES 
        ('Duna', 'Uma épica aventura no deserto', 'duna.jpg', 'Filmes'),
        ('Stranger Things', 'Mistérios dos anos 80', 'stranger.jpg', 'Séries'),
        ('Oppenheimer', 'A história do criador da bomba', 'oppenheimer.jpg', 'Filmes')";
    mysqli_query($conn, $sql);
}
?>