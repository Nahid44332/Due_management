 <script>
    function toggleDarkMode() {
      document.body.classList.toggle('dark');
    }

    function toggleSidebar() {
      document.getElementById('sidebar').classList.toggle('closed');
    }

    function toggleDropdown() {
      document.getElementById('dropdownMenu').style.display =
        document.getElementById('dropdownMenu').style.display === 'flex' ? 'none' : 'flex';
    }

    // Chart.js Setup
    const usersChart = new Chart(document.getElementById('usersChart'), {
      type: 'bar',
      data: {
        labels: ['Mon','Tue','Wed','Thu','Fri','Sat','Sun'],
        datasets: [{
          label: 'Users',
          data: [120, 150, 180, 200, 170, 190, 230],
          backgroundColor: '#6c63ff',
          borderRadius: 8
        }]
      },
      options: { plugins: { legend: { display: false }}, scales: { y: { display:false } } }
    });

    const salesChart = new Chart(document.getElementById('salesChart'), {
      type: 'line',
      data: {
        labels: ['Jan','Feb','Mar','Apr','May','Jun'],
        datasets: [{
          data: [5000, 7000, 6000, 9000, 11000, 10500],
          borderColor: '#6c63ff',
          fill: false,
          tension: 0.4
        }]
      },
      options: { plugins: { legend: { display: false }}, scales: { y: { display:false } } }
    });

    const expenseChart = new Chart(document.getElementById('expenseChart'), {
      type: 'doughnut',
      data: {
        labels: ['Rent','Salaries','Marketing'],
        datasets: [{
          data: [5000, 4000, 3700],
          backgroundColor: ['#6c63ff','#8e9fff','#b8bfff']
        }]
      },
      options: { plugins: { legend: { position: 'bottom' } } }
    });

    const growthChart = new Chart(document.getElementById('growthChart'), {
      type: 'line',
      data: {
        labels: ['Q1','Q2','Q3','Q4'],
        datasets: [{
          data: [5,10,15,18],
          borderColor: '#6c63ff',
          fill: false,
          tension: 0.3
        }]
      },
      options: { plugins: { legend: { display: false }}, scales: { y: { display:false } } }
    });
  </script>