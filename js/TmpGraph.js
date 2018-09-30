var ctx = document.getElementById('myChart').getContext('2d');

//JQuery使って属性を取得する、JSON.parseで扱える形に変換
var $script = $('#script');
var result = JSON.parse($script.attr('data-param'));
//確認
console.log(result);

var chart = new Chart(ctx, {
    type: 'line',               
    data: {
        datasets: [{
            data: []            
        }]
    },
    options: {
        scales: {
            xAxes: [{
                type: 'realtime'    
            }]
        },
        plugins: {
            responsive: true,
            maintainAspectRatio: false,
            streaming: {            
                duration: 200000,    
                refresh: 10000,      
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
/*
let a = 0;
function client(){
    $.ajax({
        url: '../php/DB_GET_TO_ajax.phpp',   //サーバ側のphp
        type: 'GET',           //GETかPOSTか
        data: {                //呼び出し先のパラメータ
            parameter1: 'GETパラメータの値',
            parameter2: 'GETパラメータの値',
        },
       dataType: 'json'        //サーバ側からの返却形式、XMLとかも可能
    })
    .done(function(data) {
        //成功した場合に行う処理
        a = data;
        console.log(data);
        $('#len').html(data);
    })
    .fail(function(data) {
        //失敗した場合に行う処理
    })
    .always(function(data) {
        //常に行う処理
    });
    return a;
};
*/