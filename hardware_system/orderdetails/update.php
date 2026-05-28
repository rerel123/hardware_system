<?php
include '../includes/db.php';

$stmt = $pdo->prepare("
UPDATE OrderDetails SET
OrderID=?,
ProductID=?,
Quantity=?
WHERE OrderDetailID=?
");

$stmt->execute([
$_POST['OrderID'],
$_POST['ProductID'],
$_POST['Quantity'],
$_POST['OrderDetailID']
]);

echo json_encode(["message"=>"Order detail updated successfully"]);
?>