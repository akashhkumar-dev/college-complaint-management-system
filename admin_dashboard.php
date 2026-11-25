<?php

session_start();

if (!isset($_SESSION['admin_id'])) {
    header("Location: admin_login.php");
    exit();
}

?>

<!DOCTYPE html>
<html>

<head>

    <title>Admin Dashboard</title>

    <style>

        body {
            font-family: Arial;
            background: #f4f6f8;
            margin: 0;
        }

        .header {
            background: #1e3a8a;
            color: white;
            padding: 20px;
            text-align: center;
        }

        .container {
            width: 80%;
            margin: 40px auto;
            text-align: center;
        }

        .card {
            background: white;
            padding: 30px;
            border-radius: 10px;
            box-shadow: 0 0 10px #ccc;
        }

        .btn {
            display: inline-block;
            padding: 12px 20px;
            margin: 10px;
            background: #2563eb;
            color: white;
            text-decoration: none;
            border-radius: 5px;
        }

        .logout {
            background: #dc2626;
        }

    </style>

</head>

<body>

<div class="header">

    <h1>Admin Dashboard</h1>

</div>

<div class="container">

    <div class="card">

        <h2>Welcome Admin</h2>

        <p>College Complaint Portal</p>

        <a href="admin_complaints.php" class="btn">
            View Complaints
        </a>

        <a href="admin_logout.php" class="btn logout">
            Logout
        </a>

    </div>

</div>

</body>

</html>