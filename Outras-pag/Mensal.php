<?php

include '../db_connection.php';

$order = isset($_GET['order']) && ($_GET['order'] == 'asc' || $_GET['order'] == 'desc') ? $_GET['order'] : 'desc';

// Consulta para recuperar registros de despesas semanais
$sql = "SELECT * FROM despesas_semanais";
$resultado_despesas_semanais = $conn->query($sql);

// Consulta para recuperar registros de contas a pagar
$sql = "SELECT * FROM contas_a_pagar";
$resultado_contas_a_pagar = $conn->query($sql);

if ($resultado_despesas_semanais && $resultado_contas_a_pagar) {
    // Calcula o gasto total das despesas semanais
    $total_despesas_semanais = 0;
    while ($row = $resultado_despesas_semanais->fetch_assoc()) {
        $total_despesas_semanais += $row['valor'];
    }

    // Calcula o gasto total das contas a pagar
    $total_contas_a_pagar = 0;
    while ($row = $resultado_contas_a_pagar->fetch_assoc()) {
        $total_contas_a_pagar += $row['valor'];
    }

    // Consulta para recuperar o salário
    $salario = 2000;

    // Calcula o saldo restante após subtrair o total de despesas do salário
    $saldo_restante = $salario - ($total_despesas_semanais + $total_contas_a_pagar);
} else {
    echo "Erro ao executar consulta: " . $conn->error;
}

?>

<!DOCTYPE php>
<php lang="pt-br" data-bs-theme="auto">
<head>

  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <meta name="description" content="">
  <meta name="author" content="">
  <meta name="generator" content="">
  <link rel="shortcut icon" href="">
  <title>Sistema de Gestão Financeira Pessoal</title>

  <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

  <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css" rel="stylesheet">

  <!-- Bootstrap -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">

  <!-- CSS -->
  <link href="../style.css" rel="stylesheet">

  <!-- Bootstrap JS -->
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>

  <!-- Script -->
  <script src="../script.js"></script>

  <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css" integrity="sha512-<HASH>" crossorigin="anonymous" />

  <?php

  include '../db_connection.php';

    $sql = "SELECT SUM(valor) AS total_despesas FROM despesas_semanais";
    $result = $conn->query($sql);
    $total_despesas = 0;

    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();
        $total_despesas = $row['total_despesas'];
    }

    $sql_despesas_semanais = "SELECT * FROM despesas_semanais";
    $resultado_despesas_semanais = $conn->query($sql_despesas_semanais);

    $sql_contas_a_pagar = "SELECT * FROM contas_a_pagar";
    $resultado_contas_a_pagar = $conn->query($sql_contas_a_pagar);
  ?>

</head>

<body style="background-color: #191f24;">

<header class="navbar p-1 bg-dark shadow justify-content-start fixed-top">
  <div class="col-4">
    <button class="openbtn btn btn-dark" onclick="openNav()">☰</button>
  </div>
    <div class="col-4 d-flex justify-content-center">
      <a href="../index.php" style="text-decoration: none;"><span class="navbar-brand text-light">Sistema de Gestão Financeira Pessoal</span></a>
    </div>
  </header>

  <!-- Barra lateral -->
  <div id="mySidebar" class="sidebar bg-dark shadow">
    <div class="logo-container">
      <img src="https://cdn-icons-png.flaticon.com/512/16/16480.png" alt="">
    </div>
      <a href="javascript:void(0)" class="closebtn" onclick="closeNav()">×</a>
      <a href="../index.php"><i class="fas fa-home"></i> Início</a>
      <a href="Mensal.php"><i class="fas fa-chart-line"></i> Gasto Mensal</a>
      <a href="Semanal.php"><i class="fas fa-calendar-week"></i> Gasto Semanal</a>
      <a href="Contas-pagar.php"><i class="fas fa-file-invoice-dollar"></i> Contas a Pagar</a>
    </div>

<div class="container container-inicial bg-dark shadow rounded">
  <div class="row"></div>

    <div class="container mt-5">
      <div class="row">
        <h2 style="margin-left: 0.7rem;">Total da Despesa Mensal</h2>
      </div>

      <div class="container mt-3" id="main">
        <div class="row">
          <div class="col-md-6">
            <div class="card mb-3 bg-success text-light">
                <div class="card-body">
                  <img src="../Imagens/Icones/dinheiros.png" alt="" style="max-width: 45px;">
                    <div class="d-flex">
                        <?php if(isset($_POST['salario'])): ?>
                          <?php 
                            $salario = $_POST['salario'];
                            echo "<h4 class='card-title mt-3'>Salário:&nbsp;</h4>";
                            echo "<h4 class='card-text mt-3' style='color: #41ca45; text-shadow: 1px 1px 2px rgba(0, 0, 0, 0.3);'>R$ $salario</h4>";
                          ?>
                            <?php else: ?>
                              <form method="post">
                                <div class="mb-3">
                                  <label for="salario" class="form-label">Insira seu salário:</label>
                                  <input type="text" class="form-control" id="salario" name="salario" required>
                                </div>
                              <button type="submit" class="btn btn-light">Enviar</button>
                            </form>
                          <?php endif; ?>
                        </div>

                        <?php if(isset($_POST['salario'])): ?>
                          <?php 
                            $saldo_restante = $salario - ($total_despesas_semanais + $total_contas_a_pagar);
                          ?>
                            <div class="d-flex">
                              <h4 class="card-text mt-3">Saldo:&nbsp;<h4 class='card-text mt-3' style='color: #41ca45; text-shadow: 1px 1px 2px rgba(0, 0, 0, 0.3);'>R$ <?php echo $saldo_restante; ?></h4>
                            </div>
                          <?php endif; ?>
                        <hr style="border-top-color: #fff;">
                      </div>
                    </div>
                  <div class="card bg-danger text-light">
                    <div class="card-body">
                      <img src="../Imagens/Icones/perda.png" alt="" style="max-width: 45px;">
                        <h4 class="card-title mt-3">Total Despesas</h4>
                        <h4 class="card-text mt-3" style="color: rgb(247, 178, 193); text-shadow: 1px 1px 2px rgba(0, 0, 0, 0.3);">R$ <?php echo $total_despesas_semanais + $total_contas_a_pagar; ?></h4>
                        <hr style="border-top-color: #fff;">
                      </div>
                    </div>
                  </div>

                  <div class="col-md-6">
                    <div class="card bg-dark">
                      <div class="card-body">
                        <h5 class="card-title text-light">Gráfico</h5>
                        <canvas id="myChart" style="max-width: 100%; max-height: 336px;"></canvas>
                        <hr style="border-top-color: #fff;">
                      </div>
                    </div>
                  </div>
                </div>
              </div>

              <!-- Tabela de Despesas Semanais e Contas a Pagar -->
                <div class="container mt-4">
                  <div class="row justify-content-center">
                    <div class="col-12">
                      <table class='table table-dark text-center mb-4'>
                        <thead class='table-light'>
                          <tr>
                            <th scope='col'>Categoria</th>
                            <th scope='col'>Valor</th>
                            <th scope='col'>Data</th>
                          </tr>
                        </thead>
                      <tbody>
                        <?php
                          $sql_despesas_semanais = "SELECT ds.valor, DATE_FORMAT(ds.data, '%d/%m/%Y') AS data_formatada, c.nome 
                          FROM despesas_semanais ds
                          INNER JOIN categorias c ON ds.categoria_id = c.id";
                            $resultado_despesas_semanais = $conn->query($sql_despesas_semanais);
                            if ($resultado_despesas_semanais->num_rows > 0) {
                              while ($row = $resultado_despesas_semanais->fetch_assoc()) {
                                echo "<tr>";
                                echo "<td class='align-middle'>" . $row['nome'] . "</td>";
                                echo "<td class='align-middle'>" . $row['valor'] . "</td>";
                                echo "<td class='align-middle'>" . $row['data_formatada'] . "</td>"; 
                                echo "</tr>";
                              }
                            } else {
                              echo "<tr><td colspan='3'>Nenhuma despesa semanal encontrada.</td></tr>";
                            }
                            ?>
                              <?php
                                $sql_contas_a_pagar = "SELECT cp.valor, DATE_FORMAT(cp.data_vencimento, '%d/%m/%Y') AS data_vencimento_formatada, c.nome 
                                FROM contas_a_pagar cp
                                INNER JOIN categorias c ON cp.categoria_id = c.id";
                                  $resultado_contas_a_pagar = $conn->query($sql_contas_a_pagar);
                                    if ($resultado_contas_a_pagar->num_rows > 0) {
                                      while ($row = $resultado_contas_a_pagar->fetch_assoc()) {
                                        echo "<tr>";
                                        echo "<td class='align-middle'>" . $row['nome'] . "</td>";
                                        echo "<td class='align-middle'>" . $row['valor'] . "</td>";
                                        echo "<td class='align-middle'>" . $row['data_vencimento_formatada'] . "</td>";
                                        echo "</tr>";
                                      }
                                    } else {
                                        echo "<tr><td colspan='3'>Nenhuma conta a pagar encontrada.</td></tr>";
                                    }
                                    ?>
                                  </tbody>
                                </table>
                              </div>
                            </div>
                          </div>
                        </div>
                      </div>


            <footer id="footer" class="bg-dark shadow footer fixed-bottom">
              <div class="container">
                <div class="row justify-content-center mt-4">
                  <p class="titulo-footer">SGP Alpha</p>
                </div>
              </div>
            </footer>

    <script>
    // Dados para o gráfico
    var labels = ['Despesas Semanais', 'Contas a Pagar'];
    var valores = [<?php echo $total_despesas_semanais; ?>, <?php echo $total_contas_a_pagar; ?>];

    // Configuração do gráfico
    var ctx = document.getElementById('myChart').getContext('2d');
    var myChart = new Chart(ctx, {
        type: 'pie',
        data: {
            labels: labels,
            datasets: [{
                label: 'Valor',
                data: valores,
                backgroundColor: [
                    'rgba(255, 99, 132, 0.2)',
                    'rgba(54, 162, 235, 0.2)'
                ],
                borderColor: [
                    'rgba(255, 99, 132, 1)',
                    'rgba(54, 162, 235, 1)'
                ],
                borderWidth: 1
            }]
        },
        options: {
            scales: {
                y: {
                    beginAtZero: true
                }
            }
        }
    });
</script>

  </body>
</php>
