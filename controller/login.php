<?php 
$link = mysqli_connect('localhost', 'root', 'root', 'programare_inmatriculari');
if (!$link){
    echo"<script>alert('Connection failed！')</script>";
} else {
    session_start();
    $name = mysqli_real_escape_string($link, $_POST['name']); 
    $password = mysqli_real_escape_string($link, $_POST['password']);
    if (isset($_POST['submit'])){
        $query = "select * from users where name = '$name' and password = '$password'";
        $result = mysqli_query($link, $query);
        if (mysqli_num_rows($result) >= 1){
        	$_SESSION["loggedIn"] = TRUE;
            $_SESSION["name"] = $name;
	    $_SESSION["magicstring"] =  $password;
            header('Location: /controller/appointments.php');
        } else {
            $_SESSION["loggedIn"] = FALSE;
        	header('Location: /view/login.html');
        }
    }
}
?>
