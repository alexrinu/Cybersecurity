<?php 
$link = mysqli_connect('localhost', 'root', 'root', 'programare_inmatriculari');
if (!$link){
    echo"<script>alert('Connection failed！')</script>";
} else {
    session_start();
    $name = mysqli_real_escape_string($link, $_POST['name']);
    $password = mysqli_real_escape_string($link, $_POST['password']);
    if (isset($_POST['submit'])){
        $query = "select * from employees where name = '$name' and password = '$password'";
        $result = mysqli_query($link, $query);
        if (mysqli_num_rows($result) >= 1){
            $_SESSION["loggedIn_employee"] = TRUE;
	    $_SESSION["employee_name"] = $name;
            header('Location: /controller/employee.php');
        } else {
            $_SESSION["loggedIn_employee"] = FALSE;
        	header('Location: /view/login_employee.html');
        }
    }
}
?>
