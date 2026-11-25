<?php

session_start();

if (isset($_POST['login'])) {

    $username = trim($_POST['username']);
    $password = trim($_POST['password']);

    // Admin Login Details
    if ($username == "admin" && $password == "admin123") {

        $_SESSION['admin_id'] = 1;
        $_SESSION['admin_username'] = "admin";

        header("Location: admin_dashboard.php");
        exit();

    } else {

        $error = "Invalid Username or Password!";

    }
}

?>

<!DOCTYPE html>
<html>

<head>

    <title>Admin Login</title>

    <style>

        body {
            font-family: Arial;
            background: #f4f6f8;
        }

        .box {
            width: 350px;
            margin: 100px auto;
            background: white;
            padding: 30px;
            border-radius: 10px;
            box-shadow: 0 0 10px #ccc;
        }

        h2 {
            text-align: center;
            color: #1e3a8a;
        }

        input {
            width: 100%;
            padding: 12px;
            margin: 10px 0;
            box-sizing: border-box;
            border: 1px solid #ccc;
            border-radius: 5px;
        }

        button {
            width: 100%;
            padding: 12px;
            background: #2563eb;
            color: white;
            border: none;
            border-radius: 5px;
            cursor: pointer;
        }

        .error {
            color: red;
            text-align: center;
            font-weight: bold;
        }

    </style>

</head>

<body>

<div class="box">

    <h2>Admin Login</h2>

    <?php

    if (isset($error)) {
        echo "<p class='error'>$error</p>";
    }

    ?>

    <form method="POST">

        <input type="text"
               name="username"
               placeholder="Enter Username"
               required>

        <input type="password"
               name="password"
               placeholder="Enter Password"
               required>

        <button type="submit" name="login">
            Login
        </button>

    </form>

</div>

</body>

</html>