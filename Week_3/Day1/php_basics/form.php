<?php

// ==============================
// GET METHOD
// ==============================

$getName = "";

if (isset($_GET["name"])) {
    $getName = htmlspecialchars(trim($_GET["name"]));
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>PHP Form Handling</title>
</head>

<body>

    <h1>PHP Form Handling</h1>

    <!-- GET Example -->
    <h2>GET Method</h2>

    <form method="GET" action="form.php">
        <label for="getName">Enter your name:</label>
        <input type="text" id="getName" name="name" required>
        <button type="submit">Send with GET</button>
    </form>

    <?php if ($getName !== ""): ?>

        <p>
            Hello,
            <strong><?php echo $getName; ?></strong>
        </p>

    <?php endif; ?>


    <!-- POST Example -->
    <h2>POST Method</h2>

    <form method="POST" action="form_handler.php">

        <label for="name">Name:</label>
        <input type="text" id="name" name="name" required>

        <br><br>

        <label for="email">Email:</label>
        <input type="email" id="email" name="email" required>

        <br><br>

        <label for="course">Course:</label>
        <input type="text" id="course" name="course" required>

        <br><br>

        <button type="submit">Submit Form</button>

    </form>

</body>
</html>