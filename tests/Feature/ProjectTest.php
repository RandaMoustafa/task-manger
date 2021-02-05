<?php

namespace Tests\Feature;

use App\Models\Project;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class ProjectTest extends TestCase
{
    use DatabaseMigrations;
    /**
     * A basic feature test example.
     * @test
     * @return void
     */

   public function a_project_test()
    {
        $project= Project::query()->create([
            'name'=> 'Project1',
            'details'=> 'project1 details'
        ]);
        $response = $this->get('/api/1/project/' . $project->id);
        $response->assertStatus(200)->assertSee([
            'name'=> 'project1'
        ]);
    }

    /**
     * @test
     */
    public function list_all_project(){
        $project= Project::query()->create([
            'name'=> 'Project1',
            'details'=> 'project1 details'
        ]);
        $project= Project::query()->create([
            'name'=> 'Project2',
            'details'=> 'project2 details'
        ]);
        $response=$this->get('/api/1/project/');
        $response->assertStatus(200)->assertSee([
           'id'=> $project->first()->id,
            'name'=>$project->first()->name
        ]);
    }
    /**
     * @test
     */
   public function add_new_project(){
        $response= $this->post('/api/1/project/',[
          'name'=> 'project3',
            'details'=> 'project3 details'
        ]);
        $response-> assertStatus(201)->assertSee([
            'name'=>'project3'
        ]);
    }

    /**
     * @test
     */

    public function update_project_data(){
        $project= Project::query()->create(
            [
                'name'=> 'project3',
            'details'=> 'project3 details'
            ]
        );
        $response= $this->put('api/1/project/'.$project->id,[
            'name'=>'project updated'
        ]);
        $response->assertStatus(200)->assertSee([
            'name'=>'project updated'
        ]);
    }
}
