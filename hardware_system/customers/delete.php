<?php
include '../includes/db.php';

$stmt = $pdo->prepare("DELETE FROM Customers WHERE CustomerID=?");
$stmt->execute([$_POST['id']]);

echo json_encode(["message"=>"Customer deleted successfully"]);
?>