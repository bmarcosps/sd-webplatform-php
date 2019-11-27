<?php
include('includes/config.php');
$pageTitle = "Justificar presença";

$aluno = $_GET['aluno'];;
$disciplina =$_GET['disciplina'];;
$codigo=$_GET['turma'];
$data=$_GET['data'];;


?>

<!DOCTYPE html>

<head xmlns="http://www.w3.org/1999/html">
    <?php include('includes/header.php');?>
</head>

<body>
<?php include('includes/navbar.php');?>
<div id="container">
    <?php include('includes/sidebar.php');?>
    <div id="content-container">
        <h2>Justificar alteração de presença</h2>

        <form method="POST" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">
            <div class="form-group">
                <label for="nomeAluno">Nome do aluno</label>
                <input disabled type="text" name="nomeAluno" class="form-control" id="nomeAluno" placeholder="Nome" value=<?php echo $aluno;?>>
            </div>
            <div class="form-row">
            <div class="form-group col-md-3">
                <label for="disciplina">Disciplina</label>
                <input disabled type="text" name="disciplina" class="form-control" id="disciplina" placeholder="Disciplina" value=<?php echo $disciplina;?>>
            </div>
            <div class="form-group col-md-2">
                <label for="codigoDisciplina">Código</label>
                <input disabled type="text" name="codigoDisciplina" class="form-control" id="codigoDisciplina" placeholder="Código" value=<?php echo $codigo;?>>
            </div>
            <div class="form-group col-md-4">
                <label for="dataFalta">Data</label>
                <input disabled type="date" name="dataFalta" class="form-control" id="dataFalta" placeholder="Data" value=<?php  $data ;?>>
            </div>
            </div>
            <div class="form-group">
                <label for="justificativa">Justificativa</label>
                <textarea class="form-control" name="justificativa" id="justificativa" rows="3" placeholder="Justificativa" "></textarea>
            </div>
            <button type="submit" name="justificarPresenca" class="btn btn-primary">Salvar</button>
        </form>

    </div>
</div>

<?php include('includes/footer.php');?>
</body>

</html>