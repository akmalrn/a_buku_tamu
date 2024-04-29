<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <style>
        body {
            font-family: Arial, sans-serif;
            background-image: url('/gambar/login_tamu.jpg');
            background-size: 100% 100%;
            background-position: center;
            display: flex;
            align-items: center;
            justify-content: center;
            height: 100vh;
            margin: 0;
        }

        form {
            display: flex;
            flex-direction: column;
            align-items: center;
            width: 50%;
            max-width: 600px;
            padding: 20px;
            border-radius: 10px;
        }

        .form-group {
            display: flex;
            flex-direction: column;
            width: 100%;
            margin-bottom: 10px;
        }

        .form-group label {
            margin-bottom: 5px;
            text-align: left;
        }

        .form-group input,
        .form-group select {
            width: 100%;
            padding: 8px;
            box-sizing: border-box;
            margin-top: 5px;
            margin-bottom: 10px;
        }

        button {
            background-color: #4CAF50;
            color: white;
            padding: 10px 15px;
            border: none;
            border-radius: 5px;
            cursor: pointer;
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
        border: solid white;
        border-width: 0 3px 3px 0;
        display: inline-block;
        padding: 3px;
        transform: rotate(135deg);
        -webkit-transform: rotate(135deg);
        } 
        /* CSS untuk notifikasi */
#overlay {
    position: fixed;
    top: 0;
    left: 0;
    width: 100%;
    height: 100%;
    background: rgba(0, 0, 0, 0.5);
    display: none;
}

#notif {
    position: fixed;
    top: 50%;
    left: 50%;
    transform: translate(-50%, -50%);
    background: #fff;
    padding: 20px;
    border-radius: 5px;
    text-align: center;
    display: none;
}

#okButton {
    background-color: #4CAF50;
    color: white;
    padding: 10px 15px;
    border: none;
    border-radius: 5px;
    cursor: pointer;
    margin-top: 10px;
}

    </style>
    <script>
        function konfirmasi() {
            return window.confirm("Apakah data sudah benar?");
        }
        document.addEventListener('DOMContentLoaded', function () {
            var notification = document.getElementById('notif');
            var okButton = document.getElementById('okButton');
            var overlay = document.getElementById('overlay');

            // Show the overlay and the notification
            overlay.style.display = 'block';
            notification.style.display = 'block';

            // Hide the overlay and the notification when the OK button is clicked
            okButton.addEventListener('click', function () {
                overlay.style.display = 'none';
                notification.style.display = 'none';
            });
        });
    </script>
</head>
<body>
<div id="overlay"></div>
<div id="notif">
    <p>Silahkan isi data anda</p>
    <button id="okButton">OK</button>
</div>
        <div  class="home" >
        <a href="{{ route('welcome') }}"><i class="arrowleft"></i></a>
        </div>   
    <form method="post" action="{{ route('tamu.store') }}" enctype="multipart/form-data" onsubmit="return konfirmasi()">
        @csrf

        <div class="form-group">
            <label for="nama_lengkap">Nama Lengkap:</label>
            <input type="text" id="nama_lengkap" name="nama_lengkap" placeholder="Nama Lengkap" required>
        </div>

        <div class="form-group">
            <label for="alamat">Alamat:</label>
            <input type="text" id="alamat" name="alamat" placeholder="Alamat" required>
        </div>

        <div class="form-group">
            <label for="no_telp">No Telp:</label>
            <input type="number" min=-1 id="no_telp" name="no_telp" placeholder="Nomor telepon" required>
        </div>

        <div class="form-group">
            <label for="email">Email:</label>
            <input type="email" id="email" name="email" placeholder="Email" required>
        </div>

        <div class="form-group">
            <label for="kategori">Kategori:</label>
            <select id="kategori" name="kategori" required>
                      <option value="opsional">opsional</option>
            </select>
        </div>
        <div class="form-group">
        <label for="image">Foto:</label>
        <input type="file" id="image"name="image">
    </div>
        <div
        
        
        
        
        
        
        
        
        
        
        
        
        
        
        
        
        
        
        
        
        
        
        
        
        
        
        class="form-group">
            <label for="tujuan">Tujuan:</label>
            <input id="tujuan" name="tujuan" placeholder="Tujuan" required>
        </div>
        <button type="submit" value="SIMPAN" onclick="konfirmasi">Simpan</button>
    </form>
</body>
</html>
