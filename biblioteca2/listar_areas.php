<!DOCTYPE html>
<html>
<head>
    <title>Listagem de Áreas</title>
</head>
<body>
    <h2>Listagem de Áreas</h2>
    <table>
        <tr>
            <th>ID</th>
            <th>Nome</th>
            <th>Ações</th>
        </tr>
        <?php
        include 'conexao.php';
        
        // Verificando a conexão
        if ($conn->connect_error) {
            die("Falha na conexão: " . $conn->connect_error);
        }
        
        // Consulta SQL para obter as áreas de conhecimento
        $sql = "SELECT id, nome FROM Area";
        $result = $conn->query($sql);
        
        // Verificando se há registros retornados
        if ($result->num_rows > 0) {
            // Exibindo os registros em uma tabela HTML
            while ($row = $result->fetch_assoc()) {
                echo '<tr>';
                echo '<td>' . $row["id"] . '</td>';
                echo '<td>' . $row["nome"] . '</td>';
                echo '<td>';
                echo '<a href="editar_area.php?id=' . $row["id"] . '">Editar</a> ';
                echo '<a href="excluir_area.php?id=' . $row["id"] . '" onclick="return confirm(\'Tem certeza que deseja excluir a área?\')">Excluir</a>';
                echo '</td>';
                echo '</tr>';
            }
        } else {
            echo '<tr><td colspan="3">Nenhuma área encontrada.</td></tr>';
        }
        
        // Fechando a conexão
        $conn->close();
        ?>
    </table>
</body>
</html>
