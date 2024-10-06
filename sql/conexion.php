<?php
$servername = "localhost";
$username = "root";
$password = "";
$database = "agroindustria";

$conn = new mysqli($servername, $username, $password, $database);

if($conn -> connect_error){
    die("connection failed" . $conn->connect_error);
}else{
    echo "conexion exitosa" . "<br>";
}

?>