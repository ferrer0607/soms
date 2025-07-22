<?php
session_start();
include("include/connection.php");
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Student Organizations Management System</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    <style>
        :root {
            --primary-color: #4361ee;
            --primary-light: #e6eaf7;
            --secondary-color: #6c757d;
            --accent-color: #f8f9fc;
            --success-color: #2ecc71;
            --info-color: #17a2b8;
            --warning-color: #f39c12;
            --danger-color: #e74c3c;
            --dark-color: #2c3e50;
            --light-color: #f8fafc;
            --border-color: #e2e8f0;
        }
        
        body {
            background-color: #f5f7fb;
            font-family: 'Poppins', sans-serif;
            color: var(--dark-color);
            line-height: 1.6;
        }
        
        .navbar {
            background: linear-gradient(135deg, var(--primary-color) 0%, #3a0ca3 100%);
            box-shadow: 0 4px 20px rgba(0, 0, 0, 0.1);
            padding: 1rem 0;
        }
        
        .navbar-brand {
            font-weight: 700;
            letter-spacing: 0.5px;
            font-size: 1.5rem;
            display: flex;
            align-items: center;
        }
        
        .navbar-brand i {
            font-size: 1.8rem;
            margin-right: 10px;
        }
        
        .form-container {
            background: #ffffff;
            border-radius: 12px;
            box-shadow: 0 10px 30px rgba(0, 0, 0, 0.08);
            animation: slideIn 0.6s ease-out;
            border-top: 5px solid var(--primary-color);
            margin-top: 2.5rem;
            overflow: hidden;
            position: relative;
        }
        
        .form-container::before {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 5px;
            background: linear-gradient(90deg, var(--primary-color) 0%, #3a0ca3 100%);
        }
        
        @keyframes slideIn {
            from { transform: translateY(-30px); opacity: 0; }
            to { transform: translateY(0); opacity: 1; }
        }
        
        .form-control, .form-select {
            padding: 0.85rem 1.25rem;
            border-radius: 8px;
            border: 1px solid var(--border-color);
            transition: all 0.3s;
            font-size: 0.95rem;
        }
        
        .form-control:focus, .form-select:focus {
            border-color: var(--primary-color);
            box-shadow: 0 0 0 0.25rem rgba(67, 97, 238, 0.15);
        }
        
        .btn-primary {
            background: linear-gradient(135deg, var(--primary-color) 0%, #3a0ca3 100%);
            border: none;
            padding: 0.85rem 2.5rem;
            font-weight: 600;
            letter-spacing: 0.5px;
            text-transform: uppercase;
            transition: all 0.3s;
            border-radius: 8px;
            box-shadow: 0 4px 15px rgba(67, 97, 238, 0.3);
        }
        
        .btn-primary:hover {
            background: linear-gradient(135deg, #3a56e8 0%, #2a0a9a 100%);
            transform: translateY(-3px);
            box-shadow: 0 8px 20px rgba(67, 97, 238, 0.4);
        }
        
        .btn-outline-secondary {
            border-radius: 8px;
            padding: 0.85rem 2rem;
            transition: all 0.3s;
        }
        
        .section-title {
            color: var(--primary-color);
            border-bottom: 2px solid var(--primary-light);
            padding-bottom: 12px;
            margin-bottom: 25px;
            font-weight: 600;
            font-size: 1.4rem;
            position: relative;
            display: flex;
            align-items: center;
        }
        
        .section-title i {
            margin-right: 12px;
            font-size: 1.3rem;
        }
        
        .section-title:after {
            content: '';
            position: absolute;
            left: 0;
            bottom: -2px;
            width: 60px;
            height: 3px;
            background: linear-gradient(90deg, var(--primary-color) 0%, #3a0ca3 100%);
            border-radius: 3px;
        }
        
        .fade-in {
            animation: fadeIn 0.6s ease-in;
        }
        
        @keyframes fadeIn {
            from { opacity: 0; transform: translateY(10px); }
            to { opacity: 1; transform: translateY(0); }
        }
        
        .alert {
            border-radius: 8px;
            padding: 1rem 1.5rem;
            border-left: 5px solid;
            box-shadow: 0 4px 12px rgba(0, 0, 0, 0.05);
        }
        
        .alert-success {
            border-left-color: var(--success-color);
            background-color: rgba(46, 204, 113, 0.1);
        }
        
        .alert-danger {
            border-left-color: var(--danger-color);
            background-color: rgba(231, 76, 60, 0.1);
        }
        
        .alert i {
            font-size: 1.5rem;
            margin-right: 12px;
        }
        
        .form-label {
            font-weight: 600;
            margin-bottom: 0.6rem;
            color: var(--dark-color);
            font-size: 0.95rem;
        }
        
        .required-field::after {
            content: " *";
            color: var(--danger-color);
        }
        
        .progress-steps {
            display: flex;
            justify-content: space-between;
            margin-bottom: 3rem;
            position: relative;
            padding: 0 2rem;
        }
        
        .progress-steps:before {
            content: '';
            position: absolute;
            top: 50%;
            left: 10%;
            right: 10%;
            height: 3px;
            background-color: #e3e6f0;
            z-index: 1;
            transform: translateY(-50%);
        }
        
        .step {
            position: relative;
            z-index: 2;
            text-align: center;
            width: 100%;
        }
        
        .step-number {
            width: 45px;
            height: 45px;
            background-color: #e3e6f0;
            color: var(--secondary-color);
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            margin: 0 auto 0.8rem;
            font-weight: 700;
            transition: all 0.4s;
            border: 3px solid white;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
        }
        
        .step.active .step-number {
            background: linear-gradient(135deg, var(--primary-color) 0%, #3a0ca3 100%);
            color: white;
            transform: scale(1.1);
            box-shadow: 0 6px 12px rgba(67, 97, 238, 0.3);
        }
        
        .step.completed .step-number {
            background-color: var(--success-color);
            color: white;
        }
        
        .step-label {
            font-size: 0.9rem;
            color: var(--secondary-color);
            font-weight: 500;
            transition: all 0.3s;
        }
        
        .step.active .step-label, .step.completed .step-label {
            color: var(--primary-color);
            font-weight: 600;
        }
        
        .input-group-text {
            background-color: var(--light-color);
            border: 1px solid var(--border-color);
            color: var(--secondary-color);
            padding: 0 1rem;
        }
        
        .password-toggle {
            cursor: pointer;
            color: var(--secondary-color);
            transition: all 0.2s;
            padding: 0 1rem;
        }
        
        .password-toggle:hover {
            color: var(--primary-color);
        }
        
        .file-upload {
            position: relative;
            overflow: hidden;
            margin-bottom: 1.5rem;
        }
        
        .file-upload-input {
            position: absolute;
            top: 0;
            right: 0;
            margin: 0;
            padding: 0;
            font-size: 20px;
            cursor: pointer;
            opacity: 0;
            filter: alpha(opacity=0);
        }
        
        .file-upload-label {
            display: block;
            padding: 2rem;
            background-color: var(--light-color);
            border: 2px dashed var(--border-color);
            border-radius: 10px;
            text-align: center;
            cursor: pointer;
            transition: all 0.3s;
        }
        
        .file-upload-label:hover {
            border-color: var(--primary-color);
            background-color: rgba(67, 97, 238, 0.05);
            transform: translateY(-3px);
            box-shadow: 0 5px 15px rgba(0, 0, 0, 0.05);
        }
        
        .file-upload-icon {
            font-size: 2.5rem;
            color: var(--primary-color);
            margin-bottom: 1rem;
        }
        
        .file-upload-text {
            font-weight: 600;
            margin-bottom: 0.5rem;
            color: var(--dark-color);
            transition: all 0.3s;
        }
        
        .file-upload-note {
            font-size: 0.85rem;
            color: var(--secondary-color);
        }
        
        .file-upload-preview {
            display: none;
            margin-top: 1.5rem;
            padding: 1rem;
            background-color: var(--light-color);
            border-radius: 8px;
            border: 1px solid var(--border-color);
            box-shadow: 0 2px 8px rgba(0, 0, 0, 0.05);
        }
        
        .login-link {
            color: var(--primary-color);
            font-weight: 600;
            text-decoration: none;
            transition: all 0.2s;
        }
        
        .login-link:hover {
            color: #3a0ca3;
            text-decoration: underline;
        }
        
        .form-note {
            font-size: 0.85rem;
            color: var(--secondary-color);
            margin-top: 0.5rem;
            display: block;
        }
        
        .password-strength {
            height: 5px;
            background-color: #e9ecef;
            margin-top: 0.8rem;
            border-radius: 3px;
            overflow: hidden;
        }
        
        .password-strength-bar {
            height: 100%;
            width: 0;
            transition: width 0.4s ease, background-color 0.4s ease;
            border-radius: 3px;
        }
        
        .password-requirements {
            margin-top: 1rem;
            font-size: 0.85rem;
            color: var(--secondary-color);
        }
        
        .requirement {
            display: flex;
            align-items: center;
            margin-bottom: 0.5rem;
        }
        
        .requirement i {
            margin-right: 0.8rem;
            font-size: 0.8rem;
            transition: all 0.3s;
        }
        
        .requirement.valid {
            color: var(--success-color);
        }
        
        .requirement.invalid {
            color: var(--secondary-color);
        }
        
        .form-header {
            background-color: var(--primary-light);
            padding: 2rem;
            margin: -2rem -2rem 2rem -2rem;
            border-bottom: 1px solid var(--border-color);
            text-align: center;
        }
        
        .form-footer {
            background-color: var(--light-color);
            padding: 1.5rem;
            margin: 2rem -2rem -2rem -2rem;
            border-top: 1px solid var(--border-color);
            text-align: center;
        }
        
        .input-hint {
            font-size: 0.85rem;
            color: var(--secondary-color);
            margin-top: 0.5rem;
            display: block;
        }
        
        .dob-input-group {
            position: relative;
        }
        
        .dob-input-group .input-group-text {
            border-right: none;
        }
        
        .dob-input-group .form-control {
            border-left: none;
        }
        
        .dob-input-group:after {
            content: '\f073';
            font-family: 'Font Awesome 6 Free';
            font-weight: 900;
            position: absolute;
            right: 1.5rem;
            top: 50%;
            transform: translateY(-50%);
            color: var(--secondary-color);
            pointer-events: none;
        }
        
        .invalid-feedback {
            font-size: 0.85rem;
            margin-top: 0.25rem;
        }
        
        .was-validated .form-control:invalid, 
        .was-validated .form-select:invalid {
            border-color: var(--danger-color);
        }
        
        .was-validated .form-control:valid, 
        .was-validated .form-select:valid {
            border-color: var(--success-color);
        }
        
        .was-validated .form-control:invalid:focus, 
        .was-validated .form-select:invalid:focus {
            box-shadow: 0 0 0 0.25rem rgba(231, 76, 60, 0.25);
        }
        
        @media (max-width: 992px) {
            .progress-steps {
                padding: 0;
            }
            
            .progress-steps:before {
                left: 15%;
                right: 15%;
            }
        }
        
        @media (max-width: 768px) {
            .progress-steps {
                flex-wrap: wrap;
                justify-content: center;
                margin-bottom: 2rem;
            }
            
            .step {
                width: 25%;
                margin-bottom: 1.5rem;
            }
            
            .progress-steps:before {
                display: none;
            }
            
            .form-container {
                padding: 1.5rem;
            }
            
            .form-header, .form-footer {
                margin-left: -1.5rem;
                margin-right: -1.5rem;
            }
        }
        
        @media (max-width: 576px) {
            .step {
                width: 50%;
            }
            
            .navbar-brand {
                font-size: 1.3rem;
            }
            
            .section-title {
                font-size: 1.2rem;
            }
            
            .btn-primary, .btn-outline-secondary {
                width: 100%;
                margin-bottom: 0.5rem;
            }
            
            .d-md-flex {
                flex-direction: column;
            }
        }
    </style>
</head>
<body>
    <nav class="navbar navbar-expand-lg navbar-dark mb-4">
        <div class="container">
            <a class="navbar-brand" href="#">
                <i class="fas fa-users"></i>
                <span>Student Org Portal</span>
            </a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav ms-auto">
                    <li class="nav-item">
                        <a class="nav-link" href="login.php"><i class="fas fa-sign-in-alt me-1"></i> Login</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#"><i class="fas fa-question-circle me-1"></i> Help</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>

    <div class="container">
        <div class="row justify-content-center">
            <div class="col-lg-10">
                <div class="form-container p-5 mb-5">
                    <div class="form-header">
                        <h2 class="fw-bold mb-3" style="color: var(--primary-color);">
                            <i class="fas fa-user-plus me-2"></i>Organization Registration
                        </h2>
                        <p class="text-muted mb-0">Complete all sections to register your student organization</p>
                    </div>
                    
                    <div class="progress-steps">
                        <div class="step active">
                            <div class="step-number">1</div>
                            <div class="step-label">Account Info</div>
                        </div>
                        <div class="step">
                            <div class="step-number">2</div>
                            <div class="step-label">Personal Info</div>
                        </div>
                        <div class="step">
                            <div class="step-number">3</div>
                            <div class="step-label">Academic Info</div>
                        </div>
                        <div class="step">
                            <div class="step-number">4</div>
                            <div class="step-label">Contact Info</div>
                        </div>
                    </div>
                    
                    <?php if (isset($_SESSION['success'])): ?>
                        <div class="alert alert-success fade-in d-flex align-items-center">
                            <i class="fas fa-check-circle"></i>
                            <div>
                                <?php
                                echo $_SESSION['success'];
                                unset($_SESSION['success']);
                                ?>
                            </div>
                        </div>
                    <?php endif; ?>
                    
                    <?php if (isset($_SESSION['error'])): ?>
                        <div class="alert alert-danger fade-in d-flex align-items-center">
                            <i class="fas fa-exclamation-circle"></i>
                            <div>
                                <?php
                                echo $_SESSION['error'];
                                unset($_SESSION['error']);
                                ?>
                            </div>
                        </div>
                    <?php endif; ?>

                    <form id="registrationForm" action="functions.php" method="POST" enctype="multipart/form-data" novalidate>
                        <!-- Account Information Section -->
                        <div class="mb-4">
                            <h5 class="section-title">
                                <i class="fas fa-user-shield"></i>Account Information
                            </h5>
                            <div class="row g-3">
                                <div class="col-md-6">
                                    <label for="userTypeSelect" class="form-label required-field">User Type</label>
                                    <select class="form-select" name="user_type" id="userTypeSelect" required>
                                        <option value="" disabled selected>Select your role</option>
                                        <option value="Adviser">Organization Adviser</option>
                                        <option value="President">Organization President</option>
                                    </select>
                                    <div class="invalid-feedback">Please select your user type</div>
                                </div>
                                <div class="col-md-6" id="organizationField" style="display: none;">
                                    <label for="organization" class="form-label required-field">Organization Name</label>
                                    <input class="form-control" name="organization" id="organization" placeholder="Enter organization name" required>
                                    <div class="invalid-feedback">Please provide your organization name</div>
                                    <div class="input-hint">Enter the official name of your student organization</div>
                                </div>
                            </div>
                        </div>

                        <!-- Login Information Section -->
                        <div class="mb-4">
                            <h5 class="section-title">
                                <i class="fas fa-key"></i>Login Information
                            </h5>
                            <div class="row g-3">
                                <div class="col-md-6">
                                    <label for="username" class="form-label required-field">Username</label>
                                    <div class="input-group has-validation">
                                        <span class="input-group-text"><i class="fas fa-user"></i></span>
                                        <input type="text" class="form-control" id="username" name="username" placeholder="Enter username" required minlength="4" maxlength="20" pattern="[a-zA-Z0-9]+">
                                        <div class="invalid-feedback">Username must be 4-20 characters (letters and numbers only)</div>
                                    </div>
                                    <div class="input-hint">4-20 characters, letters and numbers only</div>
                                </div>
                                <div class="col-md-6">
                                    <label for="email" class="form-label required-field">Email Address</label>
                                    <div class="input-group has-validation">
                                        <span class="input-group-text"><i class="fas fa-envelope"></i></span>
                                        <input type="email" class="form-control" id="email" name="email" placeholder="Enter email address" required>
                                        <div class="invalid-feedback">Please provide a valid email</div>
                                    </div>
                                    <div class="input-hint">Your institutional email is preferred</div>
                                </div>
                                <div class="col-md-6">
                                    <label for="password" class="form-label required-field">Password</label>
                                    <div class="input-group has-validation">
                                        <span class="input-group-text"><i class="fas fa-lock"></i></span>
                                        <input type="password" class="form-control" id="password" name="password" placeholder="Create password" required minlength="8">
                                        <span class="input-group-text password-toggle" onclick="togglePassword('password')">
                                            <i class="fas fa-eye"></i>
                                        </span>
                                        <div class="invalid-feedback">Password must be at least 8 characters</div>
                                    </div>
                                    <div class="password-strength mt-2">
                                        <div class="password-strength-bar" id="passwordStrengthBar"></div>
                                    </div>
                                    <div class="password-requirements">
                                        <div class="requirement invalid" id="lengthReq">
                                            <i class="fas fa-circle"></i> At least 8 characters
                                        </div>
                                        <div class="requirement invalid" id="upperReq">
                                            <i class="fas fa-circle"></i> At least 1 uppercase letter
                                        </div>
                                        <div class="requirement invalid" id="numberReq">
                                            <i class="fas fa-circle"></i> At least 1 number
                                        </div>
                                        <div class="requirement invalid" id="specialReq">
                                            <i class="fas fa-circle"></i> At least 1 special character
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <label for="confirm_password" class="form-label required-field">Confirm Password</label>
                                    <div class="input-group has-validation">
                                        <span class="input-group-text"><i class="fas fa-lock"></i></span>
                                        <input type="password" class="form-control" id="confirm_password" name="confirm_password" placeholder="Confirm password" required>
                                        <span class="input-group-text password-toggle" onclick="togglePassword('confirm_password')">
                                            <i class="fas fa-eye"></i>
                                        </span>
                                        <div class="invalid-feedback">Passwords must match</div>
                                    </div>
                                    <div class="input-hint">Re-enter your password for verification</div>
                                </div>
                            </div>
                        </div>

                        <!-- Personal Information Section -->
                        <div class="mb-4">
                            <h5 class="section-title">
                                <i class="fas fa-user-circle"></i>Personal Information
                            </h5>
                            <div class="row g-3">
                                <div class="col-md-4">
                                    <label for="firstname" class="form-label required-field">First Name</label>
                                    <input type="text" class="form-control" id="firstname" name="firstname" placeholder="Enter first name" required>
                                    <div class="invalid-feedback">Please provide your first name</div>
                                </div>
                                <div class="col-md-4">
                                    <label for="middlename" class="form-label">Middle Name</label>
                                    <input type="text" class="form-control" id="middlename" name="middlename" placeholder="Enter middle name">
                                    <div class="input-hint">Leave blank if not applicable</div>
                                </div>
                                <div class="col-md-4">
                                    <label for="lastname" class="form-label required-field">Last Name</label>
                                    <input type="text" class="form-control" id="lastname" name="lastname" placeholder="Enter last name" required>
                                    <div class="invalid-feedback">Please provide your last name</div>
                                </div>
                            </div>

                            <div class="row g-3 mt-2">
                                <div class="col-md-6">
                                    <label for="dob" class="form-label required-field">Date of Birth</label>
                                    <div class="dob-input-group has-validation">
                                        <span class="input-group-text"><i class="fas fa-calendar-alt"></i></span>
                                        <input type="date" class="form-control" id="dob" name="dob" required>
                                        <div class="invalid-feedback">Please provide your date of birth</div>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <label for="gender" class="form-label required-field">Gender</label>
                                    <select class="form-select" id="gender" name="gender" required>
                                        <option value="" disabled selected>Select gender</option>
                                        <option value="Male">Male</option>
                                        <option value="Female">Female</option>
                                        <option value="Non-binary">Non-binary</option>
                                        <option value="Prefer not to say">Prefer not to say</option>
                                    </select>
                                    <div class="invalid-feedback">Please select your gender</div>
                                </div>
                            </div>
                        </div>

                        <!-- Academic Information Section -->
                        <div class="mb-4 fade-in" id="courseYearSection">
                            <h5 class="section-title">
                                <i class="fas fa-graduation-cap"></i>Academic Information
                            </h5>
                            <div class="row g-3">
                                <div class="col-md-4">
                                    <label for="course" class="form-label required-field">Course</label>
                                    <select class="form-select" id="course" name="course" required>
                                        <option value="" disabled selected>Select your course</option>
                                        <?php
                                        $mysql_query = "SELECT * FROM department GROUP BY course ORDER BY course";
                                        $result = mysqli_query($connection, $mysql_query);
                                        while ($row = mysqli_fetch_assoc($result)) {
                                            $course = $row['course'];
                                            echo "<option value='$course'>$course</option>";
                                        }
                                        ?>
                                    </select>
                                    <div class="invalid-feedback">Please select your course</div>
                                </div>
                                <div class="col-md-4">
                                    <label for="year" class="form-label required-field">Year Level</label>
                                    <select class="form-select" id="year" name="year" required>
                                        <option value="" disabled selected>Select year level</option>
                                        <option value="I">First Year</option>
                                        <option value="II">Second Year</option>
                                        <option value="III">Third Year</option>
                                        <option value="IV">Fourth Year</option>
                                        <option value="V">Fifth Year</option>
                                    </select>
                                    <div class="invalid-feedback">Please select your year level</div>
                                </div>
                                <div class="col-md-4">
                                    <label for="section" class="form-label required-field">Section</label>
                                    <select class="form-select" id="section" name="section" required>
                                        <option value="" disabled selected>Select section</option>
                                        <option value="A">Section A</option>
                                        <option value="B">Section B</option>
                                        <option value="C">Section C</option>
                                        <option value="D">Section D</option>
                                    </select>
                                    <div class="invalid-feedback">Please select your section</div>
                                </div>
                            </div>
                        </div>

                        <!-- Contact Information Section -->
                        <div class="mb-4">
                            <h5 class="section-title">
                                <i class="fas fa-address-book"></i>Contact Information
                            </h5>
                            <div class="row g-3">
                                <div class="col-md-6">
                                    <label for="phone" class="form-label required-field">Phone Number</label>
                                    <div class="input-group has-validation">
                                        <span class="input-group-text"><i class="fas fa-phone"></i></span>
                                        <input type="tel" class="form-control" id="phone" name="phone" placeholder="Enter phone number" required pattern="[0-9]{11}">
                                        <div class="invalid-feedback">Please provide a valid 11-digit phone number</div>
                                    </div>
                                    <div class="input-hint">Format: 09123456789</div>
                                </div>
                                <div class="col-md-6">
                                    <label for="alternate_phone" class="form-label">Alternate Phone Number</label>
                                    <div class="input-group">
                                        <span class="input-group-text"><i class="fas fa-phone-alt"></i></span>
                                        <input type="tel" class="form-control" id="alternate_phone" name="alternate_phone" placeholder="Enter alternate number" pattern="[0-9]{11}">
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- Address Information Section -->
                        <div class="mb-4">
                            <h5 class="section-title">
                                <i class="fas fa-map-marker-alt"></i>Address Information
                            </h5>
                            <div class="row g-3">
                                <div class="col-md-6">
                                    <label for="region" class="form-label required-field">Region</label>
                                    <select class="form-select" name="region" id="region" onchange="loadProvinces(this.value)" required>
                                        <option value="" disabled selected>Select Region</option>
                                        <option value="NCR">National Capital Region (NCR)</option>
                                        <option value="CAR">Cordillera Administrative Region (CAR)</option>
                                        <option value="Region I">Ilocos Region</option>
                                        <option value="Region II">Cagayan Valley</option>
                                        <option value="Region III">Central Luzon</option>
                                        <option value="Region IV-A">CALABARZON</option>
                                        <option value="Region IV-B">MIMAROPA</option>
                                        <option value="Region V">Bicol Region</option>
                                        <option value="Region VI">Western Visayas</option>
                                        <option value="Region VII">Central Visayas</option>
                                        <option value="Region VIII">Eastern Visayas</option>
                                        <option value="Region IX">Zamboanga Peninsula</option>
                                        <option value="Region X">Northern Mindanao</option>
                                        <option value="Region XI">Davao Region</option>
                                        <option value="Region XII">SOCCSKSARGEN</option>
                                        <option value="Region XIII">Caraga</option>
                                        <option value="BARMM">Bangsamoro Autonomous Region in Muslim Mindanao (BARMM)</option>
                                    </select>
                                    <div class="invalid-feedback">Please select your region</div>
                                </div>
                                <div class="col-md-6">
                                    <label for="province" class="form-label required-field">Province</label>
                                    <select class="form-select" id="province" name="province" required onchange="loadCities(this.value)">
                                        <option value="" disabled selected>Select Province</option>
                                    </select>
                                    <div class="invalid-feedback">Please select your province</div>
                                </div>
                                <div class="col-md-6">
                                    <label for="city" class="form-label required-field">Municipality/City</label>
                                    <select class="form-select" id="city" name="city" required onchange="loadMunicipalities(this.value)">
                                        <option value="" disabled selected>Select Municipality/City</option>
                                    </select>
                                    <div class="invalid-feedback">Please select your municipality/city</div>
                                </div>
                                <div class="col-md-6">
                                    <label for="barangay" class="form-label required-field">Barangay</label>
                                    <select class="form-select" name="barangay" id="barangay" required>
                                        <option value="" disabled selected>Select Barangay</option>
                                    </select>
                                    <div class="invalid-feedback">Please select your barangay</div>
                                </div>
                                <div class="col-12">
                                    <label for="street" class="form-label required-field">Street Address</label>
                                    <input type="text" class="form-control" id="street" name="street" placeholder="House #, Street, Building" required>
                                    <div class="invalid-feedback">Please provide your street address</div>
                                    <div class="input-hint">Example: 123 Main Street, Apartment 4B</div>
                                </div>
                            </div>
                        </div>

                        <!-- Documents Section (President Only) -->
                        <div class="mb-4 fade-in" id="president_documents" style="display: none;">
                            <h5 class="section-title">
                                <i class="fas fa-file-alt"></i>Required Documents
                            </h5>
                            <div class="alert alert-info d-flex align-items-center">
                                <i class="fas fa-info-circle me-3 fs-4"></i>
                                <div>
                                    <strong>Note:</strong> As organization president, you need to submit the following documents for verification.
                                    Files must be in PDF format and should not exceed 5MB each.
                                </div>
                            </div>
                            
                            <div class="mb-3">
                                <label for="document1" class="form-label required-field">Constitution and By-Laws (CBL)</label>
                                <div class="file-upload">
                                    <label for="document1" class="file-upload-label">
                                        <div class="file-upload-icon">
                                            <i class="fas fa-file-pdf"></i>
                                        </div>
                                        <div class="file-upload-text" id="document1Text">Click to upload PDF file</div>
                                        <div class="file-upload-note">Max file size: 5MB | PDF only</div>
                                        <input type="file" class="file-upload-input" name="document1" id="document1" accept=".pdf" required/>
                                    </label>
                                    <div class="invalid-feedback">Please upload the Constitution and By-Laws document</div>
                                </div>
                                <div class="file-upload-preview" id="document1Preview">
                                    <div class="d-flex justify-content-between align-items-center">
                                        <span id="document1FileName"></span>
                                        <button type="button" class="btn btn-sm btn-outline-danger" onclick="clearFileInput('document1')">
                                            <i class="fas fa-times"></i>
                                        </button>
                                    </div>
                                </div>
                            </div>
                            
                            <div class="mb-3">
                                <label for="document2" class="form-label">Organization Profile (Optional)</label>
                                <div class="file-upload">
                                    <label for="document2" class="file-upload-label">
                                        <div class="file-upload-icon">
                                            <i class="fas fa-file-pdf"></i>
                                        </div>
                                        <div class="file-upload-text" id="document2Text">Click to upload PDF file</div>
                                        <div class="file-upload-note">Max file size: 5MB | PDF only</div>
                                        <input type="file" class="file-upload-input" name="document2" id="document2" accept=".pdf"/>
                                    </label>
                                </div>
                                <div class="file-upload-preview" id="document2Preview">
                                    <div class="d-flex justify-content-between align-items-center">
                                        <span id="document2FileName"></span>
                                        <button type="button" class="btn btn-sm btn-outline-danger" onclick="clearFileInput('document2')">
                                            <i class="fas fa-times"></i>
                                        </button>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- Terms and Conditions -->
                        <div class="mb-4">
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" id="termsCheck" required>
                                <label class="form-check-label" for="termsCheck">
                                    I agree to the <a href="#" data-bs-toggle="modal" data-bs-target="#termsModal">Terms and Conditions</a> <span class="text-danger">*</span>
                                </label>
                                <div class="invalid-feedback">You must agree before submitting</div>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" id="privacyCheck" required>
                                <label class="form-check-label" for="privacyCheck">
                                    I agree to the <a href="#" data-bs-toggle="modal" data-bs-target="#privacyModal">Privacy Policy</a> <span class="text-danger">*</span>
                                </label>
                                <div class="invalid-feedback">You must agree before submitting</div>
                            </div>
                        </div>

                        <div class="d-grid gap-2 d-md-flex justify-content-md-between mt-4">
                            <button type="reset" class="btn btn-outline-secondary">
                                <i class="fas fa-undo me-2"></i>Reset Form
                            </button>
                            <button type="submit" class="btn btn-primary">
                                <i class="fas fa-user-plus me-2"></i>Complete Registration
                            </button>
                        </div>
                    </form>
                    
                    <div class="form-footer">
                        <p class="mb-0">Already have an account? <a href="login.php" class="login-link">Login Here</a></p>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Terms and Conditions Modal -->
    <div class="modal fade" id="termsModal" tabindex="-1" aria-labelledby="termsModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header bg-primary text-white">
                    <h5 class="modal-title" id="termsModalLabel">Terms and Conditions</h5>
                    <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <h6 class="fw-bold mb-3">1. Organization Registration</h6>
                    <p>By registering your student organization, you agree to abide by all university policies and regulations governing student organizations. The organization must maintain good standing with the university.</p>
                    
                    <h6 class="fw-bold mb-3">2. Membership Requirements</h6>
                    <p>All members must be currently enrolled students in good academic standing. Organizations must maintain a minimum of 10 active members.</p>
                    
                    <h6 class="fw-bold mb-3">3. Financial Responsibilities</h6>
                    <p>Organizations are responsible for managing their finances in accordance with university policies. All fundraising activities must be approved in advance.</p>
                    
                    <h6 class="fw-bold mb-3">4. Event Management</h6>
                    <p>All organization events must be registered with the Office of Student Affairs at least 14 days in advance. Organizations are responsible for the conduct of their members at all events.</p>
                    
                    <h6 class="fw-bold mb-3">5. Code of Conduct</h6>
                    <p>Organizations and their members must adhere to the university's code of conduct. Violations may result in disciplinary action, including suspension or revocation of organization privileges.</p>
                    
                    <h6 class="fw-bold mb-3">6. Data Accuracy</h6>
                    <p>All information provided during registration must be accurate and up-to-date. Organizations must notify the system administrators of any changes to their information.</p>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-primary" data-bs-dismiss="modal">I Understand</button>
                </div>
            </div>
        </div>
    </div>

    <!-- Privacy Policy Modal -->
    <div class="modal fade" id="privacyModal" tabindex="-1" aria-labelledby="privacyModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header bg-primary text-white">
                    <h5 class="modal-title" id="privacyModalLabel">Privacy Policy</h5>
                    <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <h6 class="fw-bold mb-3">1. Information Collection</h6>
                    <p>We collect personal information necessary for the registration and management of student organizations. This includes contact information, academic details, and organizational documents.</p>
                    
                    <h6 class="fw-bold mb-3">2. Use of Information</h6>
                    <p>Collected information will be used for official university purposes only, including communication, event management, and organization verification. Information will not be shared with third parties without consent.</p>
                    
                    <h6 class="fw-bold mb-3">3. Data Security</h6>
                    <p>We implement appropriate security measures to protect against unauthorized access, alteration, or disclosure of your personal information. However, no internet transmission is completely secure.</p>
                    
                    <h6 class="fw-bold mb-3">4. Information Retention</h6>
                    <p>Personal information will be retained for the duration of your organization's active status and for a period thereafter as required by university policy or applicable laws.</p>
                    
                    <h6 class="fw-bold mb-3">5. Your Rights</h6>
                    <p>You have the right to access, correct, or request deletion of your personal information, subject to certain exceptions. Requests should be directed to the Office of Student Affairs.</p>
                    
                    <h6 class="fw-bold mb-3">6. Changes to Policy</h6>
                    <p>This policy may be updated periodically. Significant changes will be communicated to registered organizations through official university channels.</p>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-primary" data-bs-dismiss="modal">I Understand</button>
                </div>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="adviser/address_js/dropdown.js"></script>
    <script>
        // Password toggle functionality
        function togglePassword(fieldId) {
            const field = document.getElementById(fieldId);
            const icon = field.nextElementSibling.querySelector('i');
            
            if (field.type === 'password') {
                field.type = 'text';
                icon.classList.remove('fa-eye');
                icon.classList.add('fa-eye-slash');
            } else {
                field.type = 'password';
                icon.classList.remove('fa-eye-slash');
                icon.classList.add('fa-eye');
            }
        }
        
        // User type selection handler
        const userTypeSelect = document.getElementById('userTypeSelect');
        const presidentDocumentsDiv = document.getElementById('president_documents');
        const organizationField = document.getElementById('organizationField');
        const courseYearSection = document.getElementById('courseYearSection');
        
        userTypeSelect.addEventListener('change', function() {
            if (this.value === 'President') {
                presidentDocumentsDiv.style.display = 'block';
                organizationField.style.display = 'block';
                courseYearSection.style.display = 'block';
                
                // Set required attributes
                document.getElementById('organization').setAttribute('required', 'required');
                document.getElementById('document1').setAttribute('required', 'required');
                document.getElementById('section').setAttribute('required', 'required');
                document.getElementById('year').setAttribute('required', 'required');
                document.getElementById('course').setAttribute('required', 'required');
            } else if (this.value === 'Adviser') {
                presidentDocumentsDiv.style.display = 'none';
                organizationField.style.display = 'block';
                courseYearSection.style.display = 'none';
                
                // Remove required attributes
                document.getElementById('organization').setAttribute('required', 'required');
                document.getElementById('document1').removeAttribute('required');
                document.getElementById('section').removeAttribute('required');
                document.getElementById('year').removeAttribute('required');
                document.getElementById('course').removeAttribute('required');
            } else {
                presidentDocumentsDiv.style.display = 'none';
                organizationField.style.display = 'none';
                courseYearSection.style.display = 'none';
            }
        });

        // File upload handling
        function handleFileUpload(inputId) {
            const fileInput = document.getElementById(inputId);
            const fileName = fileInput.files[0] ? fileInput.files[0].name : 'No file selected';
            const previewDiv = document.getElementById(inputId + 'Preview');
            const fileNameSpan = document.getElementById(inputId + 'FileName');
            const uploadText = document.getElementById(inputId + 'Text');
            
            if (fileInput.files.length > 0) {
                uploadText.textContent = fileName;
                fileNameSpan.textContent = fileName;
                previewDiv.style.display = 'block';
                
                // Validate file size (5MB max)
                if (fileInput.files[0].size > 5 * 1024 * 1024) {
                    alert('File size exceeds 5MB limit');
                    clearFileInput(inputId);
                    return;
                }
                
                // Validate file type
                if (!fileInput.files[0].name.toLowerCase().endsWith('.pdf')) {
                    alert('Only PDF files are allowed');
                    clearFileInput(inputId);
                    return;
                }
            }
        }
        
        function clearFileInput(inputId) {
            const fileInput = document.getElementById(inputId);
            const previewDiv = document.getElementById(inputId + 'Preview');
            const uploadText = document.getElementById(inputId + 'Text');
            
            fileInput.value = '';
            uploadText.textContent = 'Click to upload PDF file';
            previewDiv.style.display = 'none';
        }
        
        // Initialize file upload event listeners
        document.getElementById('document1').addEventListener('change', function() {
            handleFileUpload('document1');
        });
        
        document.getElementById('document2').addEventListener('change', function() {
            handleFileUpload('document2');
        });

        // Password strength checker
        document.getElementById('password').addEventListener('input', function() {
            const password = this.value;
            const strengthBar = document.getElementById('passwordStrengthBar');
            let strength = 0;
            
            // Check length
            if (password.length >= 8) {
                document.getElementById('lengthReq').classList.remove('invalid');
                document.getElementById('lengthReq').classList.add('valid');
                strength += 25;
            } else {
                document.getElementById('lengthReq').classList.remove('valid');
                document.getElementById('lengthReq').classList.add('invalid');
            }
            
            // Check uppercase letters
            if (/[A-Z]/.test(password)) {
                document.getElementById('upperReq').classList.remove('invalid');
                document.getElementById('upperReq').classList.add('valid');
                strength += 25;
            } else {
                document.getElementById('upperReq').classList.remove('valid');
                document.getElementById('upperReq').classList.add('invalid');
            }
            
            // Check numbers
            if (/\d/.test(password)) {
                document.getElementById('numberReq').classList.remove('invalid');
                document.getElementById('numberReq').classList.add('valid');
                strength += 25;
            } else {
                document.getElementById('numberReq').classList.remove('valid');
                document.getElementById('numberReq').classList.add('invalid');
            }
            
            // Check special characters
            if (/[^A-Za-z0-9]/.test(password)) {
                document.getElementById('specialReq').classList.remove('invalid');
                document.getElementById('specialReq').classList.add('valid');
                strength += 25;
            } else {
                document.getElementById('specialReq').classList.remove('valid');
                document.getElementById('specialReq').classList.add('invalid');
            }
            
            // Update strength bar
            strengthBar.style.width = strength + '%';
            
            // Update color based on strength
            if (strength < 50) {
                strengthBar.style.backgroundColor = 'var(--danger-color)';
            } else if (strength < 75) {
                strengthBar.style.backgroundColor = 'var(--warning-color)';
            } else {
                strengthBar.style.backgroundColor = 'var(--success-color)';
            }
        });

        // Form validation
        (function() {
            'use strict';
            
            // Fetch the form element
            const form = document.getElementById('registrationForm');
            
            // Validate on submit
            form.addEventListener('submit', function(event) {
                if (!form.checkValidity()) {
                    event.preventDefault();
                    event.stopPropagation();
                }
                
                // Additional password validation
                const password = document.getElementById('password').value;
                const confirmPassword = document.getElementById('confirm_password').value;
                
                if (password !== confirmPassword) {
                    document.getElementById('confirm_password').setCustomValidity('Passwords must match');
                    event.preventDefault();
                    event.stopPropagation();
                } else {
                    document.getElementById('confirm_password').setCustomValidity('');
                }
                
                // Add validation class
                form.classList.add('was-validated');
            }, false);
            
            // Validate password match on the fly
            document.getElementById('confirm_password').addEventListener('input', function() {
                const password = document.getElementById('password').value;
                const confirmPassword = this.value;
                
                if (password !== confirmPassword) {
                    this.setCustomValidity('Passwords must match');
                } else {
                    this.setCustomValidity('');
                }
            });
            
            // Phone number validation
            document.getElementById('phone').addEventListener('input', function() {
                const phonePattern = /^[0-9]{11}$/;
                if (!phonePattern.test(this.value)) {
                    this.setCustomValidity('Please enter a valid 11-digit phone number');
                } else {
                    this.setCustomValidity('');
                }
            });
            
            // Username validation
            document.getElementById('username').addEventListener('input', function() {
                const usernamePattern = /^[a-zA-Z0-9]{4,20}$/;
                if (!usernamePattern.test(this.value)) {
                    this.setCustomValidity('Username must be 4-20 characters (letters and numbers only)');
                } else {
                    this.setCustomValidity('');
                }
            });
        })();

        // Date of birth validation (minimum age 16)
        document.getElementById('dob').addEventListener('change', function() {
            const dob = new Date(this.value);
            const today = new Date();
            let age = today.getFullYear() - dob.getFullYear();
            const monthDiff = today.getMonth() - dob.getMonth();
            
            if (monthDiff < 0 || (monthDiff === 0 && today.getDate() < dob.getDate())) {
                age--;
            }
            
            if (age < 16) {
                this.setCustomValidity('You must be at least 16 years old to register');
            } else {
                this.setCustomValidity('');
            }
        });

        // Initialize tooltips
        document.addEventListener('DOMContentLoaded', function() {
            const tooltipTriggerList = [].slice.call(document.querySelectorAll('[data-bs-toggle="tooltip"]'));
            tooltipTriggerList.map(function(tooltipTriggerEl) {
                return new bootstrap.Tooltip(tooltipTriggerEl);
            });
        });
    </script>
</body>
</html>