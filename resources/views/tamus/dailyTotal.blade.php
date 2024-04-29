<!-- resources/views/tamus/daily.blade.php -->
<body>
<head>
    <!-- ... existing head content ... -->
    <!-- Chart.js CDN -->
<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

    <style>
         body {
    font-family: 'Arial', sans-serif;
    background-image: url("../../gambar/dashboard.jpg");
    background-size: cover;
    background-repeat: no-repeat;
    background-position: center;
    height: 100vh; /* 100% viewport height */
    width: 100vw; /* 100% viewport width */
    background-attachment: fixed; /* Tetapkan background */
    }   

        .container{text-align: center;}
        
        .home{
            position: fixed;
            top: 2%;
            left: 1%;
            color: white;
            padding: 10px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.5);
        }
        .arrowleft{
        border: solid black;
        border-width: 0 3px 3px 0;
        display: inline-block;
        padding: 3px;
        transform: rotate(135deg);
        -webkit-transform: rotate(135deg);
        } 

        a{color:black}
    </style>
</head>
        <div  class="home" >
        <a href="{{ route('index') }}"><i class="arrowleft"></i></a>
        </div>
    <div class="container">
        <h2>Total Tamu</h2>
        <a href="{{ route('tamu.harian') }}" <p>Total Tamu datang hari ini: {{ $totalTamuDaily }} </p></a>
        <a href="{{ route('tamu.mingguan') }}"<p>Total Tamu datang minggu ini: {{ $totalTamuWeekly }}</p></a>
        <a href="{{ route('tamu.bulanan') }}"<p>Total Tamu datang bulan ini: {{ $totalTamuMonthly }}</p></a>
        <a href="{{ route('tamu.tahunan') }}"<p>Total Tamu datang tahun ini: {{ $totalTamuYearly }}</p></a>
        <p>Total Seluruh Tamu: {{ $totalSeluruhTamu }}</p>
     
    </div>
<!-- Elemen Canvas -->
<canvas id="dailyChart" width="400" height="50"></canvas>

<!-- Library Chart.js CDN -->
<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

<!-- Script Pembuatan Chart -->
<script>
    var ctx = document.getElementById('dailyChart').getContext('2d');
    var myChart = new Chart(ctx, {
        type: 'bar',
        labels: ['Total Tamu Harian', 'Total Tamu Mingguan', 'Total Tamu Bulanan', 'Total Tamu Tahunan', 'Total Seluruh Tamu'],
            datasets: [{
        data: {
                label: 'Total Tamu',
                data: [{{ $totalTamuDaily }}, {{ $totalTamuWeekly }}, {{ $totalTamuMonthly }}, {{ $totalTamuYearly }}, {{ $totalSeluruhTamu }}],
                backgroundColor: 'rgba(75, 192, 192, 0.2)',
                borderColor: 'rgba(75, 192, 192, 1)',
                borderWidth: 1
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
</script>
</body>