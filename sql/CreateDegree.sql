DROP TABLE Degree;
/* IDK if this is right*/
CREATE TABLE Degree(
	D_Ssn int NOT NULL,
	D_College varchar(255),
	D_Type varchar(3),
	D_Major varchar(255),
	FOREIGN KEY (D_Ssn) REFERENCES Professor(P_Ssn)
);