<?php
include '../includes/db.php';
header('Content-Type: application/json');

try {

$stmt = $pdo->prepare("DELETE FROM Products WHERE ProductID=?");
$stmt->execute([$_POST['id']]);

echo json_encode(["message" => "Product deleted successfully"]);

} catch (Exception $e) {
echo json_encode(["message" => $e->getMessage()]);
}
?>