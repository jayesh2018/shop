 <?php


  //---------->>>>>>>>>>>>> error check <<<<<<<<<<<<<<--------------//
  function getErrorMsg($required=array(), $request=array())
  { 
    $notExist = true;
    foreach($required as $value)
    {  
      if(array_key_exists($value, $request))
      {    
        if($request[$value]=="")
        {     
          $data = array(
            "statusCode"=> 400,
            "APICODERESULT"=>"FAILED",
            "error_string"=>$value." is empty."
            ); 
          $this->response($data, 200);
          //echo json_encode($data);
          exit; 
        } 
      }
      else
      { 
        $data = array(
          "statusCode"=> 400,
          "APICODERESULT"=>"FAILED",
          "error_string"=>$value. " key is missing."
          ); 
        $this->response($data, 200);
        //echo json_encode($data);
        exit;   
      }  
    } 
    return $notExist; 
  }




//for usertoken
function checkaccess(){

$headers = apache_request_headers();
//print_r($headers);exit;
$token=$headers['token'];
// if($token!=""){
    

$select=$this->db->select('id')
                 ->where('token',$token)
                   ->get('register_table'); 
                 // ->get('company_details');

if($select->num_rows()>0){
  $result=$select->result_array();

  return $result;

}else{
$data=["error_string"=>'Unauthorized Access',"error_code"=>AUTH_ERROR];
$this->response($data, 201);
exit;
}
    

}


//for govttoken

function checkaccess2(){

$headers = apache_request_headers();
//print_r($headers);exit;
$token2=$headers['token'];
// if($token!=""){
    

$select=$this->db->select('id')
                 ->where('token',$token2)
                   ->get('govt_details'); 
                 // ->get('company_details');

if($select->num_rows()>0){
  $result=$select->result_array();

  return $result;

}else{
$data2=["error_string"=>'Unauthorized Access',"error_code"=>AUTH_ERROR];
$this->response($data2, 201);
exit;
}
    

}






//for companytoken
function checkaccess1(){

$headers = apache_request_headers();
//print_r($headers);exit;
$token1=$headers['token'];
// if($token!=""){
    

$select=$this->db->select('id')
                 ->where('token',$token1)
                   // ->get('register')  
                 ->get('company_details');

if($select->num_rows()>0){
  $result=$select->result_array();

  return $result;

}else{
$data1=["error_string"=>'Unauthorized Access',"error_code"=>AUTH_ERROR];
$this->response($data1, 201);
exit;
}
    

}




//////////////companylogin with otp//////////
public function company_login_post(){

$arrayRequired=array('mobile');

 $var=$this->getErrorMsg($arrayRequired,$this->data);
  $post=$this->data;
  $todaydate=date("Y-m-d h:i:s");
    $random=new common();
    $token1 =$random->generateRandomString();
   $mobile=$post['mobile'];

   $otp=rand(1000,9999);
    $gettoken = $token1;
//  $sms=sendsms($mobile, '<#> serveondoor: Your code is '.$otp."\n".'6VHAEeanaGq');
 
 $check=substr(strval(sendsms($mobile, '<#> majdurapp: Your code is '.$otp."\n".'6VHAEeanaGq')),0,12);

 if($check=="SMS-SHOOT-ID"){

   $data=["mobile"=>$mobile,"otp"=>$otp,"login_time"=>$todaydate,"token"=>$token1,'status'=>"1"];

$response=$this->Restapi_model->company_login($data);

    if ($response == 0) 
    {
      $data=array(
        "statusCode" => 401, 
        "APICODERESULT"  => ".Please try again."
        );

      $this->response($data, 200);
      //echo json_encode($data);
    }

    else
    { 
      $data=array(
        "statusCode" => 200, 
        "APICODERESULT"  => "Otp send successfully.",
        "data" =>$data,
        "result" => $response,
        

        );
      $this->response($data, 200);
      //echo json_encode($data);
    }
}else{
     $data=array(
        "statusCode" => 400, 
        "APICODERESULT"  => "Otp send failed.",
    

        );
      $this->response($data, 400);
      //echo json_encode($data);
    
}
}
//GOVT login
public function govt_login_post(){

$arrayRequired=array('mobile');

 $var=$this->getErrorMsg($arrayRequired,$this->data);
  $post=$this->data;
  $todaydate=date("Y-m-d h:i:s");
    $random=new common();
    $token2 =$random->generateRandomString();
   $mobile=$post['mobile'];

   $otp=rand(1000,9999);
    $gettoken = $token2;
//  $sms=sendsms($mobile, '<#> serveondoor: Your code is '.$otp."\n".'6VHAEeanaGq');
 
 $checksubstr(strval(sendsms($mobile, '<#> majdurapp: Your code is '.$otp."\n".'6VHAEeanaGq')),0,12);

 if($check=="SMS-SHOOT-ID"){

   $data=["mobile"=>$mobile,"otp"=>$otp,"login_time"=>$todaydate,"token"=>$token2,'status'=>"1"];

$response=$this->Restapi_model->govt_login($data);

    if ($response == 0) 
    {
      $data=array(
        "statusCode" => 401, 
        "APICODERESULT"  => ".Please try again."
        );

      $this->response($data, 200);
      //echo json_encode($data);
    }

    else
    { 
      $data=array(
        "statusCode" => 200, 
        "APICODERESULT"  => "Otp send successfully.",
        "data" =>$data,
        "result" => $response,
        

        );
      $this->response($data, 200);
      //echo json_encode($data);
    }
}else{
     $data=array(
        "statusCode" => 400, 
        "APICODERESULT"  => "Otp send failed.",
    

        );
      $this->response($data, 400);
      //echo json_encode($data);
    
}
}


////////LOgin With OTP///////////////////////
public function login_post(){

$arrayRequired=array('mobile');

 $var=$this->getErrorMsg($arrayRequired,$this->data);
  $post=$this->data;
  $todaydate=date("Y-m-d g:i:s");
    $random=new common();
    $token =$random->generateRandomString();
   $mobile=$post['mobile'];

   $otp=rand(1000,9999);
    $gettoken = $token;
//  $sms=sendsms($mobile, '<#> serveondoor: Your code is '.$otp."\n".'6VHAEeanaGq');
 
 $check=substr(strval(sendsms($mobile, '<#> majdurapp: Your code is '.$otp."\n".'6VHAEeanaGq')),0,12);

 if($check=="SMS-SHOOT-ID"){

   $data=["mobile"=>$mobile,"otp"=>$otp,"login_time"=>$todaydate,"token"=>$token,'status'=>"1"];

$response=$this->Restapi_model->login($data);

    if ($response == 0) 
    {
      $data=array(
        "statusCode" => 401, 
        "APICODERESULT"  => ".Please try again."
        );

      $this->response($data, 200);
      //echo json_encode($data);
    }

    else
    { 
      $data=array(
        "statusCode" => 200, 
        "APICODERESULT"  => "Otp send successfully.",
        "data" =>$data,
        "result" => $response,
        

        );
      $this->response($data, 200);
      //echo json_encode($data);
    }
}else{
     $data=array(
        "statusCode" => 400, 
        "APICODERESULT"  => "Otp send failed.",
    

        );
      $this->response($data, 400);
      //echo json_encode($data);
    
}
}

/////////////////////OTPMATCH////////////////////////////
public function otpmatch_post(){

$arrayRequired=array('otp','mobile');
$var=$this->getErrorMsg($arrayRequired,$this->data);
$post=$this->data;

// $this->checkaccess();
 
// $user_id=$this->checkaccess()[0]['id'];




$otp=$post['otp'];
$mobile=$post['mobile'];

$data=['otp'=>$otp,'mobile'=>$mobile];

$response=$this->Restapi_model->otp($data);

    if ($response == 0) 
    {
      $data=array(
        "statusCode" => 401, 
        "APICODERESULT"  => ".Otp Not Match."
        );

      $this->response($data, 200);
      //echo json_encode($data);
    }

    else
    { 
      $data=array(
        "statusCode" => 200, 
        "APICODERESULT"  => "Login  Succesfully.",
        "result" => $response

        );
      $this->response($data, 200);
      //echo json_encode($data);
    }


}



////////////////////Home/////////////////////////
public function Home_get(){
    
 $response=$this->Restapi_model->Home_get();
// echo json_encode($response);


if($response!='') 
    {
      
      $data=array(
        "statusCode" => 300, 
        "APICODERESULT"  => "Data fetch Succesfully"
        );
      $this->response($response, 200);
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


/////////////////Catergory fetch  process//////////////////////
public function category_post(){


$response=$this->Restapi_model->categorylist();
//echo json_encode($response);


if($response!='') 
    {
      
      $data=array(
        "statusCode" => 300, 
        "APICODERESULT"  => "Data fetch Succesfully"
        );
      $this->response($response, 200);
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
/////////////////Catergory fetch limit 6 process//////////////////////
public function categorylimit_post(){


$response=$this->Restapi_model->categorylimit_post();
//echo json_encode($response);


if($response!='') 
    {
      
      $data=array(
        "statusCode" => 300, 
        "APICODERESULT"  => "Data fetch Succesfully",
        
        );
      $this->response($response, 200);
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


///////////// subcategory fetch base of cat_id//////////
public function subcategory_post(){
$arrayRequired=array('cat_id');
$var=$this->getErrorMsg($arrayRequired,$this->data);
$post=$this->data;


$cat_id=$post['cat_id'];

$response=$this->Restapi_model->subcategory_post($cat_id);
//echo json_encode($response);


if($response!='') 
    {
      
      $data=array(
        "statusCode" => 300, 
        "APICODERESULT"  => "Data fetch Succesfully"
        );
      $this->response($response, 200);
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




/////////////offer_post fetch process///////////
public function offer_post(){

$response=$this->Restapi_model->offer_post();


if($response!='') 
    {
      
      $data=array(
        "statusCode" => 300, 
        "APICODERESULT"  => "Data fetch Succesfully"
        
        );
      $this->response($response, 200);
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

/////////////product fetch process///////////
public function product_post(){

$arrayRequired=array('pro_id');
$var=$this->getErrorMsg($arrayRequired,$this->data);
$post=$this->data;

$pro_id=$post['pro_id'];

$response=$this->Restapi_model->product_post($pro_id);


if($response!='') 
    {
      
      $data=array(
        "statusCode" => 300, 
        "APICODERESULT"  => "Data fetch Succesfully"
        );
      $this->response($response, 200);
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


/////////////////cart add process//////////////////////
public function  cart_post(){


$arrayRequired=array('sub_id','package_id','product_price','cat_id');
$var=$this->getErrorMsg($arrayRequired,$this->data);
$post=$this->data;

$this->checkaccess();
 
$user_id=$this->checkaccess()[0]['id'];

$sub_id=$post['sub_id'];
$cat_id=$post['cat_id'];
$package_id=$post['package_id'];
$product_price=$post['product_price'];
$quantity=1;
$status=1;

$data=["user_id"=>$user_id,'sub_id'=>$sub_id,'package_id'=>$package_id,'product_price'=>$product_price,'quantity'=>$quantity,'cat_id'=>$cat_id,'status'=>$status];

$response=$this->Restapi_model->cart($data);

if($response!='') 
    {
      
      $data=array(
        "statusCode" => 200, 
        "APICODERESULT"  => "Data Insert Succesfully",
        "quantity" =>$response[0]['quantity']
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

public function cartdelete_post(){


$arrayRequired=array('sub_id','package_id','cat_id');
$var=$this->getErrorMsg($arrayRequired,$this->data);
$post=$this->data;

$this->checkaccess();
 
$user_id=$this->checkaccess()[0]['id'];

$sub_id=$post['sub_id'];
$cat_id=$post['cat_id'];
$package_id=$post['package_id'];
// $product_price=$post['product_price'];
// $quantity=1;
// $status=1;

$data=["user_id"=>$user_id,'sub_id'=>$sub_id,'package_id'=>$package_id,'cat_id'=>$cat_id];

$response=$this->Restapi_model->cartdelete_post($data);

if($response!='') 
    {
      
      $data=array(
        "statusCode" => 200, 
        "APICODERESULT"  => "Data deleted Succesfully",
        "quantity" =>$response
        );
      $this->response($data, 200);
      //echo json_encode($response);
    }
    else{ 
      $data=array(
        "statusCode" => 300, 
        "APICODERESULT"  => "Something went wrong!",
        "quantity" =>$response
        );
      $this->response($data, 200);
      //echo json_encode($response);
    }

}


public function cartfetch1_post(){


$arrayRequired=array('cat_id');
$var=$this->getErrorMsg($arrayRequired,$this->data);
$post=$this->data;

$this->checkaccess();
 
$user_id=$this->checkaccess()[0]['id'];

$cat_id=$post['cat_id'];


$data=["user_id"=>$user_id,'cat_id'=>$cat_id];

$response=$this->Restapi_model->cartfetch1_post($data);


if($response!='') 
    {
      
      $data=array(
        "statusCode" => 200, 
        "APICODERESULT"  => "Data Fetch Succesfully",
      
            "result"=>$response
        );
      $this->response($data, 200);
      //echo json_encode($response);
    }
    else{ 
      $data=array(
        "statusCode" => 300, 
        "APICODERESULT"  => "Something went wrong!",
      "result"=>$response
        );
      $this->response($data, 200);
      //echo json_encode($response);
    }

}
public function cartfetch_post(){


$arrayRequired=array('cat_id');
$var=$this->getErrorMsg($arrayRequired,$this->data);
$post=$this->data;

$this->checkaccess();
 
$user_id=$this->checkaccess()[0]['id'];

$cat_id=$post['cat_id'];
1;

$data=["user_id"=>$user_id,'cat_id'=>$cat_id];

$response=$this->Restapi_model->cartfetch_post($data);

if($response!='') 
    {
      
      $data=array(
        "statusCode" => 200, 
        "APICODERESULT"  => "Data Fetch Succesfully",
        // "total_price"=>$response[0]['product_price'],
            "result"=>$response
        );
      $this->response($data, 200);
      //echo json_encode($response);
    }
    else{ 
      $data=array(
        "statusCode" => 300, 
        "APICODERESULT"  => "Something went wrong!",
      "result"=>$response
        );
      $this->response($data, 200);
      //echo json_encode($response);
    }

}


//insert address
public function  address_post(){


$arrayRequired=array('location','streetinfo','name','mobile','address_type','lat','longt');
$var=$this->getErrorMsg($arrayRequired,$this->data);
$post=$this->data;

$this->checkaccess();
 
$user_id=$this->checkaccess()[0]['id'];
$location=$post['location'];
$streetinfo=$post['streetinfo'];
$name=$post['name'];
$mobile=$post['mobile'];
$lat=$post['lat'];
$longt=$post['longt'];
$address_type=$post['address_type'];
$status=1;

$data=["user_id"=>$user_id,'location'=>$location,'streetinfo'=>$streetinfo,'name'=>$name,'mobile'=>$mobile,'address_type'=>$address_type,'lat'=>$lat,'longt'=>$longt,'status'=>$status];

$response=$this->Restapi_model->address_post($data);

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

public function alladdress_post(){


$post=$this->data;


$this->checkaccess();
 
$user_id=$this->checkaccess()[0]['id'];

$response=$this->Restapi_model->alladdress_post($user_id);
//echo json_encode($response);


if($response!='') 
    {
      
      $data=array(
        "statusCode" => 300, 
        "APICODERESULT"  => "Data fetch Succesfully"
        );
      $this->response($response, 200);
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
public function activeaddress_post(){


$post=$this->data;


$this->checkaccess();
 
$user_id=$this->checkaccess()[0]['id'];

$response=$this->Restapi_model->activeaddress_post($user_id);
//echo json_encode($response);


if($response!='') 
    {
      
      $data=array(
        "statusCode" => 300, 
        "APICODERESULT"  => "Data fetch Succesfully"
        );
      $this->response($response, 200);
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

public function activeaddresschange_post(){

$arrayRequired=array('address_id');
$var=$this->getErrorMsg($arrayRequired,$this->data);
$post=$this->data;


$this->checkaccess();
 
$user_id=$this->checkaccess()[0]['id'];
$address_id=$post['address_id'];
$data=["user_id"=>$user_id,"address_id"=>$address_id];
$response=$this->Restapi_model->activeaddresschange_post($data);
//echo json_encode($response);


if($response!='') 
    {
      
      $data=array(
        "statusCode" => 300, 
        "APICODERESULT"  => "Data updated Succesfully"
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

public function deleteaddress_post(){

$arrayRequired=array('address_id');
$var=$this->getErrorMsg($arrayRequired,$this->data);
$post=$this->data;


$this->checkaccess();
 
$user_id=$this->checkaccess()[0]['id'];
$address_id=$post['address_id'];

$response=$this->Restapi_model->deleteaddress_post($user_id,$address_id);
//echo json_encode($response);


if($response!='') 
    {
      
      $data=array(
        "statusCode" => 300, 
        "APICODERESULT"  => "Data deleted Succesfully"
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

public function  updateaddress_post(){


$arrayRequired=array('address_id','location','streetinfo','name','mobile','address_type','lat','longt','status');
$var=$this->getErrorMsg($arrayRequired,$this->data);
$post=$this->data;

$this->checkaccess();
 
$user_id=$this->checkaccess()[0]['id'];
$location=$post['location'];
$streetinfo=$post['streetinfo'];
$name=$post['name'];
$mobile=$post['mobile'];
$lat=$post['lat'];
$longt=$post['longt'];
$address_type=$post['address_type'];
$status=$post['status'];
$address_id=$post['address_id'];
$data=['address_id'=>$address_id,"user_id"=>$user_id,'location'=>$location,'streetinfo'=>$streetinfo,'name'=>$name,'mobile'=>$mobile,'address_type'=>$address_type,'lat'=>$lat,'longt'=>$longt,'status'=>$status];

$response=$this->Restapi_model->updateaddress_post($data);

if($response!='') 
    {
      
      $data=array(
        "statusCode" => 200, 
        "APICODERESULT"  => "Data update Succesfully"
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


public function review_post(){
    
    

$arrayRequired=array('cat_id','review','rating','date');
$var=$this->getErrorMsg($arrayRequired,$this->data);
$post=$this->data;

$this->checkaccess();
 
$user_id=$this->checkaccess()[0]['id'];
$cat_id=$post['cat_id'];
$review=$post['review'];
$rating=$post['rating'];
$date=$post['date'];


$data=["user_id"=>$user_id,'review'=>$review,'cat_id'=>$cat_id,'rating'=>$rating,'date'=>$date];

$response=$this->Restapi_model->review_post($data);

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

public function review_fetch_post(){
    
   $arrayRequired=array('cat_id');
$var=$this->getErrorMsg($arrayRequired,$this->data);
$post=$this->data; 

$cat_id=$post['cat_id'];

$response=$this->Restapi_model->review_fetch_post($cat_id);
//echo json_encode($response);


if($response!='') 
    {
      
      $data=array(
        "statusCode" => 300, 
        "APICODERESULT"  => "Data fetch Succesfully"
        );
      $this->response($response, 200);
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


public function company_loc_post(){

$response=$this->Restapi_model->company_loc_post();
//echo json_encode($response);


if($response!='') 
    {
      
      $data=array(
        "statusCode" => 300, 
        "APICODERESULT"  => "Data fetch Succesfully"
        );
      $this->response($response, 200);
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



public function package_post(){
    

$arrayRequired=array('sub_id');
$var=$this->getErrorMsg($arrayRequired,$this->data);
$post=$this->data; 

$sub_id=$post['sub_id'];

  $this->checkaccess();
 
$user_id=$this->checkaccess()[0]['id'];


$response=$this->Restapi_model->package_post($sub_id,$user_id);

  



if($response!='') 
    {
      
      $data=array(
        "statusCode" => 200, 
        "APICODERESULT"  => "Data fetch Succesfully",
        //"package-name" =>$response[0]['package_name'],$response
                                            
        
        );
    
            $this->response($response, 200);
//      print_r(json_encode($response));
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

public function  quantity_post(){


$arrayRequired=array('cat_id');
$var=$this->getErrorMsg($arrayRequired,$this->data);
$post=$this->data;

$this->checkaccess();
 
$user_id=$this->checkaccess()[0]['id'];


$cat_id=$post['cat_id'];


$data=["user_id"=>$user_id,'cat_id'=>$cat_id];

$response=$this->Restapi_model->quantity_post($data);

if($response!='') 
    {
      
      $data=array(
        "statusCode" => 200, 
        "APICODERESULT"  => "Data Fetch Succesfully",
        "quantity" =>$response
        );
      $this->response($data, 200);
      //echo json_encode($response);
    }
    else{ 
      $data=array(
        "statusCode" => 300, 
        "APICODERESULT"  => "Something went wrong!",
        "quantity" =>0
        );
      $this->response($data, 200);
      //echo json_encode($response);
    }

}

public function timing_post(){
    

$arrayRequired=array('cat_id','min_time','max_time','part_id','date');
$var=$this->getErrorMsg($arrayRequired,$this->data);
$post=$this->data;


$cat_id=$post['cat_id'];
$min_time=$post['min_time'];
$max_time=$post['max_time'];
$part_id=$post['part_id'];
$date=$post['date'];


$data=["cat_id"=>$cat_id,'min_time'=>$min_time,'max_time'=>$max_time,'part_id'=>$part_id,'date'=>$date];

$response=$this->Restapi_model->timing_post($data);

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

public function booking_post(){
    

$arrayRequired=array('address_id','main_cart_id','total_price','delivery_date','delivery_time','status');
$var=$this->getErrorMsg($arrayRequired,$this->data);
$post=$this->data;
$this->checkaccess();
 
$user_id=$this->checkaccess()[0]['id'];


$address_id=$post['address_id'];
$main_cart_id=$post['main_cart_id'];
$total_price=$post['total_price'];
$delivery_date=$post['delivery_date'];
$delivery_time=$post['delivery_time'];
$status=$post['status'];


$data=['user_id'=>$user_id,"address_id"=>$address_id,'main_cart_id'=>$main_cart_id,'total_price'=>$total_price,'delivery_date'=>$delivery_date,'delivery_time'=>$delivery_time,'status'=>$status];

$response=$this->Restapi_model->booking_post($data);

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
public function bookingfetch_post(){

$post=$this->data;

$this->checkaccess();
 
$user_id=$this->checkaccess()[0]['id'];



$response=$this->Restapi_model->bookingfetch_post($user_id);


if($response!='') 
    {
      
      $data=array(
        "statusCode" => 200, 
        "APICODERESULT"  => "Data Fetch Succesfully",
      
            "result"=>$response
        );
      $this->response($data, 200);
      //echo json_encode($response);
    }
    else{ 
      $data=array(
        "statusCode" => 300, 
        "APICODERESULT"  => "Something went wrong!",
      "result"=>$response
        );
      $this->response($data, 200);
      //echo json_encode($response);
    }

}
public function singlebookingfetch_post(){
$arrayRequired=array('booking_id');
$var=$this->getErrorMsg($arrayRequired,$this->data);
$post=$this->data;

// $this->checkaccess();
 
// $user_id=$this->checkaccess()[0]['id'];
$booking_id=$post['booking_id'];


$response=$this->Restapi_model->singlebookingfetch_post($booking_id);


if($response!='') 
    {
      
      $data=array(
        "statusCode" => 200, 
        "APICODERESULT"  => "Data Fetch Succesfully",
      
            "result"=>$response
        );
      $this->response($data, 200);
      //echo json_encode($response);
    }
    else{ 
      $data=array(
        "statusCode" => 300, 
        "APICODERESULT"  => "Something went wrong!",
      "result"=>$response
        );
      $this->response($data, 200);
      //echo json_encode($response);
    }

}
public function bookingsmallfetch_post(){

$post=$this->data;

$this->checkaccess();
 
$user_id=$this->checkaccess()[0]['id'];



$response=$this->Restapi_model->bookingsmallfetch_post($user_id);


if($response!='') 
    {
      
      $data=array(
        "statusCode" => 200, 
        "APICODERESULT"  => "Data Fetch Succesfully",
      
            "result"=>$response
        );
      $this->response($data, 200);
      //echo json_encode($response);
    }
    else{ 
      $data=array(
        "statusCode" => 300, 
        "APICODERESULT"  => "Something went wrong!",
      "result"=>$response
        );
      $this->response($response, 200);
      //echo json_encode($response);
    }

}

public function  date_post(){



$response=$this->Restapi_model->date_post();

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
        "quantity" =>0
        );
      $this->response($response, 200);
      //echo json_encode($response);
    }

}


public function  timingdetails_post(){


$arrayRequired=array('date');
$var=$this->getErrorMsg($arrayRequired,$this->data);
$post=$this->data;

$date=$post['date'];
$response=$this->Restapi_model->timingdetails_post($date);

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

public function payment_post(){
$arrayRequired=array('cart_id','payment_mode','transaction_id');
$var=$this->getErrorMsg($arrayRequired,$this->data);
$post=$this->data;
$this->checkaccess();
 
$user_id=$this->checkaccess()[0]['id'];


$cart_id=$post['cart_id'];
$payment_mode=$post['payment_mode'];
$transaction_id=$post['transaction_id'];



$data=['user_id'=>$user_id,"payment_mode"=>$payment_mode,'cart_id'=>$cart_id,'transaction_id'=>$transaction_id];

$response=$this->Restapi_model->payment_post($data);

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


public function  promodetails_post(){


// $arrayRequired=array('date');
// $var=$this->getErrorMsg($arrayRequired,$this->data);
// $post=$this->data;

//$date=$post['date'];
$response=$this->Restapi_model->promodetails_post();

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
public function promoused_post(){


$arrayRequired=array('promocode');
$var=$this->getErrorMsg($arrayRequired,$this->data);
$post=$this->data;
$this->checkaccess();
 
$user_id=$this->checkaccess()[0]['id'];
$promocode=$post['promocode'];
$response=$this->Restapi_model->promoused_post($promocode,$user_id);

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
public function search_post(){


$arrayRequired=array('search');
$var=$this->getErrorMsg($arrayRequired,$this->data);
$post=$this->data;

$search=$post['search'];
$response=$this->Restapi_model->search_post($search);

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

//userdetails data
public function  userdetails_post(){



$this->checkaccess();
 
$user_id=$this->checkaccess()[0]['id'];

$response=$this->Restapi_model->userdetails_post($user_id);

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

//govtdetails
public function  govtdetails_post(){



$this->checkaccess2();
 
$govt_id=$this->checkaccess2()[0]['id'];

$response=$this->Restapi_model->govtdetails_post($govt_id);

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


//companydetailsfecth
public function  companydetails_post(){



$this->checkaccess1();
 
$company_id=$this->checkaccess1()[0]['id'];

$response=$this->Restapi_model->companydetails_post($company_id);

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

//userdetails

public function  userupdate_post(){


$arrayRequired=array('mobile','mobile1','name','email');
$var=$this->getErrorMsg($arrayRequired,$this->data);

$post=array();
$post['mobile']=$this->input->post('mobile');
$post['mobile1']=$this->input->post('mobile1');
$post['name']=$this->input->post('name');
$post['email']=$this->input->post('email');
 $image_data = array();
    $config['upload_path']          = 'uploads/profile_image/';
    $config['allowed_types']        = 'gif|jpg|png|jpeg';
    $config['overwrite']            = TRUE;
    $config['encrypt_name']         = TRUE;
    $config['remove_spaces']         = TRUE;
    $this->load->library('upload', $config);
    $this->upload->initialize($config);

    if ( ! $this->upload->do_upload('image'))
    {
        $error = array('error' => $this->upload->display_errors());
    }
    else
    {
      $image_data = $this->upload->data();
      $post['image'] = base_url().$config['upload_path'].$image_data['file_name'];
      
    }
$this->checkaccess();
 
$user_id=$this->checkaccess()[0]['id'];
$mobile=$post['mobile'];
$mobile1=$post['mobile1'];
$name=$post['name'];
$email=$post['email'];
$image=$post['image'];

$response=$this->Restapi_model->userupdate_post($user_id,$mobile,$mobile1,$name,$email,$image);

if($response!='') 
    {
      
      $data=array(
        "statusCode" => 200, 
        "APICODERESULT"  => "Data updated Succesfully",
               
        );
      $this->response($data, 200);
      //echo json_encode($response);
    }
    else{ 
      $data=array(
        "statusCode" => 300, 
        "APICODERESULT"  => "Something went wrong!",
  
        );
      $this->response($data, 300);
      //echo json_encode($response);
    }
    

}

//govtupdate


public function  govtupdate_post(){


$arrayRequired=array('mobile','org_name','email','industry_type');
$var=$this->getErrorMsg($arrayRequired,$this->data);
$post=$this->data;

$this->checkaccess2();
 
$govt_id=$this->checkaccess2()[0]['id'];
$mobile=$post['mobile'];
$org_name=$post['org_name'];
$email=$post['email'];
$industry_type=$post['industry_type'];
$response=$this->Restapi_model->govtupdate_post($govt_id,$mobile,$org_name,$email,$industry_type);

if($response!='') 
    {
      
      $data=array(
        "statusCode" => 200, 
        "APICODERESULT"  => "Data updated Succesfully",
               
        );
      $this->response($data, 200);
      //echo json_encode($response);
    }
    else{ 
      $data=array(
        "statusCode" => 300, 
        "APICODERESULT"  => "Something went wrong!",
  
        );
      $this->response($data, 300);
      //echo json_encode($response);
    }
    

}

//image
public function upload_img()
    {
$image = base64_decode($this->input->post("img_front"));
$image_name = md5(uniqid(rand(), true));
$filename = $image_name . '.' . 'png';
//rename file name with random number
$path = "uploads/profile_image/".$filename;
//image uploading folder path
file_put_contents($path . $filename, $image);
// image is bind and upload to respective folde

$data_insert = array('front_img'=>$filename);

$success = $this->add_model->insert_img($data_insert);
if($success){
    $b = "User Registered Successfully..";
}
else
{
    $b = "Some Error Occured. Please Try Again..";
}
echo json_encode($b);
}

//companyupdate


public function  companyupdate_post(){


$arrayRequired=array('company_name','company_type','email','work');
$var=$this->getErrorMsg($arrayRequired,$this->data);
$post=$this->data;

$this->checkaccess1();
 
$company_id=$this->checkaccess1()[0]['id'];
$company_name=$post['company_name'];
$company_type=$post['company_type'];
$email=$post['email'];
$work=$post['work'];

$response=$this->Restapi_model->companyupdate_post($company_id,$company_name,$company_type,$email,$work);

if($response!='') 
    {
      
      $data=array(
        "statusCode" => 200, 
        "APICODERESULT"  => "Data updated Succesfully",
               
        );
      $this->response($data, 200);
      //echo json_encode($response);
    }
    else{ 
      $data=array(
      "statusCode" => 300, 
        "APICODERESULT"  => "Something went wrong!",
  
        );
      $this->response($data, 300);
      //echo json_encode($response);
    }
    

}


//companyupdate closed



public function  voucher_post(){


// $arrayRequired=array('date');
// $var=$this->getErrorMsg($arrayRequired,$this->data);
// $post=$this->data;

//$date=$post['date'];
$response=$this->Restapi_model->voucher_post();

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