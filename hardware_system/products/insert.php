<?php
include '../includes/db.php';
header('Content-Type: application/json');

try {

$stmt = $pdo->prepare("
INSERT INTO Products (ProductName, SupplierID, CategoryID, Unit, Price)
VALUES (?, ?, ?, ?, ?)
");

$stmt->execute([
$_POST['ProductName'],
$_POST['SupplierID'],
$_POST['CategoryID'],
$_POST['Unit'],
$_POST['Price']
]);

echo json_encode(["message" => "Product added successfully"]);

} catch (Exception $e) {
echo json_encode(["message" => $e->getMessage()]);
}
?>