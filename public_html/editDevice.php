<?php
include('includes/config.php');
$pageTitle = "Editar Dispositivo";
if(!isset($_SESSION['user']))
{
    header('location:login.php');
}

$macErr = "";
$mac = "";

if(isset($_POST['editarDispositivo'])) {
    try {
        if (empty($_POST['deviceMac'])) {
            $macErr = "Preencha o campo Endereço MAC";
        } else {
            if (!preg_match("/([0-9a-fA-F][0-9a-fA-F]:){5}([0-9a-fA-F][0-9a-fA-F])/", $_POST['deviceMac'])) {
                $macErr = "Endereço MAC inválido!";
            } else {
                $mac = preg_replace("/[:]/", '', $_POST['deviceMac']);

                $sql = "UPDATE sd.usuario SET macbluetooth = :mac WHERE (cpf = :cpf)";
                $query = $conn->prepare($sql);
                $query->bindParam(':cpf', $_SESSION['user']['cpf'], PDO::PARAM_STR);
                $query->bindParam(':mac', $mac, PDO::PARAM_STR);
                $query->execute();

                $_SESSION['user']['macbluetooth'] = $mac;
                header('location:userDevices.php');
            }
        }
    } catch(Exception $e) {
        $errorMessage = setErrorMessage($e->getMessage());
    }
}
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
        <div class="device-form">
            <h1>Editar Dispositivo</h1>
            <form method="POST" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">
                <div class="form-group">
                    <label for="deviceName">Nome do dispositivo</label>
                    <input type="text" name="deviceName" class="form-control" id="deviceName" placeholder="Nome">
                </div>
                <div class="form-group">
                    <label for="deviceMac">Endereço MAC Bluetooth</label>
                    <input type="text" class="form-control mac_address" name="deviceMac" id="deviceMac" placeholder="Endereço MAC" value="<?php echo htmlspecialchars($mac);?>">
                    <small id="macHelp" class="form-text text-muted">Verifique nas configurações do seu celular o
                        endereço MAC para Bluetooth.</small>
                    <span class="error text-danger"><?php echo $macErr;?></span>
                </div>
                <button type="submit" name="editarDispositivo" class="btn btn-primary">Salvar</button>
            </form>
        </div>
    </div>
</div>

<?php include('includes/footer.php');?>
</body>

</html>