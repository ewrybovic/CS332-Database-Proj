select C.C_Title, ER.ER_Grade
from Course C, ClassSection CS, EnrollmentRecord ER
where ER.ER_SCwid = REPLACE and
	  CS.CS_Num = ER.ER_CourseSection and
	  C.C_Num = CS.CS_CourseNumber