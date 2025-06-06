<?php

// Example: A simple "Hello, Vercel!"
echo "Hello from native PHP on Vercel!";

// Example: Handle different routes
$request_uri = $_SERVER['REQUEST_URI'];

if ($request_uri === '/api/hello') {
    echo "<br>This is the hello API endpoint!";
} elseif ($request_uri === '/api/data') {
    header('Content-Type: application/json');
    echo json_encode(['message' => 'Some data from PHP', 'timestamp' => time()]);
} else {
    // You can serve your main HTML/frontend here if it's dynamic
    // Or redirect to your static frontend if it's purely an API
    echo "<br>Welcome to your PHP app!";
}

// You can include other PHP files if needed
// include 'another_file.php';
?>