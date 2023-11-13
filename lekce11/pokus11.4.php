<?php

// vystup bude JSON
header('Content-Type: application/json');

echo "[\n";

// pripojeni k DB
// pozor, musi byt 
// alter user 'root'@'localhost' identified with mysql_native_password by 'root';
$host="localhost";
$port=3306;
$socket="";
$user="root";
$password="root"; // nutne spravne heslo
$dbname="prip_kurz";

$con = new mysqli($host, $user, $password, $dbname, $port, $socket)
	or die ('Could not connect to the database server' . mysqli_connect_error());

//$con->close();

// tabulka uzivatele z DB jako JSON
$query = "SELECT id, email, role FROM prip_kurz.uzivatele";
if ($stmt = $con->prepare($query)) {
    $stmt->execute();
    $stmt->bind_result($field1, $field2, $field3);
    while ($stmt->fetch()) {
        //printf("%s, %s\n", $field1, $field2);
        // TODO - jako JSON
        //echo $field1." ".$field2." ".$field3."<br/>";
        echo "{\n";
        echo '"id":' . $field1 . "\n";
        echo "},\n";
        
    }
    $stmt->close();
}


echo "]\n";

?>
