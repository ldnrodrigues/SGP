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

  if (date('d') == 1) {
      $mes_ano_atual = date('Ym');
      
      $tabela_mes_anterior = "despesas_$mes_ano_atual";
      $sql_rename = "ALTER TABLE despesas RENAME TO $tabela_mes_anterior";
      if ($conn->query($sql_rename) !== TRUE) {
          echo "Erro ao renomear tabela de despesas: " . $conn->error;
      }
      
      $nova_tabela_despesas = "despesas";
      $sql_create = "CREATE TABLE IF NOT EXISTS $nova_tabela_despesas (
          id INT(11) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
          valor DECIMAL(10,2) NOT NULL,
          data DATE NOT NULL,
          descricao VARCHAR(255) NOT NULL
      )";
      if ($conn->query($sql_create) !== TRUE) {
          echo "Erro ao criar nova tabela de despesas: " . $conn->error;
      }
  }

      // Query para calcular o total das despesas
    $sql = "SELECT SUM(valor) AS total_despesas FROM despesas_semanais";
    $result = $conn->query($sql);
    $total_despesas = 0;

    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();
        $total_despesas = $row['total_despesas'];
    }
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

  <!-- Página principal -->

  <div class="container container-inicial bg-dark shadow rounded">
    <div class="row"></div>

  <!-- Conteúdo da semana 1 -->
  <div class="container mt-5">
    <div class="row">
      <h2>Semana 1</h2>
    </div>

    <div class="container mt-3" id="main" style="margin-bottom: 2rem;">
      <div class="row">
        <div class="card bg-danger shadow rounded" style="max-width: 370px;">
          <div class="card-body">
            <img src="../Imagens/Icones/perda.png" alt="" style="max-width: 41px;">
            <h4 class="card-title text-light mt-3">Total Despesas da Semana</h4>
            <h4 class="card-text text-light mt-3">R$ <?php echo number_format($total_despesas, 2, ',', '.'); ?></h4>
            <hr style="color: #fff;">
          </div>
        </div>
      </div>
    </div>
  </div>

    <div class="container">
      <div class="row justify-content-center">
        <div class="col-12">
          <?php include __DIR__ . '/../crud.php'; ?>
        </div>
      </div>
    </div>

    <div class="container mt-1 d-flex justify-content-end">
      <button class="btn btn-light mb-4" data-bs-toggle="modal" data-bs-target="#modalAdicionarDespesaSemana1">Adicionar Despesa</button>
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

<!-- Modais -->

<div class="modal fade" id="modalAdicionarDespesaSemana1" tabindex="-1" aria-labelledby="modalAdicionarDespesa1Label" aria-hidden="true" style="margin-top: 12rem;">
  <div class="modal-dialog modal-lg">
    <div class="modal-content bg-dark text-light">
      <div class="modal-header">
        <h5 class="modal-title">Adicionar Despesa</h5>
        <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <form action="Semanal.php" method="POST">
          <input type="hidden" name="action" value="inserir">
          <div class="mb-3">
            <label for="valorModal1" class="form-label">Valor</label>
            <input type="number" class="form-control bg-imput text-light" id="valorModal1" name="valor">
          </div>
          <div class="mb-3">
            <label for="dataModal1" class="form-label">Data</label>
            <input type="date" class="form-control bg-imput text-light" id="dataModal1" name="data">
          </div>
          <div class="mb-3">
            <label for="categoriaModal1" class="form-label">Categoria</label>
            <select class="form-select bg-imput text-light" id="categoriaModal1" name="categoria">
              <?php include '../consulta-modal.php' ?>
            </select>
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Cancelar</button>
            <button type="submit" class="btn btn-light">Adicionar Despesa</button>
          </div>
        </form>
      </div>
    </div>
  </div>
</div>

<script>
  AOS.init();
</script>

</body>
</php>
