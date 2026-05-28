<?php
include '../includes/db.php';

$stmt = $pdo->prepare("DELETE FROM Suppliers WHERE SupplierID=?");
$stmt->execute([$_POST['id']]);

echo json_encode(["message"=>"Supplier deleted successfully"]);
?>