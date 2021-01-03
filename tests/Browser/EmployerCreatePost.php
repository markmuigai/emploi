<?php

namespace Tests\Browser;

use Illuminate\Foundation\Testing\DatabaseMigrations;
use Laravel\Dusk\Browser;
use Tests\DuskTestCase;

use App\User;

class EmployerCreatePost extends DuskTestCase
{

    /**
     * A basic browser test example.
     *
     * @return void
     */
    public function testExample()
    {
        $user = User::find(3);

        $this->browse(function ($browser) use ($user) {
            $browser->visit('/login')
                    ->type('username', $user->username)
                    ->type('password', 'password')
                    ->press('Log In')
                    ->assertPathIs('/employers/dashboard')
                    ->assertSee('Post A Job')
                    ->press('Post A Job')
                    ->assertSee('Add A Job')
                    ->type('title', 'Marketting Officer')
                    ->press('Next >')
                    ->assertSee('Job Descriptions')
                    ;
        });
    }
}
