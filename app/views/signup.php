f<!DOCTYPE html>
<html lang="en" class="light">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sign Up - Modern User Management</title>
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
            max-width: 450px;
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

        .form-control-modern::placeholder {
            color: var(--text-muted);
        }

        .picture-upload {
            text-align: center;
            margin-bottom: 1.5rem;
        }

        .picture-preview {
            width: 80px;
            height: 80px;
            border-radius: 50%;
            border: 2px dashed var(--accent-primary);
            display: flex;
            align-items: center;
            justify-content: center;
            margin: 0 auto 0.5rem;
            background-color: var(--bg-tertiary);
            cursor: pointer;
            transition: all 0.3s ease;
        }

        .picture-preview:hover {
            border-color: var(--accent-secondary);
            background-color: rgba(236, 72, 153, 0.1);
        }

        .picture-preview i {
            font-size: 1.5rem;
            color: var(--accent-primary);
        }

        #pictureInput {
            display: none;
        }

        .form-check {
            display: flex;
            align-items: flex-start;
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
            line-height: 1.4;
        }

        .form-check-label a {
            color: var(--accent-primary);
            text-decoration: none;
        }

        .form-check-label a:hover {
            text-decoration: underline;
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
            <h1><i class="fas fa-user-plus me-2"></i>Create Account</h1>
            <p>Join us today and get started with your journey</p>
        </div>
                    <?php getErrors(); ?>
        <?php getMessage(); ?>
        <form  action="<?= site_url('create-user');?>" method="POST"  enctype="multipart/form-data"> 
            <div class="picture-upload">
                <div class="picture-preview" onclick="document.getElementById('pictureInput').click()">
                    <i class="fas fa-camera" id="cameraIcon"></i>
                    <img id="picturePreview" style="display: none; width: 100%; height: 100%; object-fit: cover; border-radius: 50%;" alt="Profile Picture">
                </div>
                <input type="file" id="pictureInput" name="profile_picture" accept="image/*">
                <small style="color: var(--text-muted);">Click to upload profile picture</small>
            </div>

            <div class="form-group">
                <label class="form-label" for="registerFirstName">
                    <i class="fas fa-user me-1"></i>First Name
                </label>
                <input type="text" name="first_name" class="form-control-modern" id="registerFirstName" placeholder="Enter your first name" required>
            </div>

            <div class="form-group">
                <label class="form-label" for="registerLastName">
                    <i class="fas fa-user me-1"></i>Last Name
                </label>
                <input type="text" name="last_name" class="form-control-modern" id="registerLastName" placeholder="Enter your last name" required>
            </div>

            <div class="form-group">
                <label class="form-label" for="registerUsername">
                    <i class="fas fa-at me-1"></i>Username
                </label>
                <input type="text" name="username" class="form-control-modern" id="registerUsername" placeholder="Choose a username" required>
            </div>

            <div class="form-group">
                <label class="form-label" for="registerEmail">
                    <i class="fas fa-envelope me-1"></i>Email Address
                </label>
                <input type="email" name="email" class="form-control-modern" id="registerEmail" placeholder="Enter your email" required>
            </div>

            <div class="form-group">
                <label class="form-label" for="registerPassword">
                    <i class="fas fa-lock me-1"></i>Password
                </label>
                <input type="password" name="password" class="form-control-modern" id="registerPassword" placeholder="Create a password" required>
            </div>

            <div class="form-group">
                <label class="form-label" for="confirmPassword">
                    <i class="fas fa-lock me-1"></i>Confirm Password
                </label>
                <input type="password"  name="confirm_password" class="form-control-modern" id="confirmPassword" placeholder="Confirm your password" required>
            </div>

            <div class="form-check">
                <input class="form-check-input" type="checkbox" id="agreeTerms" required>
                <label class="form-check-label" for="agreeTerms">
                    I agree to the <a href="#">Terms of Service</a> and <a href="#">Privacy Policy</a>
                </label>
            </div>

            <button type="submit" class="btn-primary-modern">
                <i class="fas fa-user-plus"></i>
                Create Account
            </button>

            <div class="auth-footer">
                Already have an account? <a href="<?= site_url('/')">Sign in here</a>
            </div>
        </form>
    </div>


          <script src="<?= BASE_URL; ?>/public/js/alert.js"></script>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    <script>
        // Handle profile picture preview
        document.getElementById('pictureInput').addEventListener('change', function(e) {
            const file = e.target.files[0];
            if (file) {
                const reader = new FileReader();
                reader.onload = function(e) {
                    document.getElementById('picturePreview').src = e.target.result;
                    document.getElementById('picturePreview').style.display = 'block';
                    document.getElementById('cameraIcon').style.display = 'none';
                };
                reader.readAsDataURL(file);
            }
        });
    </script>
</body>
</html>
