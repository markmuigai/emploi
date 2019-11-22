<?php

namespace Tests\Browser;

use Illuminate\Foundation\Testing\DatabaseMigrations;
use Laravel\Dusk\Browser;
use Tests\DuskTestCase;

use App\User;

class SeekerLoginTest extends DuskTestCase
{
    //use DatabaseMigrations;

    public function testExample()
    {
        $user = User::find(4);

        $this->browse(function ($browser) use ($user) {
            $browser->visit('/login')
                    ->type('username', $user->username)
                    ->type('password', 'password')
                    ->press('Log In')
                    ->assertPathIs('/job-seekers/dashboard');
        });
    }
}
