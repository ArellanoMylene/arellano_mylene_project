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
            --primary-pink: #EC4899;
            --secondary-pink: #F472B6;
            --light-pink: #FCE7F3;
            --background-gradient: linear-gradient(135deg, #FDF2F8 0%, #FCE7F3 100%);
            --card-white: #FFFFFF;
            --text-dark: #1F2937;
            --text-gray: #6B7280;
            --border-light: #F3F4F6;
            --success-green: #10B981;
            --warning-orange: #F59E0B;
            --danger-red: #EF4444;
            --accent-purple: #8B5CF6;
        }
        
        body {
            font-family: 'Inter', 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            background: var(--background-gradient);
            margin: 0;
            padding: 0;
            min-height: 100vh;
        }
        
        .dashboard-container {
            max-width: 1400px;
            margin: 0 auto;
            padding: 1.5rem;
        }
        
        /* Header */
        .dashboard-header {
            background: var(--card-white);
            border-radius: 20px;
            padding: 1.5rem 2rem;
            margin-bottom: 2rem;
            box-shadow: 0 4px 20px rgba(236, 72, 153, 0.1);
            display: flex;
            justify-content: space-between;
            align-items: center;
        }
        
        .dashboard-title {
            font-size: 2.25rem;
            font-weight: 700;
            background: linear-gradient(135deg, var(--primary-pink), var(--accent-purple));
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
            background-clip: text;
            margin: 0;
        }
        
        .logout-btn {
            background: linear-gradient(135deg, var(--primary-pink), var(--secondary-pink));
            color: white;
            border: none;
            padding: 0.75rem 1.5rem;
            border-radius: 12px;
            font-weight: 600;
            text-decoration: none;
            transition: all 0.3s ease;
            box-shadow: 0 4px 15px rgba(236, 72, 153, 0.3);
        }
        
        .logout-btn:hover {
            transform: translateY(-2px);
            box-shadow: 0 6px 20px rgba(236, 72, 153, 0.4);
            color: white;
        }
        
        /* Welcome Card */
        .welcome-card {
            background: linear-gradient(135deg, var(--primary-pink), var(--secondary-pink));
            border-radius: 24px;
            padding: 2.5rem;
            margin-bottom: 2rem;
            color: white;
            position: relative;
            overflow: hidden;
        }
        
        .welcome-card::before {
            content: '';
            position: absolute;
            top: -50%;
            right: -50%;
            width: 200%;
            height: 200%;
            background: radial-gradient(circle, rgba(255,255,255,0.1) 0%, transparent 70%);
            pointer-events: none;
        }
        
        .welcome-content {
            display: flex;
            align-items: center;
            gap: 2rem;
            position: relative;
            z-index: 1;
        }
        
        .profile-icon {
            width: 90px;
            height: 90px;
            background: rgba(255, 255, 255, 0.2);
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            color: white;
            font-size: 2.5rem;
            font-weight: 600;
            backdrop-filter: blur(10px);
            border: 2px solid rgba(255, 255, 255, 0.3);
        }
        
        .welcome-text h2 {
            font-size: 2rem;
            font-weight: 700;
            margin: 0 0 0.5rem 0;
        }
        
        .welcome-text p {
            margin: 0;
            font-size: 1.1rem;
            opacity: 0.9;
        }
        
        /* Status Cards */
        .status-cards {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(280px, 1fr));
            gap: 1.5rem;
            margin-bottom: 2rem;
        }
        
        .status-card {
            background: var(--card-white);
            border-radius: 20px;
            padding: 2rem;
            box-shadow: 0 4px 20px rgba(0, 0, 0, 0.08);
            transition: all 0.3s ease;
            border: 1px solid rgba(236, 72, 153, 0.1);
        }
        
        .status-card:hover {
            transform: translateY(-4px);
            box-shadow: 0 8px 30px rgba(236, 72, 153, 0.15);
        }
        
        .status-card-header {
            display: flex;
            align-items: center;
            justify-content: space-between;
            margin-bottom: 1.5rem;
        }
        
        .status-icon {
            width: 50px;
            height: 50px;
            border-radius: 16px;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 1.5rem;
        }
        
        .status-icon.users { 
            background: linear-gradient(135deg, var(--primary-pink), var(--secondary-pink));
            color: white;
        }
        .status-icon.active { 
            background: linear-gradient(135deg, var(--success-green), #34D399);
            color: white;
        }
        .status-icon.pending { 
            background: linear-gradient(135deg, var(--warning-orange), #FBBF24);
            color: white;
        }
        .status-icon.activity { 
            background: linear-gradient(135deg, var(--accent-purple), #A78BFA);
            color: white;
        }
        
        .status-label {
            color: var(--text-gray);
            font-size: 0.9rem;
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
            border-radius: 24px;
            padding: 2.5rem;
            box-shadow: 0 4px 20px rgba(0, 0, 0, 0.08);
            border: 1px solid rgba(236, 72, 153, 0.1);
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
            color: var(--text-dark);
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
            gap: 0.75rem;
            align-items: center;
        }
        
        .search-input {
            border: 2px solid var(--border-light);
            border-radius: 12px;
            padding: 0.75rem 1rem;
            min-width: 250px;
            transition: all 0.3s ease;
        }
        
        .search-input:focus {
            border-color: var(--primary-pink);
            box-shadow: 0 0 0 3px rgba(236, 72, 153, 0.1);
            outline: none;
        }
        
        .btn-primary {
            background: linear-gradient(135deg, var(--primary-pink), var(--secondary-pink));
            border: none;
            border-radius: 12px;
            padding: 0.75rem 1.5rem;
            color: white;
            font-weight: 600;
            transition: all 0.3s ease;
            box-shadow: 0 4px 15px rgba(236, 72, 153, 0.3);
        }
        
        .btn-primary:hover {
            transform: translateY(-2px);
            box-shadow: 0 6px 20px rgba(236, 72, 153, 0.4);
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
        .table-responsive {
            border-radius: 16px;
            overflow: hidden;
            box-shadow: 0 2px 10px rgba(0, 0, 0, 0.05);
        }
        
        .table {
            margin-bottom: 0;
        }
        
        .table th {
            border-top: none;
            border-bottom: 2px solid var(--border-light);
            font-weight: 700;
            color: var(--text-dark);
            padding: 1.25rem 1rem;
            background: linear-gradient(135deg, var(--light-pink), #FDF2F8);
            font-size: 0.9rem;
            text-transform: uppercase;
            letter-spacing: 0.5px;
        }
        
        .table td {
            border-top: 1px solid var(--border-light);
            padding: 1.25rem 1rem;
            vertical-align: middle;
        }
        
        .table tbody tr:hover {
            background-color: rgba(252, 231, 243, 0.3);
        }
        
        .user-avatar {
            width: 55px;
            height: 55px;
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
            font-weight: 600;
            color: var(--text-dark);
            font-size: 1rem;
        }
        
        .user-details small {
            color: var(--text-gray);
            font-weight: 500;
        }
        
        .action-buttons {
            display: flex;
            gap: 0.5rem;
        }
        
        .btn-sm {
            padding: 0.5rem 1rem;
            font-size: 0.85rem;
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
            border-bottom: 1px solid var(--border-light);
            padding: 2rem;
            background: linear-gradient(135deg, var(--light-pink), #FDF2F8);
        }
        
        .modal-title {
            font-weight: 700;
            color: var(--text-dark);
            font-size: 1.25rem;
        }
        
        .modal-body {
            padding: 2rem;
        }
        
        .form-label {
            font-weight: 600;
            color: var(--text-dark);
            margin-bottom: 0.5rem;
        }
        
        .form-control {
            border: 2px solid var(--border-light);
            border-radius: 12px;
            padding: 0.75rem 1rem;
            transition: all 0.3s ease;
        }
        
        .form-control:focus {
            border-color: var(--primary-pink);
            box-shadow: 0 0 0 3px rgba(236, 72, 153, 0.1);
        }
        
        /* Pagination */
        .pagination .page-link {
            color: var(--primary-pink);
            border: 2px solid var(--border-light);
            border-radius: 12px;
            margin: 0 4px;
            padding: 0.75rem 1rem;
            font-weight: 600;
        }
        
        .pagination .page-link:hover {
            background: var(--primary-pink);
            color: white;
            border-color: var(--primary-pink);
        }
        
        .pagination .page-item.active .page-link {
            background: var(--primary-pink);
            border-color: var(--primary-pink);
            color: white;
        }
        
        /* Responsive Design */
        @media (max-width: 1024px) {
            .dashboard-container {
                padding: 1rem;
            }
            
            .status-cards {
                grid-template-columns: repeat(auto-fit, minmax(250px, 1fr));
            }
        }
        
        @media (max-width: 768px) {
            .dashboard-header {
                flex-direction: column;
                gap: 1.5rem;
                text-align: center;
            }
            
            .dashboard-title {
                font-size: 1.75rem;
            }
            
            .welcome-content {
                flex-direction: column;
                text-align: center;
                gap: 1.5rem;
            }
            
            .welcome-text h2 {
                font-size: 1.5rem;
            }
            
            .status-cards {
                grid-template-columns: 1fr;
            }
            
            .section-header {
                flex-direction: column;
                align-items: stretch;
            }
            
            .section-actions {
                flex-direction: column;
                align-items: stretch;
            }
            
            .search-form {
                flex-direction: column;
            }
            
            .search-input {
                min-width: auto;
            }
            
            .user-management {
                padding: 1.5rem;
            }
            
            .table th,
            .table td {
                padding: 1rem 0.5rem;
                font-size: 0.9rem;
            }
            
            .action-buttons {
                flex-direction: column;
            }
        }
        
        @media (max-width: 480px) {
            .dashboard-container {
                padding: 0.75rem;
            }
            
            .dashboard-header,
            .user-management {
                padding: 1rem;
            }
            
            .welcome-card {
                padding: 1.5rem;
            }
            
            .status-card {
                padding: 1.5rem;
            }
            
            .profile-icon {
                width: 70px;
                height: 70px;
                font-size: 2rem;
            }
            
            .status-icon {
                width: 40px;
                height: 40px;
                font-size: 1.25rem;
            }
            
            .status-value {
                font-size: 1.5rem;
            }
        }
    </style>
</head>
<body>
    <div class="dashboard-container">
        <!-- Header -->
        <div class="dashboard-header">
            <h1 class="dashboard-title">Dashboard</h1>
            <button type="button" class="logout-btn" data-bs-toggle="modal" data-bs-target="#logoutConfirmModal">
                <i class="bi bi-box-arrow-right me-2"></i>Logout
            </button>
        </div>

        <!-- Welcome Card -->
        <div class="welcome-card">
            <div class="welcome-content">
                <div class="profile-icon">
                    <i class="bi bi-person-fill"></i>
                </div>
                <div class="welcome-text">
                    <h2>Welcome to Your Dashboard!</h2>
                    <p>You have successfully logged in. Here's your personalized dashboard with enhanced pink styling.</p>
                </div>
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
                <h3 class="section-title">Use
