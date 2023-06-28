<!DOCTYPE html>
<html>
<head>
    <title>Listagem de Livros</title>
</head>
<body>
    <h2>Listagem de Livros</h2>
    <table>
        <tr>
            <th>Título</th>
            <th>Status</th>
            <th>Autor</th>
            <th>Área</th>
            <th>Ações</th>
        </tr>
        <?php
        include 'conexao.php';
        // Verificando a conexão
        
        // Consulta SQL para obter os livros com as informações da área
        $sql = "SELECT Livro.id, Livro.titulo, Livro.status, Livro.autor, Area.nome AS area_nome
                FROM Livro
                INNER JOIN Area ON Livro.id_area = Area.id";
        $result = $conn->query($sql);
        
        // Verificando se há registros retornados
        if ($result->num_rows > 0) {
            // Exibindo os registros em uma tabela HTML
            while ($row = $result->fetch_assoc()) {
                echo '<tr>';
                echo '<td>' . $row["titulo"] . '</td>';
                echo '<td>' . ($row["status"] == 0 ? 'Emprestado' : 'Disponível') . '</td>';
                echo '<td>' . $row["autor"] . '</td>';
                echo '<td>' . $row["area_nome"] . '</td>';
                echo '<td>';
                echo '<a href="editar_livro.php?id=' . $row["id"] . '">Editar</a> ';
                echo '<a href="excluir_livro.php?id=' . $row["id"] . '" onclick="return confirm(\'Tem certeza que deseja excluir o livro?\')">Excluir</a>';
                echo '</td>';
                echo '</tr>';
            }
        } else {
            echo '<tr><td colspan="5">Nenhum livro encontrado.</td></tr>';
        }
        
        // Fechando a conexão
        $conn->close();
        ?>
    </table>
</body>
</html>
