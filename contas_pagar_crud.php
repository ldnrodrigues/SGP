<?php

include 'db_connection.php';

$order = isset($_GET['order']) && ($_GET['order'] == 'asc' || $_GET['order'] == 'desc') ? $_GET['order'] : 'desc';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if ($_POST['action'] == 'inserir') {
        $valor = $_POST['valor'];
        $data_vencimento = $_POST['data_vencimento'];
        $categoria_id = $_POST['categoria'];
        $parcelas_faltantes = $_POST['parcelas_faltantes'];

        $sql = "INSERT INTO contas_a_pagar (categoria_id, valor, data_vencimento, parcelas_faltantes) VALUES ($categoria_id, $valor, '$data_vencimento', $parcelas_faltantes)";

        if ($conn->query($sql) === TRUE) {
            header("Location: Contas-pagar.php");
            exit();
        } else {
            echo "Erro ao inserir a despesa: " . $conn->error;
        }
    } 
    elseif ($_POST['action'] == 'atualizar') {
        $id = $_POST['id'];
        $novo_valor = $_POST['novo_valor'];
        $nova_data_vencimento = $_POST['nova_data_vencimento'];
        $novas_parcelas_faltantes = $_POST['novas_parcelas_faltantes'];

        $sql = "UPDATE contas_a_pagar SET valor = '$novo_valor', data_vencimento = '$nova_data_vencimento', parcelas_faltantes = '$novas_parcelas_faltantes' WHERE id = $id";

        if ($conn->query($sql) === TRUE) {
            header("Location: Contas-pagar.php");
            exit();
        } else {
            echo "Erro ao atualizar a despesa: " . $conn->error;
        }
    }
}

if(isset($_GET['action']) && $_GET['action'] == 'deletar' && isset($_GET['id'])) {
    $id = $_GET['id'];

    $sql = "DELETE FROM contas_a_pagar WHERE id = $id";

    if ($conn->query($sql) === TRUE) {
        header("Location: Contas-pagar.php");
        exit();
    } else {
        echo "Erro ao excluir a despesa: " . $conn->error;
    }
} 

if(isset($_GET['action']) && $_GET['action'] == 'editar' && isset($_GET['id'])) {
    $id = $_GET['id'];

    $sql = "SELECT * FROM contas_a_pagar WHERE id = $id";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();
?>

<form action="Contas-pagar.php" method="POST">
    <input type="hidden" name="action" value="atualizar">
    <input type="hidden" name="id" value="<?php echo $id; ?>">
    <div class="mb-3">
        <label for="valor" class="form-label">Novo Valor</label>
        <input type="number" class="form-control bg-imput text-light" id="valor" name="novo_valor" value="<?php echo $row['valor']; ?>">
    </div>
    <div class="mb-3">
        <label for="data_vencimento" class="form-label">Nova Data de Vencimento</label>
        <input type="date" class="form-control bg-imput text-light" id="data_vencimento" name="nova_data_vencimento" value="<?php echo $row['data_vencimento']; ?>">
    </div>

    <div class="mb-3">
        <label for="parcelas_faltantes" class="form-label">Novas Parcelas Faltantes</label>
        <input type="number" class="form-control" id="parcelas_faltantes" name="novas_parcelas_faltantes" value="<?php echo $row['parcelas_faltantes']; ?>">
    </div>
    <button type="submit" class="btn btn-light mt-2">Salvar Alterações</button>
</form>

<?php
    } else {
        echo "Nenhuma despesa encontrada com o ID fornecido.";
    }
} else {

    $sql = "SELECT categorias.id AS categoria_id, categorias.nome AS nome_categoria, contas_a_pagar.id, contas_a_pagar.valor, DATE_FORMAT(contas_a_pagar.data_vencimento, '%d/%m/%Y') AS data_vencimento_formatada, contas_a_pagar.parcelas_faltantes
            FROM categorias
            INNER JOIN contas_a_pagar ON categorias.id = contas_a_pagar.categoria_id
            ORDER BY contas_a_pagar.data_vencimento $order";
    $resultado = $conn->query($sql);

    if ($resultado->num_rows > 0) {
        echo "<table class='table table-dark text-center mb-4'>";
        echo "<thead class='table-light'>";
        echo "<tr>";
        echo "<th scope='col'>Categoria</th>";
        echo "<th scope='col'>Valor</th>";
        echo "<th scope='col'>Data de Vencimento <a href='Contas-pagar.php?order=" . ($order == 'asc' ? 'desc' : 'asc') . "'><i class='fas fa-arrow-" . ($order == 'asc' ? 'down' : 'up') . " text-dark'></i></a></th>";
        echo "<th scope='col'>Parcelas Faltantes</th>";
        echo "<th scope='col'>Ação</th>";
        echo "</tr>";
        echo "</thead>";
        echo "<tbody>";

        while ($row = $resultado->fetch_assoc()) {
            echo "<tr>";
            echo "<td class='align-middle'>" . $row['nome_categoria'] . "</td>";
            echo "<td class='align-middle'>R$ " . $row['valor'] . "</td>";
            echo "<td class='align-middle'>" . $row['data_vencimento_formatada'] . "</td>";
            echo "<td class='align-middle'>" . $row['parcelas_faltantes'] . "</td>";
            echo "<td class='align-middle'>";
            echo "<div class='icon-container'>";
            echo "<a href='Contas-pagar.php?action=deletar&id=" . $row['id'] . "'>";
            echo "<div class='icon-wrapper'>";
            echo "<i class='fas fa-trash text-white'></i>";
            echo "</div>";
            echo "</a>";
            echo "</div>";

            echo "<div class='icon-container'>";
            echo "<a href='Contas-pagar.php?action=editar&id=" . $row['id'] . "'>";
            echo "<div class='icon-wrapper'>";
            echo "<i class='fas fa-pencil-alt text-white'></i>";
            echo "</div>";
            echo "</a>";
            echo "</div>";
            echo "</td>";

            echo "</tr>";
        }

        echo "</tbody>";
        echo "</table>";
    } else {
        echo "Nenhuma despesa encontrada.";
    }
}

$conn->close();
?>
