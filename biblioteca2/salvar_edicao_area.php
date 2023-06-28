<?php
include 'conexao.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $id = $_POST['id'];
    $nome = $_POST['nome'];

    // Consulta SQL para atualizar os dados da área
    $sql = "UPDATE Area SET nome = '$nome' WHERE id = '$id'";
    if ($conn->query($sql) === TRUE) {
        echo "Dados da área atualizados com sucesso.";
    } else {
        echo "Erro ao atualizar os dados da área: " . $conn->error;
    }

    $conn->close();
}
?>
