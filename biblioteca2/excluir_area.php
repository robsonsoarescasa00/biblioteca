<?php
include 'conexao.php';

$id = $_GET['id'];

$sql = "DELETE FROM area WHERE id = $id";

if ($conn->query($sql) === TRUE) {
    echo "Livro excluído com sucesso!";
} else {
    echo "Erro ao excluir o livro: " . $conn->error;
}

$conn->close();
?>
