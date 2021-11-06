
<!--------------------- PHP : connect to MYSQL database --------------------->
<?php
	$servername = "localhost";
	$username = "erinbea1_admin";
	$password = "password1234";
	$dbname = "erinbea1_friendsgiving";

	// Create connection
	$conn = new mysqli($servername, $username, $password, $dbname);

	// Check connection
	if ($conn->connect_error) {
	    die("Connection failed: " . $conn->connect_error);
	}
	$sql = "SELECT * FROM Guest";
	$result = $conn->query($sql);
?>


<!DOCTYPE html>

<html lang="en">
  <head>
  	<meta http-equiv="Cache-Control" content="no-store" />
  	<meta name="viewport" content="width=device-width, initial-scale=1">
    <meta charset="utf-8">
	<!-- Latest compiled and minified CSS -->
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/css/bootstrap.min.css">
	<!-- jQuery library -->
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
	<!-- Latest compiled JavaScript -->
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/js/bootstrap.min.js"></script>
	<link rel="stylesheet" href="styles.css">
</head>

<body>
	<div id="wholebody" align="center" class="container">
		<div class="jumbotron">
			<div class="page-header">
				<h1>Friendsgiving Food List</h1>
			</div>
			
			<div class="container">
				<h3>What to bring:</h3>
				<dl>
					<dt>1. An empty stomach</dt>
					<dt>2. Food to share! (for ~13 people)</dt>
				</dl>
			</div>
		</div>
		<form action="insert.php" method="post">
		<div class="well">
			<strong>Name:</strong> <input type="text" name="fullname" required/><br><br>
			<strong> Course:</strong><br>
				 	<input type="radio" name="course" value="Sides" checked required class="radiobutton"> Side<br>
					<input type="radio" name="course" value="Appetizer" class="radiobutton"> Appetizer<br>
				  	<input type="radio" name="course" value="Dessert" class="radiobutton"> Dessert<br>
				  	<input type="radio" name="course" value="Drinks" class="radiobutton"> Drink<br>
				  	<br>
			<strong> Possible Food Idea - if you don't know yet, just leave it blank! -:</strong>  <input type="text" name="foodcomment"/><br><br>
			<strong> Fatal Allergies?</strong> <input type="text" name="allergies"> <br><br>

			<input type="submit" class="btn-lg" />
		</div>
		</form><br><br>

		<div class="well">
			<h3>Who's Bringing What:</h3><br>
			<div class="container table-responsive">
				<table class="table">
					<thead>
						<th>Name</th>
						<th>Course</th>
						<th>Possible Food Idea</th>
						<th>Fatal Allergy</th>
					</thead>
					<tbody>
						<?php
						if ($result->num_rows > 0) {
						    // output data of each row
						    while($row = $result->fetch_assoc()) {
						?>
						<?php
						        echo "	<tr>
						        		<td>".$row["GuestName"]."</td>
						        		<td>".$row["Course"]." </td>
						        		<td>".$row["FoodComment"]."</td>
						        		<td>".$row["Allergies"]."</td>
						        		</tr>";
						    }
						} else {
						    echo "0 results";
						}
						$conn->close();
						?>
					</tbody>
				</table>
			</div>
		</div>

	</div>
</body>

</html>
