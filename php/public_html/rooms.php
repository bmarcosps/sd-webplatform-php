<?php
include('includes/config.php');
$pageTitle = "Salas";
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
            <h1>Salas de aula</h1>
            <p>Aqui estão as salas relacionadas com suas disciplinas deste período.</p>
            <div class="table-responsive-sm">
                <table class="table">
                    <thead class="thead-light">
                        <tr>
                            <th>Sala</th>
                            <th>Disciplina</th>
                            <th>Situação</th>
                        </tr>
                    </thead>

                    <tbody>
                        <tr>
                            <td>3306</td>
                            <td>DCC123</td>
                            <td><span class="badge badge-danger">Ocupada</span></td>
                        </tr>
                        <tr>
                            <td>LAB123</td>
                            <td>DCC321</td>
                            <td><span class="badge badge-success">Livre</span></td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>

    <?php include('includes/footer.php');?>
</body>

</html>