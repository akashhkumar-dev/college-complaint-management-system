<?php

$host = "localhost";
$user = "root";
$password = "";
$database = "college_complaint_portal";

$conn = mysqli_connect($host, $user, $password, $database);

if (!$conn) {
    die("Database Connection Failed: " . mysqli_connect_error());
}

echo "Database Connected Successfully!";

?>