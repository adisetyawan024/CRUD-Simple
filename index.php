<?php require_once 'config.php'; ?>
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>CRUD Simple Data Mahasiswa</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>

<div class="container">
    <h2>CRUD Simple Data Mahasiswa</h2>

    <input type="text" id="search" placeholder="Cari mahasiswa...">
    <button id="open-modal">➕ Tambah Mahasiswa</button>
    
    <table>
        <thead>
            <tr>
                <th>Nama</th>
                <th>NIM</th>
                <th>Jurusan</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody id="table-body">
            <?php foreach (getData() as $m): ?>
            <tr>
                <td><?= htmlspecialchars($m['nama']) ?></td>
                <td><?= htmlspecialchars($m['nim']) ?></td>
                <td><?= htmlspecialchars($m['jurusan']) ?></td>
                <td>
                    <div class="t">
                        <button class="edit-btn" 
                            data-id="<?= $m['id'] ?>" 
                            data-nama="<?= $m['nama'] ?>" 
                            data-nim="<?= $m['nim'] ?>" 
                            data-jurusan="<?= $m['jurusan'] ?>">✏ Ubah</button>
                        <a class="hapus" href="index.php?delete=<?= $m['id'] ?>" onclick="return confirm('Hapus?')">🗑 Hapus</a>
                    </div>
                </td>
            </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
</div>

<!-- MODAL TAMBAH MAHASISWA -->
<div id="modal" class="modal">
    <div class="modal-content">
        <span class="close">&times;</span>
        <h3 id="modal-title">Tambah Mahasiswa</h3>
        <form method="POST">
            <input type="hidden" name="id" id="id">
            <input type="text" name="nama" id="nama" placeholder="Nama" required>
            <input type="text" name="nim" id="nim" placeholder="NIM" required>
            <input type="text" name="jurusan" id="jurusan" placeholder="Jurusan" required>
            <button type="submit" name="simpan" id="submit-btn">Tambah</button>
        </form>
    </div>
</div>

<script src="script.js"></script>
</body>
</html>
