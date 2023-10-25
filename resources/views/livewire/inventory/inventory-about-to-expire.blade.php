<div>
    <div>

        <canvas id="abouToExpire" width="400" height="400"></canvas>
    </div>

    <script>
        const ctx = document.getElementById('abouToExpire').getContext('2d');
        const expirableProducts = @json($expirableProducts);
        new Chart(ctx, {
            type: 'pie',
            data: {
                labels: expirableProducts.map(product => product.name),
                datasets: [{
                    label: 'Productos próximos a vencer',
                    data: expirableProducts.map(product => product.current_stock),
                    backgroundColor: [
                        'rgba(255, 99, 132, 0.2)',
                        'rgba(255, 159, 64, 0.2)',
                        'rgba(255, 205, 86, 0.2)',
                        'rgba(75, 192, 192, 0.2)',
                        'rgba(54, 162, 235, 0.2)',
                        'rgba(153, 102, 255, 0.2)',
                        'rgba(201, 203, 207, 0.2)'
                    ],
                    borderColor: [
                        'rgb(255, 99, 132)',
                        'rgb(255, 159, 64)',
                        'rgb(255, 205, 86)',
                        'rgb(75, 192, 192)',
                        'rgb(54, 162, 235)',
                        'rgb(153, 102, 255)',
                        'rgb(201, 203, 207)'
                    ],
                    borderWidth: 1
                }]
            },
            options: {
                scales: {
                    y: {
                        beginAtZero: true,
                        ticks: {
                            callback: function(value, index, values) {
                                return '$' + value;
                            }
                        }
                    }
                }
            }
        });
    </script>
</div>
