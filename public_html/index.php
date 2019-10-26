<?php
$host = 'mysql';
$user = 'root';
$pass = 'rootpassword';
$conn = new mysqli($host, $user, $pass);
?>

<!DOCTYPE html>
<head>
    <?php include('includes/header.php');?>
</head>

<body>
<?php include('includes/navbar.php');?>

<p>Hello!</p>

<?php include('includes/footer.php');?>
</body>
</html>
