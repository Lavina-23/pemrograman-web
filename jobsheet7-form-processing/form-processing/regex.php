<?php

$pattern = '/[a-z]/';
$text = 'This is Sample Text.';

if (preg_match($pattern, $text)) {
  echo "Huruf kecil ditemukan!";
} else {
  echo "Tidak ada huruf kecil!";
}

$pattern = '/[0-9]+/';
$text = 'There are 123 apples.';

if (preg_match($pattern, $text, $matches)) {
  echo "Cocokkan: " . $matches[0];
} else {
  echo "Tidak ada yang cocok!";
}

$pattern2 = '/apple/';
$replacement = 'banana';
$text2 = 'I like apple pie';
$new_text = preg_replace($pattern2, $replacement, $text2);
echo "<br>" . $new_text;


$pattern3 = '/\?/'; // god, good, goood
$text3 = 'god is good.';

if (preg_match($pattern3, $text3, $matches)) {
  echo "<br>Cocokkan: " . $matches[0];
} else {
  echo "Tidak ada yang cocok!";
}
