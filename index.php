<html>
	<head>
		<!-- Link to the CSS stylesheet -->
		<link rel="stylesheet" href="css/styles.css"></link>
	</head>
	<title>Project for CS332</title>
	<body>
		<h1>Database Project for CS332</h1>
		<div class="tab">
			<!-- 	class for CSS styling, on click listener calls function from tab.js  -->
			<button class="tablinks" onclick="openQuery(event, 'Professor')">Professor</button>
			<button class="tablinks" onclick="openQuery(event, 'Student')">Student</button>
		</div>
		
		<div id="Professor" class="tabcontent">
			<!--  action goes to the same webpage so the table will be shown in the same
				  page cause I think it looks better		   -->
			<form action="index.php" target="_self" method="post">
				<fieldset>
					<legend>Professor SSN</legend>
					SSN of Professor<br>
					<!-- name is there so in PHP we can see what the value of it is -->
					<input type="text" name="PSsn"><br><br>
					<input type="submit" name="btnProfSsn" class="submitButton" value="Submit">
				</fieldset>
			</form>
			
			<form action="index.php" target="_self" method="post">
				<fieldset>
					<legend>Grade in Course and Section Number</legend>
					Course Number<br>
					<input type="text" name="PCourseNum"><br>
					Section Number<br>
					<input type="text" name="PSectionNum"><br><br>
					<input type="submit" name="btnProfCourse" class="submitButton" value="Submit">
				</fieldset>
			</form>
			<!-- Link the php script for Professor from a different file -->
			<?php include 'php/Professor.php';?>
		</div>
		<div id="Student" class="tabcontent">
			<h3>This is the student database</h3>
			<?php include 'php/Student.php';?>
		</div>
	</body>
		<!-- Link to the javascript file -->
		<script src="js/tab.js"></script>
</html>