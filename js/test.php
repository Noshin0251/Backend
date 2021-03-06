<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
</head>
<body>

<canvas id="myChart"></canvas>


   <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <!-- レスポンシブWebデザインを使うために必要なmetaタグ -->
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Bootstrap Sample</title>
    <!-- BootstrapのCSS読み込み -->
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <!-- BootstrapのJavaScriptよりも、jQueryを先に読み込む
    そうしなければ、BootstrapのJavaScriptを使う動きが動作しない  -->
    <!-- jQuery読み込み -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
    <!-- BootstrapのJS読み込み -->
    <script src="js/bootstrap.min.js"></script>
    <!-- chart.jsのJS読み込み -->
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.3.0/Chart.bundle.min.js"></script>
    
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.18.1/moment.js"></script>
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.6.0/Chart.js"></script>
    <script type="text/javascript" src="https://github.com/nagix/chartjs-plugin-streaming/releases/download/v1.2.0/chartjs-plugin-streaming.js"></script>
    
<script>



//JQuery使って属性を取得する、JSON.parseで扱える形に変換
var $script = $('#script');
var result = JSON.parse($script.attr('data-param'));

var ctx = document.getElementById('myChart').getContext('2d');
var chart = new Chart(ctx, {
    type: 'line',               
    data: {
        datasets: [{
            data: [],            
            label: 'Unknowグラフ',
            fillColor: 'rgba(255,211,225,0.5)',//塗りつぶす色
            strokeColor: 'rgba(225,211,225,0.5)',//線の色0
            backgroundColor : 'rgba(255,211,225,0.5)',//塗りつぶす色
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
                        y: result
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
