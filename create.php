<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    require_once "connection.php";
    $name = $_POST['name'];
    $phonenumber = $_POST['phonenumber'];
    $email = $_POST['email'];
    $address = $_POST['address'];
    $profile_image = $_POST['profile_image'];

    $sql = "INSERT INTO crud(name, phone_number, email, address, profile_image) VALUES ('$name', '$phonenumber', '$email', '$address', '$profile_image')";
    
    if (mysqli_query($conn, $sql)) {
        header('Location: read.php'); 
    } else {
        echo "Error: " . $sql . "<br>" . mysqli_error($conn);
    }
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Create Record</title>
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

        #submit{
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
        #reset{
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
    <h1>Create Record</h1>
    <div class="form">
        <form action="create.php" method="post" >
            <div class="form-group">
                <label for="name">Name:</label>
                <input type="text" id="name" name="name" required>
            </div>
          
            <div class="form-group">
                <label for="email">Email:</label>
                <input type="email" id="email" name="email" required>
            </div>
          
            <div class="form-group">
                <label for="phonenumber">Phone Number:</label>
                <input type="tel" id="phonenumber" name="phonenumber" required>
            </div>
          
            <div class="form-group">
                <label for="address">Address:</label>
                <input type="text" id="address" name="address" required>
            </div>
          
            <div class="form-group">
                <label for="profile">Profile Image:</label>
                <input type="file" id="profile_image" name="profile_image" accept="image/*" >
            </div>

            <div class="form-group">
                <input type="reset" id="reset" value="Reset Form">
            </div>
          
            <div class="form-group">
                <input type="submit" id="submit" value="Create Record">
            </div>
        </form>
    </div>
</body>
</html>

