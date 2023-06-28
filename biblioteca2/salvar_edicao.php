<?php
include 'conexao.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $matricula = $_POST['matricula'];
    $nome = $_POST['nome'];
    $email = $_POST['email'];
    $cpf = $_POST['cpf'];
    $data_nasc = $_POST['data_nasc'];

    // Consulta SQL para atualizar os dados do aluno
    $sql = "UPDATE Aluno SET nome = '$nome', email = '$email', cpf = '$cpf', data_nasc = '$data_nasc' WHERE matricula = '$matricula'";
    if ($conn->query($sql) === TRUE) {
        echo "Dados do aluno atualizados com sucesso.";
    } else {
        echo "Erro ao atualizar os dados do aluno: " . $conn->error;
    }

    $conn->close();
}
?>
