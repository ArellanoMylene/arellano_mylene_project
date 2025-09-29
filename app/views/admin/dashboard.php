<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Dashboard </title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.1/font/bootstrap-icons.css" rel="stylesheet">
    <style>
        :root {
            /* Enhanced pink color palette with better contrast */
            --pink-primary: #E91E63;
            --pink-dark: #C2185B;
            --pink-light: #F8BBD9;
            --pink-accent: #FF4081;
            --coral: #FF6B6B;
            --yellow: #FFE66D;
            --gray-light: #F8F9FA;
            --gray-medium: #E9ECEF;
            --sidebar-width: 280px;
        }
        
        body {
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            margin: 0;
            padding: 0;
            background: linear-gradient(135deg, #f5f7fa 0%, #c3cfe2 100%);
            min-height: 100vh;
        }
        
        .admin-container {
            display: flex;
            min-height: 100vh;
        }
        
        /* Enhanced sidebar with better gradient and shadows */
        .sidebar {
            width: var(--sidebar-width);
            background: linear-gradient(180deg, var(--pink-primary) 0%, var(--pink-dark) 100%);
            color: white;
            position: fixed;
            height: 100vh;
            overflow-y: auto;
            z-index: 1000;
            box-shadow: 4px 0 20px rgba(233, 30, 99, 0.15);
        }
        
        .sidebar-header {
            padding: 2rem 1.5rem;
            border-bottom: 1px solid rgba(255, 255, 255, 0.1);
            background: rgba(255, 255, 255, 0.05);
        }
        
        .logo {
            display: flex;
            align-items: center;
            font-weight: 700;
            font-size: 1.3rem;
            letter-spacing: -0.5px;
        }
        
        .logo-icon {
            width: 40px;
            height: 40px;
            background: white;
            border-radius: 10px;
            margin-right: 1rem;
            display: flex;
            align-items: center;
            justify-content: center;
            color: var(--pink-primary);
            box-shadow: 0 4px 12px rgba(0, 0, 0, 0.1);
        }

        /* Added admin profile section in sidebar */
        .admin-profile {
            padding: 1.5rem;
            text-align: center;
            border-bottom: 1px solid rgba(255, 255, 255, 0.1);
        }

        .admin-avatar {
            width: 80px;
            height: 80px;
            border-radius: 50%;
            background: rgba(255, 255, 255, 0.2);
            display: flex;
            align-items: center;
            justify-content: center;
            margin: 0 auto 1rem;
            font-size: 2rem;
            color: white;
        }

        .admin-name {
            font-weight: 600;
            margin-bottom: 0.25rem;
            color: white;
        }

        .admin-role {
            font-size: 0.85rem;
            color: rgba(255, 255, 255, 0.7);
        }
        
        .sidebar-nav {
            padding: 1.5rem 0;
        }
        
        .nav-item {
            margin-bottom: 0.25rem;
        }
        
        .nav-link {
            display: flex;
            align-items: center;
            padding: 1rem 1.5rem;
            color: rgba(255, 255, 255, 0.8);
            text-decoration: none;
            transition: all 0.3s ease;
            border-left: 3px solid transparent;
            font-weight: 500;
        }
        
        .nav-link:hover,
        .nav-link.active {
            color: white;
            background: rgba(255, 255, 255, 0.15);
            border-left-color: var(--pink-light);
            transform: translateX(5px);
        }
        
        .nav-link i {
            margin-right: 1rem;
            width: 20px;
            font-size: 1.1rem;
        }
        
        /* Enhanced main content with better spacing and cards */
        .main-content {
            margin-left: var(--sidebar-width);
            flex: 1;
            padding: 2.5rem;
            background: transparent;
        }

        /* Added welcome section styling */
        .welcome-section {
            background: white;
            border-radius: 16px;
            padding: 2rem;
            margin-bottom: 2.5rem;
            box-shadow: 0 8px 32px rgba(0, 0, 0, 0.08);
            border: 1px solid rgba(233, 30, 99, 0.1);
        }

        .welcome-title {
            font-size: 2rem;
            font-weight: 700;
            color: #2c3e50;
            margin-bottom: 0.5rem;
            background: linear-gradient(135deg, var(--pink-primary), var(--pink-dark));
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
            background-clip: text;
        }

        .welcome-subtitle {
            color: #7f8c8d;
            font-size: 1rem;
            margin: 0;
        }

        /* Added stats cards styling */
        .stats-grid {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(280px, 1fr));
            gap: 2rem;
            margin-bottom: 2.5rem;
        }

        .stat-card {
            background: linear-gradient(135deg, var(--pink-primary), var(--pink-accent));
            border-radius: 16px;
            padding: 2rem;
            color: white;
            box-shadow: 0 8px 32px rgba(233, 30, 99, 0.3);
            transition: all 0.3s ease;
            position: relative;
            overflow: hidden;
        }

        .stat-card:hover {
            transform: translateY(-5px);
            box-shadow: 0 12px 40px rgba(233, 30, 99, 0.4);
        }

        .stat-card::before {
            content: '';
            position: absolute;
            top: 0;
            right: 0;
            width: 100px;
            height: 100px;
            background: rgba(255, 255, 255, 0.1);
            border-radius: 50%;
            transform: translate(30px, -30px);
        }

        .stat-icon {
            font-size: 3rem;
            margin-bottom: 1rem;
            opacity: 0.9;
        }

        .stat-number {
            font-size: 2.5rem;
            font-weight: 700;
            margin-bottom: 0.5rem;
        }

        .stat-label {
            font-size: 1.1rem;
            font-weight: 500;
            opacity: 0.9;
        }
        
        .header {
            background: white;
            border-radius: 16px;
            padding: 2rem;
            margin-bottom: 2.5rem;
            box-shadow: 0 8px 32px rgba(0, 0, 0, 0.08);
            display: flex;
            justify-content: space-between;
            align-items: center;
            border: 1px solid rgba(233, 30, 99, 0.1);
        }
        
        .header-title {
            color: #2c3e50;
            font-size: 2rem;
            font-weight: 700;
            margin: 0;
            background: linear-gradient(135deg, var(--pink-primary), var(--pink-dark));
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
            background-clip: text;
        }
        
        .header-actions {
            display: flex;
            gap: 1rem;
        }
        
        .btn-primary {
            background: linear-gradient(135deg, var(--pink-primary), var(--pink-accent));
            border: none;
            border-radius: 10px;
            padding: 0.75rem 1.5rem;
            transition: all 0.3s ease;
            font-weight: 600;
            box-shadow: 0 4px 15px rgba(233, 30, 99, 0.3);
        }
        
        .btn-primary:hover {
            background: linear-gradient(135deg, var(--pink-dark), var(--pink-primary));
            transform: translateY(-2px);
            box-shadow: 0 6px 20px rgba(233, 30, 99, 0.4);
        }
        
        /* Enhanced content card with better styling */
        .content-card {
            background: white;
            border-radius: 16px;
            padding: 2rem;
            box-shadow: 0 8px 32px rgba(0, 0, 0, 0.08);
            border: 1px solid rgba(233, 30, 99, 0.1);
        }

        
        .table-header {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-bottom: 2rem;
            padding-bottom: 1rem;
            border-bottom: 2px solid var(--gray-medium);
        }
        
        .table-title {
            font-size: 1.5rem;
            font-weight: 700;
            color: #2c3e50;
            margin: 0;
        }
        
        /* Enhanced search box styling */
        .search-box {
            position: relative;
            max-width: 350px;
        }
        
        .search-box input {
            padding: 0.75rem 1rem 0.75rem 3rem;
            border: 2px solid var(--gray-medium);
            border-radius: 12px;
            transition: all 0.3s ease;
            font-size: 0.95rem;
        }
        
        .search-box input:focus {
            border-color: var(--pink-primary);
            box-shadow: 0 0 0 3px rgba(233, 30, 99, 0.1);
        }
        
        .search-box i {
            position: absolute;
            left: 1rem;
            top: 50%;
            transform: translateY(-50%);
            color: var(--pink-primary);
            font-size: 1.1rem;
        }
        
        /* Enhanced table styling */
        .table {
            margin-bottom: 0;
            border-radius: 12px;
            overflow: hidden;
        }
        
        .table th {
            border-top: none;
            border-bottom: 2px solid var(--pink-light);
            font-weight: 700;
            color: var(--pink-dark);
            padding: 1.25rem 1rem;
            background: rgba(233, 30, 99, 0.05);
            font-size: 0.9rem;
            text-transform: uppercase;
            letter-spacing: 0.5px;
        }
        
        .table td {
            border-top: 1px solid var(--gray-medium);
            padding: 1.25rem 1rem;
            vertical-align: middle;
        }
        
        .table tbody tr:hover {
            background: rgba(233, 30, 99, 0.02);
            transform: scale(1.001);
            transition: all 0.2s ease;
        }
        
        .user-avatar {
            width: 50px;
            height: 50px;
            border-radius: 50%;
            overflow: hidden;
            flex-shrink: 0;
            margin-right: 1rem;
            border: 3px solid var(--pink-light);
            box-shadow: 0 4px 12px rgba(233, 30, 99, 0.2);
        }
        
        .user-avatar img {
            width: 100%;
            height: 100%;
            object-fit: cover;
            display: block;
        }
        
        .user-info {
            display: flex;
            align-items: center;
        }
        
        .user-details h6 {
            margin: 0;
            font-weight: 600;
            color: #2c3e50;
            font-size: 1rem;
        }
        
        .user-details small {
            color: #7f8c8d;
            font-size: 0.85rem;
        }
        
        .status-badge {
            padding: 0.4rem 1rem;
            border-radius: 20px;
            font-size: 0.8rem;
            font-weight: 600;
            text-transform: uppercase;
            letter-spacing: 0.5px;
        }
        
        .status-active { background: rgba(40, 167, 69, 0.1); color: #28a745; }
        .status-pending { background: rgba(255, 193, 7, 0.1); color: #ffc107; }
        .status-blocked { background: rgba(220, 53, 69, 0.1); color: #dc3545; }
        
        .action-buttons {
            display: flex;
            gap: 0.5rem;
        }
        
        .btn-sm {
            padding: 0.5rem 1rem;
            font-size: 0.85rem;
            border-radius: 8px;
            font-weight: 500;
            transition: all 0.3s ease;
        }
        
        .btn-outline-primary {
            border-color: var(--pink-primary);
            color: var(--pink-primary);
            background: rgba(233, 30, 99, 0.05);
        }
        
        .btn-outline-primary:hover {
            background: var(--pink-primary);
            border-color: var(--pink-primary);
            color: white;
            transform: translateY(-1px);
            box-shadow: 0 4px 12px rgba(233, 30, 99, 0.3);
        }
        
        .btn-outline-secondary {
            border-color: #6c757d;
            color: #6c757d;
            background: rgba(108, 117, 125, 0.05);
        }
        
        .btn-outline-secondary:hover {
            background: #6c757d;
            border-color: #6c757d;
            color: white;
            transform: translateY(-1px);
        }
        
        /* Enhanced pagination styling */
        .pagination .page-link {
            color: var(--pink-primary) !important;
            border: 2px solid var(--pink-light) !important;
            transition: all 0.3s ease;
            background-color: #fff !important;
            margin: 0 0.25rem;
            border-radius: 8px !important;
            padding: 0.75rem 1rem;
            font-weight: 500;
        }
        
        .pagination .page-link:hover {
            background-color: var(--pink-primary) !important;
            color: #fff !important;
            border-color: var(--pink-primary) !important;
            transform: translateY(-2px);
            box-shadow: 0 4px 12px rgba(233, 30, 99, 0.3);
        }
        
        .pagination .page-item.active .page-link {
            background-color: var(--pink-primary) !important;
            border-color: var(--pink-primary) !important;
            color: #fff !important;
            box-shadow: 0 4px 12px rgba(233, 30, 99, 0.3);
        }
        
        /* Enhanced modal styling */
        .modal-content {
            border-radius: 16px;
            border: none;
            box-shadow: 0 20px 60px rgba(0, 0, 0, 0.15);
        }
        
        .modal-header {
            border-bottom: 2px solid var(--gray-medium);
            padding: 1.5rem 2rem;
            background: rgba(233, 30, 99, 0.05);
        }
        
        .modal-title {
            font-weight: 700;
            color: var(--pink-dark);
        }
        
        .modal-body {
            padding: 2rem;
        }
        
        .form-control {
            border: 2px solid var(--gray-medium);
            border-radius: 10px;
            padding: 0.75rem 1rem;
            transition: all 0.3s ease;
        }
        
        .form-control:focus {
            border-color: var(--pink-primary);
            box-shadow: 0 0 0 3px rgba(233, 30, 99, 0.1);
        }
        
        .form-label {
            font-weight: 600;
            color: #2c3e50;
            margin-bottom: 0.5rem;
        }
        
        /* Mobile Responsive */
        @media (max-width: 768px) {
            .sidebar {
                transform: translateX(-100%);
                transition: transform 0.3s ease;
            }
            
            .sidebar.show {
                transform: translateX(0);
            }
            
            .main-content {
                margin-left: 0;
                padding: 1rem;
            }
            
            .header {
                flex-direction: column;
                gap: 1rem;
                text-align: center;
            }
            
            .header-actions {
                justify-content: center;
            }
            
            .table-header {
                flex-direction: column;
                gap: 1rem;
                align-items: stretch;
            }
            
            .search-box {
                max-width: 100%;
            }

            .stats-grid {
                grid-template-columns: 1fr;
                gap: 1rem;
            }
        }
    </style>
</head>
<body>
  <div class="admin-container">
     Sidebar 
    <nav class="sidebar">
      <div class="sidebar-header">
        <div class="logo">
          <div class="logo-icon"><i class="bi bi-grid-3x3-gap-fill"></i></div>
          Admin
        </div>
      </div>
      
       <!-- Added admin profile section -->
      <div class="admin-profile">
        <div class="admin-avatar">
          <i class="bi bi-person-fill"></i>
        </div>
        <div class="admin-name">Admin name</div>
        <div class="admin-role">Administrator</div>
      </div>
      
      <div class="sidebar-nav">
        <div class="nav-item"><a href="#" class="nav-link"><i class="bi bi-house"></i> Home</a></div>
        <div class="nav-item"><a href="#" class="nav-link"><i class="bi bi-box"></i> Products</a></div>
        <div class="nav-item"><a href="#" class="nav-link active"><i class="bi bi-people"></i> Users</a></div>
        <div class="nav-item"><a href="#" class="nav-link"><i class="bi bi-bag"></i> Orders</a></div>
        <div class="nav-item"><a href="#" class="nav-link"><i class="bi bi-person-circle"></i> Account</a></div>
        <div class="nav-item"><a href="<?=site_url('logout'); ?>" class="nav-link"><i class="bi bi-box-arrow-right"></i> Logout</a></div>
      </div>
    </nav>

     Main Content 
    <main class="main-content">
       <!-- Added welcome section -->
      <div class="welcome-section">
        <h1 class="welcome-title">Welcome back, Admin 👋</h1>
        <p class="welcome-subtitle">Time to manage your users</p>
      </div>

       <!-- Added stats cards section -->
      <div class="stats-grid">
        <div class="stat-card">
          <div class="stat-icon"><i class="bi bi-box"></i></div>
          <div class="stat-number"><?= count($getAll); ?></div>
          <div class="stat-label">Users</div>
        </div>
        <div class="stat-card">
          <div class="stat-icon"><i class="bi bi-people"></i></div>
          <div class="stat-number">5</div>
          <div class="stat-label">Active</div>
        </div>
        <div class="stat-card">
          <div class="stat-icon"><i class="bi bi-bag"></i></div>
          <div class="stat-number">12</div>
          <div class="stat-label">Total</div>
        </div>
      </div>

       Header 
      <div class="header">
        <h1 class="header-title">User Management</h1>
        <div class="header-actions">
          <button class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#addUserModal"><i class="bi bi-plus-circle me-2"></i>Add Admin</button>
          <button class="btn btn-outline-secondary"><i class="bi bi-download me-2"></i>Export</button>
        </div>
      </div>

       User Management Table 
      <div class="content-card">
        <div class="table-header">
          <h3 class="table-title">All Users</h3>
          <form action="<?= site_url('admin/user-management'); ?>" method="get" class="search-box d-flex">
            <?php
            $q = '';
            if(isset($_GET['q'])) {
                $q = $_GET['q'];
            }
            ?>
            <i class="bi bi-search align-self-center me-2"></i>
            <input type="text" class="form-control" name="q" placeholder="Search users..." value="<?= html_escape($q); ?>">
            <button type="submit" class="btn btn-primary ms-2">Search</button>
          </form>
        </div>
        <?php getErrors(); ?>
        <?php getMessage(); ?>
        <div class="table-responsive">
          <table class="table">
            <thead>
              <tr>
                <th>User</th>
                <th>Email</th>
                <th>First Name</th>
                <th>Last Name</th>
                <th>Role</th>
                <th>Joined</th>
                <th>Actions</th>
              </tr>
            </thead>
            <tbody id="userTableBody">
              <?php foreach($getAll as $user): ?>
              <tr>
                <td>
                  <div class="user-info">
                    <div class="user-avatar">
                      <img src="<?= base_url() . $user['profile_picture']; ?>" alt="Profile Picture">
                    </div>
                    <div class="user-details">
                      <h6><?= html_escape($user['username']); ?></h6>
                      <small>ID: <?= html_escape($user['id']); ?></small>
                    </div>
                  </div>
                </td>
                <td><?= html_escape($user['email']); ?></td>
                <td><?= html_escape($user['first_name']); ?></td>
                <td><?= html_escape($user['last_name']); ?></td>
                <td><?= html_escape($user['role']); ?></td>
                <td><?= html_escape($user['created_at']); ?></td>
                <td>
                  <div class="action-buttons">
                    <button class="btn btn-outline-primary btn-sm" data-bs-toggle="modal" data-bs-target="#editUserModal<?= $user['id']; ?>">Edit</button>
                    <button class="btn btn-outline-secondary btn-sm" data-bs-toggle="modal" data-bs-target="#deleteUserModal<?= $user['id']; ?>">Delete</button>
                  </div>
                </td>
              </tr>
              <?php endforeach; ?>
            </tbody>
          </table>
        </div>

         Pagination 
        <div class="mt-4 d-flex justify-content-center">
            <?php
                echo $page;
            ?>
        </div>
      </div>
    </main>
  </div>

   Add Admin Modal 
  <div class="modal fade" id="addUserModal" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
      <div class="modal-content">
        <form method="POST" action="<?= site_url('admin/createAdmin'); ?>" enctype="multipart/form-data">
          <div class="modal-header">
            <h5 class="modal-title">Add Admin</h5>
            <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
          </div>
          <div class="modal-body">
            <div class="mb-3"><label class="form-label">First Name</label><input type="text" name="first_name" class="form-control"></div>
            <div class="mb-3"><label class="form-label">Last Name</label><input type="text" name="last_name" class="form-control"></div>
            <div class="mb-3"><label class="form-label">Username</label><input type="text" name="username" class="form-control"></div>
            <div class="mb-3"><label class="form-label">Email</label><input type="email" name="email" class="form-control"></div>
            <div class="mb-3"><label class="form-label">Password</label><input type="password" name="password" class="form-control"></div>
            <div class="mb-3"><label class="form-label">Confirm Password</label><input type="password" name="confirm_password" class="form-control"></div>
            <div class="mb-3"><label class="form-label">Profile Picture</label><input type="file" class="form-control" required name="profile_picture" accept="image/*"></div>
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
            <button type="submit" class="btn btn-primary">Add Admin</button>
          </div>
        </form>
      </div>
    </div>
  </div>

   Edit User Modals 
  <?php foreach($getAll as $user): ?>
  <div class="modal fade" id="editUserModal<?= $user['id']; ?>" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
      <div class="modal-content">
        <form method="POST" action="<?= site_url('admin/update/'.$user['id']); ?>">
          <div class="modal-header">
            <h5 class="modal-title">Edit User</h5>
            <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
          </div>
          <div class="modal-body">
            <div class="mb-3"><label class="form-label">First Name</label><input type="text" name="first_name" class="form-control" value="<?= html_escape($user['first_name']); ?>"></div>
            <div class="mb-3"><label class="form-label">Last Name</label><input type="text" name="last_name" class="form-control" value="<?= html_escape($user['last_name']); ?>"></div>
            <div class="mb-3"><label class="form-label">Username</label><input type="text" name="username" class="form-control" value="<?= html_escape($user['username']); ?>"></div>
            <div class="mb-3"><label class="form-label">Email</label><input type="email" name="email" class="form-control" value="<?= html_escape($user['email']); ?>"></div>
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
            <button type="submit" class="btn btn-primary">Save Changes</button>
          </div>
        </form>
      </div>
    </div>
  </div>
  <?php endforeach; ?>

   Delete User Modals 
  <?php foreach($getAll as $user): ?>
  <div class="modal fade" id="deleteUserModal<?= $user['id']; ?>" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
      <div class="modal-content">
        <form method="POST" action="<?= site_url('admin/delete/'.$user['id']); ?>">
          <div class="modal-header bg-danger text-white">
            <h5 class="modal-title">Confirm Delete</h5>
            <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal"></button>
          </div>
          <div class="modal-body">Are you sure you want to delete <strong><?= html_escape($user['username']); ?></strong>? This action cannot be undone.</div>
          <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
            <button type="submit" class="btn btn-danger">Delete User</button>
          </div>
        </form>
      </div>
    </div>
  </div>
  <?php endforeach; ?>

  <script src="<?= BASE_URL; ?>/public/js/alert.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
