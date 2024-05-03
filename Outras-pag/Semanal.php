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

</head>

<body style="background-color: #191f24;">

  <header class="navbar p-1 bg-dark shadow justify-content-start">
    <div class="col-4">
      <button class="openbtn btn btn-dark" onclick="openNav()">☰</button>
    </div>
    <div class="col-4 d-flex justify-content-center">
      <a href="../index.php" style="text-decoration: none;"><span class="navbar-brand text-light">Sistema de Gestão Financeira Pessoal</span></a>
    </div>
  </header>

  <!-- Barra lateral -->
  <div id="mySidebar" class="sidebar bg-dark shadow">
    <a href="javascript:void(0)" class="closebtn" onclick="closeNav()">×</a>
    <a href="../index.php"><i class="fas fa-home"></i> Início</a>
    <a href="Mensal.php"><i class="fas fa-chart-line"></i> Gasto Mensal</a>
    <a href="Semanal.php"><i class="fas fa-calendar-week"></i> Gasto Semanal</a>
    <a href="Contas-pagar.php"><i class="fas fa-file-invoice-dollar"></i> Contas a Pagar</a>
  </div>

  <!-- Página principal -->

  <div class="container mt-5">
    <div class="row">
      <h1>Semana 1</h1><hr>
    </div>
  </div>

  <div class="container mt-2" id="main">
    <div class="row">

      <div class="col d-flex justify-content-end">
        <div class="card bg-danger">
          <div class="card-body">
            <img src="../Imagens/Icones/perda.png" alt="" style="max-width: 45px;">
            <h4 class="card-title text-light mt-3">Total Despesas</h4>
            <h4 class="card-text text-light mt-3">R$ - 1.500,00</h4>
            <hr style="color: #fff;">
          </div>
        </div>
      </div>

    </div>
  </div>

  <div class="container mt-5">
    <div class="row">
      <div class="col-12">
        <table class="table table-dark table-rounded text-center">
          <thead>
            <tr>
              <th scope="col">Segunda</th>
              <th scope="col">Terça</th>
              <th scope="col">Quarta</th>
              <th scope="col">Quinta</th>
              <th scope="col">Sexta</th>
              <th scope="col">Sábado</th>
              <th scope="col">Domingo</th>
              <th scope="col">Ação</th>
            </tr>
          </thead>
          <tbody>
            <tr>
              <td>R$ 80,00</td>
              <td>R$ 80,00</td>
              <td>R$ 80,00</td>
              <td>R$ 80,00</td>
              <td>R$ 80,00</td>
              <td>R$ 80,00</td>
              <td>R$ 80,00</td>
              <td><button type="button" class="btn btn-danger me-md-2 btn-sm">Deletar</button><button type="button" class="btn btn-success btn-sm">Atualizar</button></td>
            </tr>
            <tr>
              <td>R$ 80,00</td>
              <td>R$ 80,00</td>
              <td>R$ 80,00</td>
              <td>R$ 80,00</td>
              <td>R$ 80,00</td>
              <td>R$ 80,00</td>
              <td>R$ 80,00</td>
              <td><button type="button" class="btn btn-danger me-md-2 btn-sm">Deletar</button><button type="button" class="btn btn-success btn-sm">Atualizar</button></td>
            </tr>
            <tr>
              <td>R$ 80,00</td>
              <td>R$ 80,00</td>
              <td>R$ 80,00</td>
              <td>R$ 80,00</td>
              <td>R$ 80,00</td>
              <td>R$ 80,00</td>
              <td>R$ 80,00</td>
              <td><button type="button" class="btn btn-danger me-md-2 btn-sm">Deletar</button><button type="button" class="btn btn-success btn-sm">Atualizar</button></td>
            </tr>
          </tbody>
        </table>
      </div>
    </div>
  </div>

  <!-- Botão para abrir o modal -->
  <div class="container mt-3 d-flex justify-content-end">
    <button class="btn btn-light" data-bs-toggle="modal" data-bs-target="#modalAdicionarDespesa">Adicionar Despesa</button>
  </div>

  <div class="container mt-5">
    <div class="row">
      <h1>Semana 2</h1><hr>
    </div>
  </div>

  <div class="container mt-2" id="main">
    <div class="row">

      <div class="col d-flex justify-content-end">
        <div class="card bg-danger">
          <div class="card-body">
            <img src="../Imagens/Icones/perda.png" alt="" style="max-width: 45px;">
            <h4 class="card-title text-light mt-3">Total Despesas</h4>
            <h4 class="card-text text-light mt-3">R$ - 1.500,00</h4>
            <hr style="color: #fff;">
          </div>
        </div>
      </div>

    </div>
  </div>

  <div class="container mt-5">
    <div class="row">
      <div class="col-12">
        <table class="table table-dark table-rounded text-center">
          <thead>
            <tr>
              <th scope="col">Segunda</th>
              <th scope="col">Terça</th>
              <th scope="col">Quarta</th>
              <th scope="col">Quinta</th>
              <th scope="col">Sexta</th>
              <th scope="col">Sábado</th>
              <th scope="col">Domingo</th>
              <th scope="col">Ação</th>
            </tr>
          </thead>
          <tbody>
            <tr>
              <td>R$ 80,00</td>
              <td>R$ 80,00</td>
              <td>R$ 80,00</td>
              <td>R$ 80,00</td>
              <td>R$ 80,00</td>
              <td>R$ 80,00</td>
              <td>R$ 80,00</td>
              <td><button type="button" class="btn btn-danger me-md-2 btn-sm">Deletar</button><button type="button" class="btn btn-success btn-sm">Atualizar</button></td>
            </tr>
            <tr>
              <td>R$ 80,00</td>
              <td>R$ 80,00</td>
              <td>R$ 80,00</td>
              <td>R$ 80,00</td>
              <td>R$ 80,00</td>
              <td>R$ 80,00</td>
              <td>R$ 80,00</td>
              <td><button type="button" class="btn btn-danger me-md-2 btn-sm">Deletar</button><button type="button" class="btn btn-success btn-sm">Atualizar</button></td>
            </tr>
            <tr>
              <td>R$ 80,00</td>
              <td>R$ 80,00</td>
              <td>R$ 80,00</td>
              <td>R$ 80,00</td>
              <td>R$ 80,00</td>
              <td>R$ 80,00</td>
              <td>R$ 80,00</td>
              <td><button type="button" class="btn btn-danger me-md-2 btn-sm">Deletar</button><button type="button" class="btn btn-success btn-sm">Atualizar</button></td>
            </tr>
          </tbody>
        </table>
      </div>
    </div>
  </div>

  <!-- Botão para abrir o modal -->
  <div class="container mt-3 d-flex justify-content-end">
    <button class="btn btn-light" data-bs-toggle="modal" data-bs-target="#modalAdicionarDespesa">Adicionar Despesa</button>
  </div>

  <div class="container mt-5">
    <div class="row">
      <h1>Semana 3</h1><hr>
    </div>
  </div>

  <div class="container mt-2" id="main">
    <div class="row">

      <div class="col d-flex justify-content-end">
        <div class="card bg-danger" style="max-width: 20%;">
          <div class="card-body">
            <img src="../Imagens/Icones/perda.png" alt="" style="max-width: 45px;">
            <h4 class="card-title text-light mt-3">Total Despesas</h4>
            <h4 class="card-text text-light mt-3">R$ - 1.500,00</h4>
            <hr style="color: #fff;">
          </div>
        </div>
      </div>

    </div>
  </div>

  <div class="container mt-5">
    <div class="row">
      <div class="col-12">
        <table class="table table-dark table-rounded text-center">
          <thead>
            <tr>
              <th scope="col">Segunda</th>
              <th scope="col">Terça</th>
              <th scope="col">Quarta</th>
              <th scope="col">Quinta</th>
              <th scope="col">Sexta</th>
              <th scope="col">Sábado</th>
              <th scope="col">Domingo</th>
              <th scope="col">Ação</th>
            </tr>
          </thead>
          <tbody>
            <tr>
              <td>R$ 80,00</td>
              <td>R$ 80,00</td>
              <td>R$ 80,00</td>
              <td>R$ 80,00</td>
              <td>R$ 80,00</td>
              <td>R$ 80,00</td>
              <td>R$ 80,00</td>
              <td><button type="button" class="btn btn-danger me-md-2 btn-sm">Deletar</button><button type="button" class="btn btn-success btn-sm">Atualizar</button></td>
            </tr>
            <tr>
              <td>R$ 80,00</td>
              <td>R$ 80,00</td>
              <td>R$ 80,00</td>
              <td>R$ 80,00</td>
              <td>R$ 80,00</td>
              <td>R$ 80,00</td>
              <td>R$ 80,00</td>
              <td><button type="button" class="btn btn-danger me-md-2 btn-sm">Deletar</button><button type="button" class="btn btn-success btn-sm">Atualizar</button></td>
            </tr>
            <tr>
              <td>R$ 80,00</td>
              <td>R$ 80,00</td>
              <td>R$ 80,00</td>
              <td>R$ 80,00</td>
              <td>R$ 80,00</td>
              <td>R$ 80,00</td>
              <td>R$ 80,00</td>
              <td><button type="button" class="btn btn-danger me-md-2 btn-sm">Deletar</button><button type="button" class="btn btn-success btn-sm">Atualizar</button></td>
            </tr>
          </tbody>
        </table>
      </div>
    </div>
  </div>

  <!-- Botão para abrir o modal -->
  <div class="container mt-3 d-flex justify-content-end">
    <button class="btn btn-light" data-bs-toggle="modal" data-bs-target="#modalAdicionarDespesa">Adicionar Despesa</button>
  </div>

  <div class="container mt-5">
    <div class="row">
      <h1>Semana 4</h1><hr>
    </div>
  </div>

  <div class="container mt-2" id="main">
    <div class="row">

<div class="col d-flex justify-content-end">
        <div class="card bg-danger" style="max-width: 20%;">
          <div class="card-body">
            <img src="../Imagens/Icones/perda.png" alt="" style="max-width: 45px;">
            <h4 class="card-title text-light mt-3">Total Despesas</h4>
            <h4 class="card-text text-light mt-3">R$ - 1.500,00</h4>
            <hr style="color: #fff;">
          </div>
        </div>
      </div>

    </div>
  </div>

  <div class="container mt-5">
    <div class="row">
      <div class="col-12">
        <table class="table table-dark table-rounded text-center">
          <thead>
            <tr>
              <th scope="col">Segunda</th>
              <th scope="col">Terça</th>
              <th scope="col">Quarta</th>
              <th scope="col">Quinta</th>
              <th scope="col">Sexta</th>
              <th scope="col">Sábado</th>
              <th scope="col">Domingo</th>
              <th scope="col">Ação</th>
            </tr>
          </thead>
          <tbody>
            <tr>
              <td>R$ 80,00</td>
              <td>R$ 80,00</td>
              <td>R$ 80,00</td>
              <td>R$ 80,00</td>
              <td>R$ 80,00</td>
              <td>R$ 80,00</td>
              <td>R$ 80,00</td>
              <td><button type="button" class="btn btn-danger me-md-2 btn-sm">Deletar</button><button type="button" class="btn btn-success btn-sm">Atualizar</button></td>
            </tr>
            <tr>
              <td>R$ 80,00</td>
              <td>R$ 80,00</td>
              <td>R$ 80,00</td>
              <td>R$ 80,00</td>
              <td>R$ 80,00</td>
              <td>R$ 80,00</td>
              <td>R$ 80,00</td>
              <td><button type="button" class="btn btn-danger me-md-2 btn-sm">Deletar</button><button type="button" class="btn btn-success btn-sm">Atualizar</button></td>
            </tr>
            <tr>
              <td>R$ 80,00</td>
              <td>R$ 80,00</td>
              <td>R$ 80,00</td>
              <td>R$ 80,00</td>
              <td>R$ 80,00</td>
              <td>R$ 80,00</td>
              <td>R$ 80,00</td>
              <td><button type="button" class="btn btn-danger me-md-2 btn-sm">Deletar</button><button type="button" class="btn btn-success btn-sm">Atualizar</button></td>
            </tr>
          </tbody>
        </table>
      </div>
    </div>
  </div>

<!-- Botão para abrir o modal -->
<div class="container mt-3 d-flex justify-content-end">
  <button class="btn btn-light" data-bs-toggle="modal" data-bs-target="#modalAdicionarDespesa">Adicionar Despesa</button>
</div>

<!-- Modal para adicionar despesas -->
<div class="modal fade" id="modalAdicionarDespesa" tabindex="-1" aria-labelledby="modalAdicionarDespesaLabel" aria-hidden="true" style="margin-top: 12rem;">
  <div class="modal-dialog">
    <div class="modal-content bg-dark text-light">
      <div class="modal-header">
        <h5 class="modal-title">Adicionar Despesa</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <div class="mb-3">
          <label for="valorModal" class="form-label">Valor</label>
          <input type="number" class="form-control bg-imput text-light" id="valorModal">
        </div>
        <div class="mb-3">
          <label for="dataModal" class="form-label">Data</label>
          <input type="date" class="form-control bg-imput text-light" id="dataModal">
        </div>
        <div class="mb-3">
          <label for="descricaoModal" class="form-label">Descrição</label>
          <input type="text" class="form-control bg-imput text-light" id="descricaoModal">
        </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Cancelar</button>
        <button type="button" class="btn btn-success" onclick="adicionarDespesa()">Adicionar Despesa</button>
      </div>
    </div>
  </div>
</div>

<footer id="footer" class="bg-dark shadow fixed-bottom">
  <div class="container">
    <div class="row justify-content-center mt-3">
      <p class="titulo-footer">SGP v1.0.0</p>
    </div>
  </div>
</footer>

</body>
</php>
