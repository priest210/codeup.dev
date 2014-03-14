<?php
    require_once('mysqli_connect.php');

    // query to get parks **** Fetch Assoc******

    // use  GET 
    $result = $mysqli->query("SELECT * from national_parks order by name");

    // loop through parks

   
    // send to table

?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>National Parks of the United States</title>

        <link href="css/spacelab-bootstrap.css" rel="stylesheet">
        <link rel="stylesheet" href="/css/spacelab-bootstrap.css">
  </head>
  <body>
    <h1>National Parks</h1>

    <table class="table table-striped table-hover ">
  <thead>
    <tr>
      <th><a href="">Name</a></th>
      <th><a href="">Location</a></th>
      <th><a href="">Description</a></th>
      <th><a href="">Date Established</a></th>
      <th><a href="">Area(in acres)</a></th>
    </tr>
  </thead>
  <tbody>
<?php
	// Loop through away
	
  	while ($row = $result->fetch_assoc()) {
		  echo "<tr>";
		  echo "<td>" . $row['name'] . "</td>";
		  echo "<td>" . $row['location'] . "</td>";
		  echo "<td>" . $row['description'] . "</td>";
		  echo "<td>" . $row['date_established'] . "</td>";
		  echo "<td>" . $row['area_in_acres'] . "</td>";
		  echo "</tr>";
    }

?>
  </tbody>
</table>

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.0/jquery.min.js"></script>
    <!-- Include all compiled plugins (below), or include individual files as needed -->
    <script src="js/bootstrap.min.js"></script>
  </body>
</html>




