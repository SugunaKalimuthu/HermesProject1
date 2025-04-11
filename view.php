<?php
$servername = "sql113.ezyro.com";
$username = "ezyro_38690926";
$password = "41f5de75fd";
$dbname = "ezyro_38690926_astonmarinhermes";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$sql = "SELECT * FROM submissions"; 
$result = $conn->query($sql);

if ($result === false) {
    die("Error executing query: " . $conn->error);
}

echo "<h2>Contact Form Submissions</h2>";
echo "<table border='1' cellpadding='8'>
<tr>
    <th>ID</th>
    <th>Name</th>
    <th>Email</th>
    <th>Message</th>
    <th>GCLID</th>
    <th>Actions</th>
</tr>";

while ($row = $result->fetch_assoc()) {
    echo "<tr>
        <td>" . htmlspecialchars($row['id']) . "</td>
        <td>" . htmlspecialchars($row['name']) . "</td>
        <td>" . htmlspecialchars($row['email']) . "</td>
        <td>" . htmlspecialchars($row['message']) . "</td>
        <td>" . htmlspecialchars($row['gclid']) . "</td>
        <td>
            <a href='edit.php?id=" . htmlspecialchars($row['id']) . "'>Edit</a> | 
            <a href='delete.php?id=" . htmlspecialchars($row['id']) . "' onclick=\"return confirm('Are you sure?');\">Delete</a>
        </td>
    </tr>";
}
echo "</table>";

$conn->close();
?>
