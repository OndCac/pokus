<?php
// hlavicka ze vystup je JSON
header('Content-Type: application/json');

// pripojeni k DB
$host="localhost";
$port=3306;
$socket="";
$user="root";
$password="root";
$dbname="prip_kurz";
$con = new mysqli($host, $user, $password, $dbname, $port, $socket)
    or die ('Could not connect to the database server' . mysqli_connect_error());

// JSON nad uzivatele 
$query = "SELECT id, email, role FROM prip_kurz.uzivatele";
echo '['; // JSON start - pole
if ($stmt = $con->prepare($query)) {
    $stmt->execute();
    $stmt->bind_result($field1, $field2, $field3);
    $a = 0; // pro 1. zaznam je a=0
    while ($stmt->fetch()) {
        // skladame objekt pro zaznam z DB
        echo (($a==1) ? ',' : '')
            .'{"id": '.$field1
            .', "email": "'.$field2
            .'", "role": "'.$field3
            .'"}';
        $a = 1; // pro 2. a dalsi zaznamy a=1
    }
    echo ']';
    $stmt->close();
}

//$con->close();

?>