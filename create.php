<?php
include 'db.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $nome = $_POST['nome'];
    $telefone = $_POST['telefone'];
    $endereco = $_POST['endereco'];

    $sql = "INSERT INTO clientes (nome, telefone, endereco) VALUES ('$nome', '$telefone', '$endereco')";

    if ($conn->query($sql) === TRUE) {
        header('Location: index.php');
        exit;
    } else {
        echo "Erro ao cadastrar: " . $conn->error;
    }
}
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <title>Cadastrar Cliente</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <h1>Cadastrar Novo Cliente</h1>

    <form method="POST" action="">
        <label>Nome:</label>
        <input type="text" name="nome" required>

        <label>Telefone:</label>
        <input type="text" name="telefone">

        <label>Endereço:</label>
        <input type="text" name="endereco">

        <button type="submit">Cadastrar</button>
    </form>

    <a href="index.php" class="button">Voltar para a Lista</a>
</body>
</html>
