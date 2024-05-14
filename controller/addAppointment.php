<?php
session_start();
if (!isset($_SESSION["loggedIn_employee"])) {
    header("Location: /start.html");
    exit(); 
}

$link = mysqli_connect('localhost', 'root', 'root', 'programare_inmatriculari');
if (!$link) {
    die('Could not connect: ' . mysqli_connect_error());
}

$query = "INSERT INTO appointments (user_id, location_id, data) VALUES (?, ?, ?)";
$stmt = mysqli_prepare($link, $query);

if ($stmt === false) {
    die('MySQL prepare error: ' . mysqli_error($link));
}

mysqli_stmt_bind_param($stmt, 'iis', $_POST['user_id'], $_POST['location_id'], $_POST['data']);
$executeResult = mysqli_stmt_execute($stmt);

if ($executeResult === false) {
    die('Execute error: ' . mysqli_stmt_error($stmt));
}

header("Location: /controller/employee.php");
exit();  // Prevent further execution after redirection
?>
