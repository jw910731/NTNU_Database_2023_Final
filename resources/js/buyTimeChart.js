import Chart from 'chart.js/auto';

document.addEventListener("DOMContentLoaded", function () {
    var ctx = document.getElementById('buyTimeChart').getContext('2d');
    var myChart = new Chart(ctx, {
        type: 'line',
        data: {
            labels: ['子', '丑', '寅', '卯', '辰', '巳', '午', '未', '申', '酉', '戌', '亥'],
            datasets: [{
                label: '各時辰購買次數',
                data: buyTimeList,
            }]
        },
        options: {
            scales: {
                y: {
                    beginAtZero: true
                }
            }
        }
    });
});
