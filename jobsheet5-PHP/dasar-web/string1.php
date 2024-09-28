<?php
$loremipsum = "Lorem ipsum dolor sit amet consectetur adipisicing elit. Deleniti repellat aperiam ratione molestias nesciunt quos temporibus adipisci, rerum et. Porro sunt eveniet totam esse praesentium eius sapiente animi sint est!";

echo "<p>{$loremipsum}</p>";
echo "Panjang karakter: " . strlen($loremipsum) . "<br>";
echo "Panjang kata: " . str_word_count($loremipsum) . "<br>";
echo "<p>" . strtoupper($loremipsum) . "</p>";
echo "<p>" . strtolower($loremipsum) . "</p>";
