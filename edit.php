<?php
// Koneksi ke database
$conn = mysqli_connect("localhost","root","","siakad");

// Cek koneksi
if (!$conn) {
    die("Koneksi gagal: " . mysqli_connect_error());
}

echo "<a href='./index.php'>Kembali ke halaman list mahasiswa</a>";

// Memproses data yang dikirim dari form
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $id = $_POST["id"];
    $nama = $_POST["nama"];
    $nim = $_POST["nim"];
    $program_studi = $_POST["program_studi"];

    // Query untuk mengubah data dalam tabel mahasiswa
    $sql = "UPDATE mahasiswa SET nama='$nama', nim='$nim', program_studi='$program_studi' WHERE id=$id";

    if (mysqli_query($conn, $sql)) {
        echo "Data berhasil diubah.";
    } else {
        echo "Error: " . $sql . "<br>" . mysqli_error($conn);
    }
} else {
    $id = $_GET['id'];
    // Query untuk melihat data dalam tabel mahasiswa berdasarkan id
    $sql = "SELECT * FROM  mahasiswa WHERE id=$id";
    $result = mysqli_query($conn, $sql);
    if (mysqli_num_rows($result) > 0) {
        $row = mysqli_fetch_assoc($result);
        $nama = $row['nama'];
        $nim = $row['nim'];
        $program_studi = $row['program_studi'];
    } else {
        echo "Error: " . $sql . "<br>" . mysqli_error($conn);
    }
}

 // Menutup koneksi
 mysqli_close($conn);
?>

<!-- Form untuk mengubah data mahasiswa -->
<form method="POST" action="<?php echo $_SERVER["PHP_SELF"]; ?>">
    <input type="hidden" name="id" value="<?php echo $id; ?>">
    <label for="nama">Nama:</label>
    <input type="text" name="nama" id="nama" value="<?php echo $nama; ?>" required>
    <br>
    <label for="nim">NIM:</label>
    <input type="text" name="nim" id="nim" value="<?php echo $nim; ?>" required>
    <br>
    <label for="program_studi">Program Studi:</label>
    <input type="text" name="program_studi" id="program_studi" value="<?php echo $program_studi; ?>" required>
    <br>
    <input type="submit" value="Ubah">
</form>