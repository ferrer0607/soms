<?php
session_start();
include("include/connection.php");

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $username = mysqli_real_escape_string($connection, $_POST['username']);
    $password = mysqli_real_escape_string($connection, $_POST['password']);

    // Query to find the user with the provided username (regardless of status)
    $query = "SELECT * FROM students WHERE username = '$username'";
    $result = mysqli_query($connection, $query);

    if (mysqli_num_rows($result) == 1) {
        $row = mysqli_fetch_assoc($result);
        $stored_password = $row['password'];
        $status = $row['status']; // Fetching the status column
        $role = $row['role'];     // Assuming there is a role column in the students table

        // Check if user is active
        if ($status !== 'ACTIVE') {
            $_SESSION['error'] = "Your account is not active yet. Please contact the administrator.";
            header("Location: login.php");
            exit();
        }

        // Verify the password (consider using password_verify() if passwords are hashed)
        if ($password === $stored_password) {
            // Password is correct, set the session variables
            $_SESSION['username'] = $row['username'];
            $_SESSION['student_id'] = $row['student_id'];
            $_SESSION['id'] = $row['id'];
            $_SESSION['organization_id'] = $row['organization_id'];

            // Redirect based on role
            if ($role === 'Admin') {
                header("Location: admin/admin_dashboard.php");
            } elseif ($role === 'President') {

                $organization = "SELECT * FROM organizations WHERE id = '$row[organization_id]'"; 
                $organization_result = mysqli_query($connection, $organization); 
                $organization_row = mysqli_fetch_assoc($organization_result); 
                $_SESSION['organization_directory'] = $organization_row['organization_directory'];  
                header("Location: officer/officer_dashboard.php");
            } elseif ($role === 'Adviser') {
                header("Location: adviser/adviser_dashboard.php");
            } else {
                
                $organization = "SELECT * FROM organizations WHERE id = '$row[organization_id]'"; 
                $organization_result = mysqli_query($connection, $organization); 
                $organization_row = mysqli_fetch_assoc($organization_result); 
                $_SESSION['organization_directory'] = $organization_row['organization_directory'];  
                header("Location: student/user_dashboard.php");
            }
            exit();
        } else {
            // Incorrect password
            $_SESSION['error'] = "Invalid username or password!";
            header("Location: login.php");
            exit();
        }
    } else {
        // Username not found
        $_SESSION['error'] = "Invalid username or password!";
        header("Location: login.php");
        exit();
    }
}

// Close the database connection
mysqli_close($connection);
?>
