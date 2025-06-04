<?php
$errors = [];
if ($_SERVER["REQUEST_METHOD"] == "POST") {
  $username = trim($_POST['username']);
  $email = trim($_POST['email']);

  // Validate username
  if (empty($username)) {
    $errors[] = "Username is required.";
  } elseif (strlen($username) < 3) {
    $errors[] = "Username must be at least 3 characters.";
  }

  // Validate email
  if (empty($email)) {
    $errors[] = "Email is required.";
  } elseif (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
    $errors[] = "Invalid email format.";
  }

  // Display results
  if (empty($errors)) {
    echo "Form submitted successfully!";
  } else {
    foreach ($errors as $error) {
      echo $error . "<br>";
    }
  }
}
?>