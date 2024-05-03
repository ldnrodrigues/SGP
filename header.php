<!DOCTYPE html>
<html lang="pt-br" data-bs-theme="auto">
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
    <link href="style.css" rel="stylesheet">

    <link href="css/header.css" rel="stylesheet">

    <link href="css/footer.css" rel="stylesheet">

    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>

    <!-- Script -->
    <script src="script.js"></script>

    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css" integrity="sha512-<HASH>" crossorigin="anonymous" />

</head>

<body style="background-color: #191f24;">

<header class="navbar p-1 bg-dark shadow justify-content-start">
    <div class="col-4">
        <button class="openbtn btn btn-dark" onclick="openNav()">☰</button>
    </div>
    <div class="col-4 d-flex justify-content-center">
        <a href="index.php" style="text-decoration: none;"><span class="navbar-brand text-light">Sistema de Gestão Financeira Pessoal</span></a>
    </div>
</header>

<!-- Barra lateral -->
<div id="mySidebar" class="sidebar bg-dark shadow">
    <a href="javascript:void(0)" class="closebtn" onclick="closeNav()">×</a>
    <a href="index.php"><i class="fas fa-home"></i> Início</a>
    <a href="Outras-pag/Mensal.php"><i class="fas fa-chart-line"></i> Gasto Mensal</a>
    <a href="Outras-pag/Semanal.php"><i class="fas fa-calendar-week"></i> Gasto Semanal</a>
    <a href="Outras-pag/Contas-pagar.php"><i class="fas fa-file-invoice-dollar"></i> Contas a Pagar</a>
</div>