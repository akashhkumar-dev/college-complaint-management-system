<?php

include "database.php";

if (isset($_POST['register'])) {

    $name = trim($_POST['name']);
    $email = trim($_POST['email']);
    $password = trim($_POST['password']);
    $course = trim($_POST['course']);
    $phone = trim($_POST['phone']);

    $sql = "INSERT INTO students
            (name, email, password, course, phone)
            VALUES
            ('$name', '$email', '$password', '$course', '$phone')";

    if (mysqli_query($conn, $sql)) {

        $success = "Registration successful! You can now login.";

    } else {

        $error = "Registration failed. Email may already exist.";

    }
}

?>

<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="UTF-8">

    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Student Registration | College Complaint Portal</title>

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
            padding: 30px 0;
        }

        .container {
            width: 900px;
            max-width: 95%;
            background: white;
            border-radius: 20px;
            overflow: hidden;
            display: flex;
            box-shadow: 0 15px 40px rgba(0,0,0,0.12);
        }

        /* LEFT */

        .left {
            width: 40%;
            background: #0f172a;
            color: white;
            padding: 45px;
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
            font-size: 36px;
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

        /* RIGHT */

        .right {
            width: 60%;
            padding: 45px;
        }

        .right h2 {
            font-size: 30px;
            color: #0f172a;
            margin-bottom: 8px;
        }

        .subtitle {
            color: #64748b;
            margin-bottom: 25px;
        }

        .success {
            background: #dcfce7;
            color: #15803d;
            padding: 12px;
            border-radius: 8px;
            margin-bottom: 20px;
            text-align: center;
        }

        .error {
            background: #fee2e2;
            color: #dc2626;
            padding: 12px;
            border-radius: 8px;
            margin-bottom: 20px;
            text-align: center;
        }

        .row {
            display: flex;
            gap: 15px;
        }

        .field {
            width: 100%;
        }

        label {
            display: block;
            font-weight: bold;
            color: #334155;
            margin-bottom: 7px;
        }

        input,
        select {
            width: 100%;
            padding: 12px;
            border: 1px solid #cbd5e1;
            border-radius: 8px;
            outline: none;
            margin-bottom: 18px;
            font-size: 15px;
            background: white;
        }

        input:focus,
        select:focus {
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

        .login {
            text-align: center;
            margin-top: 20px;
            color: #64748b;
        }

        .login a {
            color: #2563eb;
            text-decoration: none;
            font-weight: bold;
        }

        .back {
            text-align: center;
            margin-top: 12px;
        }

        .back a {
            color: #64748b;
            text-decoration: none;
            font-size: 14px;
        }

        @media (max-width: 700px) {

            .container {
                flex-direction: column;
            }

            .left,
            .right {
                width: 100%;
            }

            .left {
                padding: 30px;
            }

            .right {
                padding: 30px;
            }

            .row {
                flex-direction: column;
                gap: 0;
            }

        }

    </style>

</head>

<body>

<div class="container">

    <!-- LEFT SIDE -->

    <div class="left">

        <div class="logo">
            College<span>Complaint</span>
        </div>

        <h1>
            Create Your<br>
            <span>Account.</span>
        </h1>

        <p>
            Register as a student and easily submit,
            track and manage your college complaints
            online.
        </p>

    </div>


    <!-- RIGHT SIDE -->

    <div class="right">

        <h2>Student Registration</h2>

        <p class="subtitle">
            Create your student account to get started.
        </p>


        <?php

        if (isset($success)) {
            echo "<div class='success'>$success</div>";
        }

        if (isset($error)) {
            echo "<div class='error'>$error</div>";
        }

        ?>


        <form method="POST">

            <div class="row">

                <div class="field">

                    <label>Full Name</label>

                    <input
                        type="text"
                        name="name"
                        placeholder="Enter your name"
                        required
                    >

                </div>


                <div class="field">

                    <label>Phone Number</label>

                    <input
                        type="text"
                        name="phone"
                        placeholder="Enter phone number"
                        required
                    >

                </div>

            </div>


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
                placeholder="Create a password"
                required
            >


            <label>Course</label>

            <select name="course" required>

                <option value="">
                    Select your course
                </option>

                <option value="BCA">
                    BCA
                </option>

                <option value="BBA">
                    BBA
                </option>

                <option value="BCOM">
                    BCOM
                </option>

                <option value="BA">
                    BA
                </option>

                <option value="BTECH">
                    BTECH
                </option>

            </select>


            <button type="submit" name="register">
                Create Account →
            </button>

        </form>


        <div class="login">

            Already have an account?

            <a href="login.php">
                Login
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