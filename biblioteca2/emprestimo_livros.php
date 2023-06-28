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

$conn->close();
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
    <form action="salvar_emprestimo.php" method="post">
        <label>Aluno:</label>
        <select name="matricula" required>
            <?php foreach ($alunos as $aluno): ?>
                <option value="<?php echo $aluno['matricula']; ?>"><?php echo $aluno['nome']; ?></option>
            <?php endforeach; ?>
        </select><br><br>

        <label>Livros:</label><br>
        <?php while ($row = $result_livros->fetch_assoc()): ?>
            <input type="checkbox" name="livros[]" value="<?php echo $row['id']; ?>"> <?php echo $row['titulo']; ?><br>
        <?php endwhile; ?><br>

        <label>Data de Entrega:</label>
        <input type="date" name="data_entrega" required><br><br>

        <input type="submit" value="Efetuar Empréstimo">
    </form>
    </div>
</body>
</html>
