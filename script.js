function openNav() {
  document.getElementById("mySidebar").style.left = "0";
}

function closeNav() {
  document.getElementById("mySidebar").style.left = "-250px";
}

var expensesData = {
  labels: ["Alimentação", "Transporte", "Outros"],
  datasets: [{
    data: [300, 150, 100],
    backgroundColor: ["#FF6384", "#36A2EB", "#FFCE56"],
    hoverBackgroundColor: ["#FF6384", "#36A2EB", "#FFCE56"]
  }]
};

// Opções do gráfico
var expensesOptions = {
  responsive: true,
  maintainAspectRatio: false
};

// Inicializa o gráfico
var ctx = document.getElementById("expensesChart").getContext("2d");
var expensesChart = new Chart(ctx, {
  type: 'pie',
  data: expensesData,
  options: expensesOptions
});