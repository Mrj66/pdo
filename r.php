<?php
require_once 'prosit.php';

$sql = "SELECT * FROM votre_table";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    http_response_code(200);
    echo json_encode($result->fetch_all(MYSQLI_ASSOC));
} else {
    http_response_code(204);
    echo json_encode([]);
}

$conn->close();
?>
