<?php
include('includes/config.php');

$pageTitle = "Seus Dispositivos";

if(!isset($_SESSION['user']))
{
    header('location:login.php');
}
$cpf = $_SESSION['user']['cpf'];
$sql = "SELECT * FROM sd.usuario WHERE cpf=:cpf";
$query = $conn->prepare($sql);
$query->bindParam(':cpf', $cpf, PDO::PARAM_STR);

if($query->execute()) {
    $userData = $query->fetch(PDO::FETCH_ASSOC);
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
            <h1>Seus dispositivos</h1>
            <p>Adicione ou remova seus dispositivos.</p>
            <div class="table-responsive-sm">
                <table class="table">
                    <thead class="thead-light">
                        <tr>
                            <th>Dispositivo</th>
                            <th>MAC</th>
                            <th colspan="2">Ações</th>
                        </tr>
                    </thead>

                    <tbody>
                        <tr>
                            <td>1</td>
                            <td><?php echo $userData['macbluetooth'] ?></td>
                            <td><button class="btn btn-primary">Editar</button></td>
                            <!-- <td><button class="btn btn-outline-danger" disabled>Remover</button></td> -->
                         </tr>
                     </tbody>
                 </table>
             </div>
             <!--
             <a href="newDevice.php"><button class="btn btn-primary">Novo dispositivo</button></a>
             -->

        </div>
    </div>

    <?php include('includes/footer.php');?>
</body>

</html>