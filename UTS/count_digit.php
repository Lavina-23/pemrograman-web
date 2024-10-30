<?php
if (isset($_POST['number'])) {
  $number = $_POST['number'];

  // Menghitung jumlah digit dengan mengabaikan tanda minus jika ada
  $digitCount = strlen(str_replace('-', '', $number));

  // Menampilkan hasil
  echo "Angka $number memiliki $digitCount digit.";
} else {
  echo "Silakan masukkan angka yang valid.";
}
