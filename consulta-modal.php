<?php

include 'db_connection.php';

$sqlCategorias = "SELECT * FROM categorias";
$resultadoCategorias = $conn->query($sqlCategorias);

if ($resultadoCategorias) {
    if ($resultadoCategorias->num_rows > 0) {
        while ($rowCategoria = $resultadoCategorias->fetch_assoc()) {
            echo "<option value='" . $rowCategoria['id'] . "'>" . $rowCategoria['nome'] . "</option>";
        }
    } else {
        echo "<option value=''>Nenhuma categoria encontrada</option>";
    }
} else {
    echo "<option value=''>Erro na consulta de categorias: " . $conn->error . "</option>";
}

$categoria_id = $_POST['categoria'];

$sql = "INSERT INTO despesas (valor, descricao, data, categoria_id) VALUES ('$valor', '$descricao', '$data', '$categoria_id')";

// Fecha a conexão com o banco de dados
$conn->close();

?>