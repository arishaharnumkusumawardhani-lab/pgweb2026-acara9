<!DOCTYPE html>
<html>
<head>
    <title>Form Edit Kuliner</title>
</head>
<body>
<h2>Form Edit Data Kuliner</h2>

<?php
$servername = "localhost";
$username   = "root";
$password   = "";
$dbname     = "latihan";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$id = $_GET['id'];
$sql = "SELECT * FROM kuliner WHERE id = $id";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    echo "<form action='edit.php' method='post'>";
    while($row = $result->fetch_assoc()) {
        echo "<input type='hidden' name='id' value='" . $row['id'] . "'><br>";
        
        echo "<label>Jenis Usaha: </label><br>";
        echo "<input type='text' name='jenis_usaha' value='" . $row['jenis_usaha'] . "'><br>";

        echo "<label>Nama Tempat: </label><br>";
        echo "<input type='text' name='nama' value='" . $row['nama'] . "'><br>";

        echo "<label>Alamat: </label><br>";
        echo "<textarea name='alamat' rows='3' cols='40'>" . $row['alamat'] . "</textarea><br>";

        echo "<label>Kecamatan: </label><br>";
        echo "<input type='text' name='kecamatan' value='" . $row['kecamatan'] . "'><br>";
        
        echo "<label>Longitude: </label><br>";
        echo "<input type='text' name='longitude' value='" . $row['longitude'] . "'><br>";

        echo "<label>Latitude: </label><br>";
        echo "<input type='text' name='latitude' value='" . $row['latitude'] . "'><br><br>";
        
        echo "<input type='submit' value='Simpan Perubahan'>";
    }
    echo "</form>";
} else {
    echo "Data tidak ditemukan.";
}
$conn->close();
?>

</body>
</html>