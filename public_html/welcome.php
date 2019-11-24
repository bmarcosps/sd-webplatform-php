<?php
include('includes/config.php');
$pageTitle = "Bem-Vindo!";
$macErr = "";
$mac = "";
if(!isset($_SESSION['userIntegra']))
{
    header('location:login.php');
}

if(isset($_POST['registrarDispositivo'])) {
    try {
        if (empty($_POST['deviceMac'])) {
            $macErr = "Preencha o campo Endereço MAC";
        } else {
            if (!preg_match("/([0-9a-fA-F][0-9a-fA-F]:){5}([0-9a-fA-F][0-9a-fA-F])/", $_POST['deviceMac'])) {
                $macErr = "Endereço MAC inválido!";
            } else {
                $mac = preg_replace("/[:]/", '', $_POST['deviceMac']);

                $sql = "INSERT INTO sd.usuario (cpf, macBluetooth) VALUES (:cpf, :macBluetooth)";
                $query = $conn->prepare($sql);
                $query->bindParam(':cpf', $_SESSION['userIntegra']['cpf'], PDO::PARAM_STR);
                $query->bindParam(':macBluetooth', $mac, PDO::PARAM_STR);
                $query->execute();

                $sql2 = "SELECT * FROM sd.usuario WHERE cpf=:cpf";
                $query2 = $conn->prepare($sql2);
                $query2->bindParam(':cpf', $_SESSION['userIntegra']['cpf'], PDO::PARAM_STR);
                $query2->execute();
                $_SESSION['user'] = $query2->fetch(PDO::FETCH_ASSOC);
                if ($_SESSION['userIntegra']['tipo'] == 1) {
                    header('location:index.php');
                } else {
                    header('location:indexProfessor.php');
                }
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
<div id="container">
    <div id="content-container">
        <h2>Bem vindo!</h2>
        <p>Como esta é a primeira vez que você se conecta, precisamos que você registre seu dispositivo no sistema.</p>

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
            <button type="submit" name="registrarDispositivo" class="btn btn-primary">Salvar</button>
        </form>
    </div>
</div>

<?php include('includes/footer.php');?>
</body>

</html>