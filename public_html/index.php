<?php
include('includes/config.php');
$param = '10%';
?>

<!DOCTYPE html>

<head>
    <?php include('includes/header.php');?>
</head>

<body>
    <?php include('includes/navbar.php');?>
    <div id="container">
        <?php include('includes/sidebar.php');?>
        <div id="content-container">
            <h1>Você está online!</h1>
            <p>Sala: 1234</p>
            <p>Disciplina: DCC123</p>
            <div class="attendance">
                <h3></h3>
                <div class="progress">
                    <div class="progress-bar progress-bar-striped progress-bar-animated" role="progressbar"
                        style="width: <?php echo $param;?>">
                        <?php echo $param;?>
                    </div>
                </div>
            </div>

            <table class="table">
                <thead>
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
                        <td><button class="btn btn-info">Toggle</button></td>
                    </tr>
                    <tr>
                        <td>Projetor</td>
                        <td>Ligado</td>
                        <td><button class="btn btn-info" disabled>Toggle</button></td>
                    </tr>
                </tbody>

            </table>
        </div>

    </div>

    <?php include('includes/footer.php');?>
</body>

</html>