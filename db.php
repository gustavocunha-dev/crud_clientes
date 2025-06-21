<?php
$host = 'localhost';
$user = 'root';         // usuário padrão do XAMPP
$password = '';         // senha padrão é vazia no XAMPP
$dbname = 'crud_clientes';

// Criar conexão
$conn = new mysqli($host, $user, $password, $dbname);

// Checar conexão
if ($conn->connect_error) {
    die("Falha na conexão: " . $conn->connect_error);
}
?>
