<?php
include('includes/config.php');
$pageTitle = "Disciplina";
$disciplina = $_GET['disciplina'];
/*
if(!isset($_SESSION['user']) || $_SESSION['userIntegra']['professor'] != true)
{
    header('location:login.php');
}

if(!isset($_GET['disciplina']) || !isset($_GET['turma'])) {
    header('location:indexProfessor.php');
} else {
    $disciplina = $_GET['disciplina'];
    $turma = $_GET['turma'];
    $pageTitle = $disciplina . " " . $turma;
}
*/



$sql = "SELECT * FROM sd.presenca where codTurma='12345' and aluno = :cpf";

$query1 = $conn->prepare($sql);
$query1->bindParam(':cpf', $_SESSION['userIntegra']['cpf'], PDO::PARAM_STR);
$query1->execute(); 
while($row=$query1->fetch(PDO::FETCH_OBJ)){
    $presencaData[] = $row;
}

$sql2 = "SELECT * FROM sd.presenca where (codTurma='12345' and aluno = :cpf AND presenca=1)";
$query = $conn->prepare($sql2);
$query->bindParam(':cpf', $_SESSION['userIntegra']['cpf'], PDO::PARAM_STR);
$query->execute(); 

$presenca= $query->rowCount();
$presencaTotal = $query1->rowCount();
if($presencaTotal == 0) {
    $div = 0;
} else {
    $div = (floatval($presenca)/floatval($presencaTotal)) * 100;
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
        <h2><?php echo $disciplina;?></h2>
        <p><?php echo "Presença: " . $presenca . "/" . $presencaTotal;?></p>
        <div class="progress" style="height: 20px;">
            <div class="progress-bar" role="progressbar" style="width: <?php echo number_format($div,2,'.','') . "%";?>;"><?php echo $presenca . "/" . $presencaTotal;?></div>
        </div>
        <div class="table-responsive-sm">
            <table class="table">
                <thead class="thead-light">
                <tr>
                    <th>CPF</th>
                    <th>Presença</th>
                    <th>Data</th>

                </tr>
                </thead>

                <tbody>
                <?php 
                if(!empty($presencaData)) {
                    foreach($presencaData as $alun) { ?>
                <tr>
                    <td><?php echo $alun->aluno ?></td>
                    <?php if($alun->presenca) { ?>
                        <td><span class="badge badge-success">Presente</span></td>
                    <?php } else { ?>
                        <td><span class="badge badge-danger">Ausente</span></td>
                    <?php }   ?>              
                    
                    <?php $dt = new DateTime($alun->datahorainicio);
                            $dia = $dt->format('d-m-y');                   
                    ?>
                       <td ><?php echo $dia ?></td>
                </tr>
                <?php }} else { ?>

                <?php } ?>
                </tbody>
            </table>
        </div>

    </div>
</div>

<?php include('includes/footer.php');?>
</body>

</html>