<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

use App\Blog;
use App\BlogCategory;
use App\Company;
use App\CompanySize;
use App\Country;
use App\Course;
use App\EducationLevel;
use App\Employer;
use App\Industry;
use App\IndustrySkill;
use App\JobApplication;
use App\Jurisdiction;
use App\Location;
use App\ModelSeeker;
use App\ModelSeekerSkill;
use App\Permission;
use App\Personality;
use App\PersonalityTrait;
use App\Post;
use App\RsiWeight;
use App\Seeker;
use App\SeekerSkill;
use App\Skill;
use App\SoftSkill;
use App\User;
use App\UserPermission;
use App\VacancyType;

class RawDataSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::transaction(function () {
            Industry::create([ 'name' => 'Office and Admin', 'slug' => 'admin' ]);
            IndustrySkill::create([ 'name' => 'Customer centric', 'industry_id' => 1 ]);
            IndustrySkill::create([ 'name' => 'Ownership and Commitment', 'industry_id' => 1 ]);
            IndustrySkill::create([ 'name' => 'Organizational skills', 'industry_id' => 1 ]);
            IndustrySkill::create([ 'name' => 'Planning skills', 'industry_id' => 1 ]);
            IndustrySkill::create([ 'name' => 'Team player', 'industry_id' => 1 ]);
            IndustrySkill::create([ 'name' => 'Stakeholder management', 'industry_id' => 1 ]);
            IndustrySkill::create([ 'name' => 'Proficiency in Microsoft Office', 'industry_id' => 1 ]);
            IndustrySkill::create([ 'name' => 'Office policy implementation', 'industry_id' => 1 ]);
            IndustrySkill::create([ 'name' => 'Creating agendas', 'industry_id' => 1 ]);
            IndustrySkill::create([ 'name' => 'Minute taking', 'industry_id' => 1 ]);
            IndustrySkill::create([ 'name' => 'Managing front office', 'industry_id' => 1 ]);
            IndustrySkill::create([ 'name' => 'Documentation', 'industry_id' => 1 ]);
    
            Industry::create([ 'name' => 'Farming & Agribusiness', 'slug' => 'farming' ]);
            IndustrySkill::create([ 'name' => 'Management skills', 'industry_id' => 2  ]);
            IndustrySkill::create([ 'name' => 'Training skills', 'industry_id' => 2  ]);
            IndustrySkill::create([ 'name' => 'Analytical skills', 'industry_id' => 2  ]);
            IndustrySkill::create([ 'name' => 'Budgeting', 'industry_id' => 2  ]);
            IndustrySkill::create([ 'name' => 'Mareket research', 'industry_id' => 2  ]);
            IndustrySkill::create([ 'name' => 'Monitoring commercial flow', 'industry_id' => 2  ]);
            IndustrySkill::create([ 'name' => 'Developing farm units', 'industry_id' => 2  ]);
            IndustrySkill::create([ 'name' => 'Contolling farm assets', 'industry_id' => 2  ]);
            IndustrySkill::create([ 'name' => 'Implementation of projects', 'industry_id' => 2  ]);
            IndustrySkill::create([ 'name' => 'Report writing', 'industry_id' => 2  ]);
            IndustrySkill::create([ 'name' => 'Quality control', 'industry_id' => 2  ]);
            IndustrySkill::create([ 'name' => 'Grant mangement', 'industry_id' => 2  ]);
    
            Industry::create([ 'name' => 'Accounting', 'slug' => 'accounting' ]);
            IndustrySkill::create([ 'name' => 'Data analysis', 'industry_id' => 3 ]);
            IndustrySkill::create([ 'name' => 'Book keeping', 'industry_id' => 3 ]);
            IndustrySkill::create([ 'name' => 'Bank reconciliation', 'industry_id' => 3 ]);
            IndustrySkill::create([ 'name' => 'Corporate finance', 'industry_id' => 3 ]);
            IndustrySkill::create([ 'name' => 'Record keeping', 'industry_id' => 3 ]);
            IndustrySkill::create([ 'name' => 'Communication', 'industry_id' => 3 ]);
            IndustrySkill::create([ 'name' => 'Computer literacy', 'industry_id' => 3 ]);
            IndustrySkill::create([ 'name' => 'Preparation of financial reports', 'industry_id' => 3 ]);
            IndustrySkill::create([ 'name' => 'Inventory control', 'industry_id' => 3 ]);
            IndustrySkill::create([ 'name' => 'Stock management', 'industry_id' => 3 ]);
            IndustrySkill::create([ 'name' => 'Credit control', 'industry_id' => 3 ]);
            IndustrySkill::create([ 'name' => 'Income audit', 'industry_id' => 3 ]);
    
    
            Industry::create([ 'name' => 'Banking & Financial Services', 'slug' => 'banking' ]);
            IndustrySkill::create([ 'name' => 'Numeracy skills', 'industry_id' => 4 ]);
            IndustrySkill::create([ 'name' => 'Corporate banking', 'industry_id' => 4 ]);
            IndustrySkill::create([ 'name' => 'Customer relations', 'industry_id' => 4 ]);
            IndustrySkill::create([ 'name' => 'Compliance', 'industry_id' => 4 ]);
            IndustrySkill::create([ 'name' => 'Marketing', 'industry_id' => 4 ]);
            IndustrySkill::create([ 'name' => 'Mobile banking registration', 'industry_id' => 4 ]);
            IndustrySkill::create([ 'name' => 'Analytical skills', 'industry_id' => 4 ]);
            IndustrySkill::create([ 'name' => 'Numeracy skills', 'industry_id' => 4 ]);
            IndustrySkill::create([ 'name' => 'Corporate banking', 'industry_id' => 4 ]);
            IndustrySkill::create([ 'name' => 'Customer relations', 'industry_id' => 4 ]);
            IndustrySkill::create([ 'name' => 'Compliance', 'industry_id' => 4 ]);
            IndustrySkill::create([ 'name' => 'Marketing', 'industry_id' => 4 ]);
            IndustrySkill::create([ 'name' => 'Communication', 'industry_id' => 4 ]);
            IndustrySkill::create([ 'name' => 'Budgeting', 'industry_id' => 4 ]);
            IndustrySkill::create([ 'name' => 'Forecasting', 'industry_id' => 4 ]);
            IndustrySkill::create([ 'name' => 'Creating Interim', 'industry_id' => 4 ]);
            IndustrySkill::create([ 'name' => 'Facilitating mergers', 'industry_id' => 4 ]);
            IndustrySkill::create([ 'name' => 'Facilitating Acquisitions', 'industry_id' => 4 ]);
            IndustrySkill::create([ 'name' => 'Numeracy skills', 'industry_id' => 4 ]);
            IndustrySkill::create([ 'name' => 'Generate ledger', 'industry_id' => 4 ]);
            IndustrySkill::create([ 'name' => 'Tax compliance', 'industry_id' => 4 ]);
            IndustrySkill::create([ 'name' => 'Knowledge of accounting softwares', 'industry_id' => 4 ]);
    
            Industry::create([ 'name' => 'CEO & General Management', 'slug' => 'management' ]);
            IndustrySkill::create([ 'name' => 'Programme management', 'industry_id' => 5 ]);
            IndustrySkill::create([ 'name' => 'Project implementation', 'industry_id' => 5 ]);
            IndustrySkill::create([ 'name' => 'Strategic planning', 'industry_id' => 5 ]);
            IndustrySkill::create([ 'name' => 'Communication', 'industry_id' => 5 ]);
            IndustrySkill::create([ 'name' => 'Leadership skills', 'industry_id' => 5 ]);
            IndustrySkill::create([ 'name' => 'Policy making and implementation', 'industry_id' => 5 ]);
            IndustrySkill::create([ 'name' => 'Business strategy', 'industry_id' => 5 ]);
            IndustrySkill::create([ 'name' => 'Budgeting', 'industry_id' => 5 ]);
            IndustrySkill::create([ 'name' => 'Monitoring and evaluation', 'industry_id' => 5 ]);
            IndustrySkill::create([ 'name' => 'Business management', 'industry_id' => 5 ]);
            IndustrySkill::create([ 'name' => 'Strategic thinker', 'industry_id' => 5 ]);
            IndustrySkill::create([ 'name' => 'Project development', 'industry_id' => 5 ]);
            IndustrySkill::create([ 'name' => 'Investment management', 'industry_id' => 5 ]);
            IndustrySkill::create([ 'name' => 'Conflict management', 'industry_id' => 5 ]);
            IndustrySkill::create([ 'name' => 'Crisis management', 'industry_id' => 5 ]);
    
            Industry::create([ 'name' => 'Engineering & Construction', 'slug' => 'engineering' ]);
            IndustrySkill::create([ 'name' => 'Quality Control', 'industry_id' => 6 ]);
            IndustrySkill::create([ 'name' => 'Computer numerical control', 'industry_id' => 6 ]);
            IndustrySkill::create([ 'name' => 'Analytical skills', 'industry_id' => 6 ]);
            IndustrySkill::create([ 'name' => 'Material selection', 'industry_id' => 6 ]);
            IndustrySkill::create([ 'name' => 'Continuos improvement', 'industry_id' => 6 ]);
            IndustrySkill::create([ 'name' => 'Hydraulics', 'industry_id' => 6 ]);
            IndustrySkill::create([ 'name' => 'Design', 'industry_id' => 6 ]);
            IndustrySkill::create([ 'name' => 'Machining', 'industry_id' => 6 ]);
            IndustrySkill::create([ 'name' => 'Product development', 'industry_id' => 6 ]);
            IndustrySkill::create([ 'name' => 'Metals', 'industry_id' => 6 ]);
    
            Industry::create([ 'name' => 'Project / Programme Management', 'slug' => 'project-management' ]);
            IndustrySkill::create([ 'name' => 'Risk management', 'industry_id' => 7 ]);
            IndustrySkill::create([ 'name' => 'Project documentation', 'industry_id' => 7 ]);
            IndustrySkill::create([ 'name' => 'Information Technology', 'industry_id' => 7 ]);
            IndustrySkill::create([ 'name' => 'Project management', 'industry_id' => 7 ]);
            IndustrySkill::create([ 'name' => 'Project monitoring and eveluation', 'industry_id' => 7 ]);
            IndustrySkill::create([ 'name' => 'Financial management', 'industry_id' => 7 ]);
            IndustrySkill::create([ 'name' => 'Packging materials', 'industry_id' => 7 ]);
            IndustrySkill::create([ 'name' => 'Time management', 'industry_id' => 7 ]);
            IndustrySkill::create([ 'name' => 'Entrepreneurial skills', 'industry_id' => 7 ]);
            IndustrySkill::create([ 'name' => 'Organizational skills', 'industry_id' => 7 ]);
            IndustrySkill::create([ 'name' => 'Analytical skills', 'industry_id' => 7 ]);
            IndustrySkill::create([ 'name' => 'Project supervision skills', 'industry_id' => 7 ]);
            IndustrySkill::create([ 'name' => 'Written skills', 'industry_id' => 7 ]);
            IndustrySkill::create([ 'name' => 'Communication skills', 'industry_id' => 7 ]);
            IndustrySkill::create([ 'name' => 'Presentation skills', 'industry_id' => 7 ]);
            IndustrySkill::create([ 'name' => 'Service oriented', 'industry_id' => 7 ]);
            IndustrySkill::create([ 'name' => 'Contract management', 'industry_id' => 7 ]);
            IndustrySkill::create([ 'name' => 'Accountability', 'industry_id' => 7 ]);
            IndustrySkill::create([ 'name' => 'Leadership skills', 'industry_id' => 7 ]);
            IndustrySkill::create([ 'name' => 'Budget management', 'industry_id' => 7 ]);
            IndustrySkill::create([ 'name' => 'Staff management', 'industry_id' => 7 ]);
    
            Industry::create([ 'name' => 'Creative & Design', 'slug' => 'creative-design' ]);
            IndustrySkill::create([ 'name' => 'Creativity', 'industry_id' => 8 ]);
            IndustrySkill::create([ 'name' => 'Typography', 'industry_id' => 8 ]);
            IndustrySkill::create([ 'name' => 'Communication', 'industry_id' => 8 ]);
            IndustrySkill::create([ 'name' => 'Branding', 'industry_id' => 8 ]);
            IndustrySkill::create([ 'name' => 'Coding', 'industry_id' => 8 ]);
            IndustrySkill::create([ 'name' => 'Adobe apps ', 'industry_id' => 8 ]);
            IndustrySkill::create([ 'name' => 'Design optimization', 'industry_id' => 8 ]);
            IndustrySkill::create([ 'name' => 'Analytical skills', 'industry_id' => 8 ]);
            IndustrySkill::create([ 'name' => 'Digital marketing Skills', 'industry_id' => 8 ]);
    
            Industry::create([ 'name' => 'Customer Service & Call Centre', 'slug' => 'customer-service' ]);
            IndustrySkill::create([ 'name' => 'Communication skills', 'industry_id' => 9 ]);
            IndustrySkill::create([ 'name' => 'Negotiation Skills', 'industry_id' => 9 ]);
            IndustrySkill::create([ 'name' => 'Decision making skills', 'industry_id' => 9 ]);
            IndustrySkill::create([ 'name' => 'Maintaining Customer database', 'industry_id' => 9 ]);
            IndustrySkill::create([ 'name' => 'Customer Relations', 'industry_id' => 9 ]);
            IndustrySkill::create([ 'name' => 'Computer skills', 'industry_id' => 9 ]);
            IndustrySkill::create([ 'name' => 'Writing skills', 'industry_id' => 9 ]);
            IndustrySkill::create([ 'name' => 'Active listening', 'industry_id' => 9 ]);
            IndustrySkill::create([ 'name' => 'Client care skills', 'industry_id' => 9 ]);
            IndustrySkill::create([ 'name' => 'Problem Solving skills', 'industry_id' => 9 ]);
            IndustrySkill::create([ 'name' => 'Analytical Skills', 'industry_id' => 9 ]);
            IndustrySkill::create([ 'name' => 'Translation', 'industry_id' => 9 ]);
            IndustrySkill::create([ 'name' => 'Data Entry', 'industry_id' => 9 ]);
    
            Industry::create([ 'name' => 'Education & Training', 'slug' => 'education' ]);
            //IndustrySkill::create([ 'name' => '', 'industry_id' => 10 ]);
    
            Industry::create([ 'name' => 'Government', 'slug' => 'government' ]);
            //IndustrySkill::create([ 'name' => '', 'industry_id' => 11 ]);
    
            Industry::create([ 'name' => 'Human Resources', 'slug' => 'hr' ]);
            IndustrySkill::create([ 'name' => 'Problem solving', 'industry_id' => 12 ]);
            IndustrySkill::create([ 'name' => 'Management skills', 'industry_id' => 12 ]);
            IndustrySkill::create([ 'name' => 'Personnel management', 'industry_id' => 12 ]);
            IndustrySkill::create([ 'name' => 'HR policies', 'industry_id' => 12 ]);
            IndustrySkill::create([ 'name' => 'Performance management', 'industry_id' => 12 ]);
            IndustrySkill::create([ 'name' => 'Recruiting', 'industry_id' => 12 ]);
            IndustrySkill::create([ 'name' => 'Business Strategy', 'industry_id' => 12 ]);
            IndustrySkill::create([ 'name' => 'Job evaluation', 'industry_id' => 12 ]);
            IndustrySkill::create([ 'name' => 'Strategic Management', 'industry_id' => 12 ]);
            IndustrySkill::create([ 'name' => 'Operations management', 'industry_id' => 12 ]);
            IndustrySkill::create([ 'name' => 'Workforce planning', 'industry_id' => 12 ]);
            IndustrySkill::create([ 'name' => 'Administration', 'industry_id' => 12 ]);
            IndustrySkill::create([ 'name' => 'Performance Appraisal', 'industry_id' => 12 ]);
            IndustrySkill::create([ 'name' => 'Talent management', 'industry_id' => 12 ]);
            IndustrySkill::create([ 'name' => 'Interviewing', 'industry_id' => 12 ]);
            IndustrySkill::create([ 'name' => 'Policy Development', 'industry_id' => 12 ]);
            IndustrySkill::create([ 'name' => 'Reward management', 'industry_id' => 12 ]);
            IndustrySkill::create([ 'name' => 'Counseling', 'industry_id' => 12 ]);
            IndustrySkill::create([ 'name' => 'Team management', 'industry_id' => 12 ]);
            IndustrySkill::create([ 'name' => 'Employee training', 'industry_id' => 12 ]);
            IndustrySkill::create([ 'name' => 'Labour relations', 'industry_id' => 12 ]);
    
            Industry::create([ 'name' => 'IT & Telecoms', 'slug' => 'it-and-telecoms' ]);
            IndustrySkill::create([ 'name' => 'Front-End Development', 'industry_id' => 13 ]);
            IndustrySkill::create([ 'name' => 'Back-End Development', 'industry_id' => 13 ]);
            IndustrySkill::create([ 'name' => 'Application Programming Interfaces (APIs)', 'industry_id' => 13 ]);
            IndustrySkill::create([ 'name' => 'SQL Databases', 'industry_id' => 13 ]);
            IndustrySkill::create([ 'name' => 'NoSQL Databases', 'industry_id' => 13 ]);
            IndustrySkill::create([ 'name' => 'Android App Development', 'industry_id' => 13 ]);
            IndustrySkill::create([ 'name' => 'IOS App Development', 'industry_id' => 13 ]);
            IndustrySkill::create([ 'name' => 'Desktop App Development', 'industry_id' => 13 ]);
            IndustrySkill::create([ 'name' => 'Hybrid App Development', 'industry_id' => 13 ]);
            IndustrySkill::create([ 'name' => 'Network security', 'industry_id' => 13 ]);
            IndustrySkill::create([ 'name' => 'Website Development', 'industry_id' => 13 ]);
            IndustrySkill::create([ 'name' => 'Networking', 'industry_id' => 13 ]);
            IndustrySkill::create([ 'name' => 'Computer hardware troubleshooting', 'industry_id' => 13 ]);
            IndustrySkill::create([ 'name' => 'Hardware Installation', 'industry_id' => 13 ]);
            IndustrySkill::create([ 'name' => 'Operating systems', 'industry_id' => 13 ]);
            IndustrySkill::create([ 'name' => 'Data center Management', 'industry_id' => 13 ]);
            IndustrySkill::create([ 'name' => 'Solution selling', 'industry_id' => 13 ]);
            IndustrySkill::create([ 'name' => 'Software Troubleshooting', 'industry_id' => 13 ]);
    
            Industry::create([ 'name' => 'Legal', 'slug' => 'legal' ]);
            IndustrySkill::create([ 'name' => 'Analytical skills', 'industry_id' => 14 ]);
            IndustrySkill::create([ 'name' => 'Communication skills', 'industry_id' => 14 ]);
            IndustrySkill::create([ 'name' => 'Writing skills', 'industry_id' => 14 ]);
            IndustrySkill::create([ 'name' => 'Research planning', 'industry_id' => 14 ]);
            IndustrySkill::create([ 'name' => 'Legal analysis', 'industry_id' => 14 ]);
    
            Industry::create([ 'name' => 'Transport & Logistics', 'slug' => 'transport' ]);
            IndustrySkill::create([ 'name' => 'Driving skills', 'industry_id' => 15 ]);
            IndustrySkill::create([ 'name' => 'Communication skills', 'industry_id' => 15 ]);
            IndustrySkill::create([ 'name' => 'Mechanical Knowledge', 'industry_id' => 15 ]);
            IndustrySkill::create([ 'name' => 'Traffic rules knowledge', 'industry_id' => 15 ]);
            IndustrySkill::create([ 'name' => 'Time management', 'industry_id' => 15 ]);
            IndustrySkill::create([ 'name' => 'Computer skills', 'industry_id' => 15 ]);
            IndustrySkill::create([ 'name' => 'Good with directions', 'industry_id' => 15 ]);
    
            Industry::create([ 'name' => 'Manufacturing', 'slug' => 'manufacturing' ]);
            IndustrySkill::create([ 'name' => 'Supervising', 'industry_id' => 16 ]);
            IndustrySkill::create([ 'name' => 'Analytical', 'industry_id' => 16 ]);
            IndustrySkill::create([ 'name' => 'Research planning', 'industry_id' => 16 ]);
            IndustrySkill::create([ 'name' => 'Results oriented', 'industry_id' => 16 ]);
            IndustrySkill::create([ 'name' => 'Personnel management', 'industry_id' => 16 ]);
    
            Industry::create([ 'name' => 'Marketing, Media & Brand', 'slug' => 'marketing' ]);
            IndustrySkill::create([ 'name' => 'Design', 'industry_id' => 17 ]);
            IndustrySkill::create([ 'name' => 'Content creation', 'industry_id' => 17 ]);
            IndustrySkill::create([ 'name' => 'Campaign management', 'industry_id' => 17 ]);
            IndustrySkill::create([ 'name' => 'Social media management', 'industry_id' => 17 ]);
            IndustrySkill::create([ 'name' => 'Report writing', 'industry_id' => 17 ]);
            IndustrySkill::create([ 'name' => 'Content management systems', 'industry_id' => 17 ]);
            IndustrySkill::create([ 'name' => 'Manage digital content', 'industry_id' => 17 ]);
            IndustrySkill::create([ 'name' => 'Promoting products', 'industry_id' => 17 ]);
            IndustrySkill::create([ 'name' => 'Marketing strategies', 'industry_id' => 17 ]);
            IndustrySkill::create([ 'name' => 'Developing Content', 'industry_id' => 17 ]);
            IndustrySkill::create([ 'name' => 'Writing skills', 'industry_id' => 17 ]);
            IndustrySkill::create([ 'name' => 'Online journalism', 'industry_id' => 17 ]);
            IndustrySkill::create([ 'name' => 'Idea generation', 'industry_id' => 17 ]);
            IndustrySkill::create([ 'name' => 'Brand penetration', 'industry_id' => 17 ]);
            IndustrySkill::create([ 'name' => 'News dissemination', 'industry_id' => 17 ]);
            IndustrySkill::create([ 'name' => 'Report writing', 'industry_id' => 17 ]);
            IndustrySkill::create([ 'name' => 'Customer service skills', 'industry_id' => 17 ]);
            IndustrySkill::create([ 'name' => 'Advertising skills', 'industry_id' => 17 ]);
            IndustrySkill::create([ 'name' => 'Editing', 'industry_id' => 17 ]);
            IndustrySkill::create([ 'name' => 'Digital marketing content ', 'industry_id' => 17 ]);
            IndustrySkill::create([ 'name' => 'Content creation', 'industry_id' => 17 ]);
            IndustrySkill::create([ 'name' => 'Search engine marketing', 'industry_id' => 17 ]);
    
            Industry::create([ 'name' => 'Security', 'slug' => 'security' ]);
            IndustrySkill::create([ 'name' => 'Proactive', 'industry_id' => 18 ]);
            IndustrySkill::create([ 'name' => 'Problem analysis', 'industry_id' => 18 ]);
            IndustrySkill::create([ 'name' => 'Solution implementation', 'industry_id' => 18 ]);
            IndustrySkill::create([ 'name' => 'Thoughtful planner', 'industry_id' => 18 ]);
            IndustrySkill::create([ 'name' => 'Badge management', 'industry_id' => 18 ]);
            IndustrySkill::create([ 'name' => 'Vehicle registration', 'industry_id' => 18 ]);
            IndustrySkill::create([ 'name' => 'Contraband detection', 'industry_id' => 18 ]);
            IndustrySkill::create([ 'name' => 'Patrolling', 'industry_id' => 18 ]);
            IndustrySkill::create([ 'name' => 'Safety monitoring', 'industry_id' => 18 ]);
            IndustrySkill::create([ 'name' => 'Policy making', 'industry_id' => 18 ]);
            IndustrySkill::create([ 'name' => 'Security reports', 'industry_id' => 18 ]);
            IndustrySkill::create([ 'name' => 'Risk management', 'industry_id' => 18 ]);
            IndustrySkill::create([ 'name' => 'Security operations', 'industry_id' => 18 ]);
            IndustrySkill::create([ 'name' => 'Monitoring security systems', 'industry_id' => 18 ]);
    
            Industry::create([ 'name' => 'Healthcare & Pharmaceutical', 'slug' => 'healthcare' ]);
            IndustrySkill::create([ 'name' => 'Healthcare management', 'industry_id' => 19 ]);
            IndustrySkill::create([ 'name' => 'Clinical research', 'industry_id' => 19 ]);
            IndustrySkill::create([ 'name' => 'Public Health', 'industry_id' => 19 ]);
            IndustrySkill::create([ 'name' => 'Medical Education', 'industry_id' => 19 ]);
            IndustrySkill::create([ 'name' => 'Surgery', 'industry_id' => 19 ]);
            IndustrySkill::create([ 'name' => 'Emergency medicine', 'industry_id' => 19 ]);
            IndustrySkill::create([ 'name' => 'Internal medicine', 'industry_id' => 19 ]);
    
            Industry::create([ 'name' => 'Strategy & Consulting', 'slug' => 'consulting' ]);
            //IndustrySkill::create([ 'name' => '', 'industry_id' => 20 ]);
            Industry::create([ 'name' => 'NGO, Community & Social Devt', 'slug' => 'ngo' ]);
            IndustrySkill::create([ 'name' => 'Project development', 'industry_id' => 21 ]);
            IndustrySkill::create([ 'name' => 'Customer service', 'industry_id' => 21 ]);
            IndustrySkill::create([ 'name' => 'Communication for development', 'industry_id' => 21 ]);
            IndustrySkill::create([ 'name' => 'Crisis mitigation', 'industry_id' => 21 ]);
            IndustrySkill::create([ 'name' => 'Democratic Governance', 'industry_id' => 21 ]);
            IndustrySkill::create([ 'name' => 'Public sector management', 'industry_id' => 21 ]);
            IndustrySkill::create([ 'name' => 'Situational analysis', 'industry_id' => 21 ]);
            IndustrySkill::create([ 'name' => 'Relationship maintainance', 'industry_id' => 21 ]);
    
            Industry::create([ 'name' => 'Research, Science & Biotech', 'slug' => 'research' ]);
            IndustrySkill::create([ 'name' => 'Analytical skills', 'industry_id' => 22 ]);
            IndustrySkill::create([ 'name' => 'Project supervision skills', 'industry_id' => 22 ]);
            IndustrySkill::create([ 'name' => 'Written skills', 'industry_id' => 22 ]);
            IndustrySkill::create([ 'name' => 'Communication skills', 'industry_id' => 22 ]);
            IndustrySkill::create([ 'name' => 'Presentation skills', 'industry_id' => 22 ]);
            IndustrySkill::create([ 'name' => 'Service oriented', 'industry_id' => 22 ]);
            IndustrySkill::create([ 'name' => 'Contract management', 'industry_id' => 22 ]);
            IndustrySkill::create([ 'name' => 'Accountability', 'industry_id' => 22 ]);
            IndustrySkill::create([ 'name' => 'Leadership skills', 'industry_id' => 22 ]);
    
            Industry::create([ 'name' => 'Hospitality, Tourism & Travel', 'slug' => 'hospitality' ]);
            IndustrySkill::create([ 'name' => 'Organizational skills', 'industry_id' => 23 ]);
            IndustrySkill::create([ 'name' => 'Conflict management', 'industry_id' => 23 ]);
            IndustrySkill::create([ 'name' => 'Compliant resolution', 'industry_id' => 23 ]);
            IndustrySkill::create([ 'name' => 'Customer service', 'industry_id' => 23 ]);
            IndustrySkill::create([ 'name' => 'Telephone skills', 'industry_id' => 23 ]);
            IndustrySkill::create([ 'name' => 'Call management', 'industry_id' => 23 ]);
            IndustrySkill::create([ 'name' => 'Customer care skills', 'industry_id' => 23 ]);
            IndustrySkill::create([ 'name' => 'Verbal skills', 'industry_id' => 23 ]);
            IndustrySkill::create([ 'name' => 'Communication skills', 'industry_id' => 23 ]);
            IndustrySkill::create([ 'name' => 'Interpersonal skills', 'industry_id' => 23 ]);
            IndustrySkill::create([ 'name' => 'Patience', 'industry_id' => 23 ]);
            IndustrySkill::create([ 'name' => 'Catering skills', 'industry_id' => 23 ]);
            IndustrySkill::create([ 'name' => 'Computer Skills', 'industry_id' => 23 ]);
            IndustrySkill::create([ 'name' => 'Organizational skills', 'industry_id' => 23 ]);
            IndustrySkill::create([ 'name' => 'Maintain budget', 'industry_id' => 23 ]);
            IndustrySkill::create([ 'name' => 'Staff training', 'industry_id' => 23 ]);
            IndustrySkill::create([ 'name' => 'Maintaining corporate identity', 'industry_id' => 23 ]);
            IndustrySkill::create([ 'name' => 'People management', 'industry_id' => 23 ]);
            IndustrySkill::create([ 'name' => 'Inventory management', 'industry_id' => 23 ]);
            IndustrySkill::create([ 'name' => 'Restaurant management', 'industry_id' => 23 ]);
    
            Industry::create([ 'name' => 'Insurance', 'slug' => 'insurance' ]);
            IndustrySkill::create([ 'name' => 'Results oriented', 'industry_id' => 25 ]);
            IndustrySkill::create([ 'name' => 'Communication skills', 'industry_id' => 25 ]);
            IndustrySkill::create([ 'name' => 'Presentation skills', 'industry_id' => 25 ]);
            IndustrySkill::create([ 'name' => 'Customer service skills', 'industry_id' => 25 ]);
            IndustrySkill::create([ 'name' => 'Client service', 'industry_id' => 25 ]);
            IndustrySkill::create([ 'name' => 'Computer skills', 'industry_id' => 25 ]);
            IndustrySkill::create([ 'name' => 'Analytical skills', 'industry_id' => 25 ]);
            IndustrySkill::create([ 'name' => 'Problem solving skills', 'industry_id' => 25 ]);
            IndustrySkill::create([ 'name' => 'Market research', 'industry_id' => 25 ]);
            IndustrySkill::create([ 'name' => 'Business Dvelopment', 'industry_id' => 25 ]);
            IndustrySkill::create([ 'name' => 'Sales strategy', 'industry_id' => 25 ]);
            IndustrySkill::create([ 'name' => 'Negotiation skills', 'industry_id' => 25 ]);
    
            Industry::create([ 'name' => 'Real Estate', 'slug' => 'real-estate' ]);
            IndustrySkill::create([ 'name' => 'Property management', 'industry_id' => 25 ]);
            IndustrySkill::create([ 'name' => 'Negotiation skills', 'industry_id' => 25 ]);
            IndustrySkill::create([ 'name' => 'Customer service', 'industry_id' => 25 ]);
            IndustrySkill::create([ 'name' => 'Communication skills', 'industry_id' => 25 ]);
            IndustrySkill::create([ 'name' => 'Strategic execution', 'industry_id' => 25 ]);
            IndustrySkill::create([ 'name' => 'Security management', 'industry_id' => 25 ]);
            IndustrySkill::create([ 'name' => 'Market research', 'industry_id' => 25 ]);
            IndustrySkill::create([ 'name' => 'Feedback solution skills', 'industry_id' => 25 ]);
            IndustrySkill::create([ 'name' => 'Innovative', 'industry_id' => 25 ]);
            IndustrySkill::create([ 'name' => 'Operational management', 'industry_id' => 25 ]);
            IndustrySkill::create([ 'name' => 'Brand image', 'industry_id' => 25 ]);
            IndustrySkill::create([ 'name' => 'Facility management', 'industry_id' => 25 ]);
    
            Industry::create([ 'name' => 'Communication & Public Relations', 'slug' => 'public-relations' ]);
            IndustrySkill::create([ 'name' => 'Writing skills', 'industry_id' => 26 ]);
            IndustrySkill::create([ 'name' => 'Crisis mangagement ', 'industry_id' => 26 ]);
            IndustrySkill::create([ 'name' => 'Negotiation skills', 'industry_id' => 26 ]);
            IndustrySkill::create([ 'name' => 'Conflict management', 'industry_id' => 26 ]);
            IndustrySkill::create([ 'name' => 'Project management', 'industry_id' => 26 ]);
            IndustrySkill::create([ 'name' => 'Events planning and management', 'industry_id' => 26 ]);
            IndustrySkill::create([ 'name' => 'Corporate relations', 'industry_id' => 26 ]);
            IndustrySkill::create([ 'name' => 'Marketing', 'industry_id' => 26 ]);
            IndustrySkill::create([ 'name' => 'Branding', 'industry_id' => 26 ]);
            IndustrySkill::create([ 'name' => 'Social media management', 'industry_id' => 26 ]);
            IndustrySkill::create([ 'name' => 'Corporate social responsibilities', 'industry_id' => 26 ]);
            IndustrySkill::create([ 'name' => 'Research', 'industry_id' => 26 ]);
            IndustrySkill::create([ 'name' => 'Planning and implementation', 'industry_id' => 26 ]);
            IndustrySkill::create([ 'name' => 'Media Relations', 'industry_id' => 26 ]);
            IndustrySkill::create([ 'name' => 'Analytical skills', 'industry_id' => 26 ]);
    
            Industry::create([ 'name' => 'Electricians', 'slug' => 'electricians' ]);
            IndustrySkill::create([ 'name' => 'Electrical Troubleshooting', 'industry_id' => 27 ]);
            IndustrySkill::create([ 'name' => 'Understand technical diagrams', 'industry_id' => 27 ]);
            IndustrySkill::create([ 'name' => 'Electrical wiring', 'industry_id' => 27 ]);
            IndustrySkill::create([ 'name' => 'Construction', 'industry_id' => 27 ]);
            IndustrySkill::create([ 'name' => 'Electricity', 'industry_id' => 27 ]);
            IndustrySkill::create([ 'name' => 'Commissioning', 'industry_id' => 27 ]);
            IndustrySkill::create([ 'name' => 'Preventive maintainance', 'industry_id' => 27 ]);
            IndustrySkill::create([ 'name' => 'Inspection', 'industry_id' => 27 ]);
    
            Industry::create([ 'name' => 'Masons', 'slug' => 'masons' ]);
            IndustrySkill::create([ 'name' => 'Plastering', 'industry_id' => 28 ]);
            IndustrySkill::create([ 'name' => 'Read blueprints', 'industry_id' => 28 ]);
            IndustrySkill::create([ 'name' => 'Wall retention', 'industry_id' => 28 ]);
            IndustrySkill::create([ 'name' => 'Lays bricks', 'industry_id' => 28 ]);
            IndustrySkill::create([ 'name' => 'Stone work', 'industry_id' => 28 ]);
            IndustrySkill::create([ 'name' => 'Carpentry', 'industry_id' => 28 ]);
            IndustrySkill::create([ 'name' => 'Construction skills', 'industry_id' => 28 ]);
            IndustrySkill::create([ 'name' => 'Mantainance of masonary work', 'industry_id' => 28 ]);
            IndustrySkill::create([ 'name' => 'Brick repair and maintainance', 'industry_id' => 28 ]);
    
            Industry::create([ 'name' => 'Sales', 'slug' => 'sales' ]);
            IndustrySkill::create([ 'name' => 'Communication skills', 'industry_id' => 29 ]);
            IndustrySkill::create([ 'name' => 'Negotiation Skills', 'industry_id' => 29 ]);
            IndustrySkill::create([ 'name' => 'Decision making skills', 'industry_id' => 29 ]);
            IndustrySkill::create([ 'name' => 'Maintaining Customer database', 'industry_id' => 29 ]);
            IndustrySkill::create([ 'name' => 'Customer Relations', 'industry_id' => 29 ]);
            IndustrySkill::create([ 'name' => 'Computer skills', 'industry_id' => 29 ]);
            IndustrySkill::create([ 'name' => 'Writing skills', 'industry_id' => 29 ]);
            IndustrySkill::create([ 'name' => 'Active listening', 'industry_id' => 29 ]);
            IndustrySkill::create([ 'name' => 'Client care skills', 'industry_id' => 29 ]);
            IndustrySkill::create([ 'name' => 'Problem Solving skills', 'industry_id' => 29 ]);
            IndustrySkill::create([ 'name' => 'Analytical Skills', 'industry_id' => 29 ]);
            IndustrySkill::create([ 'name' => 'Attention to detail ', 'industry_id' => 29 ]);
            IndustrySkill::create([ 'name' => 'Market analysis', 'industry_id' => 29 ]);
    
            Industry::create([ 'name' => 'Procurement', 'slug' => 'procurement' ]);
            IndustrySkill::create([ 'name' => 'Information management skills', 'industry_id' => 30 ]);
            IndustrySkill::create([ 'name' => 'RFX Documentation', 'industry_id' => 30 ]);
            IndustrySkill::create([ 'name' => 'Technical knowledge', 'industry_id' => 30 ]);
            IndustrySkill::create([ 'name' => 'Cordination skills', 'industry_id' => 30 ]);
            IndustrySkill::create([ 'name' => 'Contract management', 'industry_id' => 30 ]);
            IndustrySkill::create([ 'name' => 'Project management', 'industry_id' => 30 ]);
            IndustrySkill::create([ 'name' => 'Communication', 'industry_id' => 30 ]);
            IndustrySkill::create([ 'name' => 'Computer literacy', 'industry_id' => 30 ]);
            IndustrySkill::create([ 'name' => 'Preparation of financial', 'industry_id' => 30 ]);
            IndustrySkill::create([ 'name' => 'Inventory control', 'industry_id' => 30 ]);
            IndustrySkill::create([ 'name' => 'Stock management', 'industry_id' => 30 ]);
            IndustrySkill::create([ 'name' => 'Credit control', 'industry_id' => 30 ]);
            IndustrySkill::create([ 'name' => 'Income audit', 'industry_id' => 30 ]);
            IndustrySkill::create([ 'name' => 'Accountability', 'industry_id' => 30 ]);
    
            Industry::create([ 'name' => 'Plumbers', 'slug' => 'plumbers' ]);
            IndustrySkill::create([ 'name' => 'Pipe installation', 'industry_id' => 31 ]);
            IndustrySkill::create([ 'name' => 'Water distribution', 'industry_id' => 31 ]);
            IndustrySkill::create([ 'name' => 'Sanitation systems', 'industry_id' => 31 ]);
            IndustrySkill::create([ 'name' => 'Domestic appliances fixtures', 'industry_id' => 31 ]);
            IndustrySkill::create([ 'name' => 'Drainage inspection', 'industry_id' => 31 ]);
            IndustrySkill::create([ 'name' => 'Mechanical skills', 'industry_id' => 31 ]);
            IndustrySkill::create([ 'name' => 'Technical skills', 'industry_id' => 31 ]);
            IndustrySkill::create([ 'name' => 'Plumbing skills', 'industry_id' => 31 ]);
            IndustrySkill::create([ 'name' => 'Valve installation', 'industry_id' => 31 ]);
            IndustrySkill::create([ 'name' => 'Building plan reveiew', 'industry_id' => 31 ]);
    
            Industry::create([ 'name' => 'Uncategorized', 'slug' => 'uncategorized' ]);//32
    
            Industry::create([ 'name' => 'Internships', 'slug' => 'internships' ]);//33
    
            Industry::create([ 'name' => 'Drivers', 'slug' => 'drivers' ]);//34
    
            Industry::create([ 'name' => 'Translation and Transcription', 'slug' => 'translation-and-transcription' ]);//35
    
            Industry::create([ 'name' => 'Nursing', 'slug' => 'nursing' ]);//36
    
            Industry::create([ 'name' => 'Store keeper', 'slug' => 'store-keeper' ]);//37
    
            Industry::create([ 'name' => 'Auditing', 'slug' => 'auditing' ]);//38
    
            Industry::create([ 'name' => 'Graduate Jobs', 'slug' => 'graduate-jobs' ]);//39
    
    
            // Country::create([ 'name' => 'Kenya','code' => 'KE', 'prefix' => '254','currency' => 'KES' ]);
            // Country::create([ 'name' => 'Uganda','code' => 'UG', 'prefix' => '256','currency' => 'UGX' ]);
            // Country::create([ 'name' => 'Tanzania','code' => 'TZ', 'prefix' => '255','currency' => 'TSH' ]);
            // Country::create([ 'name' => 'Rwanda','code' => 'RW', 'prefix' => '250','currency' => 'RWF' ]);
    
            // Location::create([ 'name' => 'Nairobi','country_id' => 1]);
            // Location::create([ 'name' => 'Mombasa','country_id' => 1]);
            // Location::create([ 'name' => 'Kisumu','country_id' => 1]);
    
            // Location::create([ 'name' => 'Kampala','country_id' => 2]);
            // Location::create([ 'name' => 'Gulu','country_id' => 2]);
    
            // Location::create([ 'name' => 'Dar es Salaam','country_id' => 3]);
            // Location::create([ 'name' => 'Mwanza','country_id' => 3]);
            // Location::create([ 'name' => 'Arusha','country_id' => 3]);
            // Location::create([ 'name' => 'Dodoma','country_id' => 3]);
    
            // Location::create([ 'name' => 'Kigali','country_id' => 4]);
    
            Permission::create([ 'role' => 'super-admin','home' => '/desk' ]);
            Permission::create([ 'role' => 'admin','home' => '/admin/panel' ]);
            Permission::create([ 'role' => 'employer', 'home' => '/dashboard'  ]);
            Permission::create([ 'role' => 'seeker',	'home' => '/' ]);
    
            CompanySize::create([ 
            'lower_limit' => 2, 
            'upper_limit' => 50, 
            'title' => 'Startup'
            ]);
            CompanySize::create([ 
            'lower_limit' => 51, 
            'upper_limit' => 299,
            'title' => 'SME'
            ]);
            CompanySize::create([ 
            'lower_limit' => 300, 
            'upper_limit' => 10000,
            'title' => 'Large Organization'
            ]);
    
            RsiWeight::create([
            'name' => 'Not Important',
            'weight' => 10
            ]);
    
            RsiWeight::create([
            'name' => 'Somewhat Important',
            'weight' => 300
            ]);
    
            RsiWeight::create([
            'name' => 'Important',
            'weight' => 700
            ]);
    
            RsiWeight::create([
            'name' => 'Very Important',
            'weight' => 1000
            ]);
    
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
    
            // $sadmin = User::create([
            // 'name' => 'Super Administrator',
            // 'email' => 'admin@emploi.co',
            // 'username' => 'admin',
            // 'email_verified_at' => now(),
            // 'email_verification' => 'ashHSJhsd',
            // 'password' => '$2y$10$vPEpPHWLY7tkb1daMu062e.ZtmJZ.Nz4Ypqeri.LyWJda4OV.gFL.',
            // 'remember_token' => Str::random(10),
            // ]);
            // UserPermission::create([ 'user_id' => $sadmin->id, 'permission_id' => 1 ]);
    
            // $admin = User::create([
            // 'name' => 'Emploi Administrator',
            // 'email' => 'info@emploi.co',
            // 'username' => 'info',
            // 'email_verified_at' => now(),
            // 'email_verification' => 'ashHssSJhsd',
            // 'password' => '$2y$10$U1JD981T/1Parlt4Eq8il.aGvHROYEb.b8GnZMsR.ThJfFG/c0Cz.',
            // 'remember_token' => Str::random(10),
            // ]);
            // $adminPerm = UserPermission::create([ 'user_id' => $admin->id, 'permission_id' => 2 ]);
            // Jurisdiction::create([ 'user_permission_id' => $adminPerm->id, 'country_id' => 1 ]);
    
            VacancyType::create([ 'slug' => 'full-time', 'name' => 'Full-time']);
            VacancyType::create([ 'slug' => 'part-time', 'name' => 'Part-time']);
            VacancyType::create([ 'slug' => 'internships', 'name' => 'Internships']);
            VacancyType::create([ 'slug' => 'contract', 'name' => 'Contract']);
            VacancyType::create([ 'slug' => 'volunteer', 'name' => 'Volunteer']);
            VacancyType::create([ 'slug' => 'remote', 'name' => 'Remote']);
    
    
    
            SoftSkill::create([ 'name' => 'Verbal communication']);
            SoftSkill::create([ 'name' => 'Listening']);
            SoftSkill::create([ 'name' => 'Confidence']);
            SoftSkill::create([ 'name' => 'Negotiation']);
            SoftSkill::create([ 'name' => 'Persuasion']);
            SoftSkill::create([ 'name' => 'Presentation']);
            SoftSkill::create([ 'name' => 'Publc speaking']);
            SoftSkill::create([ 'name' => 'Empathy']);
            SoftSkill::create([ 'name' => 'Humour']);
            SoftSkill::create([ 'name' => 'Sensitive']);
            SoftSkill::create([ 'name' => 'Tolerance']);
            SoftSkill::create([ 'name' => 'Observation']);
            SoftSkill::create([ 'name' => 'Persistance']);
            SoftSkill::create([ 'name' => 'Authenticity']);
            SoftSkill::create([ 'name' => 'Generosity']);
            SoftSkill::create([ 'name' => 'Inspired']);
            SoftSkill::create([ 'name' => 'Attentive']);
            SoftSkill::create([ 'name' => 'Ethical']);
            SoftSkill::create([ 'name' => 'Committed']);
            SoftSkill::create([ 'name' => 'Disciplined']);
            SoftSkill::create([ 'name' => 'Organized']);
            SoftSkill::create([ 'name' => 'Independent']);
            SoftSkill::create([ 'name' => 'Open minded']);
            SoftSkill::create([ 'name' => 'Trainable']);
            SoftSkill::create([ 'name' => 'Respectfull']);
    
            PersonalityTrait::create([ 'name' => 'Humble']);
            PersonalityTrait::create([ 'name' => 'Honest']);
            PersonalityTrait::create([ 'name' => 'Modest']);
            PersonalityTrait::create([ 'name' => 'Loving']);
            PersonalityTrait::create([ 'name' => 'Friendly']);
            PersonalityTrait::create([ 'name' => 'Patient']);
            PersonalityTrait::create([ 'name' => 'Generous']);
            PersonalityTrait::create([ 'name' => 'Loyal']);
            PersonalityTrait::create([ 'name' => 'Integrity']);
            PersonalityTrait::create([ 'name' => 'Respectful']);
            PersonalityTrait::create([ 'name' => 'Responsible']);
            PersonalityTrait::create([ 'name' => 'Compassionate']);
            PersonalityTrait::create([ 'name' => 'Fair']);
            PersonalityTrait::create([ 'name' => 'Forgiving']);
            PersonalityTrait::create([ 'name' => 'Polite']);
            PersonalityTrait::create([ 'name' => 'Kind']);
            PersonalityTrait::create([ 'name' => 'Optimistic']);
            PersonalityTrait::create([ 'name' => 'Selflessness']);
            PersonalityTrait::create([ 'name' => 'Reliable']);
    
            Course::create([ 'name' => 'Purchasing And Supplies', 'education_level_id' => $cert->id ]);
            Course::create([ 'name' => 'Policy Planning And Implementation', 'education_level_id' => $cert->id ]);
            Course::create([ 'name' => 'Management Skills', 'education_level_id' => $cert->id ]);
            Course::create([ 'name' => 'Adult Education Community Development', 'education_level_id' => $cert->id ]);
            Course::create([ 'name' => 'Open And Distance Learning', 'education_level_id' => $cert->id ]);
            Course::create([ 'name' => 'Youth In Development Work', 'education_level_id' => $cert->id ]);
            Course::create([ 'name' => 'Early Childhood', 'education_level_id' => $cert->id ]);
            Course::create([ 'name' => 'Sales And Marketing', 'education_level_id' => $cert->id ]);
            Course::create([ 'name' => 'Business Management', 'education_level_id' => $cert->id ]);
            Course::create([ 'name' => 'Public Relations', 'education_level_id' => $cert->id ]);
            Course::create([ 'name' => 'Human Resource Management', 'education_level_id' => $cert->id ]);
            Course::create([ 'name' => 'Guidance And Counseling', 'education_level_id' => $cert->id ]);
            Course::create([ 'name' => 'Purchasing And Supplies', 'education_level_id' => $cert->id ]);
            Course::create([ 'name' => 'Programmes in Agriculture and Veterinary Sciences', 'education_level_id' => $cert->id ]);
            Course::create([ 'name' => 'Agricultural Information And Communication Management', 'education_level_id' => $cert->id ]);
            Course::create([ 'name' => 'Dairy Management', 'education_level_id' => $cert->id ]);
            Course::create([ 'name' => 'Poultry Management', 'education_level_id' => $cert->id ]);
            Course::create([ 'name' => 'Artificial Insemination And Fertility Management', 'education_level_id' => $cert->id ]);
            Course::create([ 'name' => 'Artificial Insemination', 'education_level_id' => $cert->id ]);
            Course::create([ 'name' => 'Epidemiology And Disease Surveillance', 'education_level_id' => $cert->id ]);
            Course::create([ 'name' => 'Floriculture', 'education_level_id' => $cert->id ]);
            Course::create([ 'name' => 'Phytosanitary Measures', 'education_level_id' => $cert->id ]);
            Course::create([ 'name' => 'Business Management', 'education_level_id' => $cert->id ]);
            Course::create([ 'name' => 'Purchasing And Supplies Management', 'education_level_id' => $cert->id ]);
            Course::create([ 'name' => 'Public Relations', 'education_level_id' => $cert->id ]);
            Course::create([ 'name' => 'Guidance And Counseling – L16', 'education_level_id' => $cert->id ]);
            Course::create([ 'name' => 'Human Resource Management', 'education_level_id' => $cert->id ]);
            Course::create([ 'name' => 'Programmes in Mombasa Campus', 'education_level_id' => $cert->id ]);
            Course::create([ 'name' => 'Project Planning And Management', 'education_level_id' => $cert->id ]);
            Course::create([ 'name' => 'Purchasing And Supplies', 'education_level_id' => $cert->id ]);
            Course::create([ 'name' => 'Business Management', 'education_level_id' => $cert->id ]);
            Course::create([ 'name' => 'Sales And Marketing', 'education_level_id' => $cert->id ]);
            Course::create([ 'name' => 'Human Resource Management', 'education_level_id' => $cert->id ]);
            Course::create([ 'name' => 'Guidance And Counseling', 'education_level_id' => $cert->id ]);
            Course::create([ 'name' => 'Public Relations', 'education_level_id' => $cert->id ]);
    
    
            Course::create([ 'name' => 'Business Management', 'education_level_id' => $dip->id ]);
            Course::create([ 'name' => 'Sales & Marketing', 'education_level_id' => $dip->id ]);
            Course::create([ 'name' => 'Adult Education And Community Development', 'education_level_id' => $dip->id ]);
            Course::create([ 'name' => 'Youth Development Work', 'education_level_id' => $dip->id ]);
            Course::create([ 'name' => 'Early Childhood Education', 'education_level_id' => $dip->id ]);
            Course::create([ 'name' => 'Purchasing & Supplies Management', 'education_level_id' => $dip->id ]);
            Course::create([ 'name' => 'Business Management', 'education_level_id' => $dip->id ]);
            Course::create([ 'name' => 'Sales & Marketing', 'education_level_id' => $dip->id ]);
            Course::create([ 'name' => 'Human Resource Management', 'education_level_id' => $dip->id ]);
            Course::create([ 'name' => 'Public Relations', 'education_level_id' => $dip->id ]);
            Course::create([ 'name' => 'Guidance And Counseling', 'education_level_id' => $dip->id ]);
            Course::create([ 'name' => 'Leather Technology', 'education_level_id' => $dip->id ]);
            Course::create([ 'name' => 'Estate Agency And Property Management', 'education_level_id' => $dip->id ]);
            Course::create([ 'name' => 'Medical Diagnostic Ultrasound', 'education_level_id' => $dip->id ]);
            Course::create([ 'name' => 'Audiology And Public Health Otology', 'education_level_id' => $dip->id ]);
            Course::create([ 'name' => 'Women, Leadership And Governance In Africa', 'education_level_id' => $dip->id ]);
            Course::create([ 'name' => 'Chinese Language And Culture', 'education_level_id' => $dip->id ]);
            Course::create([ 'name' => 'International Studies/strategic Studies', 'education_level_id' => $dip->id ]);
            Course::create([ 'name' => 'International Studies', 'education_level_id' => $dip->id ]);
            Course::create([ 'name' => 'Theatre And Film Studies', 'education_level_id' => $dip->id ]);
            Course::create([ 'name' => 'Criminology And Social Order', 'education_level_id' => $dip->id ]);
            Course::create([ 'name' => 'Social Work And Social Development', 'education_level_id' => $dip->id ]);
            Course::create([ 'name' => 'Purchasing And Supplies Management', 'education_level_id' => $dip->id ]);
            Course::create([ 'name' => 'Human Resource Management', 'education_level_id' => $dip->id ]);
            Course::create([ 'name' => 'Guidance And Counseling', 'education_level_id' => $dip->id ]);
            Course::create([ 'name' => 'Sales And Marketing', 'education_level_id' => $dip->id ]);
            Course::create([ 'name' => 'Guidance And Counseling', 'education_level_id' => $dip->id ]);
            Course::create([ 'name' => 'Project Planning And Management', 'education_level_id' => $dip->id ]);
            Course::create([ 'name' => 'Human Resource Management', 'education_level_id' => $dip->id ]);
            Course::create([ 'name' => 'Public Relations', 'education_level_id' => $dip->id ]);
            Course::create([ 'name' => 'Purchasing And Supplies Management', 'education_level_id' => $dip->id ]);
            Course::create([ 'name' => 'Business Management', 'education_level_id' => $dip->id ]);
            Course::create([ 'name' => 'Project Planning And Management', 'education_level_id' => $dip->id ]);
            Course::create([ 'name' => 'Adult Education And Community Development', 'education_level_id' => $dip->id ]);
            Course::create([ 'name' => 'Youth Development Work', 'education_level_id' => $dip->id ]);
            Course::create([ 'name' => 'Business Management', 'education_level_id' => $dip->id ]);
            Course::create([ 'name' => 'Sales And Marketing', 'education_level_id' => $dip->id ]);
            Course::create([ 'name' => 'Human Resource Management', 'education_level_id' => $dip->id ]);
            Course::create([ 'name' => 'Purchasing And Supplies Management', 'education_level_id' => $dip->id ]);
            Course::create([ 'name' => 'Public Relations', 'education_level_id' => $dip->id ]);
            Course::create([ 'name' => 'Guidance And Counseling', 'education_level_id' => $dip->id ]);
    
            Course::create([ 'name' => 'Bachelor Of Science ( Food Science & Technology)', 'education_level_id' => $deg->id ]);
            Course::create([ 'name' => 'Bachelors Of Science ( Agriculture,education And Extension)', 'education_level_id' => $deg->id ]);
            Course::create([ 'name' => 'Bachelors Of Science (agribusiness Management)', 'education_level_id' => $deg->id ]);
            Course::create([ 'name' => 'Bachelors Of Science (food Science, Nutrition & Dietetics)', 'education_level_id' => $deg->id ]);
            Course::create([ 'name' => 'Bachelors Of Science in Climate Change & Development', 'education_level_id' => $deg->id ]);
            Course::create([ 'name' => 'Bachelor Of Science In Agribusiness Management', 'education_level_id' => $deg->id ]);
            Course::create([ 'name' => 'Bachelor Of Science in agricultural Economics', 'education_level_id' => $deg->id ]);
            Course::create([ 'name' => 'Bachelor Of Science in agricultural Education And Extension', 'education_level_id' => $deg->id ]);
            Course::create([ 'name' => 'Bachelor Of Science In Agriculture(animal Science Major)', 'education_level_id' => $deg->id ]);
            Course::create([ 'name' => 'Bachelor Of Science Fisheries And Aquaculture Management', 'education_level_id' => $deg->id ]);
            Course::create([ 'name' => 'Bachelor Of Science In Wildlife Management And Conservation', 'education_level_id' => $deg->id ]);
            Course::create([ 'name' => 'Bachelor of Science in Food Science And Technology', 'education_level_id' => $deg->id ]);
            Course::create([ 'name' => 'Bachelor of Science in Food Nutrition And Dietetics', 'education_level_id' => $deg->id ]);
            Course::create([ 'name' => 'Bachelor of Science in (agriculture)', 'education_level_id' => $deg->id ]);
            Course::create([ 'name' => 'Bachelor of Science in ( Range Management)', 'education_level_id' => $deg->id ]);
            Course::create([ 'name' => 'Bachelor of Science in Management Of Agroecosystems & Environment', 'education_level_id' => $deg->id ]);
            Course::create([ 'name' => 'Bachelor Of Science In Horticulture', 'education_level_id' => $deg->id ]);
            Course::create([ 'name' => 'Bachelor of Science in Bio-medical Technology', 'education_level_id' => $deg->id ]);
            Course::create([ 'name' => 'Bachelor Of Science In Wildlife Management', 'education_level_id' => $deg->id ]);
            Course::create([ 'name' => 'Bachelor Of Science in Veterinary Medicine', 'education_level_id' => $deg->id ]);
            Course::create([ 'name' => 'Bachelor of Science In Wildlife Management And Conservation', 'education_level_id' => $deg->id ]);
            Course::create([ 'name' => 'Bachelor Of Science In Environmental Chemistry', 'education_level_id' => $deg->id ]);
            Course::create([ 'name' => 'Bachelor Of Science In Analytical Chemistry', 'education_level_id' => $deg->id ]);
            Course::create([ 'name' => 'Bachelor of Science in Industrial Chemistry', 'education_level_id' => $deg->id ]);
            Course::create([ 'name' => 'Bachelor of Science in Chemistry', 'education_level_id' => $deg->id ]);
            Course::create([ 'name' => 'Bachelor Of Science In Petroleum Geoscience', 'education_level_id' => $deg->id ]);
            Course::create([ 'name' => 'Bachelor Of Science In Actuarial Science', 'education_level_id' => $deg->id ]);
            Course::create([ 'name' => 'Bachelor Of Science In Mathematics', 'education_level_id' => $deg->id ]);
            Course::create([ 'name' => 'Bachelor Of Science In Statistics', 'education_level_id' => $deg->id ]);
            Course::create([ 'name' => 'Bachelor of Science in (meteorology)', 'education_level_id' => $deg->id ]);
            Course::create([ 'name' => 'Bachelor Of Science In Atmospheric Science', 'education_level_id' => $deg->id ]);
            Course::create([ 'name' => 'Bachelor of Science in (microprocessor Technology & Instrumentation)', 'education_level_id' => $deg->id ]);
            Course::create([ 'name' => 'Bachelor of Science In Astronomy And Astrophysics', 'education_level_id' => $deg->id ]);
            Course::create([ 'name' => 'Bachelor Of Science In Physics', 'education_level_id' => $deg->id ]);
            Course::create([ 'name' => 'Bachelor of arts in education Science (physics)', 'education_level_id' => $deg->id ]);
            Course::create([ 'name' => 'Bachelor of Science in (biology)', 'education_level_id' => $deg->id ]);
            Course::create([ 'name' => 'Bachelor of Science in Microbiology And Biotechnology', 'education_level_id' => $deg->id ]);
            Course::create([ 'name' => 'Bachelor Of Science In Environmental Conservation And Natural Resource Management', 'education_level_id' => $deg->id ]);
            Course::create([ 'name' => 'Bachelor of Science in Computer Science', 'education_level_id' => $deg->id ]);
            Course::create([ 'name' => 'Bachelor of Science in Industrial Chemistry', 'education_level_id' => $deg->id ]);
            Course::create([ 'name' => 'Bachelor of Science in Geology ', 'education_level_id' => $deg->id ]);
            Course::create([ 'name' => 'Bachelor Of Education (science)', 'education_level_id' => $deg->id ]);
            Course::create([ 'name' => 'Bachelor of Science in Analytical Chemistry', 'education_level_id' => $deg->id ]);
            Course::create([ 'name' => 'Bachelor of Arts in Graphic Design', 'education_level_id' => $deg->id ]);
            Course::create([ 'name' => 'Bachelor of Science in Civil Engineering', 'education_level_id' => $deg->id ]);
            Course::create([ 'name' => 'Bachelor of Science in (environmental And Biosystems Engineering)', 'education_level_id' => $deg->id ]);
            Course::create([ 'name' => 'Bachelor of Science in ( Electrical And Electronic Engineering)', 'education_level_id' => $deg->id ]);
            Course::create([ 'name' => 'Bachelor of Science in (surveying)', 'education_level_id' => $deg->id ]);
            Course::create([ 'name' => 'Bachelor of Science in (geospatial Engineering)', 'education_level_id' => $deg->id ]);
            Course::create([ 'name' => 'Bachelor of Science in (mechanical Engineering)', 'education_level_id' => $deg->id ]);
            Course::create([ 'name' => 'Bachelor Of Real Estate', 'education_level_id' => $deg->id ]);
            Course::create([ 'name' => 'Bachelor Of Construction Management', 'education_level_id' => $deg->id ]);
            Course::create([ 'name' => 'Bachelor Of Quantity Surveying', 'education_level_id' => $deg->id ]);
            Course::create([ 'name' => 'Bachelor of Science in (urban & Regional Planning)', 'education_level_id' => $deg->id ]);
            Course::create([ 'name' => 'Bachelor Of Commerce By Distance', 'education_level_id' => $deg->id ]);
            Course::create([ 'name' => 'Bachelor Of Arts (distance)', 'education_level_id' => $deg->id ]);
            Course::create([ 'name' => 'Bachelor Of Education (arts, B.ed Distance)', 'education_level_id' => $deg->id ]);
            Course::create([ 'name' => 'Bachelor Of Education Arts In History And Geography', 'education_level_id' => $deg->id ]);
            Course::create([ 'name' => 'Bachelor Of Education Arts In History And Cre', 'education_level_id' => $deg->id ]);
            Course::create([ 'name' => 'Bachelor Of Education Arts In Geography And Mathematics', 'education_level_id' => $deg->id ]);
            Course::create([ 'name' => 'Bachelor Of Education Arts In Double Mathematics', 'education_level_id' => $deg->id ]);
            Course::create([ 'name' => 'Bachelor Of Education Arts In Geography And Environmental ', 'education_level_id' => $deg->id ]);
            Course::create([ 'name' => 'Bachelor of Arts in Business Studies', 'education_level_id' => $deg->id ]);
            Course::create([ 'name' => 'Bachelor Of Education Arts In English And Literature', 'education_level_id' => $deg->id ]);
            Course::create([ 'name' => 'Bachelor Of Education Science In Physics And Geography And Environmental Studies', 'education_level_id' => $deg->id ]);
            Course::create([ 'name' => 'Bachelor Of Education Science In Double Mathematics', 'education_level_id' => $deg->id ]);
            Course::create([ 'name' => 'Bachelor Of Science In Physics', 'education_level_id' => $deg->id ]);
            Course::create([ 'name' => 'Bachelor Of Science In Analytical Chemistry', 'education_level_id' => $deg->id ]);
            Course::create([ 'name' => 'Bachelor Of Science In Industrial Chemistry', 'education_level_id' => $deg->id ]);
            Course::create([ 'name' => 'Bachelor Of Science In Geology', 'education_level_id' => $deg->id ]);
            Course::create([ 'name' => 'Bachelor Of Science In Meteorology', 'education_level_id' => $deg->id ]);
            Course::create([ 'name' => 'Bachelor Of Science In Pure Mathematics', 'education_level_id' => $deg->id ]);
            Course::create([ 'name' => 'Bachelor Of Science In Applied Mathematics', 'education_level_id' => $deg->id ]);
            Course::create([ 'name' => 'Bachelor Of Science In Zoology', 'education_level_id' => $deg->id ]);
            Course::create([ 'name' => 'Bachelor Of Science In Geography And Environmental Studies', 'education_level_id' => $deg->id ]);
            Course::create([ 'name' => 'Bachelor Of Arts In History', 'education_level_id' => $deg->id ]);
            Course::create([ 'name' => 'Bachelor Of Arts In Tourism', 'education_level_id' => $deg->id ]);
            Course::create([ 'name' => 'Bachelor Of Arts In English Language', 'education_level_id' => $deg->id ]);
            Course::create([ 'name' => 'Bachelor Of Arts In Literature', 'education_level_id' => $deg->id ]);
            Course::create([ 'name' => 'Bachelor Of Arts In Kiswahili', 'education_level_id' => $deg->id ]);
            Course::create([ 'name' => 'Bachelor Of Arts In Communication', 'education_level_id' => $deg->id ]);
            Course::create([ 'name' => 'Bachelor Of Arts In Arabic Studies', 'education_level_id' => $deg->id ]);
            Course::create([ 'name' => 'Bachelor Of Arts Sociology And Social Work', 'education_level_id' => $deg->id ]);
            Course::create([ 'name' => 'Bachelor Of Arts Christian Religious Studies', 'education_level_id' => $deg->id ]);
            Course::create([ 'name' => 'Bachelor Of Arts In Philosophy', 'education_level_id' => $deg->id ]);
            Course::create([ 'name' => 'Bachelor Of Arts In Psychology', 'education_level_id' => $deg->id ]);
            Course::create([ 'name' => 'Bachelor Of Arts In Guidance And Counseling', 'education_level_id' => $deg->id ]);
            Course::create([ 'name' => 'Bachelor Of Arts In Geography And Environmental Studies', 'education_level_id' => $deg->id ]);
            Course::create([ 'name' => 'Bachelor Of Commerce In Accounting', 'education_level_id' => $deg->id ]);
            Course::create([ 'name' => 'Bachelor Of Commerce In Finance', 'education_level_id' => $deg->id ]);
            Course::create([ 'name' => 'Bachelor Of Commerce In Marketing', 'education_level_id' => $deg->id ]);
            Course::create([ 'name' => 'Bachelor Of Commerce In Human Resource Management', 'education_level_id' => $deg->id ]);
            Course::create([ 'name' => 'Bachelor Of Commerce In Insurance And Management', 'education_level_id' => $deg->id ]);
            Course::create([ 'name' => 'Bachelor Of Commerce In Procurement And Purchasing And Supplies', 'education_level_id' => $deg->id ]);
            Course::create([ 'name' => 'Bachelor Of Commerce In Operations Management', 'education_level_id' => $deg->id ]);
            Course::create([ 'name' => 'Bachelor Of Commerce In Business Information Systems', 'education_level_id' => $deg->id ]);
            Course::create([ 'name' => 'Bachelor Of Arts In Political Science And Public Administration', 'education_level_id' => $deg->id ]);
            Course::create([ 'name' => 'Bachelor Of arts in Education (arts, B. Ed)', 'education_level_id' => $deg->id ]);
            Course::create([ 'name' => 'Bachelor Of Education (science)', 'education_level_id' => $deg->id ]);
            Course::create([ 'name' => 'Bachelor Of Education In Early Childhood Education', 'education_level_id' => $deg->id ]);
            Course::create([ 'name' => 'Bachelor Of Education (early Childhood)', 'education_level_id' => $deg->id ]);
            Course::create([ 'name' => 'Bachelor Of Education (ict)', 'education_level_id' => $deg->id ]);
            Course::create([ 'name' => 'Bachelors In Project Planning And Management', 'education_level_id' => $deg->id ]);
            Course::create([ 'name' => 'Bachelor Of Education (science)', 'education_level_id' => $deg->id ]);
            Course::create([ 'name' => 'Bachelor In Education (ict)', 'education_level_id' => $deg->id ]);
            Course::create([ 'name' => 'Bachelor Of Education (physical Education)', 'education_level_id' => $deg->id ]);
            Course::create([ 'name' => 'Bachelor of Science in Biochemistry – ( Revised Edition)', 'education_level_id' => $deg->id ]);
            Course::create([ 'name' => 'Bachelor of Science in Human Anatomy', 'education_level_id' => $deg->id ]);
            Course::create([ 'name' => 'Bachelor Of Science In Medical Laboratory Sciences And Technology (bsc Mlst)', 'education_level_id' => $deg->id ]);
            Course::create([ 'name' => 'Bachelor Of Science (intercalated) (honors) In Medical Physiology', 'education_level_id' => $deg->id ]);
            Course::create([ 'name' => 'Bachelor Of Medicine And Bachelor Of Surgery', 'education_level_id' => $deg->id ]);
            Course::create([ 'name' => 'Bachelor of Science in Medical Physiology', 'education_level_id' => $deg->id ]);
            Course::create([ 'name' => 'Bachelor of Science( Nursing)', 'education_level_id' => $deg->id ]);
            Course::create([ 'name' => 'Bachelor Of Dental Surgery ', 'education_level_id' => $deg->id ]);
            Course::create([ 'name' => 'Bachelor Of Pharmacy', 'education_level_id' => $deg->id ]);
            Course::create([ 'name' => 'Bachelor Of Arts In Gender And Development', 'education_level_id' => $deg->id ]);
            Course::create([ 'name' => 'Bachelor Of Arts In Anthropology', 'education_level_id' => $deg->id ]);
            Course::create([ 'name' => 'Bachelor Of Economics', 'education_level_id' => $deg->id ]);
            Course::create([ 'name' => 'Bachelor Of Economics & Statistics', 'education_level_id' => $deg->id ]);
            Course::create([ 'name' => 'Bachelor Of Commerce – Finance Option', 'education_level_id' => $deg->id ]);
            Course::create([ 'name' => 'Bachelor Of Commerce- Accounting Option', 'education_level_id' => $deg->id ]);
            Course::create([ 'name' => 'Bachelor of arts in German Studies ', 'education_level_id' => $deg->id ]);
            Course::create([ 'name' => 'Bachelor of Travel and Tour Operations Management', 'education_level_id' => $deg->id ]);
            Course::create([ 'name' => 'Bachelor of Tourism Management ', 'education_level_id' => $deg->id ]);
            Course::create([ 'name' => 'Bachelor of Sports Management', 'education_level_id' => $deg->id ]);
            Course::create([ 'name' => 'Bachelor of Science in Strategic Management', 'education_level_id' => $deg->id ]);
            Course::create([ 'name' => 'Bachelor of Science in Project Planning and Management', 'education_level_id' => $deg->id ]);
            Course::create([ 'name' => 'Bachelor of Science in Physical therapy', 'education_level_id' => $deg->id ]);
            Course::create([ 'name' => 'Bachelor of Science in Nursing', 'education_level_id' => $deg->id ]);
            Course::create([ 'name' => 'Bachelor of Science in Media Science', 'education_level_id' => $deg->id ]);
            Course::create([ 'name' => 'Bachelor of Science in Information Sciences', 'education_level_id' => $deg->id ]);
            Course::create([ 'name' => 'Bachelor of Science in Informatics', 'education_level_id' => $deg->id ]);
            Course::create([ 'name' => 'Bachelor of Science in Human Resource Management', 'education_level_id' => $deg->id ]);
            Course::create([ 'name' => 'Bachelor of Science in Graphic Communication and Advertising', 'education_level_id' => $deg->id ]);
            Course::create([ 'name' => 'Bachelor of Science in Environmental Health', 'education_level_id' => $deg->id ]);
            Course::create([ 'name' => 'Bachelor of Science in Entrepreneurship', 'education_level_id' => $deg->id ]);
            Course::create([ 'name' => 'Bachelor of Science in Community Health Education', 'education_level_id' => $deg->id ]);
            Course::create([ 'name' => 'Bachelor of Science in Communication and Public Relations', 'education_level_id' => $deg->id ]);
            Course::create([ 'name' => 'Bachelor of Science in Communication and Journalism', 'education_level_id' => $deg->id ]);
            Course::create([ 'name' => 'Bachelor of Science in Animal Science', 'education_level_id' => $deg->id ]);
            Course::create([ 'name' => 'Bachelor of Science in Agricultural Extension Education', 'education_level_id' => $deg->id ]);
            Course::create([ 'name' => 'Bachelor of Science in Agricultural Biotechnology', 'education_level_id' => $deg->id ]);
            Course::create([ 'name' => 'Bachelor of Science in Agribusiness Management', 'education_level_id' => $deg->id ]);
            Course::create([ 'name' => 'Bachelor of Science Environmental Studies', 'education_level_id' => $deg->id ]);
            Course::create([ 'name' => 'Bachelor of Science (Applied Statistics with Computing)', 'education_level_id' => $deg->id ]);
            Course::create([ 'name' => 'Bachelor of Arts in Religious Studies', 'education_level_id' => $deg->id ]);
            Course::create([ 'name' => 'Bachelor of Maritime Management ', 'education_level_id' => $deg->id ]);
            Course::create([ 'name' => 'Bachelor of Arts in Political Science and Public', 'education_level_id' => $deg->id ]);
            Course::create([ 'name' => 'Bachelor of Arts in Penology & Security Studies', 'education_level_id' => $deg->id ]);
            Course::create([ 'name' => 'Bachelor of Hotel and Hospitality management', 'education_level_id' => $deg->id ]);
            Course::create([ 'name' => 'Bachelor of Engineering in Mechanical & Production Engineering', 'education_level_id' => $deg->id ]);
            Course::create([ 'name' => 'Bachelor of Engineering in Industrial & Textile Engineering', 'education_level_id' => $deg->id ]);
            Course::create([ 'name' => 'Bachelor of Engineering in Electrical & Telecommunications Engineering.', 'education_level_id' => $deg->id ]);
            Course::create([ 'name' => 'Bachelor of Engineering in Electrical & Electronics Engineering.', 'education_level_id' => $deg->id ]);
            Course::create([ 'name' => 'Bachelor of Engineering in Civil & Structural Engineering', 'education_level_id' => $deg->id ]);
            Course::create([ 'name' => 'Bachelor of Engineering in Chemical & Process Engineering', 'education_level_id' => $deg->id ]);
            Course::create([ 'name' => 'Bachelor of Arts in Theology', 'education_level_id' => $deg->id ]);
            Course::create([ 'name' => 'Bachelor of Arts in Theatre', 'education_level_id' => $deg->id ]);
            Course::create([ 'name' => 'Bachelor of Arts in Religious Studies', 'education_level_id' => $deg->id ]);
            Course::create([ 'name' => 'Bachelor of Arts in Psychology', 'education_level_id' => $deg->id ]);
            Course::create([ 'name' => 'Bachelor of Arts in Philosophy', 'education_level_id' => $deg->id ]);
            Course::create([ 'name' => 'Bachelor of Arts in Penology & Security Studies', 'education_level_id' => $deg->id ]);
            Course::create([ 'name' => 'Bachelor of Business Management', 'education_level_id' => $deg->id ]);
            Course::create([ 'name' => 'Bachelor of Arts in Theology', 'education_level_id' => $deg->id ]);
            Course::create([ 'name' => 'Bachelor of Arts in Theatre', 'education_level_id' => $deg->id ]);
            Course::create([ 'name' => 'Bachelor of Arts in Sociology', 'education_level_id' => $deg->id ]);
            Course::create([ 'name' => 'Bachelor of Arts in Social Work', 'education_level_id' => $deg->id ]);
            Course::create([ 'name' => 'Bachelor of Arts in Religious Studies', 'education_level_id' => $deg->id ]);
            Course::create([ 'name' => 'Bachelor Of Arts In International Studies', 'education_level_id' => $deg->id ]);
            Course::create([ 'name' => 'Bachelor Of Arts in Korean Studies', 'education_level_id' => $deg->id ]);
            Course::create([ 'name' => 'Bachelor Of Arts (broadcast Production)', 'education_level_id' => $deg->id ]);
            Course::create([ 'name' => 'Bachelor Of Arts (journalism & Media Studies)', 'education_level_id' => $deg->id ]);
            Course::create([ 'name' => 'Bachelor of Science in Communication Skills', 'education_level_id' => $deg->id ]);
            Course::create([ 'name' => 'Bachelor Of Law', 'education_level_id' => $deg->id ]);
            Course::create([ 'name' => 'Bachelor Of Arts In Literature', 'education_level_id' => $deg->id ]);
            Course::create([ 'name' => 'Bachelor Of Arts In Performing Arts', 'education_level_id' => $deg->id ]);
            Course::create([ 'name' => 'Bachelor Of Commerce', 'education_level_id' => $deg->id ]);
            Course::create([ 'name' => 'Bachelor Of Psychology (counselling)', 'education_level_id' => $deg->id ]);
            Course::create([ 'name' => 'Bachelor Of Arts In Psychology', 'education_level_id' => $deg->id ]);
            Course::create([ 'name' => 'Bachelor Of Arts In Social Work', 'education_level_id' => $deg->id ]);
            Course::create([ 'name' => 'Bachelor Of Arts In Sociology', 'education_level_id' => $deg->id ]);
            Course::create([ 'name' => 'Bachelor Of Criminology And Criminal Justice', 'education_level_id' => $deg->id ]);
            Course::create([ 'name' => 'Bachelor Of Project Planning And Management', 'education_level_id' => $deg->id ]);
            Course::create([ 'name' => 'Bachelor of Arts in Penology & Security Studies', 'education_level_id' => $deg->id ]);
            Course::create([ 'name' => 'Bachelor of Arts in Philosophy', 'education_level_id' => $deg->id ]);
            Course::create([ 'name' => 'Bachelor of Arts in Political Science and Public', 'education_level_id' => $deg->id ]);
    
            Course::create([ 'name' => 'Masters Of Science In Agricultural Economics', 'education_level_id' => $mast->id ]);
            Course::create([ 'name' => 'Master Of Science In Plant Breeding', 'education_level_id' => $mast->id ]);
            Course::create([ 'name' => 'Masters Of Science in Crop Protection', 'education_level_id' => $mast->id ]);
            Course::create([ 'name' => 'Masters Of Science in Plant Pathology', 'education_level_id' => $mast->id ]);
            Course::create([ 'name' => 'Master Of Science(food Science And Technology)', 'education_level_id' => $mast->id ]);
            Course::create([ 'name' => 'Master Of Science(agricultural And Applied Economics)', 'education_level_id' => $mast->id ]);
            Course::create([ 'name' => 'Master Of Science In Land And Water Management', 'education_level_id' => $mast->id ]);
            Course::create([ 'name' => 'Master Of Science In Soil Science', 'education_level_id' => $mast->id ]);
            Course::create([ 'name' => 'Master Of Science In Agricultural Information And Communication Management', 'education_level_id' => $mast->id ]);
            Course::create([ 'name' => 'Master Of Science In Agricultural And Applied Economics', 'education_level_id' => $mast->id ]);
            Course::create([ 'name' => 'Master of Agricultural Economics (local)', 'education_level_id' => $mast->id ]);
            Course::create([ 'name' => 'Master Of Science In Animal Genetics And Breeding', 'education_level_id' => $mast->id ]);
            Course::create([ 'name' => 'Master Of Science In Livestock Production Systems', 'education_level_id' => $mast->id ]);
            Course::create([ 'name' => 'Master Of Science In Poultry Science', 'education_level_id' => $mast->id ]);
            Course::create([ 'name' => 'Master Of Science In Animal Nutrition And Feed Science', 'education_level_id' => $mast->id ]);
            Course::create([ 'name' => 'Master Of Science In Wildlife Health And Management', 'education_level_id' => $mast->id ]);
            Course::create([ 'name' => 'Master Of Veterinary Surgery', 'education_level_id' => $mast->id ]);
            Course::create([ 'name' => 'Masters Of Science In Clinical Studies', 'education_level_id' => $mast->id ]);
            Course::create([ 'name' => 'Master Of Veterinary Medicine ', 'education_level_id' => $mast->id ]);
            Course::create([ 'name' => 'Masters Of Theriogenology', 'education_level_id' => $mast->id ]);
            Course::create([ 'name' => 'Masters of Applied Human Nutrition', 'education_level_id' => $mast->id ]);
            Course::create([ 'name' => 'Masters of Applied Human Nutrition', 'education_level_id' => $mast->id ]);
            Course::create([ 'name' => 'Masters in Food Science And Technology', 'education_level_id' => $mast->id ]);
            Course::create([ 'name' => 'Masters in Food Safety And Quality', 'education_level_id' => $mast->id ]);
            Course::create([ 'name' => 'Masters in Management Of Agroecosystems And Environment', 'education_level_id' => $mast->id ]);
            Course::create([ 'name' => 'Masters in Sustainable Soil Resource Management', 'education_level_id' => $mast->id ]);
            Course::create([ 'name' => 'Masters of Agroforestry', 'education_level_id' => $mast->id ]);
            Course::create([ 'name' => 'Masters of  Range Management', 'education_level_id' => $mast->id ]);
            Course::create([ 'name' => 'Masters of Land And Water Management', 'education_level_id' => $mast->id ]);
            Course::create([ 'name' => 'Masters of Soil Science', 'education_level_id' => $mast->id ]);
            Course::create([ 'name' => 'Master Of Science In Leather Science', 'education_level_id' => $mast->id ]);
            Course::create([ 'name' => 'Master Of Science In Pharmacology And Toxicology', 'education_level_id' => $mast->id ]);
            Course::create([ 'name' => 'Degree Of Master Of Veterinary Public Health', 'education_level_id' => $mast->id ]);
            Course::create([ 'name' => 'Degree Of Master Of Science In Veterinary Epidemiology And Economics', 'education_level_id' => $mast->id ]);
            Course::create([ 'name' => 'Master Of Science In Natural Products And Bioprospecting', 'education_level_id' => $mast->id ]);
            Course::create([ 'name' => 'Masters of Agronomy', 'education_level_id' => $mast->id ]);
            Course::create([ 'name' => 'Masters of Agricultural Resource Management', 'education_level_id' => $mast->id ]);
            Course::create([ 'name' => 'Masters of Crop Protection', 'education_level_id' => $mast->id ]);
            Course::create([ 'name' => 'Masters of Horticulture', 'education_level_id' => $mast->id ]);
            Course::create([ 'name' => 'Masters of Plant Breeding And Biotechnology', 'education_level_id' => $mast->id ]);
            Course::create([ 'name' => 'Master Of Science In Plant Pathology', 'education_level_id' => $mast->id ]);
            Course::create([ 'name' => 'Master Of Science In Veterinary Pathology And Diagnostics', 'education_level_id' => $mast->id ]);
            Course::create([ 'name' => 'Degree Of Master Of Science In Natural Products And Bioprospecting', 'education_level_id' => $mast->id ]);
            Course::create([ 'name' => 'Master Of Science In Reproductive Biology', 'education_level_id' => $mast->id ]);
            Course::create([ 'name' => 'Master Of Science In Veterinary Anatomy And Cell Biology', 'education_level_id' => $mast->id ]);
            Course::create([ 'name' => 'Master Of Science In Comparative Animal Physiology', 'education_level_id' => $mast->id ]);
            Course::create([ 'name' => 'Masters In Veterinary Pathology,microbiology & Parasitology', 'education_level_id' => $mast->id ]);
            Course::create([ 'name' => 'Master Of Science In Applied Microbiology', 'education_level_id' => $mast->id ]);
            Course::create([ 'name' => 'Master Of Science In Fish Science', 'education_level_id' => $mast->id ]);
            Course::create([ 'name' => 'Master Of Science In Clinical Pathology And Laboratory Diagnosis', 'education_level_id' => $mast->id ]);
            Course::create([ 'name' => 'Masters In Applied Veterinary Parasitology', 'education_level_id' => $mast->id ]);
            Course::create([ 'name' => 'Master Of Science In Veterinary Pathology And Microbiology', 'education_level_id' => $mast->id ]);
            Course::create([ 'name' => 'Master Of Science In Applied Veterinary Parasitology', 'education_level_id' => $mast->id ]);
            Course::create([ 'name' => 'Masters Of Science In Environmental Governance', 'education_level_id' => $mast->id ]);
            Course::create([ 'name' => 'Master Of Science In Biotechnology', 'education_level_id' => $mast->id ]);
            Course::create([ 'name' => 'Master Of Science In Bioinformatics', 'education_level_id' => $mast->id ]);
            Course::create([ 'name' => 'Masters Of Chemistry', 'education_level_id' => $mast->id ]);
            Course::create([ 'name' => 'Masters Of Environmental Chemistry', 'education_level_id' => $mast->id ]);
            Course::create([ 'name' => 'Masters of Analytical chemistry', 'education_level_id' => $mast->id ]);
            Course::create([ 'name' => 'Masters of Industrial Chemistry', 'education_level_id' => $mast->id ]);
            Course::create([ 'name' => 'Masters of Organic Chemistry', 'education_level_id' => $mast->id ]);
            Course::create([ 'name' => 'Masters of Inorganic Chemistry', 'education_level_id' => $mast->id ]);
            Course::create([ 'name' => 'Master Of Science In Geology', 'education_level_id' => $mast->id ]);
            Course::create([ 'name' => 'Master Of Climate Change Adaptation ', 'education_level_id' => $mast->id ]);
            Course::create([ 'name' => 'Master In Climate Change Adapatation', 'education_level_id' => $mast->id ]);
            Course::create([ 'name' => 'Master Of Science In Actuarial Science', 'education_level_id' => $mast->id ]);
            Course::create([ 'name' => 'Master Of Science In Biometry', 'education_level_id' => $mast->id ]);
            Course::create([ 'name' => 'Master Of Science In Pure Mathematics', 'education_level_id' => $mast->id ]);
            Course::create([ 'name' => 'Master Of Science In Statistics', 'education_level_id' => $mast->id ]);
            Course::create([ 'name' => 'Master Of Science In Social Statistics', 'education_level_id' => $mast->id ]);
            Course::create([ 'name' => 'Master Of Science In Applied Mathematics', 'education_level_id' => $mast->id ]);
            Course::create([ 'name' => 'Master Of Science In Climate Change', 'education_level_id' => $mast->id ]);
            Course::create([ 'name' => 'Master Of Science In Meteorology', 'education_level_id' => $mast->id ]);
            Course::create([ 'name' => 'Master Of Science In Agrometeorology', 'education_level_id' => $mast->id ]);
            Course::create([ 'name' => 'Master Of Science In Aviation Meteorology', 'education_level_id' => $mast->id ]);
            Course::create([ 'name' => 'Master Of Science In Physics', 'education_level_id' => $mast->id ]);
            Course::create([ 'name' => 'Master Of Science In Physics', 'education_level_id' => $mast->id ]);
            Course::create([ 'name' => 'Master Of Science In Plant Ecology', 'education_level_id' => $mast->id ]);
            Course::create([ 'name' => 'Master Of Science In Applied Physiology And Cellular Biology', 'education_level_id' => $mast->id ]);
            Course::create([ 'name' => 'Master Of Science In Applied Parasitology', 'education_level_id' => $mast->id ]);
            Course::create([ 'name' => 'Master Of Science In Taxonomy & Economic Botany', 'education_level_id' => $mast->id ]);
            Course::create([ 'name' => 'Master Of Science In Plant Physiology And Biochemistry', 'education_level_id' => $mast->id ]);
            Course::create([ 'name' => 'Master Of Science In Biology Of Conservation', 'education_level_id' => $mast->id ]);
            Course::create([ 'name' => 'Master Of Science In Agricultural Entomology', 'education_level_id' => $mast->id ]);
            Course::create([ 'name' => 'Master Of Science In Medical And Veterinary Entomology', 'education_level_id' => $mast->id ]);
            Course::create([ 'name' => 'Master Of Science In Hydrobiology', 'education_level_id' => $mast->id ]);
            Course::create([ 'name' => 'Master Of Science In Mycology', 'education_level_id' => $mast->id ]);
            Course::create([ 'name' => 'Master Of Science In Genetics', 'education_level_id' => $mast->id ]);
            Course::create([ 'name' => 'Master Of Science In Microbiology And Biotechnology', 'education_level_id' => $mast->id ]);
            Course::create([ 'name' => 'Master Of Science In Information Technology Enabled Services', 'education_level_id' => $mast->id ]);
            Course::create([ 'name' => 'Masters In Information System And Computer Science', 'education_level_id' => $mast->id ]);
            Course::create([ 'name' => 'Master Of Science In Applied Computing', 'education_level_id' => $mast->id ]);
            Course::create([ 'name' => 'Master Of Science In Computational Intelligence', 'education_level_id' => $mast->id ]);
            Course::create([ 'name' => 'Master Of Science In Distributed Computing Technology', 'education_level_id' => $mast->id ]);
            Course::create([ 'name' => 'Master Of Science In Information Technology Management', 'education_level_id' => $mast->id ]);
            Course::create([ 'name' => 'Master Of Science In Climate Change', 'education_level_id' => $mast->id ]);
            Course::create([ 'name' => 'Master Of Science In Organic Chemistry', 'education_level_id' => $mast->id ]);
            Course::create([ 'name' => 'Master Of Science In Inorganic Chemistry', 'education_level_id' => $mast->id ]);
            Course::create([ 'name' => 'Master Of Science In Analytical Chemistry', 'education_level_id' => $mast->id ]);
            Course::create([ 'name' => 'Master Of Science In Industrial Chemistry', 'education_level_id' => $mast->id ]);
            Course::create([ 'name' => 'Master Of Science Hydrology And Ground Water Resource Management', 'education_level_id' => $mast->id ]);
            Course::create([ 'name' => 'Master Of Science In Sustainable Urban Development', 'education_level_id' => $mast->id ]);
            Course::create([ 'name' => 'Master In Urban Management (mum)', 'education_level_id' => $mast->id ]);
            Course::create([ 'name' => 'Master In Architecture', 'education_level_id' => $mast->id ]);
            Course::create([ 'name' => 'Master Of Arts In Design', 'education_level_id' => $mast->id ]);
            Course::create([ 'name' => 'Master Of Architecture', 'education_level_id' => $mast->id ]);
            Course::create([ 'name' => 'Master Of Urban Management', 'education_level_id' => $mast->id ]);
            Course::create([ 'name' => 'Master Of Science In Civil Engineering', 'education_level_id' => $mast->id ]);
            Course::create([ 'name' => 'Master In Environmental And Biosystems Engineering', 'education_level_id' => $mast->id ]);
            Course::create([ 'name' => 'Master Of Science In Electrical And Electronic Engineering', 'education_level_id' => $mast->id ]);
            Course::create([ 'name' => 'Master Of Science In Engineering', 'education_level_id' => $mast->id ]);
            Course::create([ 'name' => 'Master Of Science In Geographical Information System', 'education_level_id' => $mast->id ]);
            Course::create([ 'name' => 'Master Of Science In Surveying', 'education_level_id' => $mast->id ]);
            Course::create([ 'name' => 'Master Of Science In Electrical And Information Engineering', 'education_level_id' => $mast->id ]);
            Course::create([ 'name' => 'Master Of Science In Geospatial Engineering', 'education_level_id' => $mast->id ]);
            Course::create([ 'name' => 'Master Of Science In Mechanical Engineering', 'education_level_id' => $mast->id ]);
            Course::create([ 'name' => 'Master Of Science In Energy Management', 'education_level_id' => $mast->id ]);
            Course::create([ 'name' => 'Masters Of Science (nuclear Science)', 'education_level_id' => $mast->id ]);
            Course::create([ 'name' => 'Master Of Arts In Construction Management', 'education_level_id' => $mast->id ]);
            Course::create([ 'name' => 'Masters In Valuation And Property Management', 'education_level_id' => $mast->id ]);
            Course::create([ 'name' => 'Master Of Arts In Planning', 'education_level_id' => $mast->id ]);
            Course::create([ 'name' => 'Master Of Arts In Peace Education (des)', 'education_level_id' => $mast->id ]);
            Course::create([ 'name' => 'Master Of Science In Pharmacy & toxicology', 'education_level_id' => $mast->id ]);
            Course::create([ 'name' => 'Masters Of Arts In Project Planning And Management (distance)', 'education_level_id' => $mast->id ]);
            Course::create([ 'name' => 'Masters Of Distance Education', 'education_level_id' => $mast->id ]);
            Course::create([ 'name' => 'Master Of Science In Energy Management', 'education_level_id' => $mast->id ]);
            Course::create([ 'name' => 'Master Of Education In Educational Administration', 'education_level_id' => $mast->id ]);
            Course::create([ 'name' => 'Master Of Education In Educational Planning', 'education_level_id' => $mast->id ]);
            Course::create([ 'name' => 'Master Of Education In Curriculum Studies', 'education_level_id' => $mast->id ]);
            Course::create([ 'name' => 'Master Of Education In Economics Of Education', 'education_level_id' => $mast->id ]);
            Course::create([ 'name' => 'Master Of Education In Corporate Governance In Education', 'education_level_id' => $mast->id ]);
            Course::create([ 'name' => 'Master Of Education In Education In Emergencies', 'education_level_id' => $mast->id ]);
            Course::create([ 'name' => 'Master Of Education In Sociology Of Education', 'education_level_id' => $mast->id ]);
            Course::create([ 'name' => 'Master Of Education In History Of Education', 'education_level_id' => $mast->id ]);
            Course::create([ 'name' => 'Master Of Education In Philosophy Of Education', 'education_level_id' => $mast->id ]);
            Course::create([ 'name' => 'Master Of Education In Comparative Issues In Education', 'education_level_id' => $mast->id ]);
            Course::create([ 'name' => 'Master Of Education In Measurement And Evaluation', 'education_level_id' => $mast->id ]);
            Course::create([ 'name' => 'Master Of Science In Climate Change', 'education_level_id' => $mast->id ]);
            Course::create([ 'name' => 'Master Of Physics', 'education_level_id' => $mast->id ]);
            Course::create([ 'name' => 'Master Of Arts In Christian Religious Studies', 'education_level_id' => $mast->id ]);
            Course::create([ 'name' => 'Masters In Peace Education', 'education_level_id' => $mast->id ]);
            Course::create([ 'name' => 'Master In Distance Education', 'education_level_id' => $mast->id ]);
            Course::create([ 'name' => 'Master Of Education (curriculum Studies)', 'education_level_id' => $mast->id ]);
            Course::create([ 'name' => 'Master Of Education (education In Emergencies)', 'education_level_id' => $mast->id ]);
            Course::create([ 'name' => 'Master Of Education (educational Planning)', 'education_level_id' => $mast->id ]);
            Course::create([ 'name' => 'Master Of Education(economics Of Education)', 'education_level_id' => $mast->id ]);
            Course::create([ 'name' => 'Master Of Education (educational Administration)', 'education_level_id' => $mast->id ]);
            Course::create([ 'name' => 'Master Of Education (corporate Governance In Education)', 'education_level_id' => $mast->id ]);
            Course::create([ 'name' => 'Masters of (educational Administration And Planning)', 'education_level_id' => $mast->id ]);
            Course::create([ 'name' => 'Master Of Education In Religious Education (project)', 'education_level_id' => $mast->id ]);
            Course::create([ 'name' => 'Master Of Education In Business Education', 'education_level_id' => $mast->id ]);
            Course::create([ 'name' => 'Master Of Education In English Education', 'education_level_id' => $mast->id ]);
            Course::create([ 'name' => 'Master Of Education In Pedagogy Of Physical Education', 'education_level_id' => $mast->id ]);
            Course::create([ 'name' => 'Master Of Education In Early Childhood Education', 'education_level_id' => $mast->id ]);
            Course::create([ 'name' => 'Master Of Education In Physics Education', 'education_level_id' => $mast->id ]);
            Course::create([ 'name' => 'Master Of Education In Educational Technology', 'education_level_id' => $mast->id ]);
            Course::create([ 'name' => 'Master Of Education In Early Childhood', 'education_level_id' => $mast->id ]);
            Course::create([ 'name' => 'Masters of Education (Administration And Planning)', 'education_level_id' => $mast->id ]);
            Course::create([ 'name' => 'Master Of Education In Higher Education (m.ed Higher Education)', 'education_level_id' => $mast->id ]);
            Course::create([ 'name' => 'Masters Of Arts In Peace Education', 'education_level_id' => $mast->id ]);
            Course::create([ 'name' => 'Master Of Arts In Project Planning And Management', 'education_level_id' => $mast->id ]);
            Course::create([ 'name' => 'Masters Of Science In Environmental Chemistry', 'education_level_id' => $mast->id ]);
            Course::create([ 'name' => 'Master Of Education (m.ed) Degree In Physical Education And Sport', 'education_level_id' => $mast->id ]);
            Course::create([ 'name' => 'Master Of Medicine In Anaesthesia', 'education_level_id' => $mast->id ]);
            Course::create([ 'name' => 'Master Of Science (biochemistry)', 'education_level_id' => $mast->id ]);
            Course::create([ 'name' => 'Master Of Medicine In Internal Medicine', 'education_level_id' => $mast->id ]);
            Course::create([ 'name' => 'Master Of Dental Surgery (mds) In Prosthodontics', 'education_level_id' => $mast->id ]);
            Course::create([ 'name' => 'Master Of Dental Surgery (mds) In Oral And Maxiollofacial Surgery', 'education_level_id' => $mast->id ]);
            Course::create([ 'name' => 'Master Of Med. In Diagnostic Radiology', 'education_level_id' => $mast->id ]);
            Course::create([ 'name' => 'Master Of Medicine In Diagnostic Radiology', 'education_level_id' => $mast->id ]);
            Course::create([ 'name' => 'Master Of Science In Human Anatomy', 'education_level_id' => $mast->id ]);
            Course::create([ 'name' => 'Master Of Science In Clinical Chemistry', 'education_level_id' => $mast->id ]);
            Course::create([ 'name' => 'Master Of Science In Clinical Cytology', 'education_level_id' => $mast->id ]);
            Course::create([ 'name' => 'Master Of Medicine In Human Pathology', 'education_level_id' => $mast->id ]);
            Course::create([ 'name' => 'Master Of Medicine In Neurosurgery (mmed-ns).', 'education_level_id' => $mast->id ]);
            Course::create([ 'name' => 'Master Of Medicine In Opthalmology', 'education_level_id' => $mast->id ]);
            Course::create([ 'name' => 'Master Of Medicine In General Surgery', 'education_level_id' => $mast->id ]);
            Course::create([ 'name' => 'Master Of Medicine In Otorhinolaryngology, Head & Neck Surgery', 'education_level_id' => $mast->id ]);
            Course::create([ 'name' => 'Master Of Medicine In Anaesthesiology – M.med (anaesth.)', 'education_level_id' => $mast->id ]);
            Course::create([ 'name' => 'Master Of Medicine In Orthopaedic Surgery (m.med. Ortho)', 'education_level_id' => $mast->id ]);
            Course::create([ 'name' => 'Master Of Medicine In Paediatric Surgery', 'education_level_id' => $mast->id ]);
            Course::create([ 'name' => 'Master Of Medicine In Plastic, Reconstructive And Aesthetic Surgery', 'education_level_id' => $mast->id ]);
            Course::create([ 'name' => 'Master Of Medicine In Thoracic And Cardiovascular Surgery.', 'education_level_id' => $mast->id ]);
            Course::create([ 'name' => 'Masters Of Paediatric Anaesthesia ', 'education_level_id' => $mast->id ]);
            Course::create([ 'name' => 'Master Of Science In Medical Microbiology', 'education_level_id' => $mast->id ]);
            Course::create([ 'name' => 'Master Of Science In Medical Physiology', 'education_level_id' => $mast->id ]);
            Course::create([ 'name' => 'Master Of Science In Nursing', 'education_level_id' => $mast->id ]);
            Course::create([ 'name' => 'Master Of Medicine In Obstetrics And Gynaecology', 'education_level_id' => $mast->id ]);
            Course::create([ 'name' => 'Master Of Medicine In Ophthalmology', 'education_level_id' => $mast->id ]);
            Course::create([ 'name' => 'Master Of Dental Surgery In Paediatric Dentistry', 'education_level_id' => $mast->id ]);
            Course::create([ 'name' => 'Masters Of Orthopaedics', 'education_level_id' => $mast->id ]);
            Course::create([ 'name' => 'Master Of Medicine In Paediatrics And Child Health', 'education_level_id' => $mast->id ]);
            Course::create([ 'name' => 'Master Of Dental Surgery (mds) In Periodontology', 'education_level_id' => $mast->id ]);
            Course::create([ 'name' => 'Masters Of Pharmaceutical Analysis', 'education_level_id' => $mast->id ]);
            Course::create([ 'name' => 'Masters of Clinical Pharmacy', 'education_level_id' => $mast->id ]);
            Course::create([ 'name' => 'Master Of Pharmacy In Industrial Pharmacy', 'education_level_id' => $mast->id ]);
            Course::create([ 'name' => 'Master Degree Of Pharmacy In Pharmacoepidemiology And Pharmacovigilance', 'education_level_id' => $mast->id ]);
            Course::create([ 'name' => 'Master Of Science In Molecular Pharmacology', 'education_level_id' => $mast->id ]);
            Course::create([ 'name' => 'Master Of Science In Pharmacognosy And Complementary Medicine', 'education_level_id' => $mast->id ]);
            Course::create([ 'name' => 'Master Of Science In Pharmacognosy And Complementary Medicine', 'education_level_id' => $mast->id ]);
            Course::create([ 'name' => 'Master Of Science In Molecular Pharmacology (msc. Mol. Pharmacol.)', 'education_level_id' => $mast->id ]);
            Course::create([ 'name' => 'Master Of Pharmacy Degree In Pharmacoepidemiology And Pharmacovigilance ', 'education_level_id' => $mast->id ]);
            Course::create([ 'name' => 'Master Of Science In Clinical Psychology', 'education_level_id' => $mast->id ]);
            Course::create([ 'name' => 'Master Of Medicine Degree In Psychiatry (m.med Psych.)', 'education_level_id' => $mast->id ]);
            Course::create([ 'name' => 'Masters Of Public Health (mph)', 'education_level_id' => $mast->id ]);
            Course::create([ 'name' => 'Master Of Science In Health Systems Management (msc. Hsm)', 'education_level_id' => $mast->id ]);
            Course::create([ 'name' => 'Master Of Medicine In Neurosurgery (mmed-ns)', 'education_level_id' => $mast->id ]);
            Course::create([ 'name' => 'Master Of Medicine In General Surgery (mmed.surg)', 'education_level_id' => $mast->id ]);
            Course::create([ 'name' => 'Master Of Medicine In Anaesthesia', 'education_level_id' => $mast->id ]);
            Course::create([ 'name' => 'Master Of Medicine In Otorhinolaryngology, Head & Neck Surgery', 'education_level_id' => $mast->id ]);
            Course::create([ 'name' => 'Master Of Medicine In Thoracic And Cardiovascular Surgery', 'education_level_id' => $mast->id ]);
            Course::create([ 'name' => 'Master Of Medicine In Paediatric Surgery', 'education_level_id' => $mast->id ]);
            Course::create([ 'name' => 'Master Of Medicine In Plastic, Reconstructive And Aesthetic Surgery ', 'education_level_id' => $mast->id ]);
            Course::create([ 'name' => 'Masters Of  Medicine in Tropical And Infectious Diseases', 'education_level_id' => $mast->id ]);
            Course::create([ 'name' => 'Masters in Medical Statistics', 'education_level_id' => $mast->id ]);
            Course::create([ 'name' => 'Master Of Arts In Anthropology', 'education_level_id' => $mast->id ]);
            Course::create([ 'name' => 'Master Of Arts In Women, Leadership And Governance In Africa', 'education_level_id' => $mast->id ]);
            Course::create([ 'name' => 'Master Of Science In Entrepreneurship And Innovations Management', 'education_level_id' => $mast->id ]);
            Course::create([ 'name' => 'Master Of Arts In Environmental Law', 'education_level_id' => $mast->id ]);
            Course::create([ 'name' => 'Master Of Library And Information Science', 'education_level_id' => $mast->id ]);
            Course::create([ 'name' => 'Masters Of Arts In Economics', 'education_level_id' => $mast->id ]);
            Course::create([ 'name' => 'Masters Of Arts In Economic Policy Management', 'education_level_id' => $mast->id ]);
            Course::create([ 'name' => 'Masters Of Arts In Economics Of Multilateral Trading Systems', 'education_level_id' => $mast->id ]);
            Course::create([ 'name' => 'Master Of Science In Health Economics And Policy ', 'education_level_id' => $mast->id ]);
            Course::create([ 'name' => 'Master of Science in Finance', 'education_level_id' => $mast->id ]);
            Course::create([ 'name' => 'Masters of Accounting', 'education_level_id' => $mast->id ]);
            Course::create([ 'name' => 'Master Of Arts In International Conflict Management', 'education_level_id' => $mast->id ]);
            Course::create([ 'name' => 'Master Of Arts In International Studies', 'education_level_id' => $mast->id ]);
            Course::create([ 'name' => 'Master Of Arts In Diplomacy', 'education_level_id' => $mast->id ]);
            Course::create([ 'name' => 'Master Of Arts In International Conflict Management', 'education_level_id' => $mast->id ]);
            Course::create([ 'name' => 'Masters of International Studies', 'education_level_id' => $mast->id ]);
            Course::create([ 'name' => 'Masters In Development Studies', 'education_level_id' => $mast->id ]);
            Course::create([ 'name' => 'Master Of Arts In Communication Studies', 'education_level_id' => $mast->id ]);
            Course::create([ 'name' => 'Masters of Kiswahili Studies', 'education_level_id' => $mast->id ]);
            Course::create([ 'name' => 'Master Of Arts (kiswahili Studies)', 'education_level_id' => $mast->id ]);
            Course::create([ 'name' => 'Master Of Arts (arabic)', 'education_level_id' => $mast->id ]);
            Course::create([ 'name' => 'Master Of Arts In Literature', 'education_level_id' => $mast->id ]);
            Course::create([ 'name' => 'Master Of Arts In Theatre And Film Studies', 'education_level_id' => $mast->id ]);
            Course::create([ 'name' => 'Master Of Business Administration', 'education_level_id' => $mast->id ]);
            Course::create([ 'name' => 'Master Of Arts', 'education_level_id' => $mast->id ]);
            Course::create([ 'name' => 'Master Of Science In Finance', 'education_level_id' => $mast->id ]);
            Course::create([ 'name' => 'Master Of Science In Human Resource Management', 'education_level_id' => $mast->id ]);
            Course::create([ 'name' => 'Master Of Science In Entrepreneurship And Innovations Management', 'education_level_id' => $mast->id ]);
            Course::create([ 'name' => 'Master Of Science In Marketing', 'education_level_id' => $mast->id ]);
            Course::create([ 'name' => 'Masters Of Arts In Project Planning And Management', 'education_level_id' => $mast->id ]);
            Course::create([ 'name' => 'Masters Of Distance Education', 'education_level_id' => $mast->id ]);
            Course::create([ 'name' => 'Masters Of Arts In Political Science And Public Administration', 'education_level_id' => $mast->id ]);
            Course::create([ 'name' => 'Master Of Arts In Population Studies', 'education_level_id' => $mast->id ]);
            Course::create([ 'name' => 'Master Of Science In Population Studies', 'education_level_id' => $mast->id ]);
            Course::create([ 'name' => 'Masters In Psychology', 'education_level_id' => $mast->id ]);
            Course::create([ 'name' => 'Masters In Counselling Psychology', 'education_level_id' => $mast->id ]);
            Course::create([ 'name' => 'Master Of Education In Measurement And Evaluation', 'education_level_id' => $mast->id ]);
            Course::create([ 'name' => 'Master Of Arts In Sociology', 'education_level_id' => $mast->id ]);
            Course::create([ 'name' => 'Master Of Arts In Sociology (criminology And Social Order)', 'education_level_id' => $mast->id ]);
            Course::create([ 'name' => 'Master Of Arts In Sociology (counselling)', 'education_level_id' => $mast->id ]);
            Course::create([ 'name' => 'Master Of Arts In Sociology (entreprenuership Development)', 'education_level_id' => $mast->id ]);
            Course::create([ 'name' => 'Master Of Arts In Sociology (labour Relations Management)', 'education_level_id' => $mast->id ]);
            Course::create([ 'name' => 'Master Of Arts In Sociology (medical Sociology)', 'education_level_id' => $mast->id ]);
            Course::create([ 'name' => 'Master Of Arts In Sociology (rural Sociology And Community Development)', 'education_level_id' => $mast->id ]);
            Course::create([ 'name' => 'Master Of Arts In Sociology (advanced Disaster Management)', 'education_level_id' => $mast->id ]);
            Course::create([ 'name' => 'Master Of Arts In Translation', 'education_level_id' => $mast->id ]);
            Course::create([ 'name' => 'Master Of Arts In Interpretation', 'education_level_id' => $mast->id ]);
            Course::create([ 'name' => 'Masters Of Science In Environmental Chemistry', 'education_level_id' => $mast->id ]);
            Course::create([ 'name' => 'Masters In Project Planning And Management', 'education_level_id' => $mast->id ]);
            Course::create([ 'name' => 'Master Of Business Adminstration', 'education_level_id' => $mast->id ]);
            Course::create([ 'name' => 'Master Of Science In Finance', 'education_level_id' => $mast->id ]);
            Course::create([ 'name' => 'Master Of Science In Human Resource Management', 'education_level_id' => $mast->id ]);
            Course::create([ 'name' => 'Master Of Science In Entrepreneurship And Innovations Management', 'education_level_id' => $mast->id ]);
            Course::create([ 'name' => 'Master Of Science In Marketing', 'education_level_id' => $mast->id ]);
            Course::create([ 'name' => 'Masters In Project Planning And Management', 'education_level_id' => $mast->id ]);
            Course::create([ 'name' => 'Masters Of Arts In Economics', 'education_level_id' => $mast->id ]);
            Course::create([ 'name' => 'Masters Of Arts In Economic Policy Management', 'education_level_id' => $mast->id ]);
            Course::create([ 'name' => 'Masters Of Arts In Economics Of Multilateral Trading Systems', 'education_level_id' => $mast->id ]);
            Course::create([ 'name' => 'Master Of Science In Health Economics And Policy', 'education_level_id' => $mast->id ]);
            Course::create([ 'name' => 'Masters of (education Administration And Planning)', 'education_level_id' => $mast->id ]);
            Course::create([ 'name' => 'Masters of (education Foundations)', 'education_level_id' => $mast->id ]);
            Course::create([ 'name' => 'Masters of (measurement And Evaluation)', 'education_level_id' => $mast->id ]);
            Course::create([ 'name' => 'Master Of Education In Early Childhood', 'education_level_id' => $mast->id ]);
            Course::create([ 'name' => 'Master In Education', 'education_level_id' => $mast->id ]);
            Course::create([ 'name' => 'Master Of Business Administration ', 'education_level_id' => $mast->id ]);
            Course::create([ 'name' => 'Master Of Arts In Peace Education', 'education_level_id' => $mast->id ]);
            Course::create([ 'name' => 'Master Of Arts In Project Planning And Management', 'education_level_id' => $mast->id ]);
            Course::create([ 'name' => 'Masters of Education Foundations', 'education_level_id' => $mast->id ]);
            Course::create([ 'name' => 'Masters of Measurement And Evaluation', 'education_level_id' => $mast->id ]);
            Course::create([ 'name' => 'Master Of Education In Educational Foundations', 'education_level_id' => $mast->id ]);
    
            // $employer = User::create([
            //       'name' => 'Emploi Recruitment',
            //       'email' => 'jobs@emploi.co',
            //       'username' => 'jobs',
            //       'email_verified_at' => now(),
            //       'email_verification' => 'ashHSsJhsd',
            //       'password' => '$2y$10$QJiwEYggYkJmJVBiC2xoge2kBuTYLBVi0NL99Ai5lGrkaCmF/LdM.',
            //       'remember_token' => Str::random(10),
            // ]);
            // UserPermission::create([ 'user_id' => $employer->id, 'permission_id' => 3 ]);
    
            // $emp = Employer::create([
            //     'user_id' => $employer->id, 
            //     'name' => 'Emploi Recruitment', 
            //     'industry_id' => 12, 
            //     'company_name' => 'Emploi Recruitment',
            //     'contact_phone' => '2547702068282',
            //     'company_phone' => '254774569001',
            //     'company_email' => 'jobs@emploi.co',
            //     'country_id' => 1,
            //     'address' => 'Even Business Park, Airport North Rd, Nairobi'
            // ]);
    
            // $c = Company::create([
            //     'name' => 'Emploi Recruitment', 
            //     'user_id' => $employer->id,
            //     'about' => "Emploi's philosophy is to create a single sourcing point for players, with enough tools to help them find each other.",
            //     'tagline' => 'Hire and be hired easily, anywhere',
            //     'website' => "https://emploi.co", 
            //     'industry_id' => 12,
            //     'location_id' => 1,
            //     'company_size_id' => 1
            // ]);
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
    
            BlogCategory::create([
                'name' => 'Career Development', 
                'slug' => 'career-development'
            ]);
    
    
            //DUMMY DATA - CLEAR BEFORE SEEDING PRODUCTION
    
                
    
                // $p1 = Post::create([
                //     'slug' =>'laravel-developer', 
                //     'company_id' => $c->id, 
                //     'title' => 'Laravel Developer', 
                //     'industry_id' => 1,
                //     'education_requirements' => 1, 
                //     'experience_requirements' => 3,
                //     'responsibilities' => 'We require a capable man to handle code', 
                //     'benefits' => 'no benefits',
                //     'deadline' => now()->addDays(rand(3,10)),
                //     'status' => 'active',
                //     'positions' => 2,
                //     'location_id' => 1,
                //     'vacancy_type_id'=> 1,
                //     'how_to_apply' => '',
                //     'monthly_salary' => 40000,
                // ]);
    
                // $p2 = Post::create([
                //     'slug' =>'web-developer', 
                //     'company_id' => $c->id, 
                //     'title' => 'Web Developer', 
                //     'industry_id' => 1,
                //     'education_requirements' => 2, 
                //     'experience_requirements' => 4,
                //     'responsibilities' => 'We require a capable man to handle code', 
                //     'benefits' => 'no benefits',
                //     'deadline' => now()->addDays(rand(3,10)),
                //     'status' => 'active',
                //     'positions' => 1,
                //     'location_id' => 1,
                //     'vacancy_type_id'=> 1,
                //     'how_to_apply' => '',
                //     'monthly_salary' => 40000,
                // ]);
    
                // $p3 = Post::create([
                //     'slug' =>'angular-developer', 
                //     'company_id' => $c->id, 
                //     'title' => 'Angular Developer', 
                //     'industry_id' => 1,
                //     'education_requirements' => 2, 
                //     'experience_requirements' => 4,
                //     'responsibilities' => 'We require a capable man to handle code', 
                //     'benefits' => 'no benefits',
                //     'deadline' => now()->addDays(rand(3,10)),
                //     'status' => 'active',
                //     'positions' => 1,
                //     'location_id' => 1,
                //     'vacancy_type_id'=> 1,
                //     'how_to_apply' => '',
                //     'monthly_salary' => 40000,
                // ]);
    
                
    
                // Blog::create([
                //     'user_id' => $admin->id, 
                //     'blog_category_id' => 1, 
                //     'title' => 'How automation can boost your productivity',
                //     'slug' => 'automation-and-productivity',
                //     'contents' => 'Sample contents. Loremp ipsum dolor sit amet  Loremp ipsum dolor sit amet  Loremp ipsum dolor sit amet Sample contents. Loremp ipsum dolor sit amet  Loremp ipsum dolor sit amet  Loremp ipsum dolor sit amet Sample contents. Loremp ipsum dolor sit amet  Loremp ipsum dolor sit amet  Loremp ipsum dolor sit amet Sample contents. Loremp ipsum dolor sit amet  Loremp ipsum dolor sit amet  Loremp ipsum dolor sit amet Sample contents. Loremp ipsum dolor sit amet  Loremp ipsum dolor sit amet  Loremp ipsum dolor sit amet Sample contents. Loremp ipsum dolor sit amet  Loremp ipsum dolor sit amet  Loremp ipsum dolor sit amet Sample contents. Loremp ipsum dolor sit amet  Loremp ipsum dolor sit amet  Loremp ipsum dolor sit amet Sample contents. Loremp ipsum dolor sit amet  Loremp ipsum dolor sit amet  Loremp ipsum dolor sit amet '
                // ]);
    
                // Blog::create([
                //     'user_id' => $admin->id, 
                //     'blog_category_id' => 1, 
                //     'title' => 'Benefits of a must do list',
                //     'slug' => 'must-do-list',
                //     'contents' => 'Sample contents. Loremp ipsum dolor sit amet  Loremp ipsum dolor sit amet  Loremp ipsum dolor sit amet '
                // ]);
    
                // Blog::create([
                //     'user_id' => $admin->id, 
                //     'blog_category_id' => 2, 
                //     'title' => 'Recruiters never read CVs',
                //     'slug' => 'recruit-no-cv',
                //     'contents' => 'Sample contents. Loremp ipsum dolor sit amet  Loremp ipsum dolor sit amet  Loremp ipsum dolor sit amet '
                // ]);
    
                // Blog::create([
                //     'user_id' => $admin->id, 
                //     'blog_category_id' => 1, 
                //     'title' => 'Inactive Blog Post',
                //     'slug' => 'inactive-blog-post',
                //     'contents' => 'Sample contents. Loremp ipsum dolor sit amet  Loremp ipsum dolor sit amet  Loremp ipsum dolor sit amet ',
                //     'status' => 'inactive'
                // ]);
    
                // $se1 = ModelSeeker::create([
                //     'post_id' => $p1->id,
                //     'education_level_id' => $dip->id,
                //     'education_level_importance' => 50,
                //     'personality_test_id' => $vision->id,
                //     'experience_duration' => 3,
                //     'experience_level_importance' => 50,
                //     'iq_score' => 70,
                //     'interview_result_score' => 70,
                //     'psychometric_test_score' => 80,
                //     'company_size_id' => 3
                // ]);
    
                // ModelSeekerSkill::create([
                //     'model_seeker_id' => 1,
                //     'industrySkill_id' => 1,
                //     'weight' => 1
                // ]);
    
                // ModelSeekerSkill::create([
                //     'model_seeker_id' => 1,
                //     'industrySkill_id' => 2
                // ]);
    
                // $se2 = ModelSeeker::create([
                //     'post_id' => $p2->id,
                //     'education_level_id' => $deg->id,
                //     'education_level_importance' => 70,
                //     'personality_test_id' => $master->id,
                //     'experience_duration' => 4,
                //     'experience_level_importance' => 70,
                //     'iq_score' => 70,
                //     'interview_result_score' => 70,
                //     'psychometric_test_score' => 80,
                //     'company_size_id' => 4
                // ]);
    
                // ModelSeekerSkill::create([
                //     'model_seeker_id' => 2,
                //     'industrySkill_id' => 1
                // ]);
                // ModelSeekerSkill::create([
                //     'model_seeker_id' => 2,
                //     'industrySkill_id' => 3,
                //     'weight' => 2
                // ]);
                // ModelSeekerSkill::create([
                //     'model_seeker_id' => 2,
                //     'industrySkill_id' => 4,
                //     'weight' => 3
                // ]);
    
                // $se3 = ModelSeeker::create([
                //     'post_id' => $p3->id,
                //     'education_level_id' => $seco->id,
                //     'education_level_importance' => 30,
                //     'personality_test_id' => $idealist->id,
                //     'experience_duration' => 1,
                //     'experience_level_importance' => 90,
                //     'iq_score' => 30,
                //     'interview_result_score' => 90,
                //     'psychometric_test_score' => 80,
                //     'company_size_id' => 5
                // ]);
    
                // ModelSeekerSkill::create([
                //     'model_seeker_id' => 3,
                //     'industrySkill_id' => 2
                // ]);
                // ModelSeekerSkill::create([
                //     'model_seeker_id' => 3,
                //     'industrySkill_id' => 5,
                //     'weight' => 3
                // ]);
                // ModelSeekerSkill::create([
                //     'model_seeker_id' => 3,
                //     'industrySkill_id' => 6,
                //     'weight' => 3
                // ]);
    
                // $ernest = User::create([
                //     'name' => 'Ernest Wanyonyi',
                //     'email' => 'ernest@emploi.co',
                //     'username' => 'ernest',
                //     'email_verified_at' => now(),
                //     'email_verification' => 'ashHSJhsawsd',
                //     'password' => '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi',
                //     'remember_token' => Str::random(10),
                // ]);
                // UserPermission::create([ 'user_id' => $ernest->id, 'permission_id' => 4 ]);
                // Seeker::create([
                //     'user_id' => $ernest->id,
                //     'public_name' => 'Ernest W',
                //     'gender' => 'M',
                //     'phone_number' => '254723193712',
                //     'country_id' => 1,
                //     'industry_id' => 1,
                //     'resume' => 'sample-resume.pdf',
                //     'date_of_birth' => now(),
                //     'years_experience' => 5,
                //     'location_id' => 1,
                //     'education_level_id' => $dip->id,
                //     'education' => '[]',
                //     'experience' => '[]'
                // ]);
    
                // $sally = User::create([
                //     'name' => 'Sally Muya',
                //     'email' => 'sally@emploi.co',
                //     'username' => 'sally',
                //     'email_verified_at' => now(),
                //     'email_verification' => 'ashs3HSJhsd',
                //     'password' => '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi',
                //     'remember_token' => Str::random(10),
                // ]);
                // UserPermission::create([ 'user_id' => $sally->id, 'permission_id' => 4 ]);
                // Seeker::create([
                //     'user_id' => $sally->id,
                //     'public_name' => 'Sally M',
                //     'gender' => 'F',
                //     'phone_number' => '254728217712',
                //     'country_id' => 1,
                //     'industry_id' => 2,
                //     'resume' => 'sample-resume.pdf',
                //     'date_of_birth' => now(),
                //     'years_experience' => 2,
                //     'location_id' => 2,
                //     'education_level_id' => $deg->id,
                //     'education' => '[]',
                //     'experience' => '[]'
                // ]);
    
                // $liza = User::create([
                //     'name' => 'Liza Adhiambo',
                //     'email' => 'liza@emploi.co',
                //     'username' => 'liza',
                //     'email_verified_at' => now(),
                //     'email_verification' => 'ashHSJa2hsd',
                //     'password' => '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi',
                //     'remember_token' => Str::random(10),
                // ]);
                // UserPermission::create([ 'user_id' => $liza->id, 'permission_id' => 4 ]);
                // Seeker::create([
                //     'user_id' => $liza->id,
                //     'public_name' => 'Liza L',
                //     'gender' => 'F',
                //     'phone_number' => '2541022992381',
                //     'country_id' => 1,
                //     'industry_id' => 2,
                //     'resume' => 'sample-resume.pdf',
                //     'date_of_birth' => now(),
                //     'years_experience' => 2,
                //     'location_id' => 1,
                //     'education_level_id' => $mast->id,
                //     'education' => '[]',
                //     'experience' => '[]'
                // ]);
    
                // JobApplication::create([
                //     'user_id' => $ernest->id,
                //     'post_id' => $p1->id,
                //     'cover' => 'Sample cover letter for the position. <br>Please hire me!'
                // ]);
                // JobApplication::create([
                //     'user_id' => $ernest->id,
                //     'post_id' => $p2->id,
                //     'cover' => 'Sample cover letter for the position. <br>Please hire me!'
                // ]);
                // JobApplication::create([
                //     'user_id' => $ernest->id,
                //     'post_id' => $p3->id,
                //     'cover' => 'Sample cover letter for the position. <br>Please hire me!'
                // ]);
    
                // JobApplication::create([
                //     'user_id' => $sally->id,
                //     'post_id' => $p1->id,
                //     'cover' => 'I have sent a Sample cover letter for the position. <br>Please hire me!'
                // ]);
                // JobApplication::create([
                //     'user_id' => $sally->id,
                //     'post_id' => $p2->id,
                //     'cover' => 'I have sent a Sample cover letter for the position. <br>Please hire me!'
                // ]);
                // JobApplication::create([
                //     'user_id' => $sally->id,
                //     'post_id' => $p3->id,
                //     'cover' => 'I have sent a Sample cover letter for the position. <br>Please hire me!'
                // ]);
    
                // JobApplication::create([
                //     'user_id' => $liza->id,
                //     'post_id' => $p1->id,
                //     'cover' => 'Trying to send a Sample cover letter for the position. <br>Please hire me!'
                // ]);
                // JobApplication::create([
                //     'user_id' => $liza->id,
                //     'post_id' => $p2->id,
                //     'cover' => 'Trying to send a Sample cover letter for the position. <br>Please hire me!'
                // ]);
                // JobApplication::create([
                //     'user_id' => $liza->id,
                //     'post_id' => $p3->id,
                //     'cover' => 'Trying to send a Sample cover letter for the position. <br>Please hire me!'
                // ]);
    
                // SeekerSkill::create([
                //     'seeker_id' => 1,
                //     'skill_id' => 1
                // ]);
                // SeekerSkill::create([
                //     'seeker_id' => 1,
                //     'skill_id' => 2
                // ]);
                // SeekerSkill::create([
                //     'seeker_id' => 1,
                //     'skill_id' => 3
                // ]);
                // SeekerSkill::create([
                //     'seeker_id' => 1,
                //     'skill_id' => 4
                // ]);
    
                // SeekerSkill::create([
                //     'seeker_id' => 2,
                //     'skill_id' => 1
                // ]);
                // SeekerSkill::create([
                //     'seeker_id' => 2,
                //     'skill_id' => 3
                // ]);
                // SeekerSkill::create([
                //     'seeker_id' => 2,
                //     'skill_id' => 5
                // ]);
                // SeekerSkill::create([
                //     'seeker_id' => 2,
                //     'skill_id' => 7
                // ]);
    
                // SeekerSkill::create([
                //     'seeker_id' => 3,
                //     'skill_id' => 3
                // ]);
                // SeekerSkill::create([
                //     'seeker_id' => 3,
                //     'skill_id' => 4
                // ]);
                // SeekerSkill::create([
                //     'seeker_id' => 3,
                //     'skill_id' => 5
                // ]);
                // SeekerSkill::create([
                //     'seeker_id' => 3,
                //     'skill_id' => 2
                // ]);
        });
    }
}
