DROP TABLE Professor;

CREATE TABLE Professor(
	P_Ssn int NOT NULL PRIMARY KEY,
	P_Name varchar(255) DEFAULT "No Name",
	P_StreetAddress varchar(255) DEFAULT "No Address",
	P_City varchar(255) DEFAULT "No City",
	P_ZipCode varchar(5) DEFAULT "00000",
	P_Telephone varchar(15) DEFAULT "No Number", 
	P_Sex boolean DEFAULT 0,
	P_Salary int DEFAULT 0,
	P_Degrees varchar(255) DEFAULT "No Degrees"
);