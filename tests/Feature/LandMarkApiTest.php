<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class LandMarkApiTest extends TestCase
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
                         ->get('api/v1/landmarks');
        $response->assertStatus(200);
            
    }

    public function test_answerStore(){
        /* $this->setUp(); */
        $answerData = [
           'name'=>'prueba test para apis',
           'address'=>'en mi casa',
           'description'=>'esto es la descripcion de un test'
        ];

        $response = $this->withHeader('Authorization','Bearer',$this->getToken())
                         ->post('api/v1/landmarks',$answerData);
        
        $response->assertStatus(201);
        
    }

    public function test_answerShow(){
        $id_respuesta=2;
        $response = $this->withHeader('Authorization','Bearer',$this->getToken())
                         ->get('api/v1/landmarks/'.$id_respuesta);
        
        $response->assertStatus(201);
        
        
    }

    public function test_answerUpdate(){
        $id_respuesta=2;
        $answerData = [
            'name'=>'prueba test para apis',
            'address'=>'en mi casa',
            'description'=>'esto es la descripcion de un test'
        ];
        $response = $this->withHeader('Authorization','Bearer',$this->getToken())
                         ->put('api/v1/landmarks/'.$id_respuesta,$answerData);
        
        $response->assertStatus(200);
    }

    public function test_answerDestroy(){
        $id_respuesta=2;
        $response = $this->withHeader('Authorization','Bearer',$this->getToken())
                         ->delete('api/v1/landmarks/'.$id_respuesta);
       
         $response->assertStatus(204);

    }

    public function test_informacion_vacia(){
        $data = [
            'name'=>'la universidad autonoma de manizales'
        ];
        $response = $this->withHeader('Authorization','Bearer',$this->getToken())
                         ->post('api/v1/landmarks',$data);
        $response->assertStatus(422);
    }
}
