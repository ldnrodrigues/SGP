function openNav() {
  document.getElementById("mySidebar").style.left = "0";
}

function closeNav() {
  document.getElementById("mySidebar").style.left = "-250px";
}

// Função para adicionar despesa à tabela
function adicionarDespesa() {
  const valor = document.getElementById('valor').value;
  const data = document.getElementById('data').value;
  const descricao = document.getElementById('descricao').value;

  // Adiciona a despesa à tabela
  const tableBody = document.querySelector('#despesas tbody');
  const newRow = tableBody.insertRow();
  newRow.innerHTML = `<td>R$ ${valor}</td><td>${data}</td><td>${descricao}</td><td></td>`;

  // Calcula e atualiza o total de despesas
  calcularTotalDespesas();
}

// Função para calcular e atualizar o total de despesas
function calcularTotalDespesas() {
  const rows = document.querySelectorAll('#despesas tbody tr');
  let totalDespesas = 0;
  rows.forEach(row => {
    totalDespesas += parseFloat(row.cells[0].innerText.split(' ')[1]);
  });

  // Atualiza o card de despesas
  document.getElementById('totalDespesas').innerText = `R$ ${totalDespesas.toFixed(2)}`;

  // Atualiza o card de salário
  const salario = 2000;
  const saldo = salario - totalDespesas;
  document.getElementById('saldo').innerText = `R$ ${saldo.toFixed(2)}`;
}
