Drop TABLE ClassSection;

CREATE TABLE ClassSection(
	CS_Num int NOT NULL PRIMARY KEY,
	CS_Classroom varchar(5) DEFAULT "CS300",
	CS_MeetingDays varchar(255) DEFAULT "Tuesday, Thursday",
	CS_BeginningTime varchar(7) DEFAULT "10:00am",
	CS_EndingTime varchar(7) DEFAULT "12:00pm",
	CS_NumOfSeats int DEFAULT 30,
	CS_PSsn int NOT NULL,
	FOREIGN KEY (CS_PSsn) REFERENCES Professor(P_Ssn)
);