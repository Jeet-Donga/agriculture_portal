<div id="category_model" class="header-cate-model main-gambo-model modal fade" tabindex="-1" role="dialog" aria-modal="false">
    <div class="modal-dialog category-area" role="document">
        <div class="category-area-inner">
            <div class="modal-header">
                <button type="button" class="close btn-close" data-dismiss="modal" aria-label="Close">
                    <i class="uil uil-multiply"></i>
                </button>
            </div>
            <div class="category-model-content modal-content">
                <div class="cate-header">
                    <h4>Our Seller</h4>
                </div>
                <ul class="category-by-cat">
                    
                    <?php
                    $seller = $this->md->my_select('tbl_seller','*',array('status'=>1));
                    foreach($seller as $data)
                        {
                    ?>
                    <li>
                        <a href="#" class="single-cat-item">
                            <div class="icon">
                                <img src="<?php echo base_url().$data->profil_pic; ?>" alt="">
                            </div>
                            <div class="text"><?php echo $data->company_name; ?></div>
                        </a>
                    </li>
                    <?php
                        }
                    ?>
                </ul>
            </div>
        </div>
    </div>
</div>


<header class="header clearfix">
    <div class="top-header-group">
        <div class="top-header">
            <div class="res_main_logo">
                <a href="<?php base_url()?>home"><img src="<?php echo base_url(); ?>assets/images/title.png" alt=""></a>
            </div>
            <div class="main_logo" id="logo">
                <a href="<?php base_url()?>home"><img src="<?php echo base_url(); ?>assets/images/logo5.png" alt=""></a>
                <a href="<?php base_url()?>home"><img class="logo-inverse" src="<?php echo base_url(); ?>assets/images/title.png" alt=""></a>
            </div>
            <div class="search120">
                <div class="ui search">
                    <div class="ui left icon input swdh10">
                        <input class="prompt srch10" id="search" type="text" placeholder="Search for products..">
                        <button type="button" onclick="main_search();" style="border-color:#f7f7f7" class='uil uil-search-alt icon icon1'></button>
                    </div>
                </div>
            </div>
            <div class="header_right">
                <ul>
                    <li>
                        <a href="tel:7698010709" class="offer-link"><i class="uil uil-phone-alt"></i>+91 7698010709</a>
                    </li>
                    <li>
                        <a href="<?php echo base_url();?>seller-registration-1" class="offer-link"><i class="uil uil-store"></i>Sell Product?</a>
                    </li>
                    <li>
                        <?php 
                    if($this->session->userdata('user'))
                    {
                        $wishs = count($this->md->my_select('tbl_wishlist','*',array('register_id'=>$this->session->userdata('user'))));
            
                    ?>
                    <a href="<?php echo base_url();?>member-wishlist" class="option_links" title="Wishlist"><i class='uil uil-heart icon_wishlist'></i><span class="noti_count1"><?php echo $wishs?></span></a>
            
                    <?php 
                    }
                    else 
                    {
                    ?>
                    <a href="<?php echo base_url();?>login" class="option_links" title="Wishlist"><i class='uil uil-heart icon_wishlist'></i></a>
            
                    <?php 
                    }
                    ?>
                        </li>
                    <li>
                        <?php 
                    if($this->session->userdata('user'))
                    {
                    ?>
                    <a href="<?php echo base_url();?>member-dashboard" class="offer-link"><i class="uil uil-apps"></i>Dashboard</a>
                    <?php 
                    }
                    else 
                    {
                    ?>
                    <a href="<?php echo base_url();?>login" class="offer-link"><i class="uil uil-apps"></i>Dashboard</a>
                    <?php 
                    }
                    ?>
                        
                    </li>        
                    <?php 
                    if($this->session->userdata('user'))
                    {
                        $wh['register_id'] = $this->session->userdata('user');
                        $record = $this->md->my_select('tbl_register','*',$wh)[0];
                            
                    ?>
                    <li class="ui dropdown">
                        <a href="#" class="opts_account">
                            <?php 
                            if(strlen($record->profile_pic) > 0 )
                            {
                               ?>
                            <img src="<?php echo base_url().$record->profile_pic; ?>">
                        
                            <?php
                            }
                            else 
                            {
                                ?>
                            <img src="<?php echo base_url(); ?>member_assets/img/blankuser.png">
                        
                            <?php
                            }
                            ?>
                            <span class="user__name"> <?php echo $record->name;?></span>
                            <i class="uil uil-angle-down"></i>
                        </a>
                        <div class="menu dropdown_account">
                            <a href="<?php echo base_url();?>member-dashboard" class="item channel_item"><i class="uil uil-apps icon__1"></i>Dashbaord</a>
                            <a href="<?php echo base_url();?>member-mybill" class="item channel_item"><i class="uil uil-box icon__1"></i>My Bill</a>
                            <a href="<?php echo base_url();?>member-wishlist" class="item channel_item"><i class="uil uil-heart icon__1"></i>My Wishlist</a>
                            <a href="<?php echo base_url();?>member-address" class="item channel_item"><i class="uil uil-location-point icon__1"></i>My Address</a>
                            <a href="<?php echo base_url();?>faqs" class="item channel_item"><i class="uil uil-info-circle icon__1"></i>Faq</a>
                            <a href="<?php echo base_url();?>member-logout" class="item channel_item"><i class="uil uil-lock-alt icon__1"></i>Logout</a>
                        </div>
                    </li>
                    <?php 
                    }
                    else 
                    {
                        ?>
                    <a href="<?php echo base_url(); ?>login" class="opts_account">
                        <img src="<?php echo base_url(); ?>assets/images/avatar/img-5.jpg" alt="">
                        <span class="user__name">Click To Login</span>
                        <i class="uil uil-angle-down"></i>
                    </a>
                    <?php
                    }
                    ?>
                </ul>
            </div>
        </div>
    </div>
    <div class="sub-header-group">
        <div class="sub-header">
            <div class="ui dropdown">
                <a href="#" class="category_drop hover-btn" data-toggle="modal" data-target="#category_model" title="Categories"><i class="uil uil-apps"></i><span class="cate__icon">Our Seller</span></a>
            </div>
            <nav class="navbar navbar-expand-lg navbar-light py-3">
                <div class="container-fluid">
                    <button class="navbar-toggler menu_toggle_btn" type="button" data-target="#navbarSupportedContent"><i class="uil uil-bars"></i></button>
                    <div class="collapse navbar-collapse d-flex flex-column flex-lg-row flex-xl-row justify-content-lg-end bg-dark1 p-3 p-lg-0 mt1-5 mt-lg-0 mobileMenu" id="navbarSupportedContent">
                        <ul class="navbar-nav main_nav align-self-stretch">
                            <li class="nav-item"><a href="<?php echo base_url();?>home" class="nav-link active" title="Home">HOME</a></li>
                            <?php
                            $main = $this->md->my_select('tbl_category','*',array('label'=>'maincategory'));
                            foreach ($main as $maindata)
                            {
                            ?>
                            <li class="nav-item">
                                <div class="ui icon top left dropdown nav__menu">
                                    <a class="nav-link" href="<?php echo base_url()?>product-list/main/<?php echo $maindata->category_id; ?>" title="<?php echo $maindata->name; ?>"><?php echo $maindata->name; ?> <i class="uil uil-angle-down"></i></a>
                                    <div class="menu" style="width: 900px">
                                       <!-----sub cateegory-----> 
                                        <?php
                                        $sub = $this->md->my_select('tbl_category','*',array('parent_id'=>$maindata->category_id));
                                        foreach ($sub as $subdata)
                                        {
                                        ?>
                                        <ul class="col-sm-12 col-md-3"  >
                                            <li><a style="font-weight: bold;font-size: 17px" href="<?php echo base_url()?>product-list/sub/<?php echo $subdata->category_id; ?>" title="<?php echo $subdata->name; ?>"><?php echo $subdata->name; ?></a></li>
                                            <!-----peta cateegory-----> 
                                                <?php
                                        $peta = $this->md->my_select('tbl_category','*',array('parent_id'=>$subdata->category_id));
                                        foreach ($peta as $petadata)
                                        {
                                        ?>
                                            <li><a style="color: orangered;font-size: 15px;" href="<?php echo base_url()?>product-list/peta/<?php echo $petadata->category_id; ?>" class="item channel_item page__links"><?php echo $petadata->name; ?></a></li>
                                        <?php
                                            }
                                        ?>
                                        </ul>
                                            <br>
                                        <?php
                                        }
                                        ?>
                                    </div>
                                </div>
                            </li>
                            <?php
                            }
                            ?>
                            
                            <li class="nav-item"><a href="<?php base_url()?>about-us" class="nav-link" title="Contact">About Us</a></li>
                            <li class="nav-item"><a href="<?php base_url()?>contact-us" class="nav-link" title="Contact">Contact Us</a></li>
                        </ul>
                    </div>
                </div>
            </nav>
            <div class="catey__icon">
                <a href="#" class="cate__btn" data-toggle="modal" data-target="#category_model" title="Categories"><i class="uil uil-apps"></i></a>
            </div>
            
                <?php 
                    if($this->session->userdata('user'))
                    {
                        $cart = count($this->md->my_select('tbl_cart','*',array('register_id'=>$this->session->userdata('user'))));
            
                ?>
                <div class="header_cart order-1">
                <a href="<?php echo base_url();?>view-cart" class="cart__btn hover-btn" title="Cart">
                    <i class="uil uil-shopping-cart-alt"></i><span>Cart</span><ins><?php echo $cart;?></ins>
                    <i class="uil uil-angle-down"></i></a>
                </div>
            
                    <?php 
                    }
                    else 
                    {
                    ?>
                <div class="header_cart order-1">
                <a href="<?php echo base_url();?>login" class="cart__btn hover-btn" title="Cart">
                    <i class="uil uil-shopping-cart-alt"></i><span>Cart</span><ins>0</ins>
                    <i class="uil uil-angle-down"></i></a>
                </div>
            
                    <?php 
                    }
                    ?>
            
            <div class="search__icon order-1">
                <a href="#" class="search__btn hover-btn" data-toggle="modal" data-target="#search_model" title="Search"><i class="uil uil-search"></i></a>
            </div>
        </div>
    </div>
</header>
        <script type="text/javascript">
        function main_search()
        {
            var search_val = document.getElementById('search').value;
            
            window.location.href = "http://localhost/agriculture_portal/product-list/search/"+search_val;
        }
        </script>