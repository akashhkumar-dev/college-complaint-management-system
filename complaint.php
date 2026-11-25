<?php

session_start();
include "database.php";

if (!isset($_SESSION['student_id'])) {
    header("Location: login.php");
    exit();
}

if (isset($_POST['submit_complaint'])) {

    $student_id = $_SESSION['student_id'];
    $category = trim($_POST['category']);
    $subject = trim($_POST['subject']);
    $description = trim($_POST['description']);

    $sql = "INSERT INTO complaints
            (student_id, category, subject, description)
            VALUES
            ('$student_id', '$category', '$subject', '$description')";

    if (mysqli_query($conn, $sql)) {

        $success = "Complaint submitted successfully!";

    } else {

        $error = "Something went wrong. Please try again.";

    }
}

?>

<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="UTF-8">

    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Submit Complaint | College Complaint Portal</title>

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
            padding: 40px 20px;
        }

        .navbar {
            max-width: 1000px;
            margin: auto;
            background: #0f172a;
            color: white;
            padding: 18px 25px;
            border-radius: 12px 12px 0 0;
            display: flex;
            justify-content: space-between;
            align-items: center;
        }

        .logo {
            font-size: 21px;
            font-weight: bold;
        }

        .logo span {
            color: #3b82f6;
        }

        .logout {
            color: white;
            text-decoration: none;
            background: #dc2626;
            padding: 9px 15px;
            border-radius: 7px;
        }

        .container {
            max-width: 1000px;
            margin: auto;
            background: white;
            padding: 40px;
            border-radius: 0 0 12px 12px;
            box-shadow: 0 15px 40px rgba(0,0,0,0.10);
        }

        .heading {
            margin-bottom: 30px;
        }

        .heading h1 {
            color: #0f172a;
            margin-bottom: 8px;
        }

        .heading p {
            color: #64748b;
        }

        .success {
            background: #dcfce7;
            color: #15803d;
            padding: 13px;
            border-radius: 8px;
            margin-bottom: 20px;
            font-weight: bold;
        }

        .error {
            background: #fee2e2;
            color: #dc2626;
            padding: 13px;
            border-radius: 8px;
            margin-bottom: 20px;
            font-weight: bold;
        }

        .form-row {
            display: flex;
            gap: 20px;
        }

        .field {
            width: 100%;
            margin-bottom: 22px;
        }

        label {
            display: block;
            font-weight: bold;
            color: #334155;
            margin-bottom: 8px;
        }

        input,
        select,
        textarea {
            width: 100%;
            padding: 13px;
            border: 1px solid #cbd5e1;
            border-radius: 8px;
            font-size: 15px;
            outline: none;
            font-family: Arial;
        }

        input:focus,
        select:focus,
        textarea:focus {
            border-color: #2563eb;
            box-shadow: 0 0 0 3px #dbeafe;
        }

        textarea {
            height: 150px;
            resize: vertical;
        }

        .submit-btn {
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

        .submit-btn:hover {
            background: #1d4ed8;
        }

        .bottom {
            margin-top: 20px;
            display: flex;
            justify-content: space-between;
        }

        .bottom a {
            text-decoration: none;
            color: #2563eb;
            font-weight: bold;
        }

        @media (max-width: 700px) {

            .form-row {
                flex-direction: column;
                gap: 0;
            }

            .container {
                padding: 25px;
            }

            .navbar {
                padding: 15px;
            }

            .logo {
                font-size: 17px;
            }

        }

    </style>

</head>

<body>


<div class="navbar">

    <div class="logo">
        College<span>Complaint</span>
    </div>

    <a href="logout.php" class="logout">
        Logout
    </a>

</div>


<div class="container">

    <div class="heading">

        <h1>Submit a Complaint</h1>

        <p>
            Tell us about your issue and our administration
            will review it.
        </p>

    </div>


    <?php

    if (isset($success)) {
        echo "<div class='success'>$success</div>";
    }

    if (isset($error)) {
        echo "<div class='error'>$error</div>";
    }

    ?>


    <form method="POST">


        <div class="form-row">


            <div class="field">

                <label>Complaint Category</label>

                <select name="category" required>

                    <option value="">
                        Select Category
                    </option>

                    <option value="Fees">
                        Fees
                    </option>

                    <option value="Faculty">
                        Faculty
                    </option>

                    <option value="Exam">
                        Exam
                    </option>

                    <option value="Infrastructure">
                        Infrastructure
                    </option>

                    <option value="Library">
                        Library
                    </option>

                    <option value="Hostel">
                        Hostel
                    </option>

                    <option value="Other">
                        Other
                    </option>

                </select>

            </div>


            <div class="field">

                <label>Subject</label>

                <input
                    type="text"
                    name="subject"
                    placeholder="Enter complaint subject"
                    required
                >

            </div>


        </div>


        <div class="field">

            <label>Complaint Description</label>

            <textarea
                name="description"
                placeholder="Describe your complaint in detail..."
                required
            ></textarea>

        </div>


        <button
            type="submit"
            name="submit_complaint"
            class="submit-btn">

            Submit Complaint →

        </button>


    </form>


    <div class="bottom">

        <a href="my_complaints.php">
            ← My Complaints
        </a>

        <a href="index.php">
            Home
        </a>

    </div>

</div>

</body>

</html>