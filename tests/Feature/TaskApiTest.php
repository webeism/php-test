<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class TaskApiTest extends TestCase
{
    use RefreshDatabase;

    public function test_can_create_a_task()
    {
        $payload = [
            'name' => 'Test Task',
            'description' => 'This is a valid description of the task.',
        ];

        $response = $this->postJson('/api/tasks', $payload);

        $response->assertStatus(201)
            ->assertJsonStructure(['task' => ['id', 'name', 'description'], 'edit_url']);
    }
}
