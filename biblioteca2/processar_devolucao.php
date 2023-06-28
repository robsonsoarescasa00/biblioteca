<?php
include 'conexao.php';

if (isset($_POST['reservas'])) {
    $reservas = $_POST['reservas'];

    foreach ($reservas as $reserva_id) {
        // Atualiza o status da reserva para encerrada
        $sql_atualiza_status = "UPDATE Reserva SET status = 0 WHERE id = $reserva_id";
        $conn->query($sql_atualiza_status);

        // Realiza outras operações necessárias, como atualização de estoque, cálculo de multa, etc.

        // Exemplo de ação: Atualiza o status do livro para disponível
        $sql_atualiza_status_livro = "UPDATE Livro SET status = 1 WHERE id IN (SELECT id_livro FROM ReservaLivro WHERE id_reserva = $reserva_id)";
        $conn->query($sql_atualiza_status_livro);
    }

    echo "Devoluções processadas com sucesso!";
} else {
    echo "Nenhuma reserva selecionada para devolução.";
}

$conn->close();
?>
