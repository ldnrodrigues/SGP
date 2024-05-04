<?php

include 'db_connection.php';

// Mantém a conexão aberta para buscar as categorias
$sqlCategorias = "SELECT * FROM categorias";
$resultadoCategorias = $conn->query($sqlCategorias);

// Verifica se a consulta de categorias foi bem-sucedida
if ($resultadoCategorias) {
    // Verifica se há categorias para exibir
    if ($resultadoCategorias->num_rows > 0) {
        // Loop através de todas as categorias e exibe as opções do select
        while ($rowCategoria = $resultadoCategorias->fetch_assoc()) {
            echo "<option value='" . $rowCategoria['id'] . "'>" . $rowCategoria['nome'] . "</option>";
        }
    } else {
        // Trata o caso em que não há categorias no banco de dados
        echo "<option value=''>Nenhuma categoria encontrada</option>";
    }
} else {
    // Trata qualquer erro na consulta de categorias
    echo "<option value=''>Erro na consulta de categorias: " . $conn->error . "</option>";
}

// Recuperar o ID da categoria selecionada do formulário
$categoria_id = $_POST['categoria'];

// Preparar a query de inserção
$sql = "INSERT INTO despesas (valor, descricao, data, categoria_id) VALUES ('$valor', '$descricao', '$data', '$categoria_id')";

// Fecha a conexão com o banco de dados
$conn->close();

?>