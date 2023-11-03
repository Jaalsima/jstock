<div class="border-4 border-green-500 p-4 rounded-lg dark:bg-gray-300 bg-opacity-70">

    <div>
        <canvas id="earningsChart" width="400" height="100"></canvas>
    </div>

    <script>
        const ctx = document.getElementById('earningsChart').getContext('2d');
        new Chart(ctx, {
            type: 'line',
            data: {
                labels: @json(array_column($monthlyEarnings, 'product')),
                datasets: [{
                    label: 'Ganancias por Mes',
                    data: @json(array_column($monthlyEarnings, 'earnings')),
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

                    borderWidth: 1,
                    color: "#fff",
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
