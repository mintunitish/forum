<?php

namespace Tests\Browser;

use App\User;
use Tests\DuskTestCase;
use Laravel\Dusk\Chrome;
use Illuminate\Foundation\Testing\DatabaseMigrations;

class LoginTest extends DuskTestCase
{

    public function test_non_registered_users_can_not_log_in()
    {
        $this->browse(function ($browser) {
            $browser->visit('/login')
                ->type('email', 'some@random.guy')
                ->type('password', 'secret')
                ->press('Login')
                ->assertPathIs('/login');
        });
    }

    /**
     * @throws \Throwable
     */
    public function test_a_registered_user_can_log_in()
    {
        $user = factory(User::class)->create([
            'email' => 'tmastas@jasmdfn.com',
        ]);

        $this->browse(function ($browser) use ($user) {
            $browser->visit('/login')
                ->type('email', $user->email)
                ->type('password', 'secret')
                ->press('Login')
                ->assertPathIs('/home');
        });
    }

    // TODO: For register page tests
}
