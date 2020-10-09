<?php

namespace Tests\Feature;

use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class Admin extends TestCase
{
    
    /**@Test**/

    public function dashboard_need_admin_login()
    {
    	$response =$this->get('/admin/dashboard')
    					->assertRedirect('/login');
    }
}
