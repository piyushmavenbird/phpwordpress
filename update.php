<?php


if ($_SERVER["REQUEST_METHOD"] == "POST") {
    require_once "connection.php";
    $id = $_POST['id'];
    $name = $_POST['name'];
    $phonenumber = $_POST['phonenumber'];
    $email = $_POST['email'];
    $address = $_POST['address'];
    $profile_image = $_POST['profile_image'];

    $sql = "UPDATE crud SET name='$name', phone_number='$phonenumber', email='$email', address='$address', profile_image='$profile_image' WHERE id=$id";

    if (mysqli_query($conn, $sql)) {
        header('Location:read.php'); 
    } else {
        echo "Error: " . $sql . "<br>" . mysqli_error($conn);
    }
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Update Record</title>
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

        .form-group {
            margin: 10px 0;
        }

        label {
            display: block;
            font-weight: bold;
        }

        input[type="text"],
        input[type="email"],
        input[type="tel"] {
            width: 30%;
            padding: 10px;
            border: 1px solid #ccc;
            border-radius: 5px;
            margin-top: 5px;
        }

        input[type="file"] {
            width: 100%;
            margin-top: 5px;
        }

        #submit {
            background-color: #3498db;
            color: #fff;
            border: none;
            border-radius: 5px;
            padding: 10px 20px;
            cursor: pointer;
        }

        #submit:hover {
            background-color: #2980b9;
        }

        #reset {
            background-color: #3498db;
            color: #fff;
            border: none;
            border-radius: 5px;
            padding: 10px 20px;
            cursor: pointer;
        }

        #reset:hover {
            background-color: #2980b9;
        }
    </style>
</head>
<body>
    
    <?php
    if (isset($_GET['id'])) {
        $id = $_GET['id'];
        $sql = "SELECT * FROM crud WHERE id = $id";
        $result = mysqli_query(mysqli_connect('db', 'wordpress', 'wordpress', 'wordpress'), $sql);
        $row = mysqli_fetch_assoc($result);
    ?>
    <form method="post" action="update.php">
        <div class="update-form-group">
            <input type="hidden" name="id" value="<?php echo $row['id']; ?>">
        </div>
        <div class="update-form-group">
            <label>Name:</label>
            <input type="text" name="name" required value="<?php echo $row['name']; ?>"><br>
        </div>
        <div class="update-form-group">
            <label>Phone Number:</label>
            <input type="text" name="phonenumber" value="<?php echo $row['phone_number']; ?>"><br>
        </div>
        <div class="update-form-group">
            <label>Email:</label>
            <input type="text" name="email" value="<?php echo $row['email']; ?>"><br>
        </div>
        <div class="update-form-group">
            <label>Address:</label>
            <input type="text" name="address" value="<?php echo $row['address']; ?>"><br>
        </div>
        <div class="update-form-group">
            <label>Profile Image:</label>
            <input type="file" name="profile_image" accept="image/*" value="<?php echo $row['profile_image']; ?>"><br>
        </div>
        <div class="update-form-group">
            <input type="submit" id="submit"value="Update Record">
            <input type="reset" id="reset" value="Reset Form">
        </div>
    </form>
    <?php
    } 
    ?>
</body>
</html>
