<?php
include '../includes/db.php';
header('Content-Type: application/json');

$stmt = $pdo->prepare("
INSERT INTO Categories (CategoryName, Description)
VALUES (?, ?)
");

$stmt->execute([
    $_POST['CategoryName'],
    $_POST['Description']
]);

echo json_encode(["message" => "Category added successfully"]);
?>