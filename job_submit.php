<?php
##connecting db
$servername = "localhost";
$username = "root";
$password = "master";
$dbname = "job_db";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
echo "Connected successfully";

 
##declaring variables
$a = $_POST["first_name"];
$b = $_POST["last_name"];
$c = $_POST["idjobs"];

##inserting variables on db
$sql = "INSERT INTO user (first_name, last_name, idjobs)
VALUES ('".$a."','".$b."',".$c.")";

if ($conn->query($sql) === TRUE) {
    echo "New record created successfully";
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}

##printing something on screen
echo $a.$b;
echo $c;

?>