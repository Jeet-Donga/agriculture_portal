<?php
$wh['product_id'] = $this->uri->segment(2);
$detail = $this->md->my_select('tbl_product', '*', $wh)[0];

$img = $this->md->my_select('tbl_product_image', '*', $wh)[0]->image_id;
$this->session->set_userdata('image_id', $img);
?>

<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, shrink-to-fit=9">
        <meta name="description" content="Gambolthemes">
        <meta name="author" content="Gambolthemes">
        <title> <?php echo $detail->name; ?> - Agriculture Portal </title>

        <?php
        $this->load->view('headerlink');
        ?>
        <link href="<?php echo base_url(); ?>assets/css/star-rating.min.css" rel="stylesheet" type="text/css"/>

    </head>
    <body style="margin: 0px !important;" >
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
                                    <li class="breadcrumb-item"><a href="<?php echo base_url('home'); ?>">Home</a></li>
                                    <li class="breadcrumb-item active" aria-current="page">Product Detail</li>
                                    <li class="breadcrumb-item"><?php echo $detail->name; ?></li>

                                </ol>
                            </nav>
                        </div>
                    </div>
                </div>
            </div>
            <div class="all-product-grid">
                <div class="container">
                    <div class="row">

                        <div class="col-lg-12">
                            <div class="product-dt-view">
                                <div class="row">
                                    <div class="col-lg-4 col-md-4" id="view_img">
                                        <?php
                                        $multipath = $this->md->my_select('tbl_product_image', '*', $wh)[0]->path;
                                        $path = explode(",", $multipath);
                                        ?> 
                                        <div id="sync1" class="owl-carousel owl-theme">
                                            <?php
                                            foreach ($path as $single) {
                                                ?>
                                                <div class="item">
                                                    <img src="<?php echo base_url() . $single; ?>" style="width:350px;height: 465px;">
                                                </div>
                                                <?php
                                            }
                                            ?>
                                        </div>
                                        <div id="sync2" class="owl-carousel owl-theme">
                                            <?php
                                            foreach ($path as $single) {
                                                ?>
                                                <div class="item">
                                                    <img src="<?php echo base_url() . $single; ?>" style="width:150px;height: 100px;">
                                                </div>
                                                <?php
                                            }
                                            ?>
                                        </div>
                                    </div>
                                    <div class="col-lg-8 col-md-8">
                                        <div class="product-dt-right">
                                            <h2><?php echo $detail->name; ?></h2>
                                            <div class="no-stock">
                                                <?php
                                                $whh['category_id'] = $detail->peta_id;
                                                $name = $this->md->my_select('tbl_category', '*', $whh)[0]->name;
                                                ?>
                                                <p class="pd-no">Product Code.<span><?php echo $detail->code; ?></span></p>
                                                <p class="stock-qty">Category:<span><?php echo $name; ?></span></p>
                                            </div>

                                            <div class="no-stock">
                                                <p class="stock-qty" id="stock_status">Available :
                                                    <?php
                                                    $stock = $this->md->my_select('tbl_product_image', '*', array('product_id' => $detail->product_id))[0]->qty;
                                                    if ($stock > 0) {
                                                        ?>
                                                        <span style="color: green">(In Stock)</span>
                                                        <?php
                                                    } else {
                                                        ?>
                                                        <span style="color: red">(Out of Stock)</span>

                                                        <?php
                                                    }
                                                    ?>
                                                </p>

                                                <?php
                                                $whhh['seller_id'] = $detail->seller_id;
                                                $name = $this->md->my_select('tbl_seller', '*', $whhh)[0]->company_name;
                                                ?>
                                                <p class="stock-qty">Sold By:<span><?php echo $name; ?></span></p>
                                            </div>
                                            <div class="product-radio">
                                                <ul class="product-now">
                                                    <?php
                                                    $img = $this->md->my_select('tbl_product_image', '*', array('product_id' => $detail->product_id));

                                                    foreach ($img as $weight) {
                                                        ?>
                                                        <li>
                                                            <input type="radio" id="p1" name="product1" >
                                                            <label for="p1" id="img_<?php echo $weight->image_id; ?>" onclick="change_img(<?php echo $weight->image_id; ?>);change_stock(<?php echo $weight->image_id; ?>);change_price(<?php echo $weight->image_id; ?>);change_cartbtn(<?php echo $weight->image_id; ?>)" title="<?php echo $weight->weight; ?>"><?php echo $weight->weight; ?></label>;
                                                        </li>
                                                        <?php
                                                    }
                                                    ?>
                                                </ul>
                                            </div>
                                            <p class="pp-descp">
                                            <h4>Description</h4>
                                            <?php echo $detail->description; ?> 
                                            </p>
                                            <div class="product-group-dt">
                                                <ul id="price">         
                                                    <?php
                                                    $whhhh['product_id'] = $this->uri->segment(2);
                                                    $price = $this->md->my_select('tbl_product_image', '*', $whhhh)[0]->price;
                                                    ?>

                                                    <?php
                                                    $com = $this->md->my_select('tbl_commission', 'rate')[0]->rate;
                                                    $price = floor($price + (($price * $com) / 100));

                                                    if ($detail->offer_id != 0) {
                                                        $rate = $this->md->my_select('tbl_offer', '*', array('offer_id' => $detail->offer_id))[0]->rate;

                                                        $offer_price = floor(($price - ( $price * $rate) / 100));
                                                        ?>
                                                        <li><div class="main-price color-discount">Discount Price<span>Rs. <?php echo $offer_price ?> /-</span></div></li>

                                                        <li><div class="main-price mrp-price">MRP Price<span>Rs.<?php echo $price ?>/-</span></div></li>

                                                        <?php
                                                    } else {
                                                        ?>
                                                        <li><div class="main-price color-discount">MRP Price<span>Rs.<?php echo $price; ?>/-</span></div></li>
                                                        <?php
                                                    }
                                                    ?>

                                                </ul>

                                                <ul class="ordr-crt-share">
                                                    <li id="wishbtn">
                                                        <?php
                                                        if ($this->session->userdata('user')) {
                                                            $wish['register_id'] = $this->session->userdata('user');
                                                            $wish['product_id'] = $detail->product_id;

                                                            $count = count($this->md->my_select('tbl_wishlist', '*', $wish));

                                                            if ($count == 0) {
                                                                ?>
                                                                <a onclick="add_wish(<?php echo $detail->product_id; ?>)">
                                                                    <span class="like-icon save-icon " title="wishlist"></span>
                                                                </a>
                                                                <?php
                                                            } else {
                                                                ?>
                                                                <a>
                                                                    <span class="like-icon save-icon liked " title="Added  In wishlist"></span>
                                                                </a>
                                                                <?php
                                                            }
                                                        } else {
                                                            ?>
                                                            <a href=" <?php echo base_url(); ?>login" >
                                                                <span class="like-icon save-icon "  title="wishlist"></span>
                                                            </a>
                                                            <?php
                                                        }
                                                        ?>
                                                    </li>
                                                    <li id="cartbtn">
                                                        <?php
                                                        if ($this->session->userdata('user')) {
                                                            $cart['register_id'] = $this->session->userdata('user');
                                                            $cart['product_id'] = $detail->product_id;
                                                            $cart['image_id'] = $this->session->userdata('image_id');

                                                            $count = count($this->md->my_select('tbl_cart', '*', $cart));

                                                            if ($count > 0) {
                                                                ?>
                                                                <button class="add-cart-btn hover-btn"  style="height: 50px" >
                                                                    <i class="uil uil-shopping-cart-alt"></i>Added In Cart
                                                                </button>
                                                                <?php
                                                            } else {
                                                                ?>
                                                                <button class="add-cart-btn hover-btn" onclick="add_cart(<?php echo $detail->product_id; ?>);" style="height: 50px" >
                                                                    <i class="uil uil-shopping-cart-alt"></i>Add to Cart
                                                                </button>
                                                                <?php
                                                            }
                                                        } else {
                                                            ?>
                                                            <a href="<?php echo base_url() ?>login">
                                                                <button  class="add-cart-btn hover-btn" >
                                                                    <i class="uil uil-shopping-cart-alt"></i>Add to Cart
                                                                </button></a>
                                                            <?php
                                                        }
                                                        ?>
                                                    </li>
                                                </ul>
                                            </div>
                                            <div class="pdp-details">
                                                <ul>
                                                    <li>
                                                        <div class="pdp-group-dt">
                                                            <div class="pdp-icon"><i class="uil uil-usd-circle"></i></div>
                                                            <div class="pdp-text-dt">
                                                                <span>Lowest Price Guaranteed</span>
                                                                <p>Get difference refunded if you find it cheaper anywhere else.</p>
                                                            </div>
                                                        </div>
                                                    </li>
                                                    <li>
                                                        <div class="pdp-group-dt">
                                                            <div class="pdp-icon"><i class="uil uil-cloud-redo"></i></div>
                                                            <div class="pdp-text-dt">
                                                                <span>Easy Returns & Refunds</span>
                                                                <p>Return products at doorstep and get refund in seconds.</p>
                                                            </div>
                                                        </div>
                                                    </li>
                                                </ul>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row">

                        <div class="col-lg-12 col-md-12">
                            <div class="pdpt-bg">
                                <div class="pdpt-title">
                                    <h4>Product Details</h4>
                                </div>
                                <div class="panel-group accordion pt-1" id="accordion0">
                                    <div class="panel panel-default">
                                        <div class="panel-heading" id="headingOne">
                                            <div class="panel-title">
                                                <a class="collapsed" data-toggle="collapse" data-target="#collapseOne" href="#" aria-expanded="true" aria-controls="collapseOne">
                                                    <b style="color:orangered" >Description</b>
                                                </a>
                                            </div>
                                        </div>
                                        <div id="collapseOne" class="callapse show" role="tabpanel" aria-labelledby="headingOne" data-parent="#accordion0" style="">
                                            <div class="panel-body">
                                                <p><?php echo $detail->description; ?></p>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="panel panel-default">
                                        <div class="panel-heading" id="headingTwo">
                                            <div class="panel-title">
                                                <a class="collapsed" data-toggle="collapse" data-target="#collapseTwo" href="#" aria-expanded="false" aria-controls="collapseTwo">
                                                    <b style="color:orangered" >Specification</b>
                                                </a>
                                            </div>
                                        </div>
                                        <div id="collapseTwo" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingTwo" data-parent="#accordion0">
                                            <div class="panel-body">
                                                <p><?php echo $detail->specification; ?></p>
                                            </div>
                                        </div>
                                    </div>
                                    <?php
                                    if ($this->session->userdata('user')) {
                                        $user = $this->md->my_select('tbl_register', '*', array('register_id' => $this->session->userdata('user')))[0];
                                        ?>
                                        <div class="panel panel-default">
                                            <div class="panel-heading" id="headingThree">
                                                <div class="panel-title">
                                                    <a class="collapsed" data-toggle="collapse" data-target="#collapseThree" href="#" aria-expanded="false" aria-controls="collapseThree">
                                                        <b style="color:orangered" >Write Reviews</b>
                                                    </a>
                                                </div>
                                            </div>
                                            <div id="collapseThree" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingThree" data-parent="#accordion0">
                                                <div class="panel-body">
                                                    <div class="form-group mt-1">
                                                        <div class="form-group pos_rel">
                                                            <?php
                                                            if (strlen($user->profile_pic) > 0) {
                                                                ?>
                                                                <img src="<?php echo base_url() . $user->profile_pic ?>" style="width:100px;height: 100px;border-radius: 100px" />
                                                                <?php
                                                            } else {
                                                                ?>
                                                                <img src="<?php echo base_url(); ?>member_assets/img/blankuser.png"  style="width:100px;height: 100px;border-radius: 100px"/>
                                                                <?php
                                                            }
                                                            ?>
                                                            <h5 style="text-transform: capitalize;"><?php echo $user->name; ?></h5>

                                                            <input id="input-id" name="rating" type="text" class="rating rating-loading" data-min="0" data-max="5" data-step="1">

                                                        </div>
                                                        <div class="field">
                                                            <label class="control-label" ><b><h5 style="color: orangered">Write Review</h5></b></label>
                                                            <textarea  id="review" class="form-control"  placeholder="Write Review Message" style="resize: none;" value="" /></textarea>
                                                        </div>
                                                        </br>
                                                        <button class="login-btn hover-btn" style="width:150px" onclick="add_review(<?php echo $detail->product_id; ?>)">Submit</button>
                                                        <span style="color: red;font-size: 13px" id="review-error"></span>
                                                        <span style="color: green;font-size: 13px" id="review-success"></span>

                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <?php
                                    }
                                    ?>
                                    <div class="panel panel-default">
                                        <div class="panel-heading" id="headingfour">
                                            <div class="panel-title">
                                                <a class="collapsed" data-toggle="collapse" data-target="#collapsefour" href="#" aria-expanded="false" aria-controls="collapsefour">
                                                    <b style="color:orangered" >View Review</b> 
                                                </a>
                                            </div>
                                        </div>
                                        <div id="collapsefour" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingfour" data-parent="#accordion0">
                                            <div class="panel-body">
                                                <?php
                                                $review = $this->md->my_select('tbl_review', '*', array('status' => 1, 'product_id' => $detail->product_id));
                                                foreach ($review as $data) {
                                                    $user = $this->md->my_select('tbl_register', '*', array('register_id' => $data->register_id))[0];
                                                    ?>
                                                    <p>
                                                    <div  class="row" style="margin: 10px 0px">
                                                        <div class="col-md-1">
                                                            <?php
                                                            if (strlen($user->profile_pic) > 0) {
                                                                ?>
                                                                <img src="<?php echo base_url() . $user->profile_pic; ?>"  style="width:80px;height: 80px;border-radius: 80px"/>

                                                                <?php
                                                            } else {
                                                                ?>
                                                                <img src="<?php echo base_url(); ?>member_assets/img/blankuser.png"  style="width:80px;height: 80px;border-radius: 80px"/>
                                                                <?php
                                                            }
                                                            ?>
                                                        </div>
                                                        <div class="col-md-11">
                                                            <p style="font-weight:bold"><?php echo $user->name; ?></p>
                                                            <p><?php echo $data->msg; ?></p>
                                                            <p style="font-size:12px">Post on <?php echo date('d-m-Y h:i:s', strtotime($data->date)); ?></p>
                                                        </div>
                                                    </div>
                                                    </p>
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
                </div>
            </div>
            <!--------ralated product--------->
            <div class="section145">
                <div class="container">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="main-title-tt">
                                <div class="main-title-left">
                                    <span>For You</span>
                                    <h2>Related Products</h2>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-12">
                            <div class="owl-carousel featured-slider owl-theme">
                                <?php
                                $whe['sub_id'] = $detail->sub_id;
                                $related = $this->md->my_select('tbl_product', '*', $whe);
                                foreach ($related as $single) {
                                    ?>
                                    <div class="product-item mb-30">
                                        <div class="item">
                                            <a href="<?php echo base_url(); ?>product-detail/<?php echo $single->product_id; ?>" class="product-img">
                                                <?php
                                                $whm['product_id'] = $single->product_id;
                                                $multipath = $this->md->my_select('tbl_product_image', '*', $whm)[0]->path;
                                                $path = explode(",", $multipath);
                                                ?>
                                                <img  style="height: 200px" src="<?php echo base_url() . $path[0]; ?>" alt="">
                                                <div class="product-absolute-options">
                                                    <?php
                                                    if ($single->offer_id != 0) {
                                                        $rate = $this->md->my_select('tbl_offer', '*', array('offer_id' => $single->offer_id))[0]->rate;
                                                        ?>
                                                        <span class="offer-badge-1"><?php echo "$rate % OFF" ?></span>
                                                        <?php
                                                    }
                                                    ?>
                                                </div>
                                            </a>
                                            <div class="product-text-dt">
                                                <h4>
                                                    <a style="text-transform: capitalize;" href="<?php echo base_url(); ?>product-detail/<?php echo $single->product_id; ?>">
                                                        <?php echo $single->name; ?>
                                                    </a>
                                                </h4>
                                                <?php
                                                $wh['product_id'] = $single->product_id;
                                                $price = $this->md->my_select('tbl_product_image', '*', $wh)[0]->price;
                                                ?>

                                                <?php
                                                $com = $this->md->my_select('tbl_commission', 'rate')[0]->rate;
                                                $price = floor($price + (($price * $com) / 100));

                                                if ($single->offer_id != 0) {
                                                    $offer_price = floor(($price - ( $price * $rate) / 100));
                                                    ?>
                                                    <div class="product-price">Rs.<?php echo $offer_price; ?> /-<span>Rs.<?php echo $price; ?> /-</span> </div>
                                                    <?php
                                                } else {
                                                    ?>
                                                    <div class="product-price">Rs.<?php echo $price; ?> /-</div>
                                                    <?php
                                                }
                                                ?>
                                                <div>
                                                    <?php
                                                    $totalrate = $this->md->my_query("SELECT SUM(`rating`) as rate FROM `tbl_review` WHERE `product_id`=" . $data->product_id)[0]->rate;
                                                    $totalrecord = $this->md->my_query("SELECT COUNT(`rating`) as rate FROM `tbl_review` WHERE `product_id`=" . $data->product_id)[0]->rate;

                                                    if ($totalrate == 0) {
                                                        $avg = 0;
                                                    } else {
                                                        $avg = round($totalrate / $totalrecord);
                                                    }
                                                    for ($i = 1; $i <= $avg; $i++) {
                                                        ?>
                                                        <i style="color:orangered" class="fa fa-star"></i>
                                                        <?php
                                                    }
                                                    $blank = 5 - $avg;
                                                    for ($i = 1; $i <= $blank; $i++) {
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
                                ?>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <?php
            if ($this->session->userdata('user')) {

                $ins['register_id'] = $this->session->userdata('user');
                $ins['product_id'] = $detail->product_id;

                $count = count($this->md->my_select('tbl_recent_view', '*', $ins));

                if ($count == 0) {
                    $this->md->my_insert('tbl_recent_view', $ins);
                }
                ?>
                <div class="section145">
                    <div class="container">
                        <div class="row">
                            <div class="col-md-12">
                                <div class="main-title-tt">
                                    <div class="main-title-left">
                                        <h2>Recently View Products</h2>
                                    </div>

                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="owl-carousel featured-slider owl-theme">
                                    <?php
                                    $wee['register_id'] = $this->session->userdata('user');
                                    $wee['product_id !='] = $detail->product_id;
                                    $view = $this->md->my_select('tbl_recent_view', '*', $wee);
                                    foreach ($view as $single) {
                                        $data = $this->md->my_select('tbl_product', '*', array('product_id' => $single->product_id))[0];
                                        ?>
                                        <div class="product-item mb-30">
                                            <div class="item">
                                                <a href="<?php echo base_url(); ?>product-detail/<?php echo $single->product_id; ?>" class="product-img">
                                                    <?php
                                                    $wh['product_id'] = $single->product_id;
                                                    $multipath = $this->md->my_select('tbl_product_image', '*', $wh)[0]->path;
                                                    $path = explode(",", $multipath);
                                                    ?>
                                                    <img  style="height: 200px" src="<?php echo base_url() . $path[0]; ?>" alt="">
                                                    <div class="product-absolute-options">

                                                        <?php
                                                        if ($data->offer_id != 0) {
                                                            $rate = $this->md->my_select('tbl_offer', '*', array('offer_id' => $data->offer_id))[0]->rate;
                                                            ?>
                                                            <span class="offer-badge-1"><?php echo "$rate % OFF" ?></span>
                                                            <?php
                                                        }
                                                        ?>
                                                    </div>
                                                </a>
                                                <div class="product-text-dt">
                                                    <h4>
                                                        <a style="text-transform: capitalize;" href="<?php echo base_url(); ?>product-detail/<?php echo $single->product_id; ?>">
                                                            <?php echo $data->name; ?>
                                                        </a>
                                                    </h4>
                                                    <?php
                                                    $wh['product_id'] = $data->product_id;
                                                    $price = $this->md->my_select('tbl_product_image', '*', $wh)[0]->price;
                                                    ?>

                                                    <?php
                                                    $com = $this->md->my_select('tbl_commission', 'rate')[0]->rate;
                                                    $price = floor($price + (($price * $com) / 100));

                                                    if ($data->offer_id != 0) {
                                                        $offer_price = floor(($price - ( $price * $rate) / 100));
                                                        ?>
                                                        <div class="product-price">Rs.<?php echo $offer_price; ?> /-<span>Rs.<?php echo $price; ?> /-</span> </div>
                                                        <?php
                                                    } else {
                                                        ?>
                                                        <div class="product-price">Rs.<?php echo $price; ?> /-</div>
                                                        <?php
                                                    }
                                                    ?>
                                                    <div>
                                                        <?php
                                                        $totalrate = $this->md->my_query("SELECT SUM(`rating`) as rate FROM `tbl_review` WHERE `product_id`=" . $data->product_id)[0]->rate;
                                                        $totalrecord = $this->md->my_query("SELECT COUNT(`rating`) as rate FROM `tbl_review` WHERE `product_id`=" . $data->product_id)[0]->rate;

                                                        if ($totalrate == 0) {
                                                            $avg = 0;
                                                        } else {
                                                            $avg = round($totalrate / $totalrecord);
                                                        }
                                                        for ($i = 1; $i <= $avg; $i++) {
                                                            ?>
                                                            <i style="color:orangered" class="fa fa-star"></i>
                                                            <?php
                                                        }
                                                        $blank = 5 - $avg;
                                                        for ($i = 1; $i <= $blank; $i++) {
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
                                    ?>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <?php
            }
            ?>

        </div>

        <?php
        $this->load->view('footer');
        ?>

        <script src="https://code.jquery.com/jquery-2.2.4.js" integrity="sha256-iT6Q9iMJYuQiMWNd9lDyBUStIq/8PuOW33aOqmvFpqI=" crossorigin="anonymous"></script>
        <script src="<?php echo base_url(); ?>assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
        <script src="<?php echo base_url(); ?>assets/vendor/OwlCarousel/owl.carousel.js"></script>
        <script src="<?php echo base_url(); ?>assets/vendor/semantic/semantic.min.js"></script>
        <script src="<?php echo base_url(); ?>assets/js/jquery.countdown.min.js"></script>
        <script src="<?php echo base_url(); ?>assets/js/custom.js"></script>
        <script src="<?php echo base_url(); ?>assets/js/product.thumbnail.slider.js"></script>
        <script src="<?php echo base_url(); ?>assets/js/offset_overlay.js"></script>
        <script src="<?php echo base_url(); ?>assets/js/night-mode.js"></script>

        <script type="text/javascript">

                                                        function change_img(id)
                                                        {
                                                            $data = {id: id};

                                                            var path = 'http://localhost/agriculture_portal/backend/change_img/';

                                                            $.post(path, $data, function (output) {
                                                                $("#view_img").html(output);

                                                            });
                                                        }
                                                        function change_stock(id)
                                                        {
                                                            $data = {id: id};

                                                            var path = 'http://localhost/agriculture_portal/backend/change_stock/';

                                                            $.post(path, $data, function (output) {
                                                                if (output > 0)
                                                                {
                                                                    $('#stock_status').html('Available : <span style="color: green">(In Stock)</span>');
                                                                } else
                                                                {
                                                                    $('#stock_status').html('Available : <span style="color: red">(Out of Stock)</span>');
                                                                }

                                                            });
                                                        }

                                                        function change_price(id)
                                                        {
                                                            $data = {id: id};

                                                            var path = 'http://localhost/agriculture_portal/backend/change_price/';

                                                            $.post(path, $data, function (output) {
                                                                $("#price").html(output);
                                                            });
                                                        }

                                                        function add_wish(id)
                                                        {
                                                            $data = {id: id};

                                                            var path = 'http://localhost/agriculture_portal/backend/add_wish/';

                                                            $.post(path, $data, function (output) {
                                                                if (output == 1)
                                                                {
                                                                    $("#wishbtn").html('<a><span class="like-icon save-icon liked " title="Added  In wishlist"></span></a>');
                                                                }
                                                            });
                                                        }

                                                        function add_review(id)
                                                        {
                                                            var rate = $("#input-id").val();
                                                            var msg = $("#review").val();

                                                            if (rate == "" || msg == "")
                                                            {
                                                                $("#review-error").html('Please Enter Detail Properly.');
                                                            } else
                                                            {
                                                                var data = {id: id, rate: rate, msg: msg};
                                                                var path = 'http://localhost/agriculture_portal/backend/add_review/';

                                                                $.post(path, data, function (output) {

                                                                    if (output == "0")
                                                                    {
                                                                        $("#review-error").html('Something Went Wrong.Try Again');
                                                                    }
                                                                    if (output == "1")
                                                                    {
                                                                        $("#review-success").html('Thank You For Giving Review');
                                                                    }

                                                                });
                                                            }
                                                        }

                                                        function change_cartbtn(id)
                                                        {
                                                            $data = {id: id};

                                                            var path = 'http://localhost/agriculture_portal/backend/change_cartbtn/';

                                                            $.post(path, $data, function (output) {

                                                                $("#cartbtn").html(output);

                                                            });
                                                        }

                                                        function add_cart(id)
                                                        {
                                                            $data = {id: id};

                                                            var path = 'http://localhost/agriculture_portal/backend/add_cart/';

                                                            $.post(path, $data, function (output) {

                                                                if (output == 1)
                                                                {
                                                                    $("#cartbtn").html('<button class="add-cart-btn hover-btn"  style="height: 50px" ><i class="uil uil-shopping-cart-alt"></i>Added In Cart</button>')
                                                                }

                                                            });
                                                        }


        </script>
        <script src="<?php echo base_url(); ?>assets/js/star-rating.min.js" type="text/javascript"></script>
        <script>
                                                        $("#input-id").rating();
        </script>
    </body>

</html>

