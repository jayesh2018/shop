<?php
require("./../connection.php");

$query = "SELECT Id,name from register_table where Id IN (SELECT customer_id FROM purchased WHERE choice  IN (Select choice from winner order by game_date DESC ))";

// echo $query;
$result = mysqli_query($conn, $query);
?>
<!DOCTYPE html>

<html>

<head>
	<!-- Meta tags -->
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<title>WINNER NAMES</title>
	<!-- Bootstrap css -->
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css" integrity="sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk" crossorigin="anonymous">

	<style>
		.dot {
			height: 25px;
			width: 25px;
			border-radius: 50%;
			display: inline-block;
			margin-right: 5px;
		}

		.green {
			background-color: green;
		}

		.violet {
			background-color: #60c;
		}

		.red {
			background-color: red;
		}
	</style>
</head>

<body>

	<h1 style="margin-top: 15px; text-align: center;"> WINNER LIST</h1>

	               <!-- count down -->
				   <div class="px-2 pt-2">
                        <div class="d-flex justify-content-between">
                            <div class="d-flex flex-column justify-content-center">
                                <h6 class="text-muted">Period</h6>
                                <span>9JGKTNZSDWXS1272</span>
                            </div>
                            <div class="d-flex align-items-center justify-content-center flex-column">
                                <h6 class="text-muted">Count Down</h6>
                                <h3 class="timer"></h3>
                            </div>
                        </div>
                    </div>
					<!-- /count down -->
	<div class="col-sm-12">
		<table class="table table-striped table-bordered table-hover dt-responsive" width="100%" id="sample_3" cellspacing="0">
			<thead>
				<tr>
					<!-- <th style="background-color: #006400!important;color: #FFFFFF!important;text-align: center;">ID</th>
					<th style="background-color: #006400!important;color: #FFFFFF!important;text-align: center;" >NAME</th> -->
					<th scope="col">Color</th>
					<th scope="col">Digit</th>
					<th scope="col">Date</th>
					<th scope="col">Period</th>
				</tr>
			</thead>
			<tbody>
				<?php
				$query = "SELECT * FROM winner_history order by date_added desc";
				// echo $query;
				$result = mysqli_query($conn, $query);
				if ($result->num_rows > 0) {

					while ($row = $result->fetch_assoc()) {
						$myarr = json_decode($row['color']);
						// echo $myarr;
						echo "<td>";
						foreach ($myarr as $value) {
							echo "<span class='dot " . $value . "'></span>";
						}
						echo "</td>";

						// print_r($colors);
						// echo "<td>" . $row['color'] . "</td>";
						echo "<td>" . $row['digit'] . "</td>";
						echo "<td>" . $row['date_added'] . "</td>";
						echo "<td>" . strtotime($row['date_added']) . "</td></tr>";
					}
				} else {
					echo "<tr><td>None</td><td>None</td><td>None</td><td>None</td></tr>";
				}
				?>
			</tbody>
		</table>
	</div>
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
	<script src="timer.js"></script>
</body>

</html>
