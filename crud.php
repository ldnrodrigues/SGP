<?php

include 'db_connection.php';

$order = isset($_GET['order']) && ($_GET['order'] == 'asc' || $_GET['order'] == 'desc') ? $_GET['order'] : 'desc';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if ($_POST['action'] == 'inserir') {
        $valor = $_POST['valor'];
        $data = $_POST['data'];
        $categoria_id = $_POST['categoria'];

        $sql = "INSERT INTO despesas_semanais (categoria_id, valor, data) VALUES ($categoria_id, $valor, '$data')";

        if ($conn->query($sql) === TRUE) {
            header("Location: Semanal.php");
            exit();
        } else {
            echo "Erro ao inserir a despesa: " . $conn->error;
        }
    } 
    elseif ($_POST['action'] == 'atualizar') {
        $id = $_POST['id'];
        $novo_valor = $_POST['novo_valor'];
        $nova_data = $_POST['nova_data'];

        $sql = "UPDATE despesas_semanais SET valor = '$novo_valor', data = '$nova_data' WHERE id = $id";

        if ($conn->query($sql) === TRUE) {
            header("Location: Semanal.php");
            exit();
        } else {
            echo "Erro ao atualizar a despesa: " . $conn->error;
        }
    }
}

if(isset($_GET['action']) && $_GET['action'] == 'deletar' && isset($_GET['id'])) {
    $id = $_GET['id'];

    $sql = "DELETE FROM despesas_semanais WHERE id = $id";

    if ($conn->query($sql) === TRUE) {
        header("Location: Semanal.php");
        exit();
    } else {
        echo "Erro ao excluir a despesa: " . $conn->error;
    }
} 

if(isset($_GET['action']) && $_GET['action'] == 'editar' && isset($_GET['id'])) {
    $id = $_GET['id'];

    $sql = "SELECT * FROM despesas_semanais WHERE id = $id";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();
?>

<form action="Semanal.php" method="POST">
    <input type="hidden" name="action" value="atualizar">
    <input type="hidden" name="id" value="<?php echo $id; ?>">
    <div class="mb-3">
        <label for="valor" class="form-label">Novo Valor</label>
        <input type="number" class="form-control bg-imput text-light" id="valor" name="novo_valor" value="<?php echo $row['valor']; ?>">
    </div>
    <div class="mb-3">
        <label for="data" class="form-label">Nova Data</label>
        <input type="date" class="form-control bg-imput text-light" id="data" name="nova_data" value="<?php echo $row['data']; ?>">
    </div>
    <button type="submit" class="btn btn-light mt-2">Salvar Alterações</button>
</form>

<?php
    } else {
        echo "Nenhuma despesa encontrada com o ID fornecido.";
    }
} else {

    $sql = "SELECT categorias.id AS categoria_id, categorias.nome AS nome_categoria, despesas_semanais.id, despesas_semanais.valor, DATE_FORMAT(despesas_semanais.data, '%d/%m/%Y') AS data_formatada
            FROM categorias
            INNER JOIN despesas_semanais ON categorias.id = despesas_semanais.categoria_id
            ORDER BY despesas_semanais.data $order";
        $resultado = $conn->query($sql);

    if ($resultado->num_rows > 0) {
        echo "<table class='table table-dark text-center mb-4'>";
        echo "<thead class='table-light'>";
        echo "<tr>";
        echo "<th scope='col'>Categoria</th>";
        echo "<th scope='col'>Valor</th>";
        echo "<th scope='col'>Data <a href='Semanal.php?order=" . ($order == 'asc' ? 'desc' : 'asc') . "'><i class='fas fa-arrow-" . ($order == 'asc' ? 'down' : 'up') . " text-dark'></i></a></th>";
        echo "<th scope='col'>Ação</th>";
        echo "</tr>";
        echo "</thead>";
        echo "<tbody>";

        while ($row = $resultado->fetch_assoc()) {
            echo "<tr>";
            echo "<td class='align-middle'>" . $row['nome_categoria'] . "</td>";
            echo "<td class='align-middle'>R$ " . $row['valor'] . "</td>";
            echo "<td class='align-middle'>" . $row['data_formatada'] . "</td>";
            echo "<td class='align-middle'>";
            echo "<div class='icon-container'>";
            echo "<a href='Semanal.php?action=deletar&id=" . $row['id'] . "'>";
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

$conn->close();
?>
