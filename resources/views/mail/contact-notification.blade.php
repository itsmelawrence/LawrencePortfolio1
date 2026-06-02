<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <style>
        body { font-family: sans-serif; background: #f4f4f4; margin: 0; padding: 20px; }
        .card { background: #fff; border-radius: 8px; max-width: 560px; margin: auto; padding: 32px; box-shadow: 0 2px 8px rgba(0,0,0,0.08); }
        h2 { color: #2a2a2a; margin-top: 0; }
        .label { font-size: 12px; color: #888; text-transform: uppercase; letter-spacing: 0.05em; margin-bottom: 4px; }
        .value { font-size: 15px; color: #222; margin-bottom: 20px; }
        .message-box { background: #f9f9f9; border-left: 3px solid #7b4f2d; padding: 12px 16px; border-radius: 4px; color: #333; font-size: 15px; white-space: pre-wrap; }
        .footer { margin-top: 32px; font-size: 12px; color: #aaa; text-align: center; }
    </style>
</head>
<body>
    <div class="card">
        <h2>New Contact Form Submission</h2>

        <div class="label">Name</div>
        <div class="value">{{ $contact->name }}</div>

        <div class="label">Email</div>
        <div class="value"><a href="mailto:{{ $contact->email }}">{{ $contact->email }}</a></div>

        <div class="label">Message</div>
        <div class="message-box">{{ $contact->message }}</div>

        <div class="footer">
            Submitted on {{ $contact->created_at->setTimezone('Asia/Manila')->format('F j, Y \a\t g:i A') }} PHT &mdash; Lawrence Portfolio
        </div>
    </div>
</body>
</html>
