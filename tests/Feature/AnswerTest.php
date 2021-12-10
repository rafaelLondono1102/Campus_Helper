<?php

namespace Tests\Feature;

use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\DatabaseMigrations;

class AnswerTest extends TestCase
{
    /* use DatabaseMigrations; */
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

    public function test_answerIndex(){
        $response = $this->withHeader('Authorization','Bearer',$this->getToken())
                         ->get('api/v1/answers');
        $response->assertStatus(200);
            
    }

    public function test_answerStore(){
        /* $this->setUp(); */
        $answerData = [
           'answer' => "esto es la respuesta de un test",
           'forum_id' => 1 
        ];

        $response = $this->withHeader('Authorization','Bearer',$this->getToken())
                         ->post('api/v1/answers',$answerData);
        
        $response->assertStatus(201);
        
    }

    public function test_answerShow(){
        $id_respuesta=2;
        $response = $this->withHeader('Authorization','Bearer',$this->getToken())
                         ->get('api/v1/answers/'.$id_respuesta);
        
        $response->assertStatus(200);
        
        
    }

    public function test_answerUpdate(){
        $id_respuesta=2;
        $answerData = [
            'answer' => "esto es la respuesta de un test",
            'forum_id' => 1 
        ];
        $response = $this->withHeader('Authorization','Bearer',$this->getToken())
                         ->put('api/v1/answers/'.$id_respuesta,$answerData);
        
        $response->assertStatus(200);
    }

    public function test_answerDestroy(){
        $id_respuesta=2;
        $response = $this->withHeader('Authorization','Bearer',$this->getToken())
                         ->delete('api/v1/answers/'.$id_respuesta);
       
         $response->assertStatus(204);

    }

    public function test_informacion_vacia(){
        $data = [
            "forum_id" => 1
        ];
        $response = $this->withHeader('Authorization','Bearer',$this->getToken())
                         ->post('api/v1/answers',$data);
        $response->assertStatus(422);
    }

}