<x-layout.main>
    <x-slot:title>{{ 'Dashboard' }}</x-slot:title>
    <x-slot:pagename>{{ __('Dashboard') }}</x-slot:pagename>
    <div class="container-fluid">
        <div class="row g-4 mb-4">
            <!-- Stats Cards -->
            <div class="col-md-3">
                <div class="card card-stats shadow-sm">
                    <div class="card-body">
                        <div>
                            <h5 class="card-title">Orders</h5>
                            <h3>1,234</h3>
                        </div>
                        <div class="card-icon text-primary">
                            <i class="fas fa-cart-shopping"></i>
                        </div>
                    </div>
                </div>
            </div>
    
            <div class="col-md-3">
                <div class="card card-stats shadow-sm">
                    <div class="card-body">
                        <div>
                            <h5 class="card-title">Revenue</h5>
                            <h3>$42,560</h3>
                        </div>
                        <div class="card-icon text-success">
                            <i class="fas fa-dollar"></i>
                        </div>
                    </div>
                </div>
            </div>
    
            <div class="col-md-3">
                <div class="card card-stats shadow-sm">
                    <div class="card-body">
                        <div>
                            <h5 class="card-title">Users</h5>
                            <h3>567</h3>
                        </div>
                        <div class="card-icon text-warning">
                            <i class="fas fa-users"></i>
                        </div>
                    </div>
                </div>
            </div>
    
            <div class="col-md-3">
                <div class="card card-stats shadow-sm">
                    <div class="card-body">
                        <div>
                            <h5 class="card-title">Products</h5>
                            <h3>1,890</h3>
                        </div>
                        <div class="card-icon text-info">
                            <i class="fas fa-box"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    
        <!-- Charts -->
        <div class="row">
            <div class="col-md-6 mb-4">
                <div class="card shadow-sm">
                    <div class="card-header">
                        Sales Over Time
                    </div>
                    <div class="card-body">
                        <canvas id="salesChart" height="200"></canvas>
                    </div>
                </div>
            </div>
    
            <div class="col-md-6 mb-4">
                <div class="card shadow-sm">
                    <div class="card-header">
                        User Growth
                    </div>
                    <div class="card-body">
                        <canvas id="usersChart" height="200"></canvas>
                    </div>
                </div>
            </div>
        </div>
    </div>
    
    <script>
        const salesCtx = document.getElementById('salesChart').getContext('2d');
        const salesChart = new Chart(salesCtx, {
            type: 'line',
            data: {
                labels: ['Jan', 'Feb', 'Mar', 'Apr', 'May', 'Jun', 'Jul'],
                datasets: [{
                    label: 'Sales',
                    data: [1200, 1900, 1500, 2200, 2400, 2000, 2500],
                    backgroundColor: 'rgba(54, 162, 235, 0.2)',
                    borderColor: 'rgba(54, 162, 235, 1)',
                    borderWidth: 2,
                    fill: true,
                    tension: 0.3,
                    pointRadius: 4,
                    pointHoverRadius: 6,
                }]
            },
            options: {
                responsive: true,
                plugins: {
                    legend: { display: true }
                },
                scales: {
                    y: { beginAtZero: true }
                }
            }
        });
    
        const usersCtx = document.getElementById('usersChart').getContext('2d');
        const usersChart = new Chart(usersCtx, {
            type: 'bar',
            data: {
                labels: ['Jan', 'Feb', 'Mar', 'Apr', 'May', 'Jun', 'Jul'],
                datasets: [{
                    label: 'New Users',
                    data: [50, 75, 60, 80, 90, 100, 120],
                    backgroundColor: 'rgba(255, 206, 86, 0.7)',
                    borderColor: 'rgba(255, 206, 86, 1)',
                    borderWidth: 1
                }]
            },
            options: {
                responsive: true,
                plugins: {
                    legend: { display: true }
                },
                scales: {
                    y: { beginAtZero: true }
                }
            }
        });
    </script>
</x-layout.main>