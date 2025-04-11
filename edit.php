<?php
$servername = "sql113.ezyro.com";
$username = "ezyro_38690926";
$password = "41f5de75fd";
$dbname = "ezyro_38690926_astonmarinhermes";

$conn = new mysqli($servername, $username, $password, $dbname);
if ($conn->connect_error) {
    error_log("Connection failed: " . $conn->connect_error);
    die("Unable to connect to the database.");
}

$id = filter_input(INPUT_GET, 'id', FILTER_VALIDATE_INT);
if ($id === false || $id === null) {
    die("Invalid ID parameter.");
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $name = htmlspecialchars($_POST['name']);
    $email = filter_var($_POST['email'], FILTER_SANITIZE_EMAIL);
    $message = htmlspecialchars($_POST['message']);
    $gclid = htmlspecialchars($_POST['gclid']);

    $update = "UPDATE submissions SET name=?, email=?, message=?, gclid=? WHERE id=?";
    $stmt = $conn->prepare($update);
    if (!$stmt) {
        die("Error preparing statement: " . $conn->error);
    }
    $stmt->bind_param("ssssi", $name, $email, $message, $gclid, $id);

    if (!$stmt->execute()) {
        die("Error executing query: " . $stmt->error);
    }

    $stmt->close();
    $conn->close();

    echo "<script>alert('Record updated successfully!'); window.location='view.php';</script>";
    exit;
}

$sql = "SELECT * FROM submissions WHERE id=?";
$stmt = $conn->prepare($sql);
if (!$stmt) {
    die("Error preparing statement: " . $conn->error);
}
$stmt->bind_param("i", $id);
$stmt->execute();
$result = $stmt->get_result();
$row = $result->fetch_assoc();

$stmt->close();
$conn->close();
?>

<h2>Edit Contact</h2>
<form method="POST">
    <label>Name:</label><br>
    <input type="text" name="name" value="<?= htmlspecialchars($row['name']) ?>" required><br><br>

    <label>Email:</label><br>
    <input type="email" name="email" value="<?= htmlspecialchars($row['email']) ?>" required><br><br>

    <label>Message:</label><br>
    <textarea name="message" required><?= htmlspecialchars($row['message']) ?></textarea><br><br>

    <label>GCLID:</label><br>
    <input type="text" name="gclid" value="<?= htmlspecialchars($row['gclid']) ?>"><br><br>

    <button type="submit">Update</button>
</form>
