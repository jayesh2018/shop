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
	<form id='myForm' method='POST' action="#">
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
		<div class="row">
			<div class="col-sm-2" style="margin-left: 10px;margin-top: 5px">
				<p>PICKY</p>
				<label>Color</label><br>
				<input type="radio" id="green1" name="pickycolor" value='["green"]'>
				<label for="green1">Green</label><br>
				<input type="radio" id="red1" name="pickycolor" value='["red"]'>
				<label for="red1">Red</label><br>
				<input type="radio" id="redviolet1" name="pickycolor" value='["red","violet"]'>
				<label for="redviolet1">Red and Violet</label><br>
				<input type="radio" id="greenviolet1" name="pickycolor" value='["green","violet"]'>
				<label for="greenviolet1">Green and Violet</label>
			</div>

			<div class="col-sm-2" style="margin-left: 2px;margin-top: 5px">
				<p>PARITY</p>
				<label>Color</label><br>
				<input type="radio" id="green2" name="paritycolor" value='["green"]'>
				<label for="green2">Green</label><br>
				<input type="radio" id="red2" name="paritycolor" value='["red"]'>
				<label for="red2">Red</label><br>
				<input type="radio" id="redviolet2" name="paritycolor" value='["red","violet"]'>
				<label for="redviolet2">Red and Violet</label><br>
				<input type="radio" id="greenviolet2" name="paritycolor" value='["green","violet"]'>
				<label for="greenviolet2">Green and Violet</label>
			</div>

			<div class="col-sm-2" style="margin-left: 2px;margin-top: 5px">
				<p>SPARE</p>
				<label>Color</label><br>
				<input type="radio" id="green3" name="sparecolor" value='["green"]'>
				<label for="green3">Green</label><br>
				<input type="radio" id="red3" name="sparecolor" value='["red"]'>
				<label for="red3">Red</label><br>
				<input type="radio" id="redviolet3" name="sparecolor" value='["red","violet"]'>
				<label for="redviolet3">Red and Violet</label><br>
				<input type="radio" id="greenviolet3" name="sparecolor" value='["green","violet"]'>
				<label for="greenviolet3">Green and Violet</label>
			</div>


			<div class="col-sm-2" style="margin-left: 2px;margin-top: 5px">
				<p>BACONE</p>
				<label>Color</label><br>
				<input type="radio" id="green4" name="baconecolor" value='["green"]'>
				<label for="green4">Green</label><br>
				<input type="radio" id="red4" name="baconecolor" value='["red"]'>
				<label for="red4">Red</label><br>
				<input type="radio" id="redviolet4" name="baconecolor" value='["red","violet"]'>
				<label for="redviolet4">Red and Violet</label><br>
				<input type="radio" id="greenviolet4" name="baconecolor" value='["green","violet"]'>
				<label for="greenviolet4">Green and Violet</label>
			</div>


		</div>

		<br>
		<div class="row">
			<div class="col-md-2">
				<label for="" style="margin-left: 10px;">Number</label>
				<select name="pickynumber" id="" class="form-control" style="margin-left: 10px;">
					<option value="">Select value</option>
					<option value="0">0</option>
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

			<div class="col-md-2">
				<label for="" style="margin-left: 10px;">Number</label>
				<select name="paritynumber" id="" class="form-control" style="margin-left: 10px;">
					<option value="">Select value</option>
					<option value="0">0</option>
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
			<div class="col-md-2">
				<label for="" style="margin-left: 10px;">Number</label>
				<select name="sparenumber" id="" class="form-control" style="margin-left: 10px;">
					<option value="">Select value</option>
					<option value="0">0</option>
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
			<div class="col-md-2">
				<label for="" style="margin-left: 10px;">Number</label>
				<select name="baconenumber" id="" class="form-control" style="margin-left: 10px;">
					<option value="">Select value</option>
					<option value="0">0</option>
					<option value="0">0</option>
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