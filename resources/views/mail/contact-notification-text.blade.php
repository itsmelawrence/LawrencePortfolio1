NEW PORTFOLIO CONTACT

A new message was submitted through the contact form on your portfolio website.

Name: {{ $name }}
Email: {{ $email }}
Received: {{ $submittedAt->copy()->setTimezone('Asia/Manila')->format('F j, Y \a\t g:i A') }} PHT

MESSAGE
{{ $inquiryMessage }}

Reply directly to this email to respond to {{ $name }}.

Source: {{ config('app.url') }}
