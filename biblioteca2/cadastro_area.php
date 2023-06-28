<?php
include 'conexao.php';

    $nome = $_POST['nome'];

    $sql = "INSERT INTO Area (nome) VALUES ('$nome')";

    if (mysqli_query($conn,$sql)) {
        echo "Área cadastrada com sucesso!";
    } 
    else {
        echo "Erro ao cadastrar área: ";
    }

?>
