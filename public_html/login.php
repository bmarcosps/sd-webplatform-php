<?php
include('includes/config.php');
$pageTitle = "Plataforma Salas Inteligentes";

if(isset($_POST['login'])) {
    try {
        $cpf = preg_replace("/[-\.]/",'', $_POST['cpf']);
        $password = $_POST['password'];

        $data = array(
            'usuario' => $cpf,
            'senha' => $password
        );
        $dataJson = json_encode($data);
        //echo $dataJson;
        $ch = curl_init("10.5.16.109:63229/api/Token");

        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLINFO_HEADER_OUT, true);
        curl_setopt($ch, CURLOPT_HTTPHEADER, array('Content-Type: application/json'));
        curl_setopt($ch, CURLOPT_POST, true);
        curl_setopt($ch, CURLOPT_POSTFIELDS, $dataJson);

        $server_output = curl_exec($ch);
        //echo $server_output;
        curl_close ($ch);
        //echo json_decode($server_output, true);




        /*Simulando usuario do integra
        $sql = "SELECT * FROM sd.usuariointegra WHERE cpf=:cpf AND password=:password";
        $query = $conn->prepare($sql);
        $query->bindParam(':cpf', $cpf, PDO::PARAM_STR);
        $query->bindParam(':password', $password, PDO::PARAM_STR);
        $query->execute();

        if ($query->rowCount() > 0) {
            $_SESSION['userIntegra'] = $query->fetch(PDO::FETCH_ASSOC);
        */
        if($server_output) {
            $_SESSION['userIntegra'] = json_decode($server_output, true);

            /*Conferindo se o usuario já logou/foi cadastrado no """nosso""" banco*/
            $sql2 = "SELECT * FROM sd.usuario WHERE cpf=:cpf";
            $query2 = $conn->prepare($sql2);
            $query2->bindParam(':cpf', $cpf, PDO::PARAM_STR);
            $query2->execute();
            if($query2->rowCount() == 0) {
                header('location:welcome.php');
            } else {
                $_SESSION['user'] = $query2->fetch(PDO::FETCH_ASSOC);
                if($_SESSION['userIntegra']['professor'] == false){
                    header('location:index.php');
                } else {
                    header('location:indexProfessor.php');
                }
            }

        } else {
            echo"<script type='text/javascript'>
            window.alert('Login e/ou senha incorretos.');
            window.location.href='login.php';</script>";
            die();
        }
    } catch(Exception $e) {
        $errorMessage = setErrorMessage($e->getMessage());
    }
}

if(isset($_SESSION['user']))
{
    if($_SESSION['userIntegra']['professor'] == false){
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
    <div class="login-container">

        <div class="login-info">
            <h1>Bem vindo!</h1>
            <p>Este site foi desenvolvido para a disciplina de Sistemas Distribuídos 2019/3 como parte de um trabalho
                que visa automatizar elementos da sala de aula.</p>
            <p>Faça login com seu CPF e a senha do SIGA.</p>
        </div>

        <div class="login-form">
            <form method="POST">
                <h2>Login</h2>
                <div class="form-group">
                    <label for="inputCpf">CPF</label>
                    <input type="text" class="form-control cpf" name="cpf" id="inputCpf" aria-describedby="cpfHelp"
                        placeholder="Digite seu CPF">
                </div>
                <div class=" form-group">
                    <label for="inputPassword">Senha</label>
                    <input type="password" class="form-control" name="password" id="inputPassword" placeholder="Senha">
                </div>
                <div id="login-error"></div>
                <button type="submit" name="login" class="w-100 btn btn-primary">Entrar</button>
            </form>
        </div>
        <img src="assets\img\logo-ufjf-1.png" alt="Logo UFJF" id="logo-ufjf-login">

    </div>

    <?php include('includes/footer.php');?>
</body>

</html>