<?php
class Restapi_model extends CI_Model
{


    //  function checkAssessKey($token,$id)
    //   {
    //    $query=$this->db->where('token',$token)->where('id',$id)->get('register');

    //    if($query->num_rows()>0)
    //    {
    //     return 1;
    //   }
    //   else
    //   {
    //     return 0;
    //   }
    // }
    ///////compnaylogin///////////

    public function company_login($data)
    {
        $query = $this->db->where('token', $data['token'])->get('company_details');
        if ($query->num_rows() > 0) {
            return 0;
        } else {

            $select2 = $this->db->where('mobile', $data['mobile'])


                ->get('company_details');
            if ($select2->num_rows() > 0) {
                $result = $select2->result_array();

                $update = $this->db->where('mobile', $data['mobile'])
                    ->set('otp', $data['otp'])
                    // ->set('token',$data['token'])
                    ->set('status', "2")
                    ->update('company_details');
                $row = $this->db->affected_rows();
                if ($row === 1) {
                    //       $select=$this->db->where('mobile',$data['mobile'])
                    //          ->get('');
                    //          if($select->num_rows()>0){
                    //        $result=$select->result_array();

                    //   $result=$select->row_array();
                    //   return $result;
                    //      }else{
                    //   return 0;
                    //         }

                    return 1;
                } else {
                    return 0;
                }
            } else {


                $insert = $this->db->insert('company_details', $data);
                $id = $this->db->insert_id();
                if (!empty($id)) {

                    return 1;
                } else {
                    return 0;
                }
            }
        }
    }

    //govtlogin

    public function govt_login($data)
    {
        $query = $this->db->where('token', $data['token'])->get('govt_details');
        if ($query->num_rows() > 0) {
            return 0;
        } else {

            $select2 = $this->db->where('mobile', $data['mobile'])


                ->get('govt_details');
            if ($select2->num_rows() > 0) {
                $result = $select2->result_array();

                $update = $this->db->where('mobile', $data['mobile'])
                    ->set('otp', $data['otp'])
                    // ->set('token',$data['token'])
                    ->set('status', "2")
                    ->update('govt_details');
                $row = $this->db->affected_rows();
                if ($row === 1) {


                    return 1;
                } else {
                    return 0;
                }
            } else {


                $insert = $this->db->insert('govt_details', $data);
                $id = $this->db->insert_id();
                if (!empty($id)) {

                    return 1;
                } else {
                    return 0;
                }
            }
        }
    }



    ////////////////login/////////////////

    public function login($data)
    {
        $query = $this->db->where('token', $data['token'])->get('register');
        if ($query->num_rows() > 0) {
            return 0;
        } else {

            $select2 = $this->db->where('mobile', $data['mobile'])


                ->get('register');
            if ($select2->num_rows() > 0) {
                $result = $select2->result_array();

                $update = $this->db->where('mobile', $data['mobile'])
                    ->set('otp', $data['otp'])
                    // ->set('token',$data['token'])
                    ->set('status', "2")
                    ->update('register');
                $row = $this->db->affected_rows();
                if ($row === 1) {
                    //       $select=$this->db->where('mobile',$data['mobile'])
                    //          ->get('');
                    //          if($select->num_rows()>0){
                    //        $result=$select->result_array();

                    //   $result=$select->row_array();
                    //   return $result;
                    //      }else{
                    //   return 0;
                    //         }

                    return 1;
                } else {
                    return 0;
                }
            } else {


                $insert = $this->db->insert('register', $data);
                $id = $this->db->insert_id();
                if (!empty($id)) {
                    //  $select1=$this->db->select('id,mobile,otp,token,status')
                    //                   ->where('id',$id)
                    //                   ->get('register');
                    //   if($select1->num_rows()>0){
                    //     $result=$select1->result_array();

                    //     // return $result[1];

                    //   $result=$select1->row_array();
                    //               return $result;
                    //                  }else{
                    //               return 0;
                    //                     }
                    return 1;
                } else {
                    return 0;
                }
            }
        }
    }
    public function otp($data)
    {

        $select = $this->db->where('mobile', $data['mobile'])
            ->where('otp', $data['otp'])
            ->get('register');


        $row = $this->db->affected_rows();
        if ($row === 1) {
            $select = $this->db->where('mobile', $data['mobile'])
                ->get('register');
            if ($select->num_rows() > 0) {
                $result = $select->result_array();

                $result = $select->row_array();
                return $result;
            } else {
                return 0;
            }
        }
    }
    ///////////// categorylist  fetch/////////////
    function categorylist()
    {
        $select = $this->db->get('tbl_category');
        if ($select->num_rows() > 0) {
            $result = $select->result_array();

            return $result;
        } else {
            return [];
        }
    }

    //////////////////////home///////////////
    public function Home_get()
    {
        error_reporting('0');
        $all = [];
        $select = $this->db->query("SELECT * FROM tbl_category WHERE front = '1'");
        if ($select->num_rows() > 0) {
            $num = $select->num_rows();
            $result = $select->result_array();
            // for($i=0; $i<$num;$i++){

            //      $cat_id=$result[$i]['cat_id'];
            //     $qu2 = $this->db->query("Select * from tbl_subcategory ts, tbl_category tc where ts.cat_id=tc.cat_id");
            //             $result2=$qu2->result_array();


            // }

            $select3 = $this->db->where('front', '1')
                ->get('tbl_category');
            if ($select3->num_rows() > 0) {
                $num = $select3->num_rows();
                $result3 = $select3->result_array();
            }
            $select4 = $this->db->where('trend', '1')
                ->get('tbl_category');
            if ($select4->num_rows() > 0) {
                $num = $select4->num_rows();
                $result4 = $select4->result_array();
            }
            $select5 = $this->db->query("SELECT TOF.* , TC.cimage FROM tbl_offer TOF, tbl_category TC WHERE TC.cat_id = TOF.cat_id");
            if ($select5->num_rows() > 0) {
                $num = $select5->num_rows();
                $result5 = $select5->result_array();
            }



            $val = array("category_details" => $result, "offer" => $result5, "Most_used" => $result3, "Demanded" => $result4);
            $all . array_push($all, $val);

            return $all;
        } else {
            return [];
        }
    }


    ///////////// categorylist by limit 6 fetch/////////////
    function categorylimit_post()
    {
        $select = $this->db->query("SELECT * FROM tbl_category WHERE front = '1'");
        if ($select->num_rows() > 0) {
            $result = $select->result_array();

            return $result;
        } else {
            return [];
        }
    }


    /////////////////// sub category fetch base of id///////////////
    function subcategory_post($cat_id)
    {
        $select = $this->db->Where('cat_id', $cat_id)->get('tbl_subcategory');
        if ($select->num_rows() > 0) {
            $result = $select->result_array();

            return $result;
        } else {
            return [];
        }
    }

    /////////////product fetch/////////////
    function product_post($pro_id)
    {
        $select = $this->db->Where('pro_id', $pro_id)->get('tbl_products');
        if ($select->num_rows() > 0) {
            $result = $select->result_array();

            return $result;
        } else {
            return [];
        }
    }


    /////////////offer fetch/////////////
    function offer_post()
    {
        $select = $this->db->get('tbl_offer');
        if ($select->num_rows() > 0) {
            $result = $select->result_array();

            return $result;
        } else {
            return [];
        }
    }



    public function cart($data)
    {

        $post = ["cat_id" => $data['cat_id'], "user_id" => $data['user_id'], "status" => $data['status']];
        $main_check = $this->db->where('cat_id', $data['cat_id'])
            ->where('user_id', $data['user_id'])
            ->where('status', '1')
            ->get('tbl_main_cart');
        if ($main_check->num_rows() > 0) {
            $re = $main_check->result_array();
            $last_id = $re[0]['main_cart_id'];
        } else {
            $inser = $this->db->insert('tbl_main_cart', $post);
            $last_id = $this->db->insert_id();
        }

        $select2 = $this->db->where('package_id', $data['package_id'])
            ->where('user_id', $data['user_id'])
            ->where('status', '1')
            ->get('tbl_cart');

        if ($select2->num_rows() > 0) {
            $result = $select2->result_array();

            $quantity = $result[0]['quantity'];
            if ($quantity == 1) {
                $update = $this->db->where('package_id', $data['package_id'])
                    ->where('user_id', $data['user_id'])
                    ->where('status', '1')
                    ->set('quantity', '2')


                    ->update('tbl_cart');
                $row = $this->db->affected_rows();
            } else {
                $update = $this->db->where('package_id', $data['package_id'])
                    ->where('user_id', $data['user_id'])
                    ->where('status', '1')
                    ->set('quantity', '3')


                    ->update('tbl_cart');
                $row = $this->db->affected_rows();
            }

            if ($row === 1) {

                $select3 = $this->db->where('package_id', $data['package_id'])
                    ->where('user_id', $data['user_id'])
                    ->get('tbl_cart');

                $result = $select3->result_array();
                return $result;
            } else {
                return 0;
            }
        } else {

            // $data=["user_id"=>$user_id,'sub_id'=>$sub_id,'package_id'=>$package_id,'product_price'=>$product_price,'quantity'=>$quantity,'cat_id'=>$cat_id,'status'=>$status];

            $post1 = ["cat_id" => $data['cat_id'], "user_id" => $data['user_id'], "status" => $data['status'], 'main_cart_id' => $last_id, 'sub_id' => $data['sub_id'], 'package_id' => $data['package_id'], 'product_price' => $data['product_price'], 'quantity' => $data['quantity']];

            $insert = $this->db->insert('tbl_cart', $post1);
            $id = $this->db->insert_id();
            if (!empty($id)) {
                $select4 = $this->db->where('package_id', $data['package_id'])
                    ->where('user_id', $data['user_id'])
                    ->get('tbl_cart');

                $result = $select4->result_array();
                return $result;
            } else {
                return 0;
            }
        }
    }







    public function cartdelete_post($data)
    {

        $select2 = $this->db->where('package_id', $data['package_id'])
            ->where('user_id', $data['user_id'])
            ->where('status', '1')
            ->get('tbl_cart');

        if ($select2->num_rows() > 0) {
            $result = $select2->result_array();

            $quantity = $result[0]['quantity'];
            if ($quantity == 3) {
                $update = $this->db->where('package_id', $data['package_id'])
                    ->where('user_id', $data['user_id'])
                    ->where('status', '1')
                    ->set('quantity', '2')

                    ->update('tbl_cart');
                $row = $this->db->affected_rows();
            } elseif ($quantity == 2) {
                $update = $this->db->where('package_id', $data['package_id'])
                    ->where('user_id', $data['user_id'])
                    ->where('status', '1')
                    ->set('quantity', '1')

                    ->update('tbl_cart');
                $row = $this->db->affected_rows();
            } else {
                $update = $this->db->where('package_id', $data['package_id'])
                    ->where('user_id', $data['user_id'])
                    ->where('status', '1')
                    ->delete('tbl_cart');



                $row = $this->db->affected_rows();
                if ($row) {
                    $delete = $this->db->where('cat_id', $data['cat_id'])
                        ->where('user_id', $data['user_id'])
                        ->where('status', '1')
                        ->delete('tbl_main_cart');
                }
            }

            if ($row === 1) {


                $select3 = $this->db->where('package_id', $data['package_id'])
                    ->where('user_id', $data['user_id'])
                    ->where('status', '1')
                    ->get('tbl_cart');

                $result = $select3->result_array();
                $quantity = $result[0]['quantity'];

                return $quantity;
            } else {

                return 0;
            }
        }
    }



    public function cartfetch_post($data)
    {

        error_reporting('0');

        $cat_id = $data['cat_id'];
        $user_id = $data['user_id'];

        //   $select0 = $this->db->query("SELECT SUM(product_price) as p , quantity from  tbl_cart where cat_id=$cat_id AND user_id=$user_id" );



        //          	$result0=$select0->result_array();


        $select4 = $this->db->query("SELECT * from  tbl_cart where cat_id=$cat_id AND user_id=$user_id AND status='1'");

        if ($select4->num_rows() > 0) {

            $num1 = $select4->num_rows();
            $result4 = $select4->result_array();

            //  print_r($num1);exit;

            $p = [];
            $packagename;
            $price;
            $packgeid;
            $user_id = $data['user_id'];

            $productnames;

            // $prod = array();
            // $result3 = [];
            $res;
            for ($i = 0; $i < $num1; $i++) {
                $package_id = $result4[$i]['package_id'];

                $sub_id = $result4[$i]['sub_id'];
                $qu = $this->db->query("SELECT * FROM service_package  WHERE package_id=$package_id");

                if ($qu->num_rows() != 0) {
                    $result = $qu->result_array();
                    $num = $qu->num_rows();


                    // for($i=0; $i<$num;$i++){
                    $packagename = $result[0]['package_name'];
                    $price = $result[0]['price'];
                    $packageid = $result[0]['package_id'];

                    $packageimage = $result[0]['image'];
                    $subid = $result[0]['sub_id'];

                    $qu2 = $this->db->query("Select tb.* from package_products pp, tbl_products tb where package_id = $packageid AND tb.pro_id = pp.pro_id");
                    $result2 = $qu2->result_array();

                    $num2 = $qu2->num_rows();

                    $select5 = $this->db->query("SELECT * from  tbl_cart where package_id=$packageid AND user_id=$user_id AND status='1'");




                    $num3 = $select5->num_rows();
                    $result5 = $select5->result_array();
                    $price = $result5[0]['product_price'];
                    $re = 0;
                    $stprice = 0;
                    //  for($j=0; $j<$num3;$j++){
                    foreach ($result5 as $value) {




                        $quantity = $value['quantity'];
                        $price = $value['product_price'];
                        $re = $price * $quantity + $stprice;
                        $stprice = $price * $quantity;
                        $cart_id = $value['main_cart_id'];
                    }






                    //   $total1=$result0[0]['p'];

                    $newpc = array("cart_id" => $cart_id, 'quantity' => $quantity, "packagename" => $packagename, "price" => $price, "packageid" => $packageid, "image" => $packageimage, "subid" => $subid, "products" => $result2, "total-price" => $re);
                    // $res = implode(",",$newpc);
                    $p . array_push($p, $newpc);

                    // }

                } else {
                    return [];
                }
            }
            return $p;
        } else {
            return 0;
        }
    }




    public function cartfetch1_post($data)
    {

        error_reporting('0');

        $cat_id = $data['cat_id'];
        $user_id = $data['user_id'];

        $select0 = $this->db->query("SELECT SUM(product_price) as p , quantity from  tbl_cart where cat_id=$cat_id AND user_id=$user_id");



        $result0 = $select0->result_array();


        $select4 = $this->db->query("SELECT * from  tbl_cart where cat_id=$cat_id AND user_id=$user_id");

        if ($select4->num_rows() > 0) {

            $num1 = $select4->num_rows();
            $result4 = $select4->result_array();

            $p = [];
            $packagename;
            $price;
            $packgeid;
            $user_id = $data['user_id'];
            $productnames;

            // $prod = array();
            // $result3 = [];
            $res;
            for ($i = 0; $i < $num1; $i++) {
                $sub_id = $result4[$i]['sub_id'];
                $qu = $this->db->query("SELECT sp.package_id,sp.sub_id, sp.package_name,sp.image,sp.price FROM service_package sp WHERE sp.sub_id=$sub_id");

                if ($qu->num_rows() != 0) {
                    $result = $qu->result_array();
                    $num = $qu->num_rows();


                    for ($i = 0; $i < $num; $i++) {
                        $packagename = $result[$i]['package_name'];
                        $price = $result[$i]['price'];
                        $packageid = $result[$i]['package_id'];

                        $packageimage = $result[$i]['image'];
                        $subid = $result[$i]['sub_id'];

                        $qu2 = $this->db->query("Select tb.* from package_products pp, tbl_products tb where package_id = $packageid AND tb.pro_id = pp.pro_id");
                        $result2 = $qu2->result_array();

                        $num2 = $qu2->num_rows();

                        $select5 = $this->db->query("SELECT * from  tbl_cart where package_id=$packageid AND user_id=$user_id");




                        $num3 = $select5->num_rows();
                        $result5 = $select5->result_array();
                        $price = $result5[0]['product_price'];
                        $re = 0;
                        $stprice = 0;
                        //  for($j=0; $j<$num3;$j++){
                        foreach ($result5 as $value) {




                            $quantity = $value['quantity'];
                            $price = $value['product_price'];
                            $re = $price * $quantity + $stprice;
                            $stprice = $price * $quantity;
                        }






                        $total1 = $result0[0]['p'];

                        $newpc = array('quantity' => $quantity, "packagename" => $packagename, "price" => $price, "packageid" => $packageid, "image" => $packageimage, "subid" => $subid, "products" => $result2, "total-price" => $re);
                        // $res = implode(",",$newpc);
                        $p . array_push($p, $newpc);
                    }
                } else {
                    return [];
                }
            }
            return $p;
        } else {
            return 0;
        }
    }

    //insert address
    public function address_post($data)
    {



        $select2 = $this->db->where('user_id', $data['user_id'])
            ->get('tbl_address');
        if ($select2->num_rows() > 0) {
            $result = $select2->result_array();


            $insert = $this->db->insert('tbl_address', $data);
            $id = $this->db->insert_id();
            if (!empty($id)) {


                $update = $this->db->where('address_id', $id)
                    ->set('status', "0")
                    ->update('tbl_address');
                $row = $this->db->affected_rows();

                if ($row === 1) {
                    return 1;
                } else {
                    return 0;
                }
            } else {
                return 0;
            }
        } else {


            $insert = $this->db->insert('tbl_address', $data);
            $id = $this->db->insert_id();
            if (!empty($id)) {

                return 1;
            } else {
                return 0;
            }
        }
    }

    public function alladdress_post($user_id)
    {


        $select = $this->db->Where('user_id', $user_id)->get('tbl_address');
        if ($select->num_rows() > 0) {
            $result = $select->result_array();

            return $result;
        } else {
            return [];
        }
    }
    public function activeaddress_post($user_id)
    {


        $select = $this->db->Where('user_id', $user_id)
            ->Where('status', '1')
            ->get('tbl_address');
        if ($select->num_rows() > 0) {
            $result = $select->result_array();

            return $result;
        } else {
            return [];
        }
    }
    public function activeaddresschange_post($data)
    {

        $update = $this->db->where('status', 0)->update(['status' => 1]);
        $row = $this->db->affected_rows();
        if ($row === 1) {
            $select = $this->db->select('*')->where('user_id', $data['user_id'])
                ->where('address_id', $data['address_id'])

                ->get('tbl_address');
            if ($select->num_rows() > 0) {
                $result = $select->result_array();

                $status = $result[0]['status'];


                if ($status == '0') {
                    $update1 = $this->db->where('user_id', $data['user_id'])
                        ->where('address_id', $data['address_id'])
                        ->set('status', '1')
                        ->update('tbl_address');
                    $row1 = $this->db->affected_rows();
                    if ($row1 === 1) {

                        return 1;
                    } else {
                        return 0;
                    }
                }
            }
        }
    }

    public function deleteaddress_post($user_id, $address_id)
    {


        $select = $this->db->where('user_id', $user_id)
            ->where('address_id', $address_id)
            ->get('tbl_address');
        if ($select->num_rows() > 0) {
            $this->db->where('user_id', $user_id)
                ->where('address_id', $address_id)

                ->delete('tbl_address');
            if ($this->db->affected_rows() > 0) {
                return 1;
            } else {
                return 0;
            }
        } else {
            return 0;
        }
    }
    public function updateaddress_post($data)
    {

        $update = $this->db->where('user_id', $data['user_id'])
            ->where('address_id', $data['address_id'])
            ->update('tbl_address', $data);
        if ($update == 1) {

            return 1;
        } else {
            return 0;
        }
    }
    public function review_post($data)
    {
        $insert = $this->db->insert('tbl_review', $data);

        $result = $this->db->insert_id();

        if ($result > 0) {

            return $result;
        } else {
            return 0;
        }
    }


    public function review_fetch_post($cat_id)
    {

        $select = $this->db->Where('cat_id', $cat_id)->get('tbl_review');
        if ($select->num_rows() > 0) {
            $result = $select->result_array();

            return $result;
        } else {
            return [];
        }
    }

    public function company_loc_post()
    {

        $select = $this->db->get('company_location');
        if ($select->num_rows() > 0) {
            $result = $select->result_array();

            return $result;
        } else {
            return [];
        }
    }





    public function package_post($sub_id, $user_id)
    {




        error_reporting('0');
        $p = [];
        $packagename;
        $price;
        $packgeid;
        $productnames;

        $prod = array();
        $result3 = [];
        $res;
        $qu = $this->db->query("SELECT sp.package_id,sp.sub_id, sp.package_name,sp.image,sp.price FROM service_package sp WHERE sp.sub_id=$sub_id AND sp.package_id IN (SELECT package_id from package_products pp)");

        // $query = $this->db->get();

        if ($qu->num_rows() != 0) {
            $result = $qu->result_array();
            $num = $qu->num_rows();
            // print_r($num);exit;

            for ($i = 0; $i < $num; $i++) {
                $packagename = $result[$i]['package_name'];
                $price = $result[$i]['price'];
                $packageid = $result[$i]['package_id'];
                $packageimage = $result[$i]['image'];
                $subid = $result[$i]['sub_id'];

                $qu2 = $this->db->query("Select tb.* from package_products pp, tbl_products tb where package_id = $packageid AND tb.pro_id = pp.pro_id");
                $result2 = $qu2->result_array();

                // $disprice = $result2[0]['dis-price'];

                $num2 = $qu2->num_rows();
                $qunatity = $this->db->query("SELECT quantity from tbl_cart Where user_id=$user_id && sub_id=$sub_id && package_id=$packageid && status='1'");



                if ($qunatity->num_rows() > 0) {
                    $result3 = $qunatity->result_array();
                    $quantity1 = $result3[0]['quantity'];
                } else {

                    $quantity1 = 0;
                }

                $dic = $this->db->query("SELECT pp.* from package_products pp where pp.package_id = $packageid");
                $dicresult = $dic->result_array();
                $disprice = $dicresult[0]['dis-price'];

                $newpc = array("packagename" => $packagename, "price" => $price, "packageid" => $packageid, "image" => $packageimage, "subid" => $subid, "products" => $result2, "quantity" => $quantity1, "discount" => $disprice);
                // $res = implode(",",$newpc);

                $p . array_push($p, $newpc);
            }


            return $p;
        } else {
            return [];
        }
    }
    public function quantity_post($data)
    {

        $select = $this->db->select_sum('quantity')
            ->where('cat_id', $data['cat_id'])
            ->Where('user_id', $data['user_id'])
            ->where('status', '1')
            ->get('tbl_cart');
        if ($select->num_rows() > 0) {
            $result = $select->result_array();

            $var = $result[0]['quantity'];

            return $var;
        } else {

            return 0;
        }
    }


    //   public function carddetails_post($data){



    // $select=$this->db->where('package_id',$data['package_id'])
    //                 //  ->Where('sub_id',$data['sub_id'])
    //                   ->Where('user_id',$data['user_id'])
    //                  ->get('tbl_cart');
    //  if($select->num_rows()>0){
    //     $result=$select->result_array();
    //     $var=$result[0]['quantity'];

    //     return $var;
    //   }else{

    //     return 0;
    //   }


    //   }

    public function timing_post($data)
    {

        $insert = $this->db->insert('tbl_timings', $data);

        $result = $this->db->insert_id();

        if ($result > 0) {

            return $result;
        } else {
            return 0;
        }
    }


    public function booking_post($data)
    {

        $update = $this->db->where('main_cart_id', $data['main_cart_id'])
            ->set('status', "2")
            ->update('tbl_cart');

        $row = $this->db->affected_rows();



        $update = $this->db->where('main_cart_id', $data['main_cart_id'])
            ->set('status', "2")
            ->update('tbl_main_cart');

        $row1 = $this->db->affected_rows();



        $insert = $this->db->insert('tbl_booking', $data);

        $result = $this->db->insert_id();

        if ($result > 0) {

            return $result;
        } else {
            return 0;
        }
    }

    // public function booking_post($data){


    //     $cart_id=$data['cart_id'];

    //       $insert=$this->db->insert('tbl_booking',$data);

    // $result=$this->db->insert_id();

    // if($result>0){

    //   return $result;


    // }else{
    //   return 0;
    // }

    // }

    public function bookingsmallfetch_post($user_id)
    {
        error_reporting('0');
        $push = [];
        $partners = [];
        // select B.*,AD.location,CA.category, C.* from tbl_booking B,tbl_cart C,tbl_category CA, tbl_address AD where B.user_id='5' AND C.main_cart_id=B.cart_id AND CA.cat_id=C.cat_id  AND AD.address_id=B.address_id
        $select = $this->db->query("select B.*,AD.location,CA.category from tbl_booking B,tbl_cart C,tbl_category CA, tbl_address AD where B.user_id='$user_id' AND C.main_cart_id=B.main_cart_id AND CA.cat_id=C.cat_id AND AD.address_id=B.address_id GROUP by C.main_cart_id");
        $result = $select->result_array();
        $num = $select->num_rows();

        for ($i = 0; $i < $num; $i++) {
            $bookid = $result[$i]['booking_id'];
            $part_details = $this->db->query("select B.booking_id,PA.* from tbl_booking  B, tbl_partner_assign PA where PA.booking_id = '$bookid'");
            $result1 = $part_details->result_array();
            $resultsget;
            if ($result1 == []) {
                $resultsget = ["0"];
            } else {
                $parts = $result1[$i]['part_id'];
                $resultsget = $parts;
                $select2 = $this->db->query("select * from tbl_partner where id = $parts");
                $result2 = $select2->result_array();
                $num2 = $select2->num_rows();
                $resultsget = $result2;
            }
            $data = [$result1];
            $partners . array_push($partners, $resultsget);
        }

        $data = ["details" => $result, "partner_details" => $partners];
        $push . array_push($push, $data);
        return $push;
    }


    public function singlebookingfetch_post($booking_id)
    {
        $data = [];
        $select = $this->db->select('address_id,main_cart_id,total_price,delivery_date,delivery_time,status')

            ->Where('booking_id', $booking_id)->get('tbl_booking');
        if ($select->num_rows() > 0) {
            $result = $select->result_array();
            $cart_id = $result[0]['main_cart_id'];
            $address_id = $result[0]['address_id'];
            $address = $this->db->query("SELECT * from tbl_address Where address_id='$address_id'");

            $result2 = $address->result_array();
            $qunatity = $this->db->query("SELECT * from tbl_cart Where main_cart_id='$cart_id'");
            $result1 = $qunatity->result_array();
            $num = $qunatity->num_rows();
            $pckname;
            for ($i = 0; $i < $num; $i++) {
                $packageid = $result1[$i]['package_id'];
                $packagename = $this->db->query("SELECT * FROM service_package where package_id=$packageid");
                $resultpck = $packagename->result_array();
                $pckname = $resultpck;
            }


            $part_details = $this->db->query("select B.booking_id,PA.* from tbl_booking  B, tbl_partner_assign PA where PA.booking_id = $booking_id");
            $partresult = $part_details->result_array();
            $resultsget;
            if ($partresult == []) {
                $resultsget = ["0"];
            } else {
                $parts = $partresult[0]['part_id'];
                $resultsget = $parts;
                $select2 = $this->db->query("select * from tbl_partner where id = $parts");
                $result2 = $select2->result_array();
                $num2 = $select2->num_rows();
                $resultsget = $result2;
            }

            $value = ["booking" => $result, "cart_details" => $result1, "address" => $result2, "partner" => $resultsget, "pckname" => $pckname];
            // $data.array_push($data,$value);
            return $value;
        } else {
            return [];
        }
    }

    public function bookingfetch_post($user_id)
    {
        $data = [];
        $select = $this->db->select('address_id,main_cart_id,total_price,delivery_date,delivery_time,status')

            ->Where('user_id', $user_id)->get('tbl_booking');
        if ($select->num_rows() > 0) {
            $result = $select->result_array();
            $cart_id = $result[0]['main_cart_id'];
            $address_id = $result[0]['address_id'];
            $address = $this->db->query("SELECT * from tbl_address Where address_id='$address_id'");

            $result2 = $address->result_array();
            $qunatity = $this->db->query("SELECT * from tbl_cart Where main_cart_id='$cart_id'");
            $result1 = $qunatity->result_array();


            $value = ["booking" => $result, "cart_details" => $result1, "address" => $result2];
            // $data.array_push($data,$value);
            return $value;
        } else {
            return [];
        }
    }

    public function date_post()
    {
        error_reporting('0');
        $date = [];
        $date1 = [];
        $date3 = [];
        for ($i = 0; $i < 7; $i++) {
            $rat = date('D j', strtotime('+' . $i . ' days'));
            $date . array_push($date, $rat);
        }
        for ($i = 0; $i < 7; $i++) {
            $rat1 = date('Y-d-m', strtotime('+' . $i . ' days'));
            $date1 . array_push($date1, $rat1);
        }

        $data = array("sort" => $date, "logndate" => $date1);

        $date3 . array_push($date3, $data);
        return $date3;
    }
    public function timingdetails_post($date)
    {
        error_reporting('0');
        date_default_timezone_set("Asia/Kolkata");
        $ar = [];
        function SplitTime($StartTime, $EndTime, $Duration)
        {
            $ReturnArray = array(); // Define output
            $StartTime    = strtotime($StartTime); //Get Timestamp
            $EndTime      = strtotime($EndTime); //Get Timestamp
            // $timeset;

            $AddMins  = $Duration * 60;

            while ($StartTime <= $EndTime) //Run loop
            {
                $ReturnArray[] = date("G:i", $StartTime);
                $hour1 = date('H');
                $StartTime += $AddMins; //Endtime check
                // $timeset = $StartTime."".$timeset;
            }
            return $ReturnArray;
        }


        $currentTime = time();
        $vat = date('H:i', ceil($currentTime / (180 * 60)) * (180 * 60));



        //$times=date("h:i",strtotime("+2 hour",$vat));

        $current = date("Y-d-m");
        if ($date === $current) {
            $Data = SplitTime($current . $vat, $current . "21:00", "30");
        } else {
            $Data = SplitTime("7:00", "21:00", "30");
        }

        $time = ['time' => $Data];
        //   $ar.array_push($ar,$time);

        return $time;
    }

    function promodetails_post()
    {
        $select = $this->db->get('tbl_promo');
        if ($select->num_rows() > 0) {
            $result = $select->result_array();

            return $result;
        } else {
            return [];
        }
    }
    function voucher_post()
    {
        $select = $this->db->get('tbl_voucher');
        if ($select->num_rows() > 0) {
            $result = $select->result_array();

            return $result;
        } else {
            return [];
        }
    }
    function walletdetails_post($user_id)
    {



        $select = $this->db->select_sum('ny_money')
            ->from('tbl_wallet')
            ->where('user_id', $user_id)
            ->order_by('wallet_id desc')
            ->limit(1)
            ->get();
        if ($select->num_rows() > 0) {
            $result = $select->result_array();

            return $result;
        } else {
            return [];
        }
    }
    //userdetails
    function userdetails_post($user_id)
    {


        $select = $this->db->select('name,email,mobile')
            ->where('id', $user_id)

            ->get('register');
        if ($select->num_rows() > 0) {
            $result = $select->result_array();

            return $result;
        } else {
            return [];
        }
    }



    //userupdate
    function userupdate_post($user_id, $mobile, $mobile1, $name, $email, $image)
    {



        $update = $this->db->where('id', $user_id)
            ->set('mobile', $mobile)
            ->set('mobile1', $mobile1)
            ->set('name', $name)

            ->set('email', $email)
            ->set('image', $image)
            ->update('register');
        $row = $this->db->affected_rows();
        if ($row === 1) {
            return 1;
        } else {
            return 0;
        }
    }
    //companydetails

    function companydetails_post($company_id)
    {


        $select = $this->db->select('company_name,company_type,email,mobile,work')
            ->where('id', $company_id)

            ->get('company_details');
        if ($select->num_rows() > 0) {
            $result = $select->result_array();

            return $result;
        } else {
            return [];
        }
    }

    //companyupdate
    function companyupdate_post($company_id, $mobile, $company_name, $company_type, $email, $work)
    {


        $update = $this->db->where('id', $company_id)
            ->set('mobile', $mobile)
            ->set('company_name', $company_name)
            ->set('company_type', $company_type)
            ->set('email', $email)
            ->set('work', $work)
            ->update('company_details');
        $row = $this->db->affected_rows();
        if ($row === 1) {
            return 1;
        } else {
            return 0;
        }
    }
    //govtdetails
    function govtdetails_post($govt_id)
    {


        $select = $this->db->select('org_name,email,mobile,industry_type')
            ->where('id', $govt_id)

            ->get('govt_details');
        if ($select->num_rows() > 0) {
            $result = $select->result_array();

            return $result;
        } else {
            return [];
        }
    }

    //govtupdate
    function govtupdate_post($govt_id, $mobile, $org_name, $email, $industry_type)
    {



        $update = $this->db->where('id', $govt_id)
            ->set('mobile', $mobile)
            ->set('org_name', $org_name)

            ->set('email', $email)
            ->set('industry_type', $industry_type)
            ->update('govt_details');
        $row = $this->db->affected_rows();
        if ($row === 1) {
            return 1;
        } else {
            return 0;
        }
    }



    public function promoused_post($promocode, $user_id)
    {

        $select = $this->db->where('promocode', $promocode)
            ->where('user_id', $user_id)
            ->get('tbl_promo_used');
        if ($select->num_rows() > 0) {
            return 0;
        } else {

            $data = ['promocode' => $promocode, 'user_id' => $user_id];
            $insert = $this->db->insert('tbl_promo_used', $data);

            $result = $this->db->insert_id();

            if ($result > 0) {

                return $result;
            } else {
                return 0;
            }
        }
    }
    public function search_post($search)
    {

        $this->db->like('package_name', $search);
        $query  =   $this->db->get('service_package');
        return $query->result();
        // if($result>0){

        //   return $result;


        // }else{
        //   return 0;
        // }

        //      $select=$this->db->query("SELECT * FROM tbl_category WHERE front = '1'");
        //   if($select->num_rows()>0){
        //       $num=$select->num_rows();
        //     $result=$select->result_array();
        //   }


    }



    public function payment_post($data)
    {

        $insert = $this->db->insert(' tbl_payment', $data);

        $result = $this->db->insert_id();

        if ($result > 0) {

            return $result;
        } else {
            return 0;
        }
    }


    public function walletrecharge_post($data)
    {
        $insert = $this->db->insert('wallet_payment', $data);
        $result = $this->db->insert_id();
        if ($result > 0) {
            $this->db->where('id', $result);
            $query = $this->db->get('wallet_payment');
            if ($query->num_rows() > 0) {
                $value = $query->result_array();
                $amount = $value[0]['amount'];
                $user_id = $value[0]['user_id'];
                $date = $value[0]['date'];
                date_default_timezone_set('Asia/Kolkata');
                $time = date('h:i', time());
                $data = array();
                $data1 = array();
                $data2 = array();
                // $data['ny_money'] = $amount;
                $data['date'] = $date;
                $data['status'] = '1';
                $data['user_id'] = $user_id;
                $data1['ny_money'] = $amount;
                $data1['date'] = $date;
                $data1['status'] = '1';
                $data1['user_id'] = $user_id;
                $data2['amount'] = $amount;
                $data2['date'] = $date;
                $data2['time'] = $time;
                $data2['user_id'] = $user_id;
                $data2['wallet_used_for'] = 'Recharged Wallet';
                $this->db->where('user_id', $user_id);
                $query1 = $this->db->get('tbl_wallet');
                if ($query1->num_rows() > 0) {
                    $value1 = $query1->result_array();
                    $amount1 = $value1[0]['ny_money'];
                    $new_amount = $amount1 + $amount;
                    $data['ny_money'] = $new_amount;
                    $this->db->where('user_id', $user_id);
                    $this->db->update('tbl_wallet', $data);
                    $this->db->insert('wallet_history', $data2);
                    if ($this->db->affected_rows() > 0) {
                        return true;
                    } else {
                        return false;
                    }
                } else {
                    $this->db->insert('tbl_wallet', $data1);
                    $this->db->insert('wallet_history', $data2);
                }
            } else {
                return false;
            }
            return $value;
        } else {
            return 0;
        }
    }

    public function walletgateway_post($data)
    {

        $insert = $this->db->insert('wallet_gateway', $data);

        $result = $this->db->insert_id();

        if ($result > 0) {
            $this->db->where('id', $result);
            $query = $this->db->get('wallet_gateway');
            if ($query->num_rows() > 0) {
                $value = $query->result_array();
                $amount = $value[0]['amount'];
                $user_id = $value[0]['user_id'];
                $date = date("d/m/Y");
                date_default_timezone_set('Asia/Kolkata');
                $time = date('h:i', time());
                $data2 = array();
                $data2['amount'] = $amount;
                $data2['date'] = $date;
                $data2['time'] = $time;
                $data2['user_id'] = $user_id;
                $data2['wallet_used_for'] = 'Wallet money deducted for purchaging purpose';
                $this->db->insert('wallet_history', $data2);
            } else {
                return false;
            }
            return $result;
        } else {
            return 0;
        }
    }

    function wallethistoryget_post($user_id)
    {
        $select = $this->db->select('*')
            ->from('wallet_history')
            ->where('user_id', $user_id)
            ->order_by('id desc')

            ->get();
        if ($select->num_rows() > 0) {
            $result = $select->result_array();

            return $result;
        } else {
            return [];
        }
    }
}
