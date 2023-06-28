<!DOCTYPE html>
<html>
<head>
    <title>Devolução de Livros</title>
</head>
<body>
    <h2>Devolução de Livros</h2>
    <form action="processar_devolucao.php" method="post">
        <table>
            <tr>
                <th></th>
                <th>Aluno</th>
                <th>Livro</th>
                <th>Data de Retirada</th>
                <th>Data de Entrega</th>
            </tr>
            <?php
    
            include 'conexao.php';
            
            // Consulta SQL para obter os empréstimos em aberto
            $sql = "SELECT r.id AS reserva_id, a.nome AS aluno_nome, l.titulo AS livro_titulo, r.data_retirada, r.data_entrega
                    FROM Reserva r
                    INNER JOIN Aluno a ON r.matricula = a.matricula
                    INNER JOIN ReservaLivro rl ON r.id = rl.id_reserva
                    INNER JOIN Livro l ON rl.id_livro = l.id
                    WHERE r.status = 1";
            $result = $conn->query($sql);
            
            // Verificando se há registros retornados
            if ($result->num_rows > 0) {
                // Exibindo os empréstimos em uma tabela
                while ($row = $result->fetch_assoc()) {
                    echo '<tr>';
                    echo '<td><input type="checkbox" name="reservas[]" value="' . $row["reserva_id"] . '"></td>';
                    echo '<td>' . $row["aluno_nome"] . '</td>';
                    echo '<td>' . $row["livro_titulo"] . '</td>';
                    echo '<td>' . $row["data_retirada"] . '</td>';
                    echo '<td>' . $row["data_entrega"] . '</td>';
                    echo '</tr>';
                }
            } else {
                echo '<tr><td colspan="5">Nenhum empréstimo em aberto.</td></tr>';
            }
            ?>
        </table>
        <br>
        <input type="submit" value="Realizar Devolução">
    </form>
    <script>
        // Função para selecionar/desmarcar todos os checkboxes
        function toggleCheckboxes() {
            var checkboxes = document.getElementsByName('reservas[]');
            for (var i = 0; i < checkboxes.length; i++) {
                checkboxes[i].checked = !checkboxes[i].checked;
            }
        }
    </script>
</body>
</html>
