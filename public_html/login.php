<?php

?>

<!DOCTYPE html>

<head>
    <?php include('includes/header.php');?>
</head>

<body>
    <div class="login-container row">

        <div class="login-info col-5">
            <h1>Bem vindo!</h1>
            <p>Este site foi desenvolvido para a disciplina de Sistemas Distribuídos 2019/3 como parte de um trabalho
                que visa automatizar elementos da sala de aula.</p>
            <p>Faça login com seu CPF e a senha do SIGA.</p>
        </div>
        <div class="login-form col">
            <form>
                <h2>Login</h2>
                <div class="form-group">
                    <label for="inputCpf">CPF</label>
                    <input type="text" class="form-control cpf" id="inputCpf" aria-describedby="cpfHelp"
                        placeholder="Digite seu CPF">
                </div>
                <div class=" form-group">
                    <label for="inputPassword">Senha</label>
                    <input type="password" class="form-control" id="inputPassword" placeholder="Senha">
                </div>
                <button type="submit" class="btn btn-primary">Entrar</button>
            </form>
        </div>
        <img src="assets\img\logo-ufjf-1.png" alt="Logo UFJF" id="logo-ufjf-login">
    </div>

    <?php include('includes/footer.php');?>
</body>

</html>