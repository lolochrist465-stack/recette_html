<?php
require "Database.php";
require "Commande.php";

$db = (new Database())->connect();
$commande = new Commande($db);

// Récupérer commandes
$commandes = $commande->listCommandes();

$total = 0;
foreach ($commandes as $c) {
    $total += $c["Prix_Produit"];
}

// Paiement
if (isset($_POST['payer'])) {
    $telephone = $_POST['Telephone'];

    // mettre à jour toutes les commandes
    $stmt = $db->prepare("UPDATE site_commande SET Telephone = ?");
    $stmt->execute([$telephone]);
    $produits = [];

    foreach ($commandes as $c) {
      $produits[] = $c["Nom_Produit"];
    }

    $listeProduits = implode(",", $produits);

    header("Location: merci.php?total=" . $total . "&produits=" . urlencode($listeProduits));
    exit();
}
?>
<!DOCTYPE html>
<html lang="fr">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Paiement – Mini E-Commerce</title>
<link href="https://fonts.googleapis.com/css2?family=Rajdhani:wght@500;600;700&family=DM+Sans:wght@300;400;500&display=swap" rel="stylesheet">
<link href="Paiement.css" rel="stylesheet">
</head>

<body>

<nav>
  <div class="logo">Mini-E-Commerce 🔥</div>
</nav>

<div class="container">

<!-- FORMULAIRE -->
<div>
<div class="card">

<h2>💳 Paiement</h2>

<form method="POST">

<input type="text" placeholder="Prénom" required>
<input type="text" placeholder="Nom" required>
<input type="email" placeholder="Email" required>
<input type="text" placeholder="Téléphone" required>

<input type="text" placeholder="Numéro carte" required>
<input type="text" placeholder="Nom carte" required>
<input type="text" placeholder="MM/AA" required>
<input type="text" placeholder="CVV" required>

<button name="payer" class="btn-pay">
💳 Confirmer le paiement
</button>

</form>

<a href="cart.php" class="btn">← Retour</a>

</div>
</div>

<!-- RÉCAP -->
<div>
<div class="card">

<h2>🛒 Récapitulatif</h2>

<?php if (!empty($commandes)): ?>

<?php foreach ($commandes as $c): ?>
<div class="recap-item">
  <span><?= $c["Nom_Produit"] ?></span>
  <span><?= $c["Prix_Produit"] ?> $</span>
</div>
<?php endforeach; ?>

<div class="price-row">
<span>Sous-total</span>
<span><?= number_format($total,2) ?> $</span>
</div>

<div class="price-row">
<span>Réduction</span>
<span>-<?= number_format($total*0.1,2) ?> $</span>
</div>

<div class="price-row total">
<span>Total</span>
<span><?= number_format($total*0.9,2) ?> $</span>
</div>

<?php else: ?>
<p>Panier vide 😢</p>
<?php endif; ?>

</div>
</div>

</div>

</body>
</html>