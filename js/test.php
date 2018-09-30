<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
</head>
<body>

<canvas id="myChart"></canvas>


<script type="text/javascript" src="moment.js"></script>
<script type="text/javascript" src="Chart.js"></script>
<script type="text/javascript" src="chartjs-plugin-streaming.js"></script>
<script>

var ctx = document.getElementById('myChart').getContext('2d');
var chart = new Chart(ctx, {
    type: 'line',               
    data: {
        datasets: [{
            data: [],            
            label: 'Unknowグラフ',
        }]
    },
    options: {
        scales: {
            xAxes: [{
                type: 'realtime', 
            }],
            yAxes: [
        {
          ticks: {
            beginAtZero: true,
            min: 0,
            max: 100
          }
        }
      ]
        },
        plugins: {
            streaming: {            
                duration: 20000,    
                refresh: 1000,      
                delay: 1000,        
                frameRate: 30,      
                pause: false,       

                onRefresh: function(chart) {
                    chart.data.datasets[0].data.push({
                        x: Date.now(),
                        y: get_data()
                    });
                }
            }
        }
    }
});
//初期値0
let a = 0;
function get_data(){
    //sample.phpの数字を取りに行く
    $.ajax({
        url: "GETDB.php",
        method: "POST",
    })
    .done(function(data){
        a = data;
    });
    //数字を返す
    return a;
}

</script>
</body>
</html>
