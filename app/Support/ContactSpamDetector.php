<?php

namespace App\Support;

final class ContactSpamDetector
{
    /**
     * @param  array{name: string, email: string, message: string, website?: string|null}  $submission
     * @return array{is_spam: bool, score: int, reasons: array<int, string>}
     */
    public function inspect(array $submission): array
    {
        $score = 0;
        $reasons = [];
        $message = strtolower($submission['message']);
        $emailDomain = strtolower(substr((string) strrchr($submission['email'], '@'), 1));

        $add = function (int $points, string $reason) use (&$score, &$reasons): void {
            $score += $points;
            $reasons[] = $reason;
        };

        if (trim((string) ($submission['website'] ?? '')) !== '') {
            $add(100, 'honeypot_filled');
        }

        if (
            str_contains($emailDomain, 'skeemadigitalco')
            && preg_match('/(?:^|[.\-])(search|seo|index|rank)(?:[.\-])/', $emailDomain)
        ) {
            $add(8, 'brand_impersonation_domain');
        } elseif (preg_match('/(?:^|[.\-])(search|seo|index|rank|marketing)(?:[.\-]|$)/', $emailDomain)) {
            $add(2, 'marketing_sender_domain');
        }

        if (
            preg_match('/include\s+\S+\s+in\s+google(?:\'s|’s)?\s+search\s+index/', $message)
            || str_contains($message, 'appear in google search results')
            || str_contains($message, 'google search index')
        ) {
            $add(6, 'google_index_solicitation');
        }

        if (
            preg_match('/\b(search engine optimization|domain authority|backlinks?|google ranking|first page of google)\b/', $message)
        ) {
            $add(4, 'seo_solicitation');
        }

        if (
            preg_match('/\b(increase (?:your )?(?:website )?traffic|rank your (?:site|website)|free seo audit|guest posts?|link building)\b/', $message)
        ) {
            $add(4, 'marketing_pitch');
        }

        if (preg_match('/(?:https?:\/\/|www\.|\b[a-z0-9][a-z0-9-]*\.(?:com|net|org|io|ai|pro|top|xyz|click|site)\b)/', $message)) {
            $add(1, 'external_link');
        }

        if (
            str_contains($message, 'indexregister.pro')
            || preg_match('/\b(index|rank|seo)[a-z0-9-]*\.(?:pro|top|xyz|click|site)\b/', $message)
        ) {
            $add(8, 'suspicious_marketing_domain');
        }

        if (
            preg_match('/\b(feature|register|submit|list)\s+\S+\s+(?:here|on our|in our)\b/', $message)
            || str_contains($message, 'submit your website')
        ) {
            $add(3, 'directory_solicitation');
        }

        return [
            'is_spam' => $score >= (int) config('contact.spam.threshold', 6),
            'score' => $score,
            'reasons' => array_values(array_unique($reasons)),
        ];
    }
}
