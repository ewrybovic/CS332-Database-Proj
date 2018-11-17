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
			$Test = file_get_contents("sql/ProfessorA.sql");
			// Replace with the SSN value
			$Test = str_replace("REPLACE", (string)$_POST['PSsn'], $Test);
			// Run the query
			$Professor = mysql_query($Test, $link) or die("Unable to run query $Test");
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
			echo "Good Job!";
		}
		else{
			echo "<h1>Fill out every location please!</h1>";
		}
	}
	
	// disconnect from the sql server
	$didDisconnect = mysql_close($link);
?>