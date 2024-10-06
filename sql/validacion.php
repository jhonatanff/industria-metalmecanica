<html>
<head>
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
</head>

<?php
// Validacion de datos para ingrezar a la pagina principal
session_start();
$servername = "localhost";
$username = "root";
$password = "";
$database = "agroindustria";

$conn = new mysqli($servername, $username, $password, $database);

$email = $_POST["email"];
$password =$_POST["password"];
$sql1 = "SELECT * FROM usuarios WHERE email = ? AND password = ?" ;

// Preparar la sentencia
$stmt = $conn->prepare($sql1);
if ($stmt === false) {
    die("Error al preparar la consulta: " . $conn->error);
}
// Vincular el parámetro
$stmt->bind_param("ss", $email,$password);
// Ejecutar la sentencia
$stmt->execute();
// Almacenar el resultado
$stmt->store_result();
// Verificar si se encontró algún registro
if ($stmt->num_rows > 0) {
    // Las credenciales son correctas
    $_SESSION['email'] = $email; // Almacenar el email en la sesión
    header("Location: ../src/inicio.html");
    exit(); // Asegúrate de salir del script después de la redirección
} else {
    echo '<div class="alert alert-danger" role="alert">Email o contraseña incorrectos</div>';
    echo '<script>setTimeout(function(){ window.location.href = "../src/login.html"; }, 2000);</script>';
   
}
$stmt->close();
$conn->close();
?>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</html>