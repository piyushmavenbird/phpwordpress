<?php

    $conn = mysqli_connect('db', 'wordpress', 'wordpress', 'wordpress');
    
    if ($conn === false) {
        die("ERROR: Could not connect. " . mysqli_connect_error());
    }

?>
