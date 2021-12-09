<?php

namespace Tests\Feature;

use Carbon\Carbon;
use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class EventsApiTest extends TestCase
{
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

    public function test_puede_obtener_lista_de_eventos()
    {
        $response = $this
            ->withHeader('Authorization', 'Bearer '. $this->getToken())
            ->get('api/v1/events');

        $response->assertStatus(200);
    }

    public function test_puede_obtener_evento_especifico()
    {
        $response = $this
            ->withHeader('Authorization', 'Bearer '. $this->getToken())
            ->get('api/v1/events/1');

        $response->assertStatus(200);
    }

    public function test_puede_eliminar_evento_especifico()
    {
        $response = $this
            ->withHeader('Authorization', 'Bearer '. $this->getToken())
            ->delete('api/v1/events/5');

        $response->assertStatus(204);
    }

    public function test_puede_crear_eventos()
    {
        $formdata =[
            'name'=> '2x1 en frisbi',
            'start_date'=> '2021-12-9',
            'end_date'=> '2021-12-15',
            'description'=> 'por un pollo lleve otro gratis',
            'landmark_id' => 1,
            'created_at'=>Carbon::now(),
            'updated_at'=>Carbon::now()
        ];

        $response = $this
            ->withHeader('Authorization', 'Bearer '.$this->getToken())
            ->post('api/v1/events',$formdata);

        $response->assertStatus(201);
    }

    public function test_no_puede_crear_eventos_sin_landmark_asiciado_existente()
    {
        $formdata =[
            'name'=> '2x1 en frisbi',
            'start_date'=> '2021-12-9',
            'end_date'=> '2021-12-15',
            'description'=> 'por un pollo lleve otro gratis',
            'landmark_id' => 23,
            'created_at'=>Carbon::now(),
            'updated_at'=>Carbon::now()
        ];

        $response = $this
            ->withHeader('Authorization', 'Bearer '.$this->getToken())
            ->post('api/v1/events',$formdata);

        $response->assertStatus(500);
    }

    public function test_no_puede_crear_eventos_con_fechas_incoherentes()
    {
        $formdata =[
            'name'=> '2x1 en frisbi',
            'start_date'=> '2021-12-9',
            'end_date'=> '2021-1-15',
            'description'=> 'por un pollo lleve otro gratis',
            'landmark_id' => 2,
            'created_at'=>Carbon::now(),
            'updated_at'=>Carbon::now()
        ];

        $response = $this
            ->withHeader('Authorization', 'Bearer '.$this->getToken())
            ->post('api/v1/events',$formdata);

        $response->assertStatus(500);
    }

    public function test_no_puede_crear_eventos_sin_nombre_especificado()
    {
        $formdata =[
            'name'=> '',
            'start_date'=> '2021-12-9',
            'end_date'=> '2021-12-15',
            'description'=> 'por un pollo lleve otro gratis',
            'landmark_id' => 2,
            'created_at'=>Carbon::now(),
            'updated_at'=>Carbon::now()
        ];

        $response = $this
            ->withHeader('Authorization', 'Bearer '.$this->getToken())
            ->post('api/v1/events',$formdata);

        $response->assertStatus(500);
    }

    public function test_no_puede_crear_eventos_sin_descripcion_especificada()
    {
        $formdata =[
            'name'=> 'fiesta en la UAM',
            'start_date'=> '2021-12-9',
            'end_date'=> '2021-12-15',
            'description'=> '',
            'landmark_id' => 2,
            'created_at'=>Carbon::now(),
            'updated_at'=>Carbon::now()
        ];

        $response = $this
            ->withHeader('Authorization', 'Bearer '.$this->getToken())
            ->post('api/v1/events',$formdata);

        $response->assertStatus(500);
    }

    
}
