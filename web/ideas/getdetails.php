<?php
//$q = intval($_GET['q']);
require "../library/functions.php";

$db = db_connect();
if (!$db) {
  die('Could not connect: ' . mysqli_error($db));
}

echo $q;
$ideaid = filter_input(INPUT_GET, 'q', FILTER_SANITIZE_NUMBER_INT);

$result = getDetails($ideaid, $db);


echo "<table class='table table-hover'>
<tr>
<th>Gift Name</th>
<th>Price</th>
<th>Description</th>
<th>Image Name</th>
</tr>";
foreach ($result as $row) {
  echo "<tr>";
  echo "<td>" . $row['gift_name'] . "</td>";
  echo "<td>" . $row['price'] . "</td>";
  echo "<td>" . $row['description'] . "</td>";
  echo "<td>" . $row['image_name'] . "</td>";
  echo "</tr>";
}
echo "</table>";
