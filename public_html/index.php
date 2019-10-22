<?php
$host = 'mysql';
$user = 'root';
$pass = 'rootpassword';
$conn = new mysqli($host, $user, $pass);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
} else {
    echo "Connected to MySQL successfully!";
}

?>

<!DOCTYPE html>
<head>
    <?php include('includes/header.php');?>
</head>

<body>
<p>Hello!</p>

<?php include('includes/footer.php');?>
</body>
</html>
