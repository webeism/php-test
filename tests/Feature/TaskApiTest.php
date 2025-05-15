<?php

namespace Tests\Feature;

use Tests\TestCase;
use App\Models\Task;
use Illuminate\Foundation\Testing\RefreshDatabase;

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

    public function test_can_list_tasks()
    {
        Task::factory()->count(2)->create();

        $response = $this->getJson('/api/tasks');

        $response->assertStatus(200)
            ->assertJsonCount(2);
    }
}
