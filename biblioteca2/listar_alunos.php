<?php

?>

<!DOCTYPE html>
<html>
<head>
    <title>Listagem de Alunos</title>
</head>
<body>
    <h2>Listar de Alunos</h2>
    <table>
        <tr>
            <th>Matrícula</th>
            <th>Nome</th>
            <th>Email</th>
            <th>CPF</th>
            <th>Data de Nascimento</th>
            
        </tr>
        <?php
        
        include 'conexao.php';
        // Consulta SQL para obter os alunos
        $sql = "SELECT * FROM Aluno";
        $result = $conn->query($sql);
        
        // Verificando se há registros retornados
        if ($result->num_rows > 0) {
            // Exibindo os registros em uma tabela HTML
            while ($row = $result->fetch_assoc()) {
                echo '<tr>';
                echo '<td>' . $row["matricula"] . '</td>';
                echo '<td>' . $row["nome"] . '</td>';
                echo '<td>' . $row["email"] . '</td>';
                echo '<td>' . $row["cpf"] . '</td>';
                echo '<td>' . $row["data_nasc"] . '</td>';
                echo '<td>';
                echo '<a href="editar_aluno.php?matricula=' . $row["matricula"] . '">Editar</a> ';
                echo '<a href="excluir_aluno.php?matricula=' . $row["matricula"] . '" onclick="return confirm(\'Tem certeza que deseja excluir o aluno?\')">Excluir</a>';
                echo '</td>';
                echo '</tr>';
            }
        } else {
            echo '<tr><td colspan="6">Nenhum aluno encontrado.</td></tr>';
        }
        
        
        $conn->close();
        ?>
    </table>
</body>
</html>
