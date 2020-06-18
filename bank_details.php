<?php
session_start();
require('connection.php');


$user_id = $_SESSION['user_id'];

 $select=mysqli_fetch_assoc(mysqli_query($conn,"SELECT * FROM bank_details where user_id='$user_id'"));


         $name           =$select['name'];
         $account        =$select['account'];
         $ifsc            =$select['ifsc'];
         $branch            =$select['branch'];
         $bank           =$select['bank'];
?>





<!DOCTYPE html>
<html>
<head>
	  <meta name="viewport" content="width=device-width, initial-scale=1">
	 <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js"></script>
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.11.2/css/all.css">
	<title> Bank Details</title>
	<style>
		#bank1{
			margin-top: 20px;
			font-size: 30px;
		}


	</style>
</head>
<body>
	<!-- <input type="hidden" id="user_id"> -->

	<div class="col-sm-12">
		<p id="bank1" align="center"><strong>
			MY BANK CARD
		</strong></p>
	</div>

    
    <div class="col-sm-12">
    	<label>Actual Name<span class="text-danger">*</span></label>
    	<input class="form-control txtOnly" type="text" id="name" value="<?php echo $name;?>">
    	
    </div>
    
	
	<div class="col-sm-12"><label>IFSC Code<span class="text-danger">*</span>
	</label><input class="form-control txtOnly" type="text" id="ifsc" value="<?php echo $ifsc; ?>"></div>

	<div class="col-sm-12"><label>Account Number<span class="text-danger">*</span></label><input class="form-control txtOnly" type="text" id="account" value="<?php echo $account ?>"></div>
	
	<div class="col-sm-12"><label>Branch Number<span class="text-danger">*</span></label><input class="form-control txtOnly" type="text" id="branch" value="<?php echo $branch; ?>"></div>
	
	<div class="col-sm-12"><label>Bank Name<span class="text-danger">*</span></label><input class="form-control txtOnly" type="text" id="bank" value="<?php echo $bank; ?>"></div>
	
  <br>
	<div class="col-sm-12">
		<button class="btn btn-primary" id="btn-submit" onclick="submit()" style="width:100%;">Submit</button>
	</div>
   <br>
	<div class="col-sm-12">
		<button class="btn btn-success" style="width:100%;">Delete</button>
	</div>


<script>
	 function submit() {
            

            var name = $('#name').val(),
                ifsc = $('#ifsc').val(),
                account = $('#account').val(),
                branch = $('#branch').val(),
               bank = $('#bank').val(),
               
               

                valid = true;

            

            if (name == '') {
                valid = valid * false;
                $('#name').css('border-bottom', '1px solid red');
            } else {
                valid = valid * true;
                $('#name').css('border-bottom', '1px solid green');
            }
            if (ifsc == '') {
                valid = valid * false;
                $('#ifsc').css('border-bottom', '1px solid red');
            } else {
                valid = valid * true;
                $('#ifsc').css('border-bottom', '1px solid green');
            }
            if (account == '') {
                valid = valid * false;
                $('#account').css('border-bottom', '1px solid red');
            } else {
                valid = valid * true;
                $('#account').css('border-bottom', '1px solid green');
            }
             if (bank == '') {
                valid = valid * false;
                $('#bank').css('border-bottom', '1px solid red');
            } else {
                valid = valid * true;
                $('#bank').css('border-bottom', '1px solid green');
            }
             if (branch == '') {
                valid = valid * false;
                $('#branch').css('border-bottom', '1px solid red');
            } else {
                valid = valid * true;
                $('#branch').css('border-bottom', '1px solid green');
            }
            

            if (valid) {
                // $('#btn-submit').hide();
                var arr = {
                    "name": name,
                    "ifsc": ifsc,
                    "account": account,
                    "branch" : branch,
                    "bank" : bank
                    
                }
                var data = JSON.stringify(arr);
             
                $.ajax({
                    type: "POST",
                    data: {
                    
                        name: name,
                        ifsc: ifsc,
                        account:  account,
                        bank: bank,
                        branch: branch,
                        
                    },
                    url: 'bank_insert.php',
                    success: function (res) {
                        if (res.status == 'success') {
                            alert('Data SuccessFull Save');
                            location.reload();
                        } else {
                            $('#btn-submit').show();
                        }
                    }
                });
            }
        }

</script>


</body>
</html>