const ctx = document.getElementById("grafico").getContext("2d");
const nomesDaSala = document.querySelectorAll(".nomeSala");
const totalEquipamentos = document.querySelectorAll(".contagemEquipamentos");

// Converte os valores da NodeList em arrays
const nomesDaSalaArray = Array.from(nomesDaSala).map(
  (element) => element.textContent
);
const totalEquipamentosArray = Array.from(totalEquipamentos).map(
  (element) => element.textContent
);

new Chart(ctx, {
  type: "bar",
  data: {
    labels: nomesDaSalaArray,
    datasets: [
      {
        label: "Total de Equipamentos",
        data: totalEquipamentosArray,
        backgroundColor: "#c3d7f9",
        borderWidth: 1,
      },
    ],
  },
  options: {
    scales: {
      y: {
        beginAtZero: true,
      },
    },
  },
});
