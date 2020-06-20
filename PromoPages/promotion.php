<?php 
session_start();
require('../connection.php');
if(!isset($_SESSION['user']))
         {

            echo '<script>
        
        location.href="../index.php";
    </script>';
         }

$query = "SELECT B.user_id,C.name,C.MobileNo FROM referral_codes A INNER JOIN referral_codes B ON A.referral_code=B.referred_from INNER JOIN register_table C ON B.user_id = C.user_id where A.user_id=$_SESSION[user_id]";
$result = mysqli_query($conn, $query);
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Promotion Record</title>

    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css"
        integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">

    <link rel="stylesheet" href="style.css">

    <script src="https://kit.fontawesome.com/18dd5346aa.js" crossorigin="anonymous"></script>

</head>

<body>

    <div class="text-center pb-2" style="background-image: -webkit-linear-gradient(rgb(150, 35, 35),rgba(197, 43, 43, 0.897))">
        <h1 class="text-light m-0 py-3">Promotion Record</h1>
    </div>
    <div class="container-fluid py-3">
        <div class="row">
            <div class="col-6">
                <a class="btn btn-dark btn-block" href="">Level 1</a>
            </div>
            <div class="col-6">
                <a class="btn btn-light border border-dark btn-block" href="">Level 2</a>
            </div>
        </div>
    </div>
    <div class="mt-3 text-center text-muted">
        <!-- <p>No More</p> -->
        <table class="table table-striped table-bordered table-hover dt-responsive" width="100%" id="sample_3" cellspacing="0">
			<thead>
				<tr>
					<!-- <th style="background-color: #006400!important;color: #FFFFFF!important;text-align: center;">ID</th>
					<th style="background-color: #006400!important;color: #FFFFFF!important;text-align: center;" >NAME</th> -->
					
					<th scope="col">Name</th>
					<th scope="col">Mobile No</th>
			
				</tr>
			</thead>
			<tbody>
				<?php
				
				
				
				if ($result->num_rows > 0) {
					while ($row = $result->fetch_object()) {
                        echo"<tr>";
						echo "<td>" . $row->name. "</td>";
						echo "<td>" . $row->MobileNo . "</td>";
                        echo"</ tr>";
					}
				} else {
					echo "<tr><td>None</td><td>None</td></tr>";
				}
				?>
			</tbody>
		</table>
    </div>





    <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js"
        integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n"
        crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js"
        integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo"
        crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js"
        integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6"
        crossorigin="anonymous"></script>

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    <script src="./promotion.js"></script>
</body>
</html>