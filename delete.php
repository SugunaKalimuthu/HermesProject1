<?php
$servername = "sql113.ezyro.com";
$username = "ezyro_38690926";
$password = "41f5de75fd";
$dbname = "ezyro_38690926_astonmarinhermes";

$conn = new mysqli($servername, $username, $password, $dbname);
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Validate and sanitize 'id'
$id = filter_input(INPUT_GET, 'id', FILTER_VALIDATE_INT);
if ($id === false || $id === null) {
    die("Invalid ID parameter.");
}

// Prepare and execute delete query
$sql = "DELETE FROM submissions WHERE id=?";
$stmt = $conn->prepare($sql);
if (!$stmt) {
    die("Error preparing statement: " . $conn->error);
}
$stmt->bind_param("i", $id);

if (!$stmt->execute()) {
    die("Error executing query: " . $stmt->error);
}

// Close the statement and connection
$stmt->close();
$conn->close();

// Redirect with a success alert
echo "<script>alert('Record deleted successfully!'); window.location='view.php';</script>";
exit;
?>
