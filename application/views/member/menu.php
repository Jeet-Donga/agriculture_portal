
<div class="menu-w color-scheme-light color-style-transparent menu-position-side menu-side-left menu-layout-compact sub-menu-style-over sub-menu-color-bright selected-menu-color-light menu-activated-on-hover menu-has-selected-link">
                <div class="logo-w">
                    <a class="logo" href="admin-dashboard">
                        <img alt="" src="member_assets/img/logo6.png">
                    </a>
                </div>
    <?php 
$wh['register_id'] = $this->session->userdata('user');
$record = $this->md->my_select('tbl_register','*',$wh)[0];
?>

                <div class="logged-user-w avatar-inline">
                    <div class="logged-user-i">
                        <div class="avatar-w">
                            <?php 
                            if(strlen($record->profile_pic) > 0 )
                            {
                               ?>
                            <img style="height: 50px; width: 50px; border-radius: 50%" src="<?php echo base_url().$record->profile_pic; ?>">
                        
                            <?php
                            }
                            else 
                            {
                                ?>
                            <img style="height: 50px; width: 50px; border-radius: 50%" src="<?php echo base_url(); ?>member_assets/img/blankuser.png">
                        
                            <?php
                            }
                            ?>
                            
                        </div>
                        <div class="logged-user-info-w">
                            <div class="logged-user-name"><?php echo $record->name; ?></div>
                            <div class="logged-user-role"><?php echo date('d-m-Y h:i:s', strtotime($record->last_login)); ?></div>
                        
                        </div>
                    </div>
                </div>
                
                <h1 class="menu-page-header">Page Header</h1>
                <ul class="main-menu">
                    <li class="selected has-sub-menu">
                        <a href="#">
                            <div class="icon-w">
                                <div class="os-icon os-icon-signs-11"></div>
                            </div><span>Agriculture Portal</span></a>
                        <div class="sub-menu-w">
                            <div class="sub-menu-header">Home</div>
                            <div class="sub-menu-icon"><i class="os-icon os-icon-signs-11"></i></div>
                            <div class="sub-menu-i">
                                <ul class="sub-menu">
                                    <li><a href="<?php base_url()?>home">Home</a></li>
                                </ul>
                            </div>
                        </div>
                    </li>
                    <li class="selected has-sub-menu">
                        <a href="#">
                            <div class="icon-w">
                                <div class="os-icon os-icon-layout"></div>
                            </div><span>Dashboard</span></a>
                        <div class="sub-menu-w">
                            <div class="sub-menu-header">Dashboard</div>
                            <div class="sub-menu-icon"><i class="os-icon os-icon-layout"></i></div>
                            <div class="sub-menu-i">
                                <ul class="sub-menu">
                                    <li><a href="<?php base_url()?>member-dashboard">Dashboard</a></li>
                                </ul>
                            </div>
                        </div>
                    </li>
                    <li class="selected has-sub-menu">
                        <a href="#">
                            <div class="icon-w">
                            <div class="os-icon os-icon-user"></div>
                            </div><span>My Profile </span></a>
                        <div class="sub-menu-w">
                            <div class="sub-menu-header">My Profile</div>
                            <div class="sub-menu-icon"><i class="os-icon os-icon-user"></i></div>
                            <div class="sub-menu-i">
                                <ul class="sub-menu">
                                    <li><a href="<?php base_url()?>member-profile">My Profile</a></li>
                                </ul>
                            </div>
                        </div>
                    </li>
                    <li class="selected has-sub-menu">
                        <a href="#">
                            <div class="icon-w">
                            <div class="os-icon os-icon-map-pin"></div>
                            </div><span>My Address </span></a>
                        <div class="sub-menu-w">
                            <div class="sub-menu-header">My Address</div>
                            <div class="sub-menu-icon"><i class="os-icon os-icon-map-pin"></i></div>
                            <div class="sub-menu-i">
                                <ul class="sub-menu">
                                    <li><a href="<?php base_url()?>member-address">My Address</a></li>
                                </ul>
                            </div>
                        </div>
                    </li>
                    <li class="selected has-sub-menu">
                        <a href="#">
                            <div class="icon-w">
                            <div class="os-icon os-icon-heart"></div>
                            </div><span>My Wishlist </span></a>
                        <div class="sub-menu-w">
                            <div class="sub-menu-header">My Wishlist</div>
                            <div class="sub-menu-icon"><i class="os-icon os-icon-heart"></i></div>
                            <div class="sub-menu-i">
                                <ul class="sub-menu">
                                    <li><a href="<?php base_url()?>member-wishlist">My Wishlist</a></li>
                                </ul>
                            </div>
                        </div>
                    </li>
                    <li class="selected has-sub-menu">
                        <a href="#">
                            <div class="icon-w">
                            <div class="os-icon os-icon-star"></div>
                            </div><span>My Review </span></a>
                        <div class="sub-menu-w">
                            <div class="sub-menu-header">My RevieW</div>
                            <div class="sub-menu-icon"><i class="os-icon os-icon-star"></i></div>
                            <div class="sub-menu-i">
                                <ul class="sub-menu">
                                    <li><a href="<?php base_url()?>member-review">My Review</a></li>
                                </ul>
                            </div>
                        </div>
                    </li>
                    
                    <li class="selected has-sub-menu">
                        <a href="#">
                            <div class="icon-w">
                            <div class="os-icon os-icon-printer"></div>
                            </div><span>My Bill </span></a>
                        <div class="sub-menu-w">
                            <div class="sub-menu-header">My Bill</div>
                            <div class="sub-menu-icon"><i class="os-icon os-icon-printer"></i></div>
                            <div class="sub-menu-i">
                                <ul class="sub-menu">
                                    <li><a href="<?php base_url()?>member-mybill">My Bill</a></li>
                                </ul>
                            </div>
                        </div>
                    </li>
                </ul>
            </div>