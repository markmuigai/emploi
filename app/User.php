<?php

namespace App;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Illuminate\Support\Facades\DB;
use Watson\Rememberable\Rememberable;
use Nicolaslopezj\Searchable\SearchableTrait;

use App\Invoice;
use App\InvoiceCreditRedemption;
use App\Jurisdiction;
use App\Referral;
use App\Seeker;
use App\UserPermission;

use App\Jobs\EmailJob;

use App\Traits\CanLike;
use App\Traits\CanEditCv;
use App\Traits\CanBlog;
use App\Traits\CanMeetup;

class User extends Authenticatable
{
	use Notifiable, CanLike, CanEditCv, CanBlog, CanMeetup, Rememberable;
	use SearchableTrait;

	public $rememberFor = 3;

	/**
	 * Searchable rules.
	 *
	 * @var array
	 */
	protected $searchable = [
		'columns' => [
			'users.name' => 10,
			'users.email' => 5,
			'users.id' => 3,
		]
	];

	protected $fillable = [
		'name', 'username', 'email', 'password', 'avatar', 'email_verification', 'email_verified_at', 'password', 'created_at'
	];

	protected $hidden = [
		'password', 'remember_token',
	];

	protected $casts = [
		'email_verified_at' => 'datetime',
	];

	public function getName()
	{
		return ucwords($this->name);
	}

	public function getEmail()
	{
		return strtolower($this->email);
	}

	public static function makePublicName($name)
	{
		$name = explode(" ", $name);
		switch (count($name)) {
			case 0:
				return implode(" ", $name);
				break;

			case 1:
				return ucwords(implode(" ", $name));
				break;

			default:
				return ucwords(substr($name[0], 0, 1) . ". " . $name[1]);
				break;
		}
	}

	public function routeNotificationForSlack($notification)
	{
		return 'https://hooks.slack.com/services/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';
	}

	public function userPermission()
	{
		return $this->hasOne(UserPermission::class);
	}

	public function inviteLinks()
	{
		return $this->hasMany(InviteLink::class);
	}

	public function meetups()
	{
		return $this->hasMany(Meetup::class);
	}

	public function cvEditor()
	{
		return $this->hasOne(CvEditor::class);
	}

	public function orders()
	{
		return $this->hasMany(Order::class);
	}

	public function getInviteTextAttribute()
	{
		return $this->name . ' invited you to Emploi, an Efficient Platform to perform recruitments and find work for a successful career ';
	}

	public function companies()
	{
		return $this->hasMany(Company::class);
	}

	public function blogs()
	{
		return $this->hasMany(Blog::class);
	}

	public function referrals()
	{
		return $this->hasMany(Referral::class);
	}

	public function getRoleAttribute()
	{
		//dd($this->userPermission->permission->role);
		if ($this->userPermission == null)
			return 'guest';
		$perm = $this->userPermission;
		return $perm->permission->role;
		if ($perm->status == 'active')
			return $perm->permission->role;
		return 'guest';
	}

	public function getEmployerAttribute()
	{
		if ($this->role == 'employer')
			return Employer::where('user_id', $this->id)->first();
		return false;
	}


	public function getPostsAttribute()
	{
		if ($this->role == 'employer' || $this->role == 'admin') {
			$company = Company::where('user_id', $this->id)->first();
			if (isset($company->id)) {
				return $company->posts;
			}
		}
		return [];
	}

	public function applications()
	{
		return $this->hasMany(JobApplication::class);
	}

	public static function generateRandomString($length = 10)
	{
		$characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
		$charactersLength = strlen($characters);
		$randomString = '';
		for ($i = 0; $i < $length; $i++) {
			$randomString .= $characters[rand(0, $charactersLength - 1)];
		}
		return $randomString;
	}

	public function getPublicAvatarUrl()
	{
		return $this->avatar ? '/storage/avatars/' . $this->avatar : '/images/avatar.png';
	}

	public static function admins()
	{
		$admins = UserPermission::where('permission_id', 2)->where('status', 'active')->get();
		$retVal = [];

		for ($i = 0; $i < count($admins); $i++) {
			$retVal[] = $admins[$i]->user;
		}
		return $retVal;
	}

	public static function inactiveAdmins()
	{
		$admins = UserPermission::where('permission_id', 2)->where('status', 'inactive')->get();
		$retVal = [];

		for ($i = 0; $i < count($admins); $i++) {
			$retVal[] = $admins[$i]->user;
		}
		return $retVal;
	}

	public function getJurisdictionsAttribute()
	{
		if ($this->role == 'admin') {
			$perm = $this->userPermission;
			return Jurisdiction::where('user_permission_id', $perm->id)
				->get();
		}
		return [];
	}

	public function getSeekerAttribute()
	{
		if (!$this->role == 'seeker')
			return false;
		return Seeker::where('user_id', $this->id)->first();
	}

	public function verifyAccount()
	{
		$this->email_verified_at = now();
		$this->save();

		$credit = 10;
		if ($this->role == 'employer')
			$credit = 20;
		Referral::creditFor($this->email, $credit);

		//send welcome email to jobseekers
		if ($this->role == 'seeker') {
			$this->seeker->sendWelcomeEmail();

		}
		//activate seeker spotlight: do not move this here i.e match with the above
		if ($this->role == 'seeker') {
			$this->seeker->activateFreeSpotlight();
		}

		//send welcome email to employers
		if ($this->role == 'employer') {
			$this->employer->sendWelcomeEmail();

		}
		// if($this->role == 'employer')
		// {
		//     $this->employer->activateFreeStawi();
		// }
		// return true;
	}

	public static function subscriptionStatus($email)
	{
		$sql = "SELECT * FROM unsubscriptions WHERE email = \"$email\" LIMIT 1";
		$result = DB::select($sql);
		if (count($result) == 1) {
			if ($result[0]->status == 'active') {
				return false;
			}

		}
		return true;
	}

	public static function unsubscribeEmails($email)
	{
		$sql = "SELECT * FROM unsubscriptions WHERE email = \"$email\" LIMIT 1";
		$result = DB::select($sql);
		if (count($result) == 1) {
			if ($result[0]->status == 'inactive') {
				$sql = "UPDATE unsubscriptions SET status = \"active\" WHERE email = \"$email\" LIMIT 1";
				DB::update($sql);
			}
			return true;
		} else {
			$sql = "INSERT INTO unsubscriptions (email,status) VALUES (\"$email\",\"active\")";
			DB::insert($sql);
			return true;
		}
	}

	public static function subscribeEmails($email)
	{
		$sql = "SELECT * FROM unsubscriptions WHERE email = \"$email\" LIMIT 1";
		$result = DB::select($sql);
		if (count($result) == 1) {
			if ($result[0]->status == 'active') {
				$sql = "UPDATE unsubscriptions SET status = \"inactive\" WHERE email = \"$email\" LIMIT 1";
				DB::update($sql);
			}
		}
		return true;
	}

	public static function cleanEmail($string)
	{
		//return iconv(mb_detect_encoding($string, mb_detect_order(), true), "UTF-8", $output);
		$string = str_replace(' ', '', $string);

		return preg_replace('/[^A-Za-z0-9\-.@]/', '', $string);
	}

	public function hasVerified()
	{
		if ($this->email_verified_at != NULL)
			return true;
		return false;
	}

	public function credits()
	{
		return $this->hasMany(Credit::class);
	}

	public function getTotalCreditsAttribute()
	{
		$total = 0;
		if (count($this->credits) == 0)
			return 0;
		foreach ($this->credits as $c) {
			if (!isset($c->invoiceCreditRedemption->id))
				$total += $c->value;
		}
		return $total;
	}

	public function getApplicableDiscount(int $price)
	{
		$max_credits_discount = round($price * 0.3);
		$discount = 0;
		if ($this->totalCredits * 0.1 <= $max_credits_discount)
			return $this->totalCredits * 0.1;
		return $max_credits_discount;
	}

	public function redeemCredits(Invoice $invoice)
	{
		$price = $invoice->total == 0 ? $invoice->total : $invoice->sub_total;

		$discount = 0;
		$max_credits_discount = round($price * 0.3);
		$redeemedCredits = 0;

		if (count($this->credits) == 0)
			return 0;
		foreach ($this->credits as $c) {
			if (!isset($c->invoiceCreditRedemption->id)) {
				$newDiscount = $discount + $c->value * 0.1;
				if ($newDiscount >= $max_credits_discount)
					break;

				$icr = InvoiceCreditRedemption::create([
					'credit_id' => $c->id,
					'invoice_id' => $invoice->id
				]);
				$redeemedCredits += $c->value;
				$discount += round($c->value * 0.1);


			}
		}

		if ($redeemedCredits > 0) {
			$caption = "You have redeemed referrals credit on Emploi";
			$contents = "
            Emploi offers a transparent <a href='" . url('/refer') . "'>Referral Scheme</a> which you used to invite your friends. <br>
            $redeemedCredits Credits have been redeemed and your checkout price was reduced.
            <br><br>
            Thank you for chosing Emploi. <a href='" . url('/refer') . "'>Refer more friends</a>
            ";
			EmailJob::dispatch($this->name, $this->email, 'Emploi Referral Credits Redeemed', $caption, $contents);
		}


		return $discount;
	}


	public function cvcredits()
	{
		return $this->hasMany(CvCredit::class);
	}

	public function getTotalCvCreditsAttribute()
	{
		$total = 0;
		if (count($this->cvcredits) == 0)
			return 0;
		foreach ($this->cvcredits as $c) {
			// if(!isset($c->invoiceCreditRedemption->id))
			$total = $c->value;
		}
		return $total;
	}

	/**
	 * Get cv recommendations
	 */
	public function cvReviewResults()
	{
		return $this->hasMany('App\CVReviewResult');
	}

	/**
	 * Check if a user has done an assessment
	 */
	public function assessed()
	{
		if (Performance::recentScore($this->email) == null) {
			return false;
		} else {
			return true;
		}
	}

	/**
	 * Open a user profile given the email
	 */
	public static function getUserByEmail($email)
	{
		return User::where('email', $email)->first();
	}

	/**
	 * Get the evaluation results for a user
	 */
	public function evaluationResult()
	{
		return $this->applications->map(function ($application) {
			if (isset($application->interview))
				return $application->interview->evaluation;
		})->last();
	}

	/**
	 * Get a user's application for a specific post
	 */
	public function applicationForPost($slug)
	{
		return $this->applications->filter(function ($application) use ($slug) {
			if ($application->post)
				return $application->post->slug == $slug;
		})->last();
	}

	/**
	 * Get a user's saved posts
	 */
	public function savedPosts()
	{
		return $this->belongsToMany('App\Post', 'user_saved_posts');
	}

	/**
	 * Get all test results for a user
	 */
	public function assessmentResults()
	{
		return $this->hasMany('App\TestResult', 'user_id');
	}

	/**
	 * Personality test results
	 */
	public function personalityTestResults()
	{
		return $this->assessmentResults->filter(function ($assessment) {
			return $assessment->type == 'personality practice';
		})->first();
	}

	/**
	 * Personality scores
	 */
	public function personalityScores()
	{
		return $this->personalityTestResults()->personalityResults;
	}
}
