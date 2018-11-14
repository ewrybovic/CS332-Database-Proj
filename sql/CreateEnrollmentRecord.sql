DROP TABLE EnrollmentRecord;

CREATE TABLE EnrollmentRecord(
	ER_SCwid int NOT NULL,
	ER_CourseSection int NOT NULL,
	ER_Grade varchar(2) NOT NULL,
	FOREIGN KEY (ER_SCwid) REFERENCES Student(S_Cwid),
	FOREIGN KEY (ER_CourseSection) REFERENCES ClassSection(CS_Num)
);