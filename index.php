<?php
$servername = "3306";
$username = "felixfin_user";
$password = "*)q}({hr5#SQ";
$dbname = "felixfin_homework3";
//hallo

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}

$sql = "SELECT Club, Standings FROM Teams";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
  // output data of each row
  while($row = $result->fetch_assoc()) {
    // echo "id: " . $row["id"]. " - Name: " . $row["firstname"]. " " . $row["lastname"]. "<br>";
?>
    <tr>
        <td><?=$row["Club"]?></td>
        <td><?=$row["Standings"]?></td>
    </tr>

<?php
  }
} else {
  echo "0 results";
}
$conn->close();
?>