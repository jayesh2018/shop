@$orders = $this->ordersid($order);
@$resultDataOrder = json_decode(@$orders);
@$order_id = $resultDataOrder->id;

public function ordersid($jsonData)
    {
        @$getapiresponse = 'https://api.razorpay.com/v1/orders'; 
        @$razorData = DB::select('select * from razorpay_apikey')[0];

        @$pass = base64_encode(@$razorData->razor_key.":".@$razorData->razor_secret);
        @$header=array("Content-Type: application/json","Authorization: Basic ".@$pass);
        @$jsonDatafinal = json_encode($jsonData);
      
            $curl = curl_init($getapiresponse);
            curl_setopt($curl, CURLOPT_CUSTOMREQUEST, "POST");
            curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
            curl_setopt($curl,CURLOPT_POSTFIELDS ,$jsonDatafinal);
            curl_setopt($curl, CURLOPT_FOLLOWLOCATION, 1);
            curl_setopt($curl, CURLOPT_FOLLOWLOCATION, 1);
            curl_setopt($curl, CURLOPT_HTTPHEADER, $header);
            @$response = curl_exec($curl);
            curl_close($curl);
           
            return $response;
    }