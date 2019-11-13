<?php
include('includes/config.php');

$pageTitle = "Seus Dispositivos";

if(!isset($_SESSION['user']))
{
    header('location:login.php');
}

$sql = "SELECT * FROM usuario WHERE cpf = '" . $_SESSION['user']['cpf'] . "'";
$query= $conn -> prepare($sql);
$query-> execute();
while($row=$query->fetch(PDO::FETCH_OBJ)){
    $list[] = $row;
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
            <?php if (!empty($list)) {?>
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
                    <?php foreach($list as $var) { ?>
                        <tr>
                            <td>1</td>
                            <td><?php echo $var->macBluetooth; ?></td>
                            <?php
                                echo ('<a href="newDevice.php?mac='.$var->macBluetooth.'"><button class="btn btn-secondary btn-sm" ><i class="fa fa-pencil "></i> Editar</button>');   
                            ?>
                            <!-- <td><button class="btn btn-outline-danger" disabled>Remover</button></td> -->
                         </tr>
                    <?php } ?>
                     </tbody>
                 </table>
             </div>
             <?php } else { echo '<p> Nenhum Endereço MAC vinculado! </p>'; echo ('<a href="newDevice.php"><button class="btn btn-primary btn-sm" ><i class="fa fa-pencil "></i> Vincular Dispositivo</button>');}?>
             <!--
             <a href="newDevice.php"><button class="btn btn-primary">Novo dispositivo</button></a>
             -->

        </div>
    </div>

    <?php include('includes/footer.php');?>
</body>

</html>