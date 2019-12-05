<?php
include('includes/config.php');
$pageTitle = "Disciplina";
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

if(!empty($_POST["dataDisciplina"]))
{
    $dia=$_POST["dataDisciplina"];
    $sql = "SELECT * FROM sd.presenca where codTurma='12345' and datahorainicio BETWEEN '".$dia." 00:00:00' AND '".$dia." 23:59:59'";
}
else
{
    $dia = "";
    $sql = "SELECT * FROM sd.presenca where codTurma='12345'";
}

$query1 = $conn->prepare($sql);
$query1->execute(); 
while($row=$query1->fetch(PDO::FETCH_OBJ)){
    $presencaData[] = $row;
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
        <h2><?php echo $pageTitle;?></h2>

        <form class="mb-2" method="POST" action="subject.php">
            <div class="row">
                <div class="col-md-4">
                    <input type="date" name="dataDisciplina" class="form-control" id="dataDisciplina" placeholder="Data" value= <?php echo $dia ?> >
                </div>
                <div class="col-3">
                    <button type="submit" name="alterarData" class="btn btn-primary">Selecionar</button>
                </div>
            </div>
        </form>

        <div class="table-responsive-sm">
            <table class="table">
                <thead class="thead-light">
                <tr>
                    <th>CPF</th>
                    <th>Presença</th>
                    <th>Data</th>
                    <th>Alterar</th>

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
                    <td><a href="justificarPresenca.php?disciplina=DCC-064&turma=12345&aluno=<?php echo $alun->aluno?>&data=<?php echo $alun->datahorainicio?>" class="btn btn-sm btn-info" >Alterar</a></td>
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