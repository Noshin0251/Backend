var ctx = document.getElementById('myChart').getContext('2d');

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

                /*
                onRefresh: function(chart) {
                    chart.data.datasets[0].data.push({
                        x: Date.now(),
                        y: Math.random() * 100
                    });
                }*/
            }
        }
    }
});

let a = 0;
function get_data(){
    $.ajax({
        url: "../DBGet.php",
        method: "POST",
    })
    .done(function(data){
        a = data;
        console.log(data);
        $('#len').html(data);
    });
    return a;
}