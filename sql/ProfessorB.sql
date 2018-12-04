SELECT E.ER_Grade, Count(E.ER_Grade) as NumOfGrade, C.C_Title
from EnrollmentRecord E, ClassSection CS, Course C
where E.ER_CourseSection = CS.CS_Num and
	  CS.CS_CourseNumber = C.C_Num and
	  C.C_Num = REPLACE_CLASS and
	  CS.CS_Num = REPLACE_SECTIION 
group by E.ER_Grade;