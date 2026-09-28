<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <style>
        body { font-family: Arial, sans-serif; background: #f3f4f6; margin: 0; padding: 24px; color: #202124; }
        .card { background: #ffffff; border-radius: 10px; max-width: 620px; margin: auto; overflow: hidden; box-shadow: 0 3px 14px rgba(0,0,0,0.08); }
        .header { background: #1f2933; padding: 26px 32px; }
        .eyebrow { color: #d3a47c; font-size: 12px; font-weight: 700; letter-spacing: 0.12em; text-transform: uppercase; }
        h1 { color: #ffffff; font-size: 24px; line-height: 1.3; margin: 8px 0 0; }
        .content { padding: 30px 32px 34px; }
        .intro { color: #5f6368; font-size: 14px; line-height: 1.6; margin: 0 0 26px; }
        .details { border-collapse: collapse; width: 100%; margin-bottom: 26px; }
        .details td { border-bottom: 1px solid #e5e7eb; padding: 12px 0; vertical-align: top; }
        .label { color: #6b7280; font-size: 12px; font-weight: 700; letter-spacing: 0.05em; text-transform: uppercase; width: 130px; }
        .value { color: #202124; font-size: 14px; }
        .value a { color: #0661a7; }
        .message-label { color: #6b7280; font-size: 12px; font-weight: 700; letter-spacing: 0.05em; margin-bottom: 8px; text-transform: uppercase; }
        .message-box { background: #f8fafc; border-left: 4px solid #7b4f2d; padding: 16px 18px; border-radius: 4px; color: #202124; font-size: 15px; line-height: 1.65; white-space: pre-wrap; }
        .reply-button { background: #7b4f2d; border-radius: 5px; color: #ffffff !important; display: inline-block; font-size: 14px; font-weight: 700; margin-top: 24px; padding: 12px 18px; text-decoration: none; }
        .footer { border-top: 1px solid #e5e7eb; color: #8a8f98; font-size: 12px; line-height: 1.5; margin-top: 30px; padding-top: 18px; }
    </style>
</head>
<body>
    <div class="card">
        <div class="header">
            <div class="eyebrow">Lawrence Portfolio</div>
            <h1>New website message</h1>
        </div>

        <div class="content">
            <p class="intro">
                A new message was submitted through the contact form on your portfolio website.
                You can reply directly to this email to respond to the sender.
            </p>

            <table class="details" role="presentation">
                <tr>
                    <td class="label">Name</td>
                    <td class="value">{{ $name }}</td>
                </tr>
                <tr>
                    <td class="label">Email</td>
                    <td class="value"><a href="mailto:{{ $email }}">{{ $email }}</a></td>
                </tr>
                <tr>
                    <td class="label">Received</td>
                    <td class="value">{{ $submittedAt->copy()->setTimezone('Asia/Manila')->format('F j, Y \a\t g:i A') }} PHT</td>
                </tr>
            </table>

            <div class="message-label">Message</div>
            <div class="message-box">{{ $inquiryMessage }}</div>

            <a class="reply-button" href="mailto:{{ $email }}">Reply to {{ $name }}</a>

            <div class="footer">
                This automated notification was sent by Lawrence Portfolio.<br>
                Source: {{ config('app.url') }}
            </div>
        </div>
    </div>
</body>
</html>
