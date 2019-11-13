<?php
$pageTitle = "Novo Dispositivo";
include('includes/config.php');
if(isset($_GET['mac']))
{
    $sql = "DELETE FROM usuario WHERE macBluetooth = '" .$_GET['mac'] ."'";
    $query = $conn->prepare($sql);
    $query->execute(); 
}
if(isset($_POST['mac']))
{
    $mac=$_POST['mac'];
    $cp = $_SESSION['user']['cpf'];


    var_dump($_POST['mac']);
    $sql="INSERT INTO  usuario (cpf,macBluetooth) VALUES(:cp,:mac)";
    $query = $conn->prepare($sql);
    $query->bindValue(':cp',$cp);
    $query->bindValue(':mac',$mac);
    $query->execute(); 

    $lastInsertId = $conn->lastInsertId();
    if($lastInsertId)
    {
        header('location:userDevices.php');
    }
    else 
    {
        $_SESSION['error']="Something went wrong. Please try again";
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
                <h1>Novo Dispositivo</h1>
                <form  action="newDevice.php" method="post">
                    </div>
                    <div class="form-group">
                        <label for="deviceMac">Endereço MAC Bluetooth</label>
                        <input type="text" class="form-control mac_address" name="mac" id="deviceMac" placeholder="Endereço MAC">
                        <small id="macHelp" class="form-text text-muted">Verifique nas configurações do seu celular o
                            endereço MAC para Bluetooth.</small>
                    </div>
                    <button id="SubmitButton" type="submit" class="btn btn-primary">Salvar</button>
                </form>
            </div>
        </div>
    </div>

    <?php include('includes/footer.php');?>
</body>

</html>