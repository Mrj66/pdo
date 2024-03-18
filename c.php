<?php
require_once 'prosit.php';

$nom = $_POST['nom'];
$prenom = $_POST['prenom'];

$sql = "INSERT INTO votre_table (nom, prenom) VALUES (?, ?)";
$stmt = $conn->prepare($sql);
$stmt->bind_param("ss", $nom, $prenom);

if ($stmt->execute()) {
    http_response_code(200);
    echo json_encode(['message' => 'Données ajoutées avec succès']);
} else {
    http_response_code(500);
    echo json_encode(['error' => 'Erreur lors de l\'ajout des données']);
}

$stmt->close();
$conn->close();
?>
