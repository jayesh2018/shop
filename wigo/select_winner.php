<!DOCTYPE html>
<html>
<head>
	<!-- Meta tags -->
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<title>WINNER DISPLAY</title>
	<!-- Bootstrap css -->
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css" integrity="sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk" crossorigin="anonymous">

</head>
<body>
<form id='myForm'>
	<h1 style="text-align: center;">RESULT DISPLAY</h1>
	<!-- Count down -->
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
		<div class="col-md-6" style="margin-left: 2px;margin-top: 5px;">
			<label for="">Color</label>
			<select name="color" id="" class="form-control">
				<option value="">Select value</option>
				<option value='["green"]'>Green</option>
				<option value='["red"]'>Red</option>
				<option value='["red","violet"]'>Red and Violet</option>
				<option value='["green","violet"]'>Green and Violet</option>
			</select>
		</div>

		<br>
		<br>
		<div class="col-md-6">
			<label for="">Number</label>
			<select name="number" id="" class="form-control">
				<option value="">Select value</option>
				<option value="1">1</option>
				<option value="2">2</option>
				<option value="3">3</option>
				<option value="4">4</option>
				<option value="5">5</option>
				<option value="6">6</option>
				<option value="7">7</option>
				<option value="8">8</option>
				<option value="9">9</option>
			</select>
		</div>
	</div>
	<br>
	<br>
	<div class="col-sm-12">
		<button class="btn btn-primary">Submit</button>
	</div>
</form>

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
	<script src="winner.js"></script>
	<script src="timer.js"></script>
</body>
</html>