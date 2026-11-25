<?php

session_start();
include "database.php";

if (!isset($_SESSION['admin_id'])) {
    header("Location: admin_login.php");
    exit();
}

/* Update Complaint */
if (isset($_POST['update_complaint'])) {

    $complaint_id = $_POST['complaint_id'];
    $status = $_POST['status'];
    $admin_reply = $_POST['admin_reply'];

    $sql = "UPDATE complaints
            SET status='$status',
                admin_reply='$admin_reply'
            WHERE complaint_id='$complaint_id'";

    mysqli_query($conn, $sql);

    header("Location: admin_complaints.php");
    exit();
}


/* Get All Complaints */

$sql = "SELECT complaints.*, students.name, students.email
        FROM complaints
        JOIN students
        ON complaints.student_id = students.student_id
        ORDER BY complaints.complaint_id DESC";

$result = mysqli_query($conn, $sql);

?>

<!DOCTYPE html>
<html>

<head>

    <title>Manage Complaints</title>

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
            width: 95%;
            margin: 30px auto;
        }

        .back {
            display: inline-block;
            padding: 10px 15px;
            background: #2563eb;
            color: white;
            text-decoration: none;
            border-radius: 5px;
            margin-bottom: 20px;
        }

        table {
            width: 100%;
            border-collapse: collapse;
            background: white;
        }

        th, td {
            padding: 12px;
            border: 1px solid #ddd;
            text-align: left;
            vertical-align: top;
        }

        th {
            background: #2563eb;
            color: white;
        }

        select {
            padding: 8px;
            width: 150px;
        }

        textarea {
            width: 200px;
            height: 70px;
            padding: 8px;
            resize: vertical;
        }

        .update-btn {
            background: #16a34a;
            color: white;
            border: none;
            padding: 9px 15px;
            border-radius: 5px;
            cursor: pointer;
            margin-top: 5px;
        }

        .pending {
            color: orange;
            font-weight: bold;
        }

        .progress {
            color: blue;
            font-weight: bold;
        }

        .resolved {
            color: green;
            font-weight: bold;
        }

    </style>

</head>

<body>

<div class="header">

    <h1>Manage Complaints</h1>

</div>

<div class="container">

    <a href="admin_dashboard.php" class="back">
        ← Back to Dashboard
    </a>

    <table>

        <tr>

            <th>ID</th>
            <th>Student</th>
            <th>Email</th>
            <th>Category</th>
            <th>Subject</th>
            <th>Description</th>
            <th>Date</th>
            <th>Update Status / Reply</th>

        </tr>

        <?php

        if (mysqli_num_rows($result) > 0) {

            while ($row = mysqli_fetch_assoc($result)) {

                $status = $row['status'];

                $class = "";

                if ($status == "Pending") {
                    $class = "pending";
                }

                elseif ($status == "In Progress") {
                    $class = "progress";
                }

                elseif ($status == "Resolved") {
                    $class = "resolved";
                }

        ?>

        <tr>

            <td>
                <?php echo $row['complaint_id']; ?>
            </td>

            <td>
                <?php echo $row['name']; ?>
            </td>

            <td>
                <?php echo $row['email']; ?>
            </td>

            <td>
                <?php echo $row['category']; ?>
            </td>

            <td>
                <?php echo $row['subject']; ?>
            </td>

            <td>
                <?php echo $row['description']; ?>
            </td>

            <td>
                <?php echo $row['complaint_date']; ?>
            </td>

            <td>

                <form method="POST">

                    <input type="hidden"
                           name="complaint_id"
                           value="<?php echo $row['complaint_id']; ?>">

                    <select name="status">

                        <option value="Pending"
                            <?php if ($row['status'] == "Pending") echo "selected"; ?>>
                            Pending
                        </option>

                        <option value="In Progress"
                            <?php if ($row['status'] == "In Progress") echo "selected"; ?>>
                            In Progress
                        </option>

                        <option value="Resolved"
                            <?php if ($row['status'] == "Resolved") echo "selected"; ?>>
                            Resolved
                        </option>

                    </select>

                    <br><br>

                    <textarea name="admin_reply"
                              placeholder="Write admin reply..."><?php
                        echo $row['admin_reply'];
                    ?></textarea>

                    <br>

                    <button type="submit"
                            name="update_complaint"
                            class="update-btn">

                        Update

                    </button>

                </form>

            </td>

        </tr>

        <?php

            }

        } else {

            echo "<tr>";

            echo "<td colspan='8' style='text-align:center;'>
                    No complaints found
                  </td>";

            echo "</tr>";

        }

        ?>

    </table>

</div>

</body>

</html>