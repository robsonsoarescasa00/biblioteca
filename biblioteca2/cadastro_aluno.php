<?php
include 'conexao.php';

    $nome = $_POST['nome'];
    $email = $_POST['email'];
    $cpf = $_POST['cpf'];
    $data_nasc = $_POST['data_nasc'];

    $sql = "INSERT INTO Aluno (nome, email, cpf, data_nasc) VALUES ('$nome', '$email', '$cpf', '$data_nasc')";

  if (mysqli_query($conn, $sql)){

       echo("conectado com sucesso!");


  }
        else {
            echo"não conectado";
        }
?>
