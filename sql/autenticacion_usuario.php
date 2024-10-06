<?php
include "../sql/conexion.php";

//Capturar datos de registro de usuario
$id = $_POST["id"];
$nombre = $_POST["nombre"];
$numero_identificacion = $_POST["numero_identificacion"];
$email = $_POST["email"];
$password = $_POST["password"];

$sql = "INSERT  INTO usuarios (id ,nombre, numero_identificacion, email, password) VALUES (?,?,?,?,?)";
$stmt = $conn->prepare($sql);
if($stmt === false){
    die ("error al preparar la consulta");
}

// Vincular los parámetros
$stmt->bind_param("issss", $id, $nombre, $numero_identificacion, $email, $password);

// Ejecutar la sentencia
if ($stmt->execute() === TRUE) {
    header("location: ../src/login.html");
    exit();
} else {
    echo "Error al crear usuario: " . $stmt->error;
}

$stmt->close();
$conn->close();

?>







