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
                    <label for="deviceMac">Endereço MAC WI-FI</label>
                    <input type="text" class="form-control mac_address" name="deviceMac" id="deviceMac" placeholder="Endereço MAC" value="<?php echo htmlspecialchars($mac);?>">
                    <span class="error text-danger"><?php echo $macErr;?></span>
                </div>
                <button type="submit" name="editarDispositivo" class="btn btn-primary">Salvar</button>
                <button type="button" class="btn btn-secondary" data-toggle="collapse" data-target="#macHelp">Ajuda</button>
            </form>
        </div>

        <div class="collapse mt-3" id="macHelp">
            <h4>Windows Mobile 5.x e 6.x</h4>
            <ol>
            <li>Antes de mais nada, ligue a conexão Wi-Fi do seu aparelho;</li>
            <li>Clique no botão Iniciar e escolha a opção Configurações;</li>
            <li>Clique na aba Conexões e clique sobre o ícone LAN sem fios;</li>
            <li>Clique na aba Avançado. O endereço MAC está listado aí.</li>
            </ol>

            <h4>iPhone e iPod Touch</h4>
            <ol>
            <li>Clique no ícone Configurações;</li>
            <li>Selecione a opção Geral;</li>
            <li>Clique sobre a opção Sobre;</li>
            <li>O endereço MAC está listado como Wi-Fi Address.</li>
            </ol>

            <h4>Android</h4>
            <ol>
            <li>Acesse o Menu e clique no ícone de Configurações;</li>
            <li>Clique sobre a opção Sobre o telefone;</li>
            <li>Agora clique sobre a opção Status;</li>
            <li>O endereço de MAC está listado como Endereço MAC da rede Wi-Fi.</li>
            </ol>

            <h4>Windows 95, 98 e MERede mais segura impossível!</h4>
            <ol>
            <li>Clique no botão Iniciar e clique em Executar;</li>
            <li>Digite winipcfg no campo que aparece;</li>
            <li>Clique no botão OK;</li>
            <li>Na janela que aparece, o endereço MAC está listado como “Endereço do adaptador”.</li>
            </ol>

            <h4>Windows NT, 2000, XP, Vista, 7, 8, 8.1 e 10</h4>
            <ol>
            <li>Clique no botão Iniciar e clique em Executar;</li>
            <li>Digite CMD na tela que aparece e pressione OK;</li>
            <li>Digite ipconfig –all (não se esqueça do traço) e pressione a tecla Enter;</li>
            <li>No texto que aparece, o endereço MAC está listado como “Endereço físico”.</li>
            </ol>
            

            <h4>MAC OS9 ou anterior</h4>
            <ol>
            <li>Acesse o Painel de controle;</li>
            <li>Selecione a opção TCP/IP;</li>
            <li>Na tela que aparece, clique em Arquivo e em Obter informações;</li>
            <li>Na janela exibida, o endereço MAC está listado como “Endereço de hardware”.</li>
            </ol>

            <h4>MAC OSX</h4>
            <ol>
            <li>Clique em Preferências do sistema;</li>
            <li>Na janela que aparece, clique em Rede;</li>
            <li>Na próxima janela, selecione a aba TCP/IP;</li>
            <li>O endereço MAC está listado como Endereço Ethernet.</li>
            </ol>

            <h4>Linux ou UNIX</h4>
            <ol>
            <li>Abra o Terminal;</li>
            <li>Na janela do Terminal, digite ifconfig e pressione a tecla Enter;</li>
            <li>Caso receba a mensagem command not found, digite /sbin/ifconfig ou /bin/ifconfig e pressione a tecla Enter;</li>
            <li>O endereço MAC está listado como HWaddr no campo designado por eth1 ou wlan0 (por padrão, embora possam ocorrer alterações no nome de acordo com a distribuição do Linux utilizada e as suas configurações).</li>
            </ol>
            </div>
    </div>
</div>
<?php include('includes/footer.php');?>
</body>

</html>