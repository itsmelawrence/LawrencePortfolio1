<?php

namespace Tests\Feature;

use App\Models\Contact;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class JarvisLeadFeedTest extends TestCase
{
    use RefreshDatabase;

    private const TOKEN = 'test-leads-token';

    protected function setUp(): void
    {
        parent::setUp();
        config(['services.jarvis.leads_token' => self::TOKEN]);
    }

    public function test_feed_does_not_exist_without_a_configured_token(): void
    {
        config(['services.jarvis.leads_token' => null]);

        $this->withToken(self::TOKEN)->getJson('/api/jarvis/leads')->assertNotFound();
    }

    public function test_feed_rejects_a_missing_or_wrong_token(): void
    {
        $this->getJson('/api/jarvis/leads')->assertUnauthorized();
        $this->withToken('wrong')->getJson('/api/jarvis/leads')->assertUnauthorized();
    }

    public function test_feed_returns_messages_after_the_cursor_oldest_first(): void
    {
        $first = Contact::create(['name' => 'First', 'email' => 'first@example.com', 'message' => 'One']);
        $second = Contact::create(['name' => 'Second', 'email' => 'second@example.com', 'message' => 'Two']);

        $this->withToken(self::TOKEN)->getJson('/api/jarvis/leads')
            ->assertOk()
            ->assertJsonPath('data.0.id', $first->id)
            ->assertJsonPath('data.1.email', 'second@example.com')
            ->assertJsonPath('data.1.message', 'Two')
            ->assertJsonPath('has_more', false);

        $this->withToken(self::TOKEN)->getJson('/api/jarvis/leads?after_id='.$first->id)
            ->assertOk()
            ->assertJsonCount(1, 'data')
            ->assertJsonPath('data.0.id', $second->id);
    }

    public function test_feed_pages_in_hundreds(): void
    {
        foreach (range(1, 101) as $number) {
            Contact::create(['name' => "Lead $number", 'email' => "lead$number@example.com", 'message' => 'Hello']);
        }

        $this->withToken(self::TOKEN)->getJson('/api/jarvis/leads')
            ->assertOk()
            ->assertJsonCount(100, 'data')
            ->assertJsonPath('has_more', true);
    }
}
