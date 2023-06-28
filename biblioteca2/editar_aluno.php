<?php
include 'conexao.php';

if (isset($_GET['matricula'])) {
    $matricula = $_GET['matricula'];


    $sql = "SELECT * FROM Aluno WHERE matricula = '$matricula'";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();
        $nome = $row["nome"];
        $email = $row["email"];
        $cpf = $row["cpf"];
        $data_nasc = $row["data_nasc"];

        
        echo '<h2>Editar Aluno</h2>';
        echo '<form action="salvar_edicao.php" method="POST">';
        echo 'Matrícula: <input type="text" name="matricula" value="' . $matricula . '" readonly><br><br>';
        echo 'Nome: <input type="text" name="nome" value="' . $nome . '"><br><br>';
        echo 'Email: <input type="text" name="email" value="' . $email . '"><br><br>';
        echo 'CPF: <input type="text" name="cpf" value="' . $cpf . '"><br><br>';
        echo 'Data de Nascimento: <input type="text" name="data_nasc" value="' . $data_nasc . '"><br><br>';
        echo '<input type="submit" value="Salvar">';
        echo '</form>';
    } else {
        echo "Aluno não encontrado.";
    }

    $conn->close();
}
?>
