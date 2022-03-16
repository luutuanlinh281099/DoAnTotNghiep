<div class="card col-md-12">
     <div class="col-md-12">
          <div class="container">
               <canvas id="myChart"></canvas>
          </div>
     </div>
</div>

@section('js')
<script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/3.6.2/Chart.min.js"></script>
<script>
     $.ajax({
          type: "GET",
          url: '/chart-data',
          success: function(data) {
               var chartData;
               chartData = data;
               let myChart = document.getElementById('myChart').getContext('2d');
               Chart.defaults.global.defaultFontFamily = 'Lato';
               Chart.defaults.global.defaultFontSize = 18;
               Chart.defaults.global.defaultFontColor = '#777';
               let massPopChart = new Chart(myChart, {
                    type: 'bar',
                    data: {
                         labels: chartData.label,
                         datasets: [{
                                   label: 'Tổng lượt xe ',
                                   data: chartData.tong_luot_xe,
                                   backgroundColor: 'green',
                                   backgroundColor: [
                                        'rgba(54, 162, 235, 0.6)',
                                        'rgba(255, 206, 86, 0.6)',
                                        'rgba(75, 192, 192, 0.6)',
                                        'rgba(153, 102, 255, 0.6)',
                                        'rgba(255, 159, 64, 0.6)',
                                        'rgba(255, 99, 132, 0.6)',
                                        'rgba(54, 162, 235, 0.6)',
                                        'rgba(255, 206, 86, 0.6)',
                                        'rgba(75, 192, 192, 0.6)',
                                        'rgba(153, 102, 255, 0.6)',
                                        'rgba(255, 159, 64, 0.6)',
                                        'rgba(255, 99, 132, 0.6)',
                                   ],
                                   borderWidth: 1,
                                   borderColor: '#777',
                                   hoverBorderWidth: 3,
                                   hoverBorderColor: '#000'
                              },
                              {
                                   type: 'line',
                                   label: 'Tổng doanh thu ( 10.000đ )',
                                   data: chartData.tong_doanh_thu,
                                   fill: false,
                                   borderColor: 'rgb(54, 162, 235)'
                              }
                         ]
                    },
                    options: {
                         scales: {
                              yAxes: [{
                                   ticks: {
                                        beginAtZero: true
                                   }
                              }]
                         },
                         title: {
                              display: true,
                              text: 'Biểu thống kê hàng theo các tháng của năm 2022',
                              fontSize: 30
                         },
                         legend: {
                              display: true,
                              position: 'right',
                              labels: {
                                   fontColor: '#000'
                              }
                         },
                         layout: {
                              padding: {
                                   left: 0,
                                   right: 0,
                                   bottom: 0,
                                   top: 0
                              }
                         },
                         tooltips: {
                              enabled: true
                         }
                    }
               });
          },
          error: function(error) {}
     });
</script>
@endsection