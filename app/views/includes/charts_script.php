<!-- BIGAAN -->
<script>
Chart.defaults.global.defaultFontFamily = '-apple-system,system-ui,BlinkMacSystemFont,"Segoe UI",Roboto,"Helvetica Neue",Arial,sans-serif';
Chart.defaults.global.defaultFontColor = '#292b2c';
const labels1 = <?php echo json_encode($label01) ?>;
const num1 = <?php echo json_encode($dataset01) ?>;
var ctx = document.getElementById("mylineChartbigaan");
var myLineChart = new Chart(ctx, {
    type: 'line',
    data: {
        labels: labels1,
        datasets: [{
            label: "Patient Records",
            lineTension: 0.3,
            backgroundColor: "rgba(73,163,140,0.71)",
            borderColor: "rgba(2,117,216,1)",
            pointRadius: 5,
            pointBackgroundColor: "rgba(2,117,216,1)",
            pointBorderColor: "rgba(255,255,255,0.8)",
            pointHoverRadius: 5,
            pointHoverBackgroundColor: "rgba(2,117,216,1)",
            pointHitRadius: 50,
            pointBorderWidth: 2,
            data: num1,
        }],
    },
    options: {
        scales: {
            xAxes: [{
                time: {
                    unit: 'date'
                },
                gridLines: {
                    display: false
                },
                ticks: {
                    maxTicksLimit: 7
                }
            }],
            yAxes: [{
                ticks: {
                    min: 0,
                    max: num1.max,
                    maxTicksLimit: 5
                },
                gridLines: {
                    color: "rgba(0, 0, 0, .125)",
                }
            }],
        },
        legend: {
            display: true
        }
    }
});

</script>
<script>
  Chart.defaults.global.defaultFontFamily = '-apple-system,system-ui,BlinkMacSystemFont,"Segoe UI",Roboto,"Helvetica Neue",Arial,sans-serif';
  Chart.defaults.global.defaultFontColor = '#292b2c';
  const labels2 = <?php echo json_encode($label02) ?>;
  const num2 = <?php echo json_encode($dataset02) ?>;
  var ctx = document.getElementById("mydoughChartbigaan");
  var myPieChart = new Chart(ctx, {
      type: 'doughnut',
      data: {
          labels: labels2,
          datasets: [{
              data: num2,
              backgroundColor: ['#007bff', '#dc3545', '#ffc107', '#28a745', '#008080', '#800000','#20c997'],
          }],
      },
  });
</script>
<script>
  Chart.defaults.global.defaultFontFamily = '-apple-system,system-ui,BlinkMacSystemFont,"Segoe UI",Roboto,"Helvetica Neue",Arial,sans-serif';
  Chart.defaults.global.defaultFontColor = '#292b2c';
  const labels3 = <?php echo json_encode($label03) ?>;
  const num3 = <?php echo json_encode($dataset03) ?>;
  var ctx = document.getElementById("myPieChartbigaan");
  var myPieChart = new Chart(ctx, {
      type: 'pie',
      data: {
          labels: labels3,
          datasets: [{
              data: num3,
              backgroundColor: ['#007bff', '#dc3545', '#ffc107', '#28a745', '#008080', '#800000','#20c997'],
          }],
      },
  });
</script>



<!-- CALANGATAN -->
<script>
Chart.defaults.global.defaultFontFamily = '-apple-system,system-ui,BlinkMacSystemFont,"Segoe UI",Roboto,"Helvetica Neue",Arial,sans-serif';
Chart.defaults.global.defaultFontColor = '#292b2c';
const labels11 = <?php echo json_encode($label11) ?>;
const num11 = <?php echo json_encode($dataset11) ?>;
var ctx = document.getElementById("mylineChartcalangatan");
var myLineChart2 = new Chart(ctx, {
    type: 'line',
    data: {
        labels: labels11,
        datasets: [{
            label: "Patient Records",
            lineTension: 0.3,
            backgroundColor: "rgba(73,163,140,0.71)",
            borderColor: "rgba(2,117,216,1)",
            pointRadius: 5,
            pointBackgroundColor: "rgba(2,117,216,1)",
            pointBorderColor: "rgba(255,255,255,0.8)",
            pointHoverRadius: 5,
            pointHoverBackgroundColor: "rgba(2,117,216,1)",
            pointHitRadius: 50,
            pointBorderWidth: 2,
            data: num11,
        }],
    },
    options: {
        scales: {
            xAxes: [{
                time: {
                    unit: 'date'
                },
                gridLines: {
                    display: false
                },
                ticks: {
                    maxTicksLimit: 7
                }
            }],
            yAxes: [{
                ticks: {
                    min: 0,
                    max: num11.max,
                    maxTicksLimit: 5
                },
                gridLines: {
                    color: "rgba(0, 0, 0, .125)",
                }
            }],
        },
        legend: {
            display: true
        }
    }
});

</script>
<script>
  Chart.defaults.global.defaultFontFamily = '-apple-system,system-ui,BlinkMacSystemFont,"Segoe UI",Roboto,"Helvetica Neue",Arial,sans-serif';
  Chart.defaults.global.defaultFontColor = '#292b2c';
  const labels12 = <?php echo json_encode($label12) ?>;
  const num12 = <?php echo json_encode($dataset12) ?>;
  var ctx = document.getElementById("mydoughChartcalangatan");
  var myPieChart2 = new Chart(ctx, {
      type: 'doughnut',
      data: {
          labels: labels12,
          datasets: [{
              data: num12,
              backgroundColor: ['#007bff', '#dc3545', '#ffc107', '#28a745', '#008080', '#800000','#20c997'],
          }],
      },
  });
</script>
<script>
  Chart.defaults.global.defaultFontFamily = '-apple-system,system-ui,BlinkMacSystemFont,"Segoe UI",Roboto,"Helvetica Neue",Arial,sans-serif';
  Chart.defaults.global.defaultFontColor = '#292b2c';
  const labels13 = <?php echo json_encode($label13) ?>;
  const num13 = <?php echo json_encode($dataset13) ?>;
  var ctx = document.getElementById("myPieChartcalangatan");
  var myPieChart2 = new Chart(ctx, {
      type: 'pie',
      data: {
          labels: labels13,
          datasets: [{
              data: num13,
              backgroundColor: ['#007bff', '#dc3545', '#ffc107', '#28a745', '#008080', '#800000','#20c997'],
          }],
      },
  });
</script>



<!-- CALSAPA -->
<script>
Chart.defaults.global.defaultFontFamily = '-apple-system,system-ui,BlinkMacSystemFont,"Segoe UI",Roboto,"Helvetica Neue",Arial,sans-serif';
Chart.defaults.global.defaultFontColor = '#292b2c';
const labels21 = <?php echo json_encode($label21) ?>;
const num21 = <?php echo json_encode($dataset21) ?>;
var ctx = document.getElementById("mylineChartcalsapa");
var myLineChart3 = new Chart(ctx, {
    type: 'line',
    data: {
        labels: labels21,
        datasets: [{
            label: "Patient Records",
            lineTension: 0.3,
            backgroundColor: "rgba(73,163,140,0.71)",
            borderColor: "rgba(2,117,216,1)",
            pointRadius: 5,
            pointBackgroundColor: "rgba(2,117,216,1)",
            pointBorderColor: "rgba(255,255,255,0.8)",
            pointHoverRadius: 5,
            pointHoverBackgroundColor: "rgba(2,117,216,1)",
            pointHitRadius: 50,
            pointBorderWidth: 2,
            data: num21,
        }],
    },
    options: {
        scales: {
            xAxes: [{
                time: {
                    unit: 'date'
                },
                gridLines: {
                    display: false
                },
                ticks: {
                    maxTicksLimit: 7
                }
            }],
            yAxes: [{
                ticks: {
                    min: 0,
                    max: num21.max,
                    maxTicksLimit: 5
                },
                gridLines: {
                    color: "rgba(0, 0, 0, .125)",
                }
            }],
        },
        legend: {
            display: true
        }
    }
});

</script>
<script>
  Chart.defaults.global.defaultFontFamily = '-apple-system,system-ui,BlinkMacSystemFont,"Segoe UI",Roboto,"Helvetica Neue",Arial,sans-serif';
  Chart.defaults.global.defaultFontColor = '#292b2c';
  const labels22 = <?php echo json_encode($label22) ?>;
  const num22 = <?php echo json_encode($dataset22) ?>;
  var ctx = document.getElementById("mydoughChartcalsapa");
  var myPieChart3 = new Chart(ctx, {
      type: 'doughnut',
      data: {
          labels: labels22,
          datasets: [{
              data: num22,
              backgroundColor: ['#007bff', '#dc3545', '#ffc107', '#28a745', '#008080', '#800000','#20c997'],
          }],
      },
  });
</script>
<script>
  Chart.defaults.global.defaultFontFamily = '-apple-system,system-ui,BlinkMacSystemFont,"Segoe UI",Roboto,"Helvetica Neue",Arial,sans-serif';
  Chart.defaults.global.defaultFontColor = '#292b2c';
  const labels23 = <?php echo json_encode($label23) ?>;
  const num23 = <?php echo json_encode($dataset23) ?>;
  var ctx = document.getElementById("myPieChartcalsapa");
  var myPieChart3 = new Chart(ctx, {
      type: 'pie',
      data: {
          labels: labels23,
          datasets: [{
              data: num23,
              backgroundColor: ['#007bff', '#dc3545', '#ffc107', '#28a745', '#008080', '#800000','#20c997'],
          }],
      },
  });
</script>



<!-- ILAG -->
<script>
Chart.defaults.global.defaultFontFamily = '-apple-system,system-ui,BlinkMacSystemFont,"Segoe UI",Roboto,"Helvetica Neue",Arial,sans-serif';
Chart.defaults.global.defaultFontColor = '#292b2c';
const labels31 = <?php echo json_encode($label31) ?>;
const num31 = <?php echo json_encode($dataset31) ?>;
var ctx = document.getElementById("mylineChartilag");
var myLineChart = new Chart(ctx, {
    type: 'line',
    data: {
        labels: labels31,
        datasets: [{
            label: "Patient Records",
            lineTension: 0.3,
            backgroundColor: "rgba(73,163,140,0.71)",
            borderColor: "rgba(2,117,216,1)",
            pointRadius: 5,
            pointBackgroundColor: "rgba(2,117,216,1)",
            pointBorderColor: "rgba(255,255,255,0.8)",
            pointHoverRadius: 5,
            pointHoverBackgroundColor: "rgba(2,117,216,1)",
            pointHitRadius: 50,
            pointBorderWidth: 2,
            data: num31,
        }],
    },
    options: {
        scales: {
            xAxes: [{
                time: {
                    unit: 'date'
                },
                gridLines: {
                    display: false
                },
                ticks: {
                    maxTicksLimit: 7
                }
            }],
            yAxes: [{
                ticks: {
                    min: 0,
                    max: num31.max,
                    maxTicksLimit: 5
                },
                gridLines: {
                    color: "rgba(0, 0, 0, .125)",
                }
            }],
        },
        legend: {
            display: true
        }
    }
});

</script>
<script>
  Chart.defaults.global.defaultFontFamily = '-apple-system,system-ui,BlinkMacSystemFont,"Segoe UI",Roboto,"Helvetica Neue",Arial,sans-serif';
  Chart.defaults.global.defaultFontColor = '#292b2c';
  const labels32 = <?php echo json_encode($label32) ?>;
  const num32 = <?php echo json_encode($dataset32) ?>;
  var ctx = document.getElementById("mydoughChartilag");
  var myPieChart = new Chart(ctx, {
      type: 'doughnut',
      data: {
          labels: labels32,
          datasets: [{
              data: num32,
              backgroundColor: ['#007bff', '#dc3545', '#ffc107', '#28a745', '#008080', '#800000','#20c997'],
          }],
      },
  });
</script>
<script>
  Chart.defaults.global.defaultFontFamily = '-apple-system,system-ui,BlinkMacSystemFont,"Segoe UI",Roboto,"Helvetica Neue",Arial,sans-serif';
  Chart.defaults.global.defaultFontColor = '#292b2c';
  const labels33 = <?php echo json_encode($label33) ?>;
  const num33 = <?php echo json_encode($dataset33) ?>;
  var ctx = document.getElementById("myPieChartilag");
  var myPieChart = new Chart(ctx, {
      type: 'pie',
      data: {
          labels: labels33,
          datasets: [{
              data: num33,
              backgroundColor: ['#007bff', '#dc3545', '#ffc107', '#28a745', '#008080', '#800000','#20c997'],
          }],
      },
  });
</script>


<!-- LUMANGBAYAN -->
<script>
Chart.defaults.global.defaultFontFamily = '-apple-system,system-ui,BlinkMacSystemFont,"Segoe UI",Roboto,"Helvetica Neue",Arial,sans-serif';
Chart.defaults.global.defaultFontColor = '#292b2c';
const labels41 = <?php echo json_encode($label41) ?>; //
const num41 = <?php echo json_encode($dataset41) ?>; // 
var ctx = document.getElementById("mylineChartlumangbayan"); // 
var myLineChart = new Chart(ctx, {
    type: 'line',
    data: {
        labels: labels41, //
        datasets: [{
            label: "Patient Records",
            lineTension: 0.3,
            backgroundColor: "rgba(73,163,140,0.71)",
            borderColor: "rgba(2,117,216,1)",
            pointRadius: 5,
            pointBackgroundColor: "rgba(2,117,216,1)",
            pointBorderColor: "rgba(255,255,255,0.8)",
            pointHoverRadius: 5,
            pointHoverBackgroundColor: "rgba(2,117,216,1)",
            pointHitRadius: 50,
            pointBorderWidth: 2,
            data: num41, //
        }],
    },
    options: {
        scales: {
            xAxes: [{
                time: {
                    unit: 'date'
                },
                gridLines: {
                    display: false
                },
                ticks: {
                    maxTicksLimit: 7
                }
            }],
            yAxes: [{
                ticks: {
                    min: 0,
                    max: num41.max,
                    maxTicksLimit: 5
                },
                gridLines: {
                    color: "rgba(0, 0, 0, .125)",
                }
            }],
        },
        legend: {
            display: true
        }
    }
});

</script>
<script>
  Chart.defaults.global.defaultFontFamily = '-apple-system,system-ui,BlinkMacSystemFont,"Segoe UI",Roboto,"Helvetica Neue",Arial,sans-serif';
  Chart.defaults.global.defaultFontColor = '#292b2c';
  const labels42 = <?php echo json_encode($label42) ?>; //
  const num42 = <?php echo json_encode($dataset42) ?>; //
  var ctx = document.getElementById("mydoughChartlumangbayan"); //
  var myPieChart = new Chart(ctx, {
      type: 'doughnut',
      data: {
          labels: labels42,
          datasets: [{
              data: num42, //
              backgroundColor: ['#007bff', '#dc3545', '#ffc107', '#28a745', '#008080', '#800000','#20c997'],
          }],
      },
  });
</script>
<script>
  Chart.defaults.global.defaultFontFamily = '-apple-system,system-ui,BlinkMacSystemFont,"Segoe UI",Roboto,"Helvetica Neue",Arial,sans-serif';
  Chart.defaults.global.defaultFontColor = '#292b2c';
  const labels43 = <?php echo json_encode($label43) ?>; // 
  const num43 = <?php echo json_encode($dataset43) ?>; //
  var ctx = document.getElementById("myPieChartlumangbayan"); //
  var myPieChart = new Chart(ctx, {
      type: 'pie',
      data: {
          labels: labels43, //
          datasets: [{
              data: num43, //
              backgroundColor: ['#007bff', '#dc3545', '#ffc107', '#28a745', '#008080', '#800000','#20c997'],
          }],
      },
  });
</script>


<!-- TACLIGAN -->
<script>
Chart.defaults.global.defaultFontFamily = '-apple-system,system-ui,BlinkMacSystemFont,"Segoe UI",Roboto,"Helvetica Neue",Arial,sans-serif';
Chart.defaults.global.defaultFontColor = '#292b2c';
const labels51 = <?php echo json_encode($label51) ?>; //
const num51 = <?php echo json_encode($dataset51) ?>; // 
var ctx = document.getElementById("mylineCharttacligan"); // 
var myLineChart = new Chart(ctx, {
    type: 'line',
    data: {
        labels: labels51, //
        datasets: [{
            label: "Patient Records",
            lineTension: 0.3,
            backgroundColor: "rgba(73,163,140,0.71)",
            borderColor: "rgba(2,117,216,1)",
            pointRadius: 5,
            pointBackgroundColor: "rgba(2,117,216,1)",
            pointBorderColor: "rgba(255,255,255,0.8)",
            pointHoverRadius: 5,
            pointHoverBackgroundColor: "rgba(2,117,216,1)",
            pointHitRadius: 50,
            pointBorderWidth: 2,
            data: num51, //
        }],
    },
    options: {
        scales: {
            xAxes: [{
                time: {
                    unit: 'date'
                },
                gridLines: {
                    display: false
                },
                ticks: {
                    maxTicksLimit: 7
                }
            }],
            yAxes: [{
                ticks: {
                    min: 0,
                    max: num51.max,
                    maxTicksLimit: 5
                },
                gridLines: {
                    color: "rgba(0, 0, 0, .125)",
                }
            }],
        },
        legend: {
            display: true
        }
    }
});

</script>
<script>
  Chart.defaults.global.defaultFontFamily = '-apple-system,system-ui,BlinkMacSystemFont,"Segoe UI",Roboto,"Helvetica Neue",Arial,sans-serif';
  Chart.defaults.global.defaultFontColor = '#292b2c';
  const labels52 = <?php echo json_encode($label52) ?>; //
  const num52 = <?php echo json_encode($dataset52) ?>; //
  var ctx = document.getElementById("mydoughCharttacligan"); //
  var myPieChart = new Chart(ctx, {
      type: 'doughnut',
      data: {
          labels: labels52,
          datasets: [{
              data: num52, //
              backgroundColor: ['#007bff', '#dc3545', '#ffc107', '#28a745', '#008080', '#800000','#20c997'],
          }],
      },
  });
</script>
<script>
  Chart.defaults.global.defaultFontFamily = '-apple-system,system-ui,BlinkMacSystemFont,"Segoe UI",Roboto,"Helvetica Neue",Arial,sans-serif';
  Chart.defaults.global.defaultFontColor = '#292b2c';
  const labels53 = <?php echo json_encode($label53) ?>; // 
  const num53 = <?php echo json_encode($dataset53) ?>; //
  var ctx = document.getElementById("myPieCharttacligan"); //
  var myPieChart = new Chart(ctx, {
      type: 'pie',
      data: {
          labels: labels53, //
          datasets: [{
              data: num53, //
              backgroundColor: ['#007bff', '#dc3545', '#ffc107', '#28a745', '#008080', '#800000','#20c997'],
          }],
      },
  });
</script>


<!-- POBLACION -->
<script>
Chart.defaults.global.defaultFontFamily = '-apple-system,system-ui,BlinkMacSystemFont,"Segoe UI",Roboto,"Helvetica Neue",Arial,sans-serif';
Chart.defaults.global.defaultFontColor = '#292b2c';
const labels61 = <?php echo json_encode($label61) ?>; //
const num61 = <?php echo json_encode($dataset61) ?>; // 
var ctx = document.getElementById("mylineChartpoblacion"); // 
var myLineChart = new Chart(ctx, {
    type: 'line',
    data: {
        labels: labels61, //
        datasets: [{
            label: "Patient Records",
            lineTension: 0.3,
            backgroundColor: "rgba(73,163,140,0.71)",
            borderColor: "rgba(2,117,216,1)",
            pointRadius: 5,
            pointBackgroundColor: "rgba(2,117,216,1)",
            pointBorderColor: "rgba(255,255,255,0.8)",
            pointHoverRadius: 5,
            pointHoverBackgroundColor: "rgba(2,117,216,1)",
            pointHitRadius: 50,
            pointBorderWidth: 2,
            data: num61, //
        }],
    },
    options: {
        scales: {
            xAxes: [{
                time: {
                    unit: 'date'
                },
                gridLines: {
                    display: false
                },
                ticks: {
                    maxTicksLimit: 7
                }
            }],
            yAxes: [{
                ticks: {
                    min: 0,
                    max: num61.max,
                    maxTicksLimit: 5
                },
                gridLines: {
                    color: "rgba(0, 0, 0, .125)",
                }
            }],
        },
        legend: {
            display: true
        }
    }
});

</script>
<script>
  Chart.defaults.global.defaultFontFamily = '-apple-system,system-ui,BlinkMacSystemFont,"Segoe UI",Roboto,"Helvetica Neue",Arial,sans-serif';
  Chart.defaults.global.defaultFontColor = '#292b2c';
  const labels62 = <?php echo json_encode($label62) ?>; //
  const num62 = <?php echo json_encode($dataset62) ?>; //
  var ctx = document.getElementById("mydoughChartpoblacion"); //
  var myPieChart = new Chart(ctx, {
      type: 'doughnut',
      data: {
          labels: labels62,
          datasets: [{
              data: num62, //
              backgroundColor: ['#007bff', '#dc3545', '#ffc107', '#28a745', '#008080', '#800000','#20c997'],
          }],
      },
  });
</script>
<script>
  Chart.defaults.global.defaultFontFamily = '-apple-system,system-ui,BlinkMacSystemFont,"Segoe UI",Roboto,"Helvetica Neue",Arial,sans-serif';
  Chart.defaults.global.defaultFontColor = '#292b2c';
  const labels63 = <?php echo json_encode($label63) ?>; // 
  const num63 = <?php echo json_encode($dataset63) ?>; //
  var ctx = document.getElementById("myPieChartpoblacion"); //
  var myPieChart = new Chart(ctx, {
      type: 'pie',
      data: {
          labels: labels63, //
          datasets: [{
              data: num63, //
              backgroundColor: ['#007bff', '#dc3545', '#ffc107', '#28a745', '#008080', '#800000','#20c997'],
          }],
      },
  });
</script>


<!-- CAAGUTAYAN -->
<script>
Chart.defaults.global.defaultFontFamily = '-apple-system,system-ui,BlinkMacSystemFont,"Segoe UI",Roboto,"Helvetica Neue",Arial,sans-serif';
Chart.defaults.global.defaultFontColor = '#292b2c';
const labels71 = <?php echo json_encode($label71) ?>; //
const num71 = <?php echo json_encode($dataset71) ?>; // 
var ctx = document.getElementById("mylineChartcaagutayan"); // 
var myLineChart = new Chart(ctx, {
    type: 'line',
    data: {
        labels: labels71, //
        datasets: [{
            label: "Patient Records",
            lineTension: 0.3,
            backgroundColor: "rgba(73,163,140,0.71)",
            borderColor: "rgba(2,117,216,1)",
            pointRadius: 5,
            pointBackgroundColor: "rgba(2,117,216,1)",
            pointBorderColor: "rgba(255,255,255,0.8)",
            pointHoverRadius: 5,
            pointHoverBackgroundColor: "rgba(2,117,216,1)",
            pointHitRadius: 50,
            pointBorderWidth: 2,
            data: num71, //
        }],
    },
    options: {
        scales: {
            xAxes: [{
                time: {
                    unit: 'date'
                },
                gridLines: {
                    display: false
                },
                ticks: {
                    maxTicksLimit: 7
                }
            }],
            yAxes: [{
                ticks: {
                    min: 0,
                    max: num71.max,
                    maxTicksLimit: 5
                },
                gridLines: {
                    color: "rgba(0, 0, 0, .125)",
                }
            }],
        },
        legend: {
            display: true
        }
    }
});

</script>
<script>
  Chart.defaults.global.defaultFontFamily = '-apple-system,system-ui,BlinkMacSystemFont,"Segoe UI",Roboto,"Helvetica Neue",Arial,sans-serif';
  Chart.defaults.global.defaultFontColor = '#292b2c';
  const labels72 = <?php echo json_encode($label72) ?>; //
  const num72 = <?php echo json_encode($dataset72) ?>; //
  var ctx = document.getElementById("mydoughChartcaagutayan"); //
  var myPieChart = new Chart(ctx, {
      type: 'doughnut',
      data: {
          labels: labels72,
          datasets: [{
              data: num72, //
              backgroundColor: ['#007bff', '#dc3545', '#ffc107', '#28a745', '#008080', '#800000','#20c997'],
          }],
      },
  });
</script>
<script>
  Chart.defaults.global.defaultFontFamily = '-apple-system,system-ui,BlinkMacSystemFont,"Segoe UI",Roboto,"Helvetica Neue",Arial,sans-serif';
  Chart.defaults.global.defaultFontColor = '#292b2c';
  const labels73 = <?php echo json_encode($label73) ?>; // 
  const num73 = <?php echo json_encode($dataset73) ?>; //
  var ctx = document.getElementById("myPieChartcaagutayann"); //
  var myPieChart = new Chart(ctx, {
      type: 'pie',
      data: {
          labels: labels73, //
          datasets: [{
              data: num73, //
              backgroundColor: ['#007bff', '#dc3545', '#ffc107', '#28a745', '#008080', '#800000','#20c997'],
          }],
      },
  });
</script>