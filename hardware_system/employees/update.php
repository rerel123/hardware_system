<?php
include '../includes/db.php';

$stmt = $pdo->prepare("
UPDATE Employees SET
FirstName=?,
LastName=?,
BirthDate=?,
Role=?
WHERE EmployeeID=?
");

$stmt->execute([
$_POST['FirstName'],
$_POST['LastName'],
$_POST['BirthDate'],
$_POST['Role'],
$_POST['EmployeeID']
]);

echo json_encode(["message"=>"Employee updated successfully"]);
?>