<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Auth\Events\Registered;
use Illuminate\Http\Request;

use App\Country;
use App\Industry;
use App\Seeker;
use App\User;
use App\UserPermission;

use Storage;

use App\Jobs\EmailJob;


class RegisterController extends Controller
{
    use RegistersUsers;

    protected $redirectTo = '/registered';

    public function __construct()
    {
        $this->middleware('guest');
    }

    public function showRegistrationForm()
    {
        return view('auth.register')
                ->with('countries',Country::active())
                ->with('industries',Industry::active());
    }

    public function register(Request $request)
    {
        $this->validator($request->all())->validate();

        event(new Registered($user = $this->create($request->all())));

        //$this->guard()->login($user);

        return $this->registered($request, $user)
                        ?: redirect($this->redirectPath());
    }

    protected function validator(array $data)
    {
        //dd($data);
        return Validator::make($data, [
            'name' => ['required', 'string', 'max:50'],
            'phone_number' => ['required', 'string', 'max:15'],
            'email' => ['required', 'string', 'email', 'max:50', 'unique:users'],
            //'password' => ['required', 'string', 'min:8', 'confirmed'],
            'resume' => ['required','mimes:pdf,docx,pdf'],
            'country' => ['required','integer'],
            'industry' => ['required','integer'],
            'prefix' => ['required','integer'],
        ]);
    }

    protected function create(array $data)
    {
        //dd($data);
        $username = explode(" ", $data['name']);
        $username = strtolower(implode("", $username).rand(1000,30000));
        $username = explode(".", $username);
        $username = implode('',$username);

        $password = User::generateRandomString(10);
        $storage_path = '/public/resumes';
        $resume_url = basename(Storage::put($storage_path, $data['resume']));
        $user = User::create([
            'name' => $data['name'],
            'email' => $data['email'],
            'username' => $username,
            'password' => Hash::make($password),
        ]);

        //$resume_url = Storage::putFile('avatars', $request->file('avatar'));

        $country = Country::findOrFail($data['prefix']);

        $seeker = Seeker::create([
            'user_id' => $user->id,
            'public_name' => $username,
            'gender' => $data['gender'],
            'phone_number' => $country->prefix.$data['phone_number'],
            'country_id' => $data['country'],
            'industry_id' => $data['industry'],
            'resume' => $resume_url
        ]);

        $perm = UserPermission::create([
            'user_id' => $user->id, 
            'permission_id' => 4
        ]);
        $caption = "Thank you for registering your profile on Emploi as a Job Seeker.";
        $contents = "Here are your login credentials for Emploi: <br>
username: $username <br>
password: $password

<br><br>
Log in to finish setting up your account for employers to easily find and shortlist you.
        ";
        EmailJob::dispatch($user->name, $user->email, 'Emploi Login Credentials', $caption, $contents);

        return $user;
    }
}
