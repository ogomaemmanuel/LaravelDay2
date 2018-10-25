<?php

namespace Tests\Unit;

use App\User;
use Illuminate\Support\Facades\Auth;
use Mockery\Exception\BadMethodCallException;
use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class BlogControllerTest extends TestCase
{
    /**
     * A basic test example.
     *
     * @return void
     */
    public function __call($method, $args)
    {
        if (in_array($method, ['get', 'post', 'put', 'patch', 'delete'])) {

            return $this->call($method, $args[0]);
        }
        throw new BadMethodCallException();
    }

    public function loginUser()
    {
        $user = factory(User::class)->create();
        return Auth::login($user, true);
    }

    public function testExample()
    {
        $this->assertTrue(true);
    }

    public function testRedirectsToLoginPage()
    {
        $resp = $this->get('blog');
        $resp->assertStatus(302);
    }

//    public function testIndexRedirectsLogingUrl()
//    {
//        $resp = $this->get('blog/index');
//        $resp->assertRedirectedTo('/login');
//
//    }

    public function testRedirectsToBlogPageOnAuth()
    {
        $this->loginUser();
        $resp = $this->get('blog');
        $resp->assertStatus(200);

    }
}
