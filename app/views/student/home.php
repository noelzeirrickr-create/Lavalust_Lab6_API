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
            background: linear-gradient(135deg, #eef6ff 0%, #f8fbff 48%, #e8f2ff 100%);
        }
        .topbar {
            background: #0b2f57;
            color: #fff;
            box-shadow: 0 5px 18px rgba(7, 35, 68, .18);
        }
        .nav {
            width: min(980px, calc(100% - 32px));
            margin: 0 auto;
            min-height: 64px;
            display: flex;
            align-items: center;
            justify-content: space-between;
            gap: 18px;
        }
        .brand { font-size: 18px; font-weight: 800; letter-spacing: .2px; }
        .nav-links { display: flex; align-items: center; gap: 10px; }
        .home-link {
            color: #fff;
            text-decoration: none;
            border: 1px solid rgba(255,255,255,.28);
            padding: 9px 15px;
            border-radius: 9px;
            background: #145da0;
            font-weight: 700;
        }
        .profile-link {
            color: #fff;
            text-decoration: none;
            border: 1px solid rgba(255,255,255,.28);
            padding: 9px 15px;
            border-radius: 9px;
            background: transparent;
            font-weight: 700;
        }
        .profile-link:hover {
            background: rgba(255,255,255,.1);
        }
        .page {
            width: min(980px, calc(100% - 32px));
            margin: 0 auto;
            padding: 46px 0 56px;
        }
        .card {
            background: #fff;
            border: 1px solid #d8e8f8;
            border-radius: 24px;
            padding: 34px;
            box-shadow: 0 20px 55px rgba(20, 72, 125, .12);
        }
        .heading {
            display: flex;
            align-items: center;
            gap: 18px;
            margin-bottom: 28px;
        }
        .avatar {
            width: 70px;
            height: 70px;
            border-radius: 20px;
            display: grid;
            place-items: center;
            color: #fff;
            font-size: 24px;
            font-weight: 800;
            background: linear-gradient(145deg, #0b4f8a, #1677c8);
            box-shadow: 0 10px 25px rgba(20, 93, 160, .28);
        }
        h1 { margin: 0 0 6px; color: #0b3158; font-size: clamp(28px, 4vw, 42px); }
        .subtitle { margin: 0; color: #607d98; line-height: 1.5; }
        .notice {
            margin-bottom: 24px;
            padding: 15px 17px;
            border-radius: 12px;
            background: #fff2f2;
            border: 1px solid #f3bbbb;
            border-left: 5px solid #c62828;
            color: #992323;
            font-weight: 700;
            line-height: 1.5;
        }
        .info-grid {
            display: grid;
            grid-template-columns: repeat(2, minmax(0, 1fr));
            gap: 14px;
            margin-bottom: 26px;
        }
        .info {
            background: #f5f9ff;
            border: 1px solid #dceafa;
            border-radius: 14px;
            padding: 17px;
        }
        .label {
            display: block;
            margin-bottom: 6px;
            color: #67829c;
            font-size: 12px;
            font-weight: 800;
            text-transform: uppercase;
            letter-spacing: .8px;
        }
        .value { color: #0d345d; font-size: 16px; font-weight: 800; word-break: break-word; }
        .button {
            display: inline-block;
            text-decoration: none;
            color: #fff;
            background: linear-gradient(135deg, #0b4f8a, #1677c8);
            padding: 13px 21px;
            border-radius: 11px;
            font-weight: 800;
            box-shadow: 0 9px 20px rgba(20, 93, 160, .22);
        }
        .button:hover { background: linear-gradient(135deg, #093d6a, #1264aa); }
        .note { margin: 17px 0 0; color: #6f879d; font-size: 13px; line-height: 1.55; }
        @media (max-width: 680px) {
            .page { padding-top: 28px; }
            .card { padding: 24px 20px; }
            .heading { align-items: flex-start; }
            .info-grid { grid-template-columns: 1fr; }
        }
    </style>
</head>
<body>
    <header class="topbar">
        <nav class="nav">
            <div class="brand">Student Information</div>
            <div class="nav-links">
                <a class="home-link" href="<?= site_url('student'); ?>">Home</a>
                <a class="profile-link" href="<?= site_url('student/profile'); ?>">Student Profile</a>
            </div>
        </nav>
    </header>

    <main class="page">
        <section class="card">
            <div class="heading">
                <div class="avatar">STI</div>
                <div>
                    <h1>Student Information</h1>
                    <p class="subtitle">Web Systems and Technologies · Laboratory Exercise No. 3</p>
                </div>
            </div>

            <?php if (!empty($notice)): ?>
                <div class="notice"><?= htmlspecialchars($notice, ENT_QUOTES, 'UTF-8'); ?></div>
            <?php endif; ?>

            <div class="info-grid">
                <div class="info"><span class="label">Student ID</span><span class="value"><?= htmlspecialchars($student_id); ?></span></div>
                <div class="info"><span class="label">Student Name</span><span class="value"><?= htmlspecialchars($name); ?></span></div>
                <div class="info"><span class="label">Course</span><span class="value"><?= htmlspecialchars($course); ?></span></div>
                <div class="info"><span class="label">Year Level</span><span class="value"><?= htmlspecialchars($year); ?></span></div>
                <div class="info"><span class="label">Section</span><span class="value"><?= htmlspecialchars($section); ?></span></div>
                <div class="info"><span class="label">Email</span><span class="value"><?= htmlspecialchars($email); ?></span></div>
            </div>

            <a class="button" href="<?= site_url('student/open-profile'); ?>">Open Protected Profile</a>
            <p class="note">The Student Profile is protected by StudentMiddleware. Directly entering <strong>/student/profile</strong> or <strong>/profile</strong> is denied; access is granted only through the button above.</p>
        </section>
    </main>
</body>
</html>