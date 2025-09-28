<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Admin Dashboard - Diprella</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.1/font/bootstrap-icons.css" rel="stylesheet">
  <style>
    :root {
      --pink-primary: #ff69b4;
      --pink-dark: #e75480;
      --gray-light: #f8f9fa;
      --sidebar-width: 260px;
    }

    body {
      font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
      background: var(--gray-light);
      margin: 0;
      padding: 0;
    }

    .admin-container {
      display: flex;
      min-height: 100vh;
    }

    /* Sidebar */
    .sidebar {
      width: var(--sidebar-width);
      background: linear-gradient(180deg, var(--pink-primary), var(--pink-dark));
      color: white;
      position: fixed;
      height: 100vh;
      overflow-y: auto;
      z-index: 1000;
    }

    .sidebar-header {
      padding: 1.5rem;
      font-weight: 600;
      font-size: 1.2rem;
      text-align: center;
      border-bottom: 1px solid rgba(255,255,255,0.2);
    }

    .sidebar-nav .nav-link {
      color: rgba(255,255,255,0.85);
      padding: 0.75rem 1.5rem;
      display: flex;
      align-items: center;
      transition: all 0.3s;
    }

    .sidebar-nav .nav-link:hover,
    .sidebar-nav .nav-link.active {
      background: rgba(255,255,255,0.2);
      color: #fff;
    }

    .sidebar-nav .nav-link i {
      margin-right: 10px;
    }

    /* Main content */
    .main-content {
      margin-left: var(--sidebar-width);
      flex: 1;
      padding: 2rem;
    }

    .header {
      background: #fff;
      padding: 1.5rem;
      border-radius: 12px;
      display: flex;
      justify-content: space-between;
      align-items: center;
      box-shadow: 0 2px 10px rgba(0,0,0,0.1);
      margin-bottom: 2rem;
    }

    .header h1 {
      margin: 0;
      color: var(--pink-dark);
      font-size: 1.5rem;
    }

    .header .hello {
      font-weight: 600;
      color: var(--pink-primary);
    }

    .search-box input {
      border-radius: 20px;
      padding-left: 2.5rem;
    }

    .search-box i {
      position: absolute;
      left: 10px;
      top: 50%;
      transform: translateY(-50%);
      color: #888;
    }

    .content-card {
      background: #fff;
      border-radius: 12px;
      padding: 1.5rem;
      box-shadow: 0 2px 10px rgba(0,0,0,0.05);
    }

    .user-avatar {
      width: 40px;
      height: 40px;
      border-radius: 50%;
      overflow: hidden;
      margin-right: 10px;
    }

    .user-avatar img {
      width: 100%;
      height: 100%;
      object-fit: cover;
    }

    .action-buttons .btn {
      border-radius: 20px;
    }

    .pagination .page-link {
      color: var(--pink-dark);
      border: 1px solid var(--pink-dark);
    }

    .pagination .page-link:hover {
      background: var(--pink-primary);
      color: #fff;
    }

    .pagination .active .page-link {
      background: var(--pink-dark);
      border-color: var(--pink-dark);
      color: #fff;
    }
  </style>
</head>
<body>
  <div class="admin-container">
    <!-- Sidebar -->
    <nav class="sidebar">
      <div class="sidebar-header">Diprella Admin</div>
      <div class="sidebar-nav">
        <a href="#" class="nav-link active"><i class="bi bi-speedometer2"></i> Dashboard</a>
        <a href="#" class="nav-link"><i class="bi bi-people"></i> User Management</a>
        <a href="#" class="nav-link"><i class="bi bi-gear"></i> Settings</a>
        <a href="#" class="nav-link" data-bs-toggle="modal" data-bs-target="#logoutModal"><i class="bi bi-box-arrow-right"></i> Logout</a>
      </div>
    </nav>

    <!-- Main -->
    <main class="main-content">
      <div class="header">
        <h1>User Management</h1>
      </div>

      <!-- Search + Table -->
      <div class="content-card">
        <div class="d-flex justify-content-between align-items-center mb-3">
          <h5 class="mb-0">All Users</h5>
          <form method="get" action="<?= site_url('admin/user-management'); ?>" class="d-flex position-relative search-box">
            <?php $q = isset($_GET['q']) ? $_GET['q'] : ''; ?>
            <i class="bi bi-search"></i>
            <input type="text" name="q" class="form-control" placeholder="Search users..." value="<?= html_escape($q); ?>">
            <button type="submit" class="btn btn-pink ms-2" style="background:var(--pink-dark);color:white;">Search</button>
          </form>
        </div>

        <div class="table-responsive">
          <table class="table align-middle">
            <thead>
              <tr>
                <th>User</th>
                <th>Email</th>
                <th>First</th>
                <th>Last</th>
                <th>Joined</th>
                <th>Actions</th>
              </tr>
            </thead>
            <tbody>
              <?php foreach($getAll as $user): ?>
              <tr>
                <td>
                  <div class="d-flex align-items-center">
                    <div class="user-avatar">
                      <img src="<?= base_url() . $user['profile_picture']; ?>" alt="Profile">
                    </div>
                    <div>
                      <strong><?= html_escape($user['username']); ?></strong><br>
                      <small>ID: <?= $user['id']; ?></small>
                    </div>
                  </div>
                </td>
                <td><?= $user['email']; ?></td>
                <td><?= $user['first_name']; ?></td>
                <td><?= $user['last_name']; ?></td>
                <td><?= $user['created_at']; ?></td>
                <td>
                         <button class="btn btn-outline-primary btn-sm" data-bs-toggle="modal" data-bs-target="#editUserModal<?= $user['id']; ?>">Edit</button>
                    <button class="btn btn-outline-secondary btn-sm" data-bs-toggle="modal" data-bs-target="#deleteUserModal<?= $user['id']; ?>">Delete</button>
                  </div>
                </td>
              </tr>
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
                        <button type="submit" class="btn btn-primary">Save</button>
                      </div>
                    </form>
                  </div>
                </div>
              </div>

              <!-- Delete Modal -->
              <div class="modal fade" id="deleteUserModal<?= $user['id']; ?>" tabindex="-1" aria-hidden="true">
                <div class="modal-dialog modal-dialog-centered">
                  <div class="modal-content">
                    <form method="POST" action="<?= site_url('admin/delete/'.$user['id']); ?>">
                      <div class="modal-header bg-danger text-white">
                        <h5 class="modal-title">Confirm Delete</h5>
                        <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal"></button>
                      </div>
                      <div class="modal-body">Are you sure you want to delete <strong><?= html_escape($user['username']); ?></strong>?</div>
                      <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                        <button type="submit" class="btn btn-danger">Delete</button>
                      </div>
                    </form>
                  </div>
                </div>
              </div>


              <?php endforeach; ?>
            </tbody>
          </table>
        </div>

        <div class="mt-3">
          <?= $page; ?>
        </div>
      </div>
    </main>
  </div>

  <!-- Logout Modal -->
  <div class="modal fade" id="logoutModal" tabindex="-1">
    <div class="modal-dialog modal-dialog-centered">
      <div class="modal-content">
        <div class="modal-header bg-danger text-white">
          <h5 class="modal-title">Confirm Logout</h5>
          <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal"></button>
        </div>
        <div class="modal-body">Are you sure you want to log out?</div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
          <a href="<?= site_url('logout'); ?>" class="btn btn-danger">Logout</a>
        </div>
      </div>
    </div>
  </div>

        <script src="<?= BASE_URL; ?>/public/js/alert.js"></script>

  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
