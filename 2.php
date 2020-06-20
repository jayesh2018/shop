<!DOCTYPE html>
<html>
<head>
	<title>Iniesta 2</title>
	<style type="text/css">
		select{width: 1300px; padding-top: 5px; padding-bottom: 5px; border: none; border-bottom: 1px solid black;}
		input{margin-top: 15px; width: 1300px; padding-top: 5px; padding-bottom: 5px; border: none; border-bottom: 1px solid black;}
		#des{width: 1300px; height: 100px; resize: none; bo}
		#tel{border: none; border-bottom: 1px solid black;}
		#submit{background-color: green; padding-bottom: 15px; padding-top: 15px; color: white;}
		h5{float: right; margin-top: 1px;}

	</style>
</head>
<body>
<form action="#">
	<p><center>Complaints & Suggestions</center></p>
	<h1><center>Add New</center></h1>
	
	<select name="Type" id="Type">
	<option value="Type">Type</option>
  	<option value="one">One</option>
  	<option value="two">Two</option>
  	<option value="three">Three</option>
  	<option value="four">Four</option>
	</select>
	<h3>OutId<input type="textbox" placeholder="Trade No. cause the problem"></h3>
	<h3>Description</h3>
	<textarea id="des" type="textbox" placeholder="Describe your problems" maxlength="500" rows="5" cols="10" required></textarea>
	<h3>WhatsApp<input id="tel" type="tel" placeholder="Whatsapp to contact you" required></h3>
	<input id="submit" type="submit">
	<h3>Service</h3>
	<h5>10:00-17:00, Monday - Friday about 1-5 business days.</h5>
</form>
</body>
</html>