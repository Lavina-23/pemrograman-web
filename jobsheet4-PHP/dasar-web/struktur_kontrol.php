<?php
$nilaiNumerik = 92;

if ($nilaiNumerik >= 90 && $nilaiNumerik <= 100) {
  echo "Nilai huruf: A";
} else if ($nilaiNumerik >= 80 && $nilaiNumerik < 90) {
  echo "Nilai huruf: B";
} else if ($nilaiNumerik >= 70 && $nilaiNumerik < 80) {
  echo "Nilai huruf: C";
} else if ($nilaiNumerik < 70) {
  echo "Nilai huruf: D";
}

echo "<br>";

$jumlahLahan = 10;
$tanamanPerLahan = 5;
$buahPerTanaman = 10;
$jumlahBuah = 0;

for ($i = 1; $i <= $jumlahLahan; $i++) {
  $jumlahBuah += ($tanamanPerLahan * $buahPerTanaman);
}

echo "Jumlah buah yang akan dipanen adalah: $jumlahBuah<br>";

$skorUjian = [85, 92, 78, 96, 88];
$totalSkor = 0;

foreach ($skorUjian as $skor) {
  $totalSkor += $skor;
}

echo "Total skor ujian: $totalSkor<br>";

$nilaiSiswa = [85, 92, 58, 64, 90, 55, 88, 79, 70, 96];

foreach ($nilaiSiswa as $nilai) {
  if ($nilai < 60) {
    echo "Nilai: $nilai (Tidak Lulus) <br>";
    continue;
  }
  echo "Nilai: $nilai (Lulus) <br>";
}

echo "Ada seorang guru ingin menghitung total nilai dari 10 siswa dalam ujian matematika. Guru ini ingin mengabaikan dua nilai tertinggi dan dua nilai terendah. Bantu guru ini menghitung total nilai yang akan digunakan untuk menentukan nilai rata-rata setelah mengabaikan nilai tertinggi dan terendah. Berikut daftar nilai dari 10 siswa (85, 92, 78, 64, 90, 75, 88, 79, 70, 96)<br>";
$nilaiSiswa2 = [85, 92, 78, 64, 90, 75, 88, 79, 70, 96];
$totalNilai = 0;

sort($nilaiSiswa2); // setelah disort -> [64, 70, 75, 78, 79, 85, 88, 90, 92, 96]

for ($i = 0; $i < count($nilaiSiswa2); $i++) {
  // i = 0 - 9
  // index 0 - 1 -> nilai terendah
  // index 8 - 9 -> nilai tertinggi
  if ($i >  1 && $i < 8) {
    $totalNilai += $nilaiSiswa2[$i];
  }
}

echo "Total nilai: $totalNilai<br>";

$rataRata = $totalNilai / 8;
echo "Nilai rata-rata: $rataRata<br>";

echo "Seorang pelanggan ingin membeli sebuah produk dengan harga Rp 120.000. Toko tersebut menawarkan diskon sebesar 20% untuk pembelian di atas Rp 100.000. Bantu pelanggan ini untuk menghitung harga yang harus dibayar setelah mendapatkan diskon.<br>";
$hargaProduk = 120_000;
$diskon = 0.2;

if ($hargaProduk >= 100_000) {
  $hargaDiskon = ($hargaProduk * $diskon);
}

$totalBayar = $hargaProduk - $hargaDiskon;
echo "Harga yang harus dibayar: Rp $totalBayar<br>";

echo "Seorang pemain game ingin menghitung total skor mereka dalam permainan. Mereka mendapatkan skor berdasarkan poin yang mereka kumpulkan. Jika mereka memiliki lebih dari 500 poin, maka mereka akan mendapatkan hadiah tambahan. Buat tampilan baris pertama “Total skor pemain adalah: (poin)”. Dan baris kedua “Apakah pemain mendapatkan hadiah tambahan? (YA/TIDAK)”<br>";
$poin = 600;

echo "Total skor pemain adalah: $poin<br>";

$hadiah = ($poin > 500) ? "YA" : "TIDAK";
echo "Apakah pemain mendapatkan hadiah tambahan? $hadiah<br>";
