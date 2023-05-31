<?php
// Koneksi ke database
$conn = mysqli_connect("localhost","root","","siakad");

//ambil data dari tabel mahasiswa
$result = mysqli_query($conn, "SELECT * FROM mahasiswa");

echo"<a href='/siakad/mahasiswa/add.php'>tambah mahasiswa</a>";

if (mysqli_num_rows($result) > 0) {
    // Menampilkan data dalam bentuk tabel
    echo "<table>";
    echo "<tr><th>ID</th><th>Nama</th><th>NIM</th><th>Program Studi</th></tr>";
    while ($row = mysqli_fetch_assoc($result)) {
        echo "<tr>";
        echo "<td>".$row["id"]."</td>";
        echo "<td>".$row["nama"]."</td>";
        echo "<td>".$row["nim"]."</td>";
        echo "<td>".$row["program_studi"]."</td>";
        echo "<td><a href='/siakad/mahasiswa/edit.php?id=".
         $row["id"]."'>Edit</a> | <a href='/siakad/mahasiswa/delete.php?id=".$row["id"]."'>Hapus</a></td>";
        echo "</tr>";
    }
    echo "</table>";
} else {
    echo "Tidak ada data.";
}

// Menutup koneksi
mysqli_close($conn);
?>
