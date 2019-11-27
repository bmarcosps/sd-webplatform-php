<?php
include('includes/config.php');
$pageTitle = "Disciplina"
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

        <form class="mb-2" method="POST" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">
            <div class="row">
                <div class="col-md-4">
                    <input type="date" name="dataDisciplina" class="form-control" id="dataDisciplina" placeholder="Data" value="data">
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
                    <th>Matrícula</th>
                    <th>Nome</th>
                    <th>Presença</th>
                    <th>Alterar</th>
                </tr>
                </thead>

                <tbody>

                <tr>
                    <td>123412345AC</td>
                    <td>Aluno Teste </td>
                    <td><span class="badge badge-danger">Ausente</span></td>
                    <td><a href="justificarPresenca.php?disciplina=DCC123&turma=X&aluno=Fulano&data=12112019" class="btn btn-sm btn-info" >Alterar</a></td>
                </tr>
                <tr>
                    <td>123412345AC</td>
                    <td>Aluno Teste </td>
                    <td><span class="badge badge-success">Presente</span></td>
                    <td><button class="btn btn-sm btn-info" >Alterar</button></td>
                </tr>
                <tr>
                    <td>123412345AC</td>
                    <td>Aluno Teste </td>
                    <td><span class="badge badge-success">Presente</span></td>
                    <td><button class="btn btn-sm btn-info" >Alterar</button></td>
                </tr>
                </tbody>
            </table>
        </div>

    </div>
</div>

<?php include('includes/footer.php');?>
</body>

</html>