<?php
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class RegisterTest extends TestCase
{
    use RefreshDatabase;

    public function test_user_can_register()
    {
        $response = $this->postJson('/auth/store', [
            'name' => 'Ricardo Grana',
            'email' => 'ricardo@gmail.com',
            'password' => 'password',
            'password_confirmation' => 'password',
        ]);

        $response->assertStatus(201)
            ->assertJson(['message' => 'Usuário registrado com sucesso']);

        
        $response = $this->postJson('/auth/store', [
                'name' => 'Lucy',
                'email' => 'lucy@gmail.com',
                'password' => 'password',
                'password_confirmation' => 'password',
            ]);
    
        $response->assertStatus(201)
                ->assertJson(['message' => 'Usuário registrado com sucesso']);
    }
}
