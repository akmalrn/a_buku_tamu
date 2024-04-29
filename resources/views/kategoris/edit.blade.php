
    <h1>Edit Kategori</h1>

    <form action="{{ route('kategoris.update', $kategori->id) }}" method="post">
        @csrf
        @method('PUT')

        <label for="nama">Nama Kategori:</label>
        <input type="text" name="nama" value="{{ $kategori->nama }}" required>

        <!-- Tambahkan input lain jika diperlukan -->

        <button type="submit">Simpan Perubahan</button>
    </form>

