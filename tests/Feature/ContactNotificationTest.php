<?php

namespace Tests\Feature;

use App\Mail\ContactNotification;
use Illuminate\Support\Facades\Mail;
use Tests\TestCase;

class ContactNotificationTest extends TestCase
{
    public function test_contact_submission_sends_a_detailed_notification(): void
    {
        Mail::fake();

        $response = $this->postJson(route('contact.us.store'), [
            'name' => 'Jane Example',
            'email' => 'jane@example.com',
            'message' => 'I enjoyed reviewing your portfolio and wanted to get in touch.',
            'cf-turnstile-response' => 'test-token',
        ]);

        $response
            ->assertOk()
            ->assertJson(['message' => 'Message sent successfully.']);

        Mail::assertSent(ContactNotification::class, function (ContactNotification $mail) {
            $envelope = $mail->envelope();

            return $mail->hasTo('lawrence@skeemadigitalco.com')
                && str_starts_with($envelope->subject, '[Lawrence Portfolio] New message from Jane Example — ')
                && $envelope->replyTo[0]->address === 'jane@example.com';
        });
    }
}
