<?php
include 'conexao.php';

    $titulo = $_POST['titulo'];
    $status = $_POST['status'];
    $autor = $_POST['autor'];
    $id_area = $_POST['id_area'];

    $sql = "INSERT INTO Livro (titulo, status, autor, id_area) VALUES ('$titulo', '$status', '$autor', '$id_area')";

    if (mysqli_query($conn, $sql)) {
        echo "Livro cadastrado com sucesso!";
    } else {
        echo "Erro ao cadastrar livro: ";
    }

?>
