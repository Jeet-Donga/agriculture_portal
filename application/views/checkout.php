<!DOCTYPE html>
<html lang="en">

    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, shrink-to-fit=9">
        <meta name="description" content="Gambolthemes">
        <meta name="author" content="Gambolthemes">
        <title>Checkout-Agriculture Portal</title>

        <?php
        $this->load->view('headerlink');
        ?>
    </head>
    <body>

        <?php
        $this->load->view('header');
        ?>

        <div class="wrapper">
            <div class="gambo-Breadcrumb">
                <div class="container">
                    <div class="row">
                        <div class="col-md-12">
                            <nav aria-label="breadcrumb">
                                <ol class="breadcrumb">
                                    <li class="breadcrumb-item"><a href="<?php base_url()?>home">Home</a></li>
                                    <li class="breadcrumb-item active" aria-current="page">Checkout</li>
                                </ol>
                            </nav>
                        </div>
                    </div>
                </div>
            </div>
            <div class="all-product-grid">
                <div class="container">
                    <div class="row">
                        <form method="post" action="" name="checkout">
                        <div class="col-lg-12 col-md-12">
                            <div class="panel-group accordion pt-1" id="accordion0">
                                <div class="panel panel-default">
                                    <div class="panel-heading" id="headingOne">
                                        <div class="panel-title">
                                            <a class="collapsed" data-toggle="collapse" data-target="#collapseOne" href="#" aria-expanded="true" aria-controls="collapseOne">
                                               <b style="color:orangered" >Product Confirmation</b>
                                            </a>
                                        </div>
                                    </div>
                                    <div  role="tabpanel" aria-labelledby="headingOne" data-parent="#accordion0" style="">
                                        <div class="panel-body">
                                            <div class="row">
                                               <?php 
                                               $cartdata = $this->md->my_select('tbl_cart','*',array('register_id'=>$this->session->userdata('user')));
                                               
                                               foreach ($cartdata as $item)
                                               {
                                                    $product = $this->md->my_select('tbl_product','*',array('product_id'=>$item->product_id))[0];
                                                    $image = $this->md->my_select('tbl_product_image','*',array('image_id'=>$item->image_id));
                                                    $multipath = $image[0]->path;
                                                    $path = explode(",", $multipath);
                                                   ?>
                                               <div class="col-md-4">
                                                   <div class="row">
                                                        <div class="col-md-5">
                                                           <img src="<?php echo base_url().$path[0] ;?>"  style="width:70px;height: 100px"/>
                                                        </div>
                                                       <div class="col-md-7">
                                                           <p style="font-weight:bold; color: orangered"><?php echo $product->name;?></p>
                                                            <p>Qty : <?php echo $item->qty;?></p>
                                                            <p>Price : Rs. <?php echo $item->net_price;?> /-</p>
                                                            
                                                       </div>
                                                   </div>
                                                   <br>
                                                </div>
                                                
                                               <?php 
                                               }
                                               ?>
                                            </div>   
                                        </div>
                                    </div>
                                </div>
                                <div class="panel panel-default">
                                    <div class="panel-heading" id="headingTwo">
                                        <div class="panel-title">
                                            <a class="collapsed" data-toggle="collapse" data-target="#collapseTwo" href="#" aria-expanded="false" aria-controls="collapseTwo">
                                                <b style="color:orangered" >Shipping Information</b>
                                            </a>
                                        </div>
                                    </div>
                                    <div  role="tabpanel" aria-labelledby="headingTwo" data-parent="#accordion0">
                                        <div class="panel-body" id="ship_address">
                                            <div class="row"  >
                                            <?php 
                                            $address = $this->md->my_select('tbl_shipment', '*', array('register_id' => $this->session->userdata('user')));
                                                
                                            foreach ($address as $data)
                                            {
                                                if ($this->session->userdata('shipment_id') == $data->shipment_id)
                                                {
                                                    ?>
                                                    <div class="col-md-4">
                                                        <div class="sign-form">
                                                            <div class="sign-inner">
                                                                <div class="form-dt" style="border-width: 2px;border-color: orange ">
                                                                    <div class="form-inpts checout-address-step">
                                                                        <p style="min-height: 50px"><?php echo $data->address;?></p>
                                                                        <p>Type :<?php echo $data->address_type;?></p>
                                                                        <br>
                                                                        <div style="padding-bottom: 10px">
                                                                            <button class="login-btn hover-btn"  style="font-size: 17px; background: black ;cursor: pointer;"   type="submit">Deliveri Here?</button>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                <?php 
                                                }
                                                else 
                                                {
                                                  
                                                ?>
                                                    <div class="col-md-4">
                                                        <div class="sign-form">
                                                            <div class="sign-inner">
                                                                <div class="form-dt" style="border-width: 2px;border-color: orange ">
                                                                    <div class="form-inpts checout-address-step">
                                                                        <p style="min-height: 50px"><?php echo $data->address;?></p>
                                                                        <p>Type :<?php echo $data->address_type;?></p>
                                                                        <br>
                                                                        <div style="padding-bottom: 10px">
                                                                        <button class="login-btn hover-btn" onclick="set_address(<?php echo $data->shipment_id ?>)" style="font-size: 17px;cursor: pointer;"   type="submit">Deliveri Here?</button>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                <?php 
                                                }
                                            }
                                            ?>
                                            </div>
                                            <div class="signup-link" style="width: 250px;margin-left: 450px;border-radius: 7px">
                                                <a style="font-size: 17px;color: #FFF; cursor: pointer;" target="_new" href="<?php base_url()?>member-address"><b>+ Add New Address</b></a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                
                                <div class="panel panel-default">
                                    <div class="panel-heading" id="headingsix">
                                        <div class="panel-title">
                                            <a class="collapsed" data-toggle="collapse" data-target="#collapsesix" href="#" aria-expanded="false" aria-controls="collapsesix">
                                                <b style="color:orangered" >Payment Information</b>
                                            </a>
                                        </div>
                                    </div>
                                    <div  role="tabpanel" aria-labelledby="headingsix" data-parent="#accordion0">
                                        <div class="panel-body">
                                            <label style="color: orangered"><b>Slect Payment Mode :</b></label>
                                            <br>
                                    <label><input style="margin-left: 10px;" type="radio" name="pay_type" value="cod" <?php
                                            if(!isset($success) && set_radio('pay_type','cod'))
                                            {
                                                echo set_radio('pay_type','cod');
                                            }
                                            ?>> Cash On Delivery(COD)</label>
                                   <br>
                                    <label><input style="margin-left: 10px;" type="radio" name="pay_type" value="card" <?php
                                            if(!isset($success) && set_radio('pay_type','card'))
                                            {
                                                echo set_radio('pay_type','card');
                                            }
                                            ?>> Credit/Debit Card</label>
                                        </div>
                                    </div>
                                </div>
                                <div class="panel panel-default">
                                    <div class="panel-heading" id="headingseven">
                                        <div class="panel-title">
                                            <a class="collapsed" data-toggle="collapse" data-target="#collapseseven" href="#" aria-expanded="false" aria-controls="collapseseven">
                                                <b style="color:orangered" >Apply Coupon</b>
                                            </a>
                                        </div>
                                    </div>
                                    <div  role="tabpanel" aria-labelledby="headingseven" data-parent="#accordion0">
                                        <div class="panel-body">
                                            <div class="row">
                                            <div class="col-md-4" >
                                                <label id="codebtn" style="color: orangered; cursor: pointer" c ><b>Do You have Coupon?</b></label>
                                                <br>
                                                <input type="text" id="promocode" name="promocode" style="height: 30px" placeholder="Enter Code" />
                                                <p id="code_err" style="color: red;font-size: 13px"></p>
                                                <br>
                                                <input type="button" onclick="set_promocode();" name="add" value="Apply" style="width: 100px" class="login-btn hover-btn" />
                                            </div>
                                                <div class="col-md-4" id="viewcode" >
                                                <label style="color: orangered;padding-bottom: 10px"><b>Apply Promocode</b></label>
                                                <?php
                                               $billprice = $this->md->my_query("SELECT SUM(`total_price`) AS sm FROM `tbl_cart` WHERE `register_id` = '" . $this->session->userdata('user') . "'")[0]->sm;
                                                $where['min_bill_price <='] = $billprice;
                                                $where['status'] = 1;
                                                $code = $this->md->my_select('tbl_promocode', '*', $where);
                                                
                                                foreach ($code as $sm)
                                                {
                                                ?>
                                                <div class="row" style="border-bottom: 1px solid #b3b7bb" >
                                                    <div class="col-md-8">
                                                        <p style="font-size: 13px">Anter Code And Get Rs.<?php echo $sm->amount;?> /- Off on minimum Bill price RS.<?php echo $sm->min_bill_price;?> /-</p> 
                                                    </div>   
                                                    <div class="col-md-4">
                                                        <p style="background: orangered;color: #FFF;padding: 7px;border-radius: 5px"><?php echo $sm->code;?></p>
                                                    </div>
                                                </div>
                                                <br>
                                                <?php
                                                }
                                                ?>
                                            </div>
                                                <div class="col-md-4" id="code_success">
                                                    <?php
                                                        if($this->session->userdata('promocode_id'))
                                                        {
                                                            $code_detail = $this->md->my_select('tbl_promocode','*',array('promocode_id'=>$this->session->userdata('promocode_id')))[0];
                                                            $amount = $code_detail->amount;
                                                            $pay_price = $billprice - $amount;
                                                    ?>
                                                    
                                                <div style="padding-top:20px">
                                                    <button class="login-btn hover-btn" name="checkout" value="yes" type="submit">PAY RS. <?php echo $pay_price; ?> /- SECURELY </button>
                                                    <p style=""><span style="color: #9c2323"><?php echo $code_detail->code; ?></span> Is Applied Successfully And Rs. <?php echo $amount?> /- Is Deduct From Rs. <?php echo $billprice; ?> /-</p>
                                                </div>
                                                    <?php
                                                        }
                                                        else 
                                                        {
                                                    ?>
                                                
                                                <div style="padding-top:20px">
                                                    <button class="login-btn hover-btn"  name="checkout" value="yes" type="submit">PAY RS. <?php echo $billprice; ?> /- SECURELY </button>
                                                </div>
                                                <?php
                                                        }
                                                ?>
                                            </div>
                                                
                                                <div class="col-md-12">
                                                    <br>
                                                <?php 
                                                if (isset($error))
                                                {
                                                    ?>
                                                    <div class="alert alert-danger alert-dismissible" role="alert">
                                                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                                            <span aria-hidden="true">&times;</span>
                                                        </button>
                                                        <strong>Oops !</strong> <?php echo $error; ?>
                                                    </div>
                                                <?php
                                                }
                                                ?>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>

        <?php
        $this->load->view('footer');
        ?>

        <?php
        $this->load->view('footerscript');
        ?>
        <script type="text/javascript">
            
            $(Document).ready(function () {
                $("#viewcode").hide();

                $("#codebtn").click(function () {
                    $("#viewcode").show();
                });
            });
        
        function set_address(id)
            {
                $data = {id: id};

                var path = 'http://localhost/agriculture_portal/backend/set_address/';

                $.post(path, $data, function (output) 
                {
                    
                   $("#ship_address").html(output); 
                });
            }
        function set_promocode()
            {
                
                var code = document.getElementById('promocode').value;
                
                if(code == "")
                {
                    $('#code_err').html('Please Enter Coupon Code.');
                }
               else
                {
                    $data = {code: code};

                    var path = 'http://localhost/agriculture_portal/backend/set_promocode';

                    $.post(path, $data, function (output) 
                    {
                        //alert(output);
                        if(output == 2)
                        {
                            $('#code_err').html('Invalid Coupon Code.');
                        }
                        else
                        {
                           
                         $("#code_success").html(output); 
                        }
                        
                    });
                }
                
            }
        </script>
    </body>

</html>





