<?php
include '../includes/db.php';

$stmt = $pdo->prepare("DELETE FROM OrderDetails WHERE OrderDetailID=?");
$stmt->execute([$_POST['id']]);

echo json_encode(["message"=>"Order detail deleted successfully"]);
?>