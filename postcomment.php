<!-- 
Name: Eric Mahoney
Project: Social Media Network
Date: 12/14/18
-->

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">  
<html xmlns="http://www.w3.org/1999/xhtml">
	<head>
		<title>Eric Mahoney - Social Network</title>
		<link rel="stylesheet" href="style.css">
	</head>
	<body>
		<hr>
		<?php

			// gets the form data we need
			$file = 'file.txt';
			$name = $_POST['name'];
			$email = $_POST['email'];
			$comment = $_POST['comment'];

			// stores the data from the form into an array
			// $data = array($name,$email,$comment);
			$data = $name . ',' . $email . ',' . $comment . "\n"; 


			// connect to SQL server - user and pass info redacted
			define("SERVER","SERVER-NAME-HERE");
			define("USER","USERNAME-HERE");
			define("PASS", "PASSWORD-HERE");
			define("DEFAULT_DB", "DEFAULT-DB-HERE");
			$login = @mysqli_connect(SERVER, USER, PASS, DEFAULT_DB); // login to mysql and surpress error messages using the @ operator

			// if the login was successful, then it will echo a message indicating success, else it will echo an error message
			if($login){
				echo 'DB login successful<br>';
			}else{
				die("DB login not successful:\nError:" . mysqli_connect_error() . "<br>");
			}

			// MySQL query for inserting comments into database -- does not insert if record is already in DB
			$query = "INSERT IGNORE INTO users(name, email, comment) VALUES('$name','$email','$comment')";

			// creates a query with the info from our login and query variables.
			if(mysqli_query($login,$query)){
				echo 'Successfully added comments to database<br>';
			}else{
				echo 'One per person! You\'ve already left comments for this posting.<br>';
			}

			// closes the mysql connection
			mysqli_close($login);

			// echos out to the user their name and comment
			echo "<p>Name: {$name} </p> ";
			echo "<p>Comments: {$comment} </p>";
		
		?>
		<hr>
		<a href="postedcomments.php">View Posted Comments</a>
		<a href='index.html'>Return Home</a>
		<p>Last Modified:</p>
			<?php

				// adds the filename as an easy to read variable.
				$filename = 'postcomment.php';
				
				// echos back the date of when the file was last modified.
				echo date ("F d Y H:i:s.", filemtime($filename)); 
			?>
	</body>
</html>