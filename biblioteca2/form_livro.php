<!DOCTYPE html>
<html>
<head>
    <title>Cadastro de Livro</title>
</head>
<body>
    <h2>Cadastro de Livro</h2>
    <form action="cadastro_livro.php" method="POST">
        <label for="titulo">Título:</label>
        <input type="text" id="titulo" name="titulo" required>
        <br><br>
        
        <label for="status">Status:</label>
        <select id="status" name="status" required>
            <option value="0">Emprestado</option>
            <option value="1">Disponível</option>
        </select>
        <br><br>
        
        <label for="autor">Autor:</label>
        <input type="text" id="autor" name="autor" required>
        <br><br>
        
        <label for="id_area">Área de Conhecimento:</label>
        <select id="id_area" name="id_area" required>
        <?php
    include_once 'conexao.php';

    // Consulta SQL para obter as áreas de conhecimento
    $sql = "SELECT id, nome FROM Area";
    $result = mysqli_query($conn, $sql);

    // Verificando se há registros retornados
    if (mysqli_num_rows($result) > 0) {
        // Exibindo as opções do selectbox com as áreas de conhecimento
        while ($row = mysqli_fetch_assoc($result)) {
            echo '<option value="' . $row["id"] . '">' . $row["nome"] . '</option>';
        }
    }

    mysqli_close($conn);
?>

        </select>
        <br><br>
        
        <input type="submit" value="Cadastrar">
    </form>
</body>
</html>
