<?php include 'header.php';?>

    <h1>Teams</h1>
<table class="table table-striped">
  <thead>
    <tr>
      <th>Club</th>
      <th>Standings</th>
    </tr>
  </thead>
  <tbody>
    
  <?php include 'server_connection.php';?>
  
    <?php
$sql = "SELECT Club, Standings FROM Teams";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
  // output data of each row
  while($row = $result->fetch_assoc()) {
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
  </tbody>
    </table>

<?php include 'footers.php';?>