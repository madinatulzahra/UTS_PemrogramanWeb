<?php include "koneksi.php"; ?>
<?php include "header.php"; ?>

<div class="card p-4 shadow">
    <h5 class="mb-3">📝 Buat Laporan</h5>

    <form action="laporan.php" method="POST" enctype="multipart/form-data">
        
        <div class="mb-3">
            <label>Nama</label>
            <input type="text" name="nama" class="form-control" required>
        </div>

        <div class="mb-3">
            <label>No HP</label>
            <input type="text" name="no_hp" class="form-control" required>
        </div>

        <div class="mb-3">
            <label>Isi Laporan</label>
            <textarea name="isi" class="form-control" required></textarea>
        </div>

        <div class="mb-3">
            <label>Upload Bukti</label>
            <input type="file" name="bukti" class="form-control" required>
        </div>

        <button class="btn btn-kuning w-100">
            📢 Kirim Laporan
        </button>
		
		<div class="text-center mt-4">
			<a href="index.php" class="btn btn-kuning"> Kembali</a>
		</div>
    </form>
</div>

<?php include "footer.php"; ?>