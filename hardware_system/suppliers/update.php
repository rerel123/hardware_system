<?php
include '../includes/db.php';

$stmt = $pdo->prepare("
UPDATE Suppliers SET
SupplierName=?,
ContactName=?,
Address=?,
City=?,
CountryPhone=?
WHERE SupplierID=?
");

$stmt->execute([
$_POST['SupplierName'],
$_POST['ContactName'],
$_POST['Address'],
$_POST['City'],
$_POST['CountryPhone'],
$_POST['SupplierID']
]);

echo json_encode(["message"=>"Supplier updated successfully"]);
?>