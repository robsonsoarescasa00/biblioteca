<?php
include 'conexao.php';

$id = $_POST['id'];
$titulo = $_POST['titulo'];
$status = $_POST['status'];
$autor = $_POST['autor'];
$id_area = $_POST['id_area'];

$sql = "UPDATE Livro SET titulo='$titulo', status='$status', autor='$autor', id_area='$id_area' WHERE id=$id";

if ($conn->query($sql) === TRUE) {
    echo "Livro atualizado com sucesso!";
} else {
    echo "Erro ao atualizar o livro: " . $conn->error;
}

$conn->close();
?>
