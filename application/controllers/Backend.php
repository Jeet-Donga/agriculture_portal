<?php

class Backend extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        date_default_timezone_set('Asia/Kolkata');
    }
    
    public function subcategory()
    {
        
       $wh['parent_id'] = ($this->input->post('id'));
       $record = $this->md->my_select('tbl_category','*',$wh);
       echo '<option value="">Select Sub Category</option>';
       foreach ($record as $data)
       {
           ?>
<option value="<?php echo $data->category_id; ?>"><?php echo $data->name; ?></option>    
           <?php
           
       }
    }
    
    public function petacategory()
    {
        
       $wh['parent_id'] = ($this->input->post('id'));
       $record = $this->md->my_select('tbl_category','*',$wh);
       echo '<option value="">Select Peta Category</option>';
       foreach ($record as $data)
       {
           ?>
<option value="<?php echo $data->category_id; ?>"><?php echo $data->name; ?></option>    
           <?php
           
       }
    }
    
    public function city()
    {
        
       $wh['parent_id'] = ($this->input->post('id'));
       $record = $this->md->my_select('tbl_location','*',$wh);
       echo '<option value="">Select City</option>';
       foreach ($record as $data)
       {
           ?>
<option value="<?php echo $data->location_id; ?>"><?php echo $data->name; ?></option>    
           <?php
           
       }
    }
    
    public function subscriber()
    {
    $ins['email'] = $this->input->post('email');
    $count = count ($this->md->my_select('tbl_email_subscriber','*',$ins));
    
    if( $count == 0)
    {
        echo $this->md->my_insert('tbl_email_subscriber',$ins);
        
    }
    else
    {
        echo 2;
    }
    }
    
    public function change_img()
    {
        $wh['image_id'] = $this->input->post('id');
        $this->session->set_userdata('image_id', $this->input->post('id')); 
        
        $multipath = $this->md->my_select('tbl_product_image','*',$wh)[0]->path;
        $path = explode(",", $multipath);
        
        //echo $this->session->userdata('image_id');
?> 
<div>
    <div id="sync1" class="owl-carousel owl-theme">
        <?php
            foreach( $path as $single )
            {
        ?>
        <div class="item">
            <img src="<?php echo base_url().$single; ?>" style="width:350px;height: 465px;" alt="">
        </div>
        <?php
            }
        ?>
    </div>
    
    <div id="sync2" class="owl-carousel owl-theme">
        <?php
            foreach( $path as $single )
            {
        ?>
        <div class="item">
            <img src="<?php echo base_url().$single; ?>" style="width:150px;height: 100px;" alt="">
        </div>
        <?php
            }
        ?>
    </div>
</div>  
        <script data-cfasync="false" src="<?php echo base_url(); ?>assets/../../cdn-cgi/scripts/5c5dd728/cloudflare-static/email-decode.min.js"></script><script src="<?php echo base_url(); ?>assets/js/jquery-3.3.1.min.js"></script>
        <script src="<?php echo base_url(); ?>assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
        <script src="<?php echo base_url(); ?>assets/vendor/OwlCarousel/owl.carousel.js"></script>
        <script src="<?php echo base_url(); ?>assets/vendor/semantic/semantic.min.js"></script>
        <script src="<?php echo base_url(); ?>assets/js/jquery.countdown.min.js"></script>
        <script src="<?php echo base_url(); ?>assets/js/custom.js"></script>
        <script src="<?php echo base_url(); ?>assets/js/product.thumbnail.slider.js"></script>
        <script src="<?php echo base_url(); ?>assets/js/offset_overlay.js"></script>
        <script src="<?php echo base_url(); ?>assets/js/night-mode.js"></script>
<?php

    }

    public function change_stock()
    {
        $wh['image_id'] = $this->input->post('id');
        $stock = $this->md->my_select('tbl_product_image','*',$wh)[0]->qty;
        echo $stock;                           
    }
    
    public function add_wish()
    {
        $wh['product_id'] = $this->input->post('id');
        $wh['register_id'] = $this->session->userdata('user');
        
        echo $this->md->my_insert('tbl_wishlist',$wh);
    }
    
    public function change_cartbtn()
    {
        $wh['image_id'] = $this->input->post('id');
        $data = $this->md->my_select('tbl_product_image','*',$wh);
        $stock = $data[0]->qty;
        $product = $data[0]->product_id;
        
        
        
        if( $stock > 0)
        {
            
            $cart['register_id'] = $this->session->userdata('user');
            $cart['product_id'] = $product;
            $cart['image_id'] = $this->input->post('id');

            $count = count($this->md->my_select('tbl_cart','*',$cart));
            
            if( $count > 0)
            {
                ?>
        <button class="add-cart-btn hover-btn"  style="height: 50px" >
            <i class="uil uil-shopping-cart-alt"></i>Added in Cart
        </button>
        <?php
            }
            else 
            {

         ?>
        <button class="add-cart-btn hover-btn" onclick="add_cart(<?php echo $product; ?>);" style="height: 50px" >
            <i class="uil uil-shopping-cart-alt"></i>Add to Cart
        </button>
        <?php
            }
        }
        else 
        {
        ?>
        <button class="add-cart-btn hover-btn" style="height: 50px" >
            <i class="uil uil-shopping-cart-alt"></i>Out Of Stock
        </button>
        <?php
        }
        
    }
    
    public function add_cart()
    {
        $wh['product_id'] = $this->input->post('id');
        $wh['image_id'] = $this->session->userdata('image_id');
        
        $product = $this->md->my_select('tbl_product_image','*',$wh )[0];
        $detail = $this->md->my_select('tbl_product','*',array('product_id'=>$this->input->post('id')));
        $offer_id = $detail[0]->offer_id;
        
        $comm = $this->md->my_select('tbl_commission','*')[0]->rate;
        $price = $product->price;
        $price = floor($price + ($price * $comm)/100);
        
        $ins['register_id'] = $this->session->userdata('user');
        $ins['product_id'] = $this->input->post('id');
        $ins['image_id'] = $this->session->userdata('image_id');
        $ins['gross_price'] = $price;
        
        if ($offer_id > 0)
        {
            $rate = $this->md->my_select('tbl_offer','*',array('offer_id'=>$offer_id))[0]->rate;
            $discount = round(($price * $rate)/100);
            $ins['discount'] = $discount;
            
            $ins['net_price'] = $price - $discount;
            $ins['total_price'] = $price - $discount;
            
        }
        else
        {
            $ins['discount'] = 0;
            $ins['net_price'] =  $price;
            $ins['total_price'] = $price;
        }
        $ins['qty'] = 1;
        
        
        echo $this->md->my_insert('tbl_cart',$ins);
    }
    
    public function clear_cart()
    {
         $this->md->my_delete('tbl_cart',array('register_id'=>$this->session->userdata('user')));
        
        
                    $name = $this->md->my_select('tbl_register','*',array('register_id'=>$this->session->userdata('user')))[0]->name;
            
                    $cart = count($this->md->my_select('tbl_cart','*',array('register_id'=>$this->session->userdata('user'))));
                       
                    if($cart>0)
                        {
                    ?>
                    
                        <header class="row" style="line-height: 50px;"  >
                            <div class="col-md-10" style="background: white; color: #00baf2; ">
                                <label style="font-size:22px; color: orangered;"><b>Hi <?php echo $name;?>, Your Shopping Cart( <?php echo $cart;?> items )</b></label>
                            </div>
                            <div class="col-md-2" style="background: white; " >
                                <a style="cursor: pointer;background-color: #f2f2f2" onclick="clear_cart()" href="<?php base_url() ?>">Remove All Iteam</a>
                            </div>
                        </header>
                        
                        <div class="all-product-grid">
                            <div class="container content-box">
                                <div class="row">
                                    <div class="col-lg-12 col-md-12">
                                        <div class="element-box">
                                            <div class="element-wrapper">
                                                <div class="table-responsive">
                                                    <table id="dataTable1"  class="table table-striped table-lightfont">
                                                        <thead style="text-align: center;vertical-align: middle co">
                                                            <tr style="text-transform: capitalize">
                                                                <th scope="col">no</th>
                                                                <th scope="col">item code</th>
                                                                <th scope="col">item</th>
                                                                <th scope="col">gross price</th>
                                                                <th scope="col">Discount</th>
                                                                <th scope="col">net price</th>
                                                                <th scope="col">quantity</th>
                                                                <th scope="col">total price</th>

                                                            </tr>
                                                        </thead>
                                                        <tbody style="text-align: center;vertical-align: middle">
                                                            <?php
                                                            $cartdata = $this->md->my_select('tbl_cart','*',array('register_id'=>$this->session->userdata('user')));
                                                            $final_price = 0;
                                                            $no = 0;
                                                            foreach ($cartdata as $item) 
                                                                {
                                                                $product = $this->md->my_select('tbl_product','*',array('product_id'=>$item->product_id))[0];
                                                                $image = $this->md->my_select('tbl_product_image','*',array('image_id'=>$item->image_id));
                                                                $multipath = $image[0]->path;
                                                                $path = explode(",", $multipath);
                                                                $no++;
                                                                ?>
                                                                <tr>
                                                                    <td><?php echo $no; ?></td>
                                                                    <td><?php echo $product->code; ?></td>
                                                                    <td>
                                                                        <div class="col-md-12">
                                                                            <div class="row">
                                                                                <div class="col-md-1">
                                                                                    <img src="<?php echo base_url().$path[0]; ?>" title="<?php echo $product->name; ?>" style="width:70px;height: 70px"/>
                                                                                </div>
                                                                                <div class="col-md-10">
                                                                                    <span style="font-weight:bold;color: orangered">Product Name : <?php echo $product->name; ?></span>
                                                                                    <p>weight : <?php echo $image[0]->weight;?></p>
                                                                                    <a onclick="delete_cartitem(<?php echo $item->cart_id; ?>)">Remove</a>
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                    </td>
                                                                    <td>Rs. <?php echo $item->gross_price; ?> /-</td>
                                                                    <td>Rs. <?php echo $item->discount; ?> /-</td>
                                                                    <td>Rs. <?php echo $item->net_price;?> /-</td>
                                                                    <td>
                                                                        <select onchange="change_qty(<?php echo $item->cart_id ?>,this.value);">
                                                                            <?php
                                                                            for( $a=1 ; $a<=3 ; $a++ )
                                                                            {
                                                                            ?>
                                                                            <option <?php 
                                                                            if ($a == $item->qty)
                                                                            {
                                                                                echo "selected";
                                                                            }
                                                                            ?>><?php echo $a;?></option>
                                                                            <?php
                                                                            }
                                                                            ?>
                                                                        </select>
                                                                    </td>
                                                                    <td>Rs. <?php echo $item->total_price;?> /-</td>
                                                                </tr>
                                                                <?php
                                                                $final_price =$final_price + $item->total_price;
                                                            }
                                                            ?>
                                                        </tbody>
                                                    </table>
                                                    <header class="row" style="line-height: 50px;background-color: orangered;width: 1100px"  >
                                                        <div class="col-md-8">
                                                            <div style="margin-left: 30px;margin-top: 5px;" >
                                                                <h6>Delevery And Payment Option Can Be Celected Later</h6>
                                                                <h6>Safe And Secure Payment</h6>
                                                                <h6>100% payment Protection</h6>
                                                            </div>
                                                        </div>
                                                        <div class="col-md-3">
                                                            <a href="<?php echo base_url();?>checkout" >
                                                            <div style="padding-top:20px">
                                                                <button class="login-btn hover-btn" name="" value="" type="">Proceed To Pay <?php echo $final_price; ?> /-</button>
                                                            </div>
                                                            </a>
                                                        </div>
                                                    </header> 
                                                </div>

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
                    <div class="row" style="background: white;">
                        <div class="col-md-12" style="padding: 60px; text-align: center;">
                            <p style="text-align: center; font-size: 100px; color: #ddd;"><i class="fa fa-shopping-cart"></i></p>
                            <h2 style="text-align: center; color: #ddd;">Hi <?php echo $name; ?>, Your Shopping Cart is Empty </h2>
                            <br>
                            <div class="signup-link" style="width: 250px;margin-left: 400px;border-radius: 7px">
                                <a style="font-size: 20px;cursor: pointer;" href="<?php base_url()?>home"><b>Continue Shopping</b></a>
                            </div>
                        </div>
                    </div>
                    <?php
                        }
                    ?>
        <?php
    }
    
    public function delete_cartitem()
    {
        $whe['cart_id'] = $this->input->post('id');
        $this->md->my_delete('tbl_cart',$whe);
        
                    $name = $this->md->my_select('tbl_register','*',array('register_id'=>$this->session->userdata('user')))[0]->name;
                    $cart = count($this->md->my_select('tbl_cart','*',array('register_id'=>$this->session->userdata('user'))));
                       
                    if($cart>0)
                        {
                    ?>
                    
                        <header class="row" style="line-height: 50px;"  >
                            <div class="col-md-10" style="background: white; color: #00baf2; ">
                                <label style="font-size:22px; color: orangered;"><b>Hi <?php echo $name;?>, Your Shopping Cart( <?php echo $cart;?> items )</b></label>
                            </div>
                            <div class="col-md-2" style="background: white; " >
                                <a style="cursor: pointer;background-color: #f2f2f2" onclick="clear_cart()" >Remove All Iteam</a>
                            </div>
                        </header>
                        
                        <div class="all-product-grid">
                            <div class="container content-box">
                                <div class="row">
                                    <div class="col-lg-12 col-md-12">
                                        <div class="element-box">
                                            <div class="element-wrapper">
                                                <div class="table-responsive">
                                                    <table id="dataTable1"  class="table table-striped table-lightfont">
                                                        <thead style="text-align: center;vertical-align: middle co">
                                                            <tr style="text-transform: capitalize">
                                                                <th scope="col">no</th>
                                                                <th scope="col">item code</th>
                                                                <th scope="col">item</th>
                                                                <th scope="col">gross price</th>
                                                                <th scope="col">Discount</th>
                                                                <th scope="col">net price</th>
                                                                <th scope="col">quantity</th>
                                                                <th scope="col">total price</th>

                                                            </tr>
                                                        </thead>
                                                        <tbody style="text-align: center;vertical-align: middle">
                                                            <?php
                                                            $cartdata = $this->md->my_select('tbl_cart','*',array('register_id'=>$this->session->userdata('user')));
                                                            $final_price = 0;
                                                            $no = 0;
                                                            foreach ($cartdata as $item) 
                                                                {
                                                                $product = $this->md->my_select('tbl_product','*',array('product_id'=>$item->product_id))[0];
                                                                $image = $this->md->my_select('tbl_product_image','*',array('image_id'=>$item->image_id));
                                                                $multipath = $image[0]->path;
                                                                $path = explode(",", $multipath);
                                                                $no++;
                                                                ?>
                                                                <tr>
                                                                    <td><?php echo $no; ?></td>
                                                                    <td><?php echo $product->code; ?></td>
                                                                    <td>
                                                                        <div class="col-md-12">
                                                                            <div class="row">
                                                                                <div class="col-md-1">
                                                                                    <img src="<?php echo base_url().$path[0]; ?>" title="<?php echo $product->name; ?>" style="width:70px;height: 70px"/>
                                                                                </div>
                                                                                <div class="col-md-10">
                                                                                    <span style="font-weight:bold;color: orangered">Product Name : <?php echo $product->name; ?></span>
                                                                                    <p>weight : <?php echo $image[0]->weight;?></p>
                                                                                    <a onclick="delete_cartitem(<?php echo $item->cart_id; ?>)">Remove</a>
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                    </td>
                                                                    <td>Rs. <?php echo $item->gross_price; ?> /-</td>
                                                                    <td>Rs. <?php echo $item->discount; ?> /-</td>
                                                                    <td>Rs. <?php echo $item->net_price;?> /-</td>
                                                                    <td>
                                                                        <select onchange="change_qty(<?php echo $item->cart_id ?>,this.value);">
                                                                            <?php
                                                                            for( $a=1 ; $a<=3 ; $a++ )
                                                                            {
                                                                            ?>
                                                                            <option <?php 
                                                                            if ($a == $item->qty)
                                                                            {
                                                                                echo "selected";
                                                                            }
                                                                            ?>><?php echo $a;?></option>
                                                                            <?php
                                                                            }
                                                                            ?>
                                                                        </select>
                                                                    </td>
                                                                    <td>Rs. <?php echo $item->total_price;?> /-</td>
                                                                </tr>
                                                                <?php
                                                                $final_price =$final_price + $item->total_price;
                                                            }
                                                            ?>
                                                        </tbody>
                                                    </table>
                                                    <header class="row" style="line-height: 50px;background-color: orangered;width: 1100px"  >
                                                        <div class="col-md-8">
                                                            <div style="margin-left: 30px;margin-top: 5px;" >
                                                                <h6>Delevery And Payment Option Can Be Celected Later</h6>
                                                                <h6>Safe And Secure Payment</h6>
                                                                <h6>100% payment Protection</h6>
                                                            </div>
                                                        </div>
                                                        <div class="col-md-3">
                                                            <a href="<?php echo base_url();?>checkout" >
                                                            <div style="padding-top:20px">
                                                                <button class="login-btn hover-btn" name="" value="" type="">Proceed To Pay <?php echo $final_price; ?> /-</button>
                                                            </div>
                                                            </a>
                                                        </div>
                                                    </header> 
                                                </div>

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
                    <div class="row" style="background: white;">
                        <div class="col-md-12" style="padding: 60px; text-align: center;">
                            <p style="text-align: center; font-size: 100px; color: #ddd;"><i class="fa fa-shopping-cart"></i></p>
                            <h2 style="text-align: center; color: #ddd;">Hi <?php echo $name; ?>, Your Shopping Cart is Empty </h2>
                            <br>
                            <div class="signup-link" style="width: 250px;margin-left: 400px;border-radius: 7px">
                                <a style="font-size: 20px;cursor: pointer;" href="<?php base_url()?>home"><b>Continue Shopping</b></a>
                            </div>
                        </div>
                    </div>
                    <?php
                        }
                    ?>
        <?php
              
    }

    public function change_qty()
    {
        $cartid = $this->input->post('id');
        $qty = $this->input->post('qty'); 
        
        $wh['cart_id'] = $cartid;
        $net = $this->md->my_select('tbl_cart','*',$wh)[0]->net_price;
       
        $up['qty'] = $qty;
        $up['total_price'] = $net * $qty;
        
        $this->md->my_update('tbl_cart',$up,$wh);
       
        $name = $this->md->my_select('tbl_register','*',array('register_id'=>$this->session->userdata('user')))[0]->name;
                    $cart = count($this->md->my_select('tbl_cart','*',array('register_id'=>$this->session->userdata('user'))));
                       
                    if($cart>0)
                        {
                    ?>
                    
                        <header class="row" style="line-height: 50px;"  >
                            <div class="col-md-10" style="background: white; color: #00baf2; ">
                                <label style="font-size:22px; color: orangered;"><b>Hi <?php echo $name;?>, Your Shopping Cart( <?php echo $cart;?> items )</b></label>
                            </div>
                            <div class="col-md-2" style="background: white; " >
                                <a style="cursor: pointer;background-color: #f2f2f2" onclick="clear_cart()" >Remove All Iteam</a>
                            </div>
                        </header>
                        
                        <div class="all-product-grid">
                            <div class="container content-box">
                                <div class="row">
                                    <div class="col-lg-12 col-md-12">
                                        <div class="element-box">
                                            <div class="element-wrapper">
                                                <div class="table-responsive">
                                                    <table id="dataTable1"  class="table table-striped table-lightfont">
                                                        <thead style="text-align: center;vertical-align: middle co">
                                                            <tr style="text-transform: capitalize">
                                                                <th scope="col">no</th>
                                                                <th scope="col">item code</th>
                                                                <th scope="col">item</th>
                                                                <th scope="col">gross price</th>
                                                                <th scope="col">Discount</th>
                                                                <th scope="col">net price</th>
                                                                <th scope="col">quantity</th>
                                                                <th scope="col">total price</th>

                                                            </tr>
                                                        </thead>
                                                        <tbody style="text-align: center;vertical-align: middle">
                                                            <?php
                                                            $cartdata = $this->md->my_select('tbl_cart','*',array('register_id'=>$this->session->userdata('user')));
                                                            $final_price = 0;
                                                            $no = 0;
                                                            foreach ($cartdata as $item) 
                                                                {
                                                                $product = $this->md->my_select('tbl_product','*',array('product_id'=>$item->product_id))[0];
                                                                $image = $this->md->my_select('tbl_product_image','*',array('image_id'=>$item->image_id));
                                                                $multipath = $image[0]->path;
                                                                $path = explode(",", $multipath);
                                                                $no++;
                                                                ?>
                                                                <tr>
                                                                    <td><?php echo $no; ?></td>
                                                                    <td><?php echo $product->code; ?></td>
                                                                    <td>
                                                                        <div class="col-md-12">
                                                                            <div class="row">
                                                                                <div class="col-md-1">
                                                                                    <img src="<?php echo base_url().$path[0]; ?>" title="<?php echo $product->name; ?>" style="width:70px;height: 70px"/>
                                                                                </div>
                                                                                <div class="col-md-10">
                                                                                    <span style="font-weight:bold;color: orangered">Product Name : <?php echo $product->name; ?></span>
                                                                                    <p>weight : <?php echo $image[0]->weight;?></p>
                                                                                    <a onclick="delete_cartitem(<?php echo $item->cart_id; ?>)">Remove</a>
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                    </td>
                                                                    <td>Rs. <?php echo $item->gross_price; ?> /-</td>
                                                                    <td>Rs. <?php echo $item->discount; ?> /-</td>
                                                                    <td>Rs. <?php echo $item->net_price;?> /-</td>
                                                                    <td>
                                                                        <select onchange="change_qty(<?php echo $item->cart_id ?>,this.value);">
                                                                            <?php
                                                                            for( $a=1 ; $a<=3 ; $a++ )
                                                                            {
                                                                            ?>
                                                                            <option <?php 
                                                                            if ($a == $item->qty)
                                                                            {
                                                                                echo "selected";
                                                                            }
                                                                            ?>><?php echo $a;?></option>
                                                                            <?php
                                                                            }
                                                                            ?>
                                                                        </select>
                                                                    </td>
                                                                    <td>Rs. <?php echo $item->total_price;?> /-</td>
                                                                </tr>
                                                                <?php
                                                                $final_price =$final_price + $item->total_price;
                                                            }
                                                            ?>
                                                        </tbody>
                                                    </table>
                                                    <header class="row" style="line-height: 50px;background-color: orangered;width: 1100px"  >
                                                        <div class="col-md-8">
                                                            <div style="margin-left: 30px;margin-top: 5px;" >
                                                                <h6>Delevery And Payment Option Can Be Celected Later</h6>
                                                                <h6>Safe And Secure Payment</h6>
                                                                <h6>100% payment Protection</h6>
                                                            </div>
                                                        </div>
                                                        <div class="col-md-3">
                                                            <a href="<?php echo base_url();?>checkout" >
                                                            <div style="padding-top:20px">
                                                                <button class="login-btn hover-btn" name="" value="" type="">Proceed To Pay <?php echo $final_price; ?> /-</button>
                                                            </div>
                                                            </a>
                                                        </div>
                                                    </header> 
                                                </div>

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
                    <div class="row" style="background: white;">
                        <div class="col-md-12" style="padding: 60px; text-align: center;">
                            <p style="text-align: center; font-size: 100px; color: #ddd;"><i class="fa fa-shopping-cart"></i></p>
                            <h2 style="text-align: center; color: #ddd;">Hi <?php echo $name; ?>, Your Shopping Cart is Empty </h2>
                            <br>
                            <div class="signup-link" style="width: 250px;margin-left: 400px;border-radius: 7px">
                                <a style="font-size: 20px;cursor: pointer;" href="<?php base_url()?>home"><b>Continue Shopping</b></a>
                            </div>
                        </div>
                    </div>
                    <?php
                        }
                    
    }

        public function change_price()
    {
        $wh['image_id'] = $this->input->post('id');
        $product = $this->md->my_select('tbl_product_image','*',$wh);        
        $price = $product[0]->price;
        
        $com = $this->md->my_select('tbl_commission','rate')[0]->rate;
        $price = floor( $price + (($price * $com)/100) );
        $info = $this->md->my_select('tbl_product','*',array('product_id'=>$product[0]->product_id));
                    
                if($info[0]->offer_id != 0)
                {
                    $rate = $this->md->my_select('tbl_offer','*',array('offer_id'=>$info[0]->offer_id))[0]->rate;

                    $offer_price = floor(($price - ( $price * $rate)/100));
                ?>
                <li><div class="main-price color-discount">Discount Price<span>Rs. <?php echo $offer_price?> /-</span></div></li>

                    <li><div class="main-price mrp-price">MRP Price<span>Rs.<?php echo $price?>/-</span></div></li>

                <?php
                }
                else 
                {
                ?>
                    <li><div class="main-price color-discount">MRP Price<span>Rs.<?php echo $price; ?>/-</span></div></li>
                    <?php
                    }
                    ?>

<?php        
    }
    
    public function add_review()
    {
        $ins['register_id'] = $this->session->userdata('user');
        $ins['product_id'] = $this->input->post('id');
        $ins['rating'] = $this->input->post('rate');
        $ins['msg'] = $this->input->post('msg');
        $ins['date'] = date('Y-m-d h:i:s');
        $ins['status'] = 0;

        echo $this->md->my_insert('tbl_review',$ins);
    }

    public function seller_forgetps()
    {
        $wh['email'] = $this->input->post('email');
        
        $record = $this->md->my_select('tbl_seller','*',$wh);
        $count = count($record);
       
        if($count == 1)
        {
            $ps = $this->encryption->decrypt($record[0]->password);
            $email = $this->input->post('email');
            $name = $record[0]->name;
            $msg = "<b>Hello $name</b> <br/> Your Password is : $ps<br/> Please Next Time Be care And Not Share Any Other.";
            $title = "Seller Password recover";
            
            $result = $this->md->my_mailer($email,$title,$msg);
            echo $result;
            
        }
       else
       {
           echo 2;
       }
    }
    
    public function user_forgetps()
    {
        $wh['email'] = $this->input->post('email');
        
        $record = $this->md->my_select('tbl_register','*',$wh);
        $count = count($record);
       
        if($count == 1)
        {
            $ps = $this->encryption->decrypt($record[0]->password);
            $email = $this->input->post('email');
            $name = $record[0]->name;
            $msg = "<b>Hello $name</b> <br/> Your Password is : $ps<br/> Please Next Time Be care And Not Share Any Other.";
            $title = "Member Password recover";
            
            $result = $this->md->my_mailer($email,$title,$msg);
            
            echo $result;
            
        }
       else
       {
           echo 2;
       }
    }
    
    public function change_status()
    {
        $action = $this->input->post('action');
        $id = $this->input->post('id');
        
        if( $action == "seller")
        {
            $wh['seller_id'] = $id;
            $status = $this->md->my_select('tbl_seller','status',$wh)[0]->status;
            
            if($status == 1)
            {
                $data['status'] = 0;
            }
            else
            {
               $data['status'] = 1; 
            }
            $this->md->my_update('tbl_seller',$data,$wh);
        }
        
        else if($action == "product") 
        {
            $wh['product_id'] = $id;
            $status = $this->md->my_select('tbl_product','status',$wh)[0]->status;
            
            if($status == 1)
            {
                $data['status'] = 0;
            }
            else
            {
               $data['status'] = 1; 
            }
            $this->md->my_update('tbl_product',$data,$wh);
        }
        
        else if($action == "member") 
        {
            $wh['register_id'] = $id;
            $status = $this->md->my_select('tbl_register','status',$wh)[0]->status;
            
            if($status == 1)
            {
                $data['status'] = 0;
            }
            else
            {
               $data['status'] = 1; 
            }
            $this->md->my_update('tbl_register',$data,$wh);
        }
        else if($action == "review") 
        {
            $wh['review_id'] = $id;
            $status = $this->md->my_select('tbl_review','status',$wh)[0]->status;
            
            if($status == 1)
            {
                $data['status'] = 0;
            }
            else
            {
               $data['status'] = 1; 
            }
            $this->md->my_update('tbl_review',$data,$wh);
        }
        
        
    }
    
    public function set_address()
    {
        $ship_id = $this->input->post('id');
        
        $this->session->set_userdata('shipment_id',$ship_id);
        
?>
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
        <div class="signup-link" style="width: 250px;margin-left: 450px;border-radius: 7px">
            <a style="font-size: 17px;color: #FFF; cursor: pointer;" target="_new" href="<?php base_url()?>member-address"><b>+ Add New Address</b></a>
        </div>
        </div>             
<?php
    }
    
    public function set_promocode()
    {
        $code = $this->input->post('code');
       
        $billprice = $this->md->my_query("SELECT SUM(`total_price`) AS sm FROM `tbl_cart` WHERE `register_id` = '" . $this->session->userdata('user') . "'")[0]->sm;
         
        $wh['code'] = $code;
        $wh['status'] = 1;
        $wh['min_bill_price <='] = $billprice;
        
        $codedata = $this->md->my_select('tbl_promocode','*',$wh);
        $count = count($codedata);
        
        if( $count == 1)
        {
            $this->session->set_userdata('promocode_id',$codedata[0]->promocode_id);
            
?>
                    <?php 
                    if($this->session->userdata('promocode_id'))
                    {
                        $code_detail = $this->md->my_select('tbl_promocode','*',array('promocode_id'=>$this->session->userdata('promocode_id')))[0];
                        $amount = $code_detail->amount;

                        $pay_price = $billprice - $amount;
                ?>

            <div style="padding-top:20px">
                <button class="login-btn hover-btn"  name="checkout" value="yes" type="submit">PAY RS. <?php echo $pay_price; ?> /- SECURELY </button>
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

<?php
        }
        else 
        {
            echo 2;
        }
    }
    
    public function view_more()
    {
        $action = $this->input->post('action');
        $id = $this->input->post('id');
        $limit = $this->input->post('limit');
        
        
            if ($action == "main")
            {
                $product = $this->md->my_query("SELECT * FROM `tbl_product` WHERE `status` = 1 AND `main_id` = $id LIMIT 0,$limit");
            }
            elseif ($action == "sub")
            {
                $product = $this->md->my_query("SELECT * FROM `tbl_product` WHERE `status` = 1 AND `sub_id` = $id LIMIT 0,$limit");

            }
            elseif ($action == "peta")
            {
                $product = $this->md->my_query("SELECT * FROM `tbl_product` WHERE `status` = 1 AND `peta_id` = $id LIMIT 0,$limit");
            
             
            }
            elseif ($action == "search")
            {
                $value = $id;
                $search = str_replace("%20", " ", $value);
                
                $product = $this->md->my_query("SELECT * FROM `tbl_product` WHERE `status` = 1 AND `name` LIKE '%".$search."%' LIMIT 0,$limit;");
                
            }
            else 
            {
                $product = $this->md->my_query("SELECT * FROM `tbl_product` WHERE `status` = 1 LIMIT 0,$limit");
            }
            
            $count = count($product);
            ?>
            <div class="row">
                <div class="col-lg-12" >
                    <div class="product-top-dt">
                        <div class="product-left-title">
                            <h2>Product List</h2>
                        </div>
                        <div class="product-sort">
                            <div class="ui selection dropdown vchrt-dropdown">
                              <!---  <i class="dropdown icon d-icon"></i>--->
                                <div class="text">Showing <?php echo $count; ?> Result</div>

                               <!--- <div class="menu">
                                    <div class="item" data-value="0">Popularity</div>
                                    <div class="item" data-value="1">Price - Low to High</div>
                                    <div class="item" data-value="2">Price - High to Low</div>
                                    <div class="item" data-value="3">Alphabetical</div>
                                    <div class="item" data-value="4">Saving - High to Low</div>
                                    <div class="item" data-value="5">Saving - Low to High</div>
                                    <div class="item" data-value="6">% Off - High to Low</div>
                                </div>--->
                            </div>
                        </div>
                    </div>
                </div>
            </div>
                    
            <div class="product-list-view" >
                <div class="row">
                    <?php
                    if($count == 0)
                    {
                        ?>
                    <div style="padding: 100px;text-align: center;color: orangered">
                        <h1>No Product Found.</h1>
                    </div>
                    <?php
                    }
                    else 
                    {
                        foreach($product as $data)
                        {
                    ?>
                    <div class="col-lg-3 col-md-6">
                        <div class="product-item mb-30">
                            <a href="<?php echo base_url();?>product-detail/<?php echo $data->product_id;?>" class="product-img">
                                <?php 
                                    $wh['product_id']=$data->product_id;
                                    $multipath = $this->md->my_select('tbl_product_image','*',$wh)[0]->path;
                                    $path = explode(",", $multipath);
                                ?>
                                <img  style="height: 200px" src="<?php echo base_url().$path[0]; ?>" alt="">
                                <div class="product-absolute-options">

                                    <?php 

                                    if($data->offer_id != 0)
                                    {
                                        $rate = $this->md->my_select('tbl_offer','*',array('offer_id'=>$data->offer_id))[0]->rate;
                                     ?>
                                    <span class="offer-badge-1"><?php echo "$rate % OFF"?></span>
                                    <?php
                                    }
                                    ?>
                                </div>
                            </a>
                            <div class="product-text-dt">
                                <h4>
                                    <a style="text-transform: capitalize;" href="<?php echo base_url();?>product-detail/<?php echo $data->product_id;?>">
                                        <?php echo $data->name;?>
                                    </a>
                                </h4>
                                <?php 
                                    $wh['product_id']=$data->product_id;
                                    $price = $this->md->my_select('tbl_product_image','*',$wh)[0]->price;
                                ?>

                                    <?php 
                                    $com = $this->md->my_select('tbl_commission','rate')[0]->rate;
                                    $price = floor( $price + (($price * $com)/100) );

                                    if($data->offer_id != 0)
                                    {
                                        $offer_price = floor(($price - ( $price * $rate)/100));
                                    ?>
                                    <div class="product-price">Rs.<?php echo $offer_price; ?> /-<span>Rs.<?php echo $price; ?> /-</span> </div>
                                    <?php
                                    }
                                    else 
                                    {
                                        ?>
                                    <div class="product-price">Rs.<?php echo $price; ?> /-</div>
                                    <?php
                                    }
                                    ?>

                                    <div>
                                        <?php 
                                            $totalrate = $this->md->my_query("SELECT SUM(`rating`) as rate FROM `tbl_review` WHERE `product_id`=".$data->product_id)[0]->rate;
                                            $totalrecord = $this->md->my_query("SELECT COUNT(`rating`) as rate FROM `tbl_review` WHERE `product_id`=".$data->product_id)[0]->rate;

                                            if ($totalrate == 0)
                                            {
                                                $avg = 0;
                                            }
                                            else 
                                                {
                                                $avg = round($totalrate/$totalrecord);
                                                }
                                                for ($i=1 ; $i<=$avg ; $i++)
                                                {
                                            ?>
                                        <i style="color:orangered" class="fa fa-star"></i>
                                            <?php
                                                }
                                                $blank = 5-$avg;
                                                for($i=1 ; $i<=$blank ; $i++)
                                                {
                                             ?>
                                                <i class="fa fa-star"></i>
                                              <?php
                                                }
                                              ?>
                                    </div>
                            </div>
                        </div>
                    </div>
                    <?php
                        }

                    }
                    ?>
                    <div class="col-md-12">
                        <?php 
                        $limit = $limit + 4;
                        ?>
                        <div class="more-product-btn" onclick="view_more('<?php echo $action; ?>',<?php echo $id; ?>,<?php echo $limit; ?>)">
                            <button class="show-more-btn hover-btn">Show More</button>
                        </div>
                    </div>
                </div>
            </div>
        <?php
    }
    
    public function admin_viewbill()
    {
        $action = $this->input->post('action');
        $id = $this->input->post('id');
        
        if($action =="billno")
        {
            $billdata = $this->md->my_select('tbl_bill','*',array('bill_id'=>$id));
        }
        elseif($action =="date")
        {
            $billdata = $this->md->my_select('tbl_bill','*',array('bill_date'=>$id));
        }
        elseif ($action == "productname") 
        {
           $billdata = $this->md->my_query("SELECT b.* FROM `tbl_bill` as b , `tbl_transaction` as t WHERE b.`bill_id` = t.`bill_id` AND t.`product_id` = $id"); 
        }
        elseif($action =="pay_type")
        {
            $billdata = $this->md->my_select('tbl_bill','*',array('pay_type'=>$id));
        }
        elseif($action =="promocode")
        {
            $billdata = $this->md->my_select('tbl_bill','*',array('promocode_id'=>$id));
        }
   
        ?>
    <div class="element-wrapper">
                <div class="element-box">

                        <h5 class="form-header"><?php 
            if($action == "billno")
            {
                echo "Search Result For Bill No. $id";
            }
            elseif($action == "date")
            {
                echo "Search Result For Bill Date. ".date('d-m-Y', strtotime($id));
            }
            elseif($action == "productname")
            {
                echo "Search Result For Product Name. ";
            }
            elseif($action == "pay_type")
            {
                if($id == "card")
                {
                    echo "Search Result For Payment By Card. ";
                }
                else 
                {
                    echo "Search Result For Payment By Cashe On Delivery. ";
                }
                
            }
            elseif($action == "promocode")
            {
                echo "Search Result For Product Promocode. ";
            }
            
            
            ?></h5>
                <?php 
                    foreach($billdata as $data)
                    {
                ?>
                    <div class="element-wrapper" id="printableArea">
                            <div class="element-box" style="border: 1px solid #005cbf">
                                <p style="border-bottom: 3px solid #b3b7bb">invoice generated on : <?php echo date('d-m-Y', strtotime($data->bill_date));?><br>
                            <b>Retail / TextInvoice / Cash Memorandum</b><br>
                            <?php 
                            if($data->pay_type == "cod")
                            {
                                ?>
                            <b>Payment Mode : Cash On Delivery</b><br><br>
                            <?php
                            }
                            else
                            {
                                ?>
                            <b>Payment Mode : Card Payment</b><br><br>
                            <?php
                            }
                            ?>
                            <b>sold by:</b><br>
                            <?php 
                            $seller = $this->md->my_query("SELECT s. * FROM `tbl_bill` AS b , `tbl_transaction` as t , `tbl_product` as p , `tbl_seller` as s WHERE b.`bill_id` = t.`bill_id` AND t. `product_id` = p. `product_id` AND p.`seller_id` = s.`seller_id` AND b.`bill_id` = ".$data->bill_id)[0];
                            ?>
                            <b><?php echo $seller->company_name?></b><br>
                            <?php echo $seller->address?><br><br>

                            <b>GST No:<?php echo $seller->gst_no; ?></b> <br> 
                            <b>PAN NO:<?php echo $seller->pan_no; ?></b><br><br>
                            </p>
                            <div class="row" style="border-bottom: 3px solid #b3b7bb">
                                <div class="col-md-6" style="text-align:left;">
                                    <?php
                                    $user = $this->md->my_query("SELECT r.* FROM `tbl_bill` as b , `tbl_register` as r WHERE b. `register_id` = r. `register_id` AND b. `bill_id` = ".$data->bill_id)[0];
                                    $shipment = $this->md->my_query("SELECT s.* FROM `tbl_bill` as b , `tbl_shipment` as s WHERE b. `shipment_id` = s. `shipment_id` AND b. `bill_id` = ".$data->bill_id)[0]; 
                                    ?>
                                    <b>Billing Address</b><br><br>
                                    <p><?php echo $user->name; ?> <br>
                                        <?php echo $shipment->address; ?> <br>

                                        <b>Mobile:<?php echo $user->mobile; ?></b><br>
                                        <b>Email:<?php echo $user->email; ?></b>
                                    </p>
                                </div>
                                <div class="col-md-6" style="text-align:left">
                                    <b>Shipping Address</b><br><br>
                                    <p><?php echo $user->name; ?> <br>
                                        <?php echo $shipment->address; ?><br>

                                        <b>Mobile:<?php echo $user->mobile; ?></b><br>
                                        <b>Email:<?php echo $user->email; ?></b>
                                    </p>
                                </div>
                            </div>
                            <br>
                            <div class="table-responsive">
                                    <table id="" width="100%" class="table  table-lightfont">
                                        <thead style="text-align: center;vertical-align: middle">
                                            <tr>
                                                <th>No.</th>
                                                <th>Description.</th>
                                                <th>Gross Price.</th>
                                                <th>Discount</th>
                                                <th>Net Price</th>
                                                <th>Qty</th>
                                                <th>Total</th>
                                            </tr>
                                        </thead>
                                        <tbody style="text-align: center;vertical-align: middle;border-bottom: 2px solid #000">
                                            <?php
                                            $total = 0;
                                            $no=0;
                                                $tran = $this->md->my_select('tbl_transaction','*',array('bill_id'=>$data->bill_id));
                                            foreach ($tran as $tdata) 
                                            {
                                                $product = $this->md->my_select('tbl_product','*',array('product_id'=>$tdata->product_id))[0];
                                                $no++;
                                                $total = $total + $tdata->total_price;
                                                ?>
                                            <tr>
                                                    <td><?php echo $no; ?></td>
                                                    <td><?php echo $product->name; ?></td>
                                                    <td>Rs. <?php echo $tdata->gross_price; ?> /-</td>
                                                    <td>Rs. <?php echo $tdata->discount; ?> /-</td>
                                                    <td>Rs. <?php echo $tdata->net_price; ?> /-</td>
                                                    <td><?php echo $tdata->qty; ?></td>
                                                    <td>Rs. <?php echo $tdata->total_price; ?> /-</td>
                                                </tr>
                                                <?php
                                            }
                                            ?>
                                                <tr>
                                                    <td colspan="5"></td>
                                                    <td style="text-align: right"><b>Total Amount:</b></td>
                                                    <td style="text-align: left">Rs. <?php echo $total; ?> /-</td>
                                                </tr>
                                                <tr>
                                                    
                                                    <td colspan="5"></td>
                                                    <td style="text-align: right"><b>(-)Coupon:</b></td>
                                                    <?php 
                                                        if($data->promocode_id == 0)
                                                        {
                                                    ?>
                                                    <td style="text-align: left">Rs. 0 /-</td>
                                                    <?php
                                                        }
                                                        else
                                                        {
                                                        $promocode = $this->md->my_select('tbl_promocode','*',array('promocode_id'=>$data->promocode_id))[0];
                                                        ?>
                                                        <td style="text-align: left">Rs. <?php echo $promocode->amount; ?> /-</td>
                                                        <?php
                                                        }
                                                        
                                                    ?>
                                                </tr>
                                                <tr>
                                                    <td colspan="5"></td>
                                                    <td style="text-align: right"><b>Total Paid Amount:</b></td>
                                                    <td style="text-align: left" ><b>Rs. <?php echo $data->amount?> /-</b></td>
                                                </tr>
                                                
                                        </tbody>
                                    </table>
                                </div>
                                <p>*This is Computer generated Invoice. If you have queries then Contact Us.</p>
                                <div style="padding-left: 1050px">
                                    <button  class="btn btn-primary" onclick="printDiv('printableArea')" name="" value="Print" type="button">Print</button>
                                </div>
                            </div>
                        </div>
                <?php
                    }
                ?>
                        
                </div>
            </div>
            <script type="text/javascript">
                    function printDiv(divName) 
               {
                    var printContents = document.getElementById(divName).innerHTML;
                    var originalContents = document.body.innerHTML;

                    document.body.innerHTML = printContents;

                    window.print();

                    document.body.innerHTML = originalContents;
               }
                    
            </script>
        <?php
    }
    
    public function member_viewbill()
    {
       $action = $this->input->post('action');
       $id = $this->input->post('id'); 
       $rid = $this->session->userdata('user');
       if($action =="billno")
        {
            $billdata = $this->md->my_select('tbl_bill','*',array('bill_id'=>$id));
        }
        elseif($action =="date")
        {
            $billdata = $this->md->my_select('tbl_bill','*',array('bill_date'=>$id,'register_id'=>$rid));
        }
        elseif($action =="pay_type")
        {
            $rid = $this->session->userdata('user');
            $billdata = $this->md->my_select('tbl_bill','*',array('pay_type'=>$id,'register_id'=>$rid));
        }
        elseif($action =="promocode")
        {
            $billdata = $this->md->my_select('tbl_bill','*',array('promocode_id'=>$id,'register_id'=>$rid));
        }
       ?>
             <div class="element-wrapper">
                <div class="element-box">

                        <h5 class="form-header"><?php 
            if($action == "billno")
            {
                echo "Search Result For Bill No. $id";
            }
            elseif($action == "date")
            {
                echo "Search Result For Bill Date. ".date('d-m-Y', strtotime($id));
            }
            elseif($action == "pay_type")
            {
                if($id == "card")
                {
                    echo "Search Result For Payment By Card. ";
                }
                else 
                {
                    echo "Search Result For Payment By Cashe On Delivery. ";
                }
                
            }
            elseif($action == "promocode")
            {
                echo "Search Result For Product Promocode. ";
            }
            
            
            ?></h5>
                <?php 
                    foreach($billdata as $data)
                    {
                ?>
                    <div class="element-wrapper" id="printableArea">
                            <div class="element-box" style="border: 1px solid #005cbf">
                                <p style="border-bottom: 3px solid #b3b7bb">invoice generated on : <?php echo date('d-m-Y', strtotime($data->bill_date));?><br>
                            <b>Retail / TextInvoice / Cash Memorandum</b><br>
                            <?php 
                            if($data->pay_type == "cod")
                            {
                                ?>
                            <b>Payment Mode : Cash On Delivery</b><br><br>
                            <?php
                            }
                            else
                            {
                                ?>
                            <b>Payment Mode : Card Payment</b><br><br>
                            <?php
                            }
                            ?>
                            <b>sold by:</b><br>
                            <?php 
                            $seller = $this->md->my_query("SELECT s. * FROM `tbl_bill` AS b , `tbl_transaction` as t , `tbl_product` as p , `tbl_seller` as s WHERE b.`bill_id` = t.`bill_id` AND t. `product_id` = p. `product_id` AND p.`seller_id` = s.`seller_id` AND b.`bill_id` = ".$data->bill_id)[0];
                            ?>
                            <b><?php echo $seller->company_name?></b><br>
                            <?php echo $seller->address?><br><br>

                            <b>GST No:<?php echo $seller->gst_no; ?></b> <br> 
                            <b>PAN NO:<?php echo $seller->pan_no; ?></b><br><br>
                            </p>
                            <div class="row" style="border-bottom: 3px solid #b3b7bb">
                                <div class="col-md-6" style="text-align:left;">
                                    <?php
                                    $user = $this->md->my_query("SELECT r.* FROM `tbl_bill` as b , `tbl_register` as r WHERE b. `register_id` = r. `register_id` AND b. `bill_id` = ".$data->bill_id)[0];
                                    $shipment = $this->md->my_query("SELECT s.* FROM `tbl_bill` as b , `tbl_shipment` as s WHERE b. `shipment_id` = s. `shipment_id` AND b. `bill_id` = ".$data->bill_id)[0]; 
                                    ?>
                                    <b>Billing Address</b><br><br>
                                    <p><?php echo $user->name; ?> <br>
                                        <?php echo $shipment->address; ?> <br>

                                        <b>Mobile:<?php echo $user->mobile; ?></b><br>
                                        <b>Email:<?php echo $user->email; ?></b>
                                    </p>
                                </div>
                                <div class="col-md-6" style="text-align:left">
                                    <b>Shipping Address</b><br><br>
                                    <p><?php echo $user->name; ?> <br>
                                        <?php echo $shipment->address; ?><br>

                                        <b>Mobile:<?php echo $user->mobile; ?></b><br>
                                        <b>Email:<?php echo $user->email; ?></b>
                                    </p>
                                </div>
                            </div>
                            <br>
                            <div class="table-responsive">
                                    <table id="" width="100%" class="table  table-lightfont">
                                        <thead style="text-align: center;vertical-align: middle">
                                            <tr>
                                                <th>No.</th>
                                                <th>Description.</th>
                                                <th>Gross Price.</th>
                                                <th>Discount</th>
                                                <th>Net Price</th>
                                                <th>Qty</th>
                                                <th>Total</th>
                                            </tr>
                                        </thead>
                                        <tbody style="text-align: center;vertical-align: middle;border-bottom: 2px solid #000">
                                            <?php
                                            $total = 0;
                                            $no=0;
                                                $tran = $this->md->my_select('tbl_transaction','*',array('bill_id'=>$data->bill_id));
                                            foreach ($tran as $tdata) 
                                            {
                                                $product = $this->md->my_select('tbl_product','*',array('product_id'=>$tdata->product_id))[0];
                                                $no++;
                                                $total = $total + $tdata->total_price;
                                                ?>
                                            <tr>
                                                    <td><?php echo $no; ?></td>
                                                    <td><?php echo $product->name; ?></td>
                                                    <td>Rs. <?php echo $tdata->gross_price; ?> /-</td>
                                                    <td>Rs. <?php echo $tdata->discount; ?> /-</td>
                                                    <td>Rs. <?php echo $tdata->net_price; ?> /-</td>
                                                    <td><?php echo $tdata->qty; ?></td>
                                                    <td>Rs. <?php echo $tdata->total_price; ?> /-</td>
                                                </tr>
                                                <?php
                                            }
                                            ?>
                                                <tr>
                                                    <td colspan="5"></td>
                                                    <td style="text-align: right"><b>Total Amount:</b></td>
                                                    <td style="text-align: left">Rs. <?php echo $total; ?> /-</td>
                                                </tr>
                                                <tr>
                                                    
                                                    <td colspan="5"></td>
                                                    <td style="text-align: right"><b>(-)Coupon:</b></td>
                                                    <?php 
                                                        if($data->promocode_id == 0)
                                                        {
                                                    ?>
                                                    <td style="text-align: left">Rs. 0 /-</td>
                                                    <?php
                                                        }
                                                        else
                                                        {
                                                        $promocode = $this->md->my_select('tbl_promocode','*',array('promocode_id'=>$data->promocode_id))[0];
                                                        ?>
                                                        <td style="text-align: left">Rs. <?php echo $promocode->amount; ?> /-</td>
                                                        <?php
                                                        }
                                                        
                                                    ?>
                                                </tr>
                                                <tr>
                                                    <td colspan="5"></td>
                                                    <td style="text-align: right"><b>Total Paid Amount:</b></td>
                                                    <td style="text-align: left" ><b>Rs. <?php echo $data->amount?> /-</b></td>
                                                </tr>
                                                
                                        </tbody>
                                    </table>
                                </div>
                                <p>*This is Computer generated Invoice. If you have queries then Contact Us.</p>
                                <div style="padding-left: 1050px">
                                    <button  class="btn btn-primary" onclick="printDiv('printableArea')" name="" value="Print" type="button">Print</button>
                                </div>
                            </div>
                        </div>
                <?php
                    }
                ?>
                        
                </div>
            </div>
            
            <script type="text/javascript">
                    function printDiv(divName) 
               {
                    var printContents = document.getElementById(divName).innerHTML;
                    var originalContents = document.body.innerHTML;

                    document.body.innerHTML = printContents;

                    window.print();

                    document.body.innerHTML = originalContents;
               }
                    
            </script>
       <?php
    }
}

