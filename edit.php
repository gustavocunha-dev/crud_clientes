<?php
include 'db.php';

if (!isset($_GET['id'])) {
    header('Location: index.php');
    exit;
}

$id = $_GET['id'];

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $nome = $_POST['nome'];
    $telefone = $_POST['telefone'];
    $endereco = $_POST['endereco'];

    $sql = "UPDATE clientes SET nome='$nome', telefone='$telefone', endereco='$endereco' WHERE id=$id";

    if ($conn->query($sql) === TRUE) {
        header('Location: index.php');
        exit;
    } else {
        echo "Erro ao atualizar: " . $conn->error;
    }
} else {
    $sql = "SELECT * FROM clientes WHERE id = $id";
    $result = $conn->query($sql);
    $cliente = $result->fetch_assoc();
}
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <title>Editar Cliente</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <h1>Editar Cliente</h1>

    <form method="POST" action="">
        <label>Nome:</label>
        <input type="text" name="nome" value="<?= $cliente['nome'] ?>" required>

        <label>Telefone:</label>
        <input type="text" name="telefone" value="<?= $cliente['telefone'] ?>">

        <label>Endereço:</label>
        <input type="text" name="endereco" value="<?= $cliente['endereco'] ?>">

        <button type="submit">Salvar Alterações</button>
    </form>

    <a href="index.php" class="button">Cancelar</a>
</body>
</html>

