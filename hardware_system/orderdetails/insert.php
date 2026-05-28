<?php
include '../includes/db.php';

$stmt = $pdo->prepare("
INSERT INTO OrderDetails (OrderID, ProductID, Quantity)
VALUES (?,?,?)
");

$stmt->execute([
$_POST['OrderID'],
$_POST['ProductID'],
$_POST['Quantity']
]);

echo json_encode(["message"=>"Order detail added successfully"]);
?>