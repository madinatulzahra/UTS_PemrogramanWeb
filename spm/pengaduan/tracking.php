<?php include "koneksi.php"; ?>
<?php include "header.php"; ?>

    <!-- FORM -->
    <div class="card p-4 shadow mb-4">
        <h5 class="mb-3">Masukkan ID Laporan</h5>

        <form method="GET">
            <div class="input-group">
                <input type="text" name="id" class="form-control" placeholder="Contoh: 1" required>
                <button class="btn btn-kuning">Cek</button>
            </div>
			<div class="text-center mt-4">
				<a href="index.php" class="btn btn-kuning"> Kembali</a>
			</div>
        </form>
    </div>

    <!-- HASIL -->
    <?php
    if(isset($_GET['id'])){
        $id = $_GET['id'];

        // 🔥 pakai tabel yang benar (laporan)
        $data = mysqli_query($conn, "SELECT * FROM pengaduan WHERE id='$id'");
        $d = mysqli_fetch_array($data);

        if($d){
    ?>

    <div class="card p-4 shadow">
        <h5 class="mb-3">📋 Detail Laporan</h5>

        <p><strong>ID:</strong> <?= $d['id']; ?></p>
        <p><strong>Nama:</strong> <?= $d['nama']; ?></p>
        <p><strong>Laporan:</strong> <?= $d['isi_laporan']; ?></p>

        <!-- BUKTI -->
        <p><strong>Bukti:</strong></p>
        <?php if($d['bukti']) { ?>
            <img src="../gambar/<?= $d['bukti']; ?>" width="200" class="rounded shadow-sm">
        <?php } else { ?>
            <p class="text-muted">Tidak ada bukti</p>
        <?php } ?>

        <!-- STATUS -->
        <p class="mt-3"><strong>Status:</strong> 
            <?php if($d['status'] == "Menunggu"){ ?>
                <span class="badge badge-menunggu">Menunggu</span>
            <?php } elseif($d['status'] == "Diproses"){ ?>
                <span class="badge badge-proses">Diproses</span>
            <?php } else { ?>
                <span class="badge badge-selesai">Selesai</span>
            <?php } ?>
        </p>
    </div>

    <?php 
        } else {
            echo "<div class='alert alert-danger'>ID tidak ditemukan!</div>";
        }
    }
    ?>

<?php include "footer.php"; ?>