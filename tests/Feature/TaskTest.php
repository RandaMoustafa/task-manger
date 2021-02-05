<?php

namespace Tests\Feature;

use App\Models\Task;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class TaskTest extends TestCase
{
    /**
     * A basic feature test example.
     * @test
     * @return void
     */
    use DatabaseMigrations;
    public function a_task_object()
    {
        $tasks= Task::query()->create([
            'name'=> 'task1',
            'details'=> 'task1 details',
            'due'=> '2021-02-05 14:22:29'
        ]);
        $response = $this->get('/api/1/tasks/'.$tasks->id);

        $response->assertStatus(200)->assertSee([
            'name'=> 'task1',
        ]);
    }

    /**
     * @test
     */
    public function list_all_tasks(){
        $tasks= Task::query()->create([
            'name'=> 'task1',
            'details'=> 'task1 details',
            'due'=> '2021-02-05 14:22:29'
        ]);
        $tasks= Task::query()->create([
            'name'=> 'task2',
            'details'=> 'task2 details',
            'due'=> '2021-02-05 14:22:29'
        ]);
        $response=$this->get('/api/1/tasks/');
        $response->assertStatus(200)->assertSee([
            'id'=> $tasks->first()->id,
            'name'=>$tasks->first()->name
        ]);
    }
    /**
     * @test
     */
    public function add_new_task(){
        $response=$this->post('/api/1/tasks/',[
            'name'=> 'task3',
            'details'=> 'task3 details',
            'due'=> '2021-02-05 14:22:29'
        ]);
        $response-> assertStatus(201)->assertSee([
            'name'=> 'task3',
            ]);

    }
    /**
     * @test
     */
    public function update_task_data(){
        $tasks=Task::query()->create([
            'name'=> 'task3',
            'details'=> 'task3 details',
            'due'=> '2021-02-05 14:22:29'
        ]);
        $response= $this->put('api/1/tasks/'.$tasks->id,[
            'name'=>'task updated'
        ]);
        $response->assertStatus(200)->assertSee([
            'name'=>'task updated'
        ]);

    }

}
