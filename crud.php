<?php

include 'db_connection.php';

// Define a variável para controlar a ordem atual
$order = isset($_GET['order']) && ($_GET['order'] == 'asc' || $_GET['order'] == 'desc') ? $_GET['order'] : 'desc';

// Verifica se os dados foram enviados via POST para inserção de nova despesa
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Verifica se a ação é de atualização
    if ($_GET['action'] == 'atualizar') {
        // Recuperando os dados do formulário
        $id = $_POST['id'];
        $novo_valor = $_POST['novo_valor'];
        $nova_data = $_POST['nova_data'];

        // Preparando a query de atualização
        $sql = "UPDATE despesas_semanais SET valor = '$novo_valor', data = '$nova_data' WHERE id = $id";

        // Executando a query de atualização
        if ($conn->query($sql) === TRUE) {
            header("Location: Semanal.php");
            exit();
        } else {
            echo "Erro ao atualizar a despesa: " . $conn->error;
        }
    }
}

// Verifica se a ação é editar e se o ID foi fornecido
if(isset($_GET['action']) && $_GET['action'] == 'editar' && isset($_GET['id'])) {
    $id = $_GET['id'];

    // Prepara e executa a consulta SQL para obter os detalhes da despesa
    $sql = "SELECT * FROM despesas_semanais WHERE id = $id";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        // Exibir o formulário de edição com os detalhes da despesa
        $row = $result->fetch_assoc();
?>

<!-- Formulário de edição -->
<form action="Semanal.php?action=atualizar" method="POST">
    <input type="hidden" name="id" value="<?php echo $id; ?>">
    <div class="mb-3">
        <label for="valor" class="form-label">Novo Valor</label>
        <input type="number" class="form-control" id="valor" name="novo_valor" value="<?php echo $row['valor']; ?>">
    </div>
    <div class="mb-3">
        <label for="data" class="form-label">Nova Data</label>
        <input type="date" class="form-control" id="data" name="nova_data" value="<?php echo $row['data']; ?>">
    </div>
    <button type="submit" class="btn btn-primary">Salvar Alterações</button>
</form>
<!-- Fim do formulário de edição -->

<?php
    } else {
        echo "Nenhuma despesa encontrada com o ID fornecido.";
    }
} else {

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
        echo "<th scope='col'>Data <a href='Semanal.php?order=" . ($order == 'asc' ? 'desc' : 'asc') . "'><i class='fas fa-arrow-" . ($order == 'asc' ? 'down' : 'up') . " text-dark'></i></a></th>";
        echo "<th scope='col'>Ação</th>";
        echo "</tr>";
        echo "</thead>";
        echo "<tbody>";

        // Loop através de todas as categorias e exibe na tabela
        while ($row = $resultado->fetch_assoc()) {
            echo "<tr>";
            echo "<td class='align-middle'>" . $row['nome_categoria'] . "</td>";
            echo "<td class='align-middle'>R$ " . $row['valor'] . "</td>";
            echo "<td class='align-middle'>" . $row['data'] . "</td>";
            echo "<td class='align-middle'>";
            echo "<div class='icon-container'>";
            echo "<a href='semanal.php?action=deletar&id=" . $row['id'] . "'>";
            echo "<div class='icon-wrapper'>";
            echo "<i class='fas fa-trash text-white'></i>";
            echo "</div>";
            echo "</a>";
            echo "</div>";

            echo "<div class='icon-container'>";
            echo "<a href='Semanal.php?action=editar&id=" . $row['id'] . "'>";
            echo "<div class='icon-wrapper'>";
            echo "<i class='fas fa-pencil-alt text-white'></i>";
            echo "</div>";
            echo "</a>";
            echo "</div>";
            echo "</td>";

            echo "</td>";
            echo "</tr>";
        }

        echo "</tbody>";
        echo "</table>";
    } else {
        echo "Nenhuma despesa encontrada.";
    }
}

// Fecha a conexão com o banco de dados
$conn->close();
?>
