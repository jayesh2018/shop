<!DOCTYPE html>
<html>
<head>
<title>Iniesta 4</title>
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
</style>
</head>
<body>
	<h5><center>Modify the name</center></h5>
	<h3><center>Modify the name</center></h1>

<form action="update_name_inc.php" method="post" style="max-width:500px;margin:auto">
  	

  <div class="input-container">
    <i class="fa fa-user icon"></i>
    <input class="input-field" type="text" name="name" placeholder="Please Enter the new name" >
  </div>
  
  
  <button type="submit" class="btn" name="update_name">Submit</button>
</form>

</body>
</html>
