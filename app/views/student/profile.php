<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?= htmlspecialchars($title); ?></title>
    <style>
        * { box-sizing: border-box; }
        body {
            margin: 0;
            min-height: 100vh;
            font-family: Arial, Helvetica, sans-serif;
            color: #102a43;
            background: linear-gradient(135deg, #edf6ff 0%, #f8fbff 55%, #e6f0ff 100%);
        }
        .topbar { background: #0b2f57; color: white; box-shadow: 0 5px 18px rgba(7,35,68,.18); }
        .nav {
            width: min(980px, calc(100% - 32px));
            margin: 0 auto;
            min-height: 64px;
            display: flex;
            align-items: center;
            justify-content: space-between;
            gap: 18px;
        }
        .brand { font-size: 18px; font-weight: 800; }
        .nav a {
            color: #fff;
            text-decoration: none;
            border: 1px solid rgba(255,255,255,.28);
            padding: 9px 15px;
            border-radius: 9px;
            background: #145da0;
            font-weight: 700;
        }
        .page { width: min(980px, calc(100% - 32px)); margin: 0 auto; padding: 44px 0 58px; }
        .profile-card {
            overflow: hidden;
            background: #fff;
            border: 1px solid #d8e8f8;
            border-radius: 24px;
            box-shadow: 0 20px 55px rgba(20,72,125,.12);
        }
        .hero {
            padding: 32px 34px;
            color: #fff;
            background: linear-gradient(120deg, #082f57, #1268b3 58%, #2a8dd8);
        }
        .badge {
            display: inline-block;
            margin-bottom: 13px;
            padding: 7px 12px;
            border-radius: 999px;
            background: rgba(255,255,255,.16);
            border: 1px solid rgba(255,255,255,.28);
            font-size: 12px;
            font-weight: 800;
        }
        h1 { margin: 0 0 7px; font-size: clamp(28px, 4vw, 42px); }
        .course-line { margin: 0; opacity: .9; font-weight: 650; }
        .content { padding: 30px 34px 35px; }
        .middleware {
            margin-bottom: 24px;
            padding: 14px 16px;
            border-radius: 12px;
            background: #eaf5ff;
            border: 1px solid #c8e3fa;
            border-left: 5px solid #1677c8;
            color: #0b4f8a;
            font-weight: 700;
            line-height: 1.5;
        }
        .details {
            display: grid;
            grid-template-columns: repeat(2, minmax(0, 1fr));
            gap: 14px;
        }
        .item {
            padding: 17px;
            border-radius: 14px;
            border: 1px solid #dceafa;
            background: #f7fbff;
        }
        .wide { grid-column: 1 / -1; }
        .label {
            display: block;
            margin-bottom: 6px;
            color: #67829c;
            font-size: 12px;
            font-weight: 800;
            text-transform: uppercase;
            letter-spacing: .8px;
        }
        .value { display: block; color: #0d345d; font-weight: 800; line-height: 1.45; word-break: break-word; }
        .value a { color: #1268b3; text-decoration: none; }
        .value a:hover { text-decoration: underline; }
        @media (max-width: 680px) {
            .page { padding-top: 28px; }
            .hero, .content { padding: 24px 20px; }
            .details { grid-template-columns: 1fr; }
            .wide { grid-column: auto; }
        }
    </style>
</head>
<body>
    <header class="topbar">
        <nav class="nav">
            <div class="brand">Student Information Hub</div>
            <a href="<?= site_url('student'); ?>">Home</a>
        </nav>
    </header>

    <main class="page">
        <section class="profile-card">
            <div class="hero">
                <span class="badge">Protected Profile · StudentMiddleware Verified</span>
                <h1><?= htmlspecialchars($name); ?></h1>
                <p class="course-line"><?= htmlspecialchars($course); ?> · <?= htmlspecialchars($year); ?> · Section <?= htmlspecialchars($section); ?></p>
            </div>

            <div class="content">
                <div class="middleware"><?= htmlspecialchars($middleware_message, ENT_QUOTES, 'UTF-8'); ?></div>

                <div class="details">
                    <div class="item"><span class="label">Student ID</span><span class="value"><?= htmlspecialchars($student_id); ?></span></div>
                    <div class="item"><span class="label">Student Name</span><span class="value"><?= htmlspecialchars($name); ?></span></div>
                    <div class="item"><span class="label">Course</span><span class="value"><?= htmlspecialchars($course); ?></span></div>
                    <div class="item"><span class="label">Year Level</span><span class="value"><?= htmlspecialchars($year); ?></span></div>
                    <div class="item"><span class="label">Section</span><span class="value"><?= htmlspecialchars($section); ?></span></div>
                    <div class="item"><span class="label">Email</span><span class="value"><?= htmlspecialchars($email); ?></span></div>
                    <div class="item wide"><span class="label">Address</span><span class="value"><?= htmlspecialchars($address); ?></span></div>
                    <div class="item"><span class="label">Contact Number</span><span class="value"><?= htmlspecialchars($contact); ?></span></div>
                    <div class="item"><span class="label">Hobbies</span><span class="value"><?= htmlspecialchars($hobbies); ?></span></div>
                    <div class="item wide"><span class="label">Social Media</span><span class="value"><a href="<?= htmlspecialchars($facebook); ?>" target="_blank" rel="noopener noreferrer">Facebook Profile</a></span></div>
                </div>
            </div>
        </section>
    </main>
</body>
</html>
