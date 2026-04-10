<?php
require_once "config/db.php";
include "includes/header.php";

// id ophalen
$id = $_GET['id'];

// klant ophalen
$stmt = $conn->prepare("SELECT * FROM klanten WHERE id = ?");
$stmt->execute([$id]);
$klant = $stmt->fetch(PDO::FETCH_ASSOC);

// update uitvoeren
if ($_SERVER["REQUEST_METHOD"] == "POST") {

    $naam = $_POST["naam"];
    $adres = $_POST["adres"];
    $woonplaats = $_POST["woonplaats"];

    $stmt = $conn->prepare("
        UPDATE klanten 
        SET naam=?, adres=?, woonplaats=? 
        WHERE id=?
    ");

    $stmt->execute([
        $naam,
        $adres,
        $woonplaats,
        $id
    ]);

    header("Location: index.php");
    exit();
}
?>

<h2>Klant bewerken</h2>

<form method="POST">

    <div class="mb-3">
        <label>Naam</label>
        <input type="text" name="naam" class="form-control"
               value="<?= $klant['naam']; ?>" required>
    </div>

    <div class="mb-3">
        <label>Adres</label>
        <input type="text" name="adres" class="form-control"
               value="<?= $klant['adres']; ?>" required>
    </div>

    <div class="mb-3">
        <label>Woonplaats</label>
        <input type="text" name="woonplaats" class="form-control"
               value="<?= $klant['woonplaats']; ?>" required>
    </div>

    <button class="btn btn-primary">Opslaan</button>
    <a href="index.php" class="btn btn-secondary">Terug</a>

</form>

<?php include "includes/footer.php"; ?>