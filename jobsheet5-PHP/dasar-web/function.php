<?php
function perkenalan($nama, $salam = "Assalamualaikum")
{
  echo $salam . ", ";
  echo "Perkenalkan, nama saya " . $nama . "<br>";
  echo "Senang berkenalan dengan Anda<br>";
}

perkenalan("Lavina", "Hallo");
echo "<hr>";

$saya = "Mima";
$ucapanSalam = "Selamat pagi";
perkenalan($saya);
