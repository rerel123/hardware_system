<?php
include '../includes/db.php';

$stmt = $pdo->prepare("DELETE FROM Shippers WHERE ShipperID=?");
$stmt->execute([$_POST['id']]);

echo json_encode(["message"=>"Shipper deleted successfully"]);
?>