<?php include 'header.php';?>

    <h1>Matches</h1>
<table class="table table-striped">
  <thead>
    <tr>
      <th>MatchID</th>
      <th>HomeTeam</th>
      <th>AwayTeam</th>
      <th>HomeTeamGoals</th>
      <th>AwayTeamGoals</th>
      <th>Matchday</th>
    </tr>
  </thead>
  <tbody>
  <?php
$servername = "localhost";
$username = "felixfin_user2";
$password = "O-,GXdw4e3QG";
$dbname = "felixfin_homework3";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}

$var = $_GET['Team'];
if (isset($var)) {
    $sql = "SELECT * from Matches where HomeTeam='$var' OR AwayTeam='$var'";
}
else {
    $sql = "SELECT * from Matches";
}
$result = $conn->query($sql);

if ($result->num_rows > 0) {
  // output data of each row
  while($row = $result->fetch_assoc()) {
?>
  <tr>
    <td><?=$row["MatchID"]?></td>
    <td><?=$row["HomeTeam"]?></td>
    <td><?=$row["AwayTeam"]?></td>
    <td><?=$row["HomeTeamGoals"]?></td>
    <td><?=$row["AwayTeamGoals"]?></td>
    <td><?=$row["Matchday"]?></td>
  </tr>
<?php
  }
} else {
  echo "0 results";
}
$conn->close();
?>
  </tbody>
    </table>

<a class="btn btn-primary" type="button" href="index.php">Go Back</a>

<?php include 'footer.php';?>