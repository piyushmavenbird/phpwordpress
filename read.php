<?php
require_once "connection.php";
$sql = "SELECT * FROM crud";
$result = mysqli_query($conn, $sql);

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
            while ($row = mysqli_fetch_assoc($result)) {
                echo "<tr>";
                echo "<td>" . $row['id'] . "</td>";
                echo "<td>" . $row['name'] . "</td>";
                echo "<td>" . $row['phone_number'] . "</td>";
                echo "<td>" . $row['email'] . "</td>";
                echo "<td>" . $row['address'] . "</td>";
                echo "<td>" . $row['profile_image'] . "</td>";
                echo "<td><a href='delete.php?id=" . $row['id'] . "'>Delete</a> | <a href='update.php?id=" . $row['id'] . "'>Edit</a></td>";
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
<?php
    // Check if the profile_image column has a valid image path
    if (!empty($row['profile_image'])) {
        // Assuming that 'profile_image' contains the image file path in the database
        $imagePath = $row['profile_image'];
        // Output an <img> tag to display the image
        echo "<img src='$imagePath' alt='Profile Image' style='max-width: 100px; max-height: 100px;'>";
    } else {
        // Display a placeholder if no image is available
        echo "No Image Available";
    }
    ?>
</td>