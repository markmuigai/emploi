<?php

namespace Tests\Feature\Employers;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;
use Session;

class RequestAdvertisement extends TestCase
{
    /**
     * A basic feature test example.
     *
     * @return void
     */
    public function testExample()
    {
        $response = $this->get('/');

        $response->assertStatus(200);
    }
    //testAdvertRequestCreated
    //testAccountCreatedIfNotExisting
    //testEmployerCanVerifyAccount
    //testEmployerCanLogin
    //testEmailSent
    //testCovid19Checkout
    //testEmployerCanContinuePostingAfterLogin
}
