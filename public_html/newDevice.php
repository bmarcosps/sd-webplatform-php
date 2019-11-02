<?php
$pageTitle = "Novo Dispositivo";
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
            <h1>Novo Dispositivo</h1>
            <form>
                <div class="form-group">
                    <label for="deviceName">Nome do dispositivo</label>
                    <input type="text" class="form-control" id="deviceName" placeholder="Nome">

                </div>
                <div class="form-group">
                    <label for="deviceMac">Endereço MAC Bluetooth</label>
                    <input type="text" class="form-control mac_address" id="deviceMac" placeholder="Endereço MAC">
                    <small id="macHelp" class="form-text text-muted">Verifique nas configurações do seu celular o
                        endereço MAC para Bluetooth.</small>
                </div>
                <button class="btn btn-primary">Salvar</button>
            </form>
        </div>
    </div>

    <?php include('includes/footer.php');?>
</body>

</html>