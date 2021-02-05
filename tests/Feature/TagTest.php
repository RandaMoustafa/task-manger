<?php

namespace Tests\Feature;

use App\Models\Tag;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class TagTest extends TestCase
{
    /**
     * A basic feature test example.
     * @test
     * @return void
     */
    use DatabaseMigrations;
    public function a_tag_object()
    {
        $tag= Tag::query()->create([
            'name'=> 'Tag1',
            'details'=> 'tag1 details'
        ]);
        $response = $this->get('/api/1/tag/'.$tag->id);

        $response->assertStatus(200)->assertSee([
            'name'=> 'Tag1',
        ]);
    }
    /**
     * @test
     */
    public function list_all_tags(){
        $tag= Tag::query()->create([
            'name'=> 'Tag1',
            'details'=> 'tag1 details'
        ]);
        $tag= Tag::query()->create([
            'name'=> 'Tag2',
            'details'=> 'tag2 details'
        ]);
        $response=$this->get('/api/1/tag/');
        $response->assertStatus(200)->assertSee([
            'id'=> $tag->first()->id,
            'name'=>$tag->first()->name
        ]);
    }
    /**
     * @test
     */
    public function add_new_tag(){
        $response= $this->post('/api/1/tag/',[
            'name'=> 'tag3',
            'details'=> 'tag3 details'
        ]);
        $response-> assertStatus(201)->assertSee([
            'name'=>'tag3'
        ]);

    }
    /**
     * @test
     */
    public function update_tag_data(){
        $tag= Tag::query()->create(
            [
                'name'=> 'tag3',
                'details'=> 'tag3 details'
            ]
        );
        $response= $this->put('api/1/tag/'.$tag->id,[
            'name'=>'tag updated'
        ]);
        $response->assertStatus(200)->assertSee([
            'name'=>'tag updated'
        ]);
    }
}
