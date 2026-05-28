<?php
include '../includes/db.php';
header('Content-Type: application/json');

$stmt = $pdo->prepare("
DELETE FROM Categories WHERE CategoryID = ?
");

$stmt->execute([$_POST['id']]);

echo json_encode(["message" => "Category deleted successfully"]);
?>