
function graph1() {
  var ctx = document.getElementById('line-chart').getContext("2d");

  var gradientStroke = ctx.createLinearGradient(500, 0, 100, 0);
  gradientStroke.addColorStop(0, '#fe6cbd');
  gradientStroke.addColorStop(1, '#ffd2be');

  var gradientStroke2 = ctx.createLinearGradient(500, 0, 100, 0);
  gradientStroke2.addColorStop(0, '#ffdef0');
  gradientStroke2.addColorStop(1, '#fff5f0');

  new Chart(document.getElementById("line-chart"), {
  type: 'line',
  data: {
    labels: [1,2,3,4,5,6,7,8],
    datasets: [{
        data: [2,5,7,6,5,8,7,9],
        borderColor: gradientStroke,
        fill: true,
        backgroundColor	:gradientStroke2,
        pointBackgroundColor: gradientStroke
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
                display:false,
                drawBorder: false,
            },
            ticks: {
              display:false
            }
            
        }],
        yAxes: [{
            gridLines: {
                display:false,
            },
            ticks: {
              beginAtZero: true,
              autoSkip: true,
              maxTicksLimit: 2
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
      animation: {
        easing: "easeInOutBack"
      }
    }

  });
}



function graph2() {
  var ctr = document.getElementById("doughnut-chart").getContext("2d");

  var degrade1 = ctr.createLinearGradient(0, 100, 0, 0);
  degrade1.addColorStop(0, '#fe6fbe');
  degrade1.addColorStop(1, '#ffcfbe');

  var degrade2 = ctr.createLinearGradient(0, 100, 100,0 );
  degrade2.addColorStop(0, '#9877ff');
  degrade2.addColorStop(1, '#f450cd');

  var degrade3 = ctr.createLinearGradient(0, 100, 100, 0);
  degrade3.addColorStop(0, '#7cf4df');
  degrade3.addColorStop(1, '#62a9fe');

  new Chart(document.getElementById("doughnut-chart"), {
  type: 'doughnut',
  data: {
    labels: [25, 15, 35, 10],
    datasets: [{
        data: [25, 15, 15,20 ],
        backgroundColor: [degrade1, degrade2,degrade3,"#f1f3f9"],
      }
    ]
  },


  options: {
    responsive: true,
    maintainAspectRatio: false,
    legend: {
    display: false,
    },
    animation: {
      easing: "easeInOutBack"
    },
    scales: {
        xAxes: [{
            gridLines: {
                display:false,
                drawBorder: false,
            },
            ticks: {
              display: false //this will remove only the label
          }
        }],
        yAxes: [{
            gridLines: {
                display:false,
                drawBorder: false,
            },
            ticks: {
              display: false //this will remove only the label
          }
        }]
    }

  }
  });

}


