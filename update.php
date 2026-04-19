<?php
include 'config.php';

$id = $_GET['id'];

// GET DATA
$stmt = $conn->prepare("SELECT * FROM developers WHERE id = :id");
$stmt->execute([':id' => $id]);
$data = $stmt->fetch(PDO::FETCH_ASSOC);

// UPDATE
if(isset($_POST['update'])){
    $sql = "UPDATE developers SET 
        name=:name, age=:age, specialty=:specialty,
        experience_years=:exp, portfolio_link=:portfolio, email=:email
        WHERE id=:id";

    $stmt = $conn->prepare($sql);
    $stmt->execute([
        ':name' => $_POST['name'],
        ':age' => $_POST['age'],
        ':specialty' => $_POST['specialty'],
        ':exp' => $_POST['experience_years'],
        ':portfolio' => $_POST['portfolio_link'],
        ':email' => $_POST['email'],
        ':id' => $id
    ]);

    header("Location: index.php");
}
?>

<h2>Edit Applicant</h2>

<form method="POST">
    <input type="text" name="name" value="<?= $data['name'] ?>"><br>
    <input type="number" name="age" value="<?= $data['age'] ?>"><br>
    <input type="text" name="specialty" value="<?= $data['specialty'] ?>"><br>
    <input type="number" name="experience_years" value="<?= $data['experience_years'] ?>"><br>
    <input type="text" name="portfolio_link" value="<?= $data['portfolio_link'] ?>"><br>
    <input type="email" name="email" value="<?= $data['email'] ?>"><br>
    <button type="submit" name="update">Update</button>
</form>