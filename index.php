<?php
include 'db.php';

// Buscar todos os clientes
$sql = "SELECT * FROM clientes";
$result = $conn->query($sql);
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <title>Lista de Clientes</title>
    <link rel="stylesheet" href="style.css">
    <script src="script.js"></script>
</head>
<body>
    <h1>Lista de Clientes</h1>

    <a href="create.php" class="button">Cadastrar Novo Cliente</a>

    <table>
        <tr>
            <th>ID</th>
            <th>Nome</th>
            <th>Telefone</th>
            <th>Endereço</th>
            <th>Ações</th>
        </tr>

        <?php if ($result->num_rows > 0): ?>
            <?php while($row = $result->fetch_assoc()): ?>
                <tr>
                    <td><?= $row['id'] ?></td>
                    <td><?= $row['nome'] ?></td>
                    <td><?= $row['telefone'] ?></td>
                    <td><?= $row['endereco'] ?></td>
                    <td>
                        <a href="edit.php?id=<?= $row['id'] ?>">Editar</a> |
                        <a href="delete.php?id=<?= $row['id'] ?>" onclick="return confirmarExclusao('<?= $row['nome'] ?>');">Excluir</a>
                    </td>
                </tr>
            <?php endwhile; ?>
        <?php else: ?>
            <tr>
                <td colspan="5">Nenhum cliente cadastrado.</td>
            </tr>
        <?php endif; ?>
    </table>
</body>
</html>
