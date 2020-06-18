<?php
public function walletrecharge_post(){
$arrayRequired=array('amount','transaction_id');
$var=$this->getErrorMsg($arrayRequired,$this->data);
$post=$this->data;
$this->checkaccess();
 
$user_id=$this->checkaccess()[0]['id'];


$amount=$post['amount'];

$transaction_id=$post['transaction_id'];
$date = date("d/m/Y");


$data=['user_id'=>$user_id,"amount"=>$amount,'transaction_id'=>$transaction_id,'date'=>$date];

$response=$this->Restapi_model->walletrecharge_post($data);

if($response!='') 
		{
			
			$data=array(
				"statusCode" => 200, 
				"APICODERESULT"  => "Data Insert Succesfully",
				"result" => $response
				);
			$this->response($data, 200);
			//echo json_encode($response);
		}
		else{	
			$data=array(
				"statusCode" => 300, 
				"APICODERESULT"  => "Something went wrong!"
				);
			$this->response($data, 200);
			//echo json_encode($response);
		}
    
}

public function walletgateway_post(){
$arrayRequired=array('amount');
$var=$this->getErrorMsg($arrayRequired,$this->data);
$post=$this->data;
$this->checkaccess();
 
$user_id=$this->checkaccess()[0]['id'];


$amount=$post['amount'];





$data=['user_id'=>$user_id,"amount"=>$amount];

$response=$this->Restapi_model->walletgateway_post($data);

if($response!='') 
		{
			
			$data=array(
				"statusCode" => 200, 
				"APICODERESULT"  => "Data Insert Succesfully"
				
				);
			$this->response($data, 200);
			//echo json_encode($response);
		}
		else{	
			$data=array(
				"statusCode" => 300, 
				"APICODERESULT"  => "Something went wrong!"
				);
			$this->response($data, 200);
			//echo json_encode($response);
		}
    
}


public function wallethistoryget_post(){

$this->checkaccess();
 
$user_id=$this->checkaccess()[0]['id'];





$response=$this->Restapi_model->wallethistoryget_post($user_id);

if($response!='') 
		{
			
			$data=array(
				"statusCode" => 200, 
				"APICODERESULT"  => "Data Fetched Succesfully",
				"result" => $response
				);
			$this->response($data, 200);
			//echo json_encode($response);
		}
		else{	
			$data=array(
				"statusCode" => 300, 
				"APICODERESULT"  => "Something went wrong!"
				);
			$this->response($data, 200);
			//echo json_encode($response);
		}
    
}
public function  walletdetails_post(){



$this->checkaccess();
 
$user_id=$this->checkaccess()[0]['id'];

$response=$this->Restapi_model->walletdetails_post($user_id);

if($response!='') 
		{
			
			$data=array(
				"statusCode" => 200, 
				"APICODERESULT"  => "Data Fetch Succesfully",
			         
				);
			$this->response($response, 200);
			//echo json_encode($response);
		}
		else{	
			$data=array(
				"statusCode" => 300, 
				"APICODERESULT"  => "Something went wrong!",
	
				);
			$this->response($response, 200);
			//echo json_encode($response);
		}

}

?>