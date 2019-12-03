<?php
include('includes/config.php');
$pageTitle = "Início";
$param = '50%';

if(!isset($_SESSION['user']) || $_SESSION['userIntegra']['professor'] != true)
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
        <h2>Suas turmas:</h2>
        <div class="table-responsive-sm">
                <table class="table">
                    <thead class="thead-light">
                        <tr>
                            <th>Disciplina</th>
                            <th>Turma</th>
                            <th>Alunos</th>
                            <th>Ações</th>
                        </tr>
                    </thead>

                    <tbody>

                        <tr>
                            <td>DCC064</td>
                            <td>A</td>
                            <td>32</td>
                            <td><a href="subject.php?disciplina=DCC064&turma=A" class="btn btn-primary">Ver presença</a></td>
                        </tr>

                        <tr>
                            <td>DCC119</td>
                            <td>X</td>
                            <td>40</td>
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
