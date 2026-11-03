<?php
$servername = "localhost";
$username   = "root";
$password   = "";
$dbname     = "latihan";

// Buat koneksi
$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Query mengambil data kuliner
$sql = "SELECT * FROM kuliner";
$result = $conn->query($sql);

echo "<h2>Data Sebaran Usaha Kuliner Kota Bandung</h2>";
echo "<a href='input_kuliner/index.html'>Input Data Baru</a><br><br>";

if ($result->num_rows > 0) {
    echo "<table border='1px' cellpadding='8' cellspacing='0'>
            <tr>
                <th>No</th>
                <th>Jenis Usaha</th>
                <th>Nama Tempat</th>
                <th>Alamat</th>
                <th>Kecamatan</th>
                <th>Longitude</th>
                <th>Latitude</th>
                <th colspan='2'>Aksi</th>
            </tr>";

    $no = 1;
    while($row = $result->fetch_assoc()) {
        echo "<tr>
                <td>" . $no++ . "</td>
                <td>" . $row["jenis_usaha"] . "</td>
                <td>" . $row["nama"] . "</td>
                <td>" . $row["alamat"] . "</td>
                <td>" . $row["kecamatan"] . "</td>
                <td>" . $row["longitude"] . "</td>
                <td>" . $row["latitude"] . "</td>
                <td><a href='delete_kuliner.php?id=" . $row["id"] . "' onclick='return confirm(\"Apakah yakin ingin menghapus data ini?\");'>Hapus</a></td>
                <td><a href='edit_kuliner/index.php?id=" . $row["id"] . "'>Edit</a></td>
              </tr>";
    }
    echo "</table>";
} else {
    echo "Data tidak ditemukan.";
}

$conn->close();
?>