<?php
include '../includes/db.php';

$stmt = $pdo->prepare("
UPDATE Orders SET
CustomerID=?,
EmployeeID=?,
OrderDate=?,
ShipperID=?
WHERE OrderID=?
");

$stmt->execute([
$_POST['CustomerID'],
$_POST['EmployeeID'],
$_POST['OrderDate'],
$_POST['ShipperID'],
$_POST['OrderID']
]);

echo json_encode(["message"=>"Order updated successfully"]);
?>