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

    public function test_update_task_with_token()
    {
        $task = Task::create([
            'name' => 'Test',
            'description' => 'Desc',
            'edit_token' => '12345-uuid'
        ]);

        $response = $this->putJson("/api/tasks/{$task->id}/12345-uuid", [
            'name' => 'Updated',
            'description' => 'Updated desc'
        ]);

        $response->assertStatus(200)
            ->assertJsonFragment(['name' => 'Updated']);
    }

    public function test_can_delete_a_task()
    {
        // Create the task
        $task = Task::factory()->create([
            'edit_token' => 'delete-token'
        ]);

        // Perform the DELETE request
        $response = $this->deleteJson("/api/tasks/{$task->id}/delete-token");

        $response->assertStatus(200)
            ->assertJson([
                'message' => 'Task deleted'
            ]);

        // Assert it's no longer in the database
        $this->assertDatabaseMissing('tasks', [
            'id' => $task->id,
        ]);
    }
}
