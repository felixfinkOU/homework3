<?php include 'header.php';?>

<h1>Teams</h1>
<div>
  <a class="btn btn-primary" type="button" href="matches.php">Show Matches</a>
  <a class="btn btn-primary" type="button" href="soccer_managers.php">Show Managers</a>
  <a class="btn btn-primary" type="button" href="soccer_players.php">Show Players</a>
  <a class="btn btn-primary" type="button" href="managers-matches.php">Show Managers-Matches Join</a>
</div>
<br></br>
<div>
  <strong>Filter players by position:</strong>
  <form action="filter_players.php" method="post">
  Position: <input type="text" name="position"><br>
  <input type="submit">
  </form>
</div>
<br></br>
<table class="table table-striped">
  <thead>
    <tr>
      <th>Club</th>
      <th>Standings</th>
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
    
$sql = "SELECT Club, Standings FROM Teams";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
  // output data of each row
  while($row = $result->fetch_assoc()) {
?>
  <tr>
    <a href="matches.php?id=<?=$row["Club"]?>"><?=$row["Club"]?></a>
    <!-- <td><?=$row["Club"]?></td> -->
    <td><?=$row["Standings"]?></td>
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

<?php include 'footers.php';?>