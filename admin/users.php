<?php 
session_start();
require('../connection.php');
if(!isset($_SESSION['admin']))
{
  echo '<script>
  location.href="login.php";
  </script>';
}

$query = "SELECT user_id,name,MobileNo,is_Active from register_table";
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

</head>

<body>

	<h1 style="margin-top: 15px; text-align: center;"> Users List</h1>

	              
	<div class="col-sm-12">
		<table class="table table-striped table-bordered table-hover dt-responsive" width="100%" id="sample_3" cellspacing="0">
			<thead>
				<tr>
					<!-- <th style="background-color: #006400!important;color: #FFFFFF!important;text-align: center;">ID</th>
					<th style="background-color: #006400!important;color: #FFFFFF!important;text-align: center;" >NAME</th> -->
					
					<th scope="col">Name</th>
					<th scope="col">Mobile No</th>
					<th scope="col">Is Active</th>
				</tr>
			</thead>
			<tbody>
				<?php
				
				
				
				if ($result->num_rows > 0) {
					while ($row = $result->fetch_object()) {
						$msg="Active";$class="badge-success";
            if($row->is_Active==0){
              $msg="InActive";$class="badge-danger";
            }
					
						
						echo "<td>" . $row->name. "</td>";
						echo "<td>" . $row->MobileNo . "</td>";
						echo "<td><span class='badge ".$class."'>".$msg."</span></td></tr>";
					}
				} else {
					echo "<tr><td>None</td><td>None</td><td>None</td></tr>";
				}
				?>
			</tbody>
		</table>
	</div>
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
	<script src="timer.js"></script>
</body>

</html>
