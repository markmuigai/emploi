<?php

namespace App\Http\Controllers\JobSeeker;

use Auth;
use App\Post;
use App\User;
use App\Choice;
use App\Question;
use App\Industry;
use App\Performance;
use Illuminate\Http\Request;
use App\ApplicationPerformance;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;

class SelfAssessmentController extends Controller
{
    /**
     * Display a listing of the self assessment.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if(request()->email !== auth()->user()->email){
            return abort(403);
        }
        
        // Show assessment
        return view('v2.seekers.self-assessment.index',[
            'score' => Performance::recentScore(request()->email),
            'performances' => Performance::LatestAssessment(request()->email)
        ]);
    }

    /**
     * Show the form for creating a new self assessment.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {   
        // Check if the assessment has been sent by an employer
        if(isset($request->slug)){
            // Find post
            $post = Post::where('slug', $request->slug)->first();

            // Check if the candidate has applied for the post
            if( null!= auth()->user()->applicationForPost($request->slug) ){
                $application = auth()->user()->applicationForPost($request->slug);
                // Check if the candidate has already done the assessment
                if($application->performance->isEmpty()){
                    return view('v2.seekers.self-assessment.create',[
                        'questions' =>  $post->questions
                    ]);
                }else{
                    // abort your results have already been submitted!
                    return abort(403);
                }
            }else{
                // abort, permission denied
            }
        }

        $user=Auth::user();

        if(auth()->user() && auth()->user()->role == 'seeker'){

            if (Performance::canDoAssessment($user->email)) {
            $questions = Industry::findOrFail(auth()->user()->seeker->industry_id)
                                        ->getAssessmentQuestions((auth()->user()->seeker->years_experience)*12);   
            }
            else{
               return view('v2.seekers.self-assessment.cannot',[
                            'email' => $user->email]);
            }
            
        }else

            if (Performance::canDoAssessment(request()->email)) {
             // Get industry and fetch questions based on user profile
                $questions = Industry::findOrFail($request->payload['industry'])->getAssessmentQuestions($request->payload['experience']);   
            }
            else{
               return view('v2.seekers.self-assessment.cannot',[
                           'email' => request()->email]);
            }

            // Take 5 questions generated by the algorithm and 5 diagramatic questions
            $withImg = Question::has('image')->with('image')->get()->random(5);

        // Return view
        return view('v2.seekers.self-assessment.create',[
            'questions' => $questions->take(5)->push($withImg)->flatten()->shuffle()
        ]);
    }

    /**
     * Store a newly created self assessment in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {   
        if(auth()->user() && auth()->user()->role == 'seeker'){
            $email = auth()->user()->email;

        }else{
            $email = $request->email;
        }

        DB::transaction(function () use($request, $email) {
            // dd($request->all());
            // Fetch previous assessments for an email
            $perfs = Performance::where('email', $email)->get();

            // If they have never been assessed
            if($perfs->isEmpty()){
                $assessment_count = 1;            
            }else{
                // Get their most recent assessment_count + 1
                $assessment_count = Collect($perfs)->last()->assessment_count + 1;
            }

            // If they have attempted any question
            if(isset($request->choices)){
                // questions done
                $questionsDone = array_keys($request->choices);

                foreach($request->choices as $question_id => $choice_id)
                {
                    $question = Question::findOrFail($question_id);
                    // if the question is a diagram
                    if(isset($question->image)){
                        // Get choice id
                        $options = collect(['a','b','c','d']);
                        // dd($choice_id,$question->image->correct_value);
                        // choice id is either a,b,c,d
                        // Check if correct value provided
                        if($choice_id == $question->image->correct_value){
                            // dd($choice_id[0],$question->image->correct_value);
                            $choice_id = $options->search($choice_id);
                            $correct = 1;
                        }else{
                            $choice_id = $options->search($choice_id);
                            $correct = 0;
                        }
                    }else{
                        $choice_id = (int)$choice_id[0];
                        $correct = Choice::find($choice_id)->correct_value;
                    }
                    // Create performance record
                    $performance = Performance::create([
                        'user_id' => null,
                        'assessment_count' => $assessment_count,
                        'email' => $email,           
                        'question_id' => $question_id,
                        'choice_id' => $choice_id,
                        'correct' => $correct,
                        'optional_message' => $request->optional_message
                    ]);
                }
            }else{
                $questionsDone = [];
            }

            // questions assigned
            $questionsAssigned = $request->questions;

            // unattemped questions
            $blank = array_diff($questionsAssigned, $questionsDone);

            // Null scores for questions that have not been attempted
            if(isset($blank)){
                foreach($blank as $blank){
                    $performance = Performance::create([
                        'user_id' => null,
                        'assessment_count' => $assessment_count,
                        'email' => $email,           
                        'question_id' => $blank,
                        'choice_id' => 0,
                        'correct' => 0,
                        'optional_message' => $request->optional_message
                    ]);
                };
            }

            // Check if the assessment has been sent by an employer
            if(isset($request->slug)){
                // Find post
                $post = Post::where('slug', $request->slug)->first();

                // Check if the candidate has applied for the post
                if( null!= auth()->user()->applicationForPost($request->slug) ){
                    $application = auth()->user()->applicationForPost($request->slug);

                    // Get the recent assessment records
                    $scores = Performance::latestAssessment($email);

                    // Create application_performance pivot records
                    foreach($scores as $score){
                        ApplicationPerformance::create([
                            'application_id' => $application->id,
                            'performance_id' => $score->id
                        ]);
                    }

                    return view('v2.seekers.self-assessment.create',[
                        'questions' =>  $post->questions
                    ]);
                }else{
                    // abort, permission denied
                }
            }
        });

        return redirect()->route('v2.self-assessment.index', [
            'email' => $email
        ]);
    }

    /**
     * Display the specified self assessment.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show()
    {

    }

    /**
     * Show the form for editing the specified self assessment.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified self assessment in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified self assessment from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }

    /**
     * Show questions based on parameters
     */
    public function filterAssessments(Request $request)
    {
        if(auth()->user() && auth()->user()->role == 'seeker'){
            $email = auth()->user()->email;
        }else{
            $email = $request->email;
        }
        return redirect()->route('v2.self-assessment.create',[
            'payload' => [
                'experience' => $request->experience,
                'industry' => $request->industry
            ],
            'email' => $email
        ]);
    }
}
