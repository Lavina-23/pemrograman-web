# Jobsheet 8 : File Upload

**Nama :** Lavina<br>
**NIM :** 2342760062<br>
**Kelas :** SIB 2D<br>

### **Praktikum Bagian 1. Upload File**

`form_upload.php`

```php
<!DOCTYPE html>
<html lang="en">

<head>
  <title>File Upload</title>
</head>

<body>
  <form action="upload.php" method="post" enctype="multipart/form-data">
    <input type="file" name="fileToUpload" id="fileToUpload">
    <input type="submit" name="submit" value="Upload File">
  </form>
</body>

</html>
```

`upload.php`

```php
<?php

if (isset($_POST["submit"])) {
  $targetDirectory = "uploads/";
  $targetFile = $targetDirectory . basename($_FILES['fileToUpload']['name']);

  if (move_uploaded_file($_FILES["fileToUpload"]["name"])) {
    echo "File berhasil diunggah."
  } else {
    echo "Gagal mengunggah file."
  }
}
```

**Hasil Percobaan**<br>
![hasil](/img/image.png)<br>
![hasil](/img/image-3.png)<br>
![hasil](/img/image-4.png)<br>

**Pertanyaan 1.1:** Apa yang anda pahami dari script pada file tersebut. Catat di bawah ini pemahaman anda. <br>

Atribut `enctype="multipart/form-data"` pada form memungkinkan pengiriman file seperti gambar atau dokumen. Di dalam `upload.php`, pengecekan dilakukan untuk memastikan tombol submit ditekan, kemudian folder tujuan penyimpanan file ditentukan. Nama file diperoleh menggunakan `$_FILES`, dan file dipindahkan dengan `move_uploaded_file`, mengakses `temporary name` untuk mencegah konflik. Jika pemindahan berhasil, pesan "File berhasil diunggah" ditampilkan; jika gagal, pesan "Gagal mengunggah file" muncul. Awalnya terjadi error karena folder tujuan belum dibuat, tetapi setelah folder dibuat, upload berhasil.
<br>

`upload.php`

```php
<?php

if (isset($_POST["submit"])) {
  $targetDirectory = "uploads/";
  $targetFile = $targetDirectory . basename($_FILES['fileToUpload']['name']);
  $fileType = strtolower(pathinfo($targetFile, PATHINFO_EXTENSION));

  $allowedExtensions = array("jpg", "jpeg", "png", "gif");
  $maxFileSize = 5 * 1024 * 1024;

  if (in_array($fileType, $allowedExtensions) && $_FILES["fileToUpload"]["size"] <= $maxFileSize) {
    if (move_uploaded_file($_FILES['fileToUpload']['tmp_name'], $targetFile)) {
      echo "File berhasil diunggah.";
    } else {
      echo "Gagal mengunggah file.";
    }
  } else {
    echo "File tidak valid atau melebihi ukuran maksimum yang diizinkan.";
  }
}
```

**Hasil Percobaan**<br>
![hasil](/img/image-6.png)<br>
![hasil](/img/image-5.png)<br>

**Pertanyaan 1.2:** Apa yang anda pahami dari penggunaan isset pada file tersebut. Catat di bawah ini pemahaman anda. <br>

Pada file `upload.php`, ditambahkan validasi tipe file dan ukuran maksimum. Tipe file diperoleh dengan `strtolower(pathinfo($targetFile, PATHINFO_EXTENSION));` dan disimpan dalam variabel `$fileType`, lalu tipe yang diizinkan disimpan dalam array `$allowedExtensions`. Ukuran maksimum file ditetapkan dalam variabel `$maxFileSize`. Jika tipe file sesuai dan ukuran tidak melebihi batas, file akan dipindahkan dan pesan “File berhasil diunggah” ditampilkan. Jika file tidak valid atau melebihi ukuran maksimum, muncul pesan “File tidak valid atau melebihi ukuran maksimum yang diizinkan.” <br>

**Pertanyaan 1.3:** Tambahkan script langkah 5 untuk membuat file gambar thumbnail dengan ukuran lebar 200 dan tinggi mengikuti perubahan secara otomatis. Catat di sini apa yang anda amati dari penambahan kode program di atas. <br>

`upload.php`

```php
<?php

if (isset($_POST["submit"])) {
  $targetDirectory = "uploads/";
  $fileType = strtolower(pathinfo($targetFile, PATHINFO_EXTENSION));

  $allowedExtensions = array("txt", "pdf", "doc", "docx");
  $maxFileSize = 10 * 1024 * 1024;

  if (in_array($fileType, $allowedExtensions) && $_FILES["fileToUpload"]["size"] <= $maxFileSize) {
    if (move_uploaded_file($_FILES['fileToUpload']['tmp_name'], $targetFile)) {
      echo "File berhasil diunggah.";
    } else {
      echo "Gagal mengunggah file.";
    }
  } else {
    echo "File tidak valid atau melebihi ukuran maksimum yang diizinkan.";
  }
}
```

**Hasil Percobaan**<br>
![hasil](/img/image-8.png)<br>
![hasil](/img/image-7.png)<br>

**Pertanyaan 1.4:** Apa yang anda pahami dari penggunaan script tersebut. Catat di bawah ini pemahaman anda. <br>

Kode program menambahkan input untuk menerima file dokumen (txt, doc, docx, pdf) yang dikirim ke `upload.php`. Di `upload.php`, ditambahkan variabel untuk membatasi ukuran file. Saat file diupload, dilakukan pengecekan tipe dan ukuran file agar sesuai batas yang ditentukan. Jika file berhasil dipindahkan ke folder yang disiapkan, akan muncul pesan “Dokumen berhasil diunggah.” Jika gagal, muncul pesan “Gagal mengunggah dokumen.” Jika file tidak memenuhi tipe atau ukuran yang diperbolehkan, akan muncul pesan “Jenis dokumen tidak valid atau melebihi ukuran maksimum yang diizinkan.” <br>

### **Praktikum 2. Multi Upload File**

`form_multiupload.php`

```php
<!DOCTYPE html>
<html lang="en">

<head>
  <title>Multiupload Dokumen</title>
</head>

<body>
  <h2>Unggah Dokumen</h2>
  <form action="upload_process.php" method="post" enctype="multipart/form-data">
    <input type="file" name="files[]" multiple="multiple" accept=".pdf,.doc,.docx">
    <input type="submit" value="Unggah">
  </form>
</body>

</html>
```

`upload_process.php`

```php
<?php

$targetDirectory = "documents/";

if (!file_exists($targetDirectory)) {
  mkdir($targetDirectory, 0777, true);
}

if ($_FILES['files']['name'][0]) {
  $totalFile = count($_FILES['files']['name']);

  for ($i = 0; $i < $totalFile; $i++) {
    $fileName = $_FILES['files']['name'][$i];
    $targetFile = $targetDirectory . $fileName;

    if (move_uploaded_file($_FILES['files']['tmp_name'][$i], $targetFile)) {
      echo "File $fileName berhasil diunggah.<br>";
    } else {
      echo "Gagal mengunggah file $fileName.<br>";
    }
  }
} else {
  echo "Tidak ada file yang diunggah";
}
```

**Hasil Percobaan**<br>
![hasil](/img/image-9.png)<br>
![hasil](/img/image-10.png)><br>
![hasil](/img/image-11.png)<br>

**Pertanyaan 2.1:** Apa yang anda pahami dari penggunaan empty pada file tersebut. Catat di bawah ini pemahaman anda. <br>

Pada studi kasus ini, dibuat form dengan input file yang bisa menerima banyak file sekaligus dengan menambahkan atribut `multiple` dan `accept` (contoh: `accept=".pdf, .doc, .docx"`). Di `proses_upload.php`, variabel untuk folder target dan daftar ekstensi yang diterima disiapkan. Jika folder target belum ada, maka folder akan dibuat. Setiap file yang diupload dicek ekstensinya dan dipindahkan ke folder target. Jika berhasil, tampil pesan “File [NAMA FILE] berhasil diunggah”; jika ada ekstensi yang tidak sesuai, tampil pesan “Gagal mengunggah file [nama file].” <br>

**Pertanyaan 2.2:** Buat seperti langkah 3 dengan multi upload khusus gambar. Catat di sini apa yang anda amati dari kode program di atas. <br>

`form_multiupload.php`

```php
<!DOCTYPE html>
<html lang="en">

<head>
  <title>Multiupload Dokumen</title>
</head>

<body>
  <h2>Unggah Dokumen</h2>
  <form action="upload_process.php" method="post" enctype="multipart/form-data">
    <input type="file" name="files[]" multiple="multiple" accept=".jpg,.jpeg,.png,.gif">
    <input type="submit" value="Unggah">
  </form>
</body>

</html>
```

**Hasil Percobaan**<br>
![hasil](/img/image-12.png)<br>

### **Praktikum Bagian 3: Upload File dengan PHP dan Jquery**

`form_upload_ajax.php`

```php
<!DOCTYPE html>
<html lang="en">

<head>
  <title>Unggah File Dokumen</title>
</head>

<body>
  <form id="form-ajax" action="upload_ajax.php" method="post" enctype="multipart/form-data">
    <input type="file" name="file" id="file">
    <input type="submit" name="submit" value="Unggah">
  </form>
  <div id="status"></div>

  <script src="https://code.jquery.com/jquery-3.7.1.min.js" integrity="sha256-/JqT3SQfawRcv/BIHPThkBvs0OEvtFFmqPF/lYI/Cxo=" crossorigin="anonymous"></script>
  <script src="upload.js"></script>
</body>

</html>
```

`upload.js`

```js
$(document).ready(function () {
  $("#form-ajax").submit(function (e) {
    e.preventDefault();

    var formData = new FormData(this);

    $.ajax({
      type: "POST",
      url: "upload_ajax.php",
      data: formData,
      cache: false,
      contentType: false,
      processData: false,
      success: function (response) {
        $("#status").html(response);
      },
      error: function () {
        $("#status").html("Terjadi kesalahan saat mengunggah file.");
      },
    });
  });
});
```

`upload_ajax.php`

```php
<?php

if (isset($_FILES['file'])) {
  $errors = array();
  $file_name = $_FILES['file']['name'];
  $file_size = $_FILES['file']['size'];
  $file_tmp = $_FILES['file']['tmp_name'];
  $file_type = $_FILES['file']['type'];
  @$file_ext = strtolower("" . end(explode('.', $_FILES['file']['name'])) . "");
  $extensions = array("pdf", "doc", "docx", "txt");

  if (in_array($file_ext, $extensions) === false) {
    $errors[] = "Ekstensi file yang diizinkan adalah PDF, DOC, DOCX atau TXT.";
  }

  if ($file_size > 2097152) {
    $errors[] = "Ukuran file tidak boleh lebih dari 2MB";
  }

  if (empty($errors) == true) {
    move_uploaded_file($file_tmp, "documents/" . $file_name);
    echo "File berhasil diunggah.";
  } else {
    echo implode(" ", $errors);
  }
}
```

**Hasil Percobaan**<br>
![hasil](/img/image-14.png)<br>
![hasil](/img/image-13.png)<br>

**Pertanyaan 3.1:** Apa yang anda pahami dari penggunaan form pada file tersebut. Catat di bawah ini pemahaman anda. <br>

**Pertanyaan 3.2:** Apa yang anda pahami dari penggunaan form pada file tersebut. Catat di bawah ini pemahaman anda. <br>

### **Praktikum Bagian 4. Menghias Upload File**

`form_upload_ajax.php`

```php
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>HTML Aman</title>
</head>

<body>
  <form action="html_aman.php" method="post">
    <label for="input">Input : </label>
    <input type="text" name="input" id="input"></input>
    <input type="submit" value="Submit">
  </form>
</body>

</html>

<?php
$input = $_POST["input"] ?? '';
$input = htmlspecialchars($input, ENT_QUOTES, 'UTF-8');
echo $input;
?>
```

**Hasil Percobaan**<br>
![hasil](/img/image-15.png)<br>
![hasil](/img/image-16.png)<br>
![hasil](/img/image-17.png)<br>

**Pertanyaan 4.1:** Apa yang anda pahami dari script pada file tersebut. Catat di bawah ini pemahaman anda. <br>

Pada praktikum diatas, diberikan styling tambahan pada file `upload.css`. Di `upload.css`, ditambahkan atribut `opacity` untuk mengubah warna tombol `Unggah` ketika diakses. Di `upload.js`, ditambahkan atribut `disabled` pada tombol `Unggah` ketika file tidak diupload. Pada `upload.php`, ditambahkan validasi apakah file yang diupload bertipe `txt`, `pdf`, `doc`, atau `docx`. Jika bertipe yang tidak diizinkan, maka akan ditampilkan pesan kesalahan.
