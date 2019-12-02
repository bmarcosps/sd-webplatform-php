<?php
$nomeAluno = strtok($_SESSION['userIntegra']['nome'],' ');
?>

<nav class="navbar navbar-light bg-light border-bottom fixed-top">
    <button class="navbar-toggler" type="button" id="menu-toggle"><span class="navbar-toggler-icon"></span></button>
        <span class="navbar-text">
          Olá, <?php echo $nomeAluno;?>!
        </span>
</nav>