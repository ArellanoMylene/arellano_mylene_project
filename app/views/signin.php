<!DOCTYPE html>
<html lang="en" class="light">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sign In - Modern User Management</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    <style>
        :root {
            --bg-primary: #fdf2f8;
            --bg-secondary: #ffffff;
            --bg-tertiary: #fce7f3;
            --text-primary: #1f2937;
            --text-secondary: #6b7280;
            --text-muted: #9ca3af;
            --accent-primary: #ec4899;
            --accent-secondary: #f472b6;
            --accent-light: #fce7f3;
            --border: #f3e8ff;
            --shadow: rgba(236, 72, 153, 0.1);
            --radius: 16px;
        }

        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            background: linear-gradient(135deg, var(--bg-primary) 0%, var(--accent-light) 100%);
            color: var(--text-primary);
            font-family: 'Inter', -apple-system, BlinkMacSystemFont, sans-serif;
            line-height: 1.6;
            min-height: 100vh;
            display: flex;
            align-items: center;
            justify-content: center;
            padding: 2rem;
        }

        .auth-container {
            background-color: var(--bg-secondary);
            border: 2px solid var(--border);
            border-radius: var(--radius);
            padding: 2rem;
            width: 100%;
            max-width: 400px;
            box-shadow: 0 20px 40px var(--shadow);
        }

        .auth-header {
            text-align: center;
            margin-bottom: 2rem;
        }

        .auth-header h1 {
            font-size: 1.5rem;
            font-weight: 600;
            margin-bottom: 0.5rem;
        }

        .auth-header p {
            color: var(--text-secondary);
            font-size: 0.875rem;
        }

        .form-group {
            margin-bottom: 1rem;
        }

        .form-label {
            display: block;
            margin-bottom: 0.5rem;
            font-weight: 500;
            color: var(--text-primary);
            font-size: 0.875rem;
        }

        .form-control-modern {
            background-color: var(--bg-tertiary);
            border: 2px solid var(--border);
            border-radius: var(--radius);
            padding: 0.75rem;
            color: var(--text-primary);
            width: 100%;
            transition: all 0.3s ease;
            font-size: 0.875rem;
        }

        .form-control-modern:focus {
            outline: none;
            border-color: var(--accent-primary);
            box-shadow: 0 0 0 3px rgba(236, 72, 153, 0.1);
        }

        .form-check {
            display: flex;
            align-items: center;
            gap: 0.5rem;
            margin-bottom: 1.5rem;
        }

        .form-check-input {
            margin: 0;
            accent-color: var(--accent-primary);
        }

        .form-check-label {
            font-size: 0.875rem;
            color: var(--text-secondary);
        }

        .btn-primary-modern {
            background: linear-gradient(135deg, var(--accent-primary) 0%, var(--accent-secondary) 100%);
            color: white;
            border: none;
            border-radius: var(--radius);
            padding: 0.75rem;
            font-weight: 500;
            width: 100%;
            transition: all 0.3s ease;
            display: flex;
            align-items: center;
            justify-content: center;
            gap: 0.5rem;
            margin-bottom: 1.5rem;
            box-shadow: 0 4px 16px var(--shadow);
        }

        .btn-primary-modern:hover {
            background: linear-gradient(135deg, #db2777 0%, var(--accent-primary) 100%);
            transform: translateY(-2px);
            box-shadow: 0 8px 32px rgba(236, 72, 153, 0.3);
        }

        .auth-footer {
            text-align: center;
            color: var(--text-secondary);
            font-size: 0.875rem;
        }

        .auth-footer a {
            color: var(--accent-primary);
            text-decoration: none;
            font-weight: 500;
        }

        .auth-footer a:hover {
            text-decoration: underline;
        }
    </style>
</head>
<body>
    <div class="auth-container">
        <div class="auth-header">
            <h1><i class="fas fa-sign-in-alt me-2"></i>Welcome Back</h1>
            <p>Sign in to your account to continue</p>
        </div>
            <?php getErrors(); ?>
        <?php getMessage(); ?>
            <form id="loginForm" action="<?= site_url('login'); ?>" method="POST">
            <div class="form-group">
                <label class="form-label" for="loginEmail">
                    <i class="fas fa-envelope me-1"></i>Email Address
                </label>
                <input type="email" name="email" class="form-control-modern" id="loginEmail" placeholder="Enter your email" required>
            </div>

            <div class="form-group">
                <label class="form-label" for="loginPassword">
                    <i class="fas fa-lock me-1"></i>Password
                </label>
                <input type="password" name="password" class="form-control-modern" id="loginPassword" placeholder="Enter your password" required>
            </div>

            <div class="form-check">
                <input class="form-check-input" type="checkbox" id="rememberMe">
                <label class="form-check-label" for="rememberMe">
                    Remember me
                </label>
            </div>

            <button type="submit" class="btn-primary-modern">
                <i class="fas fa-sign-in-alt"></i>
                Sign In
            </button>

            <div class="auth-footer">
                Don't have an account? <a href="<?= site_url('signup'); ?>">Register here</a>
            </div>
        </form>
    </div>
          <script src="<?= BASE_URL; ?>/public/js/alert.js"></script>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
