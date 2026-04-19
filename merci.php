<!DOCTYPE html>
<html lang="fr">
<head>
<meta charset="UTF-8">
<title>Merci pour votre achat</title>

<link href="https://fonts.googleapis.com/css2?family=Rajdhani:wght@600;700&family=DM+Sans:wght@400;500&display=swap" rel="stylesheet">

<style>
:root {
  --bg: #0f172a;
  --surface: #1e293b;
  --green: #22c55e;
  --text: #e2e8f0;
}

body {
  margin:0;
  font-family:'DM Sans',sans-serif;
  background: var(--bg);
  color: var(--text);
  display:flex;
  justify-content:center;
  align-items:center;
  height:100vh;
}

.card {
  background: var(--surface);
  padding:40px;
  border-radius:20px;
  text-align:center;
  max-width:500px;
}

h1 {
  font-family:'Rajdhani',sans-serif;
  color: var(--green);
  font-size:2rem;
}

p {
  margin-top:15px;
  opacity:0.8;
}

.btn {
  display:inline-block;
  margin-top:25px;
  padding:12px 20px;
  background: var(--green);
  color:white;
  text-decoration:none;
  border-radius:8px;
}
</style>

</head>
<body>

<div class="card">

<h1>✅ Paiement réussi !</h1>

<p>Merci pour votre achat 🙏</p>
<p>Votre commande a été enregistrée avec succès.</p>
<?php
$total = $_GET['total'] ?? 0;
$produits = $_GET['produits'] ?? "";

$produitsArray = explode(",", $produits);
?>

<h2>Merci pour votre achat</h2>

<p>Total payé : <?= $total ?> $</p>

<ul>
<?php foreach ($produitsArray as $p): ?>
  <li><?= $p ?></li>
<?php endforeach; ?>
</ul>
<a href="TO_DO_List.php" class="btn">🏠 Retour à l'accueil</a>

</div>

</body>
</html>