<?php
// Koneksi ke database
$conn = mysqli_connect("localhost","root","","siakad");

// Cek koneksi
if (!$conn) {
    die("Koneksi gagal: " . mysqli_connect_error());
}

// Memproses data yang dikirim dari form
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $nama = $_POST["nama"];
    $nim = $_POST["nim"];
    $program_studi = $_POST["program_studi"];
    
    // Query untuk menambahkan data ke tabel mahasiswa
    $sql = "INSERT INTO mahasiswa (nama, nim, program_studi) VALUES ('$nama', '$nim', '$program_studi')";

    if (mysqli_query($conn, $sql)) {
        echo "Data berhasil ditambahkan.";
    } else {
        echo "Error: " . $sql . "<br>" . mysqli_error($conn);
    }
    
    // Menutup koneksi
    mysqli_close($conn);
}
?>
<a href="./index.php">Kembali ke halaman list mahasiswa</a>
<!-- Form untuk menambahkan data mahasiswa -->
<form method="POST" action="<?php echo $_SERVER["PHP_SELF"]; ?>">
    <label for="nama">Nama:</label>
    <input type="text" name="nama" id="nama" required>
    <br>
    <label for="nim">NIM:</label>
    <input type="text" name="nim" id="nim" required>
    <br>
    <label for="program_studi">Program Studi:</label>
    <input type="text" name="program_studi" id="program_studi" required>
    <br>
    <input type="submit" value="Tambahkan">
</form>