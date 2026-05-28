<?php
include '../includes/db.php';

$stmt = $pdo->prepare("
INSERT INTO Suppliers (SupplierName, ContactName, Address, City, CountryPhone)
VALUES (?,?,?,?,?)
");

$stmt->execute([
$_POST['SupplierName'],
$_POST['ContactName'],
$_POST['Address'],
$_POST['City'],
$_POST['CountryPhone']
]);

echo json_encode(["message"=>"Supplier added successfully"]);
?>