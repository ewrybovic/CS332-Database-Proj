select count(*) as NumOfStudents, CS.CS_Num,CS.CS_Classroom, CS.CS_MeetingDays, CS.CS_BeginningTime, CS.CS_EndingTime
from EnrollmentRecord ER, ClassSection CS
where CS.CS_CourseNumber = REPLACE and
	  ER.ER_CourseSection = CS.CS_Num
group by CS.CS_Num;