<?php

namespace Tests\Feature;

use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class InsurerServicesModuleTest extends TestCase
{
    use RefreshDatabase;

    /** @test */
    function adds_a_new_insurer_service()
    {
        $user = factory(\App\User::class)->create();

        $this->actingAs($user)
            ->get(route('service.insurer.create'))
            ->assertViewIs('services.insurers.create')
            ->assertStatus(200);
    }
}
