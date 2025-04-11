<?php
$servername = "sql113.ezyro.com";
$username = "ezyro_38690926";
$password = "41f5de75fd";
$dbname = "ezyro_38690926_astonmarinhermes";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Set parameters and execute
$name = $_POST['name'];
$email = $_POST['email'];
$message = $_POST['message'];
$gclid = $_POST['gclid'];
$stmt = $conn->prepare("INSERT INTO submissions (name, email, message, gclid) VALUES (?, ?, ?, ?)");
$stmt->bind_param("ssss", $name, $email, $message, $gclid);


$stmt->execute();

echo "New record created successfully. You will be redirected shortly.";

// Close the statement and connection
$stmt->close();
$conn->close();

// Redirect after 2 seconds using JavaScript
echo '<script>
        setTimeout(function() {
            window.location.href = "view.php";
        }, 2000);
      </script>';
?>