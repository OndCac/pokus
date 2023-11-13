<?php

// vystup bude JSON
header('Content-Type: application/json');

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
$sql = "SELECT * FROM prip_kurz.uzivatele";
$result = $con->query($sql);

// Fetch and convert to JSON
$data = array();

if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        $data[] = $row;
    }
}

$json_data = json_encode($data);

// Output the JSON
echo $json_data;

// Close the database connection
$con->close();
