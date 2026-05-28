<?php
include '../includes/db.php';
header('Content-Type: application/json');

try {

$stmt = $pdo->prepare("
UPDATE Products SET
ProductName=?,
SupplierID=?,
CategoryID=?,
Unit=?,
Price=?
WHERE ProductID=?
");

$stmt->execute([
$_POST['ProductName'],
$_POST['SupplierID'],
$_POST['CategoryID'],
$_POST['Unit'],
$_POST['Price'],
$_POST['ProductID']
]);

echo json_encode(["message" => "Product updated successfully"]);

} catch (Exception $e) {
echo json_encode(["message" => $e->getMessage()]);
}
?>