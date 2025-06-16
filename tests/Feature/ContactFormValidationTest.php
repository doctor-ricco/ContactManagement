<?php

namespace Tests\Feature;

use App\Models\User;
use App\Models\Contact;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class ContactFormValidationTest extends TestCase
{
    use RefreshDatabase;

    /** @test */
    public function cannot_create_contact_with_invalid_data()
    {
        $user = User::factory()->create();

        $this->actingAs($user)
            ->post(route('contacts.store'), [
                'name' => 'abc', // muito curto
                'contact' => '123', // não tem 9 dígitos
                'email' => 'not-an-email', // inválido
            ])
            ->assertSessionHasErrors(['name', 'contact', 'email']);
    }

    /** @test */
    public function cannot_edit_contact_with_invalid_data()
    {
        $user = User::factory()->create();
        $contact = Contact::factory()->create();

        $this->actingAs($user)
            ->put(route('contacts.update', $contact), [
                'name' => 'abc', // muito curto
                'contact' => '123', // não tem 9 dígitos
                'email' => 'not-an-email', // inválido
            ])
            ->assertSessionHasErrors(['name', 'contact', 'email']);
    }
}
