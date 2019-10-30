<?php
$pageTitle = "Seus Dispositivos";
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
            <div class="table-responsive-sm">
                <table class="table">
                    <thead class="thead-light">
                        <tr>
                            <th>Dispositivo</th>
                            <th>MAC</th>
                            <th>Status</th>
                            <th colspan="2">Ações</th>
                        </tr>
                    </thead>

                    <tbody>
                        <tr>
                            <td>iPhone</td>
                            <td>AB:CD:EF:GH</td>
                            <td>Conectado</td>
                            <td><button class="btn btn-primary">Editar</button></td>
                            <td><button class="btn btn-outline-danger" disabled>Remover</button></td>
                        </tr>
                        <tr>
                            <td>Computador</td>
                            <td>AB:CD:EF:GH</td>
                            <td>Desconectado</td>
                            <td><button class="btn btn-primary">Editar</button></td>
                            <td><button class="btn btn-outline-danger">Remover</button></td>
                        </tr>
                    </tbody>
                </table>
            </div>
            <button class="btn btn-primary">Novo dispositivo</button>

        </div>
    </div>

    <?php include('includes/footer.php');?>
</body>

</html>