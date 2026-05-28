<?php
include '../includes/db.php';

$stmt = $pdo->prepare("
INSERT INTO Employees (FirstName, LastName, BirthDate, Role)
VALUES (?,?,?,?)
");

$stmt->execute([
$_POST['FirstName'],
$_POST['LastName'],
$_POST['BirthDate'],
$_POST['Role']
]);

echo json_encode(["message"=>"Employee added successfully"]);
?>