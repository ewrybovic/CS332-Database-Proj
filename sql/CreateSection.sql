Drop TABLE ClassSection;

CREATE TABLE ClassSection(
	CS_Num int NOT NULL PRIMARY KEY,
	CS_Classroom varchar(5),
	CS_MeetingDays varchar(255),
	CS_BeginningTime varchar(7),
	CS_EndingTime varchar(7),
	CS_NumOfSeats int,
	CS_PSsn int NOT NULL,
	CS_CourseNumber int NOT NULL,
	FOREIGN KEY (CS_PSsn) REFERENCES Professor(P_Ssn),
	FOREIGN KEY (CS_CourseNumber) REFERENCES Course(C_Num),
	UNIQUE(CS_Num)
);