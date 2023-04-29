$(document).ready(function () {
  $(".nav-link").click(function (e) { 
    e.preventDefault();
    let sidebarId = $(this).attr("id");
    if(sidebarId == "statistik"){
      reloadForChart();
    }
  });
});

function reloadForChart(){
  for(i=0; i<=1; i++){
    setTimeout(() => {
      reloadChart();
      console.log("Dilakukan ke- "+i);
    }, 1000);
  }
}

function reloadChart(){
  let data_tanggal = [];
  let data_kwh = [];

  $.getJSON("data/get_log_penggunaan.php",function (data_log) {
      $.each(data_log.result, function() { 
         data_tanggal.push(this.tanggal_penggunaan);
         data_kwh.push(this.total_kwh);
      });

      //-------------
      //- BAR CHART -
      //-------------
      var barChartCanvas = document.getElementById('barChart').getContext('2d');
      let dataForChart = {
        labels: data_tanggal,
        datasets: [{
          label               : 'Total KWH',
          backgroundColor     : 'rgba(60,141,188,0.9)',
          borderColor         : 'rgba(60,141,188,0.8)',
          pointRadius          : false,
          pointColor          : '#3b8bba',
          pointStrokeColor    : 'rgba(60,141,188,1)',
          pointHighlightFill  : '#fff',
          pointHighlightStroke: 'rgba(60,141,188,1)',
          data                : data_kwh
        }]
      };

      var barChartOptions = {
        responsive              : true,
        maintainAspectRatio     : false,
        datasetFill             : false,
        scales: {
          yAxes: [{
              ticks: {
                 beginAtZero : true
              }
          }]
        }
      }

      new Chart(barChartCanvas, {
        type: 'bar',
        data: dataForChart,
        options: barChartOptions
      })
    }
  );
}