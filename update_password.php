<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
</head>
<body>
<form method="post" action="update_name_inc.php">
  <div class="form-group">
    <label for="exampleInputEmail1">Enter old password</label>
    <input type="text" class="form-control" name="old_password" placeholder="Enter old password">
  </div>
  <div class="form-group">
    <label for="exampleInputEmail1">Enter new password</label>
    <input type="text" class="form-control" name="new_password" placeholder="Enter new password">
  </div>
  <button type="submit" class="btn btn-primary" name="update_password">Submit</button>
</form>
</body>
</html>