<?php

namespace Tests\Feature;

use App\Models\User;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class UsersTest extends TestCase
{
    use DatabaseMigrations;
    /**
     * A basic feature test example.
     * @test
     * @return void
     */

    public function a_user_object()
    {
        $user = User::query()->create([
            'name'=> 'user test',
            'email'=> 'test@gmail',
            'password'=> '123455789',
            'phone'=> '01323454679',
            'is_active'=> true
        ]);

        $response = $this->get('/api/1/users/');

        $response->assertStatus(200)->assertSee([
            'name'=> 'user test',
            'id'=>$user->id
        ]);
    }
    /**
     * @test
     */
    public function list_all_users(){
        $user = User::query()->create([
            'name'=> 'user66 test',
            'email'=> 'test66@gmail',
            'password'=> '123455789',
            'phone'=> '01322454679',
            'is_active'=> true
        ]);
        $user = User::query()->create([
            'name'=> 'user23 test',
            'email'=> 'test22@gmail',
            'password'=> '123455789',
            'phone'=> '01323454679',
            'is_active'=> true
        ]);
        $response = $this->get('/api/1/users/');
        $response->assertStatus(200)->assertSee([
            'name'=>'user23 test',
            'id'=> $user->id
        ]);
    }

    /**
     * @test
     */
    public function add_new_user(){
        $response = $this->post('/api/1/users/',[
            'name'=>'user19 test',
            'email'=> 'test30@gmail',
            'password'=> '1234557892',
            'phone'=> '01923454679',
            'is_active'=> true
        ]);
        $response->assertStatus(201)->assertSee([
            'name'=>'user19 test'
        ]);

    }
    /**
     * @test
     */
    public function update_user_data(){
        $user=\App\Models\User::query()->create([
            'name'=>'user19 test',
            'email'=> 'test30@gmail',
            'password'=> '1234557892',
            'phone'=> '01923454679',
            'is_active'=> true
        ]);
        $response= $this->put('/api/1/users/'.$user->id,[
            'name'=>'user66 test',
            'email'=> 'test66@gmail',
            'is_active'=> true
        ]);
        $response->assertStatus(200)->assertSee([
            'name'=>'user66 test'
        ]);
    }
}
