<?php
     $target_dir = "./upload/";
     $name = $_POST['name'];
     print_r($_FILES);
     $path= basename($_FILES["file"]["name"]
     $target_file = $target_dir . basename($_FILES["file"]["name"]);

     move_uploaded_file($_FILES["file"]["tmp_name"], $target_file);

     //write code for saving to database 
     include_once "config.php";

     // Create connection
     $conn = new mysqli($servername, $username, $password, $dbname);
     // Check connection
     if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
     }

     $sql = "INSERT INTO MyData (name,filename) VALUES ('".$name."','".$path."')";

     if ($conn->query($sql) === TRUE) {
         echo json_encode($_FILES["file"]); // new file uploaded
     } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
     }

     $conn->close();
?>