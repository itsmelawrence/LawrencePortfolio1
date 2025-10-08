<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Under Construction | LawrenceMadeIt</title>
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

        .gear {
            font-size: 3rem;
            animation: spin 4s linear infinite;
            margin-bottom: 1rem;
        }

        @keyframes spin {
            0% { transform: rotate(0deg); }
            100% { transform: rotate(360deg); }
        }

        h1 {
            font-size: clamp(2rem, 5vw, 3.5rem);
            margin-bottom: 0.5rem;
        }

        p {
            color: var(--muted);
            font-size: clamp(1rem, 2vw, 1.25rem);
            max-width: 600px;
            margin: 0 auto 1.5rem;
        }

        .progress-bar {
            width: 200px;
            height: 6px;
            background: rgba(255,255,255,0.1);
            border-radius: 3px;
            overflow: hidden;
            position: relative;
        }

        .progress {
            position: absolute;
            left: 0;
            top: 0;
            height: 100%;
            width: 0%;
            background: var(--accent);
            animation: loading 3s ease-in-out infinite;
        }

        @keyframes loading {
            0% { width: 0%; }
            50% { width: 100%; }
            100% { width: 0%; }
        }

        footer {
            position: absolute;
            bottom: 1.5rem;
            font-size: 0.9rem;
            color: var(--muted);
        }

        @media (max-width: 480px) {
            .gear {
                font-size: 2.5rem;
            }
            h1 {
                font-size: 2rem;
            }
        }
    </style>
</head>
<body>
    <div class="gear">⚙️</div>
    <h1>Just Making Some Adjustments</h1>
    <p>The site’s under construction right now. I’m refining a few details behind the scenes. I’ll be back shortly with everything running smoother than ever.</p>
    <div class="progress-bar">
        <div class="progress"></div>
    </div>
    <footer>© {{ date('Y') }} LawrenceMadeIt — One mind at work.</footer>
</body>
</html>
