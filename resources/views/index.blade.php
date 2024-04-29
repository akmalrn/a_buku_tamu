<!-- resources/views/dashboard/layouts/app.blade.php -->

<!DOCTYPE html>
<html lang="en">
<head>
 <style>
  /* public/css/style.css */

  body {
    font-family: 'Arial', sans-serif;
    background-image: url("../../gambar/buku_tamu.jpg");
    background-size: cover;
    background-repeat: no-repeat;
    background-position: center;
    height: 100vh; /* 100% viewport height */
    width: 100vw; /* 100% viewport width */
    background-attachment: fixed; /* Tetapkan background */
}

h1 {
    text-align: center;
}

a {
    display: inline-block;
    margin-bottom: 10px;
    padding: 10px 15px;
    background-color: orangered;
    color: white;
    text-decoration: none;
    border-radius: 5px;
}

table {
    width: 100%;
    border-collapse: collapse;
    margin-top: 2%;
    text-align: center;
}

th, td {
    border: 1px solid #ddd;
    padding: 8px;
    text-align: left;
}

th {
    background-color: orangered;
    color: white;
}

tr, td:nth-child(even)  {
    color: white;
}

a.edit,
button.delete {
    display: inline-block;
    padding: 8px 12px;
    margin-right: 5px;
    text-decoration: none;
    color: white;
    border-radius: 3px;
    cursor: pointer;
}

a.edit {
    background-color: #2196F3;
}

button.delete {
    background-color: #f44336;
    border: none;
}

/* Sidebar Styles */
.topbar {
    height: 60px;
    width: 100%;
    position: fixed;
    z-index: 2;
    top: 0;
    background-color: #111;
    padding-top: 20px;
    text-align: center;
}

.topbar a {
    padding: 8px 32px;
    text-decoration: none;
    font-size: 18px;
    color: #818181;
    display: inline-block;
    transition: 0.3s;
}

.topbar a:hover {
    color: #f1f1f1;
}


/* Content Styles */
.content {
    margin-left: 250px;
    padding: 16px;
    z-index: 1; /* Adjusted z-index */
}
.logout{position: fixed;
    margin:0% 0% 0% 70%;
}
.img-thumbnail {
    max-width: 90px; /* Lebar maksimum gambar */
    height: auto; /* Tinggi gambar akan disesuaikan agar proporsi tetap */
}
/* CSS untuk notifikasi */

    </style>
    <title>Dashboard</title>
    <!-- Include Chart.js -->
    <script>
       function confirmLogout() {
            var isConfirmed = confirm("Apakah kamu yakin ingin logout?");
            if (isConfirmed) {
                // Redirect to the logout route
                window.location.href = "{{ route('login') }}";
            }
        }
    </script>
</head>
<body>
    <form action="{{ route('search') }}" method="GET" style="margin: 7% 0px 0px 0px;">
    <input type="text" name="search" placeholder="Cari Nama Lengkap">
    <button type="submit">Cari</button>
</form>


    <table>
        <thead>
            <tr>
                <th>ID</th>
                <th>Nama Lengkap</th>
                <th>Alamat</th>
                <th>No. Telp</th>
                <th>Email</th>
                <th>Kategori</th>
                <th>Foto</th>
                <th>Tanggal</th>
                <th>Tujuan</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
             @foreach($tamu as $item)
                <tr>
                    <td>{{ $item->id }}</td>
                    <td>{{ $item->nama_lengkap }}</td>
                    <td>{{ $item->alamat }}</td>
                    <td>{{ $item->no_telp }}</td>
                    <td>{{ $item->email }}</td>
                    <td>{{ $item->kategori }}</td>
                    <td><img src="{{ asset('storage/' . $item->image_path) }}" alt="Tamu Image" class="img-thumbnail"></td>
                    <td>{{ $item->tanggal }}</td>
                    <td>{{ $item->tujuan }}</td>
                    <td>
                        <a class="edit" href="{{ route('tamu.edit', $item->id) }}">Edit</a>
                        <form style="display: inline-block;" action="{{ route('tamu.destroy', $item->id) }}" method="POST">
                            @csrf
                            @method('DELETE')
                            <button class="delete" type="submit" onclick="return confirm('Apakah Anda Yakin Ingin Menghapus Data {{ $item->nama_lengkap}}?');">Hapus</button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>

    <div class="topbar">
        <a href="{{ route('index') }}">Data Tamu Lengkap</a>
        <a href="{{ route('tamus.daily') }}">Grafik Total Tamu</a>
<a href="{{ route('login') }}"  onclick="confirmLogout()">logout</a>
    </div>
    </div>
</body>
</html>
