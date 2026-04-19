<?php
require "Database.php";
require "Commande.php";
$db = (new Database())->connect();
$commande = new Commande($db);
$products = [
    1 => ["nom" => "Casque Bluetooth", "prix" => 100],
    2 => ["nom" => "Montre connectée", "prix" => 300],
    3 => ["nom" => "Chaussures de sport", "prix" => 89.99],
    4 => ["nom" => "Google Pixel 8", "prix" => 1999.99],
    5 => ["nom" => "PS5", "prix" => 2099.99],
];
// Ajouter au panier (base de données)
if (isset($_POST['add'])) {
    $id = $_POST['add'];
    if (isset($products[$id])) {
        $produit = $products[$id]["nom"];
        $prix = $products[$id]["prix"];
        $telephone = $_POST['telephone'] ?? '';
        $commande->createCommande($produit, $prix);
        echo "<p style='color:lightgreen;'>✅ Produit ajouté !</p>";
    }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Mini E-Commerce</title>
    <link href="style.css" rel="stylesheet">
</head>
<body>
    <!-- BANNIÈRE -->
    <div class="container">
        <h1>Grandes Soldes 🔥</h1>
        <p><b>Jusqu'à -50% sur les articles 📦</b></p>
        <a href="#" class="btn-offre">Voir les offres 💡</a>
    </div>
    <!-- TITRE -->
    <div class="Alignment">
        <h2>Meilleures ventes 🔥</h2>
    </div>
    <!-- PRODUITS -->
    <div class="align">
        <div class="affichage">
            <img src="3000820.jpg" class="product-img">
            <p style="color: black;"><b>Casque Bluetooth 🎧</b></p>
            <p class="price">100 $</p>
            <form method="POST">
              <input type="hidden" name="add" value="1">
              <button class="btn">Ajouter au panier 🛒</button>
            </form>
        </div>
        <!-- PRODUIT 2 -->
        <div class="affichage">
            <img src="OIP (10).webp" class="product-img">
            <p style="color: black;"><b>Montre connectée ⌚</b></p>
            <p class="price">300 $</p>
            <form method="POST">
              <input type="hidden" name="add" value="2">
              <button class="btn">Ajouter au panier 🛒</button>
            </form>
        </div>
        <!-- PRODUIT 3 -->
        <div class="affichage">
            <img src="sg-11134201-7rbmw-llk42aqr1r91c2_tn.webp" class="product-img">
            <p style="color: black;"><b>Airs Pods</b></p>
            <p class="price">89,99 $</p>
            <form method="POST">
              <input type="hidden" name="add" value="3">
              <button class="btn">Ajouter au panier 🛒</button>
            </form>
        </div>
        <div class="affichage">
           <img src="VGAZM4QYiiwFRMyZ5tthCk-1200-80.jpg" class="product-img">
           <p style="color: black;"><b>Google Pixel 8 </b></p>
           <p class="price">1999,99 $</p>
           <form method="POST">
              <input type="hidden" name="add" value="4">
              <button class="btn">Ajouter au panier 🛒</button>
            </form>
        </div>
        <div class="affichage">
         <img src="LD0006086501.jpg" class="product-img">
         <p style="color: black;"><b>PS5 </b></p>
         <p class="price">2099,99 $</p>
         <form method="POST">
              <input type="hidden" name="add" value="5">
              <button class="btn">Ajouter au panier 🛒</button>
            </form>
        </div>
    </div>
    <!-- PANIER -->
    <div class="Alignment">
        <a href="cart.php" class="btn-panier"><b>Voir le panier 🛒</b></a>
    </div>
</body>
</html>