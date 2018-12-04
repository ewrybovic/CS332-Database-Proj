<?php
	// Connect to the mysql server
	$hostName = "uranus.ecs.fullerton.edu";
	$userName = "cs332d21";
	$password = "eeteezoo";
	$link=mysql_connect($hostName, $userName, $password) or die("Unable to connect to host: $hostName");
	 
	//Connect to the database
	$dbName = $userName;
	$didConnectToDB = mysql_select_db($dbName, $link) or die("Unable to select database $dbName");
	
	if (isset($_POST['btnProfSsn']) || isset($_POST['btnProfCourse'])){
		// Crazy way to get the Professor div to be selected on load
		?>
		<script language="javascript">
			document.getElementById("Professor").style.display = "block";
		</script>
		<?php
		// Back to the php script
	}
	
	// Check which button was pressed
	if (isset($_POST['btnProfSsn'])){
		// Check if the input is empty
		if (!empty($_POST['PSsn'])){
			// Read the sql file cause i am lazy
			$SQL = file_get_contents("sql/ProfessorA.sql");
			// Replace with the SSN value
			$SQL = str_replace("REPLACE", (string)$_POST['PSsn'], $SQL);
			// Run the query
			$Professor = mysql_query($SQL, $link) or die("Unable to run query $SQL");
			$NumOfRows = mysql_numrows($Professor);
			// If the number of rows is 0, that means the query returned empty
			if ($NumOfRows > 0){
				echo "<p>Class Schedual for ",mysql_result($Professor,0,"P.P_Name"),"</p>";
				// Make a table to organize the data better
				echo "<table border='1'><tr><td>SSN</td><td>Course Title</td><td>Classroom</td><td>Meeting Days</td><td>Beginning Time</td><td>Ending Time</td></tr>";
				for($i = 0; $i<mysql_numrows($Professor);$i++){
					echo "<tr>";
					echo "<td>",mysql_result($Professor,$i,"P.P_Ssn"),"</td>";
					echo "<td>",mysql_result($Professor,$i,"C.C_Title"),"</td>";
					echo "<td>",mysql_result($Professor,$i,"CS.CS_Classroom"),"</td>";
					echo "<td>",mysql_result($Professor,$i,"CS.CS_MeetingDays"),"</td>";
					echo "<td>",mysql_result($Professor,$i,"CS.CS_BeginningTime"),"</td>";
					echo "<td>",mysql_result($Professor,$i,"CS.CS_EndingTime"),"</td>";
					echo "</tr>";
				}
				
				echo "</table><br>";
			}
			else{
				echo "<h1>No Professor found</h1>";
			}
		}
		else{
			echo "<h1>Need SSN</h1>";
		}
	}
	else if (isset($_POST['btnProfCourse'])){
		
		if (!empty($_POST['PCourseNum']) && !empty($_POST['PSectionNum'])){
			// Read the SQL file 
			$SQL = file_get_contents("sql/ProfessorB.sql");
			
			// Replace the two tags with the values the user gives
			$SQL = str_replace("REPLACE_CLASS", (string)$_POST['PCourseNum'], $SQL);
			$SQL = str_replace("REPLACE_SECTIION", (string)$_POST['PSectionNum'], $SQL);
			
			// Run the query
			$Query = mysql_query($SQL, $link) or die("Unable to run query $SQL");
			$NumOfRows = mysql_numrows($Query);
			if ($NumOfRows > 0){
				echo "<p> Grades for ", mysql_result($Query, 0, "C.C_Title"),"</p>";
				echo "<table border='1'><tr><td>Grade</td><td>Number of Grade</td></tr>";
				
				// Loop through the rows of the query
				for($i; $i<$NumOfRows; $i++){
					echo "<tr>";
					echo "<td>",mysql_result($Query, $i, "E.ER_Grade"),"</td>";
					echo "<td>",mysql_result($Query, $i, "NumOfGrade"),"</td>";
					echo "</tr>";
				}
				
				echo "</table><br>";
			}
			else{
				echo "<h1> Not a Valid Query</h1>";
			}
			
		}
		else{
			echo "<h1>Fill out every location please!</h1>";
		}
	}
	
	// disconnect from the sql server
	$didDisconnect = mysql_close($link);
?>