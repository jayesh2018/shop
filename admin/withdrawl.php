<?php 
session_start();
require('../connection.php');
if(!isset($_SESSION['admin']))
{
  echo '<script>
  location.href="login.php";
  </script>';
}
$query = "SELECT register_table.user_id,register_table.name,withdrawl_request.amount,withdrawl_request.status FROM withdrawl_request INNER JOIN register_table ON register_table.user_id = withdrawl_request.user_id group by withdrawl_request.user_id order by register_table.user_id";
$result = mysqli_query($conn, $query);

?>
<html>
    <head>
        <title>Withdrawl</title>
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css" integrity="sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk" crossorigin="anonymous">
    <style>
    .my-custom-scrollbar {
        position: relative;
        height:500px;
        overflow: auto;
        }
        .table-wrapper-scroll-y {
        display: block;
        }
}
    </style>
    </head>
    <body>
        <div class="container text-center p-4">
            <h2>Withdrawl Request</h2>

        </div>
        <div class="container">
            <div class="table-wrapper-scroll-y my-custom-scrollbar"> 
                <table class="table table-hover table-bordered table-striped text-center">
                    <thead>
                      <tr>
                        
                        <th scope="col">Username</th>
                        <th scope="col">Amount</th>
                        <th scope="col">Status</th>
                        <th scope="col">Action</th>
                        
                        
                      </tr>
                    </thead>
                    <tbody>
                    <?php
				if ($result->num_rows > 0) {

					while($row = $result->fetch_object()) {
            $msg="Pending";$class="badge-warning";
            if($row->status==1)
            {
              $msg="Accepted";$class="badge-success";
            }
            if($row->status==2){
              $msg="Rejected";$class="badge-danger";
            }
            

            $status="<span class='badge ".$class."'>".$msg."</span>";
            ?>
            <tr>
                            <td><?=$row->name;?></td>
                            <td><?=$row->amount;?></td>
                            <td id="tdchng_<?=$row->user_id;?>" ><?=$status;?> </td>
                            <td><button type="button" class="btn btn-success Req" data-updateid="<?=$row->user_id;?>" data-id="1">Allow</button> &nbsp <button type="button" class="btn btn-danger Req" data-id="2" data-updateid="<?=$row->user_id;?>">Deny</button></td>
                          </tr>
            <?php
          }}
          ?>
                        <!-- <tr>
                            <td>Mark</td>
                            <td>1000</td>
                            <td><button type="button" class="btn btn-success">Allow</button> &nbsp <button type="button" class="btn btn-danger">Deny</button></td>
                          </tr>
                          <tr>
                            <td>Sergy</td>
                            <td>400000</td>
                            <td><button type="button" class="btn btn-success">Allow</button> &nbsp <button type="button" class="btn btn-danger">Deny</button></td>
                          </tr>
                          <tr>
                            <td>Larry </td>
                            <td>2000</td>
                            <td><button type="button" class="btn btn-success">Allow</button> &nbsp <button type="button" class="btn btn-danger">Deny</button></td>
                          </tr>
                          <tr>
                            <td>Mark</td>
                            <td>1000</td>
                            <td><button type="button" class="btn btn-success">Allow</button> &nbsp <button type="button" class="btn btn-danger">Deny</button></td>
                          </tr>
                          <tr>
                            <td>Sergy</td>
                            <td>400000</td>
                            <td><button type="button" class="btn btn-success">Allow</button> &nbsp <button type="button" class="btn btn-danger">Deny</button></td>
                          </tr>
                          <tr>
                            <td>Larry </td>
                            <td>2000</td>
                            <td><button type="button" class="btn btn-success">Allow</button> &nbsp <button type="button" class="btn btn-danger">Deny</button></td>
                          </tr>
                      <tr>
                        <td>Mark</td>
                        <td>1000</td>
                        <td><button type="button" class="btn btn-success">Allow</button> &nbsp <button type="button" class="btn btn-danger">Deny</button></td>
                      </tr>
                      <tr>
                        <td>Sergy</td>
                        <td>400000</td>
                        <td><button type="button" class="btn btn-success">Allow</button> &nbsp <button type="button" class="btn btn-danger">Deny</button></td>
                      </tr>
                      <tr>
                        <td>Larry </td>
                        <td>2000</td>
                        <td><button type="button" class="btn btn-success">Allow</button> &nbsp <button type="button" class="btn btn-danger">Deny</button></td>
                      </tr>
                      <tr>
                        <td>Mark</td>
                        <td>1000</td>
                        <td><button type="button" class="btn btn-success">Allow</button> &nbsp <button type="button" class="btn btn-danger">Deny</button></td>
                      </tr>
                      <tr>
                        <td>Sergy</td>
                        <td>400000</td>
                        <td><button type="button" class="btn btn-success">Allow</button> &nbsp <button type="button" class="btn btn-danger">Deny</button></td>
                      </tr>
                      <tr>
                       
                        <td>Larry </td>
                        <td>2000</td>
                        <td><button type="button" class="btn btn-success">Allow</button> &nbsp <button type="button" class="btn btn-danger">Deny</button></td>
                      </tr>
                      <tr>
                       
                        <td>Sergy</td>
                        <td>400000</td>
                        <td><button type="button" class="btn btn-success">Allow</button> &nbsp <button type="button" class="btn btn-danger">Deny</button></td>
                      </tr>
                      <tr>
                       
                        <td>Sergy</td>
                        <td>400000</td>
                        <td><button type="button" class="btn btn-success">Allow</button> &nbsp <button type="button" class="btn btn-danger">Deny</button></td>
                      </tr>
                      <tr>
                       
                        <td>Sergy</td>
                        <td>400000</td>
                        <td><button type="button" class="btn btn-success">Allow</button> &nbsp <button type="button" class="btn btn-danger">Deny</button></td>
                      </tr>
                      <tr>
                       
                        <td>Sergy</td>
                        <td>400000</td>
                        <td><button type="button" class="btn btn-success">Allow</button> &nbsp <button type="button" class="btn btn-danger">Deny</button></td>
                      </tr> -->
                    </tbody>
                  </table>
            </div>
           
        </div>

        
<script src="https://code.jquery.com/jquery-3.2.1.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js" integrity="sha384-OgVRvuATP1z7JjHLkuOU7Xw704+h835Lr+6QL9UvYjZE3Ipu6Tp75j7Bh/kR0JKI" crossorigin="anonymous"></script>
<script>
$(document).ready(function(){

  $('.Req').click(function(){
    var id=$(this).data('id');
    var updateid=$(this).data('updateid');
    var req=$('.Req');
    //update_status_withdraw.php
    req.prop('disabled',true);
    $.ajax({
      url:"update_status_withdraw.php",
      type:"post",
      data:{id:id,updateid:updateid},
      success:function(data){
        
        if(data.status==1)
        {
          req.prop('disabled',false);
          $('#tdchng_'+updateid).html(data.html);
        }
      }

      });
  });

});
</script>
    </body>
</html>
