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
            'l13' => 'Forget Password',
            'l14' => 'Login',
            'l15' => 'With',
            'l16' => 'Dont have ab account',
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
            'l103' => 'Popular Countries',
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
        ]);
    }
}
