<?php
include('includes/config.php');
$pageTitle = "Bem-Vindo!";
$macErr = "";
$nameErr= "";
$mac = "";

if(!isset($_SESSION['userIntegra']))
{
    header('location:login.php');
}

if(isset($_POST['registrarDispositivo'])) {
    try {
        if (empty($_POST['deviceMac'])) {
            $macErr = "Preencha o campo Endereço MAC";
        } else if (empty($_POST['deviceName'])){
            $macErr = "Preencha o campo Nome";
        } else {
            if (!preg_match("/([0-9a-fA-F][0-9a-fA-F]:){5}([0-9a-fA-F][0-9a-fA-F])/", $_POST['deviceMac'])) {
                $macErr = "Endereço MAC inválido!";
            } else {
                $nome = $_POST['deviceName'];
                $mac = preg_replace("/[:]/", '', $_POST['deviceMac']);

                $sql = "INSERT INTO sd.usuario (cpf, macBluetooth, nomedispositivo) VALUES (:cpf, :macBluetooth, :nomeDispositivo)";
                $query = $conn->prepare($sql);
                $query->bindParam(':cpf', $_SESSION['userIntegra']['cpf'], PDO::PARAM_STR);
                $query->bindParam(':macBluetooth', $mac, PDO::PARAM_STR);
                $query->bindParam(':nomeDispositivo', $nome, PDO::PARAM_STR);

                $query->execute();

                $sql2 = "SELECT * FROM sd.usuario WHERE cpf=:cpf";
                $query2 = $conn->prepare($sql2);
                $query2->bindParam(':cpf', $_SESSION['userIntegra']['cpf'], PDO::PARAM_STR);
                $query2->execute();
                $_SESSION['user'] = $query2->fetch(PDO::FETCH_ASSOC);

                if ($_SESSION['userIntegra']['professor'] == false) {
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
        <h2>Bem vindo, <?php echo $_SESSION['userIntegra']['nome'];?>!</h2>
        <p>Como esta é a primeira vez que você se conecta, precisamos que você registre seu dispositivo no sistema.</p>

        <form method="POST" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">
            <div class="form-group">
                <label for="deviceName">Nome do dispositivo</label>
                <input type="text" name="deviceName" class="form-control" id="deviceName" placeholder="Nome">
                <span class="error text-danger"><?php echo $nameErr;?></span>

            </div>
            <div class="form-group">
                <label for="deviceMac">Endereço MAC Bluetooth</label>
                <input type="text" class="form-control mac_address" name="deviceMac" id="deviceMac" placeholder="Endereço MAC" value="<?php echo htmlspecialchars($mac);?>">
                <span class="error text-danger"><?php echo $macErr;?></span>
            </div>
            <button type="submit" name="registrarDispositivo" class="btn btn-primary">Salvar</button>
            <button type="button" class="btn btn-secondary" data-toggle="collapse" data-target="#macHelp">Ajuda</button>
        </form>
    

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