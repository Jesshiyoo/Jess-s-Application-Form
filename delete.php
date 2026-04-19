<?php
include 'config.php';

$stmt = $conn->prepare("DELETE FROM developers WHERE id = :id");
$stmt->execute([':id' => $_GET['id']]);

header("Location: index.php");
?>