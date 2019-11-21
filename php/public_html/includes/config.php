<?php
    session_start();

    // DB credentials.
    define('DB_HOST','localhost');
    define('DB_USER','root');
    define('DB_PASS','');
    define('DB_NAME','sd');

    // DB2 credentials.
    define('DB_HOST2','10.5.16.109');
    define('DB_PORT2','5432');
    define('DB_USER2','postgres');
    define('DB_PASS2','sd2019-03');
    define('DB_NAME2','postgres');
    // Establish database connection.
    //$host = '10.5.16.109';
    //$db  = 'postgres';
    //$username = 'postgres';
    //$password = 'sd2019-03';
    try
    {
        //$conn = new PDO("mysql:host=".DB_HOST.";dbname=".DB_NAME,DB_USER, DB_PASS, array(PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES 'utf8'"));
        //$conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);


        //$dsn = "pgsql:host=$host;port=5432;dbname=$db;user=$username;password=$password";
        //$conn2 = new PDO($dsn);
        $conn2 = new PDO("pgsql:host=".DB_HOST2.";port=".DB_PORT2.";dbname=".DB_NAME2,DB_USER2, DB_PASS2);

        $stmt2 = $conn2->prepare('INSERT INTO sd.usuario (cpf, macBluetooth) VALUES ("123", "123")');

        if($stmt2->execute()) {
            echo "Insert";
        }


        $stmt = $conn2->prepare('SELECT * FROM sd.usuario');
        if($stmt->execute()) {
            echo "Select";
        }

        //$conn = new PDO("pgsql:host=".$host.";dbname=".$db,$username, $password);


    }
    catch (PDOException $e)
    {
        echo $e->getTrace();
        echo $e->getMessage();
        //1header('Location: 404.php');
    }


?>

