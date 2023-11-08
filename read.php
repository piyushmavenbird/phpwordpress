<?php
require_once "connection.php";
$sql = "SELECT * FROM crud";
$result = mysqli_query($conn, $sql);

if ($result) {
    $records = mysqli_fetch_all($result, MYSQLI_ASSOC);
} else {
    $records = [];
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Read Records</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            text-align: left;
            background-color: #f5f5f5;
            padding: 20px;
        }

        h1 {
            color: #333;
        }

        table {
            width: 70%;
            border-collapse: collapse;
            background-color: #fff;
            margin-top: 20px;
        }

        table th, table td {
            border: 1px solid #ccc;
            padding: 10px;
        }

        table th {
            background-color: #3498db;
            color: #fff;
        }

        table td {
            background-color: #f9f9f9;
        }

        table tr:hover {
            background-color: #e0e0e0;
        }

        a {
            text-decoration: none;
            color: #3498db;
        }

        a:hover {
            text-decoration: underline;
        }
    </style>
</head>
<body>
    <div class="read-title"><h1>Read Records</h1></div>
    <div class="table">
        <table>
            <div class='table-row'>
                <tr>
                    <div class="table-data">    
                        <div class="data-item"><th>ID</th></div>
                        <div class="data-item"><th>Name</th></div>
                        <div class="data-item"><th>Phone Number</th></div>
                        <div class="data-item"><th>Email</th></div>
                        <div class="data-item"><th>Address</th></div>
                        <div class="data-item"><th>Profile Image</th></div>
                        <div class="data-item"><th>Action</th></div>
                    </div>
                </tr>
            </div>
            <?php
            
            foreach ($records as $record) {
                echo "<tr>";
                echo "<td>" . $record['id'] . "</td>";
                echo "<td>" . $record['name'] . "</td>";
                echo "<td>" . $record['phone_number'] . "</td>";
                echo "<td>" . $record['email'] . "</td>";
                echo "<td>" . $record['address'] . "</td>";
                echo "<td>";
                $images .= $profile_image.", ";
                $images = explode(", ", $record['profile_image']);
                foreach ($images as $image) {
                    echo "<img src='uploaded-images/" . $image . "' width='100'>&nbsp;";
                }
                echo "</td>";
    
                echo "<td><a href='delete.php?id=" . $record['id'] . "'>Delete</a> | <a href='update.php?id=" . $record['id'] . "'>Edit</a></td>";
                echo "</tr>";
            }
            ?>
        </table>
    </div>
    <div class="add-new-record">
        <a href="create.php" >Create New Record</a>
    </div>
</body>
</html>
