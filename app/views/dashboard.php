<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard - Users</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.1/font/bootstrap-icons.css" rel="stylesheet">
    <style>
        :root {
            --pink-primary: #FF69B4;
            --pink-dark: #E91E63;
            --pink-light: #FFB6C1;
            --rose: #FF1493;
            --coral: #FF6B6B;
            --gray-light: #FDF2F8;
            --white: #FFFFFF;
        }
        body {
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            background: var(--gray-light);
        }
        .navbar {
            background: white !important;
            box-shadow: 0 2px 10px rgba(255, 105, 180, 0.2);
            padding: 1rem 0;
        }
        .navbar-brand {
            display: flex;
            align-items: center;
            font-weight: 600;
            color: var(--pink-dark) !important;
        }
        .logo-icon {
            width: 24px;
            height: 24px;
            background: linear-gradient(135deg, var(--pink-primary) 0%, var(--pink-dark) 100%);
            border-radius: 4px;
            margin-right: 0.5rem;
        }
        .btn-logout {
            background: linear-gradient(135deg, var(--rose) 0%, var(--pink-dark) 100%);
            border: none;
            border-radius: 25px;
            padding: 0.5rem 1.5rem;
            font-weight: 600;
            transition: all 0.3s ease;
            box-shadow: 0 4px 15px rgba(255, 20, 147, 0.3);
        }
        .btn-logout:hover {
            background: linear-gradient(135deg, var(--pink-dark) 0%, var(--rose) 100%);
            transform: translateY(-2px);
            box-shadow: 0 6px 20px rgba(255, 20, 147, 0.4);
        }
        .welcome-card {
            background: linear-gradient(135deg, var(--pink-primary) 0%, var(--pink-dark) 100%);
            color: white;
            border: none;
            border-radius: 20px;
            overflow: hidden;
            position: relative;
            box-shadow: 0 10px 30px rgba(255, 105, 180, 0.3);
        }
        .welcome-card::before {
            content: '';
            position: absolute;
            width: 120px;
            height: 120px;
            background: rgba(255, 255, 255, 0.1);
            border-radius: 50%;
            top: -30px;
            right: -30px;
        }
        .welcome-card::after {
            content: '';
            position: absolute;
            width: 80px;
            height: 80px;
            background: rgba(255, 255, 255, 0.05);
            border-radius: 50%;
            bottom: -20px;
            left: -20px;
        }
        .profile-card {
            border: none;
            border-radius: 20px;
            box-shadow: 0 15px 35px rgba(255, 105, 180, 0.15);
            background: white;
        }
        .profile-picture {
            width: 80px;
            height: 80px;
            border-radius: 50%;
            overflow: hidden;
            display: flex;
            align-items: center;
            justify-content: center;
            background: linear-gradient(135deg, var(--pink-primary) 0%, var(--pink-dark) 100%);
            box-shadow: 0 8px 25px rgba(255, 105, 180, 0.3);
            color: white;
            font-size: 2rem;
            font-weight: bold;
        }
        .profile-picture img {
            width: 100%;
            height: 100%;
            object-fit: cover;
            display: block;
        }
        .detail-card {
            border: none;
            border-radius: 15px;
            background: white;
            border-left: 4px solid var(--pink-primary);
            transition: all 0.3s ease;
            box-shadow: 0 5px 15px rgba(255, 105, 180, 0.1);
        }
        .detail-card:hover {
            transform: translateY(-3px);
            box-shadow: 0 10px 25px rgba(255, 105, 180, 0.2);
            border-left-color: var(--rose);
        }
        .detail-label {
            color: var(--pink-dark);
            font-weight: 600;
            font-size: 0.8rem;
            text-transform: uppercase;
            letter-spacing: 0.5px;
        }
        .detail-value {
            color: #333;
            font-weight: 600;
            font-size: 1.1rem;
        }
        .stats-card {
            background: white;
            border: none;
            border-radius: 20px;
            box-shadow: 0 8px 25px rgba(255, 105, 180, 0.12);
            transition: all 0.3s ease;
            overflow: hidden;
            position: relative;
        }
        .stats-card::before {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            right: 0;
            height: 3px;
            background: linear-gradient(90deg, var(--pink-primary) 0%, var(--rose) 100%);
        }
        .stats-card:hover {
            transform: translateY(-8px);
            box-shadow: 0 15px 40px rgba(255, 105, 180, 0.25);
        }
        .stats-icon {
            width: 60px;
            height: 60px;
            border-radius: 15px;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 1.8rem;
            color: white;
            margin-bottom: 1rem;
        }
        .stats-icon.pink { 
            background: linear-gradient(135deg, var(--pink-primary) 0%, var(--pink-dark) 100%);
            box-shadow: 0 8px 20px rgba(255, 105, 180, 0.3);
        }
        .stats-icon.rose { 
            background: linear-gradient(135deg, var(--rose) 0%, var(--pink-dark) 100%);
            box-shadow: 0 8px 20px rgba(255, 20, 147, 0.3);
        }
        .stats-icon.coral { 
            background: linear-gradient(135deg, var(--coral) 0%, var(--rose) 100%);
            box-shadow: 0 8px 20px rgba(255, 107, 107, 0.3);
        }
        .stats-icon.light-pink { 
            background: linear-gradient(135deg, var(--pink-light) 0%, var(--pink-primary) 100%);
            box-shadow: 0 8px 20px rgba(255, 182, 193, 0.3);
        }
        .analytics-section {
            background: white;
            border-radius: 20px;
            box-shadow: 0 10px 30px rgba(255, 105, 180, 0.15);
            margin-top: 2rem;
        }
        .section-title {
            color: var(--pink-dark);
            font-weight: 700;
            margin-bottom: 1.5rem;
        }
        .status-badge {
            background: linear-gradient(135deg, var(--pink-primary) 0%, var(--pink-dark) 100%);
            color: white;
            padding: 0.5rem 1rem;
            border-radius: 25px;
            font-weight: 600;
            font-size: 0.9rem;
            display: inline-block;
        }
        .last-login-info {
            background: linear-gradient(135deg, var(--pink-light) 0%, var(--pink-primary) 100%);
            color: white;
            padding: 1rem;
            border-radius: 15px;
            text-align: center;
        }
    </style>
</head>
<body>
     
    <nav class="navbar navbar-expand-lg">
        <div class="container">
            <div class="navbar-brand">
                <div class="logo-icon"></div>
               
            </div>
            <button type="button" class="btn btn-logout text-white d-flex align-items-center" data-bs-toggle="modal" data-bs-target="#logoutModal">
                <i class="bi bi-box-arrow-right me-2"></i>Logout
            </button>
        </div>
    </nav>

  
    <div class="modal fade" id="logoutModal" tabindex="-1" aria-labelledby="logoutModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="logoutModalLabel">Confirm Logout</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    Are you sure you want to logout?
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                    <a href="<?=site_url('logout'); ?>" class="btn btn-danger">Logout</a>
                </div>
            </div>
        </div>
    </div>

    <div class="container my-5">
         
        <div class="card welcome-card mb-4">
            <div class="card-body p-4 position-relative">
                <h1 class="h2 fw-bold mb-2">Welcome back, <?= ($user['first_name']) ?>!</h1>
                <p class="fs-5 mb-0 opacity-90">Here's your profile information and account details.</p>
            </div>
        </div>

         
        <div class="row g-4 mb-4">
            <div class="col-md-3">
                <div class="card stats-card">
                    <div class="card-body p-4 text-center">
                        <div class="stats-icon pink mx-auto">
                            <i class="bi bi-person-check"></i>
                        </div>
                        <h3 class="h4 fw-bold text-dark mb-1">Profile</h3>
                        <div class="status-badge"><?= ($user['account_status'] ?? 'Active') ?></div>
                    </div>
                </div>
            </div>
            <div class="col-md-3">
                <div class="card stats-card">
                    <div class="card-body p-4 text-center">
                        <div class="stats-icon rose mx-auto">
                            <i class="bi bi-wifi"></i>
                        </div>
                        <h3 class="h4 fw-bold text-dark mb-1">Status</h3>
                        <p class="text-success fw-bold mb-0">Online</p>
                    </div>
                </div>
            </div>
            <div class="col-md-3">
                <div class="card stats-card">
                    <div class="card-body p-4 text-center">
                        <div class="stats-icon coral mx-auto">
                            <i class="bi bi-clock-history"></i>
                        </div>
                        <h3 class="h4 fw-bold text-dark mb-1">Last Login</h3>
                        <p class="text-muted mb-0">Just Now</p>
                    </div>
                </div>
            </div>
            <div class="col-md-3">
                <div class="card stats-card">
                    <div class="card-body p-4 text-center">
                        <div class="stats-icon light-pink mx-auto">
                            <i class="bi bi-graph-up"></i>
                        </div>
                        <h3 class="h4 fw-bold text-dark mb-1">Activity</h3>
                        <p class="text-success fw-bold mb-0">High</p>
                    </div>
                </div>
            </div>
        </div>

         
        <div class="card profile-card">
            <div class="card-body p-4">
                
                <div class="d-flex align-items-center mb-4">
                    <div class="profile-picture me-3">
                        <?php if(!empty($user['profile_picture']) && file_exists($user['profile_picture'])): ?>
                            <img src="<?= base_url() . $user['profile_picture']; ?>" alt="Profile Picture">
                        <?php else: ?>
                            <?= strtoupper(substr($user['first_name'],0,1)) ?>
                        <?php endif; ?>
                    </div>
                    <div>
                        <h2 class="h4 fw-bold text-dark mb-1"><?= ($user['first_name'].' '.$user['last_name']) ?></h2>
                        <p class="text-muted mb-0">@<?= ($user['username']) ?></p>
                    </div>
                </div>

                
                <div class="row g-3">
                    <div class="col-md-6">
                        <div class="card detail-card">
                            <div class="card-body p-3">
                                <div class="detail-label mb-1">First Name</div>
                                <div class="detail-value"><?= ($user['first_name']) ?></div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="card detail-card">
                            <div class="card-body p-3">
                                <div class="detail-label mb-1">Username</div>
                                <div class="detail-value"><?= ($user['username']) ?></div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="card detail-card">
                            <div class="card-body p-3">
                                <div class="detail-label mb-1">Email Address</div>
                                <div class="detail-value"><?= ($user['email']) ?></div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="card detail-card">
                            <div class="card-body p-3">
                                <div class="detail-label mb-1">Member Since</div>
                                <div class="detail-value"><?= date('F d, Y', strtotime($user['created_at'])) ?></div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

         
        <div class="card analytics-section">
            <div class="card-body p-4">
                <h3 class="section-title">Analytics Overview</h3>
                <div class="row g-4">
                    <div class="col-md-4">
                        <div class="text-center">
                            <div class="stats-icon pink mx-auto mb-3">
                                <i class="bi bi-calendar-check"></i>
                            </div>
                            <h4 class="h5 fw-bold text-dark"><?= date('F Y', strtotime($user['created_at'])) ?></h4>
                            <p class="text-muted">Member Since</p>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="text-center">
                            <div class="stats-icon rose mx-auto mb-3">
                                <i class="bi bi-star-fill"></i>
                            </div>
                            <h4 class="h5 fw-bold text-dark"><?= ($user['account_type'] ?? 'Standard') ?></h4>
                            <p class="text-muted">Account Type</p>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="last-login-info">
                            <i class="bi bi-clock fs-3 mb-2 d-block"></i>
                            <h5 class="fw-bold mb-1">Last Login Record</h5>
                            <p class="mb-0 opacity-90"><?= date('M d, Y - g:i A') ?></p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script src="<?= BASE_URL; ?>/public/js/alert.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
