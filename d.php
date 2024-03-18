<?php
require_once 'prosit.php';

$id = $_POST['id'];

$sql = "DELETE FROM votre_table WHERE id = ?";
$stmt = $conn->prepare($sql);
$stmt->bind_param("i", $id);

if ($stmt->execute()) {
    http_response_code(200);
    echo json_encode(['message' => 'Données supprimées avec succès']);
} else {
    http_response_code(500);
    echo json_encode(['error' => 'Erreur lors de la suppression des données']);
}

$stmt->close();
$conn->close();
?>
