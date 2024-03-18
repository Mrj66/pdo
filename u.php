<?php
require_once 'prosit.php';

$id = $_POST['id'];
$nom = $_POST['nom'];
$prenom = $_POST['prenom'];

$sql = "UPDATE votre_table SET nom = ?, prenom = ? WHERE id = ?";
$stmt = $conn->prepare($sql);
$stmt->bind_param("ssi", $nom, $prenom, $id);

if ($stmt->execute()) {
    http_response_code(200);
    echo json_encode(['message' => 'Données modifiées avec succès']);
} else {
    http_response_code(500);
    echo json_encode(['error' => 'Erreur lors de la modification des données']);
}

$stmt->close();
$conn->close();
?>
