<?php
include 'conexao.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    

    if (isset($_POST['reservas'])) {
        
        $reservas = $_POST['reservas'];

        foreach ($reservas as $reserva_id) {
        
            $sql_atualizar = "UPDATE Reserva SET status = 0 WHERE id = $reserva_id";

            if ($conn->query($sql_atualizar) !== TRUE) {
                echo "Erro ao atualizar reserva: " . $conn->error;
                exit;
            }
        }

        echo "Devolução realizada com sucesso.";
    } else {
        echo "Nenhuma reserva selecionada para devolução.";
    }
}

$sql_reservas = "SELECT r.id, a.nome AS aluno_nome, l.titulo AS livro_titulo, r.data_retirada, r.data_entrega
                 FROM Reserva r
                 INNER JOIN Aluno a ON r.matricula = a.matricula
                 INNER JOIN Livro l ON r.id_livro = l.id
                 WHERE r.status = 1";
$result_reservas = $conn->query($sql_reservas);
?>

<!DOCTYPE html>
<html>
<head>
    <title>Devolução de Livros</title>
</head>
<body>
    <h2>Devolução de Livros</h2>
    <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post">
        <table>
            <tr>
                <th></th>
                <th>Aluno</th>
                <th>Livro</th>
                <th>Data de Retirada</th>
                <th>Data de Entrega</th>
            </tr>
            <?php
            if ($result_reservas->num_rows > 0) {
                while ($row = $result_reservas->fetch_assoc()) {
                    echo '<tr>';
                    echo '<td><input type="checkbox" name="reservas[]" value="' . $row["id"] . '"></td>';
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
</body>
</html>
