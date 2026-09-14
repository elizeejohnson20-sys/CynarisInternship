<?php

session_start();

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>PHP Session</title>
</head>

<body>

    <h1>PHP Session Data</h1>

    <?php if (isset($_SESSION["student_name"])): ?>

        <p>
            <strong>Name:</strong>
            <?php echo htmlspecialchars($_SESSION["student_name"]); ?>
        </p>

        <p>
            <strong>Email:</strong>
            <?php echo htmlspecialchars($_SESSION["student_email"]); ?>
        </p>

        <p>
            <strong>Course:</strong>
            <?php echo htmlspecialchars($_SESSION["student_course"]); ?>
        </p>

        <p>Session data is available.</p>

    <?php else: ?>

        <p>No session data found.</p>

    <?php endif; ?>

    <br>

    <a href="form.php">Back to Form</a>

</body>

</html>