<?php
try{
    include('includes/config.php'); 
} catch(PDOException $e) {
    exit("Error: " . $e->getMessage());
}
$pageTitle = "Início";
$param = '50%';

if(!isset($_SESSION['user']) || $_SESSION['userIntegra']['professor'] != false)
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
            <div class="main-header">
                <div class="row">
                    <div class="col">
                        <div class="attendance">
                            <p>
                                <span class="badge badge-success">Online</span> Presença </p>
                            <div class="progress">
                                <div class="progress-bar progress-bar-striped progress-bar-animated" role="progressbar"
                                    style="width: <?php echo $param;?>">
                                    <?php echo $param;?>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col">
                    <div class="card bg-light mb-3" style="max-width: 18rem;">
                        <div class="card-header"><i class="material-icons">info</i></div>
                        <div class="card-body">

                            <h5 class="card-title">Sala</h5>
                            <p class="card-text">1234</p>
                        </div>
                    </div>
                </div>
                <div class="col">
                    <div class="card bg-light mb-3" style="max-width: 18rem;">
                        <div class="card-header"><i class="material-icons">info</i></div>
                        <div class="card-body">

                            <h5 class="card-title">Disciplina</h5>
                            <p class="card-text">DCC1234</p>


                        </div>
                    </div>
                </div>
            </div>
            <span id="clock">&nbsp;</span>
        </div>

        <?php include('includes/footer.php');?>
</body>

</html>
