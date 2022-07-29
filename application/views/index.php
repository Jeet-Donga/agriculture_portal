<!DOCTYPE html>
<html lang="en">

    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, shrink-to-fit=9">
        <meta name="description" content="Gambolthemes">
        <meta name="author" content="Gambolthemes">
        <title>Welcome to Agriculture Portal-Finest Product,Finest Agriculture</title>

        <?php
        $this->load->view('headerlink');
        ?>
    </head>
    <body>
<!----category menu in header-->

        <?php
        $this->load->view('header');
        ?>
        <div class="wrapper">
        <!---banner's--->
            <div class="main-banner-slider">
                <div class="container">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="owl-carousel offers-banner owl-theme">
                                <?php 
                                $c=0;
                                $banner = $this->md->my_select('tbl_banner','*');
                                foreach ($banner as $data)
                                {
                                    $c++;
                                ?>
                                <div class="item">
                                    <div class="offer-item">
                                        <div class="offer-item-img">
                                            <div class="gambo-overlay"></div>
                                            <img style="min-height: 220px"src="<?php echo base_url().$data->path; ?>" alt="">
                                        </div>
                                        <div class="offer-text-dt">
                                            <div class="offer-top-text-banner">
                                                <div class="top-text-1"><?php echo $data->title; ?></div>
                                                <span><?php echo $data->subtitle; ?></span>
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
        
        <!---letest product--->

            <div class="section145">
                <div class="container">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="main-title-tt">
                                <div class="main-title-left">
                                    <span>For You</span>
                                    <h2> Recently Arrival Products</h2>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-12">
                            <div class="owl-carousel featured-slider owl-theme">
                                <?php 
                                $newproduct = $this->md->my_query("SELECT * FROM `tbl_product` WHERE `status` = 1 ORDER BY `product_id` DESC LIMIT 0,7");
                                
                                foreach($newproduct as $data)
                                {
                            ?>
                            <div class="item">
                                <div class="product-item">
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
                                ?>
                                
                            </div>
                        </div>
                    </div>
                </div>
            </div>

        <!---heist sold product--->
            <div class="section145">
                <div class="container">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="main-title-tt">
                                <div class="main-title-left">
                                    <span>For You</span>
                                    <h2>Highest Sold Product On Agriculture Portal</h2>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-12">
                            <div class="owl-carousel featured-slider owl-theme">
                                <?php
                                $productid = $this->md->my_query("SELECT `product_id` , COUNT(*) AS cc FROM `tbl_transaction` GROUP BY `product_id` ORDER BY cc DESC LIMIT 0,10");
                                
                                foreach ($productid as $id)
                                {
                                    $data = $this->md->my_select('tbl_product','*',array('product_id'=>$id->product_id))[0];
                                ?>
                                <div class="item">
                                <div class="product-item">
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
                                ?>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        
        <!---ous seller--->
            <div class="section145">
                <div class="container">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="main-title-tt">
                                <div class="main-title-left">
                                    <span>Shop By</span>
                                    <h2>Our Seller</h2>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-12">
                            <div class="owl-carousel cate-slider owl-theme">
                                <?php 
                                $seller = $this->md->my_select('tbl_seller','*',array('status'=>1));
                                
                                foreach($seller as $data)
                                    {
                                ?>
                                <div class="item">
                                    <a class="category-item">
                                        <div class="cate-img">
                                            <img title="<?php echo $data->company_name;?>"src="<?php echo base_url().$data->profil_pic; ?>" alt="">
                                        </div>
                                        <h4 style="color: #4183c4;font-weight: bold"><?php echo $data->company_name;?></h4>
                                    </a>
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

        <?php
        $this->load->view('footer');
        ?>


        <?php
        $this->load->view('footerscript');
        ?>

    </body>

</html>