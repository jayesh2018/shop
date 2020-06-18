<?php 
require ("connection.php");

$query = "SELECT * FROM winner_history";

// echo $query;
$result = mysqli_query($conn, $query);
?>
<!DOCTYPE html>

<html>
<head>
	<!-- Meta tags -->
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<title>WINNER HISTORY</title>
	<!-- Bootstrap css -->
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css" integrity="sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk" crossorigin="anonymous">
	
</head>
<body>

	<h1 style="margin-top: 15px; text-align: center;"> WINNER LIST</h1>
	<div class="col-sm-12">
		<table class="table table-striped table-bordered table-hover dt-responsive" width="100%" id="sample_3" cellspacing="0" width="50%">
			<thead>
				<tr>
				<th style="background-color: #FF3C33!important;color: #FFFFFF!important;">ID</th>
				<th style="background-color: #FF3C33!important;color: #FFFFFF!important;">COLOR</th>
				<th style="background-color: #FF3C33!important;color: #FFFFFF!important;">DIGIT</th>
				<th style="background-color: #FF3C33!important;color: #FFFFFF!important;">DATE</th>  


					
				</tr>
			</thead>
			<tbody>
				<?php
				if ($result->num_rows > 0) {
					$i=1;
					while($row = $result->fetch_assoc()) {
						echo "<tr><td>". $i++ . "</td>";
						echo "<td>". $row['color'] . "</td>";
						echo "<td>". $row['digit'] . "</td>";
						echo "<td>". $row['date_added'] . "</td></tr>";
					}
				}else {
					echo "<tr><td>None</td>";
					echo "<td>None</td></tr>";
				}
				?>
			</tbody> 
		</table>
	</div>
	
</body>
</html>