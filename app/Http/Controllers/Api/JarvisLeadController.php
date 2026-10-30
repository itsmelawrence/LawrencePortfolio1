<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Contact;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

/**
 * Read-only feed of saved contact messages for the JARVIS Mac app.
 * The app pages forwards with after_id, so each message is sent once.
 */
class JarvisLeadController extends Controller
{
    private const PAGE_SIZE = 100;

    public function __invoke(Request $request): JsonResponse
    {
        $token = (string) config('services.jarvis.leads_token');
        // Without a configured token the feed does not exist.
        abort_if($token === '', 404);
        abort_unless(hash_equals($token, (string) $request->bearerToken()), 401);

        $contacts = Contact::query()
            ->where('id', '>', max(0, $request->integer('after_id')))
            ->orderBy('id')
            ->limit(self::PAGE_SIZE + 1)
            ->get();

        return response()->json([
            'data' => $contacts->take(self::PAGE_SIZE)->map(fn (Contact $contact) => [
                'id' => $contact->id,
                'name' => $contact->name,
                'email' => $contact->email,
                'subject' => $contact->subject,
                'message' => $contact->message,
                'created_at' => $contact->created_at?->toIso8601ZuluString(),
            ])->values(),
            'has_more' => $contacts->count() > self::PAGE_SIZE,
        ]);
    }
}
