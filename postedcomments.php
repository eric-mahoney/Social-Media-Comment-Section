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
		<h1 class="title">Huh?</h1>

		<p class="main-info">Kirshner and Karpinski report that:<br>Students who used social networking sites while studying scored 20% lower on tests on tests and students who used social media had an average GPA of 3.06 versus non-users who had an average GPA of 3.62.<br>Source: Paul A Kirschner and Aryn C. Karpinski, "Facebook and Academic Perfomance</p>
		<hr>
		<h2>Comments</h2>
		<hr>
		<?php 

			// connect to SQL server - user and pass info redacted
			define("SERVER","SERVER-NAME-HERE");
			define("USER","USERNAME-HERE");
			define("PASS", "PASSWORD-HERE");
			define("DEFAULT_DB", "DEFAULT-DB-HERE");
			$login = @mysqli_connect(SERVER, USER, PASS, DEFAULT_DB); // login to mysql and surpress error messages using the @ operator

			// mysql query to select user,email, and comments from the users database
			$query = mysqli_query($login,"SELECT * FROM users");
			
			if($query){
				// while loop that runs while there's records in the database
				while($data = mysqli_fetch_assoc($query)){
			
		?>

		<!-- advanced escaping to use a PHP for-loop to echo out html-formatted comments -->
		<div class="comment-block">
			<p class="comment-name"><?php echo "Name: <a href='mailto:{$data['email']}'" . ">" . $data['name'] . "</a>"; ?></p>
			<p class="comment-comment"><?php echo "Comment: " . $data['comment']; ?></p>
		</div>

		<?php 

			}
		}

		?>
		<hr>
		<br>

		<a href='index.html'>Return Home</a><br>
		<a href='ascendedsort.php'>Sort Comments A-Z (by name)</a><br>
		<a href="descendedsort.php">Sort Comments Z-A (by name)</a><br>
		<p>Last Modified:</p>
			<?php

				// adds the filename as an easy to read variable.
				$filename = 'postedcomments.php';
				
				// echos back the date of when the file was last modified.
				echo date ("F d Y H:i:s.", filemtime($filename)); 
			?>
	</body>
</html>