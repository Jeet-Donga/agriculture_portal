<html lang="en">

    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, shrink-to-fit=9">
        <meta name="description" content="Gambolthemes">
        <meta name="author" content="Gambolthemes">
        <title>Shoping Cart-Agriculture Portal</title>

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
                                    <li class="breadcrumb-item"><a href="<?php base_url() ?>home">Home</a></li>
                                    <li class="breadcrumb-item active" aria-current="page">My Cart</li>
                                </ol>
                            </nav>
                        </div>
                    </div>
                </div>
            </div>
            <div class="all-product-grid">
                <div class="container">
                    <section style="margin-bottom: 40px" id="cartdata">
                    <?php
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
                                                                                    <a style="background-color: #f2f2f2; cursor: pointer" onclick="delete_cartitem(<?php echo $item->cart_id; ?>)">Remove</a>
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
                        </section>
                </div>
            </div>
            <?php
            $this->load->view('footer');
            ?>

            <?php
            $this->load->view('footerscript');
            ?>
            <script type="text/javascript">
                
            function clear_cart()
            {
                var c = confirm('Are You Sure Went To Delete All Iteams ?');
                
                if ( c == 1)
                {
                    var data = { };
                    var path = 'http://localhost/agriculture_portal/backend/clear_cart/';

                    $.post(path , data , function(output){

                    $("#cartdata").html(output);

                    });
                }
            }
            
            function delete_cartitem(id)
            {
                var c = confirm('Are You Sure Went To Delete This Iteams ?');
                
                if ( c == 1)
                {
                    var data = { id:id };
                    var path = 'http://localhost/agriculture_portal/backend/delete_cartitem/';

                    $.post(path , data , function(output){

                    $("#cartdata").html(output);

                    });
                }
            }
            
            function change_qty(id , qty)
            {
                
                var data = { id:id , qty:qty };
                var path = 'http://localhost/agriculture_portal/backend/change_qty/';

                $.post(path , data , function(output){

                $("#cartdata").html(output);

                });
                
            }
            </script>

    </body>

</html>


