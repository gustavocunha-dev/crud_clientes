<?php
include 'db.php';

if (isset($_GET['id'])) {
    $id = $_GET['id'];

    $sql = "DELETE FROM clientes WHERE id = $id";

    if ($conn->query($sql) === TRUE) {
        header('Location: index.php');
        exit;
    } else {
        echo "Erro ao excluir: " . $conn->error;
    }
} else {
    header('Location: index.php');
    exit;
}
?>
