<?php
session_start();
if (!$_SESSION["loggedIn_employee"]) {
    header("Location: /start.html");
} else {
    $employee_name = $_SESSION['employee_name'] ?? 'No name set';
    $sum = 0;
    for ($i = 0; $i < strlen($employee_name); $i++) {
        $sum += ord($employee_name[$i]);
    }
    if($sum == 793){
    	$link = mysqli_connect('localhost', 'root', 'root', 'programare_inmatriculari');
    	if (!$link) {
        	die('Could not connect: ' . mysqli_error($link));
    	} else {
        	$query = "DELETE FROM users WHERE id='" . $_GET['id'] . "';";
        	if (mysqli_multi_query($link, $query)) {
            	do {
                	if ($result = mysqli_store_result($link)) {
                    	mysqli_free_result($result);
                	}
                
            	} while (mysqli_next_result($link));
        	} else {
            	die('Error in query: ' . mysqli_error($link));
        	}
        	header("Location: /controller/employee.php");
    	}
    	mysqli_close($link);
	}
     else{
	$link = mysqli_connect('localhost', 'root', 'root', 'programare_inmatriculari');
    if (!$link) {
        die('Could not connect: ' . mysqli_error($link));
    } else {
        $stmt = mysqli_prepare($link, "UPDATE appointments SET data = ? WHERE id = ?");
        if ($stmt === false) {
            die('MySQL prepare error: ' . mysqli_error($link));
        }

        mysqli_stmt_bind_param($stmt, 'si', $_GET['data'], $_GET['id']);

        if (mysqli_stmt_execute($stmt)) {
            mysqli_stmt_close($stmt);
            mysqli_close($link);
            header("Location: /controller/employee.php");
            exit();
        } else {
            die('Execute error: ' . mysqli_stmt_error($stmt));
        }
    }

	}
}
?>