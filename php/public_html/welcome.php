<?php
include('includes/config.php');
$pageTitle = "Bem-Vindo!";

if(!isset($_SESSION['userIntegra']))
{
    header('location:login.php');
}

if(isset($_POST['registrarDispositivo'])) {
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
    if($_SESSION['userIntegra']['tipo'] == 1){
        header('location:index.php');
    } else {
        header('location:indexProfessor.php');
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

        <form method="POST">
            <div class="form-group">
                <label for="deviceName">Nome do dispositivo</label>
                <input type="text" name="deviceName" class="form-control" id="deviceName" placeholder="Nome">
            </div>
            <div class="form-group">
                <label for="deviceMac">Endereço MAC Bluetooth</label>
                <input type="text" class="form-control mac_address" name="deviceMac" id="deviceMac" placeholder="Endereço MAC">
                <small id="macHelp" class="form-text text-muted">Verifique nas configurações do seu celular o
                    endereço MAC para Bluetooth.</small>
            </div>
            <button type="submit" name="registrarDispositivo" class="btn btn-primary">Salvar</button>
        </form>
    </div>
</div>

<?php include('includes/footer.php');?>
</body>

</html>