<?php
include '../includes/db.php';

$stmt = $pdo->prepare("
INSERT INTO Orders (CustomerID, EmployeeID, OrderDate, ShipperID)
VALUES (?,?,?,?)
");

$stmt->execute([
$_POST['CustomerID'],
$_POST['EmployeeID'],
$_POST['OrderDate'],
$_POST['ShipperID']
]);

echo json_encode(["message"=>"Order added successfully"]);
?>