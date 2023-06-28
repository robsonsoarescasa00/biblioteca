<?php
include 'conexao.php';

$matricula = $_POST['matricula'];
$livros = $_POST['livros'];
$data_entrega = $_POST['data_entrega'];

$sql_emprestimo = "INSERT INTO reserva (matricula, data_entrega) VALUES ('$matricula','$data_entrega')";
if ($conn->query($sql_emprestimo) === TRUE) {
    $emprestimo_id = $conn->insert_id;

    foreach ($livros as $livro_id) {
        $sql_emprestimo_livro = "INSERT INTO EmprestimoLivro (id_emprestimo, id_livro) VALUES ('$emprestimo_id', '$livro_id')";
        $conn->query($sql_emprestimo_livro);

        
        $sql_atualiza_status = "UPDATE Livro SET status = 0 WHERE id = $livro_id";
        $conn->query($sql_atualiza_status);
    }

    echo "Empréstimo efetuado com sucesso!";
} else {
    echo "Erro ao efetuar o empréstimo: " . $conn->error;
}

$conn->close();
?>
