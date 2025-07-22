<?php
session_start();
include("include/connection.php");

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Sanitize input values
    $username = mysqli_real_escape_string($connection, $_POST['username']);
    $password = mysqli_real_escape_string($connection, $_POST['password']);
    $lastname = mysqli_real_escape_string($connection, $_POST['lastname']);
    $firstname = mysqli_real_escape_string($connection, $_POST['firstname']);
    $middlename = mysqli_real_escape_string($connection, $_POST['middlename']);
    $course = mysqli_real_escape_string($connection, $_POST['course']);
    $year = mysqli_real_escape_string($connection, $_POST['year']);
    $section = mysqli_real_escape_string($connection, $_POST['section']);
    $gender = mysqli_real_escape_string($connection, $_POST['gender']);
    $dob = mysqli_real_escape_string($connection, $_POST['dob']);
    $age = mysqli_real_escape_string($connection, $_POST['age']);
    $email = mysqli_real_escape_string($connection, $_POST['email']);
    $phone = mysqli_real_escape_string($connection, $_POST['phone']);
    $street = mysqli_real_escape_string($connection, $_POST['street']);
    $barangay = mysqli_real_escape_string($connection, $_POST['barangay']);
    $municipality = mysqli_real_escape_string($connection, $_POST['city']);
    $province = mysqli_real_escape_string($connection, $_POST['province']);
    $region = mysqli_real_escape_string($connection, $_POST['region']);
    $role = mysqli_real_escape_string($connection, $_POST['user_type']);
    $position = "President";

 

    // Handle file uploads and student_id only for President
    if ($role == "President") {
        $student_id1 = mysqli_real_escape_string($connection, $_POST['student_id1']);
        $student_id2 = mysqli_real_escape_string($connection, $_POST['student_id2']);
        $student_id3 = mysqli_real_escape_string($connection, $_POST['student_id3']);
        $student_id = $student_id1 . '-' . $student_id2 . '-' . $student_id3;

        $organization = mysqli_real_escape_string($connection, $_POST['organization']);

        // Handle document uploads (only for President)
        $documents = array('document1', 'document2', 'document3', 'document4', 'document5');
        $uploadedDocs = array_fill_keys($documents, null); // Initialize with null values
        $allowedFileTypes = array("pdf");
        $uploadDir = "uploads/documents/";


        if (!is_dir($uploadDir)) {
            mkdir($uploadDir, 0777, true);
        }

        foreach ($documents as $document) {
            if (isset($_FILES[$document]) && $_FILES[$document]['error'] == 0) { // Check if file exists and has no error
                $file = $_FILES[$document];
                $fileName = basename($file['name']); // Original file name
                $fileExtension = pathinfo($fileName, PATHINFO_EXTENSION);
        
                // Only allow PDF files
                if (in_array(strtolower($fileExtension), $allowedFileTypes)) {
                    $uploadedDocs[$document] = $fileName; // Save only the original file name
                    
                    // Move the uploaded document to the specified directory
                    if (!move_uploaded_file($file['tmp_name'], $uploadDir . $fileName)) {
                        $_SESSION['error'] = "Error uploading document: " . $fileName;
                        header("Location: register.php");
                        exit();
                    }
                } else {
                    $_SESSION['error'] = "Only PDF files are allowed!";
                    header("Location: register.php");
                    exit();
                }
            }
        }
        

        $query = "INSERT INTO students (
                    student_id, username, password, lastname, firstname, middlename, course, year, section, gender, dob, age, email, phone, street, barangay, municipality, province, role, region, document1, document2, document3, document4, document5, position ,organization
                  ) VALUES (
                    '$student_id', '$username', '$password', '$lastname', '$firstname', '$middlename', '$course', '$year', '$section', '$gender', '$dob', '$age', '$email', '$phone', '$street', '$barangay', '$municipality', '$province', '$role', '$region',
                    '{$uploadedDocs['document1']}', '{$uploadedDocs['document2']}', '{$uploadedDocs['document3']}', '{$uploadedDocs['document4']}', '{$uploadedDocs['document5']}', '$position', '$organization'
                  )";
    } elseif ($role == "Adviser") {

        $organization = mysqli_real_escape_string($connection, $_POST['organization']);
        $position = "Adviser";
        $query = "INSERT INTO students (
                    username, password, lastname, firstname, middlename, position, course, year, section, gender, dob, age, email, phone, street, barangay, municipality, province, role, region, organization
                  ) VALUES (
                    '$username', '$password', '$lastname', '$firstname', '$middlename', '$position', '$course', '$year', '$section', '$gender', '$dob', '$age', '$email', '$phone', '$street', '$barangay', '$municipality', '$province', '$role', '$region', '$organization'
                  )";
    } else {
        $_SESSION['error'] = "Invalid user type!";
        header("Location: register.php");
        exit();
    }

    // Execute the query
    if (mysqli_query($connection, $query)) {
        $_SESSION['success'] = "User registered successfully!";
        
        // After successful user registration
        $user_id = mysqli_insert_id($connection); // Get the newly registered user's ID
        $message = "New user registered: " . $username;
        $status = "unread";
        $stmt = $connection->prepare("INSERT INTO notifications (user_id, message, status) VALUES (?, ?, ?)");
        $stmt->bind_param("iss", $user_id, $message, $status);
        $stmt->execute();
        $stmt->close();

        header("Location: register.php");
        exit();
    } else {
        $_SESSION['error'] = "Error: " . mysqli_error($connection);
        header("Location: register.php");
        exit();
    }
}

mysqli_close($connection);
?>
