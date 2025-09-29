<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard - User Management</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.1/font/bootstrap-icons.css" rel="stylesheet">
    <style>
        :root {
            /* Updated color scheme to pink theme */
            --primary-pink: #EC4899;
            --secondary-pink: #F472B6;
            --light-pink: #FCE7F3;
            --background-gradient: linear-gradient(135deg, #FDF2F8 0%, #FCE7F3 100%);
            --card-white: #FFFFFF;
            --text-dark: #1F2937;
            --text-gray: #6B7280;
            --border-light: #F3F4F6;
            --success-green: #10B981;
            --warning-yellow: #F59E0B;
            --danger-red: #EF4444;
            --accent-purple: #8B5CF6;
        }
        
        body {
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            /* Applied pink gradient background */
            background: var(--background-gradient);
            margin: 0;
            padding: 0;
            min-height: 100vh;
        }
        
        /* Updated container layout to be more spacious */
        .dashboard-container {
            max-width: 1400px;
            margin: 0 auto;
            padding: 3rem 2.5rem;
        }
        
        /* Header */
        .dashboard-header {
            /* Updated to group dashboard title and logout on left side */
            display: flex;
            justify-content: flex-start;
            align-items: center;
            gap: 2rem;
            text-align: left;
            margin-bottom: 3rem;
            background: var(--card-white);
            padding: 2rem;
            border-radius: 20px;
            box-shadow: 0 4px 20px rgba(236, 72, 153, 0.1);
        }
        
        .dashboard-title {
            font-size: 2.5rem;
            font-weight: 700;
            color: var(--primary-pink);
            margin: 0;
            background: linear-gradient(135deg, var(--primary-pink), var(--accent-purple));
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
            background-clip: text;
        }
        
        .logout-btn {
            /* Updated logout button with new styling */
            background: linear-gradient(135deg, var(--primary-pink), var(--secondary-pink));
            color: white;
            border: none;
            padding: 0.6rem 1.5rem;
            border-radius: 15px;
            font-weight: 600;
            font-size: 0.9rem;
            text-decoration: none;
            transition: all 0.3s ease;
            box-shadow: 0 3px 12px rgba(236, 72, 153, 0.25);
            display: flex;
            align-items: center;
            gap: 0.5rem;
        }
        
        .logout-btn:hover {
            background: linear-gradient(135deg, var(--secondary-pink), var(--primary-pink));
            color: white;
            transform: translateY(-1px);
            box-shadow: 0 5px 18px rgba(236, 72, 153, 0.35);
        }
        
        /* Redesigned welcome card with horizontal layout */
        .welcome-card {
            background: linear-gradient(135deg, var(--primary-pink), var(--secondary-pink));
            border-radius: 28px;
            padding: 3rem;
            margin-bottom: 3.5rem;
            box-shadow: 0 12px 40px rgba(236, 72, 153, 0.25);
            display: grid;
            grid-template-columns: auto 1fr auto;
            align-items: center;
            gap: 2.5rem;
            color: white;
            text-align: left;
            position: relative;
            overflow: hidden;
        }
        
        .welcome-card::before {
            content: '';
            position: absolute;
            top: -50%;
            right: -20%;
            width: 200px;
            height: 200px;
            background: rgba(255, 255, 255, 0.1);
            border-radius: 50%;
            backdrop-filter: blur(20px);
        }
        
        .profile-icon {
            width: 100px;
            height: 100px;
            background: rgba(255, 255, 255, 0.2);
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            color: white;
            font-size: 2.5rem;
            font-weight: 600;
            backdrop-filter: blur(10px);
        }
        
        .welcome-text h2 {
            font-size: 2rem;
            font-weight: 700;
            color: white;
            margin: 0 0 0.5rem 0;
        }
        
        .welcome-text p {
            color: rgba(255, 255, 255, 0.9);
            margin: 0;
            font-size: 1.1rem;
        }
        
        /* Added decorative element to welcome card */
        .welcome-decoration {
            width: 80px;
            height: 80px;
            background: rgba(255, 255, 255, 0.1);
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 2rem;
            backdrop-filter: blur(10px);
        }
        
        /* Updated status cards layout to 2x2 grid */
        .status-cards {
            display: grid;
            grid-template-columns: repeat(2, 1fr);
            gap: 2rem;
            margin-bottom: 3rem;
        }
        
        .status-card {
            background: var(--card-white);
            border-radius: 24px;
            padding: 2.5rem;
            box-shadow: 0 6px 25px rgba(0, 0, 0, 0.08);
            transition: all 0.4s ease;
            border: 2px solid transparent;
            position: relative;
            overflow: hidden;
        }
        
        .status-card::before {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            right: 0;
            height: 4px;
            background: linear-gradient(135deg, var(--primary-pink), var(--secondary-pink));
            transform: scaleX(0);
            transition: transform 0.3s ease;
        }
        
        .status-card:hover::before {
            transform: scaleX(1);
        }
        
        .status-card:hover {
            transform: translateY(-6px);
            box-shadow: 0 12px 40px rgba(236, 72, 153, 0.2);
            border-color: var(--light-pink);
        }
        
        .status-card-header {
            display: flex;
            align-items: center;
            gap: 1rem;
            margin-bottom: 1.5rem;
        }
        
        .status-icon {
            width: 50px;
            height: 50px;
            border-radius: 12px;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 1.5rem;
        }
        
        /* Updated status icon colors to match pink theme */
        .status-icon.users { background: rgba(236, 72, 153, 0.1); color: var(--primary-pink); }
        .status-icon.active { background: rgba(16, 185, 129, 0.1); color: var(--success-green); }
        .status-icon.pending { background: rgba(245, 158, 11, 0.1); color: var(--warning-yellow); }
        .status-icon.activity { background: rgba(139, 92, 246, 0.1); color: var(--accent-purple); }
        
        .status-label {
            color: var(--text-gray);
            font-size: 1rem;
            font-weight: 500;
            margin: 0;
        }
        
        .status-value {
            font-size: 2rem;
            font-weight: 700;
            color: var(--text-dark);
            margin: 0;
        }
        
        /* User Management Section */
        .user-management {
            background: var(--card-white);
            border-radius: 28px;
            padding: 3rem;
            box-shadow: 0 8px 30px rgba(0, 0, 0, 0.08);
            border: 3px solid var(--light-pink);
        }
        
        .section-header {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-bottom: 2rem;
            flex-wrap: wrap;
            gap: 1.5rem;
        }
        
        .section-title {
            font-size: 1.75rem;
            font-weight: 700;
            color: var(--primary-pink);
            margin: 0;
        }
        
        .section-actions {
            display: flex;
            gap: 1rem;
            align-items: center;
            flex-wrap: wrap;
        }
        
        .search-form {
            display: flex;
            gap: 0.5rem;
            align-items: center;
        }
        
        .search-input {
            border: 2px solid var(--border-light);
            border-radius: 12px;
            padding: 0.75rem 1.25rem;
            min-width: 250px;
            transition: border-color 0.3s ease;
        }
        
        .search-input:focus {
            border-color: var(--primary-pink);
            outline: none;
            box-shadow: 0 0 0 3px rgba(236, 72, 153, 0.1);
        }
        
        .btn-primary {
            /* Updated all primary buttons to pink theme */
            background: var(--primary-pink);
            border: none;
            border-radius: 12px;
            padding: 0.75rem 1.5rem;
            color: white;
            font-weight: 600;
            transition: all 0.3s ease;
            box-shadow: 0 2px 10px rgba(236, 72, 153, 0.2);
        }
        
        .btn-primary:hover {
            background: var(--secondary-pink);
            transform: translateY(-1px);
            box-shadow: 0 4px 15px rgba(236, 72, 153, 0.3);
        }
        
        .btn-outline-secondary {
            border: 2px solid var(--border-light);
            color: var(--text-gray);
            background: white;
            border-radius: 12px;
            padding: 0.75rem 1.5rem;
            font-weight: 600;
            transition: all 0.3s ease;
        }
        
        .btn-outline-secondary:hover {
            background: var(--light-pink);
            border-color: var(--primary-pink);
            color: var(--primary-pink);
        }
        
        /* Table Styles */
        .table {
            margin-bottom: 0;
        }
        
        .table th {
            border-top: none;
            border-bottom: 2px solid var(--light-pink);
            font-weight: 700;
            color: var(--primary-pink);
            padding: 1.25rem 1rem;
            background: var(--light-pink);
        }
        
        .table td {
            border-top: 1px solid var(--border-light);
            padding: 1.25rem 1rem;
            vertical-align: middle;
        }
        
        .user-avatar {
            width: 60px;
            height: 60px;
            border-radius: 50%;
            overflow: hidden;
            flex-shrink: 0;
            margin-right: 1rem;
            border: 3px solid var(--light-pink);
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
            font-weight: 700;
            color: var(--text-dark);
        }
        
        .user-details small {
            color: var(--text-gray);
        }
        
        .action-buttons {
            display: flex;
            gap: 0.75rem;
        }
        
        .btn-sm {
            padding: 0.5rem 1rem;
            font-size: 0.9rem;
            border-radius: 8px;
            font-weight: 600;
        }
        
        .btn-outline-primary {
            border-color: var(--primary-pink);
            color: var(--primary-pink);
            background: white;
        }
        
        .btn-outline-primary:hover {
            background: var(--primary-pink);
            border-color: var(--primary-pink);
            color: white;
        }
        
        /* Modal Styles */
        .modal-content {
            border-radius: 20px;
            border: none;
            box-shadow: 0 20px 60px rgba(0, 0, 0, 0.15);
        }
        
        .modal-header {
            border-bottom: 2px solid var(--light-pink);
            padding: 2rem;
            background: var(--light-pink);
        }
        
        .modal-title {
            font-weight: 700;
            color: var(--primary-pink);
        }
        
        .modal-body {
            padding: 2rem;
        }
        
        .form-label {
            font-weight: 600;
            color: var(--text-dark);
            margin-bottom: 0.75rem;
        }
        
        .form-control {
            border: 2px solid var(--border-light);
            border-radius: 12px;
            padding: 0.75rem 1rem;
            transition: border-color 0.3s ease;
        }
        
        .form-control:focus {
            border-color: var(--primary-pink);
            box-shadow: 0 0 0 3px rgba(236, 72, 153, 0.1);
        }
        
        /* Pagination */
        .pagination .page-link {
            color: var(--primary-pink);
            border: 2px solid var(--border-light);
            border-radius: 10px;
            margin: 0 3px;
            padding: 0.75rem 1rem;
            font-weight: 600;
        }
        
        .pagination .page-link:hover {
            background-color: var(--primary-pink);
            color: white;
            border-color: var(--primary-pink);
        }
        
        .pagination .page-item.active .page-link {
            background-color: var(--primary-pink);
            border-color: var(--primary-pink);
            color: white;
        }
        
        /* Enhanced logout confirmation modal */
        .logout-modal .modal-content {
            border-radius: 24px;
            border: none;
            box-shadow: 0 25px 80px rgba(236, 72, 153, 0.2);
            overflow: hidden;
        }
        
        .logout-modal .modal-header {
            background: linear-gradient(135deg, var(--primary-pink), var(--secondary-pink));
            color: white;
            border: none;
            padding: 2.5rem 2rem 2rem 2rem;
            text-align: center;
        }
        
        .logout-modal .modal-title {
            font-size: 1.5rem;
            font-weight: 700;
            color: white;
            display: flex;
            align-items: center;
            justify-content: center;
            gap: 0.75rem;
        }
        
        .logout-modal .modal-body {
            padding: 2.5rem;
            text-align: center;
            background: white;
        }
        
        .logout-modal .logout-icon {
            width: 80px;
            height: 80px;
            background: rgba(236, 72, 153, 0.1);
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            margin: 0 auto 1.5rem auto;
            font-size: 2rem;
            color: var(--primary-pink);
        }
        
        .logout-modal .logout-message {
            font-size: 1.1rem;
            color: var(--text-gray);
            line-height: 1.6;
            margin: 0;
        }
        
        .logout-modal .modal-footer {
            padding: 2rem 2.5rem 2.5rem 2.5rem;
            border: none;
            background: white;
            justify-content: center;
            gap: 1rem;
        }
        
        .logout-modal .btn-cancel {
            background: var(--border-light);
            color: var(--text-gray);
            border: none;
            padding: 0.875rem 2rem;
            border-radius: 15px;
            font-weight: 600;
            transition: all 0.3s ease;
        }
        
        .logout-modal .btn-cancel:hover {
            background: var(--light-pink);
            color: var(--primary-pink);
        }
        
        .logout-modal .btn-logout {
            background: linear-gradient(135deg, var(--primary-pink), var(--secondary-pink));
            color: white;
            border: none;
            padding: 0.875rem 2rem;
            border-radius: 15px;
            font-weight: 600;
            text-decoration: none;
            transition: all 0.3s ease;
            box-shadow: 0 4px 15px rgba(236, 72, 153, 0.3);
        }
        
        .logout-modal .btn-logout:hover {
            background: linear-gradient(135deg, var(--secondary-pink), var(--primary-pink));
            color: white;
            transform: translateY(-1px);
            box-shadow: 0 6px 20px rgba(236, 72, 153, 0.4);
        }
        
        /* Responsive */
        @media (max-width: 768px) {
            .dashboard-container {
                padding: 1.5rem;
            }
            
            .dashboard-header {
                padding: 1.5rem;
                /* Keep elements together on mobile but allow wrapping */
                flex-wrap: wrap;
                gap: 1rem;
            }
            
            .dashboard-title {
                font-size: 2rem;
            }
        }
    </style>
</head>
<body>
    <div class="dashboard-container">
        <!-- Header -->
        <div class="dashboard-header">
            <!-- Combined dashboard title and logout button on left side -->
            <h1 class="dashboard-title">Dashboard</h1>
            <button type="button" class="logout-btn" data-bs-toggle="modal" data-bs-target="#logoutConfirmModal">
                <i class="bi bi-box-arrow-right"></i>
                Logout
            </button>
        </div>

        <!-- Welcome Card -->
        <div class="welcome-card">
            <div class="profile-icon">
                <i class="bi bi-person-fill"></i>
            </div>
            <!-- Welcome text now left-aligned -->
            <div class="welcome-text">
                <h2>Welcome to Your Dashboard!</h2>
                <p>You have successfully logged in. Here's your personalized dashboard.</p>
            </div>
            <div class="welcome-decoration">
                <i class="bi bi-stars"></i>
            </div>
        </div>

        <!-- Status Cards -->
        <div class="status-cards">
            <div class="status-card">
                <div class="status-card-header">
                    <div class="status-icon users">
                        <i class="bi bi-people"></i>
                    </div>
                    <p class="status-label">Total Users</p>
                </div>
                <h3 class="status-value"><?= count($getAll); ?></h3>
            </div>
            
            <div class="status-card">
                <div class="status-card-header">
                    <div class="status-icon active">
                        <i class="bi bi-check-circle"></i>
                    </div>
                    <p class="status-label">Status</p>
                </div>
                <h3 class="status-value">Online</h3>
            </div>
            
            <div class="status-card">
                <div class="status-card-header">
                    <div class="status-icon pending">
                        <i class="bi bi-clock"></i>
                    </div>
                    <p class="status-label">Last Login</p>
                </div>
                <h3 class="status-value">Now</h3>
            </div>
            
            <div class="status-card">
                <div class="status-card-header">
                    <div class="status-icon activity">
                        <i class="bi bi-lightning"></i>
                    </div>
                    <p class="status-label">Activity</p>
                </div>
                <h3 class="status-value">High</h3>
            </div>
        </div>

        <!-- User Management Section -->
        <div class="user-management">
            <div class="section-header">
                <h3 class="section-title">User Information</h3>
                <div class="section-actions">
                    <form action="<?= site_url('admin/user-management'); ?>" method="get" class="search-form">
                        <?php
                        $q = '';
                        if(isset($_GET['q'])) {
                            $q = $_GET['q'];
                        }
                        ?>
                        <input type="text" class="form-control search-input" name="q" placeholder="Search users..." value="<?= html_escape($q); ?>">
                        <button type="submit" class="btn btn-primary">Search</button>
                    </form>
                    <button class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#addUserModal">
                        <i class="bi bi-plus-circle me-2"></i>Add Admin
                    </button>
                    <button class="btn btn-outline-secondary">
                        <i class="bi bi-download me-2"></i>Export
                    </button>
                </div>
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

            <div class="mt-3">
                <?php echo $page; ?>
            </div>
        </div>
    </div>

    <div class="modal fade" id="addUserModal" tabindex="-1" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <form method="POST" action="<?= site_url('admin/createAdmin'); ?>" enctype="multipart/form-data">
                    <div class="modal-header">
                        <h5 class="modal-title">Add Admin</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                    </div>
                    <div class="modal-body">
                        <div class="mb-3">
                            <label class="form-label">First Name</label>
                            <input type="text" name="first_name" class="form-control">
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Last Name</label>
                            <input type="text" name="last_name" class="form-control">
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Username</label>
                            <input type="text" name="username" class="form-control">
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Email</label>
                            <input type="email" name="email" class="form-control">
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Password</label>
                            <input type="password" name="password" class="form-control">
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Confirm Password</label>
                            <input type="password" name="confirm_password" class="form-control">
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Profile Picture</label>
                            <input type="file" class="form-control" required name="profile_picture" accept="image/*">
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                        <button type="submit" class="btn btn-primary">Save</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

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
                        <div class="mb-3">
                            <label class="form-label">First Name</label>
                            <input type="text" name="first_name" class="form-control" value="<?= html_escape($user['first_name']); ?>">
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Last Name</label>
                            <input type="text" name="last_name" class="form-control" value="<?= html_escape($user['last_name']); ?>">
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Username</label>
                            <input type="text" name="username" class="form-control" value="<?= html_escape($user['username']); ?>">
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Email</label>
                            <input type="email" name="email" class="form-control" value="<?= html_escape($user['email']); ?>">
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                        <button type="submit" class="btn btn-primary">Save</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <div class="modal fade" id="deleteUserModal<?= $user['id']; ?>" tabindex="-1" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <form method="POST" action="<?= site_url('admin/delete/'.$user['id']); ?>">
                    <div class="modal-header bg-danger text-white">
                        <h5 class="modal-title">Confirm Delete</h5>
                        <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal"></button>
                    </div>
                    <div class="modal-body">
                        Are you sure you want to delete <strong><?= html_escape($user['username']); ?></strong>?
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                        <button type="submit" class="btn btn-danger">Delete</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <?php endforeach; ?>

    <!-- Enhanced logout confirmation modal with attractive design -->
    <div class="modal fade logout-modal" id="logoutConfirmModal" tabindex="-1" aria-labelledby="logoutConfirmModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="logoutConfirmModalLabel">
                        <i class="bi bi-box-arrow-right me-2"></i>Logout Confirmation
                    </h5>
                    <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="logout-icon">
                        <i class="bi bi-question-circle"></i>
                    </div>
                    <p class="logout-message">Are you sure you want to logout? You will need to sign in again to access your dashboard and all your personalized settings.</p>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-cancel" data-bs-dismiss="modal">
                        <i class="bi bi-x-circle me-2"></i>Cancel
                    </button>
                    <a href="<?=site_url('logout'); ?>" class="btn btn-logout">
                        <i class="bi bi-box-arrow-right me-2"></i>Yes, Logout
                    </a>
                </div>
            </div>
        </div>
    </div>

    <script src="<?= BASE_URL; ?>/public/js/alert.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
