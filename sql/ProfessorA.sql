select P.P_Name, P.P_SSN, CS.CS_Classroom, CS.CS_MeetingDays, CS.CS_BeginningTime, CS.CS_EndingTime
from Professor P, Course C, ClassSection CS
where P.P_Ssn = REPLACE and P.P_Ssn = CS_PSsn;