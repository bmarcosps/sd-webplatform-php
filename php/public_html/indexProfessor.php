<?php
include('includes/config.php');
$pageTitle = "Início";
$param = '50%';

if(!isset($_SESSION['user']) || $_SESSION['userIntegra']['tipo'] != 2)
{
    header('location:login.php');
}

if (isset($_GET['logout'])) {
    session_destroy();
    unset($_SESSION['user']);
    unset($_SESSION['userIntegra']);
    header("location: login.php");
}

?>

<!DOCTYPE html>

<head>
    <?php include('includes/header.php');?>
</head>

<body onload="updateClock(); setInterval('updateClock()', 1000 )">
<?php include('includes/navbar.php');?>
<div id="container">
    <?php include('includes/sidebar.php');?>
    <div id="content-container">
        <h1>Olá Professor!</h1>

        <span id="clock">&nbsp;</span>
    </div>

    <?php include('includes/footer.php');?>
</body>

</html>
