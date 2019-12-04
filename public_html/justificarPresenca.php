<?php
include('includes/config.php');
$pageTitle = "Justificar presença";


if(!empty($_POST['nomeAluno'])){

    $aluno = $_POST['nomeAluno'];
    $codigo=$_POST['codigoDisciplina']; 
    $data=date('Y-m-d H:i:s.u',$_POST['dataFalta']);
    $justificativa = $_POST['justificativa'];
    $presenca = $_POST['presenca'];

    $dataSoma = date('Y-m-d H:i:s.u',$_POST['dataFalta']+1);

    $sqlPresenca = "SELECT * FROM sd.presenca WHERE ((datahorainicio BETWEEN :data1 AND :data2) and codturma = :turma and aluno = :cpf)";
    $queryPresenca = $conn->prepare($sqlPresenca);
    $queryPresenca->bindParam(':cpf', $aluno, PDO::PARAM_INT);
    $queryPresenca->bindParam(':data1', $data, PDO::PARAM_STR);
    $queryPresenca->bindParam(':data2', $dataSoma, PDO::PARAM_STR);

    $queryPresenca->bindParam(':turma', $codigo, PDO::PARAM_INT);
    $queryPresenca->execute();
    $presencaResult = $queryPresenca->fetch(PDO::FETCH_ASSOC);

    $sql = "INSERT INTO sd.justificativa  (datahorainicio,codturma,aluno,justificativa) VALUES (:dataHoraInicio, :turma , :cpf, :justificativa)";
    $query = $conn->prepare($sql);
    $query->bindParam(':cpf', $aluno, PDO::PARAM_INT);
    $query->bindParam(':dataHoraInicio', $presencaResult['datahorainicio'], PDO::PARAM_STR);
    $query->bindParam(':turma', $codigo, PDO::PARAM_INT);
    $query->bindParam(':justificativa', $justificativa, PDO::PARAM_STR);
    $query->execute();

    $sql = "UPDATE sd.presenca set presenca = :presenca where (datahorainicio = :dataHoraInicio and codturma =:turma and aluno = :cpf)";
    $query1 = $conn->prepare($sql);
    $query1->bindParam(':cpf', $aluno, PDO::PARAM_INT);
    $query1->bindParam(':dataHoraInicio', $presencaResult['datahorainicio'], PDO::PARAM_STR);
    $query1->bindParam(':turma', $codigo, PDO::PARAM_INT);
    $query1->bindParam(':presenca', $presenca, PDO::PARAM_STR);
    $query1->execute();
    //header('Location: index.php');

}

if(isset($_GET['aluno'])) {
    $aluno = $_GET['aluno'];
    $disciplina =$_GET['disciplina'];
    $codigo=$_GET['turma'];
    $data=$_GET['data'];
    var_dump($data);
}

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

        <form action="justificarPresenca.php" method="post">
            <div class="form-group">
                <label for="nomeAluno">CPF do aluno</label>  	


                <input readonly type="text"   name="nomeAluno" class="form-control" id="nomeAluno" placeholder="Nome" value=<?php  echo (!empty($aluno) ?  $aluno : "");?>>
            </div>
            <div class="form-row">
            <div class="form-group col-md-3">
                <label for="disciplina">Disciplina</label>
                <input readonly type="text" name="disciplina" class="form-control" id="disciplina" placeholder="Disciplina" value=<?php echo (!empty($disciplina) ?  $disciplina : "");?>>
            </div>
            <div class="form-group col-md-2">
                <label for="codigoDisciplina">Código</label>
                <input readonly type="text" name="codigoDisciplina" class="form-control" id="codigoDisciplina" placeholder="Código" value=<?php echo (!empty($codigo) ?  $codigo : "");?>>
            </div>
            <div class="form-group col-md-4">
                <label for="dataFalt">Data</label>
                <?php $dt = new DateTime($data);
                            $dia = $dt->format('d-m-y');            
                ?>
                <input disabled type="text"  class="form-control" placeholder="Data" value=<?php  echo (!empty($dia) ?  $dia : ""); ?>>
                <input type="hidden" name="dataFalta" value = <?php echo strtotime($data); ?> >
            </div>
            <div class="form-group">
                <label for="presenca">Presença</label>
                <select class="form-control" name="presenca" >  
                    <option value ="1">Presente</option>
                    <option value ="0">Ausente</option>
                </select>
            </div>
            </div>
            
            <div class="form-group">
                <label for="justificativa">Justificativa</label>
                <textarea class="form-control" name="justificativa" id="justificativa" rows="3" placeholder="Justificativa" ></textarea>
            </div>
            <button type="submit" name="justificarPresenca" class="btn btn-primary">Salvar</button>
        </form>

    </div>
</div>

<?php include('includes/footer.php');?>
</body>

</html>