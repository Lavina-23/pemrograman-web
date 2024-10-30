<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Hitung Jumlah Digit Bilangan</title>
  <link rel="stylesheet" href="styles.css">
  <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
</head>

<body>
  <div class="container">
    <h2>Hitung Jumlah Digit Bilangan</h2>
    <form id="digitForm">
      <label for="number">Masukkan Angka:</label>
      <input type="number" id="number" name="number" required>
      <br><br>
      <button type="submit">Hitung Digit</button>
    </form>
    <br>
    <h3>Hasil:</h3>
    <div id="result"></div>
  </div>

  <script>
    // Menggunakan jQuery untuk menangani pengiriman form secara AJAX
    $(document).ready(function() {
      $('#digitForm').on('submit', function(event) {
        event.preventDefault(); // Mencegah pengiriman form secara normal

        // Mengambil nilai input angka
        var number = $('#number').val();

        // Mengirim data ke server menggunakan AJAX
        $.ajax({
          url: 'count_digit.php',
          type: 'POST',
          data: {
            number: number
          },
          success: function(response) {
            $('#result').html(response); // Menampilkan hasil di div result
          },
          error: function() {
            alert('Terjadi kesalahan saat memproses data.');
          }
        });
      });
    });
  </script>
</body>

</html>