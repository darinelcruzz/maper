<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;
use App\User;


class InsurerServicesModuleTest extends TestCase
{
    use RefreshDatabase;

    /** @test */
    function adds_a_new_insurer_service()
    {
        $user = User::factory()->create();

        $this->actingAs($user)
            ->get(route('service.insurer.create'))
            ->assertViewIs('services.insurers.create')
            ->assertStatus(200);
    }
}
