<?php

namespace Tests\Feature;

use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;
use App\User;
use App\Insurer;

class InsurersModuleTest extends TestCase
{
    use RefreshDatabase;

    /** @test */
    function shows_a_list_with_all_insurers()
    {
        $user = User::factory()->create();

        $insurer = Insurer::factory()->create();

        $this->actingAs($user)
            ->get(route('insurer.index'))
            ->assertViewIs('insurers.index')
            ->assertStatus(200)
            ->assertSee($insurer->name);
    }

    /** @test */
    function creates_a_new_insurer()
    {
        $user = User::factory()->create();

        $this->actingAs($user)
            ->get(route('insurer.create'))
            ->assertViewIs('insurers.create')
            ->assertStatus(200);
    }
}
