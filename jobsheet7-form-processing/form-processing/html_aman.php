<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>HTML Aman</title>
</head>

<body>
  <form action="html_aman.php" method="post">
    <label for="input">Input : </label>
    <input type="text" name="input" id="input"></input>
    <label for="email">Email : </label>
    <input type="email" name="email" id="email"></input>
    <input type="submit" value="Submit">
  </form>
</body>

</html>

<?php
$input = $_POST["input"] ?? '';
$input = htmlspecialchars($input, ENT_QUOTES, 'UTF-8');
echo $input;

$email = $_POST["email"] ?? '';
if (filter_var($email, FILTER_VALIDATE_EMAIL)) {
  echo "Email: $email";
} else {
  echo "Email tidak valid";
}
?>