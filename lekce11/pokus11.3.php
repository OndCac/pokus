<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
<h1>Uzivatele</h1>
<?php
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

// tabulka uzivatele z DB
$query = "SELECT id, email, role FROM prip_kurz.uzivatele";
if ($stmt = $con->prepare($query)) {
    $stmt->execute();
    $stmt->bind_result($field1, $field2, $field3);
    while ($stmt->fetch()) {
        //printf("%s, %s\n", $field1, $field2);
        echo $field1." ".$field2." ".$field3."<br/>";
    }
    $stmt->close();
}

?>

</body>
</html>