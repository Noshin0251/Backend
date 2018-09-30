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
                duration: 5000,    
                refresh: 10000,      
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

let a = 0;
function get_data(){
    $.ajax({
        url: "../GETDB.php",
        method: "POST",
    })
    .done(function(data){
        a = data;
        console.log(data);
        $('#len').html(data);
    });
    return a;
}