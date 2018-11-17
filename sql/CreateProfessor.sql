DROP TABLE Professor;

CREATE TABLE Professor(
	P_Ssn int NOT NULL PRIMARY KEY,
	P_Name varchar(255) DEFAULT "No Name",
	P_StreetAddress varchar(255) DEFAULT "No Address",
	P_City varchar(255) DEFAULT "No City",
	P_State varchar(2) DEFAULT "CA",
	P_ZipCode varchar(5) DEFAULT "00000",
	P_AreaCode SMALLINT DEFAULT 123,
	P_Telephone MEDIUMINT DEFAULT 1234567, 
	P_Sex boolean DEFAULT 0,
	P_Title varchar(255) DEFAULT "Professor",
	P_Salary int DEFAULT 0
	/*P_Degrees varchar(255) Degrees now stored in seperate table */
);