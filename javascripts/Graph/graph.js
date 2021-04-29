
function graph1() {
  new Chart(document.getElementById("line-chart"), {
  type: 'line',
  data: {
    labels: [1,2,3,4,5,6,7,8],
    datasets: [{
        data: [2,4,3,6,5,8,7,9],
        borderColor: "#FF589E",
        fill: true,
        backgroundColor	:"rgba(255, 88, 158,0.1)",
        pointBackgroundColor: "#FF589E"
      }
    ]
  },


  options: {
    responsive: true,
    maintainAspectRatio: false,
    legend: {
    display: false,
    },
    scales: {
        xAxes: [{
            gridLines: {
                display:false
            }
        }],
        yAxes: [{
            gridLines: {
                display:false
            }
        }]
    }

  }
  });

}


function doughnut() {
  new Chart(document.getElementById("doughnut-chart"), {
    type: 'doughnut',
    data: {
      labels: ["Médeçins", "Auto école", "Ecole d'aviation", 'Hopitaux'],
      datasets: [
        {
          label: "Population (millions)",
          backgroundColor: ["#3e95cd", "#8e5ea2","#c45850","#e8c3b9"],
          data: [25, 15, 55, 10]
        }
      ]
    },
    options: {
      responsive: true,
      maintainAspectRatio: false,

    }

  });
}
