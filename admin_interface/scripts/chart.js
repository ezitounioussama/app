new Chart(document.getElementById("pie-chart"), {
  type: "pie",
  data: {
    labels: ["Iphone", "Samsung", "Oppo", "Xiaomi"],
    datasets: [
      {
        backgroundColor: ["#3e95cd", "#8e5ea2", "#3cba9f", "#e8c3b9"],
        data: [2078, 1267, 734, 784],
      },
    ],
  },
  options: {
    title: {
      display: true,
      text: "Most sell phones",
    },
  },
});

new Chart(document.getElementById("doughnut-chart"), {
  type: "doughnut",
  data: {
    labels: ["Africa", "Asia", "Europe", "America"],
    datasets: [
      {
        backgroundColor: ["#3e95cd", "#8e5ea2", "#3cba9f", "#c45850"],
        data: [2478, 5267, 734, 784],
      },
    ],
  },
  options: {
    title: {
      display: true,
      text: "Most people visited your website",
    },
  },
});


new Chart(document.getElementById("bar-chart-horizontal"), {
    type: 'horizontalBar',
    data: {
      labels: ["Apple", "Samsung", "Xiaomi", "Oppo"],
      datasets: [
        {
          label: "Stock of phones by category",
          backgroundColor: ["#8e5ea2","#3cba9f","#e8c3b9","#c45850"],
          data: [19,10,15,7]
        }
      ]
    },
    options: {
      legend: { display: false },
      title: {
        display: true,
        text: 'Stock of phones by category'
      }
    }
});
