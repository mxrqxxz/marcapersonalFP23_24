<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class ReconocimientoControllerTest extends TestCase
{
    /**
     * A basic feature test example.
     */
    public function test_ReconocimientoController(): void
    {
        /**
         * reconocimientos index test.
         */
        $response = $this->get('/reconocimientos');
        $estudiantesIds = [
            '1',
            '2',
            '3',
            '4',
            '5',
            '6',
            '7',
            '8',
            '9',
            '10',
        ];

        $response
        ->assertStatus(200)
        ->assertViewIs('reconocimientos.index')
        ->assertSeeTextInOrder($estudiantesIds, $escaped = true);

    /**
     * reconocimientos show test.
     */
        $response = $this->get("/reconocimientos/show/1");

        $response
        ->assertStatus(200)
        ->assertViewIs('reconocimientos.show')
        ->assertSeeText('2', $escaped = true);

        $response = $this->get("/reconocimientos/show/2");

        $response
        ->assertSeeText('3', $escaped = true);

        $response = $this->get("/reconocimientos/show/A");
        $response->assertNotFound();

    /**
     * reconocimientos create test.
     */
        $value = 'Añadir Reconocimiento';
        $response = $this->get('/reconocimientos/create');

        $response
        ->assertStatus(200)
        ->assertViewIs('reconocimientos.create')
        ->assertSeeText($value, $escaped = true);

    /**
     * reconocimientos edit test.
     */
        $id = rand(1, 10);
        $value = "Modificar Reconocimiento";
        $response = $this->get("/reconocimientos/edit/$id");

        $response
        ->assertStatus(200)
        ->assertViewIs('reconocimientos.edit')
        ->assertSeeText($value, $escaped = true);

        $response = $this->get("/reconocimientos/edit/A");
        $response->assertNotFound();

    }
}
