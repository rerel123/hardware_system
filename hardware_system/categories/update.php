<?php
include '../includes/db.php';
header('Content-Type: application/json');

$stmt = $pdo->prepare("
UPDATE Categories SET
CategoryName = ?,
Description = ?
WHERE CategoryID = ?
");

$stmt->execute([
    $_POST['CategoryName'],
    $_POST['Description'],
    $_POST['CategoryID']
]);

echo json_encode(["message" => "Category updated successfully"]);
?>