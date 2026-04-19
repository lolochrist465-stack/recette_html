<?php
require "Database.php";
require "Commande.php";

$db = (new Database())->connect();
$commande = new Commande($db);
if (isset($_GET['del'])) {
    $id = $_GET['del'];
    $commande->deleteCommande($id);
    echo "<p style='color:salmon;'>❌ Produit retiré !</p>";
}
$commandes = $commande->listCommandes();

$total = 0;
?>

<!DOCTYPE html>
<html>
<head>
    <title>Panier</title>
    <link href="cart.css" rel="stylesheet">
</head>

<body>

<div class="container">

<h2>Mon panier 🛒</h2>

<?php if (!empty($commandes)): ?>

<table>
    <tr>
        <th>ID</th>
        <th>Produit</th>
        <th>Prix</th>
        <th>Date</th>
        <th>Telephone</th>
        <th>Retirer du panier</th>
    </tr>

    <?php foreach ($commandes as $c): ?>
        <tr>
            <td><?= $c["Commande_ID"] ?></td>
            <td><?= $c["Nom_Produit"] ?></td>
            <td><?= $c["Prix_Produit"] ?> DT</td>
            <td><?= $c["Command_Time"] ?></td>
            <td><?= $c["Telephone"] ?></td>
            <td>
                <a href="?del=<?= $c['Commande_ID'] ?>" class="btn" style="color:red;">Supprimer</a>
            </td>
        </tr>

        <?php $total += $c["Prix_Produit"]; ?>

    <?php endforeach; ?>

</table>

<p class="total">Total : <?= number_format($total, 2) ?> $</p>

<?php else: ?>
    <p class="empty">Panier vide 😢</p>
<?php endif; ?>

<a href="To_DO_List.php" class="btn">⬅ Retour aux produits</a>
<a href="Paiement.php" class="btn">Passer à la caisse ➡</a>

</div>

</body>
</html>