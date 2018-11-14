CREATE TABLE Student(
	S_Cwid int NOT NULL PRIMARY KEY,
	S_FName varchar(255) DEFAULT "Test",
	S_LName varchar(255) DEFAULT "Student",
	S_Address varchar(255) DEFAULT "800 N State College, 90630, CA",
	S_Telephone varchar(255) DEFAULT "(999)999-9999",
	S_Major varchar(4) DEFAULT "CPSC",
	S_Minor varchar(255) DEFAULT "No Minor"
);