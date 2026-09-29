<?php

// Start the session
session_start();


// ==============================
// CHECK REQUEST METHOD
// ==============================

if ($_SERVER["REQUEST_METHOD"] !== "POST") {
    die("Invalid request.");
}


// ==============================
// GET FORM DATA
// ==============================

$name = trim($_POST["name"] ?? "");
$email = trim($_POST["email"] ?? "");
$course = trim($_POST["course"] ?? "");


// ==============================
// SERVER-SIDE VALIDATION
// ==============================

$errors = [];

if ($name === "") {
    $errors[] = "Name is required.";
}

if ($email === "" || !filter_var($email, FILTER_VALIDATE_EMAIL)) {
    $errors[] = "Please enter a valid email.";
}

if ($course === "") {
    $errors[] = "Course is required.";
}


// ==============================
// DISPLAY ERRORS
// ==============================

if (!empty($errors)) {

    echo "<h2>Validation Errors</h2>";

    foreach ($errors as $error) {
        echo "<p>" . htmlspecialchars($error) . "</p>";
    }

    echo '<a href="form.php">Go Back</a>';

    exit;
}


// ==============================
// XSS-SAFE OUTPUT
// ==============================

$safeName = htmlspecialchars($name, ENT_QUOTES, "UTF-8");
$safeEmail = htmlspecialchars($email, ENT_QUOTES, "UTF-8");
$safeCourse = htmlspecialchars($course, ENT_QUOTES, "UTF-8");


// ==============================
// SESSION
// ==============================

$_SESSION["student_name"] = $safeName;
$_SESSION["student_email"] = $safeEmail;
$_SESSION["student_course"] = $safeCourse;


// ==============================
// DISPLAY RESULT
// ==============================

echo "<h1>Form Submitted Successfully</h1>";

echo "<p><strong>Name:</strong> $safeName</p>";
echo "<p><strong>Email:</strong> $safeEmail</p>";
echo "<p><strong>Course:</strong> $safeCourse</p>";

echo "<p>Session data has been stored successfully.</p>";

echo '<br>';
echo '<a href="session.php">View Session Data</a>';

?>