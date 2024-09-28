<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Data Dosen</title>
  <style>
    body {
      font-family: Arial, sans-serif;
      background-color: #f0f0f0;
      display: flex;
      justify-content: center;
      align-items: center;
      height: 100vh;
      margin: 0;
    }

    .container {
      background-color: white;
      padding: 20px;
      border-radius: 10px;
      box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
      max-width: 400px;
      width: 100%;
    }

    h1 {
      text-align: center;
      font-size: 24px;
      color: #333;
      margin-bottom: 20px;
    }

    p {
      font-size: 18px;
      color: #555;
      margin: 10px 0;
    }

    p span {
      font-weight: bold;
    }
  </style>
</head>

<body>
  <div class="container">
    <h1>Data Dosen</h1>
    <?php
    $Dosen = [
      'nama' => 'Elok Nur Hamdana',
      'domisili' => 'Malang',
      'jenis_kelamin' => 'Perempuan',
    ];

    echo "<p><span>Nama:</span> $Dosen[nama]</p>";
    echo "<p><span>Domisili:</span> $Dosen[domisili]</p>";
    echo "<p><span>Jenis Kelamin:</span> $Dosen[jenis_kelamin]</p>";
    ?>
  </div>
</body>

</html>