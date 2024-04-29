<!-- resources/views/tamus/tamuHariIni.blade.php -->

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Data Tamu Hari Ini</title>
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

/* Gaya untuk box tamu */
.tamu-box {
    border: 1px solid #ddd;
    padding: 10px;
    margin-bottom: 15px;
}

/* Gaya untuk nama tamu */
.nama-lengkap {
    font-size: 18px;
    font-weight: bold;
    color: black;
}


/* Gaya garis pemisah antar tamu */
.hr-line {
    border-top: 1px solid #ddd;
    margin-top: 15px;
    margin-bottom: 15px;
}

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
        h1{text-align: center;}
    </style>
</head>
<body>
<div  class="home" >
        <a href="{{ route('tamus.daily') }}"><i class="arrowleft"></i></a>
        </div>
        <h1>Tamu Yang Datang Bulan Ini</h1>
<!-- Looping untuk menampilkan data tamu hari ini -->
@foreach ($tamuBulanan as $tamu)
    <div class="tamu-box">
        <p class="nama-lengkap">Nama Lengkap: {{ $tamu->nama_lengkap }}</p>
        <!-- Tambahkan informasi lainnya sesuai kebutuhan -->
    </div>
    <hr class="hr-line">
@endforeach

</body>
</html>
