<?php
$id          = $_POST['id'];
$jenis_usaha = $_POST['jenis_usaha'];
$nama        = $_POST['nama'];
$alamat      = $_POST['alamat'];
$kecamatan   = $_POST['kecamatan'];
$longitude   = $_POST['longitude'];
$latitude    = $_POST['latitude'];

$servername = "localhost";
$username   = "root";
$password   = "";
$dbname     = "latihan";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$sql = "UPDATE kuliner SET 
            jenis_usaha='$jenis_usaha', 
            nama='$nama', 
            alamat='$alamat', 
            kecamatan='$kecamatan', 
            longitude=$longitude, 
            latitude=$latitude 
        WHERE id=$id";

if ($conn->query($sql) === TRUE) {
    echo "Record updated successfully";
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}

$conn->close();

header("Location: ../kuliner.php");
exit();
?>