<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class ForumApiTest extends TestCase
{
    public function setUp(): void{
        parent::setUp();
        $this->artisan('migrate:fresh');
        $this->artisan('db:seed');
    } 

    private function getToken(){
        $userData = [
            'email'=>'hernando.nunezp@autonoma.edu.co',
            'password'=>'12345678'
        ];
        $responseAuth = $this->post('api/v1/login',$userData);
        return $responseAuth['token'];
    }

    public function test_forumsIndex(){
        $response = $this->withHeader('Authorization','Bearer',$this->getToken())
                         ->get('api/v1/forums');
        $response->assertStatus(200);
            
    }

    public function test_forumsStore(){
        $forumData = [
           'question' => "esto es la pregunta de un foro test",
        ];

        $response = $this->withHeader('Authorization','Bearer',$this->getToken())
                         ->post('api/v1/forums',$forumData);
        
        $response->assertStatus(201);
        
    }

    public function test_forumsShow(){
        $id_foro=2;
        $response = $this->withHeader('Authorization','Bearer',$this->getToken())
                         ->get('api/v1/forums/'.$id_foro);
        
        $response->assertStatus(200);
        
        
    }

    public function test_forumsUpdate(){
        $id_forum=2;
        $forumData = [
            'question' => "esto es la pregunta de un test",
        ];
        $response = $this->withHeader('Authorization','Bearer',$this->getToken())
                         ->put('api/v1/forums/'.$id_forum,$forumData);
        
        $response->assertStatus(200);
    }

    public function test_forumsDestroy(){
        $id_forum=2;
        $response = $this->withHeader('Authorization','Bearer',$this->getToken())
                         ->delete('api/v1/forums/'.$id_forum);
       
         $response->assertStatus(204);

    }

    public function test_informacion_vacia_foro(){
        $data = [
            
        ];
        $response = $this->withHeader('Authorization','Bearer',$this->getToken())
                         ->post('api/v1/forums',$data);
        $response->assertStatus(422);
    }
}
