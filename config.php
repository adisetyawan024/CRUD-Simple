<?php
// Koneksi ke database
$conn = new mysqli("localhost", "root", "root", "kampus_db");
if ($conn->connect_error) {
    die("Koneksi gagal: " . $conn->connect_error);
}

// Function untuk mendapatkan data
function getData($keyword = "") {
    global $conn;
    $sql = "SELECT * FROM mahasiswa WHERE nama LIKE ?";
    $stmt = $conn->prepare($sql);
    $likeKeyword = "%$keyword%";
    $stmt->bind_param("s", $likeKeyword);
    $stmt->execute();
    return $stmt->get_result()->fetch_all(MYSQLI_ASSOC);
}

// Function untuk insert atau update data
if (isset($_POST['simpan'])) {
    $id = $_POST['id'];
    $nama = $_POST['nama'];
    $nim = $_POST['nim'];
    $jurusan = $_POST['jurusan'];

    if ($id) { // Jika ada ID, update data
        $stmt = $conn->prepare("UPDATE mahasiswa SET nama=?, nim=?, jurusan=? WHERE id=?");
        $stmt->bind_param("sssi", $nama, $nim, $jurusan, $id);
    } else { // Jika tidak ada ID, insert data baru
        $stmt = $conn->prepare("INSERT INTO mahasiswa (nama, nim, jurusan) VALUES (?, ?, ?)");
        $stmt->bind_param("sss", $nama, $nim, $jurusan);
    }
    $stmt->execute();
    header("Location: index.php");
}

// Function untuk delete data
if (isset($_GET['delete'])) {
    $id = $_GET['delete'];
    $stmt = $conn->prepare("DELETE FROM mahasiswa WHERE id=?");
    $stmt->bind_param("i", $id);
    $stmt->execute();
    header("Location: index.php");
}

// Function untuk Live Search (AJAX)
if (isset($_GET['search'])) {
    $keyword = $_GET['search'];
    echo json_encode(getData($keyword));
    exit();
}
?>
