<?php
    session_start();

    // DB credentials.
    define('DB_HOST','localhost');
    define('DB_PORT','3308');
    define('DB_USER','root');
    define('DB_PASS','');
    define('DB_NAME','sd');

    // DB2 credentials.
    define('DB_HOST2','10.5.16.109');
    define('DB_PORT2','5432');
    define('DB_USER2','postgres');
    define('DB_PASS2','sd2019-03');
    define('DB_NAME2','sd2019');
    // Establish database connection.
    //$host = '10.5.16.109';
    //$db  = 'postgres';
    //$username = 'postgres';
    //$password = 'sd2019-03';
$response = "";
$retries = 3;
$errorMessage = "";
global $conn;
while ($retries > 0)
{
    try
    {
        //$conn2 = new PDO("mysql:host=".DB_HOST.";port=".DB_PORT.";dbname=".DB_NAME,DB_USER, DB_PASS, array(PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES 'utf8'"));
        //$conn2->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);


        $conn = new PDO("pgsql:host=".DB_HOST2.";port=".DB_PORT2.";dbname=".DB_NAME2,DB_USER2, DB_PASS2);
        $retries = 0;
        $errorMessage = "";
        /*
        if($conn){
            echo "<h1> Conectou </h1>";
        } else {
            echo "<h1> Não Conectou </h1>";
        }

        //$stmt2 = $conn2->prepare('INSERT INTO sd.usuario (cpf, macBluetooth) VALUES ("134534523", "123453453")');

        $stmt2 = $conn->prepare('SELECT * FROM sd.usuarioIntegra');
        if($stmt2->execute()) {
            echo "<h1> Funcionou a Query </h1>";
            echo $stmt2->rowCount();
        } else {
            echo $stmt2->rowCount();
            echo "<h1> Não funcionou a Query </h1>";
        }
        */

        //$conn = new PDO("pgsql:host=".$host.";dbname=".$db,$username, $password);



    }
    catch (PDOException $e)
    {
        $errorMessage = setErrorMessage($e->getMessage());
        //echo "Something went wrong, retrying...";
        $retries--;
        usleep(2000);
       // header('Location: 404.php');
    }
}

    function setErrorMessage($message){
        return "<div class=\"alert alert-danger alert-dismissible fade show\" role=\"alert\">
                    $message 
                    <button type=\"button\" class=\"close\" data-dismiss=\"alert\" aria-label=\"Close\">
                        <span aria-hidden=\"true\">&times;</span>
                    </button>
                </div>";
    }
?>

