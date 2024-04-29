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

    </style>
    <script>
        function konfirmasi() {
            return window.confirm("Apakah data sudah benar?");
        }
    </script>
</head>
<body>
    <div  class="home" >
        <a href="{{ route('index') }}"><i class="arrowleft"></i></a>
    </div>   
    <form method="post" action="{{ route('tamu.update', $tamu->id) }}">
        @csrf
        @method('PUT')
        <div class="form-group">
            <label for="nama_lengkap">Nama Lengkap:</label>
            <input type="text" value="{{ $tamu->nama_lengkap }}" name="nama_lengkap" required>
        </div>

        <div class="form-group">
            <label for="alamat">Alamat:</label>
            <input type="text" value="{{ $tamu->alamat }}" name="alamat" required>
        </div>

        <div class="form-group">
            <label for="no_telp">No Telp:</label>
            <input type="number" min=-1 value="{{ $tamu->no_telp }}" name="no_telp" required>
        </div>

        <div class="form-group">
            <label for="email">Email:</label>
            <input type="email" value="{{ $tamu->email }}" name="email" required>
        </div>

        <div class="form-group">
            <label for="kategori">Kategori:</label>
            <select value="{{ $tamu->kategori }}" name="kategori" required>
            <option value="personal">Personal</option>
                        <option value="Akuntan">Akuntan</option>
                        <option value="Ahli biologi">Ahli biologi</option>
                        <option value="Ahli kimia">Ahli kimia</option>
                        <option value="Ahli gizi">Ahli gizi</option>
                        <option value="Arsitek">Arsitek</option>
                        <option value="Asisten medis">Asisten medis</option>
                        <option value="Ahli keamanan siber">Ahli keamanan siber</option>
                        <option value="Animator">Animator</option>
                        <option value="Ahli antropologi">Ahli antropologi</option>
                        <option value="Ahli bahasa">Ahli bahasa</option>
                        <option value="Ahli bedah">Ahli bedah</option>
                        <option value="Bankir">Bankir</option>
                        <option value="Bidan">Bidan</option>
                        <option value="Bisnis">Bisnis</option>
                        <option value="Bartender">Bartender</option>
                        <option value="Berkebun">Berkebun</option>
                        <option value="Berenang (Instruktur renang)">Berenang (Instruktur renang)</option>
                        <option value="Blogger">Blogger</option>
                        <option value="Butikawan">Butikawan</option>
                        <option value="Desainer grafis">Desainer grafis</option>
                        <option value="Dokter">Dokter</option>
                        <option value="Editor">Editor</option>
                        <option value="Ekonom">Ekonom</option>
                        <option value="Elektrisi">Elektrisi</option>
                        <option value="Fotografer">Fotografer</option>
                        <option value="Dosen">Dosen</option>
                        <option value="Farmasis">Farmasis</option>
                        <option value="Guru">Guru</option>
                        <option value="Diplomat">Diplomat</option>
                        <option value="Geolog">Geolog</option>
                        <option value="Hakim">Hakim</option>
                        <option value="Interior designer">Interior designer</option>
                        <option value="Insinyur">Insinyur</option>
                        <option value="Jurnalis">Jurnalis</option>
                        <option value="Koki">Koki</option>
                        <option value="Konsultan">Konsultan</option>
                        <option value="Karyawan (HR)">Karyawan (HR)</option>
                        <option value="Kontraktor">Kontraktor</option>
                        <option value="Kontroler lalu lintas udara">Kontroler lalu lintas udara</option>
                        <option value="Konselor">Konselor</option>
                        <option value="Kepala sekolah">Kepala sekolah</option>
                        <option value="Laboran">Laboran</option>
                        <option value="Manajer proyek">Manajer proyek</option>
                        <option value="Musisi">Musisi</option>
                        <option value="Notaris">Notaris</option>
                        <option value="Nelayan">Nelayan</option>
                        <option value="Operator mesin">Operator mesin</option>
                        <option value="Penyair">Penyair</option>
                        <option value="Pengacara">Pengacara</option>
                        <option value="Petani">Petani</option>
                        <option value="Pilot">Pilot</option>
                        <option value="Perawat">Perawat</option>
                        <option value="Programmer">Programmer</option>
                        <option value="Psikolog">Psikolog</option>
                        <option value="Resepsionis">Resepsionis</option>
                        <option value="Pemadam kebakaran">Pemadam kebakaran</option>
                        <option value="Pekerja sosial">Pekerja sosial</option>
                        <option value="Penari">Penari</option>
                        <option value="Reporter">Reporter</option>
                        <option value="Sutradara">Sutradara</option>
                        <option value="Seniman">Seniman</option>
                        <option value="Surveyor">Surveyor</option>
                        <option value="Tukang kayu">Tukang kayu</option>
                        <option value="Teknisi komputer">Teknisi komputer</option>
                        <option value="Tukang listrik">Tukang listrik</option>
                        <option value="Translator">Translator</option>
                        <option value="Usher">Usher</option>
                        <option value="Veteriner">Veteriner</option>
                        <option value="Video editor">Video editor</option>
                        <option value="Waiter/Waitress">Waiter/Waitress</option>
                        <option value="Web developer">Web developer</option>
                        <option value="X-ray teknisi">X-ray teknisi</option>
                        <option value="Youtuber">Youtuber</option>
                        <option value="Yogainstruktor">Yogainstruktor</option>
                        <option value="Zoololog">Zoololog</option>
            </select>
        </div>
<div class="form-group">
    <label for="image">Foto:</label> 
    <input type="file" name="image"> 
</div>

        <div class="form-group">
            <label for="tujuan">Tujuan:</label>
            <input type="text" value="{{ $tamu->tujuan }}" name="tujuan" required>
        </div>

        <button type="submit" onclick="return confirm('Apakah Data Sudah Benar');">Simpan Perubahan</button>
    </form>
</body>
</html>
