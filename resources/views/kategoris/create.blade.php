
    <h1>Buat Kategori Baru</h1>

    <form action="{{ route('kategoris.store') }}" method="post">
        @csrf

        <label for="nama">Nama Kategori:</label>
        <input type="text" name="nama" required>

        <!-- Tambahkan input lain jika diperlukan -->

        <button type="submit">Simpan</button>
    </form>
