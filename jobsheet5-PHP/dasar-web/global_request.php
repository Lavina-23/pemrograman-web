<html>

<body>
  <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post">
    Name: <input type="text" name="fnama">
    <input type="submit">
  </form>

  <?php
  if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $name = $_REQUEST['fnama'];

    if (empty($name)) {
      echo "Name is empty";
    } else {
      echo $name;
    }
  }
  ?>
</body>

</html>