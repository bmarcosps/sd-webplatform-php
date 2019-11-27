<?php
include('includes/config.php');
$pageTitle = "Salas";

if(!isset($_SESSION['userIntegra']))
{
    header('location:login.php');
} else {
   /* $data = array(
        'access_token' => $_SESSION['userIntegra']['access_token'],
        'refresh_token' => $_SESSION['userIntegra']['refresh_token']
    );
    $dataJson = json_encode($data);
    //echo $dataJson;
    $ch = curl_init("10.5.16.109:63229/api/Token");

    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
    curl_setopt($ch, CURLINFO_HEADER_OUT, true);
    curl_setopt($ch, CURLOPT_HTTPHEADER, array('Content-Type: application/json'));
    curl_setopt($ch, CURLOPT_POST, true);
    curl_setopt($ch, CURLOPT_POSTFIELDS, $dataJson);

    $server_output = curl_exec($ch);
    //var_dump($server_output);
    curl_close ($ch);

    if($server_output) {
        $userDisciplinas = json_decode($server_output, true);

        foreach($userDisciplinas as $item) { //foreach element in $arr
            $names[] = $item['nome']; 
            $codigos[] = $item['codigo']; 
            $salas[] = $item['sala']; 
            $codigosTurma[] = $item['codigosTurma']; 
            $ano[] = $item['ano']; 
            $semestre[] = $item['semestre']; 
            $turma[] = $item['turma']; 
            $horarios[] = $item['horarios'];  //Cada item é um JSON
        }

        

    } else {
        echo"<script type='text/javascript'>
        window.alert('Login e/ou senha incorretos.');
        window.location.href='login.php';</script>";
        die();
    } */

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
            <h1>Salas de aula</h1>
            <p>Aqui estão as salas relacionadas com suas disciplinas deste período</p>
            <p>Clique sobre a disciplina para visualizar a(s) sala(s) relacionada(s)</p>
            <div id="accordion">
           

                <div class="card text-white bg-secondary">
                    <div class="card-header" id="headingOne">
                        <h5 class="mb-0">
                            <a class="btn btn-link" data-toggle="collapse" data-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
                                <div class="row">
                                    <div class="col"><i class="material-icons">subdirectory_arrow_right</i></div>
                                    <div class="col">DCC123</div>
                                    <div class="col">X</div>
                                </div>
                            </a>
                            <div class="d-inline float-right"><a href="subject.php?disciplina=DCC064&turma=A" class="btn btn-primary">Ver presença</a></div>
                        </h5>
                    </div>

                    <div id="collapseOne" class="collapse show table-responsive-sm" aria-labelledby="headingOne" data-parent="#accordion">

                            <table class="table w-100  m-0">
                                <thead class="thead-light">
                                <tr>
                                    <th>Instituto</th>
                                    <th>Número</th>
                                    <th>Situação</th>
                                    <th>Ação</th>
                                </tr>
                                </thead>
                                <tbody class="table-light">
                                <tr>
                                    <td>DCC</td>
                                    <td>123</td>
                                    <td><span class="badge badge-danger">Ocupada</span></td>
                                    <td><a href="#" class="btn btn-sm btn-info">Dashboard</a></td>
                                </tr>
                                </tbody>
                            </table>
                    </div>
                </div>
            
                <div class="card text-white bg-secondary" style="padding: 0;">
                    <div class="card-header" id="headingOne2">
                        <h5 class="mb-0">
                            <a class="btn btn-link" data-toggle="collapse" data-target="#collapseOne2" aria-expanded="true" aria-controls="collapseOne">
                                <div class="row">
                                    <div class="col"><i class="material-icons">subdirectory_arrow_right</i></div>
                                    <div class="col">DCC064</div>
                                    <div class="col">A</div>
                                </div>
                            </a>
                            <div class="d-inline float-right"><a href="subject.php?disciplina=DCC064&turma=A" class="btn btn-primary">Ver presença</a></div>
                        </h5>
                    </div>

                    <div id="collapseOne2" class="collapse show table-responsive-sm" aria-labelledby="headingOne" data-parent="#accordion">

                        <table class="table w-100  m-0">
                            <thead class="thead-light">
                            <tr>
                                <th>Instituto</th>
                                <th>Número</th>
                                <th>Situação</th>
                                <th>Ação</th>
                            </tr>
                            </thead>
                            <tbody class="table-light">
                            <tr>
                                <td>DCC</td>
                                <td>123</td>
                                <td><span class="badge badge-danger">Ocupada</span></td>
                                <td><a href="#" class="btn btn-sm btn-info">Dashboard</a></td>
                            </tr>
                            <tr>
                                <td>ICE</td>
                                <td>1023</td>
                                <td><span class="badge badge-success">Livre</span></td>
                                <td><a href="#" class="btn btn-sm btn-info">Dashboard</a></td>
                            </tr>
                            </tbody>
                        </table>
                    </div>
                </div>

            </div>

            <!--
            <div class="table-responsive-sm">
                <table class="table">
                    <thead class="thead-light">
                        <tr>
                            <th>Disciplina</th>
                            <th>Sala</th>
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
-->
        </div>

    </div>

    <?php include('includes/footer.php');?>
</body>

</html>