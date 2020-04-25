<?php

namespace Tests\Feature\Employers;

use Illuminate\Foundation\Testing\DatabaseTransactions;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;
use Session;

class RequestAdvertTest extends TestCase
{
    use DatabaseTransactions; 

    public function testPostAJobPageLoads()
    {
        $response = $this->get('/post-a-job');

        $response->assertStatus(200);
    }

    public function testAdvertRequestCreated()
    {
        Session::start();
        $response = $this->post('/employers/publish', [
            'name' => 'Example-github-token',
            'phone_number' => '252626232325',
            'co_name' => 'Jobsikaz Tests',
            'email' => 'test@emploi.co',
            'title' => 'Sample job title',
            'description' => 'This is an example job post',
            '_token' => csrf_token()
        ]);
        $response
            ->assertStatus(200)
            ->assertViewIs('adverts.created');
    }
    //testAdvertRequestCreated
    //testAccountCreatedIfNotExisting
    //testEmployerCanVerifyAccount
    //testEmployerCanLogin
    //testEmailSent
    //testCovid19Checkout
    //testEmployerCanContinuePostingAfterLogin
}
