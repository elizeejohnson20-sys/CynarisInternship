<?php

// ==============================
// 1. VARIABLES
// ==============================

$name = "Elizabeth";
$age = 21;
$course = "BCA";

echo "<h2>PHP Fundamentals</h2>";

echo "<p>Name: $name</p>";
echo "<p>Age: $age</p>";
echo "<p>Course: $course</p>";


// ==============================
// 2. CONDITIONAL STATEMENT
// ==============================

if ($age >= 18) {
    echo "<p>You are eligible as an adult.</p>";
} else {
    echo "<p>You are below 18.</p>";
}


// ==============================
// 3. ARRAY
// ==============================

$skills = ["HTML", "CSS", "JavaScript", "PHP"];

echo "<h3>Skills</h3>";

foreach ($skills as $skill) {
    echo "<p>$skill</p>";
}


// ==============================
// 4. LOOP
// ==============================

echo "<h3>Numbers from 1 to 5</h3>";

for ($i = 1; $i <= 5; $i++) {
    echo "<p>Number: $i</p>";
}


// ==============================
// 5. FUNCTION
// ==============================

function greetUser($name)
{
    return "Welcome, $name!";
}

echo "<h3>" . greetUser($name) . "</h3>";

?>