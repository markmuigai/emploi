<?php

use Illuminate\Database\Seeder;

use App\Blog;
use App\BlogCategory;
use App\Company;
use App\CompanySize;
use App\Country;
use App\EducationLevel;
use App\Employer;
use App\Industry;
use App\JobApplication;
use App\Jurisdiction;
use App\Location;
use App\ModelSeeker;
use App\ModelSeekerSkill;
use App\Permission;
use App\Personality;
use App\Post;
use App\Seeker;
use App\SeekerSkill;
use App\Skill;
use App\User;
use App\UserPermission;
use App\VacancyType;

class DatabaseSeeder extends Seeder
{
    public function run()
    {
        Industry::create([ 'name' => 'IT and Telecoms', 'slug' => 'it-and-telecoms' ]);
        Industry::create([ 'name' => 'Sales', 'slug' => 'sales' ]);
        Industry::create([ 'name' => 'Banking and Accounts', 'slug' => 'banking-and-accounts' ]);
        Industry::create([ 'name' => 'Human Resource', 'slug' => 'human-resource' ]);

        Country::create([ 'name' => 'Kenya','code' => 'KE', 'prefix' => '254','currency' => 'KES' ]);
        Country::create([ 'name' => 'Uganda','code' => 'UG', 'prefix' => '256','currency' => 'UGX' ]);
        Country::create([ 'name' => 'Tanzania','code' => 'TZ', 'prefix' => '255','currency' => 'TSH' ]);

        Location::create([ 'name' => 'Nairobi','country_id' => 1]);
        Location::create([ 'name' => 'Mombasa','country_id' => 1]);
        Location::create([ 'name' => 'Kisumu','country_id' => 1]);

        Location::create([ 'name' => 'Kampala','country_id' => 2]);
        Location::create([ 'name' => 'Gulu','country_id' => 2]);

        Location::create([ 'name' => 'Dar es Salaam','country_id' => 3]);
        Location::create([ 'name' => 'Mwanza','country_id' => 3]);
        Location::create([ 'name' => 'Arusha','country_id' => 3]);
        Location::create([ 'name' => 'Dodoma','country_id' => 3]);

        Permission::create([ 'role' => 'super-admin','home' => '/desk' ]);
        Permission::create([ 'role' => 'admin','home' => '/admin/panel' ]);
        Permission::create([ 'role' => 'employer', 'home' => '/dashboard'  ]);
        Permission::create([ 'role' => 'seeker',	'home' => '/' ]);

        CompanySize::create([ 'lower_limit' => 2, 'upper_limit' => 9]);
        CompanySize::create([ 'lower_limit' => 10, 'upper_limit' => 24]);
        CompanySize::create([ 'lower_limit' => 25, 'upper_limit' => 99]);
        CompanySize::create([ 'lower_limit' => 100, 'upper_limit' => 299]);
        CompanySize::create([ 'lower_limit' => 300, 'upper_limit' => 999]);
        CompanySize::create([ 'lower_limit' => 1000, 'upper_limit' => 10000]);

        Skill::create([
            'name' => 'Leadership'
        ]);
        Skill::create([
            'name' => 'Time Management'
        ]);
        Skill::create([
            'name' => 'Active Listening'
        ]);
        Skill::create([
            'name' => 'Communication'
        ]);
        Skill::create([
            'name' => 'Customer Service'
        ]);
        Skill::create([
            'name' => 'Interpersonal'
        ]);
        Skill::create([
            'name' => 'Management'
        ]);
        Skill::create([
            'name' => 'Problem Solving'
        ]);

        $master = Personality::create(['name' => 'Mastermind' ]);
        $vision = Personality::create(['name' => 'Visionary'  ]);
        $idealist = Personality::create(['name' => 'Idealist'   ]);

        $prima = EducationLevel::create([
            'name' => 'Primary School', 
            'superior_id' => 2
        ]);

        $seco = EducationLevel::create([
            'name' => 'Secondary School', 
            'superior_id' => 3,
            'inferior_id' => 1
        ]);

        $cert = EducationLevel::create([
            'name' => 'Certificate', 
            'superior_id' => 4,
            'inferior_id' => 2
        ]);

        $dip = EducationLevel::create([
            'name' => 'Diploma', 
            'superior_id' => 5,
            'inferior_id' => 3
        ]);

        $deg = EducationLevel::create([
            'name' => 'Degree', 
            'superior_id' => 6,
            'inferior_id' => 4
        ]);

        $mast = EducationLevel::create([
            'name' => 'Masters', 
            'superior_id' => 7,
            'inferior_id' => 5
        ]);

        $phd = EducationLevel::create([
            'name' => 'PHD', 
            'inferior_id' => 6
        ]);

        $sadmin = User::create([
            'name' => 'Super Administrator',
            'email' => 'admin@emploi.co',
            'username' => 'admin',
            'email_verified_at' => now(),
            'password' => '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi',
            'remember_token' => Str::random(10),
        ]);
        UserPermission::create([ 'user_id' => $sadmin->id, 'permission_id' => 1 ]);

        $admin = User::create([
            'name' => 'Brian Obare',
            'email' => 'brian.obare@emploi.co',
            'username' => 'brian',
            'email_verified_at' => now(),
            'password' => '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi',
            'remember_token' => Str::random(10),
        ]);
        $adminPerm = UserPermission::create([ 'user_id' => $admin->id, 'permission_id' => 2 ]);
        Jurisdiction::create([ 'user_permission_id' => $adminPerm->id, 'country_id' => 1 ]);

        VacancyType::create([ 'slug' => 'full-time', 'name' => 'Full-time']);
        VacancyType::create([ 'slug' => 'part-time', 'name' => 'Part-time']);
        VacancyType::create([ 'slug' => 'internships', 'name' => 'Internships']);
        VacancyType::create([ 'slug' => 'contract', 'name' => 'Contract']);
        VacancyType::create([ 'slug' => 'volunteer', 'name' => 'Volunteer']);
        VacancyType::create([ 'slug' => 'remote', 'name' => 'Remote']);

        $employer = User::create([
            'name' => 'Millicent Kevore',
            'email' => 'millicent@emploi.co',
            'username' => 'millicent',
            'email_verified_at' => now(),
            'password' => '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi',
            'remember_token' => Str::random(10),
        ]);
        UserPermission::create([ 'user_id' => $employer->id, 'permission_id' => 3 ]);

        $emp = Employer::create([
            'user_id' => $employer->id, 
            'name' => 'Millicent Kevore', 
            'industry_id' => 1, 
            'company_name' => 'Millicent Softwares',
            'contact_phone' => '2547218281034',
            'company_phone' => '2547212937464',
            'company_email' => 'info@emploi.co',
            'country_id' => 1,
            'address' => 'P.O. Box 383-00100 Nairobi'
        ]);

        $c = Company::create([
            'name' => 'Millicent Softwares', 
            'user_id' => $employer->id,
            'about' => "Loremp ipsum dolor sit amet Loremp ipsum dolor sit amet Loremp ipsum dolor sit amet Loremp ipsum dolor sit amet Loremp ipsum dolor sit amet Loremp ipsum dolor sit amet Loremp ipsum dolor sit amet Loremp ipsum dolor sit amet Loremp ipsum dolor sit amet Loremp ipsum dolor sit amet ",
            'tagline' => 'we are you',
            'website' => "http://emploi.co", 
            'industry_id' => 1,
            'location_id' => 1,
            'company_size_id' => 1
        ]);

        $p1 = Post::create([
            'slug' =>'laravel-developer', 
            'company_id' => $c->id, 
            'title' => 'Laravel Developer', 
            'industry_id' => 1,
            'education_requirements' => 1, 
            'experience_requirements' => 3,
            'responsibilities' => 'We require a capable man to handle code', 
            'benefits' => 'no benefits',
            'deadline' => now()->addDays(rand(3,10)),
            'status' => 'active',
            'positions' => 2,
            'location_id' => 1,
            'vacancy_type_id'=> 1,
            'how_to_apply' => '',
            'monthly_salary' => 40000,
        ]);

        $p2 = Post::create([
            'slug' =>'web-developer', 
            'company_id' => $c->id, 
            'title' => 'Web Developer', 
            'industry_id' => 1,
            'education_requirements' => 2, 
            'experience_requirements' => 4,
            'responsibilities' => 'We require a capable man to handle code', 
            'benefits' => 'no benefits',
            'deadline' => now()->addDays(rand(3,10)),
            'status' => 'active',
            'positions' => 1,
            'location_id' => 1,
            'vacancy_type_id'=> 1,
            'how_to_apply' => '',
            'monthly_salary' => 40000,
        ]);

        $p3 = Post::create([
            'slug' =>'angular-developer', 
            'company_id' => $c->id, 
            'title' => 'Angular Developer', 
            'industry_id' => 1,
            'education_requirements' => 2, 
            'experience_requirements' => 4,
            'responsibilities' => 'We require a capable man to handle code', 
            'benefits' => 'no benefits',
            'deadline' => now()->addDays(rand(3,10)),
            'status' => 'active',
            'positions' => 1,
            'location_id' => 1,
            'vacancy_type_id'=> 1,
            'how_to_apply' => '',
            'monthly_salary' => 40000,
        ]);

        BlogCategory::create([
            'name' => 'Productivity', 
            'slug' => 'productivity'
        ]);

        BlogCategory::create([
            'name' => 'CV Writing', 
            'slug' => 'cv-writing'
        ]);

        BlogCategory::create([
            'name' => 'Interviews', 
            'slug' => 'interviews'
        ]);

        Blog::create([
            'user_id' => $admin->id, 
            'blog_category_id' => 1, 
            'title' => 'How automation can boost your productivity',
            'slug' => 'automation-and-productivity',
            'contents' => 'Sample contents. Loremp ipsum dolor sit amet  Loremp ipsum dolor sit amet  Loremp ipsum dolor sit amet Sample contents. Loremp ipsum dolor sit amet  Loremp ipsum dolor sit amet  Loremp ipsum dolor sit amet Sample contents. Loremp ipsum dolor sit amet  Loremp ipsum dolor sit amet  Loremp ipsum dolor sit amet Sample contents. Loremp ipsum dolor sit amet  Loremp ipsum dolor sit amet  Loremp ipsum dolor sit amet Sample contents. Loremp ipsum dolor sit amet  Loremp ipsum dolor sit amet  Loremp ipsum dolor sit amet Sample contents. Loremp ipsum dolor sit amet  Loremp ipsum dolor sit amet  Loremp ipsum dolor sit amet Sample contents. Loremp ipsum dolor sit amet  Loremp ipsum dolor sit amet  Loremp ipsum dolor sit amet Sample contents. Loremp ipsum dolor sit amet  Loremp ipsum dolor sit amet  Loremp ipsum dolor sit amet '
        ]);

        Blog::create([
            'user_id' => $admin->id, 
            'blog_category_id' => 1, 
            'title' => 'Benefits of a must do list',
            'slug' => 'must-do-list',
            'contents' => 'Sample contents. Loremp ipsum dolor sit amet  Loremp ipsum dolor sit amet  Loremp ipsum dolor sit amet '
        ]);

        Blog::create([
            'user_id' => $admin->id, 
            'blog_category_id' => 2, 
            'title' => 'Recruiters never read CVs',
            'slug' => 'recruit-no-cv',
            'contents' => 'Sample contents. Loremp ipsum dolor sit amet  Loremp ipsum dolor sit amet  Loremp ipsum dolor sit amet '
        ]);

        Blog::create([
            'user_id' => $admin->id, 
            'blog_category_id' => 1, 
            'title' => 'Inactive Blog Post',
            'slug' => 'inactive-blog-post',
            'contents' => 'Sample contents. Loremp ipsum dolor sit amet  Loremp ipsum dolor sit amet  Loremp ipsum dolor sit amet ',
            'status' => 'inactive'
        ]);

        $se1 = ModelSeeker::create([
            'post_id' => $p1->id,
            'education_level_id' => $dip->id,
            'education_level_importance' => 50,
            'personality_test_id' => $vision->id,
            'experience_duration' => 3,
            'experience_level_importance' => 50,
            'iq_score' => 70,
            'interview_result_score' => 70,
            'psychometric_test_score' => 80,
            'company_size_id' => 3
        ]);

        ModelSeekerSkill::create([
            'model_seeker_id' => 1,
            'skill_id' => 1
        ]);

        ModelSeekerSkill::create([
            'model_seeker_id' => 1,
            'skill_id' => 2
        ]);

        $se2 = ModelSeeker::create([
            'post_id' => $p2->id,
            'education_level_id' => $deg->id,
            'education_level_importance' => 70,
            'personality_test_id' => $master->id,
            'experience_duration' => 4,
            'experience_level_importance' => 70,
            'iq_score' => 70,
            'interview_result_score' => 70,
            'psychometric_test_score' => 80,
            'company_size_id' => 4
        ]);

        ModelSeekerSkill::create([
            'model_seeker_id' => 2,
            'skill_id' => 1
        ]);
        ModelSeekerSkill::create([
            'model_seeker_id' => 2,
            'skill_id' => 3
        ]);
        ModelSeekerSkill::create([
            'model_seeker_id' => 2,
            'skill_id' => 4
        ]);

        $se3 = ModelSeeker::create([
            'post_id' => $p3->id,
            'education_level_id' => $seco->id,
            'education_level_importance' => 30,
            'personality_test_id' => $idealist->id,
            'experience_duration' => 1,
            'experience_level_importance' => 90,
            'iq_score' => 30,
            'interview_result_score' => 90,
            'psychometric_test_score' => 80,
            'company_size_id' => 5
        ]);

        ModelSeekerSkill::create([
            'model_seeker_id' => 3,
            'skill_id' => 2
        ]);
        ModelSeekerSkill::create([
            'model_seeker_id' => 3,
            'skill_id' => 5
        ]);
        ModelSeekerSkill::create([
            'model_seeker_id' => 3,
            'skill_id' => 6
        ]);

        $ernest = User::create([
            'name' => 'Ernest Wanyonyi',
            'email' => 'ernest@emploi.co',
            'username' => 'ernest',
            'email_verified_at' => now(),
            'password' => '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi',
            'remember_token' => Str::random(10),
        ]);
        UserPermission::create([ 'user_id' => $ernest->id, 'permission_id' => 4 ]);
        Seeker::create([
            'user_id' => $ernest->id,
            'public_name' => 'Ernest W',
            'gender' => 'M',
            'phone_number' => '254723193712',
            'country_id' => 1,
            'industry_id' => 1,
            'resume' => 'sample-resume.pdf',
            'date_of_birth' => now(),
            'years_experience' => 5,
            'location_id' => 1,
            'education_level_id' => $dip->id
        ]);

        $sally = User::create([
            'name' => 'Sally Muya',
            'email' => 'sally@emploi.co',
            'username' => 'sally',
            'email_verified_at' => now(),
            'password' => '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi',
            'remember_token' => Str::random(10),
        ]);
        UserPermission::create([ 'user_id' => $sally->id, 'permission_id' => 4 ]);
        Seeker::create([
            'user_id' => $sally->id,
            'public_name' => 'Sally M',
            'gender' => 'F',
            'phone_number' => '254728217712',
            'country_id' => 1,
            'industry_id' => 2,
            'resume' => 'sample-resume.pdf',
            'date_of_birth' => now(),
            'years_experience' => 2,
            'location_id' => 2,
            'education_level_id' => $deg->id
        ]);

        $liza = User::create([
            'name' => 'Liza Adhiambo',
            'email' => 'liza@emploi.co',
            'username' => 'liza',
            'email_verified_at' => now(),
            'password' => '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi',
            'remember_token' => Str::random(10),
        ]);
        UserPermission::create([ 'user_id' => $liza->id, 'permission_id' => 4 ]);
        Seeker::create([
            'user_id' => $liza->id,
            'public_name' => 'Liza L',
            'gender' => 'F',
            'phone_number' => '2541022992381',
            'country_id' => 1,
            'industry_id' => 2,
            'resume' => 'sample-resume.pdf',
            'date_of_birth' => now(),
            'years_experience' => 2,
            'location_id' => 1,
            'education_level_id' => $mast->id
        ]);

        JobApplication::create([
            'user_id' => $ernest->id,
            'post_id' => $p1->id,
            'cover' => 'Sample cover letter for the position. <br>Please hire me!'
        ]);
        JobApplication::create([
            'user_id' => $ernest->id,
            'post_id' => $p2->id,
            'cover' => 'Sample cover letter for the position. <br>Please hire me!'
        ]);
        JobApplication::create([
            'user_id' => $ernest->id,
            'post_id' => $p3->id,
            'cover' => 'Sample cover letter for the position. <br>Please hire me!'
        ]);

        JobApplication::create([
            'user_id' => $sally->id,
            'post_id' => $p1->id,
            'cover' => 'I have sent a Sample cover letter for the position. <br>Please hire me!'
        ]);
        JobApplication::create([
            'user_id' => $sally->id,
            'post_id' => $p2->id,
            'cover' => 'I have sent a Sample cover letter for the position. <br>Please hire me!'
        ]);
        JobApplication::create([
            'user_id' => $sally->id,
            'post_id' => $p3->id,
            'cover' => 'I have sent a Sample cover letter for the position. <br>Please hire me!'
        ]);

        JobApplication::create([
            'user_id' => $liza->id,
            'post_id' => $p1->id,
            'cover' => 'Trying to send a Sample cover letter for the position. <br>Please hire me!'
        ]);
        JobApplication::create([
            'user_id' => $liza->id,
            'post_id' => $p2->id,
            'cover' => 'Trying to send a Sample cover letter for the position. <br>Please hire me!'
        ]);
        JobApplication::create([
            'user_id' => $liza->id,
            'post_id' => $p3->id,
            'cover' => 'Trying to send a Sample cover letter for the position. <br>Please hire me!'
        ]);

        SeekerSkill::create([
            'seeker_id' => $ernest->id,
            'skill_id' => 1
        ]);
        SeekerSkill::create([
            'seeker_id' => $ernest->id,
            'skill_id' => 2
        ]);
        SeekerSkill::create([
            'seeker_id' => $ernest->id,
            'skill_id' => 3
        ]);
        SeekerSkill::create([
            'seeker_id' => $ernest->id,
            'skill_id' => 4
        ]);

        SeekerSkill::create([
            'seeker_id' => $sally->id,
            'skill_id' => 1
        ]);
        SeekerSkill::create([
            'seeker_id' => $sally->id,
            'skill_id' => 3
        ]);
        SeekerSkill::create([
            'seeker_id' => $sally->id,
            'skill_id' => 5
        ]);
        SeekerSkill::create([
            'seeker_id' => $sally->id,
            'skill_id' => 7
        ]);

        SeekerSkill::create([
            'seeker_id' => $liza->id,
            'skill_id' => 3
        ]);
        SeekerSkill::create([
            'seeker_id' => $liza->id,
            'skill_id' => 4
        ]);
        SeekerSkill::create([
            'seeker_id' => $liza->id,
            'skill_id' => 5
        ]);
        SeekerSkill::create([
            'seeker_id' => $liza->id,
            'skill_id' => 2
        ]);

    }
}
