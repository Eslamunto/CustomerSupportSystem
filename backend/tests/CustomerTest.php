<?php

use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class CustomerTest extends TestCase
{
    /**
     * A basic test example.
     *
     * @return void
     */
    public function testExample()
    {
        $this->assertTrue(true);
    }
    public function testDatabase()
	{
    	$customer = factory(App\Customer::class)->make();

    	// Use model in tests...
    	$this->client->request('GET', 'customers');
    	$this->seeInDatabase( 'customer', ['name' => $customer->name], ['email' => $customer->email]);

	}
}
