<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>User Management Module</title>
    <style>
        :root {
            --primary: #2563eb;
            --primary-light: #eff6ff;
            --bg: #f8fafc;
            --card: #ffffff;
            --text-dark: #0f172a;
            --text-muted: #64748b;
            --border: #e2e8f0;
        }

        body {
            font-family: 'Inter', system-ui, -apple-system, sans-serif;
            background-color: var(--bg);
            color: var(--text-dark);
            margin: 0;
            padding: 40px 20px;
            display: flex;
            justify-content: center;
        }

        .wrapper {
            width: 100%;
            max-width: 950px;
            background: var(--card);
            border-radius: 16px;
            box-shadow: 0 4px 20px -2px rgba(0,0,0,0.05);
            border: 1px solid var(--border);
            overflow: hidden;
        }

        .header {
            padding: 24px 32px;
            border-bottom: 1px solid var(--border);
            background: #ffffff;
        }

        .header h2 {
            margin: 0;
            font-size: 1.5rem;
            font-weight: 700;
            color: var(--text-dark);
        }

        .header p {
            margin: 4px 0 0;
            color: var(--text-muted);
            font-size: 0.875rem;
        }

        table {
            width: 100%;
            border-collapse: collapse;
            text-align: left;
        }

        th {
            background-color: #f8fafc;
            padding: 14px 24px;
            font-size: 0.75rem;
            font-weight: 600;
            text-transform: uppercase;
            letter-spacing: 0.05em;
            color: var(--text-muted);
            border-bottom: 1px solid var(--border);
        }

        td {
            padding: 16px 24px;
            border-bottom: 1px solid var(--border);
            font-size: 0.925rem;
        }

        tr:last-child td {
            border-bottom: none;
        }

        tr:hover {
            background-color: #f8fafc;
        }

        .badge {
            background: var(--primary-light);
            color: var(--primary);
            padding: 4px 10px;
            border-radius: 20px;
            font-size: 0.8rem;
            font-weight: 600;
        }
    </style>
</head>
<body>

    <div class="wrapper">
        <div class="header">
            <h2>User Directory</h2>
        </div>

        <table>
            <thead>
                <tr>
                    <th>ID</th>
                    <th>First Name</th>
                    <th>Last Name</th>
                    <th>Email Address</th>
                    <th>Username</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach($users as $user): ?>
                <tr>
                    <td><strong><?= htmlspecialchars($user['id']); ?></strong></td>
                    <td><?= htmlspecialchars($user['firstname']); ?></td>
                    <td><?= htmlspecialchars($user['lastname']); ?></td>
                    <td><?= htmlspecialchars($user['email']); ?></td>
                    <td><span class="badge">@<?= htmlspecialchars($user['username']); ?></span></td>
                </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>

</body>
</html>