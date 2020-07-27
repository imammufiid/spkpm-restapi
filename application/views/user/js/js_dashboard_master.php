<script>
    $( document ).ready(function() {
        'use strict'
        //-----------------------
        //- MONTHLY SALES CHART -
        //-----------------------

        // Get context with jQuery - using jQuery's .get() method.
        var salesChartCanvas = $('#salesChart').get(0).getContext('2d')

        var salesChartData = {
            labels  : ['Januari', 'Februari', 'Maret', 'April', 'Mei', 'Juni', 'Juli', 'Agustus', 'September', 'Oktober', 'November', 'Desember'],
            datasets: [
                {
                    label : 'Penjualan',
                    borderColor : 'rgba(60,141,188,0.8)',
                    pointRadius : false,
                    pointColor : '#3b8bba',
                    pointStrokeColor : 'rgba(60,141,188,1)',
                    pointHighlightFill : '#fff',
                    pointHighlightStroke : 'rgba(60,141,188,1)',
                    data : [
                        <?php foreach($Total_penjualan_tahunan as $t) : echo $t.','; endforeach; ?>
                    ]
                },
                {
                    label : 'Pembelian',
                    borderColor : 'rgba(210, 214, 222, 1)',
                    pointRadius : false,
                    pointColor : 'rgba(210, 214, 222, 1)',
                    pointStrokeColor : '#c1c7d1',
                    pointHighlightFill : '#fff',
                    pointHighlightStroke : 'rgba(220,220,220,1)',
                    data : [
                        <?php foreach($Total_pembelian_tahunan as $t) : echo $t.','; endforeach; ?>
                    ]
                },
            ]
        }

        var salesChartOptions = {
            maintainAspectRatio : false,
            responsive : true,
            legend: {
                display: false
            },
            scales: {
                xAxes: [{
                    gridLines : {
                        display : true,
                    }
                }],
                yAxes: [{
                    gridLines : {
                        display : true,
                    },
                    ticks: {
                        suggestedMin: 0,
                        stepSize: 1,
                        beginAtZero: true
                    }
                }]
            }
        }

        // This will get the first returned node in the jQuery collection.
        var salesChart = new Chart(salesChartCanvas, { 
            type: 'line', 
            data: salesChartData, 
            options: salesChartOptions
        });

        //---------------------------
        //- END MONTHLY SALES CHART -
        //---------------------------
    });
</script>