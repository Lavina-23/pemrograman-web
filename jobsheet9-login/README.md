# Jobsheet 9 : Login, Cookies, Session

**Nama :** Lavina<br>
**NIM :** 2342760062<br>
**Kelas :** SIB 2D<br>

### **Praktikum Bagian 1. Upload File**

**Pertanyaan 1:** Tunjukkan hasil screenshot isi tabel user <br>

![hasil](/img/image.png)<br>

**Pertanyaan 2:** Tuliskan query untuk membuat tabel user menggunakan fungsi mysqli_query() <br>

`koneksi.php`

```php
<?php

$conn = mysqli_connect("localhost", "root", "", "prakwebdb");

if ($conn->connect_error) {
  die("Koneksi gagal: " . $conn->connect_error);
}

$sql = "CREATE TABLE IF NOT EXISTS pengguna (
    id INT(11) AUTO_INCREMENT PRIMARY KEY,
    username VARCHAR(50) NOT NULL,
    password VARCHAR(50) NOT NULL,
)";

if (mysqli_query($conn, $sql)) {
  echo "Tabel 'pengguna' berhasil dibuat.";
} else {
  echo "Error membuat tabel: " . mysqli_error($conn);
}

$conn->close();
```

**Pertanyaan 3:** Tuliskan query untuk memasukkan dan ke tabel user menggunakan fungsi mysqli_query() <br>

`koneksi.php`

```php
$username = "user_baru";
$email = "user@example.com";
$password = "password123";

$hashed_password = md5($password);

$sql = "INSERT INTO user (username, email, password) VALUES ('$username', '$email', '$hashed_password')";

if (mysqli_query($conn, $sql)) {
    echo "User baru berhasil ditambahkan.";
} else {
    echo "Error: " . mysqli_error($conn);
}
```

### **Praktikum 2. Login Single User**

`loginForm.html`

```html
<!DOCTYPE html>
<html lang="en">
  <head>
    <title>Login</title>
  </head>

  <body>
    <form action="login_process.php" method="post">
      <table>
        <tr>
          <td>Username</td>
          <td><input type="text" name="username" size="20" /></td>
        </tr>
        <tr>
          <td>Password</td>
          <td><input type="password" name="password" id="20" /></td>
        </tr>
        <tr>
          <td>&nbsp;</td>
          <td><input type="submit" name="Login" value="Proses" /></td>
        </tr>
      </table>
    </form>
  </body>
</html>
```

`login_process.php`

```php
<?php

include "koneksi.php";

$username = $_POST['username'];
$password = md5($_POST['password']);

$query = "SELECT * FROM user WHERE username='$username' AND password='$password'";
$result = mysqli_query($conn, $query);
$check = mysqli_num_rows($result);

if ($check) {
  echo "Anda berhasil login, silakan menuju "; ?>
  <a href="home_admin.html">Halaman HOME</a>
<?php
} else {
  echo "Anda gagal login. Silakan "; ?>
  <a href="loginForm.html">Login Kembali</a>
<?php
  echo mysqli_errno($conn);
}
```

`home_admin.html`

```html
<html>
  <head></head>
  <body>
    <h2>Ini halaman admin</h2>
  </body>
</html>
```

**Pertanyaan 4:** Lakukan login dengan mengetikkan username dan password yang datanya belum tersimpan di database. Jelaskan hasil pengamatanmu <br>

**Hasil Percobaan**<br>
![hasil](/img/image-3.png)<br>
![hasil](/img/image-4.png)<br>

Karena data username dan password belum tersimpan di database, maka tidak bisa masuk ke halaman admin.

**Pertanyaan 5:** Lakukan login dengan mengetikkan username dan password yang datanya sudah tersimpan di database. Jelaskan hasil pengamatanmu <br>

**Hasil Percobaan**<br>
![hasil](/img/image-1.png)<br>
![hasil](/img/image-2.png)<br>

Karena data username dan password tersedia di database, maka bisa masuk ke halaman admin. <br>

### **Praktikum Bagian 3: Menambahkan Kolom pada Tabel**

**Pertanyaan 6:** Amati hasil yang ditampilkan dan jelaskan hasil pengamatanmu <br>

![hasil](/img/image-5.png)<br>
![hasil](/img/image-6.png)<br>

Pada praktikum diatas ditambahkan kolom level yang nantinya akan mengatur hak akses pada setiap user berdasarkan levelnya. <br>

**Pertanyaan 7:** Tunjukkan hasil screenshot isi tabel user <br>

![hasil](/img/image-7.png)<br>

### **Praktikum Bagian 4. Login Multiuser**

`login_multi_process.php`

````html
`loginForm.html` ```html
<!DOCTYPE html>
<html lang="en">
  <head>
    <title>Login</title>
  </head>

  <body>
    <form action="login_multi_process.php" method="post">
      <table>
        <tr>
          <td>Username</td>
          <td><input type="text" name="username" size="20" /></td>
        </tr>
        <tr>
          <td>Password</td>
          <td><input type="password" name="password" id="20" /></td>
        </tr>
        <tr>
          <td>&nbsp;</td>
          <td><input type="submit" name="Login" value="Proses" /></td>
        </tr>
      </table>
    </form>
  </body>
</html>
````

`login_multi_process.php`

```php
<?php

include "koneksi.php";

$username = $_POST['username'];
$password = md5($_POST['password']);

$query = "SELECT * FROM user WHERE username='$username' AND password='$password'";
$result = mysqli_query($conn, $query);
$row = mysqli_fetch_assoc($result);

if ($row['level'] == 1) {
  echo "Anda berhasil login, silakan menuju "; ?>
  <a href="home_admin.html">Halaman HOME</a>
<?php
} else if ($row['level'] == 2) {
  echo "Anda berhasil login, silakan menuju "; ?>
  <a href="home_guest.html">Halaman HOME</a>
<?php
} else {
  echo "Anda gagal login. Silakan "; ?>
  <a href="loginForm.html">Login Kembali</a>
<?php
  echo mysqli_errno($conn);
}
```

`home_guest.html`

```html
<html>
  <head></head>
  <body>
    <h2>Ini halaman guest</h2>
  </body>
</html>
```

**Pertanyaan 8:** Lakukan login dengan mengetikkan data admin. Jelaskan hasil pengamatanmu <br>

![hasil](/img/image-1.png)<br>
![hasil](/img/image-9.png)<br>
![hasil](/img/image-2.png)<br>

Pada praktikum diatas pada prosesnya kita mengecek level dari user yang login, jika levelnya adalah level 1, maka akan diarahkan ke halaman admin. <br>

**Pertanyaan 9:** Lakukan login dengan mengetikkan data guest. Jelaskan hasil pengamatanmu <br>

![hasil](/img/image-8.png)<br>
![hasil](/img/image-9.png)<br>
![hasil](/img/image-10.png)<br>

Pada praktikum diatas pada prosesnya kita mengecek level dari user yang login, jika levelnya adalah level 2, maka akan diarahkan ke halaman guest.

**Pertanyaan 10:** Lakukan login dengan mengetikkan username dan password yang tidak tersimpan di database. Jelaskan hasil pengamatanmu <br>

![hasil](/img/image-3.png)<br>
![hasil](/img/image-11.png)<br>

Pada praktikum diatas karena username dan password tidak tersedia maka terjadi error ketika sistem ingin mengecek levelnya.

### **Praktikum Bagian 5. Membuat Cookies**

`cookiesCreate.php`

```php
<?php
setcookie('user', 'Polinema', time() + 3600);
```

`cookiesCall.php`

```php
<?php
echo $_COOKIE['user'];
```

**Pertanyaan 11:** Amati dan jelaskan hasil pengamatanmu <br>

![hasil](/img/image-12.png)<br>

Karena cookies dengan key `user` belum dibuat maka muncul error. <br>

**Pertanyaan 12:** Amati dan jelaskan hasil yang ditampilkan. <br>

![hasil](/img/image-13.png)<br>

Cookies dibuat dengan menjalankan file `cookiesCreate.php`. Pada file tersebut, kita mendefinisikan key `user` dengan nilai `Polinema` sehingga saat kita membuka halaman `cookiesCall.php`, maka akan muncul `Polinema`. <br>

Restart komputer anda <br>
Setelah komputer menyala, nyalakan kembali Apache pada XAMPP <br>

**Pertanyaan 13:** Amati dan jelaskan hasil yang ditampilkan <br>

![hasil](/img/image-13.png)<br>

Cookiesnya masih tersimpan setelah komputer direstart karena cookiesnya masih tersimpan di browser dengan rentang waktu yang telah ditentukan. <br>

### **Praktikum Bagian 6. Menghapus Nilai Cookies**

`cookiesDel.php`

```php
<?php
setcookie('user', 'Polinema', time() - 3600);
```

**Pertanyaan 14:** Amati dan jelaskan hasil yang ditampilkan <br>

![hasil](/img/image-12.png)<br>

Pada praktikum diatas, kita membuat agar waktu cookiesnya kurang dari waktu yang ditentukan sehingga browser menghapus cookies yang telah dibuat sebelumnya. <br>

### **Praktikum Bagian 7. Penerapan Cookies pada Fitur Keranjang Belanja**

`formBeli.html`

```html
<html>
  <head></head>
  <body>
    <form action="prosesBeli.php" method="post">
      <p>
        Jumlah novel yang dibeli:
        <input type="text" name="beliNovel" value="0" size="2" />
      </p>
      <p>
        Jumlah Buku Teks yang dibeli:
        <input type="text" name="beliBuku" value="0" size="2" />
      </p>
      <input type="submit" />
    </form>
  </body>
</html>
```

`prosesBeli.php`

```php
<?php
if (isset($_POST['beliNovel']) && isset($_POST['beliBuku'])) {
  setcookie('beliNovel', $_POST['beliNovel']);
  setcookie('beliBuku', $_POST['beliBuku']);
  header('location:cart.php');
}
```

`cart.php`

```php
<html>

<head></head>

<body>
  <h2>Keranjang Belanja</h2>
  <?php
  $beliNovel = $_COOKIE['beliNovel'];
  $beliBuku = $_COOKIE['beliBuku'];

  echo 'Jumlah Novel: ' . $beliNovel . '<br>';
  echo 'Jumlah Buku: ' . $beliBuku . '<br>';
  ?>
</body>

</html>
```

**Pertanyaan 15:** Amati dan jelaskan hasil yang ditampilkan <br>

![hasil](/img/image-14.png)<br>

Terjadi error undifined array key karena tidak ada nilai yang ditentukan pada key `beliNovel` dan `beliBuku`. <br>

**Pertanyaan 16:** Amati dan jelaskan hasil yang ditampilkan <br>

![hasil](/img/image-15.png)<br>
![hasil](/img/image-16.png)<br>

Karena nilai yang ditentukan pada key `beliNovel` dan `beliBuku` sudah diisi pada formnya, maka jumlah novel dan bukunya bisa ditampilkan. <br>

Tutup browser kemudian buka kembali browser kemudian jalankan kembali kode program<br>

**Pertanyaan 17:** Amati dan jelaskan hasil yang ditampilkan <br>

![hasil](/img/image-14.png)<br>

Muncul error karena cookiesnya tidak diatur untuk disimpan berapa lama. <br>

### **Praktikum Bagian 8. Membuat Session**

`sessionCreate.php`

```php
<?php
session_start();
?>

<!DOCTYPE html>
<html lang="en">

<body>
  <?php
  $_SESSION['favcolor'] = 'green';
  $_SESSION['favanimal'] = 'cat';
  echo 'Session variable are set.'
  ?>
</body>

</html>
```

`sessionCall.php`

```php
<?php
session_start();
?>

<!DOCTYPE html>
<html lang="en">

<body>
  <?php
  echo "Favorite color is:" . $_SESSION['favcolor'] . '<br>';
  echo "Favorite animal is:" . $_SESSION['favanimal'] . '<br>';
  ?>
</body>

</html>
```

**Pertanyaan 18:** Amati dan jelaskan hasil yang ditampilkan <br>

![hasil](/img/image-17.png)<br>
![hasil](/img/image-18.png)<br>
![hasil](/img/image-19.png)

Pada praktikum diatas, awalnya terjadi error karena session belum dibuat. Setelah session dibuat maka muncul hasil yang ditampilkan yaitu berupa favorite color dan favorite animal. <br>

### **Praktikum Bagian 9. Menghapus Nilai Session**

`sessionDel.php`

```php
<?php
session_start();
?>

<!DOCTYPE html>
<html lang="en">

<body>
  <?php
  session_unset();
  session_destroy();

  echo 'All session variables are now removed, and the session is destroyed';
  ?>
</body>

</html>
```

**Pertanyaan 19:** Amati dan jelaskan hasil yang ditampilkan <br>

![hasil](/img/image-20.png)<br>
![hasil](/img/image-17.png)<br>

Pada praktikum diatas, kita menghapus session yang sudah dibuat dengan fungsi `session_unset()` dan `session_destroy()`. <br>

### **Praktikum Bagian 10. Penerapan Session pada Fitur Login**

`sessionLoginForm.php`

```php
<html>

<head></head>

<body>
  <form action="sessionLoginProcess.php" method="post">
    <table>
      <tr>
        <td>Username</td>
        <td><input type="text" name="username" size="20"></td>
      </tr>
      <tr>
        <td>Password</td>
        <td><input type="password" name="password" size="20"></td>
      </tr>
      <tr>
        <td>&nbsp;</td>
        <td><input type="submit" name="Login" value="Log In"></td>
      </tr>
    </table>
  </form>
</body>

</html>
```

`sessionLoginProcess.php`

```php
<?php
include "koneksi.php";

$username = $_POST['username'];
$password = md5($_POST['password']);


$sql = "SELECT * FROM user WHERE username='$username' and password='$password'";
$result = mysqli_query($conn, $sql);
$check = mysqli_num_rows($result);

if ($check > 0) {
  session_start();
  $_SESSION['username'] = $username;
  $_SESSION['status'] = 'login';
?>
  Anda berhasil login, silakan menuju
  <a href="homeSession.php">Halaman Home</a>
<?php
} else {
?>
  Gagal login, silakan login lagi
  <a href="sessionLoginForm.html">Halaman Login</a>
<?php
  echo mysqli_error($conn);
}
?>
```

`homeSession.php`

```php
<html>

<head></head>

<body>
  <?php
  session_start();

  if ($_SESSION['status'] == 'login') {
    echo "Selamat datang " . $_SESSION['username'];
  ?>
    <br> <a href="sessionLogout.php">Log Out</a>
  <?php
  } else {
    echo "Anda belum login, silakan " ?>
    <a href="sessionLoginForm.html">Log In</a>
  <?php
  }
  ?>
</body>

</html>
```

`sessionLogout.php`

```php
<?php
session_start();
session_destroy();

echo "Anda berhasil log out";
```

**Pertanyaan 20:** Amati dan jelaskan hasil yang ditampilkan <br>
**Pertanyaan 21:** Jelaskan urutan proses dari login hingga logout (sebutkan juga urutan file yang diproses) <br>

Pertama kita mengakses file `sessionLoginForm.php` dan masuk dengan username dan password yang sudah dibuat sebelumnya. <br>
![hasil](/img/image-1.png)<br>

Login diproses dengan file `sessionLoginProcess.php`, kemudian kita akan diarahkan ke halaman `homeSession.php`. <br>
![hasil](/img/image-9.png)<br>

Pada halaman `homeSession.php`, kita akan menampilkan username yang sudah login, dan memilih logout.<br>
![hasil](/img/image-21.png)<br>

Logout dijalankan dengan file `sessionLogout.php`, kemudian kita akan diarahkan ke halaman `sessionLoginForm.php`. <br>
![hasil](/img/image-22.png)<br>
