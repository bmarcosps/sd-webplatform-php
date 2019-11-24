<?php
include('includes/config.php');

if(!isset($_SESSION['user']) || $_SESSION['userIntegra']['tipo'] != 2)
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

        <div class="table-responsive-sm">
            <table class="table">
                <thead class="thead-light">
                <tr>
                    <th>Matrícula</th>
                    <th>Nome</th>
                    <th>Presenças</th>
                </tr>
                </thead>

                <tbody>

                <tr>
                    <td>123412345AC</td>
                    <td>Aluno Teste </td>
                    <td>30/40</td>
                    <!-- <td><button class="btn btn-outline-danger" disabled>Remover</button></td> -->
                </tr>
                <tr>
                    <td>123412345AC</td>
                    <td>Aluno Teste </td>
                    <td>30/40</td>
                    <!-- <td><button class="btn btn-outline-danger" disabled>Remover</button></td> -->
                </tr>
                <tr>
                    <td>123412345AC</td>
                    <td>Aluno Teste </td>
                    <td>30/40</td>
                    <!-- <td><button class="btn btn-outline-danger" disabled>Remover</button></td> -->
                </tr>
                </tbody>
            </table>
        </div>

    </div>
</div>

<?php include('includes/footer.php');?>
</body>

</html>