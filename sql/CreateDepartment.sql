DROP TABLE Department;

CREATE TABLE Department(
	D_Id int NOT NULL PRIMARY KEY,
	D_Name varchar(255) DEFAULT "Department Name",
	D_Telephone varchar(15) DEFAULT "(999)999-9999",
	D_Location varchar(225) DEFAULT "Computer Science Building",
	D_Ssn int NOT NULL,
    FOREIGN KEY (D_Ssn) REFERENCES Professor(P_Ssn)
);