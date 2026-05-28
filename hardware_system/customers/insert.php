<?php
include '../includes/db.php';

$stmt = $pdo->prepare("
INSERT INTO Customers (CustomerName, ContactName, Address, City, Country)
VALUES (?,?,?,?,?)
");

$stmt->execute([
$_POST['CustomerName'],
$_POST['ContactName'],
$_POST['Address'],
$_POST['City'],
$_POST['Country']
]);

echo json_encode(["message"=>"Customer added successfully"]);
?>