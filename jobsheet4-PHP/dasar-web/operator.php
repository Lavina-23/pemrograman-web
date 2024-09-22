<?php
$a = 10;
$b = 5;

$hasilTambah = $a + $b;
$hasilKurang = $a - $b;
$hasilKali = $a * $b;
$hasilBagi = $a / $b;
$sisaBagi = $a % $b;
$pangkat = $a ** $b;

echo "Hasil Tambah: {$hasilTambah}<br>";
echo "Hasil Kurang: {$hasilKurang}<br>";
echo "Hasil Kali: {$hasilKali}<br>";
echo "Hasil Bagi: {$hasilBagi}<br>";
echo "Hasil Sisa Bagi: {$sisaBagi}<br>";
echo "Pangkat: {$pangkat}<br>";

$hasilSama = $a == $b;
$hasilTidakSama = $a != $b;
$hasilLebihKecil = $a < $b;
$hasilLebihBesar = $a > $b;
$hasilLebihKecilAtauSama = $a <= $b;
$hasilLebihBesarAtauSama = $a >= $b;

echo "Hasil Sama: {$hasilSama}<br>";
echo "Hasil Tidak Sama: {$hasilTidakSama}<br>";
echo "Hasil Lebih Kecil: {$hasilLebihKecil}<br>";
echo "Hasil Lebih Besar: {$hasilLebihBesar}<br>";
echo "Hasil Lebih Kecil Atau Sama: {$hasilLebihKecilAtauSama}<br>";
echo "Hasil Lebih Besar Atau Sama: {$hasilLebihBesarAtauSama}<br>";

$hasilAnd = $a && $b;
$hasilOr = $a || $b;
$hasilNotA = !$a;
$hasilNotB = !$b;

echo "Hasil operator AND: {$hasilAnd}<br>";
echo "Hasil operator OR: {$hasilOr}<br>";
echo "Hasil operator NOT A: {$hasilNotA}<br>";
echo "Hasil operator NOT B: {$hasilNotB}<br>";

$a = 10;
$b = 5;

$a += $b;
echo "Hasil operator +=: {$a}<br>";

$a = 10;
$a -= $b;
echo "Hasil operator -=: {$a}<br>";

$a = 10;
$a *= $b;
echo "Hasil operator *=: {$a}<br>";

$a = 10;
$a /= $b;
echo "Hasil operator /=: {$a}<br>";

$a = 10;
$a %= $b;
echo "Hasil operator %=: {$a}<br>";

$hasilIdentik = $a === $b;
$hasilTidakIdentik = $a !== $b;

echo "Hasil operator ===: {$hasilIdentik}<br>";
echo "Hasil operator !==: {$hasilTidakIdentik}<br>";

echo "Sebuah restoran memiliki 45 kursi di dalamnya. Pada suatu malam, 28 kursi telah ditempati oleh pelanggan.<br>Berapa persen kursi yang masih kosong di restoran tersebut?<br>";

$kursi = 45;
$kursiKosong = 28;
$persenKursiKosong = ($kursi - $kursiKosong) / $kursi * 100;

echo "Persen kursi yang masih kosong di restoran tersebut: {$persenKursiKosong}%<br>";
