@extends('backend.master')

@section('content')
<div class="dashboard">
  <!-- === Top 4 Small Cards === -->
  <div class="card-container">
    <div class="stat-card">
      <h4>Total Customers</h4>
      <p class="count">1,245</p>
    </div>
    <div class="stat-card">
      <h4>Total Sales</h4>
      <p class="count">$45,300</p>
    </div>
    <div class="stat-card">
      <h4>Total Due</h4>
      <p class="count" style="color:red;">$3,200</p>
    </div>
    <div class="stat-card">
      <h4>Growth</h4>
      <p class="count" style="color:green;">+18%</p>
    </div>
  </div>

  <!-- === Graph Section === -->
  <div class="charts-section">
    <div class="chart-card">
      <h4>Weekly Sales</h4>
      <canvas id="barChart"></canvas>
    </div>

    <div class="chart-card">
      <h4>Monthly Sales</h4>
      <canvas id="lineChart"></canvas>
    </div>

    <div class="chart-card">
      <h4>Expenses</h4>
      <canvas id="donutChart"></canvas>
    </div>
  </div>
</div>

<!-- Chart.js CDN -->
<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
<script>
  // Bar Chart
  new Chart(document.getElementById('barChart'), {
    type: 'bar',
    data: {
      labels: ['Mon', 'Tue', 'Wed', 'Thu', 'Fri', 'Sat', 'Sun'],
      datasets: [{
        label: 'Users',
        data: [12, 19, 15, 18, 14, 20, 22],
        backgroundColor: '#6c63ff'
      }]
    },
    options: { responsive: true, plugins: { legend: { display: false } } }
  });

  // Line Chart
  new Chart(document.getElementById('lineChart'), {
    type: 'line',
    data: {
      labels: ['Jan', 'Feb', 'Mar', 'Apr', 'May', 'Jun'],
      datasets: [{
        label: 'Sales',
        data: [10000, 12000, 9000, 15000, 20000, 18000],
        borderColor: '#6c63ff',
        tension: 0.4,
        fill: false
      }]
    },
    options: { responsive: true, plugins: { legend: { display: false } } }
  });

  // Donut Chart
  new Chart(document.getElementById('donutChart'), {
    type: 'doughnut',
    data: {
      labels: ['Marketing', 'Rent', 'Supplies', 'Misc'],
      datasets: [{
        data: [4000, 3000, 2500, 1200],
        backgroundColor: ['#6c63ff', '#8b80ff', '#b6b0ff', '#dcd9ff']
      }]
    },
    options: { responsive: true, cutout: '70%' }
  });
</script>

<style>
  :root {
    --bg: #e0e5ec;
    --shadow-light: #ffffff;
    --shadow-dark: #a3b1c6;
    --primary: #6c63ff;
    --text: #333;
  }
  body.dark {
    --bg: #2c2f36;
    --shadow-light: #3a3d44;
    --shadow-dark: #1a1c1f;
    --text: #f1f1f1;
  }

  .dashboard {
    margin: 20px;
    display: flex;
    flex-direction: column;
    gap: 20px;
  }

  /* Top 4 Small Cards */
  .card-container {
    display: grid;
    grid-template-columns: repeat(auto-fit, minmax(180px, 1fr));
    gap: 15px;
  }

  .stat-card {
    background: var(--bg);
    box-shadow: 8px 8px 16px var(--shadow-dark), -8px -8px 16px var(--shadow-light);
    border-radius: 20px;
    padding: 15px;
    text-align: center;
  }

  .stat-card h4 {
    font-size: 1rem;
    color: var(--primary);
    margin: 0 0 8px;
  }

  .stat-card .count {
    font-size: 1.3rem;
    font-weight: bold;
    color: var(--text);
  }

  /* Charts Section */
  .charts-section {
    display: grid;
    grid-template-columns: repeat(auto-fit, minmax(280px, 1fr));
    gap: 20px;
  }

  .chart-card {
    background: var(--bg);
    box-shadow: 10px 10px 20px var(--shadow-dark), -10px -10px 20px var(--shadow-light);
    border-radius: 20px;
    padding: 20px;
    text-align: center;
  }

  .chart-card h4 {
    margin-bottom: 10px;
    font-size: 1rem;
    color: var(--primary);
  }

  canvas {
    width: 100% !important;
    height: 180px !important;
  }
</style>
@endsection
