<?php
include 'config.php';

$sql = "INSERT INTO developers (name, age, specialty, experience_years, portfolio_link, email)
VALUES (:name, :age, :specialty, :exp, :portfolio, :email)";

$stmt = $conn->prepare($sql);
$stmt->execute([
    ':name' => $_POST['name'],
    ':age' => $_POST['age'],
    ':specialty' => $_POST['specialty'],
    ':exp' => $_POST['experience_years'],
    ':portfolio' => $_POST['portfolio_link'],
    ':email' => $_POST['email']
]);

header("Location: index.php");
?>