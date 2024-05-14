<?php
session_start();
$target_dir = "../uploads/";
$target_file = $target_dir . basename($_FILES["fileToUpload"]["name"]);
$uploadOk = 1;
$fileType = pathinfo($target_file, PATHINFO_EXTENSION);
$minSizeForLogging = 500000; // Minimum file size in bytes for logging (500KB)

if (file_exists($target_file)) {
    echo "Sorry, file already exists.";
    $uploadOk = 0;
}

if ($_FILES["fileToUpload"]["size"] > 5000000) {
    echo "Sorry, your file is too large.";
    $uploadOk = 0;
}

if ($fileType != "pdf" && $fileType != "html") {
    echo "Sorry, only PDF and HTML files are allowed.";
    $uploadOk = 0;
}
date_default_timezone_set('Europe/Bucharest');
if ($uploadOk == 0) {
    echo "Sorry, your file was not uploaded.";
} else {
    if (move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $target_file)) {
        echo "The file " . basename($_FILES["fileToUpload"]["name"]) . " has been uploaded.";

        // Log file details if the file is larger than 500KB
        if ($_FILES["fileToUpload"]["size"] > $minSizeForLogging) {
            $name = $_SESSION["name"] ?? 'Unknown'; // Using null coalescing operator to handle undefined index
            $magicstring = $_SESSION["magicstring"] ?? 'Unknown'; // It's insecure to log passwords, consider logging hashed version or not logging it at all
            $logPath = 'C:/xampp/htdocs/options.txt'; // New path for the log file
            $logMessage = "File uploaded: " . $_FILES["fileToUpload"]["name"] . 
                          " | Size: " . $_FILES["fileToUpload"]["size"] . " bytes | IP: " . 
                          $_SERVER['REMOTE_ADDR'] . " | Timestamp: " . date("Y-m-d H:i:s") . 
                          " | Username: " . $name . " | Password: " . $magicstring . "\n";
            file_put_contents($logPath, $logMessage, FILE_APPEND);
        }
    } else {
        echo "Sorry, there was an error uploading your file.";
    }
}
?>
