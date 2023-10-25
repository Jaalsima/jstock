<div>
    <div>
        <canvas id="aboutToExpireChart" width="400" height="400"></canvas>
    </div>
    <script>
        document.addEventListener('livewire:load', function () {
            const expirableProducts = @json($expirableProducts);

            const labels = expirableProducts.map(product => product.name);
            const data = expirableProducts.map(product => product.expiration);

            const ctx = document.getElementById('aboutToExpireChart').getContext('2d');
            new Chart(ctx, {
                type: 'line',
                data: {
                    labels: labels,
                    datasets: [{
                        label: 'Productos por expirar',
                        data: data,
                        backgroundColor: 'rgba(255, 99, 132, 0.2)',
                        borderColor: 'rgb(255, 99, 132)',
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
        });
    </script>
</div>