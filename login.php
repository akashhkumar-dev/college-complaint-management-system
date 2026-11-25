<?php

session_start();
include "database.php";

if (isset($_POST['login'])) {

    $email = trim($_POST['email']);
    $password = trim($_POST['password']);

    $sql = "SELECT * FROM students
            WHERE email='$email'
            AND password='$password'";

    $result = mysqli_query($conn, $sql);

    if (mysqli_num_rows($result) == 1) {

        $student = mysqli_fetch_assoc($result);

        $_SESSION['student_id'] = $student['student_id'];
        $_SESSION['student_name'] = $student['name'];

        header("Location: complaint.php");
        exit();

    } else {

        $error = "Invalid Email or Password!";

    }
}

?>

<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="UTF-8">

    <meta name="viewport"
          content="width=device-width, initial-scale=1.0">

    <title>Student Login | College Complaint Portal</title>

    <style>

        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            font-family: Arial, sans-serif;
            min-height: 100vh;
            background: linear-gradient(135deg, #eff6ff, #dbeafe);
            display: flex;
            align-items: center;
            justify-content: center;
        }

        .container {
            width: 900px;
            max-width: 95%;
            min-height: 520px;
            background: white;
            border-radius: 20px;
            overflow: hidden;
            display: flex;
            box-shadow: 0 15px 40px rgba(0,0,0,0.12);
        }

        /* LEFT SIDE */

        .left {
            width: 45%;
            background: #0f172a;
            color: white;
            padding: 50px;
            display: flex;
            flex-direction: column;
            justify-content: center;
        }

        .logo {
            font-size: 22px;
            font-weight: bold;
            margin-bottom: 40px;
        }

        .logo span {
            color: #3b82f6;
        }

        .left h1 {
            font-size: 38px;
            line-height: 1.2;
            margin-bottom: 20px;
        }

        .left h1 span {
            color: #3b82f6;
        }

        .left p {
            color: #94a3b8;
            line-height: 1.6;
        }

        /* RIGHT SIDE */

        .right {
            width: 55%;
            padding: 50px;
            display: flex;
            flex-direction: column;
            justify-content: center;
        }

        .right h2 {
            font-size: 30px;
            color: #0f172a;
            margin-bottom: 8px;
        }

        .subtitle {
            color: #64748b;
            margin-bottom: 30px;
        }

        .error {
            background: #fee2e2;
            color: #dc2626;
            padding: 12px;
            border-radius: 8px;
            margin-bottom: 20px;
            text-align: center;
        }

        label {
            display: block;
            font-weight: bold;
            color: #334155;
            margin-bottom: 8px;
        }

        input {
            width: 100%;
            padding: 13px;
            border: 1px solid #cbd5e1;
            border-radius: 8px;
            outline: none;
            margin-bottom: 20px;
            font-size: 15px;
        }

        input:focus {
            border-color: #2563eb;
            box-shadow: 0 0 0 3px #dbeafe;
        }

        button {
            width: 100%;
            padding: 14px;
            background: #2563eb;
            color: white;
            border: none;
            border-radius: 8px;
            font-size: 16px;
            font-weight: bold;
            cursor: pointer;
        }

        button:hover {
            background: #1d4ed8;
        }

        .register {
            text-align: center;
            margin-top: 25px;
            color: #64748b;
        }

        .register a {
            color: #2563eb;
            text-decoration: none;
            font-weight: bold;
        }

        .back {
            text-align: center;
            margin-top: 15px;
        }

        .back a {
            color: #64748b;
            text-decoration: none;
            font-size: 14px;
        }

        /* MOBILE */

        @media (max-width: 700px) {

            .container {
                flex-direction: column;
            }

            .left {
                width: 100%;
                padding: 30px;
            }

            .left h1 {
                font-size: 30px;
            }

            .right {
                width: 100%;
                padding: 30px;
            }

        }

    </style>

</head>

<body>

<div class="container">

    <!-- LEFT -->

    <div class="left">

        <div class="logo">
            College<span>Complaint</span>
        </div>

        <h1>
            Welcome<br>
            <span>Back!</span>
        </h1>

        <p>
            Login to your student account to submit
            complaints and track their status easily.
        </p>

    </div>


    <!-- RIGHT -->

    <div class="right">

        <h2>Student Login</h2>

        <p class="subtitle">
            Enter your account details to continue.
        </p>


        <?php

        if (isset($error)) {
            echo "<div class='error'>$error</div>";
        }

        ?>


        <form method="POST">

            <label>Email Address</label>

            <input
                type="email"
                name="email"
                placeholder="Enter your email"
                required
            >


            <label>Password</label>

            <input
                type="password"
                name="password"
                placeholder="Enter your password"
                required
            >


            <button type="submit" name="login">
                Login →
            </button>

        </form>


        <div class="register">

            Don't have an account?

            <a href="register.php">
                Register
            </a>

        </div>


        <div class="back">

            <a href="index.php">
                ← Back to Home
            </a>

        </div>

    </div>

</div>

</body>

</html>