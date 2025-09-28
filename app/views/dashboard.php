<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>User Dashboard - Profile</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
  <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css" rel="stylesheet">
  <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700&display=swap" rel="stylesheet">
  <style>
    :root {
      --sidebar-bg: #ec4899;
      --sidebar-hover: #db2777;
      --sidebar-active: #be185d;
      --main-bg: #f8fafc;
      --card-bg: #ffffff;
      --text-primary: #1e293b;
      --text-secondary: #64748b;
      --text-light: #94a3b8;
      --border: #e2e8f0;
      --pink-light: #fce7f3;
      --pink-accent: #f472b6;
      --shadow: rgba(0, 0, 0, 0.1);
    }
    body {
      font-family: 'Inter', sans-serif;
      background-color: var(--main-bg);
      color: var(--text-primary);
      overflow-x: hidden;
    }
    .dashboard-layout { display: flex; min-height: 100vh; }
    .sidebar { width: 280px; background: linear-gradient(180deg, var(--sidebar-bg) 0%, var(--sidebar-hover) 100%);
      padding: 2rem 0; position: fixed; height: 100vh; left: 0; top: 0; z-index: 1000;
      box-shadow: 4px 0 20px rgba(236, 72, 153, 0.15); display: flex; flex-direction: column; justify-content: space-between; }
    .sidebar-header { padding: 0 2rem 2rem; border-bottom: 1px solid rgba(255, 255, 255, 0.2); margin-bottom: 2rem; }
    .sidebar-title { color: white; font-size: 1.5rem; font-weight: 700; text-align: center; }
    .nav-menu { list-style: none; padding: 0; }
    .nav-item { margin-bottom: 0.5rem; }
    .nav-link { display: flex; align-items: center; padding: 1rem 2rem;
      color: rgba(255, 255, 255, 0.9); text-decoration: none; transition: all 0.3s ease; position: relative; }
    .nav-link:hover { background-color: rgba(255, 255, 255, 0.1); color: white; }
    .nav-link.active { background-color: rgba(255, 255, 255, 0.2); color: white; border-right: 4px solid white; }
    .nav-link i { width: 20px; margin-right: 1rem; font-size: 1.1rem; }
    .logout-link { margin-top: auto; border-top: 1px solid rgba(255,255,255,0.2); color: white; }
    .main-content { flex: 1; margin-left: 280px; padding: 2rem; background-color: var(--main-bg); }
    .content-header { display: flex; justify-content: space-between; align-items: center;
      margin-bottom: 2rem; padding-bottom: 1rem; border-bottom: 1px solid var(--border); }
    .page-title { font-size: 2rem; font-weight: 600; color: var(--text-primary); }
    .profile-card { background: var(--card-bg); border-radius: 20px; padding: 3rem;
      box-shadow: 0 8px 32px rgba(0, 0, 0, 0.08); border: 1px solid var(--border); max-width: 700px; position: relative; }
    .profile-header { display: flex; align-items: center; gap: 2.5rem; margin-bottom: 2.5rem; }
    .profile-avatar {
      width: 140px;
      height: 140px;
      border-radius: 50%;
      overflow: hidden;
      border: 5px solid var(--pink-light);
      box-shadow: 0 12px 40px rgba(236, 72, 153, 0.25);
      flex-shrink: 0;
    }
    .profile-avatar img {
      width: 100%;
      height: 100%;
      object-fit: cover;
     
      display: block;
    }
    .profile-info { flex: 1; }
    .profile-name { font-size: 2rem; font-weight: 700; margin-bottom: 0.75rem; letter-spacing: -0.025em; }
    .profile-meta { color: var(--text-secondary); font-size: 1rem; margin-bottom: 2rem; font-weight: 500; }
    .profile-details { display: grid; grid-template-columns: repeat(2, 1fr); gap: 2rem 3rem; margin-bottom: 2rem; }
    .detail-item { display: flex; flex-direction: column; gap: 0.5rem; }
    .detail-label { font-size: 0.875rem; color: var(--text-light); font-weight: 600;
      text-transform: uppercase; letter-spacing: 0.05em; }
    .detail-value { font-size: 1rem; color: var(--text-primary); font-weight: 600; }
    .edit-btn { position: absolute; top: 2rem; right: 2rem; background: var(--pink-light);
      border: 2px solid var(--sidebar-bg); color: var(--sidebar-bg); width: 44px; height: 44px; border-radius: 50%;
      display: flex; align-items: center; justify-content: center; cursor: pointer; transition: all 0.3s ease; font-size: 1.1rem; }
    .edit-btn:hover { background: var(--sidebar-bg); color: white; transform: scale(1.05); }
    @media (max-width: 768px) {
      .sidebar { transform: translateX(-100%); transition: transform 0.3s ease; }
      .main-content { margin-left: 0; padding: 1rem; }
      .profile-card { padding: 2rem; }
      .profile-header { flex-direction: column; text-align: center; gap: 1.5rem; }
      .profile-details { grid-template-columns: 1fr; gap: 1.5rem; }
      .profile-avatar { width: 120px; height: 120px; }
    }
  </style>
</head>
<body>
  <div class="dashboard-layout">
    <!-- Sidebar -->
    <nav class="sidebar">
      <div>
        <div class="sidebar-header">
          <div class="sidebar-title">SUCCESS</div>
        </div>
        <ul class="nav-menu">
          <li class="nav-item">
            <a href="#" class="nav-link active"><i class="fas fa-user"></i> Profile</a>
          </li>
          <li class="nav-item">
            <a href="#" class="nav-link"><i class="fas fa-chart-bar"></i> Analytics</a>
          </li>
          <li class="nav-item">
            <a href="#" class="nav-link"><i class="fas fa-cog"></i> Settings</a>
          </li>
        </ul>
      </div>
      <div class="logout-link">
        <a href="#" class="nav-link" data-bs-toggle="modal" data-bs-target="#logoutModal">
          <i class="fas fa-sign-out-alt"></i> Logout
        </a>
      </div>
    </nav>

    <!-- Main Content -->
    <main class="main-content">
      <div class="content-header">
        <h1 class="page-title">Profile</h1>
        <button class="edit-btn">
          <i class="fas fa-edit"></i>
        </button>
      </div>

      <div class="profile-card">
        <div class="profile-header">
          <!-- Avatar -->
          <div class="profile-avatar">
            <?php if (!empty($user['profile_picture']) && file_exists($user['profile_picture'])): ?>
                            <img src="<?= base_url() . $user['profile_picture']; ?>" alt="Profile Picture">
            <?php else: ?>
                            <?= strtoupper(substr($user['first_name'],0,1)) ?>
            <?php endif; ?>
          </div>

          <!-- Info -->
          <div class="profile-info">
            <h2 class="profile-name"><?= htmlspecialchars($user['first_name'].' '.$user['last_name']) ?></h2>
            <div class="profile-meta">Registered: <?= date('F d, Y', strtotime($user['created_at'])) ?></div>
          </div>
        </div>

        <!-- Profile Details -->
        <div class="profile-details">
          <div class="detail-item">
            <span class="detail-label"><i class="fas fa-user me-2"></i>First Name</span>
            <span class="detail-value"><?= htmlspecialchars($user['first_name']) ?></span>
          </div>
          <div class="detail-item">
            <span class="detail-label"><i class="fas fa-user me-2"></i>Last Name</span>
            <span class="detail-value"><?= htmlspecialchars($user['last_name']) ?></span>
          </div>
          <div class="detail-item">
            <span class="detail-label"><i class="fas fa-at me-2"></i>Username</span>
            <span class="detail-value">@<?= htmlspecialchars($user['username']) ?></span>
          </div>
          <div class="detail-item">
            <span class="detail-label"><i class="fas fa-envelope me-2"></i>Email</span>
            <span class="detail-value"><?= htmlspecialchars($user['email']) ?></span>
          </div>
          <div class="detail-item">
            <span class="detail-label"><i class="fas fa-calendar-alt me-2"></i>Created At</span>
            <span class="detail-value"><?= date('Y-m-d', strtotime($user['created_at'])) ?></span>
          </div>
        </div>
      </div>
    </main>
  </div>

  <!-- Logout Confirmation Modal -->
  <div class="modal fade" id="logoutModal" tabindex="-1" aria-labelledby="logoutModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="logoutModalLabel"><i class="fas fa-sign-out-alt me-2"></i> Confirm Logout</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
          Are you sure you want to log out?
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
          <a href="<?= site_url('logout'); ?>" class="btn btn-danger">Logout</a>
        </div>
      </div>
    </div>
  </div>
      <script src="<?= BASE_URL; ?>/public/js/alert.js"></script>

  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
