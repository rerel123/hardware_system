<?php
include '../includes/db.php';

$stmt = $pdo->prepare("DELETE FROM Employees WHERE EmployeeID=?");
$stmt->execute([$_POST['id']]);

echo json_encode(["message"=>"Employee deleted successfully"]);
?>