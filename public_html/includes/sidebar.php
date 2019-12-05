<?php
if($_SESSION['userIntegra']['professor'] == false){
    $indexPage = "index.php";
    $dashboard ='http://10.5.16.109:8050/aluno';
}else{
    $indexPage = "indexProfessor.php";
    $dashboard ='http://10.5.16.109:8050/professor';
}
?>

<div class="bg-light border-right" id="sidebar-wrapper">
    <div class="sidebar-heading">Sala Inteligente</div>
    <ul class="list-group list-group-flush">
        <li><a class="list-group-item list-group-item-action bg-light" href=<?php echo $indexPage ?>>
                <i class="material-icons">home</i>Início</a></li>
        <li><a class="list-group-item list-group-item-action bg-light" href=<?php echo $dashboard ?>>
                <i class="material-icons">dashboard</i>Dashboard</a></li>
        <!--<li><a class="list-group-item list-group-item-action bg-light" href="rooms.php">
                <i class="material-icons">meeting_room</i>Salas</a></li>-->
        <li><a class="list-group-item list-group-item-action bg-light" href="userDevices.php">
                <i class="material-icons">phonelink</i>Seus dispositivos</a></li>
        <li><a class="list-group-item list-group-item-action bg-light text-danger" href="index.php?logout='1'">
                <i class="material-icons">exit_to_app</i>Sair</a></li>
    </ul>
</div>