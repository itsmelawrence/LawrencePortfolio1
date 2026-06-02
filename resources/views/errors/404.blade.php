<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>404 — Page Not Found | LawrenceMadeIt</title>
    <style>
        :root {
            --bg: #0d1117;
            --accent: #00e0ff;
            --text: #ffffff;
            --muted: #a0a0a0;
        }

        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            background: var(--bg);
            color: var(--text);
            font-family: 'Poppins', sans-serif;
            display: flex;
            flex-direction: column;
            align-items: center;
            justify-content: center;
            text-align: center;
            height: 100vh;
            overflow: hidden;
            padding: 2rem;
        }

        .code {
            font-size: clamp(5rem, 15vw, 9rem);
            font-weight: 700;
            color: var(--accent);
            line-height: 1;
            margin-bottom: 1rem;
            opacity: 0.15;
            position: absolute;
            user-select: none;
        }

        .content {
            position: relative;
            z-index: 1;
        }

        .icon {
            font-size: 3rem;
            margin-bottom: 1rem;
        }

        h1 {
            font-size: clamp(1.8rem, 5vw, 3rem);
            margin-bottom: 0.5rem;
        }

        p {
            color: var(--muted);
            font-size: clamp(1rem, 2vw, 1.2rem);
            max-width: 500px;
            margin: 0 auto 2rem;
        }

        a {
            display: inline-block;
            padding: 0.65rem 1.75rem;
            border: 1px solid var(--accent);
            color: var(--accent);
            text-decoration: none;
            border-radius: 4px;
            font-size: 0.95rem;
            transition: background 0.3s, color 0.3s;
        }

        a:hover {
            background: var(--accent);
            color: var(--bg);
        }

        footer {
            position: absolute;
            bottom: 1.5rem;
            font-size: 0.9rem;
            color: var(--muted);
        }

        @media (max-width: 480px) {
            h1 { font-size: 1.8rem; }
            .icon { font-size: 2.5rem; }
        }
    </style>
</head>
<body>
    <div class="code">404</div>
    <div class="content">
        <div class="icon">🔍</div>
        <h1>Nothing Here</h1>
        <p>The page you're looking for doesn't exist or may have been moved.</p>
        <a href="/">Back to Portfolio</a>
    </div>
    <footer>© {{ date('Y') }} LawrenceMadeIt — One mind at work.</footer>
</body>
</html>
