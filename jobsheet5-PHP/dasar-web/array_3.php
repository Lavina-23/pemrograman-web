<!DOCTYPE html>
<html lang="en">

<head>
  <link rel="stylesheet" type="text/css" href="style.css">
</head>

<body>
  <h2>Multidimensional Array</h2>
  <table>
    <tr>
      <th>Judul Film</th>
      <th>Tahun</th>
      <th>Rating</th>
    </tr>

    <?php
    $movie = array(
      array("Interstellar", "2014", "9.3"),
      array("The Dark Knight", "2008", "9.0"),
      array("The Godfather", "1972", "9.2"),
      array("Pulp Fiction", "1994", "8.9"),
    );
    echo "<tr>";
    echo "<td>" . $movie[0][0] . "</td>";
    echo "<td>" . $movie[0][1] . "</td>";
    echo "<td>" . $movie[0][2] . "</td>";
    echo "</tr>";

    echo "<tr>";
    echo "<td>" . $movie[1][0] . "</td>";
    echo "<td>" . $movie[1][1] . "</td>";
    echo "<td>" . $movie[1][2] . "</td>";
    echo "</tr>";

    echo "<tr>";
    echo "<td>" . $movie[2][0] . "</td>";
    echo "<td>" . $movie[2][1] . "</td>";
    echo "<td>" . $movie[2][2] . "</td>";
    echo "</tr>";

    echo "<tr>";
    echo "<td>" . $movie[3][0] . "</td>";
    echo "<td>" . $movie[3][1] . "</td>";
    echo "<td>" . $movie[3][2] . "</td>";
    echo "</tr>"
    ?>
  </table>
</body>

</html>