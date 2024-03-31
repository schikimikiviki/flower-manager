
<?php

require_once __DIR__ . '/vendor/autoload.php'; // Include the Composer autoloader

$dotenv = Dotenv\Dotenv::createImmutable(__DIR__);
$dotenv->load();

echo "";

function connect() {
     $server = $_ENV['SERVER'];
     $user= $_ENV['USER'];
     $password = $_ENV['PASSWORD'];
	 $dbname = $_ENV['DBNAME'];

    $conn = new mysqli($server, $user, $password, $dbname);

    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

   
    return $conn;
    //Test
}
?>
