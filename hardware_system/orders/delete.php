<?php
include '../includes/db.php';

$stmt = $pdo->prepare("DELETE FROM Orders WHERE OrderID=?");
$stmt->execute([$_POST['id']]);

echo json_encode(["message"=>"Order deleted successfully"]);
?>