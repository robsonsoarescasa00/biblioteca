<?php
include 'conexao.php';

$sql_alunos = "SELECT * FROM Aluno";
$result_alunos = $conn->query($sql_alunos);

$sql_livros = "SELECT * FROM Livro WHERE status = 1";
$result_livros = $conn->query($sql_livros);

$alunos = array(); 
while ($row = $result_alunos->fetch_assoc()) {
    $alunos[] = $row;
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Verificar se o formulário foi enviado

    // Obter os dados do formulário
    $matricula = $_POST['matricula'];
    $livros = $_POST['livros'];
    $data_entrega = $_POST['data_entrega'];

    // Inserir os dados na tabela "reserva"
    $sql_inserir = "INSERT INTO Reserva (matricula, id_livro, data_entrega, status) VALUES ";
    foreach ($livros as $livro) {
        $sql_inserir .= "($matricula, $livro, '$data_entrega', 1), ";
    }
    $sql_inserir = rtrim($sql_inserir, ", ");

    if ($conn->query($sql_inserir) === TRUE) {
        echo "Empréstimo efetuado com sucesso.";
    } else {
        echo "Erro ao efetuar o empréstimo: " . $conn->error;
    }

    $conn->close();
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Empréstimo de Livros</title>
    <link rel="stylesheet" href="css1/style.css">
</head>
<body>
    <div class="cl1 ">
    <h2>Empréstimo de Livros</h2>
    <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post">
        <label>Aluno:</label>
        <select name="matricula" required>
            <?php foreach ($alunos as $aluno): ?>
                <option value="<?php echo $aluno['matricula']; ?>"><?php echo $aluno['nome']; ?></option>
            <?php endforeach; ?>
        </select><br><br>

        <label>Livros:</label><br>
        <?php foreach ($result_livros as $row): ?>
            <input type="checkbox" name="livros[]" value="<?php echo $row['id']; ?>"> <?php echo $row['titulo']; ?><br>
        <?php endforeach; ?><br>

        <label>Data de Entrega:</label>
        <input type="date" name="data_entrega" required><br><br>

        <input type="submit" value="Efetuar Empréstimo">
    </form>
    </div>
</body>
</html>
