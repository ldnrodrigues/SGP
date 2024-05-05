<?php

include 'db_connection.php';

// Define a variável para controlar a ordem atual
$order = isset($_GET['order']) && ($_GET['order'] == 'asc' || $_GET['order'] == 'desc') ? $_GET['order'] : 'desc';

// Verifica se os dados foram enviados via POST para inserção de nova despesa
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Recuperando os dados do formulário
    $valor = $_POST['valor'];
    $data = $_POST['data'];
    $categoria_id = $_POST['categoria'];

    // Preparando a query de inserção
    $sql = "INSERT INTO despesas_semanais (categoria_id, valor, data) VALUES ($categoria_id, $valor, '$data')";

    // Executando a query de inserção
    if ($conn->query($sql) === TRUE) {
        header("Location: Semanal.php");
        exit();
    } else {
        echo "Erro ao inserir a despesa: " . $conn->error;
    }
}

// Verifica se o ID da despesa foi fornecido via GET para edição ou exclusão
if(isset($_GET['action']) && isset($_GET['id'])) {
    $action = $_GET['action'];
    $id = $_GET['id'];

    // Se a ação for "editar"
    if($action == 'editar') {
        // Redireciona para a página de edição de despesa com o ID fornecido
        header("Location: editar_despesa_formulario.php?id=$id");
        exit();
    } 
    // Se a ação for "deletar"
    elseif($action == 'deletar') {
        // Prepara a consulta SQL para excluir a despesa com o ID fornecido
        $sql = "DELETE FROM despesas_semanais WHERE id = $id";

        // Executa a consulta SQL
        if ($conn->query($sql) === TRUE) {
            header("Location: Semanal.php");
            exit();
        } else {
            echo "Erro ao excluir a despesa: " . $conn->error;
        }
    }
} 

// Seleciona todas as despesas do banco de dados e ordena pela data
$sql = "SELECT categorias.id AS categoria_id, categorias.nome AS nome_categoria, despesas_semanais.id, despesas_semanais.valor, despesas_semanais.data
        FROM categorias
        INNER JOIN despesas_semanais ON categorias.id = despesas_semanais.categoria_id
        ORDER BY despesas_semanais.data $order";
$resultado = $conn->query($sql);

if ($resultado->num_rows > 0) {
    echo "<table class='table table-dark table-rounded text-center'>";
    echo "<thead class='table-light'>";
    echo "<tr>";
    echo "<th scope='col'>Categoria</th>";
    echo "<th scope='col'>Valor</th>";
    echo "<th scope='col'>Data <a href='Outras-pag/Semanal.php?order=" . ($order == 'asc' ? 'desc' : 'asc') . "'><i class='fas fa-arrow-" . ($order == 'asc' ? 'down' : 'up') . "'></i></a></th>";
    echo "<th scope='col'>Ação</th>";
    echo "</tr>";
    echo "</thead>";
    echo "<tbody>";

    // Loop através de todas as categorias e exibe na tabela
    while ($row = $resultado->fetch_assoc()) {
        echo "<tr>";
        echo "<td>" . $row['nome_categoria'] . "</td>";
        echo "<td>R$ " . $row['valor'] . "</td>";
        echo "<td>" . $row['data'] . "</td>";
        echo "<td>";
        echo "<div class='icon-container'>";
        echo "<a href='semanal.php?action=deletar&id=" . $row['id'] . "'>";
        echo "<div class='icon-wrapper'>";
        echo "<i class='fas fa-trash text-white'></i>";
        echo "</div>";
        echo "</a>";
        echo "</div>";
        
        echo "<div class='icon-container'>";
        echo "<a href='semanal?action=editar&id=" . $row['id'] . "'>";
        echo "<div class='icon-wrapper'>";
        echo "<i class='fas fa-pencil-alt text-white'></i>";
        echo "</div>";
        echo "</a>";
        echo "</div>";
    }

    echo "</tbody>";
    echo "</table>";
} else {
    echo "Nenhuma despesa encontrada.";
}

// Fecha a conexão com o banco de dados
$conn->close();
?>
