
// ここから横幅だけをレスポンシブにして縦幅は指定したサイズで表示する
window.onload = function() {
var ctx = document.getElementById('canvas').getContext('2d');
ctx.canvas.height = 280;

var myChart = new Chart(ctx, {
  type: 'line',
  data: {
    labels: ['1月', '2月', '3月'],
    datasets: [ 
      {
        label: '入居者数',
        data: [6, 18, 28],
        animation : true,
        //...各設定
      }]
  },
  options: {
    responsive: true,
    maintainAspectRatio: false
  }
});
};