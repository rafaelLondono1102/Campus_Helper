<?php

namespace Tests\Feature;

use Carbon\Carbon;
use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class ReportForumsApiTest extends TestCase
{

    public function setUp(): void{
        parent::setUp();
        $this->artisan('migrate:fresh');
        $this->artisan('db:seed');
    } 
    /**
     * A basic feature test example.
     *
     * @return void
     */
    private function getToken(){
        $userData = [
            'email'=> 'hernando.nunezp@autonoma.edu.co',
            'password'=> '12345678'
        ];
        $responseAuth = $this->post('api/v1/login',$userData);

        return $responseAuth['token'];
    }

    public function test_puede_obtener_lista_de_repotes_de_foros()
    {
        $response = $this
            ->withHeader('Authorization', 'Bearer '. $this->getToken())
            ->get('api/v1/reports');

        $response->assertStatus(200);
    }

    public function test_puede_obtener_reporte_de_foro_especifico()
    {
        $response = $this
            ->withHeader('Authorization', 'Bearer '. $this->getToken())
            ->get('api/v1/reports/1');

        $response->assertStatus(200);
    }

    public function test_puede_eliminar_reporte_de_foro_especifico()
    {
        $response = $this
            ->withHeader('Authorization', 'Bearer '. $this->getToken())
            ->delete('api/v1/reports/1');

        $response->assertStatus(204);
    }

    public function test_puede_crear_reportes_de_foro()
    {
        $formdata =[
            'description'=> 'no me gusto esta pregunta',
            'forum_id' => 1,
            'created_at'=>Carbon::now(),
            'updated_at'=>Carbon::now()
        ];

        $response = $this
            ->withHeader('Authorization', 'Bearer '.$this->getToken())
            ->post('api/v1/reports',$formdata);

        $response->assertStatus(201);
    }

    public function test_no_puede_crear_reportes_de_foro_sin_foro_asiciado_existente()
    {
        $formdata =[
            'description'=> 'no me gusto esta pregunta',
            'forum_id' => 27,
            'created_at'=>Carbon::now(),
            'updated_at'=>Carbon::now()
        ];

        $response = $this
            ->withHeader('Authorization', 'Bearer '.$this->getToken())
            ->post('api/v1/reports',$formdata);

        $response->assertStatus(500);
    }

    public function test_no_puede_crear_reportes_de_foro_sin_descripcion_especificada()
    {
        $formdata =[
            'description'=> '',
            'forum_id' => 1,
            'created_at'=>Carbon::now(),
            'updated_at'=>Carbon::now()
        ];

        $response = $this
            ->withHeader('Authorization', 'Bearer '.$this->getToken())
            ->post('api/v1/reports',$formdata);

        $response->assertStatus(500);
    }
}
