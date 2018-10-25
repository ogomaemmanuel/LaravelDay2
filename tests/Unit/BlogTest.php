<?php

namespace Tests\Unit;

use App\Blog;
use Tests\TestCase;

class BlogTest extends TestCase
{

    public function __construct()
    {
    }


    function testBodyRequired()
    {

        $blog = new Blog();
        $blog->name = null;
        $this->assertNotValid($blog);
    }

}