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