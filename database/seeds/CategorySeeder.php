<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('categories')->insert([
            [
                'title' => 'Education',
                'image' => 'category_images/1627537181category.png',
            ],
            [
                'title' => 'Programing',
                'image' => 'category_images/1627537232category.png',
            ],
            [
                'title' => 'legal',
                'image' => 'category_images/1627537279category.png',
            ],

            [
                'title' => 'Demo Title',
                'image' => 'category_images/1627537279category.png',
            ],

            [
                'title' => 'Demo Title',
                'image' => 'category_images/1627537279category.png',
            ],
        ]);

        \App\Language::create([
            'name' => 'English',
            'code' => 'en',
            'l1' => 'Find Your Dream Job',
            'l2' => 'Search and find your dream job easily and quickly',
            'l3' => 'Get Your Dream Job',
            'l4' => 'Get Your Dream Job and start working in an new company',
            'l5' => 'Join and Start Your Work',
            'l6' => 'Start Working With Your Team in your new marketplace',
            'l7' => 'Mploya Login',
            'l8' => 'Login With Your Mploya',
            'l9' => 'Job Seeker',
            'l10' => 'Employer',
            'l11' => 'Email',
            'l12' => 'Password',
            'l13' => 'Forgot Password',
            'l14' => 'Login',
            'l15' => 'With',
            'l16' => 'Don\'t have an account',
            'l17' => 'Sign Up',
            'l18' => 'Welcome To',
            'l19' => 'Full Name',
            'l20' => 'Confirm Password',
            'l21' => 'Sign Up',
            'l22' => 'Enter your register email below to receive password reset instructions',
            'l23' => 'Send',
            'l24' => 'Email Not Found',
            'l25' => 'Enter Otp Code',
            'l26' => 'Enter the Otp Code that you received on your email',
            'l27' => 'Verify',
            'l28' => 'Check Your Email',
            'l29' => 'We have send an password reset link on your email',
            'l30' => 'OTP Not match Please try again',
            'l31' => 'Home',
            'l32' => 'Explore',
            'l33' => 'Favourites',
            'l34' => 'My Jobs',
            'l35' => 'Job Requests',
            'l36' => 'Profile',
            'l37' => 'Subscription',
            'l38' => 'Interviews',
            'l39' => 'My Posted Jobs',
            'l40' => 'Notifications',
            'l41' => 'Interview Invites',
            'l42' => 'Settings',
            'l43' => 'Sign Out',
            'l44' => 'Profile Progress',
            'l45' => 'View Profile',
            'l46' => 'Request Interview',
            'l47' => 'Chat',
            'l48' => 'Introduction video',
            'l49' => 'About',
            'l50' => 'Language',
            'l51' => 'Skill',
            'l52' => 'Education',
            'l53' => 'Experience',
            'l54' => 'Work',
            'l55' => 'Candidate Profile',
            'l56' => 'Reviews',
            'l57' => 'No Reviews Found',
            'l58' => 'Give Review',
            'l59' => 'Profile',
            'l60' => 'Edit profile',
            'l61' => 'Completion Status',
            'l62' => 'Profile Complete',
            'l63' => 'Basic Information',
            'l64' => 'Visible',
            'l65' => 'Non Visible',
            'l66' => 'Company Name',
            'l67' => 'Address',
            'l68' => 'Phone',
            'l69' => 'Your',
            'l70' => 'Link',
            'l71' => 'Select Video',
            'l72' => 'Candidate',
            'l73' => 'Search Here',
            'l74' => 'Description',
            'l75' => 'Total Jobs',
            'l76' => 'Notification Not Found',
            'l77' => 'Please Purchase Subscription For Post Jobs',
            'l78' => 'Name On Card',
            'l79' => 'Card Number',
            'l80' => 'Expiration',
            'l81' => 'Month',
            'l82' => 'Year',
            'l83' => 'Pay Now',
            'l84' => 'Successfully',
            'l85' => 'You Have Successfully Purchased A Subscription',
            'l86' => 'Active',
            'l87' => 'Posted',
            'l88' => 'Remain',
            'l89' => 'Please Update Your Profile',
            'l90' => 'Profile Update Successfully',
            'l91' => 'Select Interview Time',
            'l92' => 'Date',
            'l93' => 'Time',
            'l94' => 'Send',
            'l95' => 'Close',
            'l96' => 'Request',
            'l97' => 'Interview Schedule Successfully',
            'l98' => 'Invited',
            'l99' => 'Re Schedule',
            'l100' => 'Hire Now',
            'l101' => 'Old',
            'l102' => 'Top Categories',
            'l103' => 'Popular Companies',
            'l104' => 'Jobs',
            'l105' => 'View All',
            'l106' => 'Occupation',
            'l107' => 'Add',
            'l108' => 'Add Your Education',
            'l109' => 'Is Continue',
            'l110' => 'Start Date',
            'l111' => 'End Date',
            'l112' => 'Company Name',
            'l113' => 'Company Address',
            'l114' => 'Project Link',
            'l115' => 'Optional',
            'l116' => 'Status',
            'l117' => 'Completed',
            'l118' => 'Bookmarks Not Found',
            'l119' => 'Filter',
            'l120' => 'Clear',
            'l121' => 'No',
            'l122' => 'Seeker',
            'l123' => 'Mploya',
            'l124' => 'Apply for This Job',
            'l125' => 'Occupation Not register',
            'l126' => 'Applied',
            'l127' => 'Save',
            'l128' => 'Apply',
            'l129' => 'Salary Type',
            'l130' => 'Job Type',
            'l131' => 'Salary Range',
            'l132' => 'Delete',
            'l133' => 'Edit',
            'l134' => 'Please purchase subscription for post jobs',
            'l135' => 'Password Update successfully',
            'l136' => 'Something went wrong try again.',
            'l137' => 'Create',
            'l138' => 'Your new password must be different from previous used password',
            'l139' => 'Please enter',
            'l140' => 'Name',
            'l141' => 'Password should be contain 8 digits at least',
            'l142' => 'Password are not matched',
            'l143' => 'New',
            'l144' => 'Right',
            'l145' => 'Modified On',
            'l146' => 'Post Job',
            'l147' => 'Enter Job Details',
            'l148' => 'Available Vacancies',
            'l149' => 'Please purchase subscription for post jobs',
            'l150' => 'Please update your profile & For post job profile progress should be 70% or above',
            'l151' => 'No job is remaining in your purchased subscription Please Purchase Subscription Or Renew it.',
            'l152' => 'Select Sub Category',
            'l153' => 'Select Category',
            'l154' => 'Job Description',
            'l155' => 'Msg',
            'l156' => 'Job High Light',
            'l157' => 'Industry Type',
            'l158' => 'Functional Area',
            'l159' => 'Role',
            'l160' => 'Skills Required',
            'l161' => 'Requirements',
            'l162' => 'Info',
            'l163' => 'Company',
            'l164' => 'Web Site',
            'l165' => 'Title',
            'l166' => 'Please select start date',
            'l167' => 'Please select end date',
            'l168' => 'Time period not valid',
            'l169' => 'Start and end date can\'t be same',
            'l170' => 'Please enter company name',
            'l171' => 'Please enter Role',
            'l172' => 'Please enter valid link',
            'l173' => 'Continue',
            'l174' => 'Completed',
            'l175' => 'Please enter job title',
            'l176' => 'Please select salary type',
            'l177' => 'Please select job type',
            'l178' => 'Please enter role',
            'l179' => 'Please enter education',
            'l180' => 'Please enter  requirements',
            'l181' => 'Please enter description',
            'l182' => 'Please add 1 skill at least',
            'l183' => 'Per Week',
            'l184' => 'Per Month',
            'l185' => 'Part Time',
            'l186' => 'Full Time',
            'l187' => 'Occupation Not Registered',
            'l188' => 'All Categories',
            'l189' => 'All Categories',
            'l190' => 'Number',
            'l191' => 'Vacancies',
            'l192' => 'Developer',
            'l193' => 'Salary',
            'l194' => 'Not Linked Yet',
            'l195' => 'Don\'t now how open this url :',
            'l196' => 'This email already register as Jobseeker',
            'l197' => 'This email already register as Employer',
            'l198' => 'Please enter userName',
            'l199' => 'OK',
            'l200' => 'OTP',
            'l201' => 'Jop Post Successfully',
            'l202' => 'You can\'t select passed date\'s',
            'l203' => 'Select Interview Time',
            'l204' => 'Please Select Valid Date',
            'l205' => 'Sorry! This Employer has not uploaded introduction video yet.',
            'l206' => 'Sorry! This Seeker has not uploaded introduction video yet.',
            'l207' => 'Update successfully',
            'l208' => 'Job Update successfully',
            'l209' => 'Jop Posted Successfully',
            'l210' => 'Click + to',
            'l211' => 'Already have an account?',
            'l212' => 'Video File should not be greater then 2mb',
            'l213' => 'Create Password',
            'l214' => 'Thank You. for Subscription',
            'l215' => 'Applied Successfully',
            'l216' => 'Session Expire. Please Login Again ',
            // new for payment pages
            'l217' => 'Name on Card',
            'l218' => 'Card Name',
            'l219' => 'Card Number',
            'l220' => 'Valid Card Number',
            'l221' => 'CVC',
            'l222' => 'e.g 415',
            'l223' => 'Expiration Month',
            'l224' => 'MM',
            'l225' => 'Expiration Year',
            'l226' => 'YYYY',
            'l227' => 'Pay Now',
            'l228' => 'Success',
            'l229' => "We received your purchase request we'll be in touch shortly!",

            // new for notificatio
            'l230' => 'Hello!',
            'l231' => 'Interview Schedule Notification',
            'l232' => 'Your Date',
            'l233' => 'and Time',
            'l234' => 'for interview',
            'l235' => 'Good Luck!',
            'l236' => 'Thank you for using our application!',
            'l237' => 'Regards',
            'l238' => 'Your Otp Code is',
            'l239' => 'The introduction to the notification',

            // new 
            'l240' => 'User Not Found',
            'l241' => 'Job Add Successfully',
            'l242' => 'You Are Not Able To Post Job',
            'l243' => 'Jobs Not Found',
            'l244' => 'Job Delete Successfully',
            'l245' => 'Job Status Change Successfully, and Now Current Status is Close',
            'l246' => 'Job Status Change Successfully, and Now Current Status is Open',
            'l247' => 'Profile Status Change Successfully and Now Current Status is Not Visible',
            'l248' => 'Profile Status Change Successfully and Now Current Status is Visible',
            'l249' => 'Jobseeker Not Found',
            'l250' => "Jobseeker Bookmark Successfully",
            //
            'l251' => 'Jobseeker UnBookmark Successfully',
            'l252' => 'Profile Not Visible',
            'l253' => 'You Are Not Able To Bookmark Employer',
            'l254' => 'Popular Employer Not Found',
            'l255' => 'You Are Not Able To Get Bookmark Jobseeker',
            'l256' => 'Bookmarked Jobseeker Not Found',
            'l257' => 'Interview Schedule Already',
            'l258' => 'Interview Schedule Successfully and check your Email',
            'l259' => 'You Are Not Able To Schedule',
            'l260' => 'Popular Employers not Found',
            'l261' => "You Are Not Able To Get Popular Employers",
            //
            'l262' => 'Popular Jobseekers not Found',
            'l263' => 'You Are Not Able To Get Popular Jobseeker',
            'l264' => 'Popular Jobseeker  Not Found',
            'l265' => 'You Can Add Only One Review',
            'l266' => 'You Are Not Able To Add Review',
            'l267' => 'Reviews Not Found',
            'l268' => 'You Are Not Able To Get Reviews',
            'l269' => 'Reviews Not Found',
            'l270' => 'You Are Not Able To Get Reviews',
            'l271' => 'Jobseekers not Found',
            'l272' => "Interview Reschedule Successfully and check your Email",
            //\
            'l273' => 'You Hire This Person Successfully',
            'l274' => 'You Already Hire This Person',
            'l275' => 'You Are Not Able To Get All Subscriptions',
            'l276' => 'Subscription Not Found',
            'l277' => 'You Are Not Able To Purchase the Subscriptions',
            'l278' => 'Pruchased Subscription Not Found',
            'l279' => 'You Are Not Able To Get All Pruchased Subscription',
            'l280' => 'You are Login as Different Account',
            'l281' => 'Email Not Varified',
            'l282' => 'Invalid Login Credentials',
            'l283' => "Name is Required",
            //
            'l284' => 'User Type is Required',
            'l285' => 'Otp Send Successfully On Your Email',
            'l286' => 'Your Otp Varify Successfull',
            'l287' => 'Otp Not Match, Please Try Again',
            'l288' => 'Email Not Found, Please Try Again',
            'l289' => 'Your Account is Register But Not Social',
            'l290' => 'Password Updated Successfully',
            'l291' => 'Profile Updated Successfully',
            'l292' => 'Employers Not Found',
            'l293' => 'You already  Applied On This Job',
            'l294' => "You Are Not Able To Get Applied Jobs",
            //
            'l295' => 'Job Bookmark Successfully',
            'l296' => 'Job UnBookmark Successfully',
            'l297' => 'Job Are Closed',
            'l298' => 'You Are Not Able To Bookmark Jobs',
            'l299' => 'Bookmarked Jobs not Found',
            'l300' => 'You Are Not Able To Get Bookmark Job',
            'l301' => 'Bookmarked Job Not Found',
            'l302' => 'Review Add Successfully',
            'l303' => 'You Can Add Only One Review',
            'l304' => 'You Are Not Able To Add Review',
            'l305' => "Only Company Employee Can Add Review",
            //
            'l306' => 'Right Review',
            'l307' => 'no video found',
            'l308' => "Video File should not be greater then 2mb",
            // 
            'l309' => 'Location',
            'l310' => 'Schedule',
            'l311' => "Post Now",
            'l312' => "Some thing happened wrong",
            'l313' => "Your Review",
            'l314' => "Select Rating",
            'l315' => "No Chat Found",
        ]);
    }
}
