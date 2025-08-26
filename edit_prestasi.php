<?php
include 'koneksi.php';
session_start();

// Cek login admin
if (!isset($_SESSION['id_pengguna']) || !isset($_SESSION['username']) || !isset($_SESSION['role'])) {
    header("Location: login_admin.php");
    exit();
}

// Ambil ID prestasi
$id_prestasi = isset($_GET['id']) ? intval($_GET['id']) : 0;
if ($id_prestasi <= 0) {
    header("Location: admin_prestasi.php");
    exit();
}

// Ambil data prestasi
$stmt = $conn->prepare("SELECT * FROM prestasi WHERE id_prestasi = ?");
$stmt->bind_param("i", $id_prestasi);
$stmt->execute();
$result = $stmt->get_result();
if ($result->num_rows !== 1) {
    header("Location: admin_prestasi.php");
    exit();
}
$prestasi = $result->fetch_assoc();

// Ambil data pendaftaran untuk dropdown
$pendaftaran = [];
$sql = "SELECT p.id_pendaftaran, s.nama_siswa, e.nama_eskul 
        FROM pendaftaran_eskul p
        JOIN siswa s ON p.id_siswa = s.id_siswa
        JOIN eskul e ON p.id_eskul = e.id_eskul
        ORDER BY s.nama_siswa ASC";
$res = $conn->query($sql);
while ($row = $res->fetch_assoc()) {
    $pendaftaran[] = $row;
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $id_pendaftaran = $_POST['id_pendaftaran'];
    $nama_prestasi = $_POST['nama_prestasi'];
    $tingkat = $_POST['tingkat'];
    $tanggal = $_POST['tanggal'];
    $deskripsi = $_POST['deskripsi'];
    $sertifikat = $prestasi['sertifikat'];

    // Upload sertifikat baru jika ada
    if (isset($_FILES['sertifikat']) && $_FILES['sertifikat']['error'] == 0) {
        $target_dir = "uploads/sertifikat/";
        if (!is_dir($target_dir)) mkdir($target_dir, 0777, true);
        $file_name = time() . '_' . basename($_FILES["sertifikat"]["name"]);
        $target_file = $target_dir . $file_name;
        $file_type = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));
        $allowed = ['jpg','jpeg','png','gif','pdf'];
        if (in_array($file_type, $allowed)) {
            if (move_uploaded_file($_FILES["sertifikat"]["tmp_name"], $target_file)) {
                // Hapus file lama jika ada
                if (!empty($prestasi['sertifikat']) && file_exists($target_dir . $prestasi['sertifikat'])) {
                    unlink($target_dir . $prestasi['sertifikat']);
                }
                $sertifikat = $file_name;
            } else {
                $error = "Gagal upload sertifikat.";
            }
        } else {
            $error = "Format file sertifikat tidak didukung.";
        }
    }

    if (!$error) {
        $stmt = $conn->prepare("UPDATE prestasi SET id_pendaftaran=?, nama_prestasi=?, tingkat=?, tanggal=?, deskripsi=?, sertifikat=? WHERE id_prestasi=?");
        $stmt->bind_param("isssssi", $id_pendaftaran, $nama_prestasi, $tingkat, $tanggal, $deskripsi, $sertifikat, $id_prestasi);
        if ($stmt->execute()) {
           $_SESSION['success_msg'] = "Prestasi berhasil diupdate!";
              header("Location: admin_prestasi.php");
              exit;
        } else {
                $_SESSION['error_msg'] = "Gagal mengupdate prestasi.";
                exit;
        }
    }
}
?>
<!DOCTYPE html>
<html>
<head>
    <title>Edit Prestasi Siswa</title>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;600&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <style>
        body {
            font-family: 'Poppins', sans-serif;
            background: linear-gradient(135deg, #e0f7fa 0%, #f8f9fa 100%);
            min-height: 100vh;
            margin: 0;
            padding: 0;
        }
        .container {
            max-width: 520px;
            margin: 50px auto;
            background: #fff;
            border-radius: 18px;
            box-shadow: 0 8px 32px rgba(44,202,107,0.13);
            padding: 38px 38px 28px 38px;
        }
        h2 {
            text-align: center;
            color: #43e97b;
            margin-bottom: 24px;
            font-size: 2em;
            letter-spacing: 1px;
            font-weight: 700;
        }
        form label {
            font-weight: 600;
            color: #388e3c;
            display: block;
            margin-bottom: 6px;
        }
        form input, form select, form textarea {
            width: 100%;
            padding: 10px 12px;
            margin-bottom: 18px;
            border: 1px solid #b2dfdb;
            border-radius: 8px;
            font-size: 1em;
            background: #f8f9fa;
        }
        form textarea {
            min-height: 70px;
            resize: vertical;
        }
        .btn {
            background: linear-gradient(90deg, #43e97b 0%, #38f9d7 100%);
            color: white;
            border: none;
            border-radius: 30px;
            padding: 12px 38px;
            font-weight: 600;
            font-size: 1.08em;
            cursor: pointer;
            box-shadow: 0 2px 8px rgba(44,202,107,0.10);
            transition: background 0.2s, transform 0.2s;
            margin-top: 8px;
        }
        .btn:hover {
            background: linear-gradient(90deg, #388e3c 0%, #2ecc71 100%);
            transform: scale(1.05);
        }
        .msg-success {
            background: #e0f7fa;
            color: #2ecc71;
            padding: 12px;
            border-radius: 8px;
            margin-bottom: 18px;
            text-align: center;
            font-weight: 600;
        }
        .msg-error {
            background: #ffebee;
            color: #e74c3c;
            padding: 12px;
            border-radius: 8px;
            margin-bottom: 18px;
            text-align: center;
            font-weight: 600;
        }
        .back {
            text-align: center;
            margin-top: 18px;
        }
        .back a {
            color: #27ae60;
            font-weight: bold;
            text-decoration: none;
            font-size: 1.1em;
        }
        .back a:hover {
            text-decoration: underline;
        }
        .sertifikat-preview {
            text-align: center;
            margin-bottom: 16px;
        }
        .sertifikat-preview img, .sertifikat-preview embed {
            max-width: 180px;
            max-height: 120px;
            border-radius: 8px;
            box-shadow: 0 2px 8px #43e97b33;
        }
        .sertifikat-preview span {
            color: #888;
        }
    </style>
</head>
<body>
    <div class="container">
        <h2><i class="fa-solid fa-pen-to-square"></i> Edit Prestasi Siswa</h2>

        <form method="post" enctype="multipart/form-data">
            <label for="id_pendaftaran">Pilih Siswa & Ekstrakurikuler</label>
            <select name="id_pendaftaran" id="id_pendaftaran" required>
                <option value="">-- Pilih Siswa & Ekstrakurikuler --</option>
                <?php foreach ($pendaftaran as $p): ?>
                    <option value="<?= $p['id_pendaftaran'] ?>" <?= $prestasi['id_pendaftaran'] == $p['id_pendaftaran'] ? 'selected' : '' ?>>
                        <?= htmlspecialchars($p['nama_siswa']) ?> - <?= htmlspecialchars($p['nama_eskul']) ?>
                    </option>
                <?php endforeach; ?>
            </select>

            <label for="nama_prestasi">Nama Prestasi</label>
            <input type="text" name="nama_prestasi" id="nama_prestasi" value="<?= htmlspecialchars($prestasi['nama_prestasi']) ?>" required>

            <label for="tingkat">Tingkat</label>
            <select name="tingkat" id="tingkat" required>
                <option value="">-- Pilih Tingkat --</option>
                <option value="sekolah" <?= $prestasi['tingkat']=='sekolah'?'selected':''; ?>>Sekolah</option>
                <option value="kecamatan" <?= $prestasi['tingkat']=='kecamatan'?'selected':''; ?>>Kecamatan</option>
                <option value="kabupaten" <?= $prestasi['tingkat']=='kabupaten'?'selected':''; ?>>Kabupaten</option>
                <option value="provinsi" <?= $prestasi['tingkat']=='provinsi'?'selected':''; ?>>Provinsi</option>
                <option value="nasional" <?= $prestasi['tingkat']=='nasional'?'selected':''; ?>>Nasional</option>
                <option value="intenasional" <?= $prestasi['tingkat']=='intenasional'?'selected':''; ?>>Internasional</option>
            </select>

            <label for="tanggal">Tanggal Prestasi</label>
            <input type="date" name="tanggal" id="tanggal" value="<?= htmlspecialchars($prestasi['tanggal']) ?>" required>

            <label for="deskripsi">Deskripsi</label>
            <textarea name="deskripsi" id="deskripsi" required><?= htmlspecialchars($prestasi['deskripsi']) ?></textarea>

            <label for="sertifikat">Upload Sertifikat (jpg/png/pdf, opsional)</label>
            <input type="file" name="sertifikat" id="sertifikat" accept=".jpg,.jpeg,.png,.gif,.pdf">
            <div class="sertifikat-preview">
                <?php if (!empty($prestasi['sertifikat'])): 
                    $ext = strtolower(pathinfo($prestasi['sertifikat'], PATHINFO_EXTENSION));
                    $file_url = "uploads/sertifikat/" . htmlspecialchars($prestasi['sertifikat']);
                    if (in_array($ext, ['jpg','jpeg','png','gif'])): ?>
                        <img src="<?= $file_url ?>" alt="Sertifikat">
                    <?php elseif ($ext == 'pdf'): ?>
                        <embed src="<?= $file_url ?>" type="application/pdf" width="120" height="80">
                        <br><a href="<?= $file_url ?>" target="_blank">Lihat Sertifikat</a>
                    <?php endif; ?>
                <?php else: ?>
                    <span>Tidak ada sertifikat.</span>
                <?php endif; ?>
            </div>

            <button type="submit" class="btn"><i class="fa-solid fa-save"></i> Simpan Perubahan</button>
        </form>
        <div class="back">
            <a href="admin_prestasi.php"><i class="fa-solid fa-arrow-left"></i> Kembali ke Data Prestasi</a>
        </div>
    </div>

        <footer>
        <hr>
        <p>&copy;  <?php echo date('Y');?>  SMKN 13 BDG. Hak Cipta Dilindungi.</p>
    </footer>
</body>
</html>