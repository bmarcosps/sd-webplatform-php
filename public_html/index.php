<?php
try{
    include('includes/config.php'); 
} catch(PDOException $e) {
    exit("Error: " . $e->getMessage());
}
$pageTitle = "Início";
$param = '50%';

if(!isset($_SESSION['user'])  || !isset($_SESSION['userIntegra'])|| $_SESSION['userIntegra']['professor'] != false)
{
    session_destroy();
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
        <h2>Suas Disciplinas:</h2>
        <div class="table-responsive-sm">
                <table class="table">
                    <thead class="thead-light">
                        <tr>
                            <th>Disciplina</th>
                            <th>Turma</th>
                            <th>Ações</th>
                        </tr>
                    </thead>

                    <tbody>

                        <tr>
                            <td>DCC064</td>
                            <td>A</td>
                            <td><a href="subject.php?disciplina=DCC064&turma=A" class="btn btn-primary">Ver presença</a></td>
                        </tr>

                        <tr>
                            <td>DCC119</td>
                            <td>X</td>
                            <td><button class="btn btn-primary">Ver presença</button></td>
                        </tr>
                     </tbody>
                 </table>
             </div>
            <span id="clock">&nbsp;</span>
        </div>

        <?php include('includes/footer.php');?>
</body>

</html>
