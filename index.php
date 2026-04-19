<?php include 'config.php'; ?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Job Application</title>
</head>
<body>

<h2>Jesshiyoo's Game Publisher Application</h2>

<form action="insert.php" method="POST">
    <input type="text" name="name" placeholder="Enter Name" required><br>
    <input type="number" name="age" placeholder="Enter Age" required><br>
    <input type="text" name="specialty" placeholder="Enter Specialty" required><br>
    <input type="number" name="experience_years" placeholder="Years of Experience" required><br>
    <input type="text" name="portfolio_link" placeholder="Portfolio Link"><br>
    <input type="email" name="email" placeholder="Email" required><br>
    <button type="submit">Submit</button>
</form>

<hr>

<?php
$stmt = $conn->query("SELECT * FROM developers");

echo "<table border='1'>
<tr>
<th>ID</th>
<th>Name</th>
<th>Age</th>
<th>Specialty</th>
<th>Exp</th>
<th>Portfolio</th>
<th>Email</th>
<th>Actions</th>
</tr>";

while($row = $stmt->fetch(PDO::FETCH_ASSOC)){
    echo "<tr>
    <td>{$row['id']}</td>
    <td>{$row['name']}</td>
    <td>{$row['age']}</td>
    <td>{$row['specialty']}</td>
    <td>{$row['experience_years']}</td>
    <td>{$row['portfolio_link']}</td>
    <td>{$row['email']}</td>
    <td>
        <a href='update.php?id={$row['id']}'>Edit</a> |
        <a href='delete.php?id={$row['id']}'>Delete</a>
    </td>
    </tr>";
}

echo "</table>";
?>

</body>
</html>