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
$j = $_POST["job_position"];


##selecting before inserting on db
$sql = "SELECT idjobs, job_position FROM jobs WHERE UCASE(job_position)='".STRTOUPPER($j)."'";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    // output data of each row
    echo "This job position already exists.";
} 
else {
	##inserting variables on db
	$sql = "INSERT INTO jobs (job_position) VALUES ('".$j."')";

	if ($conn->query($sql) === TRUE) {
	    echo "New record created successfully";
	} else {
	    echo "Error: " . $sql . "<br>" . $conn->error;
	}
}





?>