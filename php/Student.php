<?php
	// Connect to the mysql server
	$hostName = "uranus.ecs.fullerton.edu";
	$userName = "cs332d21";
	$password = "eeteezoo";
	$link=mysql_connect($hostName, $userName, $password) or die("Unable to connect to host: $hostName");
	 
	//Connect to the database
	$dbName = $userName;
	$didConnectToDB = mysql_select_db($dbName, $link) or die("Unable to select database $dbName");
	 
	$SQL = "SELECT * FROM Student";
	$Students = mysql_query($SQL, $link);
	echo "<p>Student's info.";
	echo "<table border = '1'><tr><td>Student SSN</td><td>Student First Name</td><td>Student Last Name</td><td>Student Address</td><td>Student Telephone</td><td>Student Major</td><td>Student Minor</td></tr>";
	for ($i = 0; $i < mysql_numrows($Students); $i++){
		echo "<tr>";
		echo "<td>",mysql_result($Students, $i, "S_Cwid"),"</td>";
		echo "<td>",mysql_result($Students, $i, "S_FName"),"</td>";
		echo "<td>",mysql_result($Students, $i, "S_LName"),"</td>";
		echo "<td>",mysql_result($Students, $i, "S_Address"),"</td>";
		echo "<td>",mysql_result($Students, $i, "S_Telephone"),"</td>";
		echo "<td>",mysql_result($Students, $i, "S_Major"),"</td>";
		echo "<td>",mysql_result($Students, $i, "S_Minor"),"</td>";
		echo "</tr>";
	}
	echo "</table>";
	
	// disconnect from the sql server
	$didDisconnect = mysql_close($link);
	
?>