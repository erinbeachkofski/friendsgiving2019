<html>
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
		<?php

			$servername = "localhost";
			$username = "erinbea1_admin";
			$password = "Variety#203";
			$dbname = "erinbea1_friendsgiving";

			// Create connection
			$con = new mysqli($servername, $username, $password, $dbname);

			if (!$con)
				{
					die('Could not connect: ' . mysql_error());
				}

			$sql="INSERT INTO Guest VALUES ('$_POST[fullname]', '$_POST[course]', '$_POST[foodcomment]', '$_POST[allergies]')";


			$query = $con->query($sql);

			echo "<div class='jumbotron' align='center'><h2>$_POST[fullname]'s entry added. See you on Sunday, November 24th from 5-10pm!!</h2></div>";

			$sql = "SELECT * FROM Guest";
			$result = $con->query($sql);
		?>

		<div class="well" align="center">
			<h3><strong>Who's Bringing What:</strong></h3><br>
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
						$con->close();
						?>
					</tbody>
				</table>
			</div>
		</div>
	</body>

</html>

