<!DOCTYPE html>
<html>
<head>
<title>Iniesta 6</title>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<style>
body {font-size: 25px;}
* {box-sizing: border-box;}
form{float: left;}
.input-container {
  
  display: flex;
  width: 1350px;
  margin-bottom: 15px;
}

.icon {
  padding: 10px;
  background: dodgerblue;
  color: white;
  min-width: 50px;
  text-align: center;
}

.input-field {
  width: 1350px;
  padding: 10px;
  outline: none;
  border: none;
  border-bottom: 1px solid grey;
}

.input-field:focus {
  border: 2px solid dodgerblue;
}


.btn {
  background-color: dodgerblue;
  color: white;
  padding: 15px 20px;
  border: none;
  cursor: pointer;
  width: 1350px;
  opacity: 0.9;
  float: left;
}

.btn:hover {
  opacity: 1;
}
p{font-size: 12px; width: 1300px; margin-top: 50px; padding-top: 30px;}
#btn1{float: right; background-color: lightgreen; }
h5{margin-top: 10px;}
</style>
</head>
<body>
	<h5><center>Modify payment password</center></h5>
	<h3><center>Modify payment password</center></h1>

<form action="#" style="max-width:1350px;margin:auto">
  	
  <div class="input-container">
    <i class="fa fa-user icon"></i>
    <input class="input-field" type="text" placeholder="Please enter Mobile number for OTP">
  </div>
  <button id="btn1">Send OTP</button>

  <div class="input-container">
    <i class="fa fa-lock icon"></i>
    <input class="input-field" type="text" placeholder="Please enter the New password" >
  </div>

  <div class="input-container">
    <i class="fa fa-lock icon"></i>
    <input class="input-field" type="text" placeholder="Please confirm the new password" >
  </div>
  
  <button type="submit" class="btn">Submit</button>
  <p>Tip:The transaction password can`t be the same as the login password. The platform will not be responsible for the loss caused by password theft</p>
</form>

</body>
</html>
