<?php
require_once "config/db.php";

// Check of ID bestaat
if (isset($_GET["id"])) {

    $id = $_GET["id"];

    // DELETE query
    $stmt = $conn->prepare("DELETE FROM klanten WHERE id = ?");
    $stmt->execute([$id]);
}

// altijd terug naar index
header("Location: index.php");
exit;