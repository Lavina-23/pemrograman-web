<?php

$conn = mysqli_connect("localhost", "root", "", "prakwebdb");

if ($conn->connect_error) {
  die("Koneksi gagal: " . $conn->connect_error);
}

$sql = "CREATE TABLE IF NOT EXISTS pengguna (
    id INT(11) AUTO_INCREMENT PRIMARY KEY,
    username VARCHAR(50) NOT NULL,
    password VARCHAR(50) NOT NULL,
)";

if (mysqli_query($conn, $sql)) {
  echo "Tabel 'pengguna' berhasil dibuat.";
} else {
  echo "Error membuat tabel: " . mysqli_error($conn);
}

$username = "user_baru";
$email = "user@example.com";
$password = "password123";

// Hash password dengan MD5
$hashed_password = md5($password);

// Query untuk menambahkan user baru
$sql = "INSERT INTO user (username, email, password) VALUES ('$username', '$email', '$hashed_password')";

if (mysqli_query($conn, $sql)) {
  echo "User baru berhasil ditambahkan.";
} else {
  echo "Error: " . mysqli_error($conn);
}

$conn->close();
