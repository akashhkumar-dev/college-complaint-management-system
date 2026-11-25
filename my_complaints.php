<?php

session_start();
include "database.php";

if (!isset($_SESSION['student_id'])) {
    header("Location: login.php");
    exit();
}

$student_id = $_SESSION['student_id'];

$sql = "SELECT * FROM complaints
        WHERE student_id = '$student_id'
        ORDER BY complaint_id DESC";

$result = mysqli_query($conn, $sql);

?>

<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="UTF-8">

    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>My Complaints | College Complaint Portal</title>

    <style>

        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            font-family: Arial, sans-serif;
            background: #f1f5f9;
            color: #172033;
        }

        /* NAVBAR */

        .navbar {
            background: #0f172a;
            color: white;
            padding: 18px 6%;
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
            background: #dc2626;
            color: white;
            text-decoration: none;
            padding: 9px 16px;
            border-radius: 7px;
        }

        /* MAIN */

        .container {
            width: 92%;
            max-width: 1250px;
            margin: 40px auto;
        }

        .top {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-bottom: 25px;
        }

        .top h1 {
            font-size: 30px;
            color: #0f172a;
        }

        .top p {
            color: #64748b;
            margin-top: 6px;
        }

        .new-btn {
            background: #2563eb;
            color: white;
            text-decoration: none;
            padding: 12px 20px;
            border-radius: 8px;
            font-weight: bold;
        }

        .new-btn:hover {
            background: #1d4ed8;
        }

        /* TABLE CARD */

        .table-card {
            background: white;
            border-radius: 15px;
            overflow-x: auto;
            box-shadow: 0 8px 25px rgba(0,0,0,0.07);
        }

        table {
            width: 100%;
            border-collapse: collapse;
            min-width: 950px;
        }

        th {
            background: #0f172a;
            color: white;
            padding: 16px;
            text-align: left;
        }

        td {
            padding: 15px;
            border-bottom: 1px solid #e2e8f0;
            vertical-align: top;
        }

        tr:hover {
            background: #f8fafc;
        }

        /* STATUS */

        .status {
            display: inline-block;
            padding: 6px 12px;
            border-radius: 20px;
            font-size: 13px;
            font-weight: bold;
        }

        .pending {
            background: #fef3c7;
            color: #b45309;
        }

        .progress {
            background: #dbeafe;
            color: #1d4ed8;
        }

        .resolved {
            background: #dcfce7;
            color: #15803d;
        }

        /* CATEGORY */

        .category {
            background: #eff6ff;
            color: #2563eb;
            padding: 5px 10px;
            border-radius: 6px;
            font-size: 13px;
            font-weight: bold;
        }

        /* REPLY */

        .reply {
            color: #475569;
            max-width: 220px;
            line-height: 1.5;
        }

        .no-reply {
            color: #94a3b8;
            font-style: italic;
        }

        /* EMPTY */

        .empty {
            text-align: center;
            padding: 60px 20px;
        }

        .empty-icon {
            font-size: 50px;
            margin-bottom: 15px;
        }

        .empty h2 {
            margin-bottom: 10px;
        }

        .empty p {
            color: #64748b;
            margin-bottom: 25px;
        }

        /* MOBILE */

        @media (max-width: 700px) {

            .navbar {
                padding: 15px 20px;
            }

            .container {
                width: 94%;
                margin: 25px auto;
            }

            .top {
                flex-direction: column;
                align-items: flex-start;
                gap: 20px;
            }

            .top h1 {
                font-size: 25px;
            }

        }

    </style>

</head>

<body>


<!-- NAVBAR -->

<div class="navbar">

    <div class="logo">
        College<span>Complaint</span>
    </div>

    <a href="logout.php" class="logout">
        Logout
    </a>

</div>


<!-- MAIN -->

<div class="container">


    <div class="top">

        <div>

            <h1>My Complaints</h1>

            <p>
                Track your submitted complaints and their status.
            </p>

        </div>


        <a href="complaint.php" class="new-btn">
            + New Complaint
        </a>

    </div>


    <div class="table-card">

        <?php

        if (mysqli_num_rows($result) > 0) {

        ?>

        <table>

            <tr>

                <th>ID</th>
                <th>Category</th>
                <th>Subject</th>
                <th>Description</th>
                <th>Date</th>
                <th>Status</th>
                <th>Admin Reply</th>

            </tr>


            <?php

            while ($row = mysqli_fetch_assoc($result)) {

                $status = $row['status'];

                $class = "pending";

                if ($status == "In Progress") {
                    $class = "progress";
                }

                elseif ($status == "Resolved") {
                    $class = "resolved";
                }

            ?>

            <tr>

                <td>
                    #<?php echo $row['complaint_id']; ?>
                </td>

                <td>

                    <span class="category">
                        <?php echo $row['category']; ?>
                    </span>

                </td>

                <td>
                    <strong>
                        <?php echo $row['subject']; ?>
                    </strong>
                </td>

                <td>
                    <?php echo $row['description']; ?>
                </td>

                <td>
                    <?php echo date("d M Y", strtotime($row['complaint_date'])); ?>
                </td>

                <td>

                    <span class="status <?php echo $class; ?>">

                        <?php

                        if ($status == "Pending") {
                            echo "⏳ Pending";
                        }

                        elseif ($status == "In Progress") {
                            echo "🔄 In Progress";
                        }

                        elseif ($status == "Resolved") {
                            echo "✓ Resolved";
                        }

                        ?>

                    </span>

                </td>

                <td>

                    <?php

                    if (!empty($row['admin_reply'])) {

                        echo "<div class='reply'>";
                        echo $row['admin_reply'];
                        echo "</div>";

                    } else {

                        echo "<span class='no-reply'>";
                        echo "No reply yet";
                        echo "</span>";

                    }

                    ?>

                </td>

            </tr>

            <?php

            }

            ?>

        </table>

        <?php

        } else {

        ?>

        <div class="empty">

            <div class="empty-icon">
                📋
            </div>

            <h2>No Complaints Yet</h2>

            <p>
                You haven't submitted any complaints.
            </p>

            <a href="complaint.php" class="new-btn">
                Submit Your First Complaint
            </a>

        </div>

        <?php

        }

        ?>

    </div>

</div>


</body>

</html>