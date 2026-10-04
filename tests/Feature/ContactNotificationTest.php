<?php

namespace Tests\Feature;

use App\Mail\ContactNotification;
use App\Mail\SpamRejection;
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
                && $envelope->replyTo[0]->address === 'jane@example.com'
                && $mail->render()->contains('I enjoyed reviewing your portfolio');
        });
    }

    public function test_known_indexing_spam_is_silently_suppressed(): void
    {
        Mail::fake();
        config(['contact.spam.autorespond' => false]);

        $response = $this->postJson(route('contact.us.store'), [
            'name' => 'Buddy Robe',
            'email' => 'domains@search-skeemadigitalco.com',
            'message' => <<<'MESSAGE'
                Hey

                Include skeemadigitalco.com in Google's Search Index so it can appear in Google search results!

                Feature skeemadigitalco.com here: indexregister.pro
                MESSAGE,
            'cf-turnstile-response' => 'test-token',
        ]);

        $response
            ->assertOk()
            ->assertJson(['message' => 'Message sent successfully.']);

        Mail::assertNotSent(ContactNotification::class);
        Mail::assertNotSent(SpamRejection::class);
    }

    public function test_honeypot_submission_is_silently_suppressed(): void
    {
        Mail::fake();

        $response = $this->postJson(route('contact.us.store'), [
            'name' => 'Automated Visitor',
            'email' => 'visitor@example.com',
            'message' => 'This otherwise looks like an ordinary message.',
            'website' => 'https://spam.example',
            'cf-turnstile-response' => 'test-token',
        ]);

        $response
            ->assertOk()
            ->assertJson(['message' => 'Message sent successfully.']);

        Mail::assertNothingSent();
    }

    public function test_high_confidence_spam_can_receive_a_firm_rejection(): void
    {
        Mail::fake();
        config([
            'contact.spam.autorespond' => true,
            'contact.spam.autorespond_threshold' => 10,
        ]);

        $this->postJson(route('contact.us.store'), [
            'name' => 'Buddy Robe',
            'email' => 'domains@search-skeemadigitalco.com',
            'message' => "Include skeemadigitalco.com in Google's Search Index. Feature it here: indexregister.pro",
            'cf-turnstile-response' => 'test-token',
        ])->assertOk();

        Mail::assertNotSent(ContactNotification::class);
        Mail::assertSent(SpamRejection::class, function (SpamRejection $mail) {
            return $mail->hasTo('domains@search-skeemadigitalco.com')
                && $mail->envelope()->subject === '[Lawrence Portfolio] Unsolicited message rejected'
                && $mail->render()->contains('Do not contact this address');
        });
    }
}
