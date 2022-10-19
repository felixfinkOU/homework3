<?php include 'header.php';?>

    <h1>Clubs</h1>
<div class="card-group">
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

$sql = "SELECT Club, Standings from Teams";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
  // output data of each row
  while($row = $result->fetch_assoc()) {
?>
   <div class="card" style="min-width:100%;">
    <div class="card-body">
      <h5 class="card-title"><?=$row["Club"]?></h5>
      <p class="card-text"><ul>
<?php
    $var = $row['Club'];
    $section_sql = "SELECT t.Standings, m.FirstName as mFirstName, m.LastName as mLastName FROM Teams as t LEFT JOIN SoccerManagers as m ON t.Club = m.Club WHERE t.Club='$var' GROUP BY t.Club";
    $section_result = $conn->query($section_sql);
    
    while($section_row = $section_result->fetch_assoc()) {
      echo "<li>" . "<b>" . "Standings: " . "</b>" . $section_row["Standings"] . "</li>";
      echo "<li>" . "<b>" . "Manager: " . "</b>" . $section_row["mFirstName"] . " " . $section_row["mLastName"] . "</li>";
        
      $sql_player = "SELECT FirstName, LastName FROM SoccerPlayer WHERE Club='$var'";
      $result_player = $conn->query($sql_player);

      while ($player_row = $result_player->fetch_assoc()) 
      {
                  echo "<li>" . "<b>" . "Player: " . "</b>" . $player_row["FirstName"] . " " . $player_row["LastName"] . "</li>";
      }
    }

?>
      </ul></p>
  </div>
    </div>
<?php
  }
} else {
  echo "0 results";
}
$conn->close();
?>
  </card-group>

<a class="btn btn-primary" type="button" href="index.php">Go Back</a>

<?php include 'footer.php';?>