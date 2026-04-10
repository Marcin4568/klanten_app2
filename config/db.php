<?php
$host = "localhost";
$dbname = "naw_db";
$user = "root";
$pass = "";

try {
    $conn = new PDO("mysql:host=$host;dbname=$dbname;charset=utf8", $user, $pass);

    // fouten tonen (handig voor school)
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

} catch (PDOException $e) {
    die("Database verbinding mislukt: " . $e->getMessage());
}
?>