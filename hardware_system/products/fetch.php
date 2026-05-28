<?php
include '../includes/db.php';
header('Content-Type: application/json');

if(isset($_GET['id'])){

$stmt = $pdo->prepare("SELECT * FROM Products WHERE ProductID=?");
$stmt->execute([$_GET['id']]);

echo json_encode($stmt->fetchAll(PDO::FETCH_ASSOC));
exit;
}

$stmt = $pdo->prepare("SELECT * FROM Products ORDER BY ProductID DESC");
$stmt->execute();

echo json_encode([
    "data" => $stmt->fetchAll(PDO::FETCH_ASSOC)
]);
?>