<?php
//include('includes/config.php');
$pageTitle = "Início";
$param = '50%';
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

                        <table class="table">
                            <thead class="thead-light">
                                <tr>
                                    <th>Dispositivo</th>
                                    <th>Status</th>
                                    <th>Ação</th>
                                </tr>
                            </thead>

                            <tbody>
                                <tr>
                                    <td>Lâmpada 1</td>
                                    <td>Desligada</td>
                                    <td><input type="checkbox" checked data-toggle="toggle" data-onstyle="success"
                                            data-offstyle="danger"></td>
                                </tr>
                                <tr>
                                    <td>Projetor</td>
                                    <td>Ligado</td>
                                    <td><input type="checkbox" disabled checked data-toggle="toggle"
                                            data-onstyle="success" data-offstyle="danger"></td>
                                </tr>
                            </tbody>

                        </table>
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
