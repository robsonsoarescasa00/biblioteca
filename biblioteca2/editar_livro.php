<!DOCTYPE html>
<html>
<head>
    <title>Editar Livro</title>
</head>
<body>
    <?php
    include 'conexao.php';

    // Verificando se o parâmetro 'id' está presente na URL
    if (isset($_GET['id'])) {
        $livro_id = $_GET['id'];

        // Consulta SQL para obter os dados do livro com base no ID
        $sql = "SELECT * FROM Livro WHERE id = $livro_id";
        $result = $conn->query($sql);

        // Verificando se há registros retornados
        if ($result->num_rows > 0) {
            $livro = $result->fetch_assoc();
            ?>
            <h2>Editar Livro</h2>
            <form action="processar_edicao_livro.php" method="post">
                <input type="hidden" name="id" value="<?php echo $livro['id']; ?>">
                <label>Título:</label>
                <input type="text" name="titulo" value="<?php echo $livro['titulo']; ?>" required><br><br>

                <label>Status:</label>
                <select name="status" required>
                    <option value="0" <?php if ($livro['status'] == 0) echo 'selected'; ?>>Emprestado</option>
                    <option value="1" <?php if ($livro['status'] == 1) echo 'selected'; ?>>Disponível</option>
                </select><br><br>

                <label>Autor:</label>
                <input type="text" name="autor" value="<?php echo $livro['autor']; ?>" required><br><br>

                <label>Área:</label>
                <select name="id_area" required>
                    <?php
                    // Consulta SQL para obter as áreas
                    $sql_areas = "SELECT * FROM Area";
                    $result_areas = $conn->query($sql_areas);

                    // Exibindo as áreas em um menu suspenso
                    while ($area = $result_areas->fetch_assoc()) {
                        $selected = ($livro['id_area'] == $area['id']) ? 'selected' : '';
                        echo '<option value="' . $area['id'] . '" ' . $selected . '>' . $area['nome'] . '</option>';
                    }
                    ?>
                </select><br><br>

                <input type="submit" value="Atualizar Livro">
            </form>
            <?php
        } else {
            echo 'Livro não encontrado.';
        }
    } else {
        echo 'ID do livro não fornecido.';
    }

    $conn->close();
    ?>
</body>
</html>
