<?php

	if (isset($_POST['btnStuCourse']) || isset($_POST['btnStuCwid'])){
		// Crazy way to get the Professor div to be selected on load
		?>
		<script language="javascript">
			document.getElementById("Student").style.display = "block";
		</script>
		<?php
		// Back to the php script
		
		// Connect to the mysql server
		$hostName = "uranus.ecs.fullerton.edu";
		$userName = "cs332d21";
		$password = "eeteezoo";
		$link=mysql_connect($hostName, $userName, $password) or die("Unable to connect to host: $hostName");
		 
		//Connect to the database
		$dbName = $userName;
		$didConnectToDB = mysql_select_db($dbName, $link) or die("Unable to select database $dbName");
		 
	}
	
	if (isset($_POST['btnStuCourse'])){
		if (!empty($_POST['SCNum'])){
			// Read the sql file cause i am lazy
			$SQL = file_get_contents("sql/StudentA.sql");
			// Replace with the SSN value
			$SQL = str_replace("REPLACE", (string)$_POST['SCNum'], $SQL);
			// Run the query
			$Query = mysql_query($SQL, $link) or die("Unable to run query $SQL");
			// disconnect from the sql server
			$didDisconnect = mysql_close($link);
			$NumOfRows = mysql_numrows($Query);
			if ($NumOfRows > 0){
				echo "<p> Sections for course: ", $_POST['SCNun'];
				echo "<table border='1'><tr><td>Section Number</td><td>Classroom</td><td>Meeting Days</td><td>Beginning Time</td><td>Ending Time</td><td>Number of Students</td></tr>";
				
				// Loop through the rows of the query
				for($i; $i<$NumOfRows; $i++){
					echo "<tr>";
					//echo "<td>",mysql_result($Query, $i, "Sections"),"</td>";
					echo "<td>",mysql_result($Query, $i, "CS.CS_Num"),"</td>";
					echo "<td>",mysql_result($Query, $i, "CS.CS_Classroom"),"</td>";
					echo "<td>",mysql_result($Query, $i, "CS.CS_MeetingDays"),"</td>";
					echo "<td>",mysql_result($Query, $i, "CS.CS_BeginningTime"),"</td>";
					echo "<td>",mysql_result($Query, $i, "CS.CS_EndingTime"),"</td>";
					echo "<td>",mysql_result($Query, $i, "NumOfStudents"),"</td>";
					echo "</tr>";
				}
				
				echo "</table>";
			}
			else{
				echo "<p> No Course found</p>";
			}
		}
		else{
			echo "<p> Please fill out the Course Number </p>";
		}
	}
	else if (isset($_POST['btnStuCwid'])){
		if (!empty($_POST['SCwid'])){
			// Read the sql file cause i am lazy
			$SQL = file_get_contents("sql/StudentB.sql");
			// Replace with the SSN value
			$SQL = str_replace("REPLACE", (string)$_POST['SCwid'], $SQL);
			// Run the query
			$Query = mysql_query($SQL, $link) or die("Unable to run query $SQL");
			// disconnect from the sql server
			$didDisconnect = mysql_close($link);
			$NumOfRows = mysql_numrows($Query);
			if ($NumOfRows > 0){
				echo "<p> Class list for Student with CWID: ", $_POST['SCwid'];
				echo "<table border='1'><tr><td>Class Title</td><td>Grade</td></tr>";
				
				// Loop through the rows of the query
				for($i; $i<$NumOfRows; $i++){
					echo "<tr>";
					echo "<td>",mysql_result($Query, $i, "C.C_Title"),"</td>";
					echo "<td>",mysql_result($Query, $i, "ER.Er_Grade"),"</td>";
					echo "</tr>";
				}
				
				echo "</table>";
			}
			else{
				echo "<p> No Student Found</p>";
			}
		}
		else{
			echo "<p> Please fill out the form first</p>";
		}
	}
	
	
?>