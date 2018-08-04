<?php

namespace Tests\Browser;

use Tests\DuskTestCase;
use Laravel\Dusk\Browser;
use Illuminate\Foundation\Testing\DatabaseMigrations;

class RegistrationTest extends DuskTestCase
{
    public function test_a_guest_can_do_registration()
    {
        $this->browse(function ($browser) {
            $browser->visit('/register')
                ->type('name', 'Awesome Tester')
                ->type('email', 'test@test.com')
                ->type('password', 'somegreatconspiracy')
                ->type('password_confirmation', 'somegreatconspiracy')
                ->press('Register')
                ->assertPathIs('/home');
        });
    }
}
