<?php
$servername = "localhost"; 
$username = "root"; 
$password = ""; 
$dbname = "soil_db"; 

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Check if the necessary POST data is set
if(isset($_POST['kelmbapan']) && isset($_POST['status'])) {
    $kelmbapan = $_POST['kelmbapan'];
    $status = $_POST['status'];

    // Insert data into database with current timestamp
    $sql = "INSERT INTO kel_tanah (kelmbapan, waktu, status) VALUES ('$kelmbapan', CURRENT_TIMESTAMP, '$status')";

    if ($conn->query($sql) === TRUE) {
        echo "Data baru berhasil diinmput";
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
} else {
    echo "Tidak ada data yang masuk";
}

$conn->close();
?>
