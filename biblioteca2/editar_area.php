<?php
include 'conexao.php';

if (isset($_GET['id'])) {
    $id = $_GET['id'];

    // Consulta SQL para obter os dados da área com base no ID
    $sql = "SELECT * FROM Area WHERE id = '$id'";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();
        $nome = $row["nome"];

        // Formulário para editar os dados da área
        echo '<!DOCTYPE html>';
        echo '<html>';
        echo '<head>';
        echo '<title>Editar Área</title>';
        echo '</head>';
        echo '<body>';
        echo '<h2>Editar Área</h2>';
        echo '<form action="salvar_edicao_area.php" method="POST">';
        echo 'ID: <input type="text" name="id" value="' . $id . '" readonly><br><br>';
        echo 'Nome: <input type="text" name="nome" value="' . $nome . '"><br><br>';
        echo '<input type="submit" value="Salvar">';
        echo '</form>';
        echo '</body>';
        echo '</html>';
    } else {
        echo "Área não encontrada.";
    }

    $conn->close();
}
?>
