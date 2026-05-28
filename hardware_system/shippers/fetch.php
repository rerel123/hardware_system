<?php
include '../includes/db.php';

header('Content-Type: application/json');

try {

    $stmt = $pdo->prepare("SELECT * FROM Shippers ORDER BY ShipperID DESC");
    $stmt->execute();

    $data = $stmt->fetchAll(PDO::FETCH_ASSOC);

    echo json_encode([
        "data" => $data
    ]);

} catch (Exception $e) {
    echo json_encode([
        "data" => [],
        "error" => $e->getMessage()
    ]);
}
?>