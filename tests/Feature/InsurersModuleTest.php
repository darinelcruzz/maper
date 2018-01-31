<?php

namespace Tests\Feature;

use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class InsurersModuleTest extends TestCase
{
    use RefreshDatabase;

    /** @test */
    function shows_a_list_with_all_insurers()
    {
        $user = factory(\App\User::class)->create();

        $insurer = factory(\App\Insurer::class)->create();

        $this->actingAs($user)
            ->get(route('insurer.index'))
            ->assertViewIs('insurers.index')
            ->assertStatus(200)
            ->assertSee($insurer->name);
    }

    /** @test */
    function creates_a_new_insurer()
    {
        $user = factory(\App\User::class)->create();

        $this->actingAs($user)
            ->get(route('insurer.create'))
            ->assertViewIs('insurers.create')
            ->assertStatus(200);
    }
}
