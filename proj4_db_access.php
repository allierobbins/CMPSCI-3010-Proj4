<!DOCTYPE html>
<html lang = "en">
	<head>
		<title> Database Access to Customer Names & Addresses </title>
		<meta charset = "utf-8" />
	</head>

	<body>
		<?php>
		//connect to MySQL
		$db = musqli_connect("localhost", "cs3010", "30User10", "cs3010");
		if (mysqli_connect_errno()) {
			print "Connect Failed: " . mysqli_connect_error();
			exit();
		}
		
		$cpuname = $_POST['cpuname'];
		$cpuspeed = $_POST['cpuspeed'];
		$memspeed = $_POST['memspeed'];
		
		$result = "SELECT * FROM [$db] WHERE name = $cpuname AND cpuspeed = $cpuspeed AND memspeed = $memspeed";
		
		// Display the results in a table

		print "<table><caption> <h2> Database Results </h2> </caption>";
		print "<tr align = 'center'>";

		// Get the number of rows in the result, as well as the first row
		//  and the number of fields in the rows

		$numRows = mysql_num_rows($result);
		$row = mysql_fetch_array($result);
		$numFields = mysql_num_fields($result);

		// Produce the column labels

		$keys = array_keys($row);
		for ($index = 0; $index < $numFields; $index++) 
			print "<th>" . $keys[2 * $index + 1] . "</th>";

		print "</tr>";

		// Output the values of the fields in the rows

		for ($rowNum = 0; $rowNum < $numRows; $rowNum++) {
			print "<tr align = 'center'>";
			$values = array_values($row);
			for ($index = 0; $index < $numFields; $index++) {
				$value = htmlspecialchars($values[2 * $index + 1]);
				print "<th>" . $value . "</th> ";
			}

			print "</tr>";
			$row = mysql_fetch_array($result);
		}
		print "</table>";
			?>
	</body>
</html>