
function lineChart() {
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
        pointBackgroundColor: gradientStroke,
        tension: 0.3,
        cubicInterpolationMode: 'default',
      }
    ]
  },


  options: {
    responsive: true,
    maintainAspectRatio: false,
    plugins: {
      legend: {
        labels: {
          usePointStyle: true,
        },
        display: false,
      }
    },
    scales: {
        x: {
          grid: {
              display:false,
          },
          ticks: {
            display:false,
          }
        },
        y: {
          grid: {
              display:false,
          },
          ticks: {
            beginAtZero: true,
            autoSkip: true,
            maxTicksLimit: 2
          }
        }
    }

  }
  });

}


function doughnutChart() {
  var ctr = document.getElementById("doughnut-chart").getContext("2d");

  var degrade1 = ctr.createLinearGradient(0, 100, 0, 0);
  degrade1.addColorStop(0, '#fe6fbe');
  degrade1.addColorStop(1, '#ffcfbe');

  var degrade2 = ctr.createLinearGradient(0, 100, 100,0 );
  degrade2.addColorStop(0, '#9877ff');
  degrade2.addColorStop(1, '#f450cd');

  var degrade3 = ctr.createLinearGradient(100, 0,0 , 100);
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
    plugins: {
      legend: {
        labels: {
          usePointStyle: true,
        },
        display: false,
      }
    },
    legend: {
    display: false,
    },
    animation: {
      easing: "easeInOutBack"
    },
    scales: {
        x: {
          grid: {
              display:false,
              drawBorder: false,
          },
          ticks: {
            display: false //this will remove only the label
          }
        },
        y: {
          grid: {
              display:false,
              drawBorder: false,
          },
          ticks: {
            display: false //this will remove only the label
          }
        }
    }

  }
  });

}

function barChart() {
  var ctr = document.getElementById("bar-chart").getContext("2d");

  var degrade1 = ctr.createLinearGradient(0, 100, 0, 0);
  degrade1.addColorStop(0, '#fe6fbe');
  degrade1.addColorStop(1, '#ffcfbe');

  var degrade2 = ctr.createLinearGradient(0, 100, 100,0 );
  degrade2.addColorStop(0, '#9877ff');
  degrade2.addColorStop(1, '#f450cd');

  var degrade3 = ctr.createLinearGradient(100, 0,0 , 100);
  degrade3.addColorStop(0, '#7cf4df');
  degrade3.addColorStop(1, '#62a9fe');

  new Chart(document.getElementById("bar-chart"), {
  type: 'bar',
  data: {
    labels: ["test1", 2, 3, 4,5,6,7,8],
    datasets: [
      {
        data: [25, 16, 15, 20, 30, 40, 10, 13],
        backgroundColor: "#FFDFF0",
        borderColor: "#FF6CBD",
        borderWidth: 1,
        borderRadius: 20,
        barPercentage: 0.5,
      }
    ]
  },


  options: {
    responsive: true,
    maintainAspectRatio: false,
    plugins: {
      legend: {
        labels: {
          usePointStyle: true,
        },
        display: false,
      }
    },
    animation: {
      easing: "easeInOutBack"
    },
    scales: {
        x: {
          grid: {
              display:false,
              drawBorder: true,
          },
          ticks: {
            display: true //this will remove only the label
          }
        },
        y: {
          grid: {
              display:false,
              drawBorder: true,
          },
          ticks: {
            display: true,//this will remove only the label
            beginAtZero: true,
          }
        }
    }

  }
  });

}

function radarChart(){
  var ctr = document.getElementById("radar-chart").getContext("2d");

  var degrade1 = ctr.createLinearGradient(0, 100, 0, 0);
  degrade1.addColorStop(0, '#fe6fbe');
  degrade1.addColorStop(1, '#ffcfbe');

  var degrade2 = ctr.createLinearGradient(0, 100, 100,0 );
  degrade2.addColorStop(0, '#9877ff');
  degrade2.addColorStop(1, '#f450cd');

  var degrade3 = ctr.createLinearGradient(100, 0,0 , 100);
  degrade3.addColorStop(0, '#7cf4df');
  degrade3.addColorStop(1, '#62a9fe');

  new Chart(document.getElementById("radar-chart"), {
  type: 'radar',
  data: {
    labels: ["test 1", "test 2", "test 3", "test 4", "test 5"],
    datasets: [
      {
        data: [8, 6, 9, 4, 5],
        backgroundColor: "#FFDFF0",
        borderColor: "#FF6CBD",
        borderWidth: 1,
        borderRadius: 20,
        barPercentage: 0.5,
        scaleSteps: 5,
        scaleStepWidth: 5,
        scaleStartValue: 0,
      }
    ]
  },


  options: {
    responsive: true,
    maintainAspectRatio: false,
    plugins: {
      legend: {
        labels: {
          usePointStyle: true,
        },
        display: false,
      }
    },
    animation: {
      easing: "easeInOutBack"
    },
    scales: {
      r: {
        suggestedMin: 0,
        suggestedMax: 10
      }
    }
  }
  });
}

