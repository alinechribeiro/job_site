<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<title>Connecting DB to Website</title>
	<link rel="stylesheet" href="css/mystyle.css">
	<script src=""></script>
</head>
<body>

	<div class="container">
		Welcome to our site: more time you dedicate for training less blood you loose on battle!
	</div>
	<div class="t1">
		<form action="job_submit.php" method="post" accept-charset="utf-8">
			First of all: Lets connect DB to Website:
			Your first name: <input type="text" name="first_name">
			Your last name: <input type="text" name="last_name">
			Your job position/search: 
			<select name="idjobs" multiple>
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

				##selecting before inserting on db
				$sql = "SELECT idjobs, job_position FROM jobs";
				$result = $conn->query($sql);

				$color=true;

				if ($result->num_rows > 0) {
				    // output data of each row
				    while($row = $result->fetch_assoc()) {
				    	if($color) {
				    		echo "<option class='colorful' ";
				    	}
				    	else{
				    		echo "<option ";
				    	}
				   		$color=!$color;

				        echo " value='" . $row['idjobs']. "'>" . $row['job_position'] . "</option>";
				    }
				} else {
				    echo "0 results";
				}

				?>

			</select>
			<button type="submit">Go!</button>

		</form>
		
	</div>
	
</body>
</html>

