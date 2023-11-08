
<?php   
        require_once "dbconnection.php";
        if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $id = $_POST['id'];
        $name = $_POST['name'];
        $phone_number = $_POST['phone_number'];
        $email = $_POST['email'];
        $address = $_POST['address'];
        
        $profile_image1 =
        $uploaded_images = array();
        if (isset($_FILES['profile_image']['name']) && is_array($_FILES['profile_image']['name'])) {
        foreach ($_FILES['profile_image']['name'] as $key => $image_name) {
            $target_directory = "uploadimages/";
            $target_file = $target_directory . $image_name;

            if (move_uploaded_file($_FILES['profile_image']['tmp_name'][$key], $target_file)) {
                $uploaded_images[] = $image_name;
            } else {
                echo "File upload failed for " . $image_name . ". Please check the upload directory";
            }
        }
    }
    $profile_image_list = implode(", ",$uploaded_images); ;


        $sql = "UPDATE contact_form SET name='$name', phone_number='$phone_number', email='$email', address='$address', profile_image='$profile_image_list' WHERE id=$id";
        if (mysqli_query($conn , $sql)) {
            header('Location: view.php');    
        } else {
            echo "Error: " . $sql . "<br>" . mysqli_error($conn);
        }
    }
?>

<!DOCTYPE html>
<html>
<head>
    <title>Update Page</title>
    <link  rel="stylesheet" type="text/css" href="css/style_form.css">
</head>
<body>
    <div class="main-div">
        <div class="container">
    
            <?php
            if (isset($_GET['id'])) {
                $id = $_GET['id'];
                $sql = "SELECT * FROM contact_form WHERE id = $id";
                $result = mysqli_query($conn, $sql);
                $row = mysqli_fetch_assoc($result);
            ?>
            <h2>Update Form</h2>
            <form id="update-form" method="post" action="update.php" >
                <ul>      
                    <li>
                        <div class="form_field">
                        <input type="hidden" name="id"  value="<?php echo $row['id']; ?>" require>
                        </div>
                    </li>
                    <li>
                        <div class="form_field">
                            <label for="name">Name :</label><br>
                            <input type="text" name="name" placeholder="Enter Your Name" value="<?php echo $row['name']; ?>" >
                        </div>
                    </li>
                    <li>
                        <div class="form_field">
                        <label for="email">E-mail Id :</label><br>
                        <input type="email" name="email" placeholder="Enter Your E-mail Id" value="<?php echo $row['email']; ?>">
                        </div> 
                    </li>
                    <li>
                        <div class="form_field">
                        <label for="phone_number">Mobile Number :</label><br>
                        <input type="tel" name="phone_number" placeholder="Enter Your Mobile Number" value="<?php echo $row['phone_number']; ?>">
                        </div>
                    </li>
                    <li>
                        <div class="form_field">
                        <label for="address">Address :</label><br>
                        <input type="text" name="address" placeholder="Enter Your Address" value="<?php echo $row['address']; ?>">
                        </div>
                    </li>
                    <li>
                        <div class="form_field">
                        <label for="profile_image">Profile Picture :</label><br>
                        <input type="file" name="profile_image[]" value="<?php echo $row[$profile_image_list]; ?>" accept="image/*" multiple >
                        </div>
                    </li>
                    <li>    
                        <div class="btn">
                        <input type="submit" name="submit" value="Update">
                        </div>
                    </li>
                </ul>
            </form>
            <?php
            }else{
                echo "Record not found!";
            }
            ?>
       </div>
    </div>
</body>
</html>