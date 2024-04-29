<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Home Wikrama 1 Garut</title>

    <style>
        body {
            background-image: url('gambar/welcome.jpg');
            background-size: cover;
            margin: 0;
            padding: 0;
            font-family: 'Arial', sans-serif;
        }

        .container {
            text-align: center; /* Center align content */
            padding-top: 100px; /* Adjust the top padding */
        }

        .main-content {
            background: rgba(255, 255, 255, 0.8); /* Light background color */
            padding: 10px; /* Add some padding */
            display: inline-block;
            text-align: center; /* Align text to the left */
            max-width: 400px; /* Limit width to prevent overflow */
        }

        .gambar {
            width: 400px; /* Adjust image width */
            height: 300px;
            float: left; /* Float image to the left */
            margin-right: 20px; /* Add some space between image and text */
        }

        .create {
    color: black;
    text-decoration: none; /* Remove underline from the link */
    background-color: white;
    padding: 8px 16px; /* Add padding for better appearance */
    border-radius: 4px; /* Add border radius for rounded corners */
    transition: background-color 0.3s ease; /* Smooth transition effect */

    /* Hover effect */
}
.create:hover {
    background-color: lightgray; /* Change background color on hover */
}

        footer {
            position: fixed;
            bottom: 0;
            width: 100%;
            background-color: rgba(255, 255, 255, 0.8);
            text-align: center;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.5);
            padding: 5  px;
        }
        .Login{
            position: fixed;
            top: 2%;
            right: 1%;
            padding: 10px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.5);
        }
        footer a {
            color: black;
            text-decoration: none;
        }
        h1{text-align: center;}

        .notification {
        position: fixed;
        top: 50%;
        left: 50%;
        transform: translate(-50%, -50%);
        background-color: #f0f0f0;
        padding: 20px;
        border-radius: 5px;
        box-shadow: 0 0 10px rgba(0, 0, 0, 0.5);
        z-index: 9999;
        text-align: center;
    }
    .notification button {
        margin-top: 10px;
        padding: 10px 20px;
        background-color: #007bff;
        color: #fff;
        border: none;
        border-radius: 5px;
        cursor: pointer;
        transition: background-color 0.3s ease;
    }
    .notification button:hover {
        background-color: #0056b3;
    }

    #notif {
      position: fixed;
      top: 20%; /* Sesuaikan dengan posisi vertikal yang diinginkan */
      left: 50%; /* Posisi horizontal di tengah */
      transform: translateX(-50%);
      background-color: white;
      color: black;
      padding: 10px;
      text-align: center;
      display: none; /* default: hide */
    }
    </style>
</head>

<body>
<div id="notification" class="notification" style="display: none;">
    <p>{{ session('notification') }}</p>
    <button onclick="closeNotification()">OK</button>
</div>
<!-- Script untuk menampilkan notifikasi dan konfirmasi -->
<script>
    // Function untuk menampilkan notifikasi
    function showNotification() {
        var notificationDiv = document.getElementById("notification");
        notificationDiv.style.display = "block";
    }

    // Function untuk menutup notifikasi
    function closeNotification() {
        var notificationDiv = document.getElementById("notification");
        notificationDiv.style.display = "none";
    }

    // Check jika session notifikasi ada
    var notification = "{{ session('notification') }}";
    if (notification) {
        showNotification(); // Tampilkan notifikasi saat halaman dimuat
    }
     // Tampilkan notifikasi saat halaman dimuat
     document.addEventListener('DOMContentLoaded', function () {
      var notification = document.getElementById('notif');
      notification.style.display = 'block';

      // Sembunyikan notifikasi setelah beberapa detik (contoh: 5 detik)
      setTimeout(function () {
        notification.style.display = 'none';
      }, 5000);
    });
</script>
<div id="notif">Selamat datang !</div>
    <h1>BUKU-TAMU SMK WIKRAMA 1 GARUT</h1>
    <div class="container">
        <div class="main-content">
            <img src="{{ asset('gambar/welcome.jpg') }}" alt="" class="gambar"></img>
            <hr>
            <a href="{{ route('tamu.create') }}" class="create">Isi Data Anda</a>
        </div>

        @if (Route::has('login'))
            <div class="Login">
                <a href="{{ route('login') }}" style="color: black;">Log in</a>
            </div>
        @endif

        <footer>
            <a href="https://github.com/akmalrn">GitHub</a> 
            By: Amay
        </footer>
    </div>
</body>
</html>
