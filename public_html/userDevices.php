<?php

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
            <h1>Seus dispositivos</h1>
            <p>Adicione ou remova seus dispositivos.</p>
            <table class="table">
                <thead>
                    <tr>
                        <th>Dispositivo</th>
                        <th>MAC</th>
                        <th>Status</th>
                        <th>Ação</th>
                    </tr>
                </thead>

                <tbody>
                    <tr>
                        <td>iPhone</td>
                        <td>AB:CD:EF:GH</td>
                        <td>Conectado</td>
                        <td><button class="btn btn-danger" disabled>Remover</button></td>
                    </tr>
                    <tr>
                        <td>Computador</td>
                        <td>AB:CD:EF:GH</td>
                        <td>Desconectado</td>
                        <td><button class="btn btn-danger">Remover</button></td>
                    </tr>
                </tbody>
            </table>
            <button class="btn btn-primary">Novo dispositivo</button>

        </div>
    </div>

    <?php include('includes/footer.php');?>
</body>

</html>