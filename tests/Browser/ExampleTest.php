<?php

namespace Tests\Browser;

use Tests\DuskTestCase;
use Laravel\Dusk\Browser;
use Illuminate\Foundation\Testing\DatabaseMigrations;

use App\User;

class ExampleTest extends DuskTestCase
{
    /**
     * A basic browser test example.
     *
     * @return void
     */
    public function testBasicExample()
    {
        $this->browse(function (Browser $browser) {
            $browser->visit('/')
                    ->assertSee('GET YOUR JOB DONE');
        });

        // print "Testing employers login | ";

        $user = User::find(3);

        $this->browse(function ($browser) use ($user) {
            $browser->visit('/login')
                    ->type('username', $user->username)
                    ->type('password', 'password')
                    ->press('Log In')
                    ->assertPathIs('/employers/dashboard')
                    ->assertSee('Dashboard')
                    ->pause(3000)
                    ->visit('/vacancies/create')
                    ->assertPathIs('/vacancies/create')
                    ->type('title', 'Marketting Specialist')
                    ->press('.toSection2')
                    ->assertSee('Job Description')
                    ->type('responsibilities', 'We are looking for a marketting specialist')
                    ->press('.toSection3')
                    ->pause(1000)
                    ->type('monthly_salary', '40000')
                    ->type('max_salary', '50000')
                    ->press('#save-job-post')
                    ->assertSee('Job Advert Created Succesfully');
        });
    }
}
