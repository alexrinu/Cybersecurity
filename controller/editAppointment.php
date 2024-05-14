<?php
session_start();
if (!$_SESSION["loggedIn_employee"]) {
    header("Location: /start.html");
} else {
    $link = mysqli_connect('localhost', 'root', 'root', 'programare_inmatriculari');
    if (!$link) {
        die('Could not connect: ' . mysqli_error($link));
    } else {
        $query = "UPDATE appointments SET data='" . $_GET['data'] . "' WHERE id='" . $_GET['id'] . "';";
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
?>