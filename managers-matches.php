<?php include 'header.php';?>

    <h1>Matches</h1>
<table class="table table-striped">
  <thead>
    <tr>
      <th>MatchID</th>
      <th>HomeTeam</th>
      <th>AwayTeam</th>
      <th>HomeTeamCoach</th>
      <th>AwayTeamCoach</th>
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

$sql = "SELECT MatchID, HomeTeam, AwayTeam, s1.LastName as HomeTeamCoach, s2.LastName as AwayTeamCoach 
        from Matches m join SoccerManagers s1 on m.HomeTeam = s1.Club 
        join SoccerManagers s2 on m.AwayTeam = s2.Club
        order by MatchID";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
  // output data of each row
  while($row = $result->fetch_assoc()) {
?>
  <tr>
    <td><?=$row["MatchID"]?></td>
    <td><?=$row["HomeTeam"]?></td>
    <td><?=$row["AwayTeam"]?></td>
    <td><?=$row["HomeTeamCoach"]?></td>
    <td><?=$row["AwayTeamCoach"]?></td>
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