<?php
require('../connection.php');

if($_POST['id']!="")
{
    $id=mysqli_real_escape_string($conn,$_POST['id']);
    $updateid=mysqli_real_escape_string($conn,$_POST['updateid']);
	$arr=array();


	$result=mysqli_query($conn,"update withdrawl_request set  status='$id' where user_id='$updateid'");
	if($result>0)
	{
        $arr['status']=1;
          $msg="Accepted";$class="badge-success";
        if($id==2){
          $msg="Rejected";$class="badge-danger";
        }
        $arr['html']="<span class='badge ".$class."'>".$msg."</span>";
       
	}
	else
	{
		$arr['status']=0;
	}

}
header('Content-Type:application/json');
echo json_encode($arr);
 ?>