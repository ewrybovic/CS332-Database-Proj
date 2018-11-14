DROP TABLE Course;

CREATE TABLE Course(
	C_Num int NOT NULL PRIMARY KEY,
	C_Title varchar(255) DEFAULT "No Title",
	C_Textbook varchar(255) DEFAULT "No Textbook",
	C_PreReqs varchar(255) DEFAULT "NO PeeReqs",
	C_DepartmentId int NOT NULL,
	FOREIGN KEY (C_DepartmentId) REFERENCES Department(D_Id)
);