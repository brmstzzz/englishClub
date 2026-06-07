<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Login Admin — English Club</title>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;600;700;800&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('assets/css/style.css') }}">
    <style>
        * { box-sizing: border-box; margin: 0; padding: 0; }

        body, html {
            height: 100%;
            font-family: 'Poppins', sans-serif;
            overflow: hidden;
        }

        /* ── BACKGROUND ── */
        .ec-bg {
            position: fixed;
            inset: 0;
            background: linear-gradient(135deg, #0d1f4e 0%, #1F3568 50%, #2a4a8a 100%);
            z-index: 0;
        }
        .ec-bg::before {
            content: '';
            position: absolute;
            width: 500px; height: 500px;
            background: radial-gradient(circle, rgba(255,255,255,0.06) 0%, transparent 70%);
            top: -100px; right: -100px;
            border-radius: 50%;
        }
        .ec-bg::after {
            content: '';
            position: absolute;
            width: 400px; height: 400px;
            background: radial-gradient(circle, rgba(255,255,255,0.04) 0%, transparent 70%);
            bottom: -80px; left: -80px;
            border-radius: 50%;
        }
        .ec-circle-1 {
            position: absolute;
            width: 200px; height: 200px;
            border: 1px solid rgba(255,255,255,0.06);
            border-radius: 50%;
            bottom: 80px; right: 80px;
        }
        .ec-circle-2 {
            position: absolute;
            width: 100px; height: 100px;
            border: 1px solid rgba(255,255,255,0.05);
            border-radius: 50%;
            top: 120px; left: 80px;
        }

        /* ── WRAPPER ── */
        .ec-login-wrapper {
            position: relative;
            z-index: 1;
            min-height: 100vh;
            display: flex;
            align-items: center;
            justify-content: center;
            padding: 24px;
        }

        /* ── CARD ── */
        .ec-login-card {
            width: 100%;
            max-width: 420px;
            background: #ffffff;
            border-radius: 24px;
            overflow: hidden;
            box-shadow: 0 32px 80px rgba(0,0,0,0.3);
            animation: popIn .5s cubic-bezier(.175,.885,.32,1.275) both;
        }

        /* ── CARD HEADER ── */
        .ec-login-header {
            background: linear-gradient(135deg, #1F3568 0%, #2a4a8a 100%);
            padding: 36px 40px 32px;
            text-align: center;
            position: relative;
            overflow: hidden;
        }
        .ec-login-header::before {
            content: '';
            position: absolute;
            width: 180px; height: 180px;
            background: rgba(255,255,255,0.05);
            border-radius: 50%;
            top: -60px; right: -40px;
        }
        .ec-login-logo {
            font-size: 1.6rem;
            font-weight: 800;
            letter-spacing: 1px;
            position: relative;
            z-index: 1;
            color: #ffffff;
        }
        .ec-login-logo .dim { color: rgba(255,255,255,0.6); }

        .ec-login-badge {
            display: inline-block;
            background: rgba(255,255,255,0.12);
            color: rgba(255,255,255,0.9);
            font-size: .7rem;
            font-weight: 600;
            letter-spacing: 1.5px;
            text-transform: uppercase;
            padding: 4px 14px;
            border-radius: 20px;
            margin-top: 10px;
            position: relative;
            z-index: 1;
            border: 1px solid rgba(255,255,255,0.15);
        }

        /* ── CARD BODY ── */
        .ec-login-body {
            padding: 36px 40px 40px;
        }
        .ec-login-body h5 {
            font-size: 1.1rem;
            font-weight: 700;
            color: #1F3568;
            margin-bottom: 6px;
        }
        .ec-login-body p {
            font-size: .82rem;
            color: #8492b0;
            margin-bottom: 28px;
        }

        /* ── FORM ── */
        .ec-form-group { margin-bottom: 20px; }
        .ec-form-group label {
            display: block;
            font-size: .8rem;
            font-weight: 600;
            color: #1F3568;
            margin-bottom: 8px;
            letter-spacing: .3px;
        }
        .ec-form-group input {
            width: 100%;
            padding: 12px 16px;
            border: 1.5px solid #e2e8f0;
            border-radius: 10px;
            font-size: .88rem;
            font-family: 'Poppins', sans-serif;
            color: #1F3568;
            transition: border-color .2s, box-shadow .2s;
            outline: none;
            background: #f8faff;
        }
        .ec-form-group input:focus {
            border-color: #1F3568;
            box-shadow: 0 0 0 3px rgba(31,53,104,0.08);
            background: #fff;
        }
        .ec-form-group input::placeholder { color: #b0bcd4; }

        /* ── BUTTON ── */
        .ec-btn-login {
            width: 100%;
            padding: 14px;
            background: linear-gradient(135deg, #1F3568 0%, #2a4a8a 100%);
            color: #ffffff;
            border: none;
            border-radius: 10px;
            font-size: .95rem;
            font-weight: 700;
            font-family: 'Poppins', sans-serif;
            letter-spacing: .5px;
            cursor: pointer;
            transition: opacity .2s, transform .15s, box-shadow .2s;
            margin-top: 8px;
        }
        .ec-btn-login:hover {
            opacity: .9;
            transform: translateY(-1px);
            box-shadow: 0 8px 24px rgba(31,53,104,0.3);
        }
        .ec-btn-login:active { transform: translateY(0); }

        /* ── ALERT ── */
        .ec-alert {
            background: #fff0f0;
            border: 1px solid #ffd0d0;
            color: #c0392b;
            padding: 10px 14px;
            border-radius: 8px;
            font-size: .82rem;
            margin-bottom: 20px;
        }

        /* ── FOOTER NOTE ── */
        .ec-login-footer {
            text-align: center;
            padding: 0 40px 28px;
            font-size: .75rem;
            color: #b0bcd4;
        }

        /* ── ANIMATION ── */
        @keyframes popIn {
            from { opacity: 0; transform: scale(0.92) translateY(20px); }
            to   { opacity: 1; transform: scale(1) translateY(0); }
        }
    </style>
</head>
<body>

    <div class="ec-bg">
        <div class="ec-circle-1"></div>
        <div class="ec-circle-2"></div>
    </div>

    <div class="ec-login-wrapper">
        <div class="ec-login-card">

            {{-- HEADER --}}
            <div class="ec-login-header">
                <div class="ec-login-logo">
                    ENGLISH<span class="dim">CLUB</span>
                </div>
                <div class="ec-login-badge">Admin Portal</div>
            </div>

            {{-- BODY --}}
            <div class="ec-login-body">
                <h5>Selamat Datang!</h5>
                <p>Masuk untuk mengelola data English Club.</p>

                @if($errors->any())
                    <div class="ec-alert">
                        {{ $errors->first() }}
                    </div>
                @endif

                <form action="{{ route('admin.login') }}" method="POST">
                    @csrf

                    <div class="ec-form-group">
                        <label>Email</label>
                        <input type="email" name="email"
                            value="{{ old('email') }}"
                            placeholder="Masukkan email"
                            required autofocus>
                    </div>

                    <div class="ec-form-group">
                        <label>Password</label>
                        <input type="password" name="password"
                            placeholder="Masukkan password"
                            required>
                    </div>

                    <button type="submit" class="ec-btn-login">
                        Masuk &rarr;
                    </button>
                </form>
            </div>

            {{-- FOOTER --}}
            <div class="ec-login-footer">
                &copy; {{ date('Y') }} English Club. All rights reserved.
            </div>

        </div>
    </div>

</body>
</html>