<html>
	<head>
		<link rel="stylesheet" href="css/styles.css"></link>
	</head>
	<title>Project for CS332</title>
	<body>
		<h1>Database Project for CS332</h1>
		<div class="tab">
			<button class="tablinks" onclick="openQuery(event, 'Professor')">Professor</button>
			<button class="tablinks" onclick="openQuery(event, 'Student')">Student</button>
		</div>
		
		<div id="Professor" class="tabcontent">
			<form action="index.php" target="_self" method="post">
				<fieldset>
					<legend>Professor SSN</legend>
					SSN of Professor<br>
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
			<?php include 'php/Professor.php';?>
		</div>
		<div id="Student" class="tabcontent">
			<h3>This is the student database</h3>
			<?php include 'php/Student.php';?>
		</div>
	</body>
		<script src="js/tab.js"></script>
</html>