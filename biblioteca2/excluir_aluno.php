<?php
include 'conexao.php';

if (isset($_GET['matricula'])) {
    $matricula = $_GET['matricula'];

    
    $sql = "DELETE FROM Aluno WHERE matricula = '$matricula'";
    if ($conn->query($sql) === TRUE) {
        echo "Aluno excluído com sucesso.";
    } else {
        echo "Erro ao excluir aluno: " . $conn->error;
    }

    $conn->close();
}
?>
