<?php

include 'db_connection.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $valor = $_POST['valor'];
    $data = $_POST['data'];
    $categoria_id = $_POST['categoria'];

    $sql = "INSERT INTO despesas (valor, data, categoria_id) VALUES ('$valor', '$data', '$categoria_id')";

    if ($conn->query($sql) === TRUE) {
        header("Location: Semanal.php");
        exit();
    } else {
        echo "Erro ao inserir a despesa: " . $conn->error;
    }
}

$sql = "SELECT despesas.valor, despesas.data, categorias.nome AS nome_categoria 
        FROM despesas 
        INNER JOIN categorias ON despesas.categoria_id = categorias.id";
$resultado = $conn->query($sql);

if ($resultado->num_rows > 0) {
    echo "<table class='table table-dark table-rounded text-center'>";
    echo "<thead>";
    echo "<tr>";
    echo "<th scope='col'>Valor</th>";
    echo "<th scope='col'>Categoria</th>";
    echo "<th scope='col'>Data</th>";
    echo "<th scope='col'>Ação</th>";
    echo "</tr>";
    echo "</thead>";
    echo "<tbody>";

    while ($row = $resultado->fetch_assoc()) {
        echo "<tr>";
        echo "<td>R$ " . $row['valor'] . "</td>";
        echo "<td>" . $row['nome_categoria'] . "</td>";
        echo "<td>" . $row['data'] . "</td>";
        echo "<td>";
        echo "<button type='button' class='btn btn-danger me-md-2 btn-sm'>Deletar</button>";
        echo "<button type='button' class='btn btn-success btn-sm'>Atualizar</button>";
        echo "</td>";
        echo "</tr>";
    }

    echo "</tbody>";
    echo "</table>";
} else {
    echo "Nenhuma despesa encontrada.";
}
