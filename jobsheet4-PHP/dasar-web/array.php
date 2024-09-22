<?php
$nilaiSiswa = [85, 92, 58, 64, 90, 55, 88, 79, 70, 96];
$nilaiLulus = [];

foreach ($nilaiSiswa as $nilai) {
  if ($nilai >= 70) {
    $nilaiLulus[] = $nilai;
  }
}

echo "Daftar nilai siswa yang lulus: " . implode(", ", $nilaiLulus) . "<br>";

$daftarKaryawan = [
  ['Alice', 7],
  ['Bob', 3],
  ['Charlie', 9],
  ['David', 5],
  ['Eve', 2]
];

$karyawanPengalamanLimaTahun = [];

foreach ($daftarKaryawan as $karyawan) {
  if ($karyawan[1] >= 5) {
    $karyawanPengalamanLimaTahun[] = $karyawan[0];
  }
}

echo "Daftar karyawan dengan pengalaman kerja lebih dari 5 tahun: " . implode(", ", $karyawanPengalamanLimaTahun) . "<br>";

$daftarNilai = [
  'Matematika' => [
    ['Alice', 85],
    ['Bob', 92],
    ['Charlie', 78],
  ],
  'Fisika' => [
    ['Alice', 90],
    ['Bob', 88],
    ['Charlie', 75],
  ],
  'Kimia' => [
    ['Alice', 92],
    ['Bob', 80],
    ['Charlie', 85],
  ]
];

$mataKuliah = 'Fisika';

echo "Daftar nilai mahasiswa dalam mata kuliah $mataKuliah: <br>";

foreach ($daftarNilai[$mataKuliah] as $nilai) {
  echo "Nama: {$nilai[0]}, Nilai: {$nilai[1]}<br>";
}

echo "Seorang guru ingin mencetak daftar nilai siswa dalam ujian matematika. Guru tersebut memiliki data setiap siswa terdrir dari nama dan nilai. Bantu guru ini mencetak daftar nilai siswa yang mencapai nilai di atas rata-rata kelas. Dengan ketentuan nama dan nilai siswa Alice dapat 85, Bob dapat 92, Charlie dapat 78, David dapat 64, Eva dapat 90<br>";

$nilaiMatematika = [
  ['Alice', 85],
  ['Bob', 92],
  ['Charlie', 78],
  ['David', 64],
  ['Eve', 90]
];
$totalNilai = 0;

foreach ($nilaiMatematika as $nilai) {
  $totalNilai += $nilai[1];
}

$rataRata = $totalNilai / 5;

echo "Rata-rata nilai matematika: $rataRata<br>";
echo "Siswa yang memiliki nilai diatas rata-rata: <br>";
foreach ($nilaiMatematika as $nilai) {
  if ($nilaiMatematika[1] > $rataRata) {
    echo "Nama: {$nilai[0]}, dengan Nilai: {$nilai[1]}<br>";
  }
}
