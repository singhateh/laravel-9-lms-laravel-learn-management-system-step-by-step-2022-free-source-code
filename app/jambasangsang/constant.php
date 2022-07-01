<?php


//  Will add features later

class constPerPageNumber
{
    const All = 100000000;
    const Five = 5;
    const Ten = 10;
    const Fifteen = 15;
    const TwentyFive = 25;
    const Fifty = 50;
    const SeventyFive = 75;
    const Hundred = 100;
}

class constPerPageWord
{
    const All = 'All';
    const Five = 'Five';
    const Ten = 'Ten';
    const Fifteen = 'Fifteen';
    const TwentyFive = 'TwentyFive';
    const Fifty = 'Fifty';
    const SeventyFive = 'SeventyFive';
    const Hundred = 'Hundred';
}

class constPayPalStatus
{
    const PENDING = 0;
    const IN_PROCESS = 1;
    const SUCCESS = 2;
    const CANCEL = 3;
    const ERROR = 4;
}


class constStatus
{
    const InActive = 0;
    const Active = 1;
    const Pending = 2;
    const Banned = 3;
    const Archive = 4;
}

class constTitle
{
    const Mr = 0;
    const Dr = 1;
    const Mrs = 2;
    const Miss = 3;
    const Sir = 4;
    const Prof = 5;
    const Nurse = 6;
    const Madam = 7;
}



class constGender
{
    const Male = 1;
    const Female = 0;
}


class constCurrentSession
{
    const Yes = 1;
    const No = 0;
}


class constPath
{

    const CourseImage  = '/jambasangsang/assets/courses/images/';
    const UserImage  = '/jambasangsang/assets/users/images/';
    const EventImage  = '/jambasangsang/assets/events/images/';
    const SystemLogo  = '/jambasangsang/assets/system/logos/';
    const NewsImage  = '/jambasangsang/assets/news/images/';
    const CategoryImage  = '/jambasangsang/assets/categories/images/';
    const LessonImage  = '/jambasangsang/assets/lessons/images/';
    const SliderImage  = '/jambasangsang/assets/sliders/images/';
    const DefaultImage  = '/jambasangsang/placeholder.png';
}

class constFilePrefix
{
    const UserProfilePhoto = 'profile_';
    const UserProofPhoto = 'proof_';
    const StaffPhoto = 'staff_';
    const StudentPhoto = 'staff_';
}


// Patient type
class constPatientType
{
    const Is_OPD = 1; // is out patient
    const Is_IPD = 2; // is in patient
}

// Gender
class constGenderValue
{
    const Male = 1;
    const Female = 0;
}

// Gender Value
class constGenderText
{
    const MaleText =  'Male';
    const FemaleText = 'Female';
}

// Gender Value
class constDepartmentType
{
    const Empty =  0;
    const Doctor =  1;
    const Nurse =   2;
}

// Enquiry Status
class constEnquiryStatus
{
    const Lost = 0;
    const Lead = 1;
    const Member = 2;
}

//Follow Up Status
class constFollowUpStatus
{
    const Pending = 0;
    const Done = 1;
}

//Follow Up By
class constFollowUpBy
{
    const Call = 0;
    const SMS = 1;
    const Personal = 2;
}

// Payment status
class constPaymentStatus
{
    const Unpaid = 0;
    const Paid = 1;
    const Partial = 2;
    const Overpaid = 3;
}

// Cheque status
class constChequeStatus
{
    const Received = 0;
    const Deposited = 1;
    const Cleared = 2;
    const Bounced = 3;
    const Reissued = 4;
}

// Doctor Order status
class constOrderStatus
{
    const Is_New = 0; // the order is new from the doctor or nurse
    const Is_Acknowledged = 1; // the pharmacy acknowledged the request
    const Is_Pending = 2; // Payment is pending means on process
    const Is_Processing = 3; //Send patient to the accountant to pay
    const Is_Completed = 4; // payment complete return back to the pharmacy to collect the medicine
    const Is_Cancelled = 5; // payment complete return back to the pharmacy to collect the medicine
}

// Appointment status
class constAppointmentStatus
{
    const Is_New = 0; // the order is new from the doctor or nurse
    const Is_Accepted = 1; // the pharmacy acknowledged the request
    const Is_Rejected = 2; // the pharmacy acknowledged the request
    const Is_Cancelled = 3; // Payment is pending means on process
    const Is_Rescheduled = 4; //Send patient to the accountant to pay
    const Is_Completed = 5; // payment complete return back to the pharmacy to collect the medicine
}

// Appointment status
class constAppointmentType
{
    const Is_OnlineAppointment = 0; // the order is new from the doctor or nurse
    const Is_OfflineAppointment = 1; // the pharmacy acknowledged the request
}

// Visit status
class constVisitStatus
{
    const Is_New = 0; // the order is new from the doctor or nurse
    const Is_Waiting = 1; // the pharmacy acknowledged the request
    const Is_NotSeen = 2; // the pharmacy acknowledged the request
    const Is_Seen = 3; // Payment is pending means on process
    const Is_Completed = 4; // payment complete return back to the pharmacy to collect the medicine
}

// Ambulance status
class constAmbulanceStatus
{
    const Is_Available = 0; // the bed is empty
    const Is_Not_Available = 1; // the bed is already in use
    const is_Emergency = 2; // the bed is broken.
}


// Bed status
class constBedStatus
{
    const Is_Empty = 0; // the bed is empty
    const Is_Allocated = 1; // the bed is already in use
    const Is_Broken = 2; // the bed is broken.
}

// Room status
class constRoomStatus
{
    const Is_Empty = 0; // the bed is empty
    const Is_Full = 1; // the bed is already in use
    const is_Disabled = 2; // the bed is broken.
}

// Doctor Order type
class constOrderType
{
    const Is_Prescription = 1; // the order is new from the doctor or nurse to pharmacy
    const Is_Investigation = 2; // the order is new from the doctor or nurse to phlebotomy
}


// Doctor Order type
class constSampleCollectionStatus
{
    const Is_New = 0; // the order is new from the doctor or nurse to pharmacy
    const Is_Collected = 1; // the order is new from the doctor or nurse to pharmacy
    const Is_Dispatched = 2; // the order is new from the doctor or nurse to phlebotomy
}


// Invoice Items
class constInvoiceItem
{
    const admission = 'Admission';
    const gymSubscription = 'Company Subscription';
    const taxes = 'Taxes';
}

//subscription
class constSubscription
{
    const Expired = 0;
    const onGoing = 1;
    const renewed = 2;
    const cancelled = 3;
}

//subscription
class constDefaultDays
{
    const DefaultDayNumber = 40;
    const DefaultCreditAmount = 5;
    const DefaultDayDate40 = ' + 41 days';
    const ReferableByDate5 = ' + 5 days';
}

//numbering mode
class constNumberingMode
{
    const Manual = 0;
    const Auto = 1;
}

//Payment mode
class constPaymentMode
{
    const Cheque = 0;
    const Cash = 1;
    const Credit = 2;
    const Bank = 3;
}


// Title
class constTitleType
{
    const MR = 1;
    const MRS = 2;
    const MISS = 3;
    const MS = 4;
    const MX = 5;
    const SIR = 6;
    const DR = 7;
    const CLIR = 8;
}

// vISIT tYPES
class constVisitTypes
{
    const GeneralVisit = 1;
    const AntenatalVisit = 2;
    const DaySurgeryVisit = 3;
    const InvestigationProcedureVisit = 4;
    const MentalHealthVisit = 5;
    const PostnatalVisit = 6;
}

// Purchase Category
class constPurchaseType
{
    const Is_Medicine = 1;
    const Is_Bed = 2;
    const is_Glove = 3;
}
