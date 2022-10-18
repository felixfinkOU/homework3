<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="initial-scale=1">
    <title>Homework 3</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-gH2yIJqKdNHPEq0n4Mqa/HGKIhSkIHeL5AyhkYV8i59U5AR6csBvApHHNl/vI1Bx" crossorigin="anonymous">
  </head>
  <body>
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
   <div class="card" content="width=500px">
    <div class="card-body">
      <h5 class="card-title"><?=$row["Club"]?></h5>
      <p class="card-text"><ul>
<?php
    $var = $row['Club'];
    $section_sql = "SELECT t.Standings, p.LastName, m.LastName FROM SoccerPlayer as p JOIN Teams as t ON p.Club = t.Club JOIN SoccerManagers as m ON t.Club = m.Club WHERE t.Club='$var'";
    $section_result = $conn->query($section_sql);
    
    while($section_row = $section_result->fetch_assoc()) {
      echo "<li>" . $section_row["Standings"] . "</li>";
      #echo "<li>" . $section_row["Player"] . "</li>";
      #echo "<li>" . $section_row["Manager"] . "</li>";
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