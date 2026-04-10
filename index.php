<?php
require_once "config/db.php";
include "includes/header.php";

// klanten ophalen
$stmt = $conn->prepare("SELECT * FROM klanten ORDER BY id DESC");
$stmt->execute();
$klanten = $stmt->fetchAll(PDO::FETCH_ASSOC);
?>

<h1 class="mb-4">👤 Klanten Overzicht</h1>

<a href="create.php" class="btn btn-success mb-3">
    + Nieuwe klant
</a>

<table class="table table-striped table-bordered">

    <thead class="table-dark">
        <tr>
            <th>ID</th>
            <th>Naam</th>
            <th>Adres</th>
            <th>Woonplaats</th>
            <th>Acties</th>
        </tr>
    </thead>

    <tbody>

    <?php foreach ($klanten as $klant): ?>
        <tr>

            <td><?= $klant['id']; ?></td>
            <td><?= $klant['naam']; ?></td>
            <td><?= $klant['adres']; ?></td>
            <td><?= $klant['woonplaats']; ?></td>

            <td>

                <a href="edit.php?id=<?= $klant['id']; ?>" 
                   class="btn btn-primary btn-sm">
                   Edit
                </a>

                <a href="delete.php?id=<?= $klant['id']; ?>" 
                   class="btn btn-danger btn-sm"
                   onclick="return confirm('Weet je het zeker?');">
                   Delete
                </a>

            </td>

        </tr>
    <?php endforeach; ?>

    </tbody>

</table>

<?php include "includes/footer.php"; ?>