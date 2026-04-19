<?php
class Commande {
    private $conn;
    public function __construct($db) {
        $this->conn = $db;
    }
    // Ajouter une commande
    public function createCommande($produit, $prix) {
        $sql = "INSERT INTO site_commande (Nom_PRODUIT, Prix_PRODUIT) 
                VALUES (:produit, :prix)";
        $stmt = $this->conn->prepare($sql);
        $stmt->bindParam(':produit', $produit);
        $stmt->bindParam(':prix', $prix);
        return $stmt->execute();
    }
    // Récupérer une commande par ID
    public function getCommandeById($id) {
        $sql = "SELECT * FROM site_commande WHERE Commande_ID = :id";
        $stmt = $this->conn->prepare($sql);
        $stmt->bindParam(':id', $id);
        $stmt->execute();
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }
    // Mettre à jour une commande
    public function updateCommande($id, $produit, $prix) {
        $sql = "UPDATE site_commande
                SET Nom_PRODUIT = :produit, Prix_PRODUIT = :prix 
                WHERE Command_ID = :id";
        $stmt = $this->conn->prepare($sql);
        $stmt->bindParam(':id', $id);
        $stmt->bindParam(':produit', $produit);
        $stmt->bindParam(':prix', $prix);
        return $stmt->execute();
    }
    // Supprimer une commande
    public function deleteCommande($id) {
        $sql = "DELETE FROM site_commande WHERE Commande_ID = :id";
        $stmt = $this->conn->prepare($sql);
        $stmt->bindParam(':id', $id);
        return $stmt->execute();
    }
    // Lister toutes les commandes
    public function listCommandes() {
        $sql = "SELECT * FROM site_commande ORDER BY Commande_ID DESC";
        $stmt = $this->conn->query($sql);
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }
}

?>